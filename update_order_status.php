<?php
include 'db/db_conn.php';
include 'send_mail.php';

//Product Status
// 0 ปิดการเข้าถึง
// 1 ทำให้มองไม่เห็น แต่ยังสามารถเข้าผ่านลิงค์ได้
// 2 เิดให้มองเห็นบนหน้าแรก

// Order Status
//0 = ยังไม่ประมูล 
//1 = อยู่ระหว่างแสดงสินค้า 
//2 = ระหว่างประมูล 
//3 = จบการประมูล 
//4 = ไม่มีผู้ประมูล 
//5 = ลูกค้าไม่อัพโหลด สลิปตามกำหนดเวลา 

// mysqli_query($conn,);

// เปลี่ยนสถานะจาก ปิดการมองเห็น ไปเป็น เปิดการมองเห็น 
//และ update สภานะ Orderเป็น อยู่ระหว่างแสดงสินค้า 

//ค้าหา Order ที่ต้องเปลี่ยนเป็นแสดงสินค้า
$update_to_show = mysqli_query($conn, "SELECT * FROM need_update_to_show");
//ค้าหา Order ที่ต้องเปลี่ยนเป็นระหว่างประมูล
$update_to_start      = mysqli_query($conn, "SELECT * FROM need_update_to_start");
//ค้าหา Order ที่ต้องเปลี่ยนเป็นจบการประมูล
$update_to_end        = mysqli_query($conn, "SELECT * FROM need_update_to_end");

//Order ที่ต้องเปลี่ยนเป็นแสดงสินค้า
if ($update_to_show) {
    if (mysqli_num_rows($update_to_show) > 0) { //ถ้าเจอตาราง
        // ทำการเปลี่ยนสถานะสินค้า pd_status = 2
        mysqli_query($conn, "UPDATE need_update_to_show SET pd_status = 2");
        // ทำการเปลี่ยนสถานะ Order order_status = 1
        mysqli_query($conn, "UPDATE need_update_to_show SET order_status = 1"); //1 = อยู่ระหว่างแสดงสินค้า 
        echo "update_to_show";
    } else {
        // echo "Not Found";
    }
}

//Order ที่ต้องเปลี่ยนเป็นระหว่างประมูล
if ($update_to_start) {
    if (mysqli_num_rows($update_to_start) > 0) {
        $result = mysqli_query($conn, "SELECT f.pd_name,o.order_status,l.user_email,l.username FROM favorite_list f JOIN order_tb o ON o.pd_id = f.pd_id INNER JOIN login l ON f.fav_user_id = l.user_id WHERE o.order_status = 1;");
        foreach ($result as $row) {
            $pd_name = $row['pd_name'];
            $email   = $row['user_email'];
            $username = $row['username'];
            $subject = "สินค้าที่คุณสนใจเริ่มประมูลแล้ว";
            $message = "เรียนคุณ <b>$username</b> <br> <br> 
                        สินค้าที่คุณสนใจ <b>$pd_name</b> กำลังเริ่มประมูลแล้ว <br> <br> 
                        รีบไปประมูลกันเถอะ ก่อนที่คนอื่นจะแย่งไป<br> <br> 
                        ขอให้โชคดีในการประมูล<br> <br> 
                        ขอแสดงความนับถือ<br> <br> 
                        ทีม Vinyl Bid";
            $sender = "ทีม Vinyl Bid";
            if (!sendMail($email, $subject, $message, $sender)) {
                echo "send _ error";
            }
        }
        mysqli_query($conn, "UPDATE need_update_to_start SET order_status = 2"); //2 = ระหว่างประมูล 
        echo "update_to_start";
    }
}

//ค้าหา Order ที่ต้องเปลี่ยนเป็นจบการประมูล
if ($update_to_end) {
    if (mysqli_num_rows($update_to_end) > 0) {
        // ทำการเปลี่ยนสถานะสินค้า pd_status = 2
        $sql = "SELECT o.*,os.*,p.pd_name,lb.* FROM order_tb o
        INNER JOIN order_summary AS os USING(order_id) 
        INNER JOIN product as p ON p.pd_id = o.order_id 
        LEFT JOIN last_user_bid as lb ON lb.order_id  = o.order_id
        WHERE o.order_status = 2;";

        $result2 = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result2) > 0) {
            foreach ($result2 as $row) {
                if ($row['latest_bidder'] == null) {
                    $sql = "UPDATE need_update_to_end SET pd_status = 0 WHERE order_id = " . $row['pd_id'];
                    mysqli_query($conn, $sql);
                    $sql = "UPDATE need_update_to_end SET order_status = 4  WHERE order_id = " . $row['pd_id'];
                    mysqli_query($conn, "$sql"); //4 = ไม่มีผู้ประมูล 
                    echo "update_to_end(ไม่พบผู้ประมูล)";
                    continue;
                }
                // รับค่าวันที่ปัจจุบัน
                $currentDate = date('d/m/y');
                // เพิ่ม 7 วันจากวันที่ปัจจุบัน
                $dueDate = date('d/m/y', strtotime($currentDate . ' + 7 days'));

                $pd_name = $row['pd_name'];
                $username = $row['username'];
                $email   = $row['user_email'];
                $subject = "ยินดีด้วย! คุณชนะการประมูล $pd_name";
                $message = "เรียนคุณ $username <br> <br> 
                ขอแสดงความยินดีด้วย คุณชนะการประมูลสินค้า <b>$pd_name</b>  เรียบร้อยแล้ว! <br> <br> 
                ราคาที่คุณต้องจ่ายคือ " . number_format($row['total_price'], 0) . " บาท <br> <br>
                กรุณาชำระภายในวันที่ $dueDate <br> <br>
                หากต้องการชำระค่าสินค้า คุณสามารถดำเนินการได้ดังนี้<br> <br>
                1.เข้าสู่ระบบเว็บไซต์ Vinyl Bid<br>
                2.คลิกที่ \"โปรไฟล์ของฉัน\"<br>
                3.คลิกที่ปุ่ม \"ออเดอร์ ผู้ประมูลสินค้า\"<br>
                3.คลิกที่ปุ่ม \"ชำระเงิน\"<br><br>
                หากมีข้อสงสัยหรือต้องการความช่วยเหลือ โปรดติดต่อเราที่ aekkapob.pa@rmuti.ac.th <br><br>
                ขอแสดงความนับถือ<br>
                ทีม Vinyl Bid
                ";
                $sender = "ทีม Vinyl Bid";
                if (sendMail($email, $subject, $message, $sender)) {
                    mysqli_query($conn, "UPDATE order_tb SET end_price = " . number_format($row['total_price'], 0) . " WHERE order_tb.order_id = " . $row['order_id']);
                    $sql2 = "SELECT * FROM order_detail_last_bid WHERE order_id = " . $row['order_id'];
                    $order_details = mysqli_query($conn, $sql2);
                    $od = array();
                    while ($row_details = mysqli_fetch_assoc($order_details)) {
                        $od[] = $row_details;
                    }

                    $ods = json_encode($od, JSON_UNESCAPED_UNICODE);
                    if ($order_details) {
                        mysqli_query($conn, "UPDATE `order_tb` SET `order_details` = '$ods' WHERE `order_tb`.`order_id` = " . $row['order_id']);
                    }
                    mysqli_query($conn, "UPDATE need_update_to_end SET pd_status = 1 WHERE order_id = {$row['order_id']}");
                    mysqli_query($conn, "UPDATE need_update_to_end SET order_status = 3 WHERE order_id = {$row['order_id']}"); //3 = จบการประมูล
                }
            }
            // ทำการเปลี่ยนสถานะ Order order_status = 1
            echo "update_to_end";
        }
    }
}
echo "end";

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
    echo "sql1";
    if (mysqli_num_rows($update_to_show) > 0) { //ถ้าเจอตาราง
        // ทำการเปลี่ยนสถานะสินค้า pd_status = 2
        mysqli_query($conn, "UPDATE need_update_to_show SET pd_status = 2");
        // ทำการเปลี่ยนสถานะ Order order_status = 1
        mysqli_query($conn, "UPDATE need_update_to_show SET order_status = 1"); //1 = อยู่ระหว่างแสดงสินค้า 
    } else {
        // echo "Not Found";
    }
}

//Order ที่ต้องเปลี่ยนเป็นระหว่างประมูล
if ($update_to_start) {
    echo "sql2";
    if (mysqli_num_rows($update_to_start) > 0) {
        $result = mysqli_query($conn, "SELECT f.pd_name,o.order_status,l.user_email FROM favorite_list f JOIN order_tb o ON o.pd_id = f.pd_id INNER JOIN login l ON f.fav_user_id = l.user_id WHERE o.order_status = 1;");
        foreach ($result as $row) {
            $pd_name = $row['pd_name'];
            $email   = $row['user_email'];
            $subject = "Your favorite item has started bidding.";
            $message = "Your favorite item <b>$pd_name</b> has started bidding <br> 
                        Hurry and go to the auction. before others take it away <br><br>
                        -wish you luck";
            $sender = "Vinyl Bid";
            if (!sendMail($email, $subject, $message, $sender)) {
                echo "send _ error";
            }
        }
        mysqli_query($conn, "UPDATE need_update_to_start SET order_status = 2"); //2 = ระหว่างประมูล 
    }
}

//ค้าหา Order ที่ต้องเปลี่ยนเป็นจบการประมูล
if ($update_to_end) {
    echo "sql3";
    if (mysqli_num_rows($update_to_end) > 0) {
        // ทำการเปลี่ยนสถานะสินค้า pd_status = 2
        $sql = "SELECT lb.*,os.*,p.pd_name,o.order_status FROM `last_user_bid` lb 
        INNER JOIN order_summary AS os USING(order_id) 
        INNER JOIN product as p ON p.pd_id = lb.order_id 
        INNER JOIN order_tb as o ON o.order_id = lb.order_id 
        WHERE order_status = 2;";
        
        $result2 = mysqli_query($conn, $sql);
        foreach ($result2 as $row) {
            $pd_name = $row['pd_name'];
            $email   = $row['user_email'];
            $subject = "You won the auction.";
            $message = "You won the auction product <b>$pd_name</b> 
                        -The price you must pay is " . number_format($row['total_price'], 0) . "฿";
            $sender = "Vinyl Bid";
            if (sendMail($email, $subject, $message, $sender)) {
                mysqli_query($conn, "UPDATE order_tb SET end_price = " . number_format($row['total_price'], 0) . " WHERE order_tb.order_id = " . $row['order_id']);
                $sql2 = "SELECT * FROM order_detail_last_bid WHERE order_id = ".$row['order_id'];
                $order_details = mysqli_query($conn,$sql2);
                $od = array();
                while ($row_details = mysqli_fetch_assoc($order_details)) {
                    $od[] = $row_details;
                }

                // เพิ่มข้อมูลอื่น ๆ
                $od['fee'] = $service_fee;

                $ods = json_encode($od,JSON_UNESCAPED_UNICODE);
                if($order_details){
                    mysqli_query($conn,"UPDATE `order_tb` SET `order_details` = '$ods' WHERE `order_tb`.`order_id` = ".$row['order_id']);
                }
                
            }
        }
        mysqli_query($conn, "UPDATE need_update_to_end SET pd_status = 1");
        // ทำการเปลี่ยนสถานะ Order order_status = 1
        mysqli_query($conn, "UPDATE need_update_to_end SET order_status = 3"); //3 = จบการประมูล 
    }
}

echo "end";

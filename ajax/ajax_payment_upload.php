<?php
session_start();
include '../db/db_conn.php';

if (isset($_POST) && isset($_SESSION['user_login'])) {
    $user_id = $_SESSION['user_login'];
    $pd_id = $_POST['pd_id'];
    $bank_id = $_POST['bank'];

    if (isset($_FILES['payment-img-input']['name']) && !empty($_FILES['payment-img-input']['name'])) {
        $target = '../upload/receipt/';
        $allowedExtensions = array("jpeg", "jpg", "png");

        $filename = $_FILES['payment-img-input']['name'];
        $filetmp = $_FILES['payment-img-input']['tmp_name'];

        $ext = pathinfo($filename, PATHINFO_EXTENSION);



        if (!in_array($ext, $allowedExtensions)) {
            echoJson_status_msg("error", "ประเภทไฟล์รูปไม่ถูกต้อง กรุณาใช้เป็น jpeg jpg png");
        }

        $filename = time() . '_' . $user_id . '_' . $pd_id . '.' . $ext;

        if (move_uploaded_file($filetmp, $target . $filename)) {
            // อัปโหลดสำเร็จ'
        } else {
            echoJson_status_msg("error", "เพิ่มไฟล์ไม่สำเร็จ");
        }
    } else {
        $filename = '';
    }

    if (!empty($filename)) {
        $sql1 = "SELECT pay_slip FROM payment WHERE pay_id = $pd_id";
        $result1 = mysqli_query($conn, $sql1);
        if($result1){
            if(mysqli_num_rows($result1) > 0){
                $row = mysqli_fetch_assoc($result1);
                $filePath = $target . $row['pay_slip'];
                if (file_exists($filePath)) {
                    unlink($filePath);
                    mysqli_query($conn,"UPDATE payment SET pay_status = '1' WHERE payment.pay_id = $pd_id;");
                }
                $sql2 = "UPDATE payment SET pay_id=$pd_id,bank_id=$bank_id,order_id=$pd_id,pay_slip='$filename',pay_status=1 WHERE pay_id = $pd_id";
            }else{
                $sql2 = "INSERT INTO payment (pay_id, bank_id, order_id, pay_slip,	pay_status) VALUES ($pd_id, $bank_id, $pd_id, '$filename',1)";
            }
        }
        
        $result2 = mysqli_query($conn, $sql2);

        if ($result2) {
            echoJson_status_msg("success","Upload img success");
        }
    }
}

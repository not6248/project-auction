<?php
session_start();
include '../db/db_conn.php';

if (isset($_POST) && isset($_SESSION['user_login'])) {
    $user_id = $_SESSION['user_login'];

    if (isset($_FILES['id-card-img-pd-input']['name']) && !empty($_FILES['id-card-img-pd-input']['name'])) {
        $target = '../upload/id_card/';
        $allowedExtensions = array("jpeg", "jpg", "png");

        $filename = $_FILES['id-card-img-pd-input']['name'];
        $filetmp = $_FILES['id-card-img-pd-input']['tmp_name'];

        $ext = pathinfo($filename, PATHINFO_EXTENSION);



        if (!in_array($ext, $allowedExtensions)) {
            echoJson_status_msg("error", "ประเภทไฟล์รูปไม่ถูกต้อง กรุณาใช้เป็น jpeg jpg png");
        }

        $filename = time() . '_' . $user_id . '.' . $ext;

        if (move_uploaded_file($filetmp, $target . $filename)) {
            // อัปโหลดสำเร็จ'
        } else {
            echoJson_status_msg("error", "เพิ่มไฟล์ไม่สำเร็จ");
        }
    } else {
        $filename = '';
    }

    if (!empty($filename)) {
        $sql1 = "SELECT ud_idcard_img FROM user_detail WHERE user_id = $user_id";
        $result2 = mysqli_query($conn, $sql1);
        if($result2){
            if(mysqli_num_rows($result2) > 0){
                $row = mysqli_fetch_assoc($result2);
                $filePath = $target . $row['ud_idcard_img'];
                if (file_exists($filePath)) {
                    unlink($filePath);
                    mysqli_query($conn,"UPDATE user_detail SET ud_id_card = NULL WHERE user_detail.ud_id = $user_id");
                }
            }
        }
       

        $sql2 = "UPDATE user_detail SET ud_idcard_img = '$filename' WHERE user_id = $user_id";
        $result2 = mysqli_query($conn, $sql2);

        if ($result2) {
            echoJson_status_msg("success","อัปโหลดรูปภาพสำเร็จ");
        }
    }
}

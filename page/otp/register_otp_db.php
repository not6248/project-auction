<?php
session_start();
require_once '../../db/db_conn.php';

//if user click verification code submit button
if (isset($_POST['check_otp']) && !empty($_POST['otp'])) {
    $email = $_SESSION['email'];   // Email
    $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
    $check_code = "SELECT * FROM login WHERE email_verified_code = $otp_code AND user_email = '$email'";

    $code_res = mysqli_query($conn, $check_code);
    if (mysqli_num_rows($code_res) > 0) { //ตรวจสอบว่ามีโค้ดในระบบหรือไม่
        $fetch_data = mysqli_fetch_assoc($code_res);
        $name = $fetch_data['username'];
        $code = 'null';
        $status = 1;
        $update_otp = "UPDATE login SET email_verified_code = $code,email_verified_status = $status WHERE user_email = '$email'";
        echo $update_otp . "<br>";
        $update_res = mysqli_query($conn, $update_otp);
        if ($update_res) {
            unset($_SESSION['info']);
            unset($_SESSION['otp_chack']);
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            // header('location: home.php');
            header('location:../../');
            echo "ยืนยัน Email แล้ว";
            exit();
        } else {
            // $errors['otp-error'] = "Failed while updating code!";
            // echo "Failed while updating code!";
            // query fail
            header('location:../../?page=register&function=verify_email');
        }
    } else {
        // echo "You've entered incorrect code!";
        //รหัสที่กรอกผิด
        header('location:../../?page=register&function=verify_email');
        // $errors['otp-error'] = "You've entered incorrect code!";
    }
} else {
    echo "กรุณาใส่ข้อความ";
}

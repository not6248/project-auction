<?php 
session_start();
require_once '../../db/db_conn.php';
include '../../send_mail.php';

    $email = $_SESSION['email_new_otp'];
    unset($_SESSION['email_new_otp']);
    $email_v_code = random_int(111111, 999999);
    $subject = "Email Verification Code";
    $message = "Your verification code is $email_v_code";
    $sender = "PMN";
    mysqli_query($conn,"UPDATE `login` SET `email_verified_code` = $email_v_code WHERE `login`.`user_email` = '$email'");
    if (sendMail($email, $subject, $message, $sender)) {
        $info = "We've sent a verification code to your<br>email - $email";
        $_SESSION['info'] = $info;
        $_SESSION['email'] = $email;
        echo json_encode(array("status" => "success"));
        // header('location:../../?page=register&function=verify_email');
    }
?>
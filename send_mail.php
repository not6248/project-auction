<?php
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendMail($to, $subject, $message, $form)
{
    try {
        $mail = new PHPMailer();
        $mail->CharSet = "utf-8";

        //ตั้งค่าการเชื่อมต่อ SMTP
        $mail->isSMTP();
        $mail->Host         = 'smtp.gmail.com'; // เปลี่ยนเป็นเซิร์ฟเวอร์ SMTP
        $mail->SMTPAuth     = true;
        $mail->SMTPSecure   = 'ssl';
        $mail->Port         = 465; // เปลี่ยนเป็นหมายเลขพอร์ตของเซิร์ฟเวอร์ SMTP 
        //======================================
        $mail->Username     = 'com40190boy@gmail.com'; // เปลี่ยนเป็นอีเมลของคุณ
        $mail->Password     = 'kxxphbmsoiljkvrt'; // เปลี่ยนเป็นรหัสผ่านของอีเมลของคุณ

        $mail->setFrom('com40190boy@gmail.com', $form); //ส่งจาก
        $mail->addAddress($to); //ส่งถึง

        $mail->isHTML(true);
        $mail->Subject      = $subject;
        $mail->Body         = $message;

        // ส่งอีเมล
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

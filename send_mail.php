<?php
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['send'])){
    $mail = new PHPMailer();
    $mail->CharSet = "utf-8"; 

    //ตั้งค่าการเชื่อมต่อ SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // เปลี่ยนเป็นเซิร์ฟเวอร์ SMTP
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465; // เปลี่ยนเป็นหมายเลขพอร์ตของเซิร์ฟเวอร์ SMTP 
    //======================================
    $mail->Username = 'com40190boy@gmail.com'; // เปลี่ยนเป็นอีเมลของคุณ
    $mail->Password = 'kxxphbmsoiljkvrt'; // เปลี่ยนเป็นรหัสผ่านของอีเมลของคุณ
    
    $mail->setFrom('com40190boy@gmail.com', 'ข้อความแจ้งเดือนการประมูล'); //ส่งจาก
    $mail->addAddress($_POST['email']); //ส่งถึง
    $mail->isHTML(true);

    $mail->Subject = $_POST['subject'];
    $mail->Body = '<h1>' . htmlspecialchars('สวัสดีคุณ User') . '</h1>
                    <p>' . htmlspecialchars($_POST['message']) . '</p>
                    <p><strong>' . htmlspecialchars('ข้อความนี้เป็นตัวหนา') . '</strong></p>';

    // $mail->Body    = $_POST['message'];

    if ($mail->send()) {
        echo 'ส่งอีเมลสำเร็จ';
    } else {
        echo 'ไม่สามารถส่งอีเมลได้: ' . $mail->ErrorInfo;
    }
}

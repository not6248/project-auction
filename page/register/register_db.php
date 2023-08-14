<?php
session_start();
require_once '../../db/db_conn.php';
$username   = "";
$email      = "";


//if user signup button
if (isset($_POST['signup'])) {
    $username   = $_POST['username'];
    $email      = $_POST['email'];
    $password   = $_POST['password'];
    $c_password = $_POST['c_password'];

    if (empty($username)) {
        showError('กรุณากรอกชื่อผู้ใช้');
    } elseif (empty($email)) {
        showError('กรุณากรอกอีเมล');
    } elseif (empty($password)) {
        showError('กรุณากรอกรหัสผ่าน');
    } elseif (empty($c_password)) {
        showError('กรุณายืนยันรหัสผ่าน');
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        showError('รูปแบบอีเมลไม่ถูกต้อง');
    } elseif (strlen($password) > 20 || strlen($password) < 5) {
        showError('รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร');
    } elseif ($password != $c_password) {
        showError('รหัสผ่านไม่ตรงกัน');
    }

    //เตรียมคำสั่ง SQL ในรูปแบบของ prepared statement
    $check_email = mysqli_prepare($conn, "SELECT user_email FROM login WHERE user_email = ?");

    //เพื่อผูกค่าพารามิเตอร์กับพารามิเตอร์ในคำสั่ง SQL และระบุประเภทข้อมูลของพารามิเตอร์
    // "s": String (ข้อความ)
    // "i": Integer (จำนวนเต็ม)
    // "d": Double (ทศนิยม)
    // "b": Blob (ข้อมูลที่ไม่ระบุประเภท)
    mysqli_stmt_bind_param($check_email, "s", $email);

    // execute คำสั่ง SQL ที่เตรียมไว้ใน prepared statement และนำกลับไปไว้ที่ $check_email (คล้าย mysqli_query)
    mysqli_stmt_execute($check_email);

    //นำผลลัพจากการ execute ($check_email) มาไว้ใน $result
    //คล้ายกับ $result = mysqli_query($conn, $sql); 
    $result = mysqli_stmt_get_result($check_email);
    // $row    = mysqli_fetch_assoc($result);


    if (mysqli_num_rows($result) > 0) {
        $_SESSION['warning'] = "มีอีเมลนี้อยู่ในระบบแล้ว <a href='signin.php'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
        header("location:../../?page=register");
        exit();
    } elseif (!isset($_SESSION['error'])) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $email_v_code = random_int(111111, 999999);

        // Start transaction
        mysqli_begin_transaction($conn);

        $stmt1 = mysqli_prepare($conn, "INSERT INTO login (username, password,user_email,email_verified_code) VALUES (?,?,?,?)");
        mysqli_stmt_bind_param($stmt1, "sssi", $username, $passwordHash, $email, $email_v_code);
        $execute1 = mysqli_stmt_execute($stmt1);

        $last_user_id = mysqli_insert_id($conn);

        $stmt2 = mysqli_prepare($conn, "INSERT INTO user_detail (ud_id, user_id) VALUES (?,?)");
        mysqli_stmt_bind_param($stmt2, "ii", $last_user_id, $last_user_id);
        $execute2 = mysqli_stmt_execute($stmt2);

        if ($execute1 && $execute2) {
            // เรียกใช้ mysqli_commit เมื่อทุกคำสั่ง SQL ทำงานสำเร็จ
            mysqli_commit($conn);
            $subject = "Email Verification Code";
            $message = "Your verification code is $email_v_code";
            $sender = "From: PMN <com40190boy@gmail.com>";
            if (mail($email, $subject, $message, $sender)) {
                $info = "We've sent a verification code to your<br>email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['otp_chack'] = "1";
                header('location:../../?page=register&function=verify_email');
                exit();
            }
            //End transaction and commit
        } else {
            mysqli_rollback($conn);
            $_SESSION['error'] = "เกิดข้อผิดพลาดในการบันทึกข้อมูล: " . mysqli_error($conn);
            header("location:../../?page=register");
        }

        // $_SESSION['success'] = "สมัครสมาชิกเรียบร้อยแล้ว! <a href='signin.php' class='alert-link'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
        // header("location:../../?page=register");
        // exit();
    } else {
        $_SESSION['error'] = "มีบางอย่างผิดผลาด";
        header("location:../../?page=register");
        exit();
    }
}

function showError($message)
{
    $_SESSION['error'] = $message;
    header("location:../../?page=register");
    exit();
}
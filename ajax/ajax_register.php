<?php
session_start();
include '../db/db_conn.php';
include '../send_mail.php';
$username   = "";
$email      = "";


//if user signup button
$username   = $_POST['username'];
$email      = $_POST['email'];
$password   = $_POST['password'];
$c_password = $_POST['c_password'];

if (!$username) {
    echoJson_status_msg("error", "กรุณากรอกชื่อผู้ใช้");
} elseif (!($email)) {
    echoJson_status_msg("error", "กรุณากรอกอีเมล");
} elseif (!($password)) {
    echoJson_status_msg("error", "กรุณากรอกรหัสผ่าน");
} elseif (!($c_password)) {
    echoJson_status_msg("error", "กรุณายืนยันรหัสผ่าน");
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echoJson_status_msg("error", "รูปแบบอีเมลไม่ถูกต้อง");
} elseif (strlen($password) > 20 || strlen($password) < 5) {
    echoJson_status_msg("error", "รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร");
} elseif ($password != $c_password) {
    echoJson_status_msg("error", "รหัสผ่านไม่ตรงกัน");
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
    echoJson_status_msg("warning", "มีอีเมลนี้อยู่ในระบบแล้ว คลิกที่ปุ่ม เพื่อเข้าสู่ระบบ");
    // $_SESSION['warning'] = "มีอีเมลนี้อยู่ในระบบแล้ว <a href='signin.php'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
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
        $subject = "OTP เพื่อยืนยันการสมัครสมาชิก Vinyl bid";
        $message = "เรียนคุณ $username <br><br>
        ขอขอบคุณที่สมัครสมาชิก Vinyl bid เรายินดีต้อนรับคุณเข้าสู่ชุมชนนักสะสมแผ่นเสียงไวนิลของเรา <br><br>
        เพื่อยืนยันการสมัครสมาชิกของคุณ โปรดป้อนรหัสยืนยัน (OTP) ต่อไปนี้ในช่องที่กำหนดบนเว็บไซต์ของเรา<br><br><br>
        OTP: <b>$email_v_code</b> <br><br><br>
        หากคุณมีคำถามหรือข้อสงสัย โปรดติดต่อเราที่ aekkapob.pa@rmuti.ac.th <br><br>
        ขอบคุณอีกครั้งสำหรับการสมัครสมาชิกของคุณ <br><br>
        ขอแสดงความนับถือ <br>
        ทีม Vinyl bid";
        $sender = "ทีม Vinyl bid";
        if (sendMail($email, $subject, $message, $sender)) {
            $info = "We've sent a verification code to your<br>email - $email";
            $_SESSION['info'] = $info;
            $_SESSION['email'] = $email;
            echo json_encode(array("status" => "success"));
            // header('location:../../?page=register&function=verify_email');
            exit();
        }
        //End transaction and commit
    } else {
        mysqli_rollback($conn);
        // $_SESSION['error'] = "เกิดข้อผิดพลาดในการบันทึกข้อมูล: " . mysqli_error($conn);
        echoJson_status_msg("error", "เกิดข้อผิดพลาดในการบันทึกข้อมูล");
    }

    // $_SESSION['success'] = "สมัครสมาชิกเรียบร้อยแล้ว! <a href='signin.php' class='alert-link'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
    // header("location:../../?page=register");
    // exit();
} else {
    echoJson_status_msg("error", "มีบางอย่างผิดผลาด");
    // $_SESSION['error'] = "มีบางอย่างผิดผลาด";
    // header("location:../../?page=register");
    // exit();
}

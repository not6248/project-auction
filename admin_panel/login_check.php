<?php
session_start();
require '../db/db_conn.php';

if (isset($_POST['admin_login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($email)) {
        echo_js_alert("กรุณากรอกอีเมล","back");
        // $_SESSION['error'] = 'กรุณากรอกอีเมล';
        header("location: login.php");
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo_js_alert("รูปแบบอีเมลไม่ถูกต้อง","back");
        // $_SESSION['error'] = 'รูปแบบอีเมลไม่ถูกต้อง';
        header("location: login.php");
    } else if (empty($password)) {
        echo_js_alert("กรุณากรอกรหัสผ่าน","back");
        // $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
        header("location: login.php");
    } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
        echo_js_alert("รหัสผ่านต้องอยู่ระว่าง 5 - 20 ตัวอักษร","back");
        // $_SESSION['error'] = 'รหัสผ่านต้องอยู่ระว่าง 5 - 20 ตัวอักษร';
        header("location: login.php");
    } else {
        
        $query = ("SELECT * FROM login WHERE user_email = '$email' AND user_status = '1' and user_type = '0'");
        $result = mysqli_query($conn, $query);
        // AND password = '$password'
        //เช็ครหัสผ่านที่ถูก hash แล้ว
    
        if (mysqli_num_rows($result) > 0 ) {

            $row = mysqli_fetch_assoc($result);
            $passwordHash = $row['password'];
            $password_verify = password_verify($password, $passwordHash);
            if ($password_verify) {
                $_SESSION['admin_login'] = $row['user_id'];
                $_SESSION['user_type'] = $row['user_type'];
                echo_js_alert("เข้าสู่ระบบสำเร็จ","./");
            } else {
                echo_js_alert("Email หรือ รหัสไม่ถูก","login.php");
                // $_SESSION['error'] = 'Email หรือ รหัสไม่ถูก';
                header("location: login.php");
            }
        } else {
            echo_js_alert("Email หรือ รหัสไม่ถูก","login.php");
        }
    }
}

<?php
session_start();
include '../db/db_conn.php';


$email  = $_POST['email'];
$password = $_POST['password'];

$stmt = mysqli_prepare($conn, "SELECT * FROM login WHERE user_email = ?");
mysqli_stmt_bind_param($stmt, "s", $email);
if (mysqli_stmt_execute($stmt)) {
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {     //มีบัญชีภายในฐานข้อมูลหรือไม่
        $row = mysqli_fetch_assoc($result);
        $row_pass = $row['password'];
        if (password_verify($password, $row_pass)) {    //รหัสถูกต้องหรือไม่
            if ($row['user_status'] == 0) { //บัญชีถูกปิดใช้งานหรือไม่
                echoJson_status_msg("error", "This account has been disabled.<br>please contact admin");
            } else {
                //ตัวแปรสำหรับ Login
                $_SESSION['user_login'] = $row['user_id'];
                $_SESSION['username'] = $row['username'];

                $verified_status = $row['email_verified_status'];
                if ($verified_status == '0') { //บัญชียืนยันอีเมลแล้วหรือไม่
                    // echo "ดูเหมือนว่าคุณยังไม่ได้ยืนยันอีเมลของคุณ - $email";
                    // header('location: user-otp.php');
                    $_SESSION['login_status'] = "email_verified_fail";
                    $_SESSION['email_new_otp'] = $email;
                    echoJson_status_msg("warning", "Looks like you haven't verified your email yet. <br>
                                                    Email: $email<br>
                                                    Click OK to proceed and complete
                    ");
                } else { //ผ่านทุกเงื่อนไข login สำเร็จ
                    unset($_SESSION['login_status']);
                    echoJson_status_msg(
                        "success",
                        "login success
                        system willgo back to the main page<br>
                        I will close in <b></b> milliseconds.");
                    // echo "ยันยัน Mail แล้ว";
                    // header('location: home.php');
                }
            }
        } else {
            echoJson_status_msg("error", "Incorrect email or password!");
            // echo "Incorrect email or password!";
        }
    } else {
        echoJson_status_msg("error", "It's look like you're not yet a member! Click on the bottom link to signup.");
        // echo "It's look like you're not yet a member! Click on the bottom link to signup.";
    }
} else {
    //มีปัญหาในการ execute
}
    
    // $check_email = "SELECT * FROM usertable WHERE email = '$email'";
    // $res = mysqli_query($con, $check_email);

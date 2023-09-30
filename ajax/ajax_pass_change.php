<?php 
session_start();
include '../db/db_conn.php';

if (isset($_POST) && isset($_SESSION['user_login'])) {
    $user_id = $_SESSION['user_login'];

    $password = $_POST['pass_old'];
    $new_password = $_POST['pass_new'];
    $new_password_c = $_POST['pass_new_c'];

    if ($new_password != $new_password_c) {
        echoJson_status_msg("error", "รหัสผ่านไม่ตรงกัน");
    }

    $sql = "SELECT * FROM login WHERE user_id = $user_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $row_pass = $row['password'];

    //ตรวจสอบรหัสผ่านเก่า
    if (password_verify($password, $row_pass)){
        $new_password = password_hash($new_password, PASSWORD_DEFAULT);
        $sql = "UPDATE login SET password = '$new_password' WHERE user_id = $user_id";
        if (mysqli_query($conn, $sql)) {
            echoJson_status_msg("success", "เปลี่ยนรหัสผ่านสำเร็จ");
        } else {
            echoJson_status_msg("error", "เปลี่ยนรหัสผ่านไม่สำเร็จ");
        }
    } else {
        echoJson_status_msg("error", "รหัสผ่านเก่าไม่ถูกต้อง");
    }

}
?>
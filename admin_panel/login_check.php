<?php
    session_start();
    require '../db/db_conn.php';
    
    if(isset($_POST['admin_login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(empty($email)){
            $_SESSION['error'] = 'กรุณากรอกอีเมล';
            header("location: login.php");
        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = 'รูปแบบอีเมลไม่ถูกต้อง';
            header("location: login.php");
        }else if(empty($password)){
            $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
            header("location: login.php");
        }else if(strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
            $_SESSION['error'] = 'รหัสผ่านต้องอยู่ระว่าง 5 - 20 ตัวอักษร';
            header("location: login.php");
        }else {
            
                $query = ("SELECT * FROM user_tb WHERE email = '$email' AND password = '$password' AND status = '1'");
                $result = mysqli_query($conn,$query);

                if(mysqli_num_rows($result) == 1 ){
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['admin_login'] = $row['user_id'];
                    header("location: index.php");
                    echo "<script>console.log('Login สำเร็จ');</script>";
                }else{
                    echo"<script>alert('Email หรือ รหัสไม่ถูก')</script>";
                    Header('Refresh:0; login.php');
                }
    }
}
?>

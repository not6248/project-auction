<?php 
include '../../db/db_conn.php';


    $email  = $_POST['email'];
    $password = $_POST['password'];

    $stmt = mysqli_prepare($conn, "SELECT * FROM login WHERE user_email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $row_pass = $row['password'];
            if(password_verify($password, $row_pass)){
                // $_SESSION['email'] = $email;
                $verified_status = $row['email_verified_status'];
                if($verified_status == '1'){
                    echo "ยันยัน Mail แล้ว";
                //   $_SESSION['email'] = $email;
                //   $_SESSION['password'] = $password;
                //     header('location: home.php');
                }else{
                    // $info = "It's look like you haven't still verify your email - $email";
                    // echo "It's look like you haven't still verify your email - $email";
                    // echo "ดูเหมือนว่าคุณยังไม่ได้ยืนยันอีเมลของคุณ - $email";
                    // $_SESSION['info'] = $info;
                    // header('location: user-otp.php');
                    echoJson_status_msg("warning","ดูเหมือนว่าคุณยังไม่ได้ยืนยันอีเมลของคุณ <br> Email: $email");
                }
            }else{
                echo "Incorrect email or password!";
            }
        }else{
            echo "It's look like you're not yet a member! Click on the bottom link to signup.";
        }
    }else{
        //มีปัญหาในการ execute
    }
    
    // $check_email = "SELECT * FROM usertable WHERE email = '$email'";
    // $res = mysqli_query($con, $check_email);
    
?>
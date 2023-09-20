<?php 
session_start();
include '../db/db_conn.php';
include '../send_mail.php';

if (isset($_POST) && $_SESSION['user_type'] == "2") {
    $tk_type = mysqli_real_escape_string($conn,$_POST['tk_type']);
    $tk_num = mysqli_real_escape_string($conn,$_POST['tk_num']);
    $order_id = mysqli_real_escape_string($conn,$_POST['order_id']);

    $sql = "INSERT INTO delivery (dlv_id,order_id,dlvt_id,dlv_code) 
    VALUES ($order_id,$order_id,$tk_type,'$tk_num')";

    $result = mysqli_query($conn,$sql);
    if($result){
        echoJson_status_msg("success","บันทึกสำเร็จ!");
    }else{
        echoJson_status_msg("error","บันทึกล้มเหลว");
    }
}
?>
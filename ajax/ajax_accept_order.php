<?php 
session_start();
include '../db/db_conn.php';

if(isset($_POST) && !empty($_POST)){
    $order_id = $_POST['accept_id'];
    $sql = "UPDATE delivery SET dlv_status = '2' WHERE delivery.dlv_id = $order_id ;";
    $result = mysqli_query($conn,$sql);
    if($result){
        echoJson_status_msg("success","ยืนยันสำเร็จ");
    }else{
        echoJson_status_msg("error",mysqli_error($conn));
    }
}else{
    echoJson_status_msg("error","ไม่มีข้อมูล");
}
?>
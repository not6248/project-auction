<?php
session_start();
include '../db/db_conn.php';

$ud_fname = $_POST["fname"];
$ud_lname = $_POST["lname"];
$ud_address = $_POST["address"];
$ud_phone = $_POST["tele"];
$prefix_id = $_POST["prefix"];

$sql = "UPDATE `user_detail` SET 
prefix_id = $prefix_id, 
ud_fname ='$ud_fname', 
ud_lname = '$ud_lname', 
ud_address = '$ud_address', 
ud_phone = '$ud_phone'
WHERE user_id = " . $_SESSION['user_login'];

$result = mysqli_query($conn, $sql);

if($result){
    echo 'success';
}else{
    echo 'error';
}

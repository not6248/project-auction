<?php
session_start();
include '.../db/db_conn.php';

$ud_fname = $_POST["fname"];
$ud_lname = $_POST["lname"];
$ud_address = $_POST["address"];
$ud_phone = $_POST["tele"];

$sql = "UPDATE `user_detail` SET ud_fname='$ud_fname', ud_lname = '$ud_lname', ud_address = '$ud_address', ud_phone='$ud_phone' WHERE user_id = " . $_SESSION['user_login'];

$result = mysqli_query($conn, $sql);

if($result){
    echo 'Update Success';
}else{
    echo 'error';
}

?>
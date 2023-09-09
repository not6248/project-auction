<?php
session_start();
include '../db/db_conn.php';

if (isset($_POST) && !empty(isset($_POST)) && !empty($_SESSION['user_login'])) {
    $prefix_id  = $_POST["prefix"];
    $ud_fname   = $_POST["fname"];
    $ud_lname   = $_POST["lname"];
    $ud_address = $_POST["address"];
    $ud_phone   = $_POST["tele"];
    $user_id    = $_SESSION['user_login'];

    $sql = "UPDATE `user_detail` SET 
    prefix_id   = ?, 
    ud_fname    = ?, 
    ud_lname    = ?, 
    ud_address  = ?, 
    ud_phone    = ? 
    WHERE user_id = ?";

    $stmt = mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"issssi",$prefix_id,$ud_fname,$ud_lname,$ud_address,$ud_phone,$user_id);

    if (mysqli_stmt_execute($stmt)) {
        echo 'success';
    } else {
        echo 'error';
    }
}

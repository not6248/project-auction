<?php 
session_start();
include '../db/db_conn.php';

if (isset($_POST['fee_id'])) {
    $feeId = $_POST['fee_id'];
    $sqlUpdate = "UPDATE fee SET fee_active = (CASE WHEN fee_id = $feeId THEN 1 ELSE 0 END)";

    if(!mysqli_query($conn, $sqlUpdate)){
        echo json_encode(array("status" => "error"));
    }
}

?>
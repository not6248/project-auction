<?php
session_start();
include '../db/db_conn.php';

if (isset($_POST) && isset($_SESSION['user_login']) && $_SESSION['user_type'] == "2") {
    $pd_id = $_POST['pd_id'];
    $user_id = mysqli_real_escape_string($conn, $_SESSION['user_login']);
    $user_type = mysqli_real_escape_string($conn, $_SESSION['user_type']);

    $sqlresult_img = mysqli_query($conn, "SELECT pd_img FROM `product` WHERE pd_id = $pd_id");

    if (!$sqlresult_img) {
        echoJson_status_msg("error", "Error:" . mysqli_error($conn));
    }

    mysqli_begin_transaction($conn);
    $sql1 = "DELETE FROM order_tb WHERE order_tb.order_id = ?";
    $stmt1 = mysqli_prepare($conn, $sql1);
    mysqli_stmt_bind_param($stmt1, "i", $pd_id);

    if (mysqli_stmt_execute($stmt1)) {
        //success
        $row = mysqli_fetch_assoc($sqlresult_img);
        $pd_img_json = $row['pd_img']; // รับค่าในรูปแบบ JSON จากฐานข้อมูล
        $pd_img = json_decode($pd_img_json, true); // แปลงเป็นอาร์เรย์

        $sql2 = "DELETE FROM `product` WHERE pd_id = ?";
        $stmt2 = mysqli_prepare($conn, $sql2);
        mysqli_stmt_bind_param($stmt2, "i", $pd_id);

        if (mysqli_stmt_execute($stmt2)) {
            mysqli_commit($conn);
            $uploadPath = '../upload/product/';
            foreach ($pd_img as $file) {
                $filePath = $uploadPath . $file;
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
            echoJson_status_msg("success", "Your file has been deleted.");
        } else {
            mysqli_rollback($conn);
            echoJson_status_msg("error", "Error:" . mysqli_error($conn));
        }
    } else {
        //error mysqli_error($conn)
        mysqli_rollback($conn);
        echoJson_status_msg("error", "Error:" . mysqli_error($conn));
    }
}

// mysqli_begin_transaction($conn);
// mysqli_commit($conn);
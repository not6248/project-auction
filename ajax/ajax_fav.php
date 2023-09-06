<?php
session_start();
include '../db/db_conn.php';

// ตรวจสอบการเข้าสู่ระบบและรับค่า user_id และ pd_id จาก session และ GET request
if (isset($_POST) && $_SESSION['user_login'] && $_POST['pd_id']) {
    $user_id = $_SESSION['user_login'];
    $pd_id = $_POST['pd_id'];

    // ตรวจสอบว่าสินค้าเป็นของผู้ใช้หรือไม่
    $sql_check_owner = "SELECT pd_id FROM `product` WHERE user_id = $user_id and pd_id = $pd_id";
    $result_check_owner = mysqli_query($conn, $sql_check_owner);

    if (mysqli_num_rows($result_check_owner) > 0) {
        echoJson_status_msg("own_product", "คุณไม่สามารถเพิ่มสินค้าโปรดจากสินค้าของคุณเองได้");
    }

    // ตรวจสอบว่าผู้ใช้มีข้อมูลในตาราง favorite หรือไม่
    $sql_check_favorite = "SELECT user_id,pd_id FROM favorite WHERE user_id = $user_id AND pd_id = $pd_id";
    $result_check_favorite = mysqli_query($conn, $sql_check_favorite);

    if (mysqli_num_rows($result_check_favorite) > 0) {
        // ถ้ามีข้อมูลในตาราง favorite แล้ว
        // ลบข้อมูลออกจากตาราง favorite
        $sql_remove_favorite = "DELETE FROM `favorite` WHERE user_id = $user_id AND pd_id = $pd_id";
        mysqli_query($conn, $sql_remove_favorite);
        echo json_encode(array("status" => "fav_remove"));
        exit();
    } else {
        // ถ้ายังไม่มีข้อมูลในตาราง favorite
        // เพิ่มข้อมูลลงในตาราง favorite
        $sql_add_favorite = "INSERT INTO `favorite` (`user_id`, `pd_id`) VALUES ($user_id, $pd_id)";
        mysqli_query($conn, $sql_add_favorite);
        echo json_encode(array("status" => "fav_add"));
        exit();
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    mysqli_close($conn);
}

<?php
session_start();
include '../db/db_conn.php';

if (isset($_POST) && isset($_SESSION['user_login']) && isset($_POST['pd_id'])) {
    $user_id = mysqli_real_escape_string($conn, $_SESSION['user_login']);
    $pd_id = mysqli_real_escape_string($conn, $_POST['pd_id']);
    $price_offer = mysqli_real_escape_string($conn, $_POST['price_offer']);
    $pd_price_chack = mysqli_real_escape_string($conn, $_POST['pd_price_chack']);
    $PriceUser_chack = $pd_price_chack + $price_offer;

    // เช็คว่าใช่เจ้าของสินค้าไหม
    $sql_check_owner = "SELECT pd_id FROM `product` WHERE user_id = $user_id and pd_id = $pd_id";
    $result_check_owner = mysqli_query($conn, $sql_check_owner);

    if (mysqli_num_rows($result_check_owner) > 0) {
        echoJson_status_msg("warning", "คุณไม่สามารถประมูล<br>สินค้าของตัวเองได้");
    }

    $sql_last_bid = "SELECT * FROM `last_user_bid` WHERE order_id = $pd_id AND latest_bidder = $user_id";
    $result_sql_last_bid = mysqli_query($conn, $sql_last_bid);

    if (mysqli_num_rows($result_sql_last_bid) > 0) {
        echoJson_status_msg("warning", "คุณได้ยื่นข้อเสนอประมูลไปแล้ว <br> กรุณารอ user ท่านอื่นประมูล");
    }
    

    
    $sql_PriceNow_chack = "SELECT * FROM order_summary WHERE order_id = $pd_id";
    $result_order_summary = mysqli_query($conn, $sql_PriceNow_chack);

    if ($result_order_summary) {
        $row = mysqli_fetch_assoc($result_order_summary);
        $PriceNowIN_database = $row['total_price'];
    } else {
        echoJson_status_msg("error", "Bid fail <br> please try again");
    }

    // เช็คราคาภายในฐานข้อมูล และ ราคาที่นำไปแสดงลูกค้า ว่าถุกต้องไหม
    if ($PriceUser_chack > $PriceNowIN_database) {
        $sql = "INSERT INTO bid (`user_id`, `order_id`, `bid_price_up`) VALUES ($user_id, $pd_id, $price_offer)";
        if (mysqli_query($conn, $sql)) {
            echoJson_status_msg("success", "Bid was successfuly.");
        } else {
            echoJson_status_msg("error", "Bid fail <br> please try again");
        }
    } else {
        echoJson_status_msg("warning", "The price you are bidding on Lower than the current price.<br> Please refresh and try again.");
    }
} else {
    echoJson_status_msg("warning", "Please login <br> before using this function.");
}

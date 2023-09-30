<?php
session_start();
include '../db/db_conn.php';

if (isset($_POST) && $_SESSION['user_type'] == 2) {
    $user_id        = $_SESSION['user_login'];
    $pd_type_id     = $_POST['pd_type_id'];
    $pd_name        = $_POST['pd_name'];
    $pd_detail      = $_POST['pd_detail'];
    $pd_condition   = $_POST['pd_condition'];
    $pd_price_start = $_POST['pd_price_start'];
    $fee_id         = $service_fee['fee_id'];

    // =====================================================================================
    date_default_timezone_set('Asia/Bangkok');
    $currentTime = strtotime('today 12:00'); // เวลาปัจจุบันในรูปแบบ timestamp
    // =====================================================================================
    $oneDaysLater = strtotime('+1 days', $currentTime); // คำนวณเวลา 4 วันนับจากปัจจุบัน
    $oneDaysLaterFormatted = date('Y-m-d\TH:i', $oneDaysLater); // แปลงเป็นรูปแบบ date
    // =====================================================================================
    $fourDaysLater = strtotime('+4 days', $currentTime); // คำนวณเวลา 4 วันนับจากปัจจุบัน
    $fourDaysLaterFormatted = date('Y-m-d\TH:i', $fourDaysLater); // แปลงเป็นรูปแบบ date
    // =====================================================================================
    $elevenDaysLater = strtotime('+11 days', $currentTime); // คำนวณเวลา 11 วันนับจากปัจจุบัน
    $elevenDaysLaterFormatted = date('Y-m-d\TH:i', $elevenDaysLater); // แปลงเป็นรูปแบบ date
    // =====================================================================================

    // Handle multiple images
    if (isset($_FILES['main-img-pd-input']['name']) && !empty($_FILES['main-img-pd-input']['name'])) {
        $extension = array("jpeg", "jpg", "png");
        $target = '../upload/product/';

        $mainImageName = $_FILES['main-img-pd-input']['name'];
        $mainImageTmpName = $_FILES['main-img-pd-input']['tmp_name'];

        $subImageNames = $_FILES['sub-img-pd-input']['name'];
        $subImageTmpNames = $_FILES['sub-img-pd-input']['tmp_name'];

        // Handle the main image
        $ext = pathinfo($mainImageName, PATHINFO_EXTENSION);
        if (in_array($ext, $extension)) {
            // Generate a unique filename to avoid overwriting
            $mainImageNewName = time() . '_main.' . $ext;

            if (move_uploaded_file($mainImageTmpName, $target . $mainImageNewName)) {
                $uploaded_filenames[] = $mainImageNewName;
            } else {
                echoJson_status_msg("error", "อัปโหลด รูปภาพหลัก มีข้อผิดพลาด $mainImageName");
            }
        } else {
            echoJson_status_msg("error", "ประเภทไฟล์ รูปภาพหลัก ไม่ถูกต้อง <ins><b>$mainImageName</b></ins> <br> กรุณาใช้เป็น <b>jpeg , jpg , png.</b>");
        }

        // Handle the sub images
        if (!empty($_FILES['sub-img-pd-input']['name'][0])) {
            foreach ($subImageNames as $key => $subImageName) {
                $ext = pathinfo($subImageName, PATHINFO_EXTENSION);
                if (in_array($ext, $extension)) {
                    // Generate a unique filename to avoid overwriting
                    $subImageNewName = time() . '_sub_' . $key . '.' . $ext;

                    if (move_uploaded_file($subImageTmpNames[$key], $target . $subImageNewName)) {
                        $uploaded_filenames[] = $subImageNewName;
                    } else {
                        echoJson_status_msg("error", "อัปโหลด รูปภาพรอง มีข้อผิดพลาด $subImageName");
                    }
                } else {
                    echoJson_status_msg("error", "ประเภทไฟล์ รูปภาพรอง ไม่ถูกต้อง <ins><b>$subImageName</b></ins> <br> กรุณาใช้เป็น <b>jpeg , jpg , png.</b>");
                }
            }
        }


        $image_json = json_encode($uploaded_filenames);
    } else {
        $image_json = '[]'; // No images uploaded
    }

    // เริ่มการทำงานแบบ Transaction
    mysqli_begin_transaction($conn);

    $sql1 = "INSERT INTO product (user_id, pd_type_id,fee_id, pd_name, pd_detail, pd_price_start, pd_img, pd_condition,pd_start_show_date, pd_start_date, pd_end_date) 
    VALUES (? ,?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt1 = mysqli_prepare($conn, $sql1);
    mysqli_stmt_bind_param($stmt1, "iiissssssss", $user_id, $pd_type_id, $fee_id, $pd_name, $pd_detail, $pd_price_start, $image_json, $pd_condition, $oneDaysLaterFormatted, $fourDaysLaterFormatted, $elevenDaysLaterFormatted);

    if (mysqli_stmt_execute($stmt1)) {
        $lastProduct = mysqli_insert_id($conn);

        $sql2 = "INSERT INTO order_tb (order_id, pd_id) VALUES (?, ?)";
        $stmt2 = mysqli_prepare($conn, $sql2);
        mysqli_stmt_bind_param($stmt2, "ii", $lastProduct, $lastProduct);

        if (mysqli_stmt_execute($stmt2)) {
            // ทำการ Commit ข้อมูลเมื่อสำเร็จ
            mysqli_commit($conn);
            echoJson_status_msg("success", "เพิ่มสินค้าสำเร็จ");
        } else {
            mysqli_rollback($conn);
            echoJson_status_msg("error", "mysqli_error($conn)");
        }
    } else {
        mysqli_rollback($conn);
        echoJson_status_msg("error", "mysqli_error($conn)");
    }

    mysqli_close($conn);
}

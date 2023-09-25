<?php
session_start();
include '../db/db_conn.php';

if (isset($_POST) && $_SESSION['user_type'] == 2 || $_SESSION['user_type'] == 0) {
    $pd_id          = $_POST['pd_id'];
    $pd_type_id     = $_POST['pd_type_id'];
    $pd_name        = $_POST['pd_name'];
    $pd_detail      = $_POST['pd_detail'];
    $pd_condition   = $_POST['pd_condition'];
    $pd_price_start = $_POST['pd_price_start'];
    // $user_id        = $_SESSION['user_login'];
    // // =====================================================================================
    // date_default_timezone_set('Asia/Bangkok');
    // $currentTime = strtotime('today 12:00'); // เวลาปัจจุบันในรูปแบบ timestamp
    // // =====================================================================================
    // $oneDaysLater = strtotime('+1 days', $currentTime); // คำนวณเวลา 4 วันนับจากปัจจุบัน
    // $oneDaysLaterFormatted = date('Y-m-d\TH:i', $oneDaysLater); // แปลงเป็นรูปแบบ date
    // // =====================================================================================
    // $fourDaysLater = strtotime('+4 days', $currentTime); // คำนวณเวลา 4 วันนับจากปัจจุบัน
    // $fourDaysLaterFormatted = date('Y-m-d\TH:i', $fourDaysLater); // แปลงเป็นรูปแบบ date
    // // =====================================================================================
    // $elevenDaysLater = strtotime('+11 days', $currentTime); // คำนวณเวลา 11 วันนับจากปัจจุบัน
    // $elevenDaysLaterFormatted = date('Y-m-d\TH:i', $elevenDaysLater); // แปลงเป็นรูปแบบ date
    // // =====================================================================================

    // เลือกรูปภาพ
    $sql = "SELECT pd_img FROM product WHERE pd_id = $pd_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $pd_img = $row['pd_img'];
    $pd_img_arr = json_decode($pd_img, true);


    // Handle multiple images
    if (isset($_FILES['main-img-pd-input']['name']) && !empty($_FILES['main-img-pd-input']['name'])) {
        // echo "upload main";

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
                echoJson_status_msg("error", "Error uploading main image $mainImageName");
            }
        } else {
            echoJson_status_msg("error", "Invalid file type for main image <ins><b>$mainImageName</b></ins> <br> Please use image file extensions <b>jpeg , jpg , png.</b>");
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
                        echoJson_status_msg("error", "Error uploading sub image $subImageName");
                    }
                } else {
                    echoJson_status_msg("error", "Invalid file type for sub image <ins><b>$subImageName</b></ins> <br> Please use image file extensions <b>jpeg , jpg , png.</b>");
                }
            }
        }
        $image_json = json_encode($uploaded_filenames);

        $uploadPath = '../upload/product/';
        foreach ($pd_img_arr as $file) {
            $filePath = $uploadPath . $file;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        
    } else {
        if (!empty($_FILES['sub-img-pd-input']['name'][0])) {
            echoJson_status_msg("error", "Unable to upload secondary images only. <br> Please upload the main image as well.");
        }
        $image_json = $pd_img; // No images uploaded
        // echo "ไม่ได้กดเพิ่มรูป";
    }

    // เริ่มการทำงานแบบ Transaction


    // $sql1 = "INSERT INTO product (user_id, pd_type_id, pd_name, pd_detail, pd_price_start, pd_img, pd_condition,pd_start_show_date, pd_start_date, pd_end_date) 
    // VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $sql1 = "UPDATE product SET pd_type_id=?,pd_name=?,pd_detail=?,pd_price_start=?,pd_img=?,pd_condition=? WHERE pd_id = ?";

    $stmt1 = mysqli_prepare($conn, $sql1);
    mysqli_stmt_bind_param($stmt1, "ssssssi", $pd_type_id, $pd_name, $pd_detail, $pd_price_start, $image_json, $pd_condition, $pd_id);

    if (mysqli_stmt_execute($stmt1)) {
        mysqli_commit($conn);

        echoJson_status_msg("success", "Product update successfully");
    } else {
        mysqli_rollback($conn);
        echoJson_status_msg("error", "mysqli_error($conn)");
    }
    mysqli_close($conn);
}

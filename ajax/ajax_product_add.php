<?php
session_start();
include '../db/db_conn.php';

if (isset($_POST) && $_SESSION['user_type'] == "2") {
    $user_id        = $_SESSION['user_login'];
    $pd_type_id     = $_POST['pd_type_id'];
    $pd_name        = $_POST['pd_name'];
    $pd_detail      = $_POST['pd_detail'];
    $pd_condition   = $_POST['pd_condition'];
    $pd_price_start = $_POST['pd_price_start'];

    // =====================================================================================
    date_default_timezone_set('Asia/Bangkok');
    $currentTime = strtotime('today 12:00'); // เวลาปัจจุบันในรูปแบบ timestamp
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
                echo 'Error uploading main image';
            }
        } else {
            echo 'Invalid file type for main image';
        }

        // Handle the sub images
        foreach ($subImageNames as $key => $subImageName) {
            $ext = pathinfo($subImageName, PATHINFO_EXTENSION);
            if (in_array($ext, $extension)) {
                // Generate a unique filename to avoid overwriting
                $subImageNewName = time() . '_sub_' . $key . '.' . $ext;

                if (move_uploaded_file($subImageTmpNames[$key], $target . $subImageNewName)) {
                    $uploaded_filenames[] = $subImageNewName;
                } else {
                    echo 'Error uploading sub image ' . $subImageName;
                }
            } else {
                echo 'Invalid file type for sub image ' . $subImageName;
            }
        }

        $image_json = json_encode($uploaded_filenames);
    } else {
        $image_json = '[]'; // No images uploaded
    }

    $sql = "INSERT INTO `product` (`user_id`, `pd_type_id`, `pd_name`, `pd_detail`, `pd_price_start`, `pd_img`, `pd_condition`, `pd_start_date`, `pd_end_date`) 
        VALUES ('$user_id', '$pd_type_id', '$pd_name', '$pd_detail', '$pd_price_start', '$image_json', '$pd_condition', '$fourDaysLaterFormatted', '$elevenDaysLaterFormatted')";
    
    if (mysqli_query($conn, $sql)) {
        // echo '<script>alert("Product added successfully"); window.location.href = "?page=product";</script>';
        echo "Success";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

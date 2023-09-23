<?php
    if (isset($_GET['user_id']) && !empty($_GET['user_id'])) {
        mysqli_begin_transaction($conn);
        $sql = "DELETE FROM login WHERE user_id = " . $_GET['user_id'];
        $result = mysqli_query($conn, $sql);
        $sql2 = "DELETE FROM user_detail WHERE user_id = " . $_GET['user_id'];
        $result2 = mysqli_query($conn, $sql2);
        if ($result && $result2) {
            mysqli_commit($conn);
            echo_js_alert("ลบข้อมูลสำเร็จ", "back");
        } else {
            mysqli_rollback($conn);
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
?>
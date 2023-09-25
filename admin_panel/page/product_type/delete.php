<?php
    if (isset($_GET['pd_type_id']) && !empty($_GET['pd_type_id'])) {
        $sql = "DELETE FROM product_type WHERE pd_type_id = " . $_GET['pd_type_id'];
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo_js_alert("ลบข้อมูลสำเร็จ", "back");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
?>
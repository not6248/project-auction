<?php
    if (isset($_GET['prefix_id']) && !empty($_GET['prefix_id'])) {
        $sql = "DELETE FROM prefix WHERE prefix_id = " . $_GET['prefix_id'];
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo_js_alert('ลบข้อมูลสำเร็จ','back');
            // $alert = '<script>';
            // $alert .= 'alert("ลบข้อมูลสำเร็จ");';
            // $alert .= 'history.back();';
            // $alert .= '</script>';
            // echo $alert;
            // exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
?>
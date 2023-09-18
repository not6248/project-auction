<?php
    if (isset($_GET['dlvt_id']) && !empty($_GET['dlvt_id'])) {
        $sql = "DELETE FROM delivery_type WHERE dlvt_id = " . $_GET['dlvt_id'];
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $alert = '<script>';
            $alert .= 'alert("ลบข้อมูลสำเร็จ");';
            $alert .= 'history.back();';
            $alert .= '</script>';
            echo $alert;
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
?>
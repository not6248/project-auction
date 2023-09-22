<?php
    if (isset($_GET['bank_id']) && !empty($_GET['bank_id'])) {
        $sql = "DELETE FROM bank WHERE bank_id = " . $_GET['bank_id'];
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
<?php
if (isset($_GET['fee_id']) && !empty($_GET['fee_id'])) {
    $fee_id = $_GET['fee_id'];
    $chack = "SELECT * FROM `fee` WHERE fee_id = $fee_id AND fee_active = 1";
    $result = mysqli_query($conn, $chack);
    if (mysqli_num_rows($result) > 0) {
        echo_js_alert('ไม่สามารถลบค่าบริการที่กำลังเปิดใช้งานได้', 'back');
    } else {
        $sql = "DELETE FROM fee WHERE fee_id = " . $_GET['fee_id'];
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo_js_alert('ลบข้อมูลสำเร็จ', 'back');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

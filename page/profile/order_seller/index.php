<?php 
if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 2) {
    echo '<script>window.location.href = "./?page=profile";</script>';
    exit; // ออกจากการทำงานของสคริปต์ PHP เพื่อป้องกันการแสดงผลเนื้อหาหลังจากนี้
}?>
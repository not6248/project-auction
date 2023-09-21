<?php
if (!isset($_SESSION['user_login']) && empty($_SESSION['user_login'])) {
    echo '<script>window.location.href = "./";</script>';
    exit; // ออกจากการทำงานของสคริปต์ PHP เพื่อป้องกันการแสดงผลเนื้อหาหลังจากนี้
} elseif ((isset($_GET['subpage']) && in_array($_GET['subpage'], ['product', 'order_seller']))) {
    //เช็ค page ที่จำเป็นต้องเช็ค user_type
    if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 2) {
        echo '<script>window.location.href = "./?page=profile";</script>';
        exit; // ออกจากการทำงานของสคริปต์ PHP เพื่อป้องกันการแสดงผลเนื้อหาหลังจากนี้
    }
} ?>

<!-- product -->
<!-- order_seller -->
<div class="container py-5">
    <div class="row mt-5">
        <div class="col">
            <?php include 'menu.php' ?>
        </div>
        <div style="min-height: 80vh;" class="col-sm-auto col-md-8 col-lg-8 col-xl-9 col-xxl-9">
            <?php
            $subpage = isset($_GET['subpage']) ? $_GET['subpage'] : '';
            $function = isset($_GET['function']) ? $_GET['function'] : '';

            switch ($subpage) {
                case '':
                    include 'profile_detail/index.php';
                    break;
                case 'order_bidder':
                    if ($function == 'delivery') {
                        include 'order_bidder/delivery.php';
                    } else {
                        include 'order_bidder/index.php';
                    }
                    break;
                case 'order_seller':
                    if ($function == 'delivery') {
                        include 'order_seller/delivery.php';
                    } else {
                    include 'order_seller/index.php';
                    }
                    break;
                case 'favorite':
                    include 'favorite/index.php';
                    break;
                case 'product':
                    if ($function == 'add') {
                        include 'product/insert.php';
                    } elseif ($function == 'update') {
                        include 'product/edit.php';
                    } else {
                        include 'product/index.php';
                    }
                    break;
                default:
                    include 'profile_detail/index.php';
                    break;
            }
            ?>
        </div>
    </div>
</div>
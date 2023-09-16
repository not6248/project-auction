<?php
$pd_id = $_GET['pd_id'];
$user_id = $user_id = $_SESSION['user_login'] ?? "";
$sql = "SELECT * FROM product_with_username WHERE pd_id = $pd_id";
$sql2 = "SELECT * FROM order_summary WHERE order_id = $pd_id";
$sql3 = "SELECT * FROM last_user_bid WHERE order_id = $pd_id";
$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);
$result3 = mysqli_query($conn, $sql3);
$row_order_summary = mysqli_fetch_assoc($result2);
if(mysqli_num_rows($result3) > 0){
    $row_last_bid = mysqli_fetch_assoc($result3);
    $username_last_bid = $row_last_bid['username'];
    $username_last_bid_id = $row_last_bid['latest_bidder'];
}else{
    $username_last_bid= "ยังไม่มีผู้ประมูล";
    $username_last_bid_id = "";
}

if (!mysqli_num_rows($result) > 0) {
    echo '<script>history.back();</script>';
    exit; // ออกจากการทำงานของสคริปต์ PHP เพื่อป้องกันการแสดงผลเนื้อหาหลังจากนี้
}

foreach ($result as $row) :
    $image_json = $row['pd_img'];
    $pd_img = json_decode($image_json);
    $pd_status = $row['pd_status'];
    if($pd_status == 0){
        echo '<script>history.back();</script>';
        exit; // ออกจากการทำงานของสคริปต์ PHP เพื่อป้องกันการแสดงผลเนื้อหาหลังจากนี้
    }
    $isFirst = true;
?>
    <div class="container mt-xl-5 pt-xl-0 w-100 m-auto">
        <div class="row justify-content-center">

            <!-- แสดงภาพ ========================== -->
            <?php include 'show_img.php' ?>
            <!-- รายละเอียด ========================= -->
            <?php include 'info.php' ?>
            <!-- หน้าต่าง bid ======================= -->
            <?php include 'bid_menu.php' ?>
            <!-- modal bid ======================== -->
            <?php include 'bid_modal.php' ?>
            <!--  ================================= -->

        </div>
        <div class="row pt-lg-0 mt-lg-4" style="padding-top: 0px;">
            <?php include 'description.php' ?>
        </div>
    </div>
<?php
endforeach
?>
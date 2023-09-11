<?php
$pd_id = $_GET['pd_id'];
$sql = "SELECT p.*,l.username FROM product p INNER JOIN login l USING(user_id) WHERE pd_id = $pd_id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) < 1) {
    echo '<script>window.location.href = "./";</script>';
    exit; // ออกจากการทำงานของสคริปต์ PHP เพื่อป้องกันการแสดงผลเนื้อหาหลังจากนี้
}
foreach ($result as $row) :
    $image_json = $row['pd_img'];
    $pd_img = json_decode($image_json);
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
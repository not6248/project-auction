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
        <div></div>
        <div class="row justify-content-center">
                <?php include 'show_img.php' ?> <!-- show_img -->
            <div class="col-sm-10 col-md-5 d-lg-none pt-0 mt-4 mb-4 mt-md-0 ms-sm-0 ps-sm-0 pe-sm-0" style="text-align: left;">
                <?php include 'bid_menu.php' ?> <!-- Mobile -->
            </div>
            <?php include 'info.php' ?> <!-- info -->
            <div class="col-md-11 col-lg-4 d-none d-sm-none d-md-none d-lg-block">
                <?php include 'bid_menu.php' ?> <!-- PC -->
            </div>
        </div>
        <div class="row pt-lg-0 mt-lg-4" style="padding-top: 0px;">
            <div class="col-lg-4 col-xl-4 d-none d-lg-block"></div>
            <div class="col-12 col-sm-9 col-lg-7 col-xl-7 col-xxl-7 ps-md-4 ps-4 ps-lg-3 pt-0 mt-4 mt-lg-0">
                <div style="border-bottom-style: solid;border-bottom-color: #3E168E;">
                    <div style="background: #3E168E;border-radius: 0;border-top-left-radius: 6px;border-top-right-radius: 6px;width: 186px;" class="ps-xl-2 pe-xl-0 mt-0 pt-1"><span style="color: rgb(255,255,255);" class="ps-3 ms-0 ms-xl-0 ps-xl-2 mt-xl-0 pt-0">คำอธิบายเกี่ยวกับสินค้า</span></div>
                </div>
                <div class="mt-3 mb-4">
                    <span class="mt-2" style="color: rgb(0, 0, 0);">
                        <?= $row['pd_detail'] ?>
                        <!-- Lorem ipsum dolor sit amet, consectetur adipiscing
                    elit. Etiam feugiat ante at arcu ultrices, sed convallis nibh volutpat. Sed porttitor varius
                    cursus. Maecenas a erat congue mauris scelerisque iaculis. Quisque eu sem vulputate ante semper
                    sagittis. Praesent sollicitudin leo dictum nunc efficitur gravida sed nec erat. Sed ex augue,
                    volutpat nec neque ut, fermentum vestibulum purus. Aenean quam massa, placerat eget ornare eget,
                    vulputate at sapien. Fusce volutpat massa imperdiet, accumsan leo nec, fermentum felis.Donec
                    tincidunt luctus velit, id fringilla libero commodo sit amet. Class aptent taciti sociosqu ad  -->
                    </span>
                </div>
            </div>
        </div>

    </div>
<?php
endforeach
?>
<?php
update_status($conn);

$sql = "SELECT * FROM product WHERE pd_status = 2";
if (isset($_GET['filter_product_typeID']) && !empty($_GET['filter_product_typeID'])) {
    $sql .= " AND pd_type_id = '" . $_GET['filter_product_typeID'] . "'";
}
// echo $sql;
//เลือกสินค้าที่เป็นสถานะที่ให้แสดงบนหน้าเว็บเท่านั้น
// $sql .= "GROUP BY product_tb.product_id;";
$query_product = mysqli_query($conn, $sql);


?>

<?php if (mysqli_num_rows($query_product) > 0) :
    foreach ($query_product as $row) :
        $image_json = $row['pd_img'];
        $image_filenames = json_decode($image_json);

        if (isset($image_filenames[0])) {
            $selected_image = "upload/product/" . $image_filenames[0];
        } else {
            $selected_image = "assets/img/pre_img.png";
        }

        $pd_id = $row['pd_id'];

        $sql2 = "SELECT * FROM order_summary WHERE order_id = $pd_id";
        $result2 = mysqli_query($conn, $sql2);
        $row_order_summary = mysqli_fetch_assoc($result2);
        $price_now = number_format($row_order_summary['total_price'], 0);

        $pdDetail = $row['pd_detail'];
        if (mb_strlen($pdDetail, 'UTF-8') > 70) {
            $pdDetail = mb_substr($pdDetail, 0, 70, 'UTF-8') . '...';
        }

?>
        <div class="col-sm-6 col-lg-4 col-xl-3">
            <div class="card hover-p">
                <!-- ภาพสินค้า -->
                <a href="./?page=product&pd_id=<?= $pd_id ?>"><img class="card-img-top w-100 d-block fit-cover" style="height: 300px;" src="<?= $selected_image ?>"></a>
                <div class="card-body p-4 ps-xl-2 pe-xl-2">
                    <!-- ชื่อสินค้า -->
                    <h4 class="card-title" style="font-size: 18px;font-family: 'Baloo Thambi 2', serif;font-weight: bold;"><?= $row['pd_name'] ?></h4>
                    <!-- รายละเอียด -->
                    <p style="height: 48px;" class="card-text"><?= $pdDetail ?></p>
                    <div class="row mb-3" style="color: rgb(13,110,253);">
                        <div class="col-4">
                    <!-- ราคาปัจจุบัน -->
                            <h6 style="font-weight: bold;" class="mb-xl-0 pb-xl-2">ราคาปัจจุบัน</h6>
                            <span><?= $price_now ?> ฿</span>
                        </div>
                    <!-- เวลาที่เหลือ -->
                        <div class="col-8 text-end">
                            <h6 style="font-weight: bold;" class="mb-xl-0 pb-xl-2">เวลาที่เหลือ</h6>
                            <span id="product-timeleftID-<?= $pd_id ?>">xx:xx:xx</span>
                        </div>
                    </div>
                    <div class="d-flex">
                        <a href="./?page=product&pd_id=<?= $pd_id ?>" class="btn btn-dark" type="button" style="font-weight: bold;width: 100%;">Start Bidding</a>
                    </div>
                </div>
                <?php if (isset($_SESSION['user_login']) && $row['user_id'] == $_SESSION['user_login']) : ?>
                    <h5> <span class="position-absolute top-0 end-0 badge rounded-pill bg-primary  ">
                            You Product
                        </span></h5>
                <?php endif ?>
            </div>
        </div>
        <?php 
           $pd_start_date = $row['pd_start_date'];
           $pd_end_date = $row['pd_end_date'];
           // $pd_start_show_date = $row['pd_start_show_date'];
           ?>
        <script>
            countdown_time("product-timeleftID-<?= $pd_id ?>","", "<?=$pd_start_date?>", "<?=$pd_end_date?>");
        </script>
    <?php endforeach ?>
<?php else : ?>
    <p>No products found for this product type.</p>
<?php endif ?>
<?php
include '../db/db_conn.php';

$productTypeID = $_GET['pd_type_id'];

$sql = "SELECT * FROM `product` WHERE pd_type_id  = $productTypeID";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) :
    foreach ($result as $row) :?>
        <div class="col-sm-6 col-lg-4 col-xl-3">
            <div class="card hover-p">
                <img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png">
                <div class="card-body p-4 ps-xl-2 pe-xl-2">
                    <h4 class="card-title" style="font-size: 18px;font-family: 'Baloo Thambi 2', serif;font-weight: bold;"><?= $row['pd_name'] ?></h4>
                    <?php
                    $pdDetail = $row['pd_detail'];
                    if (mb_strlen($pdDetail, 'UTF-8') > 70) {
                        $pdDetail = mb_substr($pdDetail, 0, 70, 'UTF-8') . '...';
                    }
                    ?>
                    <p style="height: 48px;" class="card-text"><?= $pdDetail ?></p>
                    <div class="row mb-3" style="color: rgb(13,110,253);">
                        <div class="col-6 col-xl-6">
                            <h6 style="font-weight: bold;" class="mb-xl-0 pb-xl-2">ราคาปัจจุบัน</h6>
                            <span><?=$row['pd_price_start']?>฿</span>
                        </div>
                        <div class="col-6 col-xl-6 text-end">
                            <h6 style="font-weight: bold;" class="mb-xl-0 pb-xl-2">เวลาที่เหลือ</h6>
                            <span id="product-timeleftID-<?=$row['pd_id']?>">xx:xx:xx</span>
                        </div>
                    </div>
                    <div class="d-flex">
                        <a href="./?page=product&pd_id=<?=$row['pd_id']?>" class="btn btn-dark" type="button" style="font-weight: bold;width: 100%;">Start Bidding</a>
                    </div>
                </div>
            </div>
        </div>
        <script>
            // countdown_time("product-timeleftID-<?//=$row['pd_id']?>","<?//=$row['pd_end_date']?>");
        </script>
    <?php endforeach ?>
<?php else : ?>
    <p>No products found for this product type.</p>
<?php endif ?>
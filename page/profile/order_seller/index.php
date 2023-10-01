<?php
$user = $_SESSION['user_login'];
$sql = "SELECT l.*,p.*,o.end_price,pay.pay_status,d.dlv_status,d.dlv_code FROM last_user_bid AS l 
INNER JOIN product AS p ON l.order_id = p.pd_id 
INNER JOIN order_tb AS o ON o.order_id = p.pd_id
LEFT JOIN payment AS pay ON pay.pay_id = p.pd_id
LEFT JOIN delivery AS d ON d.dlv_id = p.pd_id
WHERE o.order_status = 3 AND (pay.pay_status IS NULL OR pay.pay_status != 4) AND p.user_id = $user;";
$sql2 = "SELECT * FROM order_tb AS o
INNER JOIN product AS pd ON o.pd_id = pd.pd_id
INNER JOIN product_type AS pdt ON pd.pd_type_id = pdt.pd_type_id
INNER JOIN payment AS pay ON pay.pay_id = pd.pd_id
INNER JOIN delivery AS d ON d.dlv_id = pd.pd_id
INNER JOIN delivery_type AS dt ON dt.dlvt_id = d.dlvt_id
WHERE o.order_status = 3 AND pay.pay_status = 4 AND d.dlv_status = 2 AND user_id = $user;";
$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);
$sum = '0';
while ($rowsum = mysqli_fetch_assoc($result2)) {
    $detailsum = json_decode($rowsum['order_details'], true);
    $sum += $rowsum['end_price'] - ($rowsum['end_price'] * $detailsum[0]['fee_percent'] / 100);
}
?>
<div class="card" style="background: rgb(236,238,249);box-shadow: 0px 4px 4px rgba(33,37,41,0.25);">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h4 class="card-title mb-0" style="font-size: 28px;">ออเดอร์ ผู้ขายสินค้า</h4>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="card">
                    <div class="card-body">รายได้รวม : <?=$sum?> บาท</div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="background: #D8DBE9;">
                        <h4 style="color: rgb(84,88,94);" class="mb-0">ออเดอร์ (รายการสมบูรณ์แล้ว)</h4>
                    </div>
                    <div class="card-body" style="background: #ECEEF9;">
                        <?php
                        if (mysqli_num_rows($result2) > 0) :
                            $i = 1 ?>
                            <table id="seller_product_list1" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">ลำดับ</th>
                                        <th scope="col">รูปภาพ</th>
                                        <th scope="col">ชื่อ</th>
                                        <th scope="col">ราคาจบประมูล</th>
                                        <th scope="col">ราคาที่ผู้ขายได้รับ</th>
                                        <th scope="col">สถานะ ออเดอร์</th>
                                        <!-- <th scope="col">สถานะการจ่ายเงิน</th> -->
                                        <th scope="col">เมนู</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($result2 as $row) :
                                        $image_json = $row['pd_img'];
                                        $pd_id = $row['pd_id'];
                                        $end_price = number_format($row['end_price'], 0);
                                        $detail = json_decode($row['order_details'], true);
                                        $pd_img = json_decode($image_json);
                                        $pd_name = $row['pd_name'];
                                        $scr_img = "./upload/product/$pd_img[0]";
                                        $delivery_link = "./?page=" . $_GET['page'] . "&subpage=" . $_GET['subpage'] . "&function=delivery&order_id=$pd_id";
                                        $pay_status = $row['pay_status'] ?? "0";
                                        $dlv_status = $row['dlv_status'] ?? "0";
                                    ?>
                                        <tr>
                                            <th scope="row"><?= $i++ ?></th>
                                            <td><img class=" fit-cover rounded-0" width="80" height="80" src="<?= $scr_img ?>"></td>
                                            <td><?= $pd_name ?></td>
                                            <td><?= $end_price ?> บาท</td>
                                            <td><?= number_format($row['end_price'] - ($row['end_price'] * ($detail[0]['fee_percent'] / 100)), 2) ?> บาท</td>
                                            <td><?= order_profile_status($status_name_arr, $pay_status, $dlv_status, "s") ?></td>
                                            <!-- <td></td> -->
                                            <td class="">
                                                <a class="btn btn-primary btn-sm" href="<?= $delivery_link ?>" role="button">รายละเอียด</a>
                                            </td>
                                            <?php include 'page/profile/order_bidder/payment_modal.php' ?>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <p class="text-center text-muted mt-3">ไม่มีสินค้า</p>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="background: #D8DBE9;">
                        <h4 style="color: rgb(84,88,94);" class="mb-0">ออเดอร์</h4>
                    </div>
                    <div class="card-body" style="background: #ECEEF9;">
                        <?php
                        if (mysqli_num_rows($result) > 0) :
                            $i = 1 ?>
                            <table id="seller_product_list2" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">ลำดับ</th>
                                        <th scope="col">รูปภาพ</th>
                                        <th scope="col">ชื่อ</th>
                                        <th scope="col">ราคาจบประมูล</th>
                                        <th scope="col">สถานะ ออเดอร์</th>
                                        <!-- <th scope="col">สถานะการจ่ายเงิน</th> -->
                                        <th scope="col">เมนู</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($result as $row) :
                                        $image_json = $row['pd_img'];
                                        $pd_id = $row['pd_id'];
                                        $end_price = number_format($row['end_price'], 0);
                                        $pd_img = json_decode($image_json);
                                        $pd_name = $row['pd_name'];
                                        $scr_img = "./upload/product/$pd_img[0]";
                                        $delivery_link = "./?page=" . $_GET['page'] . "&subpage=" . $_GET['subpage'] . "&function=delivery&order_id=$pd_id";
                                        $pay_status = $row['pay_status'] ?? "0";
                                        $dlv_status = $row['dlv_status'] ?? "0";
                                    ?>
                                        <tr>
                                            <th scope="row"><?= $i++ ?></th>
                                            <td><img class=" fit-cover rounded-0" width="80" height="80" src="<?= $scr_img ?>"></td>
                                            <td><?= $pd_name ?></td>
                                            <td><?= $end_price ?> บาท</td>
                                            <td><?= order_profile_status($status_name_arr, $pay_status, $dlv_status, "s") ?></td>
                                            <!-- <td></td> -->
                                            <td class="">
                                                <a class="btn btn-primary btn-sm" href="<?= $delivery_link ?>" role="button">รายละเอียดการจัดส่ง</a>
                                            </td>
                                            <?php include 'page/profile/order_bidder/payment_modal.php' ?>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <p class="text-center text-muted mt-3">ไม่มีสินค้า</p>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    data_tb_th("#seller_product_list1");
    data_tb_th("#seller_product_list2");
</script>
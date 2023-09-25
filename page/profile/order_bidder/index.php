<?php
// $sql = "SELECT l.*,p.* FROM last_user_bid AS l INNER JOIN product AS p ON l.order_id = p.pd_id WHERE l.latest_bidder = " . $_SESSION['user_login'];
$sql = "SELECT l.*,p.*,o.end_price,pay.pay_status,d.dlv_status FROM last_user_bid AS l 
INNER JOIN product AS p ON l.order_id = p.pd_id 
INNER JOIN order_tb AS o ON o.order_id = p.pd_id
LEFT JOIN payment as pay ON pay.pay_id = p.pd_id
LEFT JOIN delivery AS d ON d.dlv_id = p.pd_id
WHERE o.order_status >= 3 AND l.latest_bidder =  " . $_SESSION['user_login'];
$result = mysqli_query($conn, $sql);
?>
<div class="card" style="background: rgb(236,238,249);box-shadow: 0px 4px 4px rgba(33,37,41,0.25);">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h4 class="card-title " style="font-size: 28px;">ออเดอร์ ผู้ประมูลสินค้า</h4>
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
                            <table id="seller_product_list" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">ลำดับ</th>
                                        <th scope="col">รูปภาพ</th>
                                        <th scope="col">ชื่อ</th>
                                        <th scope="col">ราคา</th>
                                        <th scope="col">สถานะ ออเดอร์</th>
                                        <th scope="col">สถานะการชำระเงิน</th>
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
                                        $pay_status = $row['pay_status'] ?? "0";
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
                                            <td><?= order_profile_status($status_name_arr,$pay_status,$dlv_status,"b") ?></td>
                                            <td><?= $pay_status_arr[$pay_status] ?></td>
                                            <td class="">
                                                <?php if ($pay_status == 0 || $pay_status == 2) : ?>
                                                    <button class="btn btn-warning btn-sm pay_btn" data-pd-id="<?= $row['pd_id'] ?>" data-bs-toggle="modal" data-bs-target="#pay_slip_img">ชำระเงิน <i class="fa-solid fa-money-bill-wave fa-bounce"></i></button>
                                                <?php elseif ($pay_status == 1) : ?>
                                                    <button disabled class="btn btn-primary btn-sm">รอการตรวจสอบ <i class="fa-solid fa-spinner fa-spin-pulse"></i></button>
                                                <?php elseif ($pay_status >= 3) : ?>
                                                    <a class="btn btn-primary btn-sm" href="<?= $delivery_link ?>" role="button">รายละเอียดการจัดส่ง</a>
                                                <?php endif ?>
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
    data_tb_th("#seller_product_list");
</script>
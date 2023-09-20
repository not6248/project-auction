<?php
// $sql = "SELECT l.*,p.* FROM last_user_bid AS l INNER JOIN product AS p ON l.order_id = p.pd_id WHERE l.latest_bidder = " . $_SESSION['user_login'];
$sql = "SELECT l.*,p.*,o.end_price,pay.pay_status,d.dlv_status,d.dlv_code FROM last_user_bid AS l 
INNER JOIN product AS p ON l.order_id = p.pd_id 
INNER JOIN order_tb AS o ON o.order_id = p.pd_id
LEFT JOIN payment AS pay ON pay.pay_id = p.pd_id
LEFT JOIN delivery AS d ON d.dlv_id = p.pd_id
WHERE o.order_status >= 3 AND p.user_id = " . $_SESSION['user_login'];
$result = mysqli_query($conn, $sql);
?>
<div class="card" style="background: rgb(236,238,249);box-shadow: 0px 4px 4px rgba(33,37,41,0.25);">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h4 class="card-title " style="font-size: 28px;">Order Seller</h4>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="background: #D8DBE9;">
                        <h4 style="color: rgb(84,88,94);" class="mb-0">Order</h4>
                    </div>
                    <div class="card-body" style="background: #ECEEF9;">
                        <?php
                        if (mysqli_num_rows($result) > 0) :
                            $i = 1 ?>
                            <table id="seller_product_list" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Img</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">สถานะ order</th>
                                        <th scope="col">สถานะการจ่ายเงิน</th>
                                        <th scope="col">Menu</th>
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
                                            <td><?= order_profile_status($status_name_arr,$pay_status,$dlv_status,"s") ?></td>
                                            <td></td>
                                            <td class="">
                                                <a class="btn btn-primary btn-sm" href="<?= $delivery_link ?>" role="button">รายละเอียดการจัดส่ง</a>
                                            </td>
                                            <?php include 'page/profile/order_bidder/payment_modal.php' ?>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <p class="text-center text-muted mt-3">no product</p>
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
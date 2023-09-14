<?php
$sql = "SELECT l.*,p.* FROM last_user_bid AS l INNER JOIN product AS p ON l.order_id = p.pd_id WHERE l.latest_bidder = " . $_SESSION['user_login'];
$result = mysqli_query($conn, $sql);
?>
<div class="card" style="background: rgb(236,238,249);box-shadow: 0px 4px 4px rgba(33,37,41,0.25);">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h4 class="card-title " style="font-size: 28px;">Order Bidder</h4>
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
                                        <th scope="col">Status</th>
                                        <th scope="col">Menu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($result as $row) :
                                        $image_json = $row['pd_img'];
                                        $pd_id = $row['pd_id'];
                                        $pd_img = json_decode($image_json);
                                        $pd_name = $row['pd_name'];
                                        $scr_img = "./upload/product/$pd_img[0]";
                                        $delivery_link = "./?page=" . $_GET['page'] . "&subpage=" . $_GET['subpage'] . "&function=delivery&order_id=$pd_id";
                                        $sql2 = "SELECT pay_status FROM payment WHERE pay_id = $pd_id";
                                        $result2 = mysqli_query($conn, $sql2);
                                        if($result2){
                                            if(mysqli_num_rows($result2) > 0){
                                                $row_pay = mysqli_fetch_assoc($result2);
                                                $pay_status = $row_pay['pay_status'];
                                            }else{
                                                $pay_status = "0";
                                            }
                                        }
                                    ?>
                                        <tr>
                                            <th scope="row"><?= $i++ ?></th>
                                            <td><img class=" fit-cover rounded-0" width="80" height="80" src="<?= $scr_img ?>"></td>
                                            <td><?= $pd_name ?></td>
                                            <td>บาท</td>
                                            <td>รอการราการชำระ</td>
                                            <td class="">
                                                <button class="btn btn-warning btn-sm <?=$pay_status !=0 && $pay_status != 2 ? "d-none" : ""?>" data-bs-toggle="modal" data-bs-target="#pay_slip_img">ชำระเงิน <i class="fa-solid fa-money-bill-wave fa-bounce"></i></button>
                                                <button disabled class="btn btn-primary btn-sm <?=$pay_status !=1 ? "d-none" : ""?>">รอการตรวจสอบ <i class="fa-solid fa-spinner fa-spin-pulse"></i></button>
                                                <a  class="btn btn-primary btn-sm <?=$pay_status !=3 ? "d-none" : ""?>" href="<?= $delivery_link ?>" role="button">รายละเอียดการจัดส่ง</a>
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
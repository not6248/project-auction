<?php
// $sql = "SELECT l.*,p.* FROM last_user_bid AS l INNER JOIN product AS p ON l.order_id = p.pd_id WHERE l.latest_bidder = " . $_SESSION['user_login'];
$user_login = $_SESSION['user_login'];
$pd_id = $_GET['order_id'];
$sql = "SELECT l.*,p.*,o.end_price,o.order_details,pay.pay_status,d.dlv_status,d.dlv_code,dt.dlvt_name,dt.dlvt_link FROM last_user_bid AS l 
INNER JOIN product AS p ON l.order_id = p.pd_id 
INNER JOIN order_tb AS o ON o.order_id = p.pd_id
LEFT JOIN payment AS pay ON pay.pay_id = p.pd_id
LEFT JOIN delivery AS d ON d.dlv_id = p.pd_id
LEFT JOIN delivery_type AS dt ON dt.dlvt_id = d.dlvt_id
WHERE o.order_status = 3 AND $user_login AND p.pd_id = $pd_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


$pay_status = $row['pay_status'] ?? "0";
$dlv_status = $row['dlv_status'] ?? "0";
$dlv_code = $row['dlv_code'] ?? "---";
$dlvt_name = $row['dlvt_name'] ?? "---";
$dlvt_link = $row['dlvt_link'] != "" ? $row['dlvt_link'] : "#" ;
$detail = json_decode($row['order_details'], true);
?>
<div class="card" style="background: rgb(236,238,249);box-shadow: 0px 4px 4px rgba(33,37,41,0.25);">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h4 class="card-title " style="font-size: 28px;">ติดตาม ออเดอร์</h4>
            <div>
                <h5 class="text-end">หมายเลขพัสดุ : <?= $dlv_code ?></h5>
                <h6 class="text-end">จัดส่งโดย : <?= $dlvt_name ?></h6>
                <?php if($dlvt_link != "#") : ?>
                <h6 class="text-end">เช็คเลขพัสดุ : <a href="<?= $dlvt_link ?>" target="_blank">ที่นี่</a></h6>
                <?php endif ?>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12">
                            <div class="card card-stepper text-black">
                                <div class="card-body p-5 pt-4">
                                    <div class="container">
                                        <div class="mb-5">
                                        </div>
                                        <div class="row justify-content-between">

                                            <div class="order-tracking <?= $pay_status >= 0 && $dlv_status >= 0 ? "completed" : "" ?> ">
                                                <span class="is-complete"></span>
                                                <p class="mt-4"><i class="fa-solid fa-clipboard-list fa-lg"></i> มีคำสั่งซื้อ</p>
                                            </div>
                                            <div class="order-tracking <?= $pay_status >= 2 && $dlv_status >= 1 ? "completed" : "" ?>">
                                                <span class="is-complete "></span>
                                                <p class="mt-4"><i class="fa-solid fa-box-open fa-lg"></i> คำสั่งซื้อที่ได้ทำการจัดส่งแล้ว</p>
                                            </div>
                                            <div class="order-tracking <?= $pay_status >= 3 && $dlv_status >= 2 ? "completed" : "" ?>">
                                                <span class="is-complete"></span>
                                                <p class="mt-4"><i class="fa-solid fa-house"></i> ฉันได้ตรวจสอบและ<br>ยอมรับสินค้า</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 ms-4">สถานะ : <?= order_profile_status($status_name_arr, $pay_status, $dlv_status, "s") ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12">
                            <div class="card card-stepper text-black">
                                <div class="card-body p-5 pt-4">
                                <div class="row mb-3">
                                        <div class="col">
                                            <div class="card ">
                                                <div class="card-body">
                                                    <h6 class="card-title mb-0">สินค้า : <?= $row['pd_name'] ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">ที่อยู่ในการจัดส่ง</h5>
                                                    <h6 class="card-subtitle mt-2"><?= $detail[0]['bidder_fname'] ?> <?= $detail[0]['bidder_lname'] ?></h6>
                                                    <p class="card-text mb-0 text-body-secondary"><?= $detail[0]['bidder_phone'] ?></p>
                                                    <p class="card-text text-body-secondary"><?= $detail[0]['bidder_address'] ?></p>
                                                </div>
                                            </div>
                                            <?php if( $pay_status >= 3 && $dlv_status >= 2) :?>
                                            <div class="card mt-3">
                                                <div class="card-body">
                                                    <h5 class="card-title">สถานะการชำระเงินจากแอดมิน</h5>
                                                    <?php if( $pay_status == 4 && $dlv_status >= 2) :?>
                                                    <h6 class="card-subtitle mt-2 text-success ">เว็บไซต์ได้ทำการโอนเงินให้กับผู้ขายแล้ว <i class="fa-solid fa-circle-check"></i></i></h6>
                                                    <?php else : ?>
                                                        <h6 class="card-subtitle mt-2 text-body-secondary">อยู่ระหว่างดำเนินการ <i class="fa-solid fa-spinner fa-spin-pulse"></i></h6>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                            <?php endif ?>
                                        </div>
                                        <div class="col-7">
                                            <table class="table text-end table-bordered ">
                                                <tbody>
                                                    <tr>
                                                        <td class="w-50">รวมค่าสินค้า</td>
                                                        <td class="w-25"><?= $row['end_price'] ?>฿</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-50">ค่าบริการ <?=$detail[0]['fee_percent']?>%</td>
                                                        <td class="w-25">-<?= $row['end_price'] * ($detail[0]['fee_percent']/100) ?>฿</td>
                                                    </tr>
                                                    <!-- <tr>
                                                        <td class="w-50">รวมการสั่งซื้อ</td>
                                                        <td class="w-25"><span class=" text-primary "><?= $row['end_price'] - ($row['end_price'] * ($detail[0]['fee_percent']/100)) ?>฿</span></td>
                                                    </tr> -->
                                                    <!-- <tr>
                                                        <td class="w-50">ค่าจัดส่ง</td>
                                                        <td class="w-25">0฿</td>
                                                    </tr> -->
                                                    <tr>
                                                        <td class="w-50">เงินที่ผู้ขายจะได้รับ</td>
                                                        <td class="w-25">
                                                            <h5 class=" text-primary "><?= number_format($row['end_price'] - ($row['end_price'] * ($detail[0]['fee_percent']/100)),2) ?>฿</h5>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer py-3">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 px-4">
                <div class="text-end">
                    <!-- <button <?php //$pay_status == 3 && $dlv_status >= 1 ? "disabled" : "" ?> class=" btn btn-primary me-2" type="submit" aria-describedby="emailHelp" data-bs-toggle="modal" data-bs-target="#tk_modal">กรอกเลขพัสดุ</button> -->
                    <?php if($pay_status == 3 && $dlv_status == 0) : ?>
                        <small id="emailHelp" class="form-text text-muted me-2">ใช้สำหรับกรอกหมายเลขพัสดุ เมื่อทำการส่งสินค้าแล้ว.</small>
                    <button class=" btn btn-primary me-2" type="submit" aria-describedby="emailHelp" data-bs-toggle="modal" data-bs-target="#tk_modal">กรอกเลขพัสดุ</button>
                    <?php endif ?>
                </div>
                <?php include 'page/profile/order_seller/tk_modal.php' ?>
            </div>
        </div>
    </div>
</div>
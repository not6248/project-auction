<?php
// $sql = "SELECT l.*,p.* FROM last_user_bid AS l INNER JOIN product AS p ON l.order_id = p.pd_id WHERE l.latest_bidder = " . $_SESSION['user_login'];
$user_login = $_SESSION['user_login'];
$pd_id = $_GET['order_id'];
$sql = "SELECT l.*,p.*,o.end_price,pay.pay_status,d.dlv_status,d.dlv_code,dt.dlvt_name FROM last_user_bid AS l 
INNER JOIN product AS p ON l.order_id = p.pd_id 
INNER JOIN order_tb AS o ON o.order_id = p.pd_id
LEFT JOIN payment AS pay ON pay.pay_id = p.pd_id
LEFT JOIN delivery AS d ON d.dlv_id = p.pd_id
LEFT JOIN delivery_type AS dt ON dt.dlvt_id = d.dlvt_id
WHERE o.order_status >= 3 AND $user_login AND p.pd_id = $pd_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$pay_status = $row['pay_status'] ?? "0";
$dlv_status = $row['dlv_status'] ?? "0";
$dlv_code = $row['dlv_code'] ?? "---";
$dlvt_name = $row['dlvt_name'] ?? "---";
?>
<div class="card" style="background: rgb(236,238,249);box-shadow: 0px 4px 4px rgba(33,37,41,0.25);">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h4 class="card-title " style="font-size: 28px;">Order tracking</h4>
            <div>
                <h5 class="text-end">หมายเลขพัสดุ : <?= $dlv_code ?></h5>
                <h6 class="text-end">จัดส่งโดย : <?= $dlvt_name ?></h6>
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

                                            <div class="order-tracking <?= $pay_status <= 3 && $dlv_status >= 0 ? "completed" : "" ?> ">
                                                <span class="is-complete"></span>
                                                <p class="mt-4"><i class="fa-solid fa-clipboard-list fa-lg"></i> Order Processed</p>
                                            </div>
                                            <div class="order-tracking <?= $pay_status >= 3 && $dlv_status >= 1 ? "completed" : "" ?>">
                                                <span class="is-complete "></span>
                                                <p class="mt-4"><i class="fa-solid fa-box-open fa-lg"></i> Order Shipped</p>
                                            </div>
                                            <div class="order-tracking <?= $pay_status >= 3 && $dlv_status >= 2 ? "completed" : "" ?>">
                                                <span class="is-complete"></span>
                                                <p class="mt-4"><i class="fa-solid fa-house"></i> Order Arrived</p>
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
    </div>

    <div class="card-footer py-3">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 px-4">
                <div class="text-end">
                    <small id="emailHelp" class="form-text text-muted me-2">ใช้สำหรับกรอกหมายเลขพัสดุ เมื่อทำการส่งสินค้าแล้ว.</small>
                    <button class=" btn btn-primary me-2" type="submit" aria-describedby="emailHelp" data-bs-toggle="modal" data-bs-target="#tk_modal">กรอกเลขพัสดุ</button>
                </div>
                <?php include 'page/profile/order_seller/tk_modal.php' ?>
            </div>
        </div>

    </div>
</div>
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

$sql2 = "SELECT * FROM last_user_bid lub
INNER JOIN login l ON l.user_id = lub.latest_bidder
INNER JOIN user_detail ud ON ud.user_id = l.user_id
WHERE lub.order_id = $pd_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);

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

                                            <div class="order-tracking <?= $pay_status >= 1 && $dlv_status >= 0 ? "completed" : "" ?> ">
                                                <span class="is-complete"></span>
                                                <p class="mt-4"><i class="fa-solid fa-clipboard-list fa-lg"></i> มีคำสั่งซื้อ</p>
                                            </div>
                                            <div class="order-tracking <?= $pay_status >= 3 && $dlv_status >= 1 ? "completed" : "" ?>">
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
                                <p class="mt-3 ms-4">สถานะ : <?= order_profile_status($status_name_arr, $pay_status, $dlv_status, "b") ?></p>
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
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h6 class="card-title">ที่อยู่ในการจัดส่ง</h6>
                                                    <h6 class="card-subtitle mt-3 text-body-secondary"><?=$row2['ud_fname']?> <?=$row2['ud_lname']?></h6>
                                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <table class="table text-end table-bordered ">
                                                <tbody>
                                                    <tr>
                                                        <td class="w-50">Otto</td>
                                                        <td class="w-25">@mdo</td>
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
                <?php if ($pay_status >= 3 && $dlv_status == 1) : ?>
                    <div class="text-end">
                        <form id="accept-form" action="ajax/ajax_accept_order.php" method="post">
                            <small id="emailHelp" class="form-text text-muted me-2">ใช้กดยอมรับสินค้า เมื่อได้รับสินค้าแล้ว.</small>
                            <input type="hidden" name="accept_id" value="<?= $_GET['order_id'] ?>">
                            <button name="accept" type="submit" class=" btn btn-primary me-2">ได้รับสินค้าแล้ว</button>
                        </form>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
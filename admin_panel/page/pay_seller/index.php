<?php
$sql1 = "SELECT * FROM seller_pay WHERE dlv_status = 2 AND pay_status = 3";
$result1 = mysqli_query($conn, $sql1);

$sql2 = "SELECT * FROM seller_pay WHERE dlv_status = 2 AND pay_status = 4";
$result2 = mysqli_query($conn, $sql2);

if (isset($_POST['complete'])) {
    $order_id = $_POST['order_id'];
    $result1 = mysqli_query($conn, "UPDATE payment SET pay_status = '4' WHERE payment.pay_id = $order_id");
    if ($result1) {
        echo_js_alert("ยืนยันเรียบร้อย", "back");
    }
}
?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ยืนยันสลีปชำระเงิน</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-xl-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">ตาราง : รอการตรวจสอบสลีปชำระเงิน</h3>
                        </div>
                        <div class="card-body">
                            <?php if (mysqli_num_rows($result1) > 0) : ?>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#OrderID</th>
                                            <th scope="col">#ProductID</th>
                                            <th scope="col">ชื่อ-นามสกุล</th>
                                            <th scope="col">จำนวนเงินที่ต้องโอนให้คนขาย</th>
                                            <th scope="col">ชื่อธนารคาร</th>
                                            <th scope="col">เลขบัญชี</th>
                                            <th scope="col">เมนู</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($result1 as $row) :
                                            $detail = json_decode($row['order_details'], true); ?>
                                            <tr>
                                                <th scope="row"><?= $row['order_id'] ?></th>
                                                <td><?= $row['pd_id'] ?></td>
                                                <td><?= $row['ud_fname'] . " " . $row['ud_lname'] ?></td>
                                                <td><?= number_format($detail[0]['end_price'] - ($detail[0]['end_price'] * ($detail[0]['fee_percent'] / 100)), 2) ?> บาท</td>
                                                <td><?= $row['bank_name'] ?></td>
                                                <td><?= $row['ud_bank_number'] ?></td>
                                                <td>
                                                    <form action="" method="post">
                                                        <input type="hidden" name="order_id" value="<?= $row['order_id'] ?>">
                                                        <button name="complete" type="submit" onclick="return confirm('คุณต้องการยืนยันตัวเลือกนี้หรือไม่หรือไม่')" class="btn btn-success">ยืนยีน</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            <?php else : ?>
                                <p class="text-center text-muted mt-3">ไม่มีข้อมูลสลีปชำระเงินที่ต้องยืนยันในขณะนี้</p>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-8 -->
                <div class="col-lg-12 col-xl-8">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">ตาราง : ตรวจสอบเรียบร้อย</h3>
                        </div>
                        <div class="card-body">
                            <?php if (mysqli_num_rows($result2) > 0) : ?>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#OrderID</th>
                                            <th scope="col">#ProductID</th>
                                            <th scope="col">ชื่อ-นามสกุล</th>
                                            <th scope="col">จำนวนเงินที่ต้องโอนให้คนขาย</th>
                                            <th scope="col">ชื่อธนารคาร</th>
                                            <th scope="col">เลขบัญชี</th>
                                            <th scope="col">สถานะ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($result2 as $row) :
                                            $detail = json_decode($row['order_details'], true); ?>
                                            <tr>
                                                <th scope="row"><?= $row['order_id'] ?></th>
                                                <td><?= $row['pd_id'] ?></td>
                                                <td><?= $row['ud_fname'] . " " . $row['ud_lname'] ?></td>
                                                <td><?= number_format($detail[0]['end_price'] - ($detail[0]['end_price'] * ($detail[0]['fee_percent'] / 100)), 2) ?> บาท</td>
                                                <td><?= $row['bank_name'] ?></td>
                                                <td><?= $row['ud_bank_number'] ?></td>
                                                <td>ชำระแล้ว</td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            <?php else : ?>
                                <p class="text-center text-muted mt-3">ไม่พบข้อมูล</p>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
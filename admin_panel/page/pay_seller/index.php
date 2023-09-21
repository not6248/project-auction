<?php
$sql1 = "SELECT * FROM delivery d 
INNER JOIN payment p ON p.order_id = d.order_id 
WHERE d.dlv_status = 2 AND p.pay_status = 3";
$result1 = mysqli_query($conn, $sql1);

$sql2 = "SELECT * FROM delivery d 
INNER JOIN payment p ON p.order_id = d.order_id 
WHERE d.dlv_status = 2 AND p.pay_status = 4";
$result2 = mysqli_query($conn, $sql2);
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
                <div class="col-lg-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">ตาราง : รอการตรวจสอบบัตรประชาชน</h3>
                        </div>
                        <div class="card-body">
                            <?php if (mysqli_num_rows($result1) > 0) : ?>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#user_id</th>
                                            <th scope="col">bank</th>
                                            <th scope="col">order_id</th>
                                            <th scope="col">pay_slip</th>
                                            <th scope="col">pay_status</th>
                                            <th scope="col">menu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($result1 as $row) : ?>
                                            <tr>
                                                <th scope="row"><?= $row['dlv_id'] ?></th>
                                                <td><?= $row['dlv_id'] ?></td>
                                                <td><?= $row['dlv_id'] ?></td>
                                                <td><?= $row['dlv_id'] ?></td>
                                                <td><?= $row['dlv_id'] ?></td>
                                                <td>
                                                    <a href="?page=<?= $_GET['page'] ?>&function=detail&order_id=<?= $row['order_id'] ?>" class="btn btn-info" role="button" aria-disabled="true">รายละเอียด</a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            <?php else : ?>
                                <p class="text-center text-muted mt-3">ไม่มีข้อมูลบัตรประชาชนที่ต้องยืนยันในขณะนี้</p>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-8 -->
                <div class="col-4">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">ตาราง : ตรวจสอบเรียบร้อย</h3>
                        </div>
                        <div class="card-body">
                            <?php if (mysqli_num_rows($result2) > 0) : ?>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#dlv_id</th>
                                            <th scope="col">bank</th>
                                            <th scope="col">pay_status</th>
                                            <th scope="col">menu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($result2 as $row) : ?>
                                            <tr>
                                                <th scope="row"><?= $row['dlv_id'] ?></th>
                                                <td><?= $row['dlv_id'] ?></td>
                                                <td><?= $row['dlv_id'] ?></td>
                                                <td>
                                                    <a href="?page=<?= $_GET['page'] ?>&function=detail&order_id=<?= $row['order_id'] ?>" class="btn btn-info" role="button" aria-disabled="true"><i class="fa-solid fa-info"></i></a>
                                                </td>
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
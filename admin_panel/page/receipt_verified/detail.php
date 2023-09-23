<?php
$pay_id = $_GET['pay_id'];
$sql = "SELECT * FROM payment INNER JOIN bank USING(bank_id) WHERE pay_id = $pay_id";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
?>

<?php
if (isset($_POST['complete'])) {
    $result = mysqli_query($conn, "UPDATE payment SET pay_status = '3' WHERE payment.pay_id = $pay_id");
    if ($result) {
        echo_js_alert("ยืนยันเรียบร้อย", "receipt_verified");
    }
} elseif (isset($_POST['incomplete'])) {
    $result = mysqli_query($conn, "UPDATE payment SET pay_status = '2' WHERE payment.pay_id = $pay_id");
    if ($result) {
        echo_js_alert("ยืนยันเรียบร้อย", "?page=receipt_verified");
    }
}
?>
<?php
// $order_id = $_POST['order_id'];
// $sql = "UPDATE order_tb o,key_tb k SET o.order_status = '1',k.key_status = '2' 
// WHERE k.order_id = '$order_id' 
// AND o.order_id = '$order_id';";
// $query = mysqli_query($conn, $sql);
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
                    <div class="card card-primary ">
                        <div class="card-header">
                            <h3 class="card-title">ตาราง</h3>
                        </div>
                        <div class="card-body">
                            <img width="940" height="1820" class="w-25 h-auto mb-5" src="../upload/receipt/<?= $data['pay_slip'] ?>" alt="no_img">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#pay_id</th>
                                        <th scope="col">bank</th>
                                        <th scope="col">order_id</th>
                                        <th scope="col">pay_slip</th>
                                        <th scope="col">pay_status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($result as $row) : ?>
                                    <tr>
                                        <th scope="row"><?= $row['pay_id'] ?></th>
                                        <td><?= $row['bank_name'] ?></td>
                                        <td><?= $row['order_id'] ?></td>
                                        <td><?= $row['pay_slip'] ?></td>
                                        <td><?= $row['pay_status'] ?></td>
                                        <?php endforeach ?>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end mt-3">
                                <?php if($row['pay_status'] == 1) : ?>
                                <form action="" method="post">
                                    <button type="submit" name="complete" class="btn btn-success" onclick="return confirm('คุณต้องการยืนยันตัวเลือกนี้หรือไม่หรือไม่')">ยืนยัน</button>
                                    <button type="submit" name="incomplete" class="btn btn-danger" onclick="return confirm('คุณต้องการยืนยัน รูปภาพไม่สมบูรณ์ หรือไม่หรือไม่')">รูปภาพไม่สมบูรณ์</button>
                                </form>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-8 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
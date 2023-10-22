<?php
$order_id = $_GET['order_id'];
$sql = "SELECT * FROM delivery d 
INNER JOIN payment p ON p.order_id = d.order_id 
WHERE d.dlv_status = 2 AND p.pay_status >= 3 AND d.order_id = $order_id";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
?>

<?php
if (isset($_POST['complete'])) {
    $result1 = mysqli_query($conn, "UPDATE payment SET pay_status = '4' WHERE payment.pay_id = $order_id");
    if ($result1) {
        echo_js_alert("ยืนยันเรียบร้อย", "?page=paid_seller");
    }
} elseif (isset($_POST['incomplete'])) {
    $result1 = mysqli_query($conn, "UPDATE user_detail SET ud_id_card = '0' WHERE user_detail.ud_id = $user_id");
    if ($result) {
        echo '<script>
            alert("ยืนยันเรียบร้อย");
            window.location.href = "?page=pay_seller";
        </script>';
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
                    <h1 class="m-0">ยืนยันโอนเงินให้กับผู้ขาย</h1>
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
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#user_id</th>
                                        <th scope="col">bank</th>
                                        <th scope="col">order_id</th>
                                        <th scope="col">pay_slip</th>
                                        <th scope="col">pay_status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($result as $row) : ?>
                                        <tr>
                                            <th scope="row"><?= $row['pay_status'] ?></th>
                                            <td><?= $row['pay_status'] ?></td>
                                            <td><?= $row['pay_status'] ?></td>
                                            <td><?= $row['pay_status'] ?></td>
                                            <td><?= $row['pay_status'] ?></td>
                                        <?php endforeach ?>
                                        </tr>
                                </tbody>
                            </table>
                            <!-- ud_id_card IS NULL AND ud_idcard_img IS NOT NULL;"; -->
                            <?php //if (is_null($row['ud_id_card']) && !empty($row['ud_idcard_img'])) :
                            ?>
                            <div class="row mt-3">
                                <div class="col d-flex justify-content-end">
                                    <form action="" method="post">
                                        <button type="submit" name="complete" class="btn btn-success mr-1" onclick="return confirm('คุณต้องการยืนยันตัวเลือกนี้หรือไม่หรือไม่')">ยืนยัน</button>
                                        <!-- <button type="submit" name="incomplete" class="btn btn-danger" onclick="return confirm('คุณต้องการยืนยัน รูปภาพไม่สมบูรณ์ หรือไม่หรือไม่')">รูปภาพไม่สมบูรณ์</button> -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php //endif 
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
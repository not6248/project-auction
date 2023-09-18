<?php
$user_id = $_GET['user_id'];
$sql = "SELECT * FROM login INNER JOIN user_detail USING(user_id) WHERE user_id = $user_id";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
?>

<?php
if (isset($_POST['complete'])) {
    $id_card_number = $_POST['id_card_number'];
    $result1 = mysqli_query($conn, "UPDATE user_detail SET ud_id_card = '$id_card_number' WHERE user_detail.ud_id = $user_id");
    $result2 = mysqli_query($conn, "UPDATE login SET user_type = '2' WHERE login.user_id = $user_id");
    if ($result1 && $result2) {
        echo '<script>
            alert("ยืนยันเรียบร้อย");
            window.location.href = "?page=receipt_verified";
        </script>';
    }
} elseif (isset($_POST['incomplete'])) {
    $result1 = mysqli_query($conn, "UPDATE user_detail SET ud_id_card = '0' WHERE user_detail.ud_id = $user_id");
    if ($result) {
        echo '<script>
            alert("ยืนยันเรียบร้อย");
            window.location.href = "?page=receipt_verified";
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
                            <img width="940" height="1820" class="w-25 h-auto mb-5" src="../upload/id_card/<?= $data['ud_idcard_img'] ?>" alt="no_img">
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
                                            <th scope="row"><?= $row['user_id'] ?></th>
                                            <td><?= $row['user_id'] ?></td>
                                            <td><?= $row['user_id'] ?></td>
                                            <td><?= $row['user_id'] ?></td>
                                            <td><?= $row['user_id'] ?></td>
                                        <?php endforeach ?>
                                        </tr>
                                </tbody>
                            </table>
                            <!-- ud_id_card IS NULL AND ud_idcard_img IS NOT NULL;"; -->
                            <?php if (is_null($row['ud_id_card']) && !empty($row['ud_idcard_img'])) :
                            ?>
                                <form action="" method="post">
                                    <div class="mt-5">
                                        <label for="id_card_number">บัตรประชาชน</label>
                                        <input type="number" name="id_card_number" maxlength="13" class="form-control w-25" id="id_card_number" aria-describedby="emailHelp" placeholder="เลขบัตรประชาชน 13 หลัก" required>
                                        <small id="emailHelp" class="form-text text-muted">กรุณาตรวจสอบข้อมูลก่อนกดยืนยัน.</small>
                                    </div>

                                    <div class="d-flex justify-content-end mt-3">
                                        <button type="submit" name="complete" class="btn btn-success mr-1" onclick="return confirm('คุณต้องการยืนยันตัวเลือกนี้หรือไม่หรือไม่')">ยืนยัน</button>
                                </form>
                                <form action="" method="post">
                                    <button type="submit" name="incomplete" class="btn btn-danger" onclick="return confirm('คุณต้องการยืนยัน รูปภาพไม่สมบูรณ์ หรือไม่หรือไม่')">รูปภาพไม่สมบูรณ์</button>
                                </form>
                        </div>
                    <?php endif ?>
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
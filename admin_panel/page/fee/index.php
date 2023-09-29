<?php
$sql = "SELECT * FROM fee ORDER BY fee.fee_percent ASC";
$result = mysqli_query($conn, $sql);
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">ค่าบริการ</h1>
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
        <div class="col-lg-4">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">ตาราง : ค่าบริการ</h3>
            </div>
            <div class="card-body ">
              <div class="text-right">
                <a href="?page=<?= $_GET['page'] ?>&function=add" class="btn btn-success " role="button"><i class="fa-solid fa-plus"></i> ค่าบริการ</a>
              </div>
              <?php if (mysqli_num_rows($result) > 0) : ?>
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#feeID</th>
                      <th scope="col" class="w-50">เปอร์เซ็นต์ค่าธรรมเนียม</th>
                      <th scope="col">เปิด/ปิด</th>
                      <th scope="col">เมนู</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($result as $row) : ?>
                      <tr>
                        <td scope="row"><?= $row['fee_id']?></td>
                        <td><?= $row['fee_percent'] ?>%</td>
                        <td><div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input toggle-switch" id="customSwitch<?=$row['fee_id']?>" data-fee-id="<?=$row['fee_id']?>" <?=$row['fee_active'] == 1 ? "checked disabled" : ""?> >
                            <label class="custom-control-label" for="customSwitch<?=$row['fee_id']?>"></label>
                          </div>
                        </td>
                        <td class="">
                          <div class="d-flex ">
                            <a href="?page=<?= $_GET['page'] ?>&function=update&fee_id=<?= $row['fee_id'] ?>"><i class="fa-solid fa-pen" style="color:darkorange;"></i></a>
                            <a href="?page=<?= $_GET['page'] ?>&function=delete&fee_id=<?= $row['fee_id'] ?>" class="ml-4" onclick="return confirm('คุณต้องการลบค่าบริการ <?= $row['fee_percent'] ?>% หรือไม่')"><i class="fa-solid fa-trash" style="color:red;"></i></a>
                          </div>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              <?php else : ?>
                <p class="text-center text-muted mt-3">ไม่มีพบข้อมูล</p>
              <?php endif ?>

              <a href="#" class="card-link">Card link</a>
              <a href="#" class="card-link">Another link</a>
            </div>
          </div>

        </div>
        <!-- /.col-md-4 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
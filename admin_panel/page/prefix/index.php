<?php
$sql1 = "SELECT * FROM prefix";
$result1 = mysqli_query($conn, $sql1);
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">คำนำหน้า</h1>
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
              <h3 class="card-title">ตาราง : คำนำหน้า</h3>
            </div>
            <div class="card-body">
            <div class="text-right">
                <a href="?page=<?= $_GET['page'] ?>&function=add" class="btn btn-success " role="button"><i class="fa-solid fa-plus"></i> คำนำหน้า</a>
              </div>
              <?php if (mysqli_num_rows($result1) > 0) : ?>
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#prefixID</th>
                      <th scope="col" class="w-75">คำนำหน้า</th>
                      <th scope="col">เมนู</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($result1 as $row) : ?>
                      <tr>
                        <td scope="row"><?= $row['prefix_id'] ?></td>
                        <td><?= $row['prefix_name'] ?></td>
                        <td class="">
                          <div class="d-flex ">
                            <a href="?page=<?= $_GET['page'] ?>&function=update&prefix_id=<?= $row['prefix_id'] ?>"><i class="fa-solid fa-pen" style="color:darkorange;"></i></a>
                            <a href="?page=<?= $_GET['page'] ?>&function=delete&prefix_id=<?= $row['prefix_id'] ?>" class="ml-4" onclick="return confirm('คุณต้องการลบธนาคาร <?= $row['prefix_name'] ?> หรือไม่')"><i class="fa-solid fa-trash" style="color:red;"></i></a>
                          </div>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              <?php else : ?>
                <p class="text-center text-muted mt-3">ไม่มีการชำระเงินที่ต้องยืนยันในขณะนี้</p>
              <?php endif ?>
            </div> <!-- /.card-body -->
          </div>
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
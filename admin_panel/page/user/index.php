<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">ข้อมูลผู้ใช้</h1>
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
        <!-- left column -->
        <div class="col-12 text-right">
          <a href="?page=<?= $_GET['page'] ?>&function=add" class="btn btn-success mb-3">เพิ่มข้อมูลผู้ใช้</a>
        </div>
        <div class="col-md-12">
          <?php
          $sql = 'SELECT * FROM login';
          $query = mysqli_query($conn, $sql);
          ?>
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">ตารางข้อมูลผู้ใช้</h3>
            </div>
            <div class="card-body">
              <table class="table" id="example">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">ชื่อ - นามสกุล</th>
                    <th scope="col">อีเมล</th>
                    <th scope="col">ระดับสิทธิ์</th>
                    <th scope="col">สถานะ</th>
                    <th scope="col">เมนู</th>
                    <th scope="col">เมนู</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($query as $data) : ?>
                    <tr>
                      <td><?= $data['user_id'] ?></td>
                      <td><?= $data['username'] ?></td>
                      <td><?= ($data['user_type'] == 0
                            ? '<span class="text-primary">[ADMIN]</span>'
                            : '<span class="text-success">USER</span>') ?></td>
                      <td><?= $data['user_status'] ?></td>
                      <td><?= $data['user_email'] ?></td>
                      <td><?= ($data['email_verified_status'] == 0
                            ? '<span class="text-success">เปิดใช้งาน</span>'
                            : '<span class="font-weight-bold text-danger">*ปิดใช้งาน*</span>') ?></td>
                      <td>
                        <a href="?page=<?= $_GET['page'] ?>&function=update&user_id=<?= $data['user_id'] ?>" class="btn btn-sm btn-warning">แก้ไข</a>
                        <a href="?page=<?= $_GET['page'] ?>&function=delete&user_id=<?= $data['user_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('คุณต้องการลบข้อมูลของ <?= $data['username'] ?> หรือไม่')">ลบ</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>

                </tbody>
              </table>
            </div>
          </div> <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
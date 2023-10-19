<?php
$sql = 'SELECT * FROM `product_with_username`';
$result = mysqli_query($conn, $sql);
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">ข้อมูลสินค้า</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Starter Page</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- <div class="col-12 text-right">
          <a href="?page=<?php //$_GET['page'] ?>&function=add" class="btn btn-success mb-3">เพิ่มข้อมูลสินค้า</a>
        </div> -->
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">ตารางข้อมูลสินค้า</h3>
            </div>
            <div class="card-body">
              <?php
              if (mysqli_num_rows($result) > 0) : ?> 
                <table id="product_list" class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">ภาพ</th>
                      <th scope="col">ชื่อ</th>
                      <th scope="col">ราคาเริ่มต้น</th>
                      <th scope="col">รายละเอียด</th>
                      <th scope="col">เหลือเวลา</th>
                      <th scope="col">สถานะ</th>
                      <th scope="col">สถาพสินค้า</th>
                      <th scope="col">เริ่มการแสดงสินค้า</th>
                      <th scope="col">เริ่มการประมูล</th>
                      <th scope="col">จบการประมูล</th>
                      <th scope="col">เมนู</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($result as $row) :
                      $image_json = $row['pd_img'];
                      $pd_img = json_decode($image_json);
                      $pd_id = $row['pd_id'];
                    ?>
                      <tr>
                        <th scope="row"><?= $row['pd_id']?></th> 
                        <td><img class=" fit-cover rounded-0" width="80" height="80" src="./../upload/product/<?= $pd_img[0] ?>"></td>
                        <td><?= $row['pd_name'] ?></td>
                        <td><?= number_format($row['pd_price_start'], 0) ?> บาท</td>
                        <td>
                          <button type="button" class="btn btn-info text-white btn-sm" data-toggle="modal" data-target="#product_detail_modal-<?= $row['pd_id']?>">
                          <i class="fa-solid fa-circle-info"></i>
                        </button>
                      </td>
                        <td id="product-timeleftID-<?= $pd_id ?>"></td>
                        <td><?= $os_name_arr[$row['order_status']] ?></td>
                        <td><?= $pd_condition_arr[$row['pd_condition']] ?></td>
                        <td><?= $row['pd_start_show_date'] ?></td>
                        <td><?= $row['pd_start_date'] ?></td>
                        <td><?= $row['pd_end_date'] ?></td>
                        <td class="">
                          <?php if ($row['order_status'] > 0) : ?>
                            <p>สินค้าไม่อยู่ภายในสถานะก่อนโชว์สินค้า <!--กรุณา ลบ และ แก้ไขอย่างระมัดระวัง --></p>
                            <?php endif ?>
                            <a href="?page=product&function=update&pd_id=<?= $row['pd_id']?>" class="btn btn-warning btn-sm">แก้ไข</a>
                            <a href="./../ajax/ajax_product_delete.php" data-pd-id="<?= $row['pd_id'] ?>" class="btn btn-danger btn-sm product-del-btn">ลบ</a>
                        </td>
                      </tr>
                      <?php
                      $pd_start_show_date = $row['pd_start_show_date'];
                      $pd_start_date = $row['pd_start_date'];
                      $pd_end_date = $row['pd_end_date'];
                      // $pd_start_show_date = $row['pd_start_show_date'];
                      // ===============================================
                      include 'product_detail_modal.php';
                      ?>

                      <script>
                        countdown_time("product-timeleftID-<?= $pd_id ?>", "<?= $pd_start_show_date ?>", "<?= $pd_start_date ?>", "<?= $pd_end_date ?>");
                      </script>

                    <?php endforeach ?>
                  </tbody>
                </table>
              <?php else : ?>
                <p class="text-center text-muted mt-3">no product</p>
              <?php endif ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    data_table("product_list");
</script>
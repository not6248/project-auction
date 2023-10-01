<div class="content-wrapper">
  <?php
  $sql = 'SELECT * FROM order_tb AS od
          INNER JOIN product AS pd ON od.pd_id = pd.pd_id
          INNER JOIN product_type AS pdt ON pd.pd_type_id = pdt.pd_type_id
          WHERE od.order_status = 2 OR od.order_status = 3 '; 
  $sql2 = 'SELECT * FROM order_tb AS od
          INNER JOIN product AS pd ON od.pd_id = pd.pd_id
          INNER JOIN product_type AS pdt ON pd.pd_type_id = pdt.pd_type_id
          WHERE od.order_status = 3 '; 
  $sql3 = 'SELECT * FROM order_tb AS od
          INNER JOIN product AS pd ON od.pd_id = pd.pd_id
          INNER JOIN product_type AS pdt ON pd.pd_type_id = pdt.pd_type_id
          WHERE od.order_status = 2'; 
  $sql4 = 'SELECT * FROM order_tb AS o
          INNER JOIN product AS pd ON o.pd_id = pd.pd_id
          INNER JOIN product_type AS pdt ON pd.pd_type_id = pdt.pd_type_id
          INNER JOIN payment AS pay ON pay.pay_id = pd.pd_id
          INNER JOIN delivery AS d ON d.dlv_id = pd.pd_id
          INNER JOIN delivery_type AS dt ON dt.dlvt_id = d.dlvt_id
          WHERE o.order_status = 3 AND pay.pay_status = 4 AND d.dlv_status = 2 ';
  //-----------------------------------------------
  $query = mysqli_query($conn, $sql);
  $query2 = mysqli_query($conn, $sql2);
  $query3 = mysqli_query($conn, $sql3);
  $query4 = mysqli_query($conn, $sql4);
  //-----------------------------------------------

  // $row_order_status1 = mysqli_num_rows($query);
  ?>
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Order</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Product</a></li>
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
      <!-- ================================================== -->
      <div class="row">
        <div class="col-lg-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">ตาราง : สินค้าที่ถูกประมูล</h3>
            </div>
            <div class="card-body">
              <!-- Form -->
              <form class="mb-3 d-flex justify-content-end align-items-center" action="./../mpdf/pdf.php" method="post">
                <input type="hidden" name="title" value="ตาราง : สินค้าที่ถูกประมูล">
                <label for="start" class="ml-1">จาก :</label>
                <input name="start" type="date" class="form-control col-3 ml-1" required>
                <label for="end" class="ml-1">ถึง :</label>
                <input name="end" type="date" class="form-control col-3 ml-1" required>
                <button name="o1" type="submit" class="btn btn-secondary ml-2">พิมพ์ตามวันที่เลือก</button>
              </form>
              <!-- End Form -->
              <table class="table table-bordered" id="table1">
                <thead>
                  <tr>
                    <th scope="col">ID </th>
                    <th scope="col">ชื่อ</th>
                    <th scope="col">ราคาราคาเริ่มต้น</th>
                    <th scope="col">ราคาจบประมูล</th>
                    <th scope="col">สถานะ</th>
                    <th scope="col">วันที่สร้าง Order</th>
                    <th scope="col">เมนู</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($query as $data) : ?>
                    <tr>
                      <td><?= $data['pd_id'] ?></td> <!-- id product -->
                      <td><?= $data['pd_name'] ?></td> <!--  product name -->
                      <td><?= $data['pd_price_start'] ?></td> <!--product img -->
                      <td><?= $data['end_price'] ?? "--" ?></td> <!--product type name-->
                      <td><?= $os_name_arr[$data['order_status']] ?></td> <!--product datetime-->
                      <td><?= $data['order_create_datetime'] ?></td> <!--product type name-->
                      <td>I</td>
                    </tr>
                  <?php endforeach ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">ตาราง : สินค้าที่ถูกประมูลแล้ว</h3>
            </div>
            <div class="card-body">
              <!-- Form -->
              <form class="mb-3 d-flex justify-content-end align-items-center" action="./../mpdf/pdf.php" method="post">
                <input type="hidden" name="title" value="ตาราง : สินค้าที่ถูกประมูลแล้ว">
                <label for="start" class="ml-1">จาก :</label>
                <input name="start" type="date" class="form-control col-3 ml-1" required>
                <label for="end" class="ml-1">ถึง :</label>
                <input name="end" type="date" class="form-control col-3 ml-1" required>
                <button name="o2" type="submit" class="btn btn-secondary ml-2">พิมพ์ตามวันที่เลือก</button>
              </form>
              <!-- End Form -->
              <table class="table table-bordered" id="table2">
                <thead>
                  <tr>
                    <th scope="col">ID </th>
                    <th scope="col">ชื่อ</th>
                    <th scope="col">ราคาราคาเริ่มต้น</th>
                    <th scope="col">ราคาจบประมูล</th>
                    <th scope="col">สถานะ</th>
                    <th scope="col">วันที่สร้าง Order</th>
                    <th scope="col">เมนู</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($query2 as $data) : ?>
                    <tr>
                      <td><?= $data['pd_id'] ?></td> <!-- id product -->
                      <td><?= $data['pd_name'] ?></td> <!--  product name -->
                      <td><?= $data['pd_price_start'] ?></td> <!--product img -->
                      <td><?= $data['end_price'] ?? "--" ?></td> <!--product type name-->
                      <td><?= $os_name_arr[$data['order_status']] ?></td> <!--product datetime-->
                      <td><?= $data['order_create_datetime'] ?></td> <!--product type name-->
                      <td>I</td>
                    </tr>
                  <?php endforeach ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- ================================================== -->
      <div class="row">
        <div class="col-lg-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">ตาราง : สินค้าที่กำลังประมูล</h3>
            </div>
            <div class="card-body">
              <!-- Form -->
              <form class="mb-3 d-flex justify-content-end align-items-center" action="./../mpdf/pdf.php" method="post">
                <input type="hidden" name="title" value="ตาราง : สินค้าที่กำลังประมูล">
                <label for="start" class="ml-1">จาก :</label>
                <input name="start" type="date" class="form-control col-3 ml-1" required>
                <label for="end" class="ml-1">ถึง :</label>
                <input name="end" type="date" class="form-control col-3 ml-1" required>
                <button name="o3" type="submit" class="btn btn-secondary ml-2">พิมพ์ตามวันที่เลือก</button>
              </form>
              <!-- End Form -->
              <table class="table table-bordered" id="table3">
                <thead>
                  <tr>
                    <th scope="col">ID </th>
                    <th scope="col">ชื่อ</th>
                    <th scope="col">ราคาราคาเริ่มต้น</th>
                    <th scope="col">ราคาจบประมูล</th>
                    <th scope="col">สถานะ</th>
                    <th scope="col">วันที่สร้าง Order</th>
                    <th scope="col">เมนู</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($query3 as $data) : ?>
                    <tr>
                      <td><?= $data['pd_id'] ?></td> <!-- id product -->
                      <td><?= $data['pd_name'] ?></td> <!--  product name -->
                      <td><?= $data['pd_price_start'] ?></td> <!--product img -->
                      <td><?= $data['end_price'] ?? "--" ?></td> <!--product type name-->
                      <td><?= $os_name_arr[$data['order_status']] ?></td> <!--product datetime-->
                      <td><?= $data['order_create_datetime'] ?></td> <!--product type name-->
                      <td>I</td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">ตาราง : ข้อมูลยอดขายสินค้า</h3>
            </div>
            <div class="card-body">
              <!-- Form -->
              <form class="mb-3 d-flex justify-content-end align-items-center" action="./../mpdf/pdf.php" method="post">
                <input type="hidden" name="title" value="ตาราง : ข้อมูลยอดขายสินค้า">
                <label for="start" class="ml-1">จาก :</label>
                <input name="start" type="date" class="form-control col-3 ml-1" required>
                <label for="end" class="ml-1">ถึง :</label>
                <input name="end" type="date" class="form-control col-3 ml-1" required>
                <button name="o4" type="submit" class="btn btn-secondary ml-2">พิมพ์ตามวันที่เลือก</button>
              </form>
              <!-- End Form -->
              <table class="table table-bordered" id="table4">
                <thead>
                  <tr>
                    <th scope="col">ID </th>
                    <th scope="col">ชื่อ</th>
                    <th scope="col">ราคาราคาเริ่มต้น</th>
                    <th scope="col">ราคาจบประมูล</th>
                    <th scope="col">สถานะ</th>
                    <th scope="col">วันที่สร้าง Order</th>
                    <th scope="col">เมนู</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($query4 as $data) : ?>
                    <tr>
                      <td><?= $data['pd_id'] ?></td> <!-- id product -->
                      <td><?= $data['pd_name'] ?></td> <!--  product name -->
                      <td><?= $data['pd_price_start'] ?></td> <!--product img -->
                      <td><?= $data['end_price'] ?? "--" ?></td> <!--product type name-->
                      <td><?= $os_name_arr[$data['order_status']] ?></td> <!--product datetime-->
                      <td><?= $data['order_create_datetime'] ?></td> <!--product type name-->
                      <td>I</td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- ================================================== -->

      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>


<script type="text/javascript">
data_table("table1");
data_table("table2");
data_table("table3");
data_table("table4");
</script>
<div class="content-wrapper">
<?php
          $sql = 'SELECT * FROM order_tb AS od
          INNER JOIN product AS pd
          ON od.pd_id = pd.pd_id
          INNER JOIN product_type AS pdt
          ON pd.pd_type_id = pdt.pd_type_id
          WHERE od.order_status = 1 '; //ตอนนี้ไม่มีสถานะ 2 = สินค้าที่กำลังประมูล
          //-----------------------------------------------
          $query = mysqli_query($conn, $sql);
          ?>
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">ตารางสินค้าที่กำลังประมูล</h1>
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
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <form action="" method="post">

              </form>
              <table class="table table-bordered" id="example">
                <thead>
                  <tr>
                    <th scope="col">ID </th>
                    <th scope="col">รูปภาพ</th>
                    <th scope="col">ชื่อ</th>
                    <th scope="col">ประเภท</th>
                    <th scope="col">เวลาที่สร้างสินค้า</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($query as $data) : ?>
                    <tr>
                      <td><?= $data['pd_id'] ?></td> <!-- id product -->
                      <td></td> <!--product img -->
                      <td><?= $data['pd_name'] ?></td> <!--  product name -->
                      <td><?= $data['pd_type_name'] ?></td> <!--product type name-->
                      <td><?= $data['pd_create_datetime'] ?></td> <!--product datetime-->

                    </tr>
                  <?php endforeach ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>


<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable({
      responsive: true,
      dom: 'Bfrtip',
      buttons: [{
        extend: 'print',
        title: 'สินค้าที่กำลังประมูลขณะนี้',
        orientation: 'landscape',
        pageSize: 'LEGAL'
      }],
      language: {
        "decimal": "",
        "emptyTable": "ไม่มีข้อมูลในตาราง",
        "info": "กำลังแสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
        "infoEmpty": "กำลังแสดง 0 ถึง 0 จาก 0 รายการ",
        "infoFiltered": "(กรองจากทั้งหมด _MAX_ รายการ)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "แสดง _MENU_ รายการ",
        "loadingRecords": "กำลังโหลด...",
        "processing": "",
        "search": "ค้นหา:",
        "zeroRecords": "ไม่พบบันทึกที่ตรงกัน",
        "paginate": {
          "first": "อันดับแรก",
          "last": "ล่าสุด",
          "next": "ต่อไป",
          "previous": "ก่อนหน้า"
        },
        "aria": {
          "sortAscending": ": เปิดใช้งานเพื่อจัดเรียงคอลัมน์จากน้อยไปมาก",
          "sortDescending": ": เปิดใช้งานเพื่อจัดเรียงคอลัมน์จากมากไปน้อย"
        }
      }
    });
  });
</script>
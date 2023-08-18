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
                    <th scope="col">Username</th>
                    <th scope="col">ระดับสิทธิ์</th>
                    <th scope="col">สถานะ</th>
                    <th scope="col">Email</th>
                    <th scope="col">สถานะยืนยัน Email</th>
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
                            ? '<span class="text-success">ยังไม่ยืนยัน</span>'
                            : '<span class="text-success">ยืนยันแล้ว</span>') ?></td>
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
<script>
  // $(document).ready(function() {
  //     $('#example').DataTable({
  //         language: {
  //             "decimal": "",
  //             "emptyTable": "ไม่มีข้อมูลในตาราง",
  //             "info": "กำลังแสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
  //             "infoEmpty": "กำลังแสดง 0 ถึง 0 จาก 0 รายการ",
  //             "infoFiltered": "(กรองจากทั้งหมด _MAX_ รายการ)",
  //             "infoPostFix": "",
  //             "thousands": ",",
  //             "lengthMenu": "แสดง _MENU_ รายการ",
  //             "loadingRecords": "กำลังโหลด...",
  //             "processing": "",
  //             "search": "ค้นหา:",
  //             "zeroRecords": "ไม่พบบันทึกที่ตรงกัน",
  //             "paginate": {
  //             "first": "อันดับแรก",
  //             "last": "ล่าสุด",
  //             "next": "ต่อไป",
  //             "previous": "ก่อนหน้า"
  //             },
  //             "aria": {
  //                 "sortAscending": ": เปิดใช้งานเพื่อจัดเรียงคอลัมน์จากน้อยไปมาก",
  //                 "sortDescending": ": เปิดใช้งานเพื่อจัดเรียงคอลัมน์จากมากไปน้อย"
  //             }
  //         }
  //     });
  // }); 
</script>
<script type="text/javascript">
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example thead tr')
      .clone(true)
      .addClass('filters')
      .appendTo('#example thead');

    var table = $('#example').DataTable({
      orderCellsTop: true,
      fixedHeader: true,
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
      },
      initComplete: function() {
        var api = this.api();

        // For each column except the last one
        api.columns().eq(0).each(function(colIdx) {
          // Set the header cell to contain the input element
          var cell = $('.filters th').eq($(api.column(colIdx).header()).index());
          var title = $(cell).text();
          $(cell).html('<input type="text" placeholder="' + title + '" />');

          var input = $('input', cell);

          // On every keypress in this input
          input
            .off('keyup change')
            .on('change', function(e) {
              var regexr = '({search})';
              var cursorPosition = this.selectionStart;

              // Search the column for that value
              api.column(colIdx).search(
                this.value !== '' ?
                regexr.replace('{search}', '(((' + this.value + ')))') :
                '',
                this.value !== '',
                this.value === ''
              ).draw();
            })
            .on('keyup', function(e) {
              e.stopPropagation();

              $(this).trigger('change');
              var cursorPosition = this.selectionStart;
              $(this).focus()[0].setSelectionRange(cursorPosition, cursorPosition);
            });
        });
      }


    });
  });
</script>
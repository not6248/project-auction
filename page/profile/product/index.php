<?php
if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 2) {
    echo '<script>window.location.href = "./?page=profile";</script>';
    exit; // ออกจากการทำงานของสคริปต์ PHP เพื่อป้องกันการแสดงผลเนื้อหาหลังจากนี้
} ?>
<div class="card" style="background: rgb(236,238,249);box-shadow: 0px 4px 4px rgba(33,37,41,0.25);">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h4 class="card-title mb-6" style="font-size: 28px;">Product</h4>
            <!-- <button type="button" class="btn btn-success btn-sm rounded"><i class="fa-solid fa-plus"></i> Add new product</button> -->
            <a class="btn btn-success rounded " href="#" role="button"><i class="fa-solid fa-plus"></i> Add new product</a>
  
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="background: #D8DBE9;">
                        <h4 style="color: rgb(84,88,94);" class="mb-0">Product List</h4>
                    </div>
                    <div class="card-body" style="background: #ECEEF9;">
                    <?php 
                    $sql = "SELECT * FROM `product`";
                    $result = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result) > 99){

                    }else{
                        echo '<p class="text-center text-muted mt-3">no product</p>';
                    }
                    ?>
                        <!-- <table id="seller_product_list" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                            </tbody>
                        </table> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#seller_product_list').DataTable({
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
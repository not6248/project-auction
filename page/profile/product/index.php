<div class="card" style="background: rgb(236,238,249);box-shadow: 0px 4px 4px rgba(33,37,41,0.25);">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h4 class="card-title mb-0" style="font-size: 28px;">สินค้า</h4>
            <!-- <button type="button" class="btn btn-success btn-sm rounded"><i class="fa-solid fa-plus"></i> Add new product</button> -->
            <a class="btn btn-success rounded-5" href="./?page=<?= $_GET['page'] ?>&subpage=<?= $_GET['subpage'] ?>&function=add" role="button"><i class="fa-solid fa-plus"></i> เพิ่มสินค้าใหม่</a>

        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="background: #D8DBE9;">
                        <h4 style="color: rgb(84,88,94);" class="mb-0">รายการสินค้า</h4>
                    </div>
                    <div class="card-body" style="background: #ECEEF9;">
                        <?php
                        $sql = "SELECT * FROM `product_with_username` JOIN order_summary ON pd_id = order_id WHERE user_id = " . $_SESSION['user_login'];
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) :
                            $i = 1 ?>
                            <table id="seller_product_list" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">ลำดับ</th>
                                        <th scope="col">รูปภาพ</th>
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
                                            <th scope="row"><?= $i++ ?></th>
                                            <td><img class=" fit-cover rounded-0" width="80" height="80" src="./upload/product/<?= $pd_img[0] ?>"></td>
                                            <td><?= $row['pd_name'] ?></td>
                                            <td><?= number_format($row['pd_price_start'], 0) ?> บาท</td>
                                            <td><button type="button" class="btn btn-info text-white btn-sm" data-bs-toggle="modal" data-bs-target="#product_detail_modal-<?= $row['pd_id']?>"><i class="fa-solid fa-circle-info"></i></button></td>
                                            <td id="product-timeleftID-<?= $pd_id ?>"></td>
                                            <td><?= $os_name_arr[$row['order_status']] ?></td>
                                            <td><?= $pd_condition_arr[$row['pd_condition']] ?></td>
                                            <td><?= $row['pd_start_show_date'] ?></td>
                                            <td><?= $row['pd_start_date'] ?></td>
                                            <td><?= $row['pd_end_date'] ?></td>
                                            <td class="">
                                                <?php if ($row['order_status'] > 0) : ?>
                                                    <p>ไม่สามารถลบ หรือ แก้ไขได้</p>
                                                <?php else : ?>
                                                    <a href="./?page=<?= $_GET['page'] ?>&subpage=<?= $_GET['subpage'] ?>&function=update&pd_id=<?= $row['pd_id'] ?>" class="btn btn-warning btn-sm">แก้ไข</a>
                                                    <a href="./ajax/ajax_product_delete.php" data-pd-id="<?= $row['pd_id'] ?>" class="btn btn-danger btn-sm product-del-btn">ลบ</a>

                                                <?php endif ?>
                                            </td>
                                        </tr>
                                        <?php
                                        $pd_start_show_date = $row['pd_start_show_date'];
                                        $pd_start_date = $row['pd_start_date'];
                                        $pd_end_date = $row['pd_end_date'];
                                        // $pd_start_show_date = $row['pd_start_show_date'];
                                        // ===============================================
                                        include 'page/profile/product/product_detail_modal.php';
                                        ?>

                                        <script>
                                            countdown_time("product-timeleftID-<?= $pd_id ?>", "<?= $pd_start_show_date ?>", "<?= $pd_start_date ?>", "<?= $pd_end_date ?>");
                                        </script>
                                        
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <p class="text-center text-muted mt-3">ไม่มีสินค้า</p>
                        <?php endif ?>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    data_tb_th("#seller_product_list");
</script>
<div class="card" style="background: rgb(236,238,249);box-shadow: 0px 4px 4px rgba(33,37,41,0.25);">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h4 class="card-title" style="font-size: 28px;">รายการที่ชื่นชอบ</h4>

        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="background: #D8DBE9;">
                        <h4 style="color: rgb(84,88,94);" class="mb-0">รายการทั้งหมดที่ชื่นชอบ</h4>
                    </div>
                    <div class="card-body" style="background: #ECEEF9;">
                        <?php
                        $sql = "SELECT * FROM favorite_list WHERE fav_user_id = " . $_SESSION['user_login'];
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) :
                            $i = 1 ?>
                            <table id="fav_product_list" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">ลำดับ.</th>
                                        <th scope="col">รูปภาพ</th>
                                        <th scope="col">ชื่อ</th>
                                        <th scope="col">ราคาเริ่มต้น</th>
                                        <th scope="col">เหลือเวลา</th>
                                        <th scope="col">สถานะ</th>
                                        <th scope="col">เมนู</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($result as $row) :
                                        $image_json = $row['pd_img'];
                                        $pd_img = json_decode($image_json);
                                    ?>
                                        <tr>
                                            <th scope="row"><?= $i++ ?></th>
                                            <td><img class=" fit-cover rounded-0" width="80" height="80" src="./upload/product/<?= $pd_img[0] ?>"></td>
                                            <td><?= $row['pd_name'] ?></td>
                                            <td><?= number_format($row['pd_price_start'], 0) ?> บาท</td>
                                            <td>@mdo</td>
                                            <td>@mdo</td>
                                            <td class="">
                                                <a href="./?page=product&pd_id=<?= $row['pd_id'] ?>" class="btn btn-info btn-sm">รายละเอียด</a>
                                                <!-- <a href="./?page=<?= $_GET['page'] ?>&subpage=<?= $_GET['subpage'] ?>&function=edit" class="btn btn-warning btn-sm">แก้ไข</a> -->
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <p class="text-center text-muted mt-3">ไม่มีรายการสินค้าที่ชื่นชอบ</p>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    data_tb_th("#fav_product_list");
</script>
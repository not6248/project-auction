<?php
$sql = "SELECT * FROM product WHERE pd_id = " . $_GET['pd_id'];
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$image_json = $row['pd_img'];
$pd_img = json_decode($image_json);
// $pd_status = $row['pd_status'];
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Update Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Update Product</li>
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
                <div class="col-8">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="mb-0 card-title">Update Product Form</h3>
                        </div>
                        <div class="card-body" style="background: #ECEEF9;">
                            <!-- Start Form -->
                            <form id="product-update" action="ajax/ajax_product_update.php" method="POST" enctype="multipart/form-data">
                                <div class="card-body col-lg-12">
                                    <div class="form-group mb-3">
                                        <h4>Current picture</h4>
                                        <div class="row">
                                            <?php foreach ($pd_img as $file_img_name) : ?>
                                                <div class="col-3">
                                                    <img class="mb-3" src="./../upload/product/<?= $file_img_name ?? "" ?>" width="200" height="200">
                                                </div>
                                            <?php endforeach ?>
                                        </div>

                                        <hr> <!-- ======================================================== -->
                                        <h4>Uoload new picture</h4>
                                        <p>( If you do not want to change the picture, please do not upload the picture. )</p>
                                        <div class="row">
                                            <div class="col-3" id="main-preview">
                                                <img class="mb-3" width="200" height="200">
                                            </div>
                                            <!-- <label>Main picture</label> -->
                                        </div>
                                        <label for="">product cover image (1 photos)</label>
                                        <input class="form-control" name="main-img-pd-input" type="file" id="main-img-pd-input" value="" />
                                    </div>
                                    <!-- ============================================================================================================== -->
                                    <div class="form-group mb-3">
                                        <div class="row" id="sub-preview">
                                            <div class="col-3">
                                                <img class="mb-3" width="200" height="200">
                                            </div>
                                        </div>
                                        <!-- (The first image will be the product cover image.) -->
                                        <!-- <label for="">Sub picture</label> -->
                                        <!-- <span class=" text-danger ">
                                    <br>Note: Unable to update pictures. Please delete products and add new products.
                                    </span> -->
                                        <label for="">picture (no more than 3 photos) </label>
                                        <input name="sub-img-pd-input[]" class="form-control" type="file" id="sub-img-pd-input" value="" multiple />
                                        <p class="mt-1" style="font-size: 13px;" class="">กรุณาใช้รูปที่เป็นนามสกุล jpeg,jpg,png ( แนะนำรูป 1:1 )</p>
                                    </div>
                                    <hr>
                                    <!-- ============================================================================================================== -->
                                    <div class="form-group mb-2">
                                        <label>ชื่อสินค้า</label>
                                        <input name="pd_name" type="text" class="form-control" placeholder="ใส่ ชื่อสินค้า" value="<?= $row['pd_name'] ?>" required="required">
                                    </div>
                                    <!-- ============================================================================================================== -->
                                    <div class="form-group mb-2">
                                        <?php
                                        $sql = 'SELECT * FROM product_type';
                                        $query = mysqli_query($conn, $sql);
                                        ?>
                                        <label>ประเภทสินค้า</label>
                                        <select name="pd_type_id" class="form-control" required="required">
                                            <option value="" disabled>ประเภทสินค้า</option>
                                            <?php foreach ($query as $data) : ?>
                                                <option <?= ($row['pd_type_id'] == $data['pd_type_id'] ? 'selected' : '') ?> value="<?= $data['pd_type_id'] ?>"><?= $data['pd_type_name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <!-- ============================================================================================================== -->
                                    <div class="form-group mb-2">
                                        <label>สภาพของสินค้า</label>
                                        <select name="pd_condition" class="form-control" required="required">
                                            <option value="" selected disabled>สภาพสินค้า</option>
                                            <?php
                                            foreach ($pd_condition_arr as $index => $v) : ?>
                                                <option <?= ($row['pd_condition'] == $index ? 'selected' : '') ?> value="<?= $index ?>"><?= $v ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <!-- ============================================================================================================== -->
                                    <div class="form-group mb-2">
                                        <label>ลายละเอียดสินค้า</label>
                                        <textarea name="pd_detail" style="resize: none;" maxlength="700" rows="8" class="form-control" placeholder="ใส่ ลายละเอียด (สูงสุด 700ตัวอักษร)" required="required"><?= $row['pd_detail'] ?></textarea>
                                    </div>

                                    <hr>
                                    <!-- ============================================================================================================== -->
                                    <div class="form-group mb-2">
                                        <label>ราคาเริ่มต้น</label>
                                        <input name="pd_price_start" type="number" class="form-control" placeholder="฿฿฿" value="<?= $row['pd_price_start'] ?>" required="required">
                                    </div>
                                    <!-- ============================================================================================================== -->
                                    <div class="form-group mb-2">
                                        <label>วันที่สินค้าเริ่มนำขึ้นแสดง</label>
                                        <input class="mb-2" disabled type="datetime-local" value="<?= $row['pd_start_show_date'] ?>" name="" id=""><br>
                                        <label>วันเริ่มประมูล</label>
                                        <input disabled type="datetime-local" value="<?= $row['pd_start_date'] ?>" name="" id="">
                                        <label>วันสิ้นสุดประมูล</label>
                                        <input disabled type="datetime-local" value="<?= $row['pd_end_date'] ?>" name="" id=""><br>
                                        <span class=" text-danger ">Note:Unable to edit date</span><br>
                                        <span class=" fw-bold ">[ If there is a problem, please contact ADMIN. ]</span>

                                    </div>
                                    <!-- ============================================================================================================== -->

                                    <!-- <div class="form-group">
                                <label>สถานะ</label>
                                <input name="product_status" type="radio" value="0" required="required"> แสดงสินค้า
                                <input name="product_status" type="radio" value="1"> ซ่อนรายการสินค้า
                            </div> -->
                                </div>

                        </div>
                        <div class="card-footer" style="background: #D8DBE9;">
                            <button name="update_product" type="submit" class="btn btn-primary rounded-2">Update</button>
                        </div>
                        </form>
                        <!-- End Form -->
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
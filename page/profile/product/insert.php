<div class="card" style="background: rgb(236,238,249);box-shadow: 0px 4px 4px rgba(33,37,41,0.25);">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h4 class="card-title mb-0" style="font-size: 28px;">Product</h4>
            <!-- <button type="button" class="btn btn-success btn-sm rounded"><i class="fa-solid fa-plus"></i> Add new product</button> -->
            <a class="btn btn-primary rounded-5" href="./?page=<?= $_GET['page'] ?>&subpage=<?= $_GET['subpage'] ?>" role="button"><i class="fa-solid fa-arrow-left fa-2xs"></i> Back</a>

        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="background: #D8DBE9;">
                        <h4 style="color: rgb(84,88,94);" class="mb-0">Add Product Form</h4>
                    </div>
                    <div class="card-body" style="background: #ECEEF9;">
                        <!-- Start Form -->
                        <form id="product-upload" action="./ajax/ajax_product_add.php" method="POST" enctype="multipart/form-data">
                            <div class="card-body col-lg-12">

                                <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col-3" id="main-preview">
                                        <img class="mb-3" width="200" height="200">
                                    </div>
                                </div>
                                <label for="">product cover image (1 photos)</label>
                                <input class="form-control" name="main-img-pd-input" type="file" id="main-img-pd-input" required value="" />
                            </div <div class="form-group">

                                <!-- ============================================================================================================== -->
                                <div class="form-group mb-3">
                                    <div class="row" id="sub-preview">
                                        <div class="col-3">
                                            <img class="mb-3" width="200" height="200">
                                        </div>
                                    </div>
                                    <!-- (The first image will be the product cover image.) -->
                                    <label for="">picture (no more than 3 photos) </label>
                                    <input name="sub-img-pd-input[]" class="form-control" type="file" id="sub-img-pd-input" value="" required multiple />
                                    <p class="mt-1" style="font-size: 13px;" class="">กรุณาใช้รูปที่เป็นนามสกุล jpeg,jpg,png ( แนะนำรูป 1:1 )</p>
                                </div>
                                <hr>
                                <!-- ============================================================================================================== -->
                                <div class="form-group mb-2">
                                    <label>ชื่อสินค้า</label>
                                    <input name="pd_name" type="text" class="form-control" placeholder="ใส่ ชื่อสินค้า" value="<?php echo isset($_POST['username']) && !empty($_POST['username']) ? ($_POST['username']) : ''; ?>" required="required">
                                </div>
                                <!-- ============================================================================================================== -->
                                <div class="form-group mb-2">
                                    <?php
                                    $sql = 'SELECT * FROM `product_type`';
                                    $query = mysqli_query($conn, $sql);
                                    ?>
                                    <label>ประเภทสินค้า</label>
                                    <select name="pd_type_id" class="form-control" required="required">
                                        <option value="" selected disabled>ประเภทสินค้า</option>
                                        <?php foreach ($query as $data) : ?>
                                            <option value="<?= $data['pd_type_id'] ?>"><?= $data['pd_type_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <!-- ============================================================================================================== -->
                                <div class="form-group mb-2">
                                    <label>สภาพของสินค้า</label>
                                    <select name="pd_condition" class="form-control" required="required">
                                        <option value="" selected disabled>สภาพสินค้า</option>
                                        <?php $i = -1;
                                        foreach($pd_condition_array as $arr_condition) :?>
                                        <option value="<?=$i++?>"><?=$arr_condition[$i++]?></option>
                                        <?php endforeach?>
                                        <!-- <option value="1">เหมือนใหม่</option>
                                        <option value="2">มีตำหนิเล็กน้อย</option>
                                        <option value="3">เก่า</option>
                                        <option value="4">เสียหาย</option> -->
                                    </select>
                                </div>
                                <!-- ============================================================================================================== -->
                                <div class="form-group mb-2">
                                    <label>ลายละเอียดสินค้า</label>
                                    <textarea name="pd_detail" style="resize: none;" maxlength="700" rows="8" class="form-control" placeholder="ใส่ ลายละเอียด (สูงสุด 700ตัวอักษร)" required="required"></textarea>
                                </div>

                                <hr>
                                <!-- ============================================================================================================== -->
                                <div class="form-group mb-2">
                                    <label>ราคาเริ่มต้น</label>
                                    <input name="pd_price_start" type="number" class="form-control" placeholder="฿฿฿" value="<?php echo isset($_POST['firstname']) && !empty($_POST['firstname']) ? ($_POST['firstname']) : ''; ?>" required="required">
                                </div>
                                <!-- ============================================================================================================== -->
                                <div class="form-group mb-2">
                                    <?php
                                    date_default_timezone_set('Asia/Bangkok');
                                    $currentTime = strtotime('today 12:00'); // เวลาปัจจุบันในรูปแบบ timestamp
                                    $oneDaysLater = strtotime('+1 days', $currentTime); // คำนวณเวลา 4 วันนับจากปัจจุบัน
                                    $oneDaysLaterFormatted = date('Y-m-d\TH:i', $oneDaysLater); // แปลงเป็นรูปแบบ date
                                    $fourDaysLater = strtotime('+4 days', $currentTime); // คำนวณเวลา 4 วันนับจากปัจจุบัน
                                    $fourDaysLaterFormatted = date('Y-m-d\TH:i', $fourDaysLater); // แปลงเป็นรูปแบบ date
                                    $elevenDaysLater = strtotime('+11 days', $currentTime); // คำนวณเวลา 11 วันนับจากปัจจุบัน
                                    $elevenDaysLaterFormatted = date('Y-m-d\TH:i', $elevenDaysLater); // แปลงเป็นรูปแบบ date
                                    ?>
                                    <label>วันที่สินค้าเริ่มนำขึ้นแสดง</label>
                                    <input class="mb-2" disabled type="datetime-local" value="<?= $oneDaysLaterFormatted ?>" name="" id=""><br>
                                    <label>วันเริ่มประมูล</label>
                                    <input disabled type="datetime-local" value="<?= $fourDaysLaterFormatted ?>" name="" id="">
                                    <label>วันสิ้นสุดประมูล</label>
                                    <input disabled type="datetime-local" value="<?= $elevenDaysLaterFormatted ?>" name="" id=""><br>
                                    <span class=" text-danger ">หมายเหตุ:<br>
                                        เว็บไซต์ไม่สามารถกำหนดเวลาประมูลได้ <br>
                                        เมื่อทำการลงสินค้า<br>
                                        -เว็บไซต์จะมีเวลา 1 วันก่อนแสดงบนหน้าเว็บไซต์เพื่อ <span class=" fw-bold ">ลบ หรือ แก้ไข</span><br>
                                        -สินค้าจะแสดงบนเว็บไซต์เป็นเวลา 3 วันมีก่อนการประมูล <span class=" fw-bold ">(สามารถ ลบได้ แต่แก้ไขไม่ได้)</span><br>
                                        -และสินค้าจะขึ้นประมูลเป็นเวลา 7 วัน <span class=" fw-bold ">(ไม่สามารถ ลบ แก้ไข ได้ )</span>
                                    </span>
                                    <span class=" fw-bold ">[มีเหตุขัดข้อง กรุณาติดต่อ ADMIN]</span>

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
                        <button name="add_product" type="submit" class="btn btn-primary rounded-2">Submit</button>
                    </div>
                        </form>
                    <!-- End Form -->
                </div>
            </div>
        </div>
    </div>
</div>

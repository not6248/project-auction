<?php
$sql = "SELECT * FROM `login` INNER JOIN `user_detail` USING(user_id) WHERE user_id = " . $_SESSION['user_login'];
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$prefix = $row['prefix_id'];
$ud_id_card = $row['ud_id_card'];
$ud_idcard_img = $row['ud_idcard_img'];
?>

<div class="card" style="background: rgb(236,238,249);box-shadow: 0px 4px 4px rgba(33,37,41,0.25);">
    <div class="card-body">
        <h4 class="card-title mb-0" style="font-size: 28px;">รายละเอียด โปรไฟล์</h4>
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="background: #D8DBE9;">
                        <h4 style="color: rgb(84,88,94);" class="mb-0">ปรับแต่ง โปรไฟล์</h4>
                    </div>
                    <div class="card-body" style="background: #ECEEF9;">
                        <!-- form -->
                        <form id="profil-detail-update-form" action="./ajax/ajax_profile_detail_update.php" method="post">
                            <div class="mb-1">
                                <p class="mb-0 ms-1">ชื่อ</p>
                                <input required type="text" name="fname" value="<?= $row['ud_fname'] ?>" style="border-radius: 5px;border: 1px solid #CCCCCC;height: 35px;width: 100%;" class="ms-0 ps-3">
                            </div>
                            <div class="mb-1">
                                <p class="mb-0 ms-1">นามสกุล</p>
                                <input required type="text" name="lname" value="<?= $row['ud_lname'] ?>" style="border-radius: 5px;border: 1px solid #CCCCCC;height: 35px;width: 100%;" class="ms-0 ps-3">
                            </div>
                            <div class="mb-1">
                                <p class="mb-0 ms-1">ที่อยู่ (ในการจัดส่ง)</p>
                                <input required type="text" name="address" value="<?= $row['ud_address'] ?>" style="border-radius: 5px;border: 1px solid #CCCCCC;height: 35px;width: 100%;" class="ms-0 ps-3">
                            </div>
                            <div class="mb-1 w-50">
                                <p class="mb-0 ms-1">อีเมล์</p>
                                <input disabled type="text" value="<?= $row['user_email'] ?>" style="border-radius: 5px;border: 1px solid #CCCCCC;height: 35px;width: 100%;" class="ms-0 ps-3">
                            </div>
                            <div class="mb-1 mt-1 w-50">
                                <a href="" class="mb-0 ms-1" href="#" data-bs-toggle="modal" data-bs-target="#passModal">เปลี่ยนรหัส</a>
                            </div>
                            <div class="mb-1 w-50">
                                <p class="mb-0 ms-1">เบอร์โทรศัพท์</p>
                                <input required type="number" name="tele" value="<?= $row['ud_phone'] ?>" style="border-radius: 5px;border: 1px solid #CCCCCC;height: 35px;width: 100%;" class="ms-0 ps-3">
                            </div>

                            <!-- radio -->
                            <!-- sql radio -->
                            <?php
                            $sql3 = "SELECT * FROM `prefix`";
                            $resultprefix = mysqli_query($conn, $sql3);

                            ?>
                            <div class="mb-1">
                                <p class="mb-0 ms-1">คำนำหน้าชื่อ</p>
                                <div class="d-flex ps-3">
                                    <div class="me-4">
                                        <!-- checked="checked" -->
                                        <?php foreach ($resultprefix as $row_p) : ?>
                                            <input required value="<?= $row_p['prefix_id'] ?>" type="radio" class="form-check-input" name="prefix" <?= isset($prefix) && $prefix == $row_p['prefix_id'] ? "checked" : "" ?>>
                                            <label class="form-check-label me-2" for="prefix-1"><?= $row_p['prefix_name'] ?></label>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </div>

                            <!-- End radio -->
                            <?php
                            if ($_SESSION['user_type'] == 1) {
                                $idCardMessage = "";
                                $label = "อัปโหลด รูปภาพ บัตรประชาชน";
                                $labelLink = "คลิกที่นี่";

                                if ($ud_idcard_img == NULL) {
                                    $idCardMessage = "ยังไม่ทำการยืนยันบัตรประชาชน";
                                } else if ($ud_id_card == NULL) {
                                    $idCardMessage = "บัตรประชาชนรอการตรวจสอบ";
                                    $label = "";
                                    $labelLink = "";
                                } elseif ($ud_id_card == 0) {
                                    $idCardMessage = "ภาพไม่สมบูรณ์ กรุณาอัพโหลดใหม่อีกครั้ง";
                                    $label = "ภาพไม่สมบูรณ์ กรุณาอัพโหลดใหม่อีกครั้ง";
                                }else{
                                    $idCardMessage = "บัตรประชาชนตรวจสอบแล้ว กรุณาเข้าสู่ระบบใหม่";
                                    $label = "";
                                    $labelLink = "";
                                }
                            } else {
                                $idCardMessage = "ยืนยันแล้ว";
                                $labelLink = "";
                                $label = "ตอนนี้ คุณสามารถลงสินค้าได้แล้ว";
                            }
                            ?>
                            <div class="mb-1 w-50">
                                <p class="mb-0 ms-1">รหัสบัตรประชาชน</p>
                                <input disabled type="text" value="<?= $idCardMessage ?>" style="border-radius: 5px;border: 1px solid #CCCCCC;height: 35px;width: 100%;" class="ms-0 ps-3">

                                <label style="font-size: 12px;"><?= $label ?></label>
                                <label class="cursor-pointer" for="id-card-img-upload" style="font-size: 12px;text-decoration:  underline;">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#add_id_card_img"><?= $labelLink ?></a>
                                </label>

                                <!-- <input class="d-none" type="file" name="" id="id-card-img-upload" onchange="getImage(this.value)"> -->
                                <!-- <p id="id-card-img-upload-file-name" style="font-size: 12px;"></p> -->
                            </div>
                            <?php if ($_SESSION['user_type'] == 2) : ?>
                            <div class="mb-1 mt-3" id="bank">
                                <p class="mb-0 ms-1">ธนาคาร (ใช้สำหรับรับเงิน)</p>
                                <div class="d-flex ps-3">
                                    <div class="me-4">
                                        <!-- checked="checked" -->
                                        <?php foreach ($bank_arr as $index => $v) : ?>
                                            <input value="<?= $index ?>" type="radio" class="form-check-input" name="bank_id" <?= isset($row['ud_bank_id']) && $index == $row['ud_bank_id'] ? "checked" : "" ?>> <!-- checked -->
                                            <label class="form-check-label me-2" for="prefix-1"><?= $v ?></label>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-5 w-50 ">
                                <p class="mb-0 ms-1">เลขบัญชี</p>
                                <input type="number" name="bank_number" value="<?= $row['ud_bank_number'] ?>" style="border-radius: 5px;border: 1px solid #CCCCCC;height: 35px;width: 100%;" class="ms-0 ps-3">
                            </div>
                            <?php endif ?>
                    </div>
                    <div class="card-footer" style="background: #D8DBE9;">
                        <button class="btn btn-primary" type="submit" style="border-radius: 7px;">ยืนยันการแก้ไข</button>
                    </div>
                    </form>
                    <?php include 'page/profile/profile_detail/password_change.php'; ?>
                    <?php include 'page/profile/profile_detail/id_card_insert_modal.php'; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function getImage(imgname) {
        let newimgname = imgname.replace(/^.*\\/, "");
        $("#id-card-img-upload-file-name").html(newimgname);
    }
</script>
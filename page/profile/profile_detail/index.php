<?php
$sql = "SELECT * FROM `login` INNER JOIN `user_detail` USING(user_id) WHERE user_id = " . $_SESSION['user_login'];
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$prefix = $row['prefix_id'];
?>

<div class="card" style="background: rgb(236,238,249);box-shadow: 0px 4px 4px rgba(33,37,41,0.25);">
    <div class="card-body">
        <h4 class="card-title mb-4" style="font-size: 28px;">Profile Detail</h4>
        <div class="card">
            <div class="card-header" style="background: #D8DBE9;">
                <h4 style="color: rgb(84,88,94);" class="mb-0">Profile Editor</h4>
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
                        <p class="mb-0 ms-1">ที่อยู่</p>
                        <input required type="text" name="address" value="<?= $row['ud_address'] ?>" style="border-radius: 5px;border: 1px solid #CCCCCC;height: 35px;width: 100%;" class="ms-0 ps-3">
                    </div>
                    <div class="mb-1">
                        <p class="mb-0 ms-1">อีเมล์</p>
                        <input disabled type="text" value="<?= $row['user_email'] ?>" style="border-radius: 5px;border: 1px solid #CCCCCC;height: 35px;width: 100%;" class="ms-0 ps-3">
                    </div>
                    <div class="mb-1">
                        <p class="mb-0 ms-1">เบอร์โทรศัพท์</p>
                        <input required  type="number" name="tele" value="<?= $row['ud_phone'] ?>" style="border-radius: 5px;border: 1px solid #CCCCCC;height: 35px;width: 100%;" class="ms-0 ps-3">
                    </div>
                    <!-- radio -->
                    <!-- sql radio -->
                    <?php 
                    $sql = "SELECT * FROM `prefix`";
                    $resultprefix = mysqli_query($conn,$sql);

                    ?>
                    <div class="mb-1">
                        <p class="mb-0 ms-1">คำนำหน้าชื่อ</p>
                        <div class="d-flex ps-3">
                            <div class="me-4">
                                <!-- checked="checked" -->
                                <?php foreach($resultprefix as $row) :?>
                                <input required value="<?=$row['prefix_id']?>" type="radio" class="form-check-input" name="prefix"
                                <?=isset($prefix) && $prefix == $row['prefix_id'] ? "checked" : ""?>>
                                <label class="form-check-label me-2" for="prefix-1"><?=$row['prefix_name']?></label>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                    <!-- End radio -->
                    <div class="mb-5">
                        <p class="mb-0 ms-1">รหัสบัตรประชาชน</p>
                        <input disabled type="text" value="" style="border-radius: 5px;border: 1px solid #CCCCCC;height: 35px;width: 100%;" class="ms-0 ps-3">
                        <p style="font-size: 12px;text-decoration:  underline;">อัปโหลด รูปภาพ บัตรประชาชน
                        </p>
                    </div>
            </div>
            <div class="card-footer" style="background: #D8DBE9;">
                <button class="btn btn-primary" type="submit" style="border-radius: 7px;">ยืนยันการแก้ไข</button>
            </div>
            </form>
        </div>
    </div>
</div>
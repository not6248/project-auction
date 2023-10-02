<div class="col-sm-10 col-md-6 col-lg-4 order-1 order-lg-2 my-sm-4 my-md-0">
    <div class="d-flex flex-column justify-content-center align-items-center mb-0" style="height: 190px;border-radius: 16px;border: 3px solid rgb(13,110,253);">
        <div class="row" style="width: 100%;">
            <!-- <div class="col-4">
                <span>เหลือเวลา<br>1 วัน 5 ชม.</span>
            </div> -->
            <div class="col-4 offset-4 d-flex justify-content-center align-items-end pe-0 ps-0" style="text-align: center;">
                <span class="fw-bold" style="color: rgb(62, 0, 186);">ราคาปัจจุบัน!</span>
            </div>
            <div class="col-4 ms-0" style="text-align: right;">
                <?php
                if (isset($_SESSION['user_login'])) {
                    $sql_check_favorite = "SELECT user_id,pd_id FROM favorite WHERE user_id = " . $_SESSION['user_login'] . " AND pd_id = $pd_id";
                    $result_check_favorite = mysqli_query($conn, $sql_check_favorite);
                    $fav_check = (mysqli_num_rows($result_check_favorite) > 0);
                } else {
                    $fav_check = false;
                }
                ?>

                <i style="font-size: 20px;" class="bi <?= !$fav_check ? "bi-star" : "bi-star-fill" ?> cursor-pointer fav_star_icon" data-pd-id="<?= $pd_id ?>"></i>
                <!-- <i style="font-size: 20px;" class="bi bi-star"></i> -->

            </div>
        </div>
        <div class="mb-3" style="min-width: 90%;text-align: center;border-bottom: 1px solid rgba(33,37,41,0.3);">
            <span style="font-size: 23px;font-weight: bold;color: #3E168E;"><?= number_format($row_order_summary['total_price'], 0) ?> ฿</span>
        </div>
        <div class="mb-1">
            <button id="bid" <?= $order_status == 2 ? "" : "disabled" ?> class="btn btn-primary" style="font-size: 20px;width: 263.906px;" data-bs-toggle="modal" data-bs-target="#bid-modal"> <?= $order_status == 3 ? "จบการประมูล" : "เสนอราคา" ?></button>
        </div>
        <div class="">
            <!-- <span class="fw-bold" style="color: rgb(62, 0, 186);">จำนวนผู้ประมูล 7 คน</span> -->
        </div>
    </div>
</div>

<?php
if (isset($_SESSION['user_login'])) :
    $info_null_chaeck = "SELECT * FROM user_detail WHERE(
    prefix_id IS NULL OR 
    ud_address IS NULL OR 
    ud_phone IS NULL OR ud_fname IS NULL OR 
    ud_lname IS NULL) AND user_id = " . $_SESSION['user_login'];
    $result = mysqli_query($conn, $info_null_chaeck);
    if (mysqli_num_rows($result) > 0) : ?>

        <script>
            $(document).ready(function() {
                $("#bid").click(function(e) {
                    e.preventDefault();
                    Swal.fire({
                        icon: 'warning',
                        title: 'อุ๊บส์...',
                        html: "กรุณากรอกข้อมูลของผู้ใช้ให้ครบถ้วน <br> ก่อนที่จะเริ่มต้นการประมูล",
                        heightAuto: false,
                    }).then(() => {
                        window.location.href = "./?page=profile"
                    })
                });
            });
        </script>

    <?php endif ?>
<?php endif ?>
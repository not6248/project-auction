<?php
$pd_id = $_GET['pd_id'];
$sql = "SELECT * FROM `product` WHERE pd_id = $pd_id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) < 1) {
    echo '<script>window.location.href = "./";</script>';
    exit; // ออกจากการทำงานของสคริปต์ PHP เพื่อป้องกันการแสดงผลเนื้อหาหลังจากนี้
}
foreach ($result as $row) :
    $user_id = $row['user_id'];
    $image_json = $row['pd_img'];
    $pd_img = json_decode($image_json);
    $isFirst = true;
?>
    <div class="container mt-xl-5 pt-xl-0 m-auto">
        <div></div>
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-4 mt-md-0">
                <div class="col-12">
                    <img class="product-image" width="420" height="420" src="./upload/product/<?=$pd_img[0]?>" style="width: 100%;">
                </div>
                <div class="col-12 mt-2 d-flex product-image-thumbs">
                    <?php
                    foreach ($pd_img as $file_img_name) : ?>
                        <div class="product-image-thumb img-thumbnail cursor-pointer me-2 <?= $isFirst ? 'active' : '' ?>"><img width="80" height="80" src="./upload/product/<?= $file_img_name ?>" alt="Product Image"></div>

                    <?php
                        $isFirst = false;
                    endforeach
                    ?>
                </div>
            </div>
            <div class="col-sm-10 col-md-5 d-lg-none pt-0 mt-4 mb-4 mt-md-0 ms-sm-0 ps-sm-0 pe-sm-0" style="text-align: left;">
                <div class="d-flex flex-column justify-content-center align-items-center mb-0" style="height: 190px;border-radius: 16px;border: 3px solid rgb(13,110,253);">
                    <div class="row" style="width: 100%;">
                        <div class="col-4">
                            <span>เหลือเวลา<br>1 วัน 5 ชม.</span>
                        </div>
                        <div class="col-4 d-flex justify-content-center align-items-end pe-0 ps-0" style="text-align: center;">
                            <span class="fw-bold" style="color: rgb(62, 0, 186);">ราคาปัจจุบัน!</span>
                        </div>
                        <div class="col-4 ms-0" style="text-align: right;">
                            <i style="font-size: 20px;" class="bi bi-star-fill cursor-pointer"></i>
                        </div>
                    </div>
                    <div class="mb-3" style="min-width: 90%;text-align: center;border-bottom: 1px solid rgba(33,37,41,0.3);">
                        <span style="font-size: 23px;font-weight: bold;color: #3E168E;">15,000฿</span>
                    </div>
                    <div class="mb-1">
                        <button class="btn btn-primary" type="button" style="font-size: 20px;width: 263.906px;">เสนอราคา</button>
                    </div>
                    <div class="">
                        <span class="fw-bold" style="color: rgb(62, 0, 186);">จำนวนผู้ประมูล 7 คน</span>
                    </div>
                </div>
            </div>
            <div class="col-11 col-lg-4 col-xl-4 col-xxl-4 mt-0">
                <div>
                    <h5 class="mb-4 fw-bold "><?= $row['pd_name'] ?></h5>
                    <div class="row pt-xl-2 pb-xl-2 ms-xl-0 me-xl-0" style="border-top: 1px solid rgba(33,37,41,0.3) ;border-bottom-width: 1px;border-bottom-style: none;">
                        <div class="col"><span style="font-weight: bold;">ราคาเริ่มต้น</span></div>
                        <div class="col-md-6 col-lg-5 col-xl-8 col-xxl-7 ps-xl-0"><span style="margin-left: 151px;" class="ms-xl-0 ps-0 ms-0"><?=number_format($row['pd_price_start'],0)?> บาท</span></div>
                    </div>
                    <div class="row pt-xl-2 pb-xl-2 ms-xl-0 me-xl-0" style="border-top: 1px solid rgba(33,37,41,0.3) ;border-bottom-width: 1px;border-bottom-style: none;">
                        <div class="col"><span style="font-weight: bold;">ราคาปัจจุบัน</span></div>
                        <div class="col-md-6 col-lg-5 col-xl-8 col-xxl-7 ps-xl-0"><span style="margin-left: 151px;" class="ms-xl-0 ps-0 ms-0">15,000 บาท</span></div>
                    </div>
                    <div class="row pt-xl-2 pb-xl-2 ms-xl-0 me-xl-0" style="border-top: 1px solid rgba(33,37,41,0.3) ;border-bottom-width: 1px;border-bottom-style: none;">
                        <div class="col"><span style="font-weight: bold;">สถานะประมูล</span></div>
                        <div class="col-md-6 col-lg-5 col-xl-8 col-xxl-7 ps-xl-0"><span style="margin-left: 151px;" class="ms-xl-0 ms-0">กำลังประมูล</span></div>
                    </div>
                    <div class="row pt-xl-2 pb-xl-2 ms-xl-0 me-xl-0" style="border-top: 1px solid rgba(33,37,41,0.3) ;border-bottom-width: 1px;border-bottom-style: none;">
                        <div class="col"><span style="font-weight: bold;">เหลือเวลา</span></div>
                        <div class="col-md-6 col-lg-5 col-xl-8 col-xxl-7 ps-xl-0"><span style="margin-left: 151px;" class="ms-xl-0 ps-0 ms-0">5 ชม. 30 นาที | วันจันทร์, 16:30</span></div>
                    </div>
                    <div class="row pt-xl-2 pb-xl-2 ms-xl-0 me-xl-0" style="border-top: 1px solid rgba(33,37,41,0.3) ;border-bottom-width: 1px;border-bottom-style: none;">
                        <div class="col"><span style="font-weight: bold;">รหัสการประมูล</span></div>
                        <div class="col-md-6 col-lg-5 col-xl-8 col-xxl-7 ps-xl-0"><span style="margin-left: 151px;" class="ms-xl-0 ms-0">0000000001</span></div>
                    </div>
                    <div class="row pt-xl-2 pb-xl-2 ms-xl-0 me-xl-0" style="border-top: 1px solid rgba(33,37,41,0.3) ;border-bottom-width: 1px;border-bottom-style: none;">
                        <div class="col"><span style="font-weight: bold;">สภาพสินค้า</span></div>
                        <div class="col-md-6 col-lg-5 col-xl-8 col-xxl-7 ps-xl-0"><span style="margin-left: 151px;" class="ms-xl-0 ms-0">สภาพดีไม่มีความเสียหาย</span></div>
                    </div>
                    <?php 
                    $sqlUser_name = "SELECT username FROM `login` WHERE user_id = $user_id";
                    $r_sqlUser_name = mysqli_query($conn,$sqlUser_name);
                    $login_row = mysqli_fetch_assoc($r_sqlUser_name);
                    ?>
                    <div class="row pt-xl-2 pb-xl-2 ms-xl-0 me-xl-0" style="border-top: 1px solid rgba(33,37,41,0.3) ;border-bottom-width: 1px;border-bottom-style: none;">
                        <div class="col"><span style="font-weight: bold;">ชื่อผู้ขาย</span></div>
                        <div class="col-md-6 col-lg-5 col-xl-8 col-xxl-7 ps-xl-0"><span style="margin-left: 151px;" class="ms-xl-0 ms-0"><?=$login_row['username']?></span></div>
                    </div>
                    <hr class="py-0 my-0">
                </div>
            </div>
            <div class="col-md-11 col-lg-4 d-none d-sm-none d-md-none d-lg-block">
                <div class="d-flex flex-column justify-content-center align-items-center mb-0" style="height: 190px;border-radius: 16px;border: 3px solid rgb(13,110,253);">
                    <div class="row" style="width: 100%;">
                        <div class="col-4">
                            <span>เหลือเวลา<br>1 วัน 5 ชม.</span>
                        </div>
                        <div class="col-4 d-flex justify-content-center align-items-end pe-0 ps-0" style="text-align: center;">
                            <span class="fw-bold" style="color: rgb(62, 0, 186);">ราคาปัจจุบัน!</span>
                        </div>
                        <div class="col-4 ms-0" style="text-align: right;">
                            <i style="font-size: 20px;" class="bi bi-star-fill cursor-pointer"></i>
                        </div>
                    </div>
                    <div class="mb-3" style="min-width: 90%;text-align: center;border-bottom: 1px solid rgba(33,37,41,0.3);">
                        <span style="font-size: 23px;font-weight: bold;color: #3E168E;">15,000฿</span>
                    </div>
                    <div class="mb-1">
                        <button class="btn btn-primary" type="button" style="font-size: 20px;width: 263.906px;">เสนอราคา</button>
                    </div>
                    <div class="">
                        <span class="fw-bold" style="color: rgb(62, 0, 186);">จำนวนผู้ประมูล 7 คน</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-lg-0 mt-lg-4" style="padding-top: 0px;">
            <div class="col-lg-4 col-xl-4 d-none d-lg-block"></div>
            <div class="col-12 col-sm-9 col-lg-7 col-xl-7 col-xxl-7 ps-md-4 ps-4 ps-lg-3 pt-0 mt-4 mt-lg-0">
                <div style="border-bottom-style: solid;border-bottom-color: #3E168E;">
                    <div style="background: #3E168E;border-radius: 0;border-top-left-radius: 6px;border-top-right-radius: 6px;width: 186px;" class="ps-xl-2 pe-xl-0 mt-0 pt-1"><span style="color: rgb(255,255,255);" class="ps-3 ms-0 ms-xl-0 ps-xl-2 mt-xl-0 pt-0">คำอธิบายเกี่ยวกับสินค้า</span></div>
                </div>
                <div class="mt-3 mb-4">
                    <span class="mt-2" style="color: rgb(0, 0, 0);">
                        <?= $row['pd_detail'] ?>
                        <!-- Lorem ipsum dolor sit amet, consectetur adipiscing
                    elit. Etiam feugiat ante at arcu ultrices, sed convallis nibh volutpat. Sed porttitor varius
                    cursus. Maecenas a erat congue mauris scelerisque iaculis. Quisque eu sem vulputate ante semper
                    sagittis. Praesent sollicitudin leo dictum nunc efficitur gravida sed nec erat. Sed ex augue,
                    volutpat nec neque ut, fermentum vestibulum purus. Aenean quam massa, placerat eget ornare eget,
                    vulputate at sapien. Fusce volutpat massa imperdiet, accumsan leo nec, fermentum felis.Donec
                    tincidunt luctus velit, id fringilla libero commodo sit amet. Class aptent taciti sociosqu ad  -->
                    </span>
                </div>
            </div>
        </div>

    </div>
<?php
endforeach
?>
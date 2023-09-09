<div class="col-11 col-lg-4 col-xl-4 col-xxl-4 mt-0">
    <div>
        <h5 class="mb-4 fw-bold "><?= $row['pd_name'] ?></h5>
        <div class="row pt-xl-2 pb-xl-2 ms-xl-0 me-xl-0" style="border-top: 1px solid rgba(33,37,41,0.3) ;border-bottom-width: 1px;border-bottom-style: none;">
            <div class="col"><span style="font-weight: bold;">ราคาเริ่มต้น</span></div>
            <div class="col-md-6 col-lg-5 col-xl-8 col-xxl-7 ps-xl-0"><span style="margin-left: 151px;" class="ms-xl-0 ps-0 ms-0"><?= number_format($row['pd_price_start'], 0) ?> บาท</span></div>
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
            <div class="col-md-6 col-lg-5 col-xl-8 col-xxl-7 ps-xl-0"><span style="margin-left: 151px;" class="ms-xl-0 ms-0"><?= $pd_condition_arr[$row['pd_condition']] ?></span></div>
        </div>
        <div class="row pt-xl-2 pb-xl-2 ms-xl-0 me-xl-0" style="border-top: 1px solid rgba(33,37,41,0.3) ;border-bottom-width: 1px;border-bottom-style: none;">
            <div class="col"><span style="font-weight: bold;">ชื่อผู้ขาย</span></div>
            <div class="col-md-6 col-lg-5 col-xl-8 col-xxl-7 ps-xl-0"><span style="margin-left: 151px;" class="ms-xl-0 ms-0"><?= $row['username'] ?></span></div>
        </div>
        <hr class="py-0 my-0">
    </div>
</div>
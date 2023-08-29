<?php 
if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 2) {
    echo '<script>window.location.href = "./?page=profile";</script>';
    exit; // ออกจากการทำงานของสคริปต์ PHP เพื่อป้องกันการแสดงผลเนื้อหาหลังจากนี้
}?>
<div class="card" style="background: rgb(236,238,249);box-shadow: 0px 4px 4px rgba(33,37,41,0.25);">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h4 class="card-title mb-6" style="font-size: 28px;">Order Bidder</h4>
            <button type="button" class="btn btn-success btn-sm rounded"><i class="fa-solid fa-plus"></i> Add new product</button>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="background: #D8DBE9;">
                        <h4 style="color: rgb(84,88,94);" class="mb-0">Order</h4>
                    </div>
                    <div class="card-body" style="background: #ECEEF9;">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<?php include './includes/head.php'; ?>

<body>
    <?php include './includes/navbar.php'; ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card" style="box-shadow: 2px 2px 0px 1px rgba(33,37,41,0.25);">
                    <div class="card-body" style="background: #ECEEF9;">
                        <h4 class="card-title" style="text-align: center;">Manage Menu</h4>
                        <h6 class="text-muted card-title mb-2 mb-xl-2 pb-xl-0" style="text-align: center;border-style: none;border-bottom: 1px none rgba(33,37,41,0.2) ;">
                            Welcome, Somchai99</h6>
                        <p class="card-text mb-xl-1 mt-xl-0 pt-1" style="border-top: 1px solid rgba(33,37,41,0.25) ;">
                            General Menu</p>
                        <ul class="nav nav-tabs d-flex flex-column" style="border-bottom-style: none;">
                            <li class="nav-item"><a class="nav-link active" href="#">
                                    <i class="far fa-user me-1"></i>
                                    <p class="d-inline" style="font-size: 16px;">Profile Detail</p>
                                </a></li>
                            <li class="nav-item"><a class="nav-link" href="#"><i class="far fa-list-alt me-1"></i>
                                    <p class="d-inline" style="font-size: 16px;">Order Bidder</p>
                                </a></li>
                        </ul>
                        <p class="card-text mb-xl-1 mt-xl-0 pt-1" style="border-top: 1px solid rgba(33,37,41,0.25) ;">
                            Seller Menu</p>
                        <ul class="nav nav-tabs d-flex flex-column" style="border-bottom-style: none;">
                            <li class="nav-item"><a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-box-seam me-1">
                                        <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z">
                                        </path>
                                    </svg>
                                    <p class="d-inline" style="font-size: 16px;">Product</p>
                                </a></li>
                            <li class="nav-item"><a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-box-seam-fill me-1">
                                        <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.01-.003.268-.108a.75.75 0 0 1 .558 0l.269.108.01.003 6.97 2.789ZM10.404 2 4.25 4.461 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339L8 5.961 5.596 5l6.154-2.461L10.404 2Z">
                                        </path>
                                    </svg>
                                    <p class="d-inline" style="font-size: 16px;">Order Seller</p>
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-auto col-md-8 col-lg-8 col-xl-9 col-xxl-9">
                <div class="card" style="background: rgb(236,238,249);box-shadow: 0px 4px 4px rgba(33,37,41,0.25);">
                    <div class="card-body">
                        <h4 class="card-title mb-4" style="font-size: 28px;">Profile Detail</h4>
                        <div class="card">
                            <div class="card-header" style="background: #D8DBE9;">
                                <h4 style="color: rgb(84,88,94);" class="mb-0">Profile Editor</h4>
                            </div>
                            <div class="card-body" style="background: #ECEEF9;">
                                <div class="mb-1">
                                    <p class="mb-0 ms-1">ชื่อ</p><input type="text" style="border-radius: 5px;border: 1px solid #CCCCCC;height: 35px;width: 100%;" class="ms-0 ps-3">
                                </div>
                                <div class="mb-1">
                                    <p class="mb-0 ms-1">นามสกุล</p><input type="text" style="border-radius: 5px;border: 1px solid #CCCCCC;height: 35px;width: 100%;" class="ms-0 ps-3">
                                </div>
                                <div class="mb-1">
                                    <p class="mb-0 ms-1">ที่อยู่</p><input type="text" style="border-radius: 5px;border: 1px solid #CCCCCC;height: 35px;width: 100%;" class="ms-0 ps-3">
                                </div>
                                <div class="mb-1">
                                    <p class="mb-0 ms-1">อีเมล์</p><input type="text" style="border-radius: 5px;border: 1px solid #CCCCCC;height: 35px;width: 100%;" class="ms-0 ps-3">
                                </div>
                                <div class="mb-1">
                                    <p class="mb-0 ms-1">เบอร์โทรศัพท์</p><input type="text" style="border-radius: 5px;border: 1px solid #CCCCCC;height: 35px;width: 100%;" class="ms-0 ps-3">
                                </div>
                                <div class="mb-1">
                                    <p class="mb-0 ms-1">คำนำหน้าชื่อ</p>
                                    <div class="d-flex ps-3">
                                        <div class="form-check me-4"><input class="form-check-input" type="radio" id="prefix-1" name="prefix" checked="checked"><label class="form-check-label" for="formCheck-1">นาย</label></div>
                                        <div class="form-check me-4"><input class="form-check-input" type="radio" id="prefix-2" name="prefix"><label class="form-check-label" for="formCheck-3">นาง</label></div>
                                        <div class="form-check me-4"><input class="form-check-input" type="radio" id="formCheck-2" name="prefix"><label class="form-check-label" for="formCheck-2">นางสาว</label></div>
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <p class="mb-0 ms-1">รหัสบัตรประชาชน</p><input type="text" style="border-radius: 5px;border: 1px solid #CCCCCC;height: 35px;width: 100%;" class="ms-0 ps-3">
                                    <p style="font-size: 10px;text-decoration:  underline;">อัปโหลด รูปภาพ บัตรประชาชน
                                    </p>
                                </div>
                            </div>
                            <div class="card-footer" style="background: #D8DBE9;"><button class="btn btn-primary" type="button" style="border-radius: 7px;">ยืนยันการแก้ไข</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
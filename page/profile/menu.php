<div class="card" style="box-shadow: 2px 2px 0px 1px rgba(33,37,41,0.25);">
    <div class="card-body" style="background: #ECEEF9;">
        <h4 class="card-title text-center">เมนูจัดการ</h4>
        <h6 class="text-muted card-title mb-2 mb-xl-2 pb-xl-0 text-center">
            ยินดีต้อนรับ, <?= $_SESSION['username'] ?></h6>
        <!-- =============== bidder =====================================================================-->
        <p class="card-text mb-xl-1 mt-xl-0 pt-1" style="border-top: 1px solid rgba(33,37,41,0.25) ;">
            เมนูทั่วไป
        </p>
        <ul class="nav nav-tabs d-flex flex-column" style="border-bottom-style: none;">
            <!-- --------------------------------------------------------------------------------------- -->
            <!-- Profile Detail -->
            <li class="nav-item">
                <a class="nav-link <?= !isset($_GET['subpage']) && empty($_GET['subpage']) ? 'active' : '' ?>" href="./?page=profile">
                    <i class="far fa-user me-1"></i>
                    <p class="d-inline" style="font-size: 16px;">รายละเอียด โปรไฟล์</p>
                </a>
            </li>
            <!-- --------------------------------------------------------------------------------------- -->
            <!-- Order Bidder -->

            <li class="nav-item">
                <a class="nav-link <?= isset($_GET['subpage']) && $_GET['subpage'] == 'order_bidder' ? 'active' : '' ?>" href="./?page=profile&subpage=order_bidder">
                    <i class="far fa-list-alt me-1"></i>
                    <p class="d-inline" style="font-size: 16px;">ออเดอร์ ผู้ประมูล</p>
                </a>
            </li>
            <!-- --------------------------------------------------------------------------------------- -->
            <!-- Fav -->
            <li class="nav-item">
                <a class="nav-link <?= isset($_GET['subpage']) && $_GET['subpage'] == 'favorite' ? 'active' : '' ?>" href="./?page=profile&subpage=favorite">
                    <?= isset($_GET['subpage']) && $_GET['subpage'] == 'favorite' ? '<i class="fa-solid fa-star"></i>' : '<i class="fa-regular fa-star"></i>' ?>
                    <p class="d-inline" style="font-size: 16px;">รายการที่ชื่นชอบ</p>
                </a>
            </li>
             <!-- --------------------------------------------------------------------------------------- -->
            <!-- history -->
            <li class="nav-item">
                <a class="nav-link <?= isset($_GET['subpage']) && $_GET['subpage'] == 'history' ? 'active' : '' ?>" href="./?page=profile&subpage=history">
                <i class="fa-solid fa-clock-rotate-left"></i>
                    <p class="d-inline" style="font-size: 16px;">ประวัติการประมูล</p>
                </a>
            </li>
        </ul>



        <!-- [x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x] -->
        <?php if ($_SESSION['user_type'] == 2) : ?>
            <!-- =============== Seller =====================================================================-->
            <p class="card-text mb-xl-1 mt-xl-0 pt-1" style="border-top: 1px solid rgba(33,37,41,0.25) ;">
                เมนูผู้ขายสินค้า 
            </p>
            <ul class="nav nav-tabs d-flex flex-column" style="border-bottom-style: none;">
                <!-- --------------------------------------------------------------------------------------- -->
                <!-- Product -->
                <li class="nav-item">
                    <a class="nav-link <?= isset($_GET['subpage']) && $_GET['subpage'] == 'product' ? 'active' : '' ?>" href="./?page=profile&subpage=product">
                        <i class="bi bi-box-seam me-1"></i>
                        <p class="d-inline" style="font-size: 16px;">สินค้า</p>
                    </a>
                </li>
                <!-- --------------------------------------------------------------------------------------- -->
                <!-- Order Seller -->
                <li class="nav-item">
                    <a class="nav-link <?= isset($_GET['subpage']) && $_GET['subpage'] == 'order_seller' ? 'active' : '' ?>" href="./?page=profile&subpage=order_seller">
                        <i class="bi bi-box-seam-fill me-1"></i>
                        <p class="d-inline" style="font-size: 16px;">ออเดอร์ ผู้ขายสินค้า</p>
                    </a>
                </li>
                <!-- --------------------------------------------------------------------------------------- -->
            </ul>
        <?php endif ?>
    </div>
</div>
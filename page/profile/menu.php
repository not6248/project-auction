<div class="card" style="box-shadow: 2px 2px 0px 1px rgba(33,37,41,0.25);">
    <div class="card-body" style="background: #ECEEF9;">
        <h4 class="card-title" style="text-align: center;">Manage Menu</h4>
        <h6 class="text-muted card-title mb-2 mb-xl-2 pb-xl-0" style="text-align: center;border-style: none;border-bottom: 1px none rgba(33,37,41,0.2) ;">
            Welcome, <?= $_SESSION['username'] ?></h6>
        <!-- =============== bidder =====================================================================-->
        <p class="card-text mb-xl-1 mt-xl-0 pt-1" style="border-top: 1px solid rgba(33,37,41,0.25) ;">
            General Menu
        </p>
        <ul class="nav nav-tabs d-flex flex-column" style="border-bottom-style: none;">
            <!-- --------------------------------------------------------------------------------------- -->
            <!-- Profile Detail -->
            <li class="nav-item">
                <a class="nav-link <?= !isset($_GET['subpage']) && empty($_GET['subpage']) ? 'active' : '' ?>" href="./?page=profile">
                    <i class="far fa-user me-1"></i>
                    <p class="d-inline" style="font-size: 16px;">Profile Detail</p>
                </a>
            </li>
            <!-- --------------------------------------------------------------------------------------- -->
            <!-- Order Bidder -->
            <li class="nav-item">
                <a class="nav-link <?= isset($_GET['subpage']) && $_GET['subpage'] == 'order_bidder' ? 'active' : '' ?>" href="./?page=profile&subpage=order_bidder">
                    <i class="far fa-list-alt me-1"></i>
                    <p class="d-inline" style="font-size: 16px;">Order Bidder</p>
                </a>
            </li>
            <!-- --------------------------------------------------------------------------------------- -->
            <!-- Order Bidder -->
            <li class="nav-item">
                <a class="nav-link <?= isset($_GET['subpage']) && $_GET['subpage'] == 'favorite' ? 'active' : '' ?>" href="./?page=profile&subpage=favorite">
                    <i class="bi bi-heart me-1"></i>
                    <p class="d-inline" style="font-size: 16px;">Favorite</p>
                </a>
            </li>
        </ul>


        <!-- [x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x][x] -->

        <!-- =============== Seller =====================================================================-->
        <p class="card-text mb-xl-1 mt-xl-0 pt-1" style="border-top: 1px solid rgba(33,37,41,0.25) ;">
            Seller Menu
        </p>
        <ul class="nav nav-tabs d-flex flex-column" style="border-bottom-style: none;">
            <!-- --------------------------------------------------------------------------------------- -->
            <!-- Product -->
            <li class="nav-item">
                <a class="nav-link <?= isset($_GET['subpage']) && $_GET['subpage'] == 'product' ? 'active' : '' ?>" href="./?page=profile&subpage=product">
                    <i class="bi bi-box-seam me-1"></i>
                    <p class="d-inline" style="font-size: 16px;">Product</p>
                </a>
            </li>
            <!-- --------------------------------------------------------------------------------------- -->
            <!-- Order Seller -->
            <li class="nav-item">
                <a class="nav-link <?= isset($_GET['subpage']) && $_GET['subpage'] == 'order_seller' ? 'active' : '' ?>" href="./?page=profile&subpage=order_seller">
                    <i class="bi bi-box-seam-fill me-1"></i>
                    <p class="d-inline" style="font-size: 16px;">Order Seller</p>
                </a>
            </li>
            <!-- --------------------------------------------------------------------------------------- -->
        </ul>
    </div>
</div>
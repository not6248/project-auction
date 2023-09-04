    <nav class="navbar navbar-expand-lg bg-body py-3" style="box-shadow: 0px 0px 8px rgba(33,37,41,0.1);">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="./"><img src="assets/img/logo.png" width="30" height="37"></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-2">
                <?php hide_for_regis_page('
                <div class="input-group search mt-3 mt-md-0 me-auto ms-0 pe-0 me-5 me-sm-5 me-md-0 pe-md-3 pe-lg-5 me-xl-0 pe-xl-0"">
                    <input class=" form-control search ms-0 pb-xxl-1 pt-xxl-1" type="text" placeholder="Search..." style="padding-left: 20px;" />
                    <button class="btn btn-primary" type="button">
                        <i class="bi bi-search me-md-2"></i>
                    </button>
                </div>')
                ?>


                <ul class="navbar-nav ms-auto ">
                    <!-- Navbar Menu List -->
                    <li class="nav-item"><a class="nav-link fw-bold" href="debug.php">debug.php</a></li>
                    <?= isset($_SESSION['user_type']) && $_SESSION['user_type'] == '2'
                        ? '<li class="nav-item"><a class="nav-link fw-bold" href="./?page=profile&subpage=product&function=add"><i class="fa-solid fa-plus"></i> Add Product</a></li>'
                        : '' ?>
                    <li class="nav-item"><a class="nav-link fw-bold" href="./">Home</a></li> <!-- active -->
                    <li class="nav-item "><a class="nav-link fw-bold d-flex align-items-center" href="#">Guide<i class="fa-solid fa-book fa-xs ms-1 pt-1"></i></a></li>
                    <li class="nav-item"><a class="nav-link fw-bold" href="#">About</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold" href="./?page=contact">Contact</a></li>
                    <!-- Profile Dropdown-->
                    <?php if (!(isset($_SESSION['login_status']) || !isset($_SESSION['username']))) : ?>
                        <div class="dropdown">
                            <button class="nav-link fw-bold dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-circle-user me-1"><?= $_SESSION['user_type'] == '2' ? '<sub><i class="fa-solid fa-circle-check fa-2xs" style="color: #2e8b57;"></i></sub>'  : '' ?></i>
                                <?= $_SESSION['username'] ?>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="./?page=profile">My Profile</a></li>
                                <li><a class="dropdown-item" href="./?page=profile&subpage=order_bidder">My Order</a></li>
                                <li><a id="logout-btn" class="dropdown-item text-danger" href="#">Logout</a></li>
                            </ul>
                        </div>
                    <?php endif ?>
                    <!-- End Profile Dropdown -->
                </ul>

                <?php if (isset($_SESSION['login_status']) || !isset($_SESSION['username'])) : ?>
                    <!-- Modal -->
                    <?php include './page/login/modal_login.php'; ?>
                    <!-- End Modal -->
                    <?php hide_for_regis_page('<a class="fw-bold btn btn-nav btn-dark ms-md-0" role="button" href="./?page=register">Register</a>') ?>
                <?php endif ?>
            </div>
        </div>
    </nav>

    <?php
    function hide_for_regis_page($no_regis)
    {
        if (!(isset($_GET['page']) && $_GET['page'] == 'register')) {
            echo $no_regis;
        } else {
            echo "";
        }
    } ?>
<div class="container py-5">
    <div class="row mt-5">
        <div class="col">
            <?php include 'menu.php'?>
        </div>
        <div style="min-height: 80vh;" class="col-sm-auto col-md-8 col-lg-8 col-xl-9 col-xxl-9">
            <?php
            if (!isset($_GET['subpage']) && empty($_GET['subpage'])) {
                include 'profile_detail/index.php';
            } elseif ((isset($_GET['subpage']) && $_GET['subpage'] == 'order_bidder')) {
                include 'order_bidder/index.php';
            }
            ?>
        </div>
    </div>
</div>
<?php

if (empty($_SESSION['email']) && empty($_SESSION['otp_chack'])) {
    echo '<script>window.location.href = "./";</script>';
    exit; // ออกจากการทำงานของสคริปต์ PHP เพื่อป้องกันการแสดงผลเนื้อหาหลังจากนี้
}
?>
<main id="page-container" class="form-otp w-100 m-auto mt-1">
    <div class="card border-0">
        <div class="card-body p-5 ps-4 pe-4 shadow-lg rounded-4 ">
            <div class="row justify-content-center">
                <div class="col-11">
                    <!-- Form -->
                    <form action="page/otp/register_otp_db.php" method="post">
                        <h1 class="text-center h2 fw-bold mb-3 mt-1 fw-normal">Code Verification</h1>
                        <?php
                        if (isset($_SESSION['info'])) : ?>
                            <div class="alert alert-success text-center" role="alert">
                                <?= $_SESSION['info']; ?>
                            </div>
                        <?php endif; ?>
                        <?php
                        if (isset($_SESSION['error'])) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $_SESSION['error'];
                                unset($_SESSION['error']); ?>
                            </div>
                        <?php endif; ?>

                        <div class="form-floating mb-3">
                            <input name="otp" type="number" class="form-control" id="floatingPassword" placeholder="verification code">
                            <label for="floatingPassword">verification code</label>
                        </div>
                        <button name="check_otp" class="btn btn-primary w-100 py-2" type="submit">Submit</button>
                    </form>
                    <!-- End Form -->
                </div>
            </div>
        </div>
    </div>
</main>
<!DOCTYPE html>
<html data-bs-theme="light" class="h-100" lang="en">

<?php include './includes/head.php'; ?>

<body style="background: rgb(255,255,255);" class="d-flex flex-column h-100">
    <?php include './includes/navbar.php'; ?> <!-- mavbar -->

    <?php
    if (!isset($_GET['page']) && empty($_GET['page'])) {
        include './page/homepage.php';
    } elseif ((isset($_GET['page']) && $_GET['page'] == 'register')) {
        if (isset($_GET['function']) && $_GET['function'] == 'verify_email') {
            include './page/otp/otp.php';
        } else {
            include './page/register/register.php';
        }
        //function

    }

    include "./includes/footer.php";

    include "./includes/scripts.php";
    ?>

    <script src="./assets/js/sweetalert.js"></script>
    <script src="./assets/js/main.js"></script>

    <?php
    //สำหรับเปิด modal เมื่อกรอก OTP เสร็จ
    if (!empty($_SESSION['otp_status']) && $_SESSION['otp_status'] === "success") {
        echo "
        <script>
        $(document).ready(function () {
            $('#Modal-login').modal('show');
        });
        </script>";
        unset($_SESSION['otp_status']);
    }
    ?>
    <div id="spinner-div" class="pt-5">
        <div class="spinner-border text-primary" role="status">
        </div>
    </div>
</body>

</html>
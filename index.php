<!DOCTYPE html>
<html data-bs-theme="light" class="h-100" lang="en">

<?php include './includes/head.php'; ?>

<body style="background: rgb(255,255,255);" class="d-flex flex-column h-100">
    <?php include './includes/navbar.php'; ?> <!-- mavbar -->

    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : '';
    $function = isset($_GET['function']) ? $_GET['function'] : '';

    switch ($page) {
        case '':
            include './page/homepage.php';
            break;
        case 'contact':
            include './page/contact.php';
            break;
        case 'register':
            if ($function == 'verify_email') {
                include './page/otp/otp.php';
            } else {
                include './page/register/register.php';
            }
            break;
        case 'profile':
            include './page/profile/index.php';
            break;
        case 'product':
            include './page/product_details/index.php';
            break;
        default:
            // หากไม่มีการกำหนดหน้าหรือไม่ตรงกับเงื่อนไขใดๆ
            include './page/homepage.php';
            break;
    }

    include "./includes/footer.php";

    include "./includes/scripts.php";
    ?>

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
    <!--  -->
    <div id="spinner-div" class="pt-5">
        <div class="spinner-border text-primary" role="status">
        </div>
    </div>
</body>

</html>
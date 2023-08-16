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
            include './page/otp/register_otp.php';
        } else {
            include './page/register/register.php';
        }
        //function

    }

    include "./includes/footer.php";

    include "./includes/scripts.php"
    ?>
</body>

</html>
<!DOCTYPE html>
<html data-bs-theme="light" class="h-100" lang="en">

<?php include './includes/head.php'; ?>

<body style="background: rgb(255,255,255);" class="d-flex flex-column h-100">
    <?php
    include './includes/navbar.php';

    if (!isset($_GET['page']) && empty($_GET['page'])) {
        include './page/homepage.php';
    } elseif ((isset($_GET['page']) && $_GET['page'] == 'register')) {
        include './page/register.php';
    }

    include "./includes/footer.php";
    include "./includes/scripts.php"
    ?>

    <!-- end nav -->
</body>

</html>
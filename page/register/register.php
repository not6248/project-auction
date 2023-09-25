<?php
if (!empty($_SESSION['otp_status'])) {
    unset($_SESSION['otp_status']);
}
?>

<main id="page-container" class="form-signin w-100 m-auto mt-1">
    <div class="container">
        <div class="card-body p-md-5">
            <div class="row justify-content-center">
                <div class="col-6">
                    <form id="registerForm" action="./ajax/ajax_register.php" method="post">
                        <h1 class="text-center h2 fw-bold mb-5 mt-4 fw-normal">สมัครสมาชิก</h1>
                        <div class="form-floating mb-2">
                            <input name="username" type="text" class="form-control" placeholder="Username">
                            <label for="floatingInput">ชื่อผู้ใช้</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input name="email" type="email" class="form-control" placeholder="Email address" autocomplete>
                            <label for="floatingInput">อีเมล์</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input name="password" type="password" class="form-control" placeholder="Password" autocomplete="new-password">
                            <label for="floatingPassword">รหัสผ่าน</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="c_password" type="password" class="form-control" placeholder="Confirm Password" autocomplete="new-password">
                            <label for="floatingPassword">ยืนยัน รหัสผ่าน</label>
                        </div>
                        <!-- <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Remember me
                </label>
            </div> -->
                        <button name="signup" class="btn btn-primary w-100 py-2" type="submit">ยืนยัน สมัครสมาชิก</button>
                    </form>
                </div>
                <div class="col-6 align-items-end img-regis">
                    <img src="./assets/img/regis_img.jpg" class="img-fluid" alt="Sample image">
                </div>
            </div>
        </div>
    </div>
</main>
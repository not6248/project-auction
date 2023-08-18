<?php
if (!empty($_SESSION['otp'])) {
    unset($_SESSION['otp']);
}
?>

<main id="page-container" class="form-signin w-100 m-auto mt-1">
    <div class="container">
        <div class="card-body p-md-5">
            <div class="row justify-content-center">
                <div class="col-6">
                    <form id="registerForm" action="page/register/register_db.php" method="post">
                        <h1 class="text-center h2 fw-bold mb-5 mt-4 fw-normal">Register</h1>

                        <div class="form-floating mb-2">
                            <input name="username" type="text" class="form-control" placeholder="Username">
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input name="email" type="email" class="form-control" placeholder="Email address">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input name="password" type="password" class="form-control" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="c_password" type="password" class="form-control" placeholder="Confirm Password">
                            <label for="floatingPassword">Confirm Password</label>
                        </div>

                        <!-- <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Remember me
                </label>
            </div> -->
                        <button name="signup" class="btn btn-primary w-100 py-2" type="submit">Register</button>
                    </form>
                </div>
                <div class="col-6 align-items-end img-regis">
                    <img src="./assets/img/regis_img.jpg" class="img-fluid" alt="Sample image">
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    $(document).ready(function() {
        $("#registerForm").submit(function(e) {
            e.preventDefault();
            let Method = $(this).attr("method");
            let formUrl = $(this).attr("action");
            let formData = $(this).serialize();
            $("#spinner-div").fadeIn(500);
            $.ajax({
                type: Method,
                url: formUrl,
                data: formData,
                success: function(data) {
                    let result = JSON.parse(data);
                    if (result.status == "success") { //success
                            window.location.href = "./?page=register&function=verify_email"
                    } else if (result.status == "warning") { //warning
                        console.log("warning");
                        Swal.fire({
                            title: 'แจ้งเตือน!',
                            text: result.msg,
                            icon: result.status,
                            heightAuto: false,
                            confirmButtonText: "เข้าสู่ระบบ",
                            // backdrop: false
                        }).then(function(result) {
                            if (result.isConfirmed) {
                                setTimeout(() => {
                                    $('#Modal-login').modal('show');
                                }, 200)
                            }
                            // window.location.reload();
                        });
                    } else { //error
                        console.log("error");
                        Swal.fire({
                            title: 'ล้มเหลว!',
                            text: result.msg,
                            icon: result.status,
                            heightAuto: false,
                            // backdrop: false
                        });
                    }
                },
                complete: function() {
                    // ซ่อน Spinners เมื่อเสร็จสิ้นการทำงานทุกกรณี
                    $("#spinner-div").hide();
                }
            });
        });
    });
</script>
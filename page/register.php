<main id="page-container" class="form-signin w-100 m-auto mt-1">
    <?php if (isset($_SESSION['error'])) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['error'];
            unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>

    <div class="container">
        <div class="card-body p-md-5">
            <div class="row justify-content-center">
                <div class="col-6">
                    <form action="page/register_db.php" method="post">
                        <h1 class="text-center h2 fw-bold mb-5 mt-4 fw-normal">Register</h1>

                        <div class="form-floating mb-2">
                            <input name="username" type="text" class="form-control" id="floatingInput" placeholder="Username">
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input name="email" type="email" class="form-control" id="floatingInput" placeholder="Email address">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="c_password" type="password" class="form-control" id="floatingPassword" placeholder="Confirm Password">
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
                <div class="col-6 d-flex align-items-end">
                    <img src="img/regis_img.jpg" class="img-fluid" alt="Sample image">
                </div>

            </div>
        </div>


    </div>
</main>
<button type="button" data-bs-target="#Modal-login" class="btn btn-nav btn-primary me-sm-2 ms-md-2 me-md-3" data-bs-toggle="modal" style="font-weight: bold;font-size: 16px;" >Login</button>
<div class="modal fade" id="Modal-login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content rounded-4 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <h1 class="fw-bold mb-0 fs-2">Login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 pb-2 pt-0">
                <!-- Form -->
                <form id="loginForm" action="./ajax/ajax_login.php" method="post" class="" data-bitwarden-watching="1">
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control rounded-3" placeholder="name@example.com"  autocomplete="current-password" required>
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control rounded-3" placeholder="Password" autocomplete="current-password" required>
                        <label for="floatingPassword">Password</label>
                        <p class="text-end mt-1"><a href="#" class="text-primary">Forgot Password?</a></p>
                    </div>

                    <button type="submit" name="login" class="w-100 mb-2 btn btn-lg rounded-3 btn-primary">Login</button>
                    <p class="text-center mt-2">not a member? <a href="?page=register" class="text-primary">Sign up</a> now</p>
                </form>
                <!-- End Form -->
            </div>
        </div>
    </div>
</div>
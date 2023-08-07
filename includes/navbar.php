    <nav class="navbar navbar-expand-md bg-body py-3" style="box-shadow: 0px 0px 8px rgba(33,37,41,0.1);">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="./"><img src="assets/img/logo.png" width="30" height="37"></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-2">
                <div class="input-group me-auto ms-0 pe-0 me-5 me-sm-5 me-md-0 pe-md-3 pe-lg-5 me-xl-0 pe-xl-0" ">

                    <input class=" form-control search ms-0 pb-xxl-1 pt-xxl-1" type="text" placeholder="Search..." style="padding-left: 20px;" />
                <button class="btn btn-primary" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="font-size: 20px;" class="me-md-2">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M18.319 14.4326C20.7628 11.2941 20.542 6.75347 17.6569 3.86829C14.5327 0.744098 9.46734 0.744098 6.34315 3.86829C3.21895 6.99249 3.21895 12.0578 6.34315 15.182C9.22833 18.0672 13.769 18.2879 16.9075 15.8442C16.921 15.8595 16.9351 15.8745 16.9497 15.8891L21.1924 20.1317C21.5829 20.5223 22.2161 20.5223 22.6066 20.1317C22.9971 19.7412 22.9971 19.1081 22.6066 18.7175L18.364 14.4749C18.3493 14.4603 18.3343 14.4462 18.319 14.4326ZM16.2426 5.28251C18.5858 7.62565 18.5858 11.4246 16.2426 13.7678C13.8995 16.1109 10.1005 16.1109 7.75736 13.7678C5.41421 11.4246 5.41421 7.62565 7.75736 5.28251C10.1005 2.93936 13.8995 2.93936 16.2426 5.28251Z" fill="currentColor"></path>
                    </svg></button>
            </div>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="debug.php" style="font-weight: bold;font-size: 16px;">debug.php</a></li>
                <li class="nav-item"><a class="nav-link active" href="#" style="font-weight: bold;font-size: 16px;">Home</a></li>
                <li class="nav-item" style="font-weight: bold;font-size: 16px;"><a class="nav-link" href="#" style="font-weight: bold;font-size: 16px;">About</a></li>
                <li class="nav-item" style="font-weight: bold;font-size: 16px;"><a class="nav-link" href="#" style="font-weight: bold;font-size: 16px;">Contact</a></li>
            </ul>
            <button type="button" class="btn btn-primary me-sm-2 ms-md-2 me-md-3" data-bs-toggle="modal" style="font-weight: bold;font-size: 16px;" data-bs-target="#exampleModal">Login</button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">เข้าสู่ระบบ</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label for="username">Email</label>
                            <input class="form-control" type="text" name="email">
                            <!-- Password -->
                            <label for="password">Password</label>
                            <input class="form-control" type="password" name="password">
                            <hr>
                            <p>ยังไม่เป็นสมาชิก? <a href="?page=register" class="text-primary">สมัครสมาชิก</a></p>
                            <!-- <p>Forgot <a href="#" class="text-primary">Password?</a></p>    -->
                            <!-- ระบบรีรหัสผ่านเมื่อลืม -->

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary float-end wave-ef" name="login" type="submit">เข้าสู่ระบบ</button>
                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button> -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- End Modal -->

            <!-- <a class="btn btn-primary me-sm-2 ms-md-2 me-md-3" role="button" href="#" style="font-weight: bold;font-size: 16px;">Login</a> -->
            <a class="btn btn-dark ms-md-0" role="button" href="?page=register" style="font-weight: bold;font-size: 16px;">Register</a>
        </div>
        </div>
    </nav>
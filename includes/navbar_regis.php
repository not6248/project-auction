    <nav class="navbar navbar-expand-md bg-body py-3" style="box-shadow: 0px 0px 8px rgba(33,37,41,0.1);">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="./"><img src="assets/img/logo.png" width="30" height="37"></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-2">


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
                <!-- <a class="btn btn-dark ms-md-0" role="button" href="?page=register" style="font-weight: bold;font-size: 16px;">Register</a> -->
            </div>
        </div>
    </nav>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<?php include './includes/head.php'; ?>

<body style="background: rgb(255,255,255);">
    <nav class="navbar navbar-expand-md bg-body py-3" style="box-shadow: 0px 0px 8px rgba(33,37,41,0.1);">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><img src="assets/img/logo.png" width="30" height="37"></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-2">
                <div class="input-group me-auto ms-0 pe-0 me-5 me-sm-5 me-md-0 pe-md-3 pe-lg-5 me-xl-0 pe-xl-0" "><input class=" form-control search ms-0" type="text" placeholder="Search..."><button class="btn btn-primary" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="font-size: 20px;" class="me-md-2">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M18.319 14.4326C20.7628 11.2941 20.542 6.75347 17.6569 3.86829C14.5327 0.744098 9.46734 0.744098 6.34315 3.86829C3.21895 6.99249 3.21895 12.0578 6.34315 15.182C9.22833 18.0672 13.769 18.2879 16.9075 15.8442C16.921 15.8595 16.9351 15.8745 16.9497 15.8891L21.1924 20.1317C21.5829 20.5223 22.2161 20.5223 22.6066 20.1317C22.9971 19.7412 22.9971 19.1081 22.6066 18.7175L18.364 14.4749C18.3493 14.4603 18.3343 14.4462 18.319 14.4326ZM16.2426 5.28251C18.5858 7.62565 18.5858 11.4246 16.2426 13.7678C13.8995 16.1109 10.1005 16.1109 7.75736 13.7678C5.41421 11.4246 5.41421 7.62565 7.75736 5.28251C10.1005 2.93936 13.8995 2.93936 16.2426 5.28251Z" fill="currentColor"></path>
                        </svg></button></div>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="debug.php" style="font-weight: bold;font-size: 16px;">debug.php</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#" style="font-weight: bold;font-size: 16px;">Home</a></li>
                    <li class="nav-item" style="font-weight: bold;font-size: 16px;"><a class="nav-link" href="#" style="font-weight: bold;font-size: 16px;">About</a></li>
                    <li class="nav-item" style="font-weight: bold;font-size: 16px;"><a class="nav-link" href="#" style="font-weight: bold;font-size: 16px;">Contact</a></li>
                </ul>
                <button type="button" class="btn btn-primary me-sm-2 ms-md-2 me-md-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Login</button>

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
                                <p>ยังไม่เป็นสมาชิก? <a href="register.php" class="text-primary">สมัครสมาชิก</a></p>
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
                <a class="btn btn-dark ms-md-0" role="button" href="#" style="font-weight: bold;font-size: 16px;">Register</a>
            </div>
        </div>
    </nav>
    <div class="container py-4 py-xl-5 pt-xl-3 pb-xl-3 pt-2 mt-xl-4 mt-4">
        <div class="row gy-4 gy-md-0 row-hero" style="/*background: #FFF6E2;*/border-radius: 20px;box-shadow: 8px 7px 10px rgba(33,37,41,0.18);">
            <div class="col-md-6 col-lg-4 col-xl-4 text-center text-md-start d-flex d-sm-flex d-md-flex justify-content-start align-items-center justify-content-md-start justify-content-xl-center ps-sm-0 me-sm-0 pe-sm-0 ms-sm-0 div-hero1" style="height: 450px;">
                <div class="text-start mt-xl-5 pt-xl-0 ms-xl-4 ms-sm-5 ms-4 ps-md-0 ms-md-4" style="max-width: 350px;width: 365.641px;height: 241.781px;">
                    <h1 class="text-uppercase fw-bold" style="font-family: Kanit, sans-serif;">Vinyl is old<br>But&nbsp;&nbsp;<span style="color: #FFB800;">GOld</span></h1>
                    <p  class="my-3" style="font-family: Kanit, sans-serif;font-size: 19px;">best auction site<br>Collected and selected for you.</p><a class="btn btn-dark btn-lg me-2" role="button" href="#product" style="font-family: 'Berkshire Swash', serif;">View Collection</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 col-xl-4 d-none d-sm-none d-md-none d-lg-inline d-xl-flex align-items-xl-center" style="height: 450px;background: #D6FFCF;border-top-right-radius: 0px;border-bottom-right-radius: 0px;box-shadow: inset 0px 0px 17px rgba(33,37,41,0.1);">
                <div class="p-xl-5 m-xl-5 mb-xl-0 mt-xl-3 mt-lg-5 pb-lg-0 mt-md-5 pb-md-0 ps-xl-0 pe-xl-0 pt-xl-0 pb-xl-0"><img class="img-fluid w-100 fit-cover pb-lg-2 mb-lg-0 pt-md-0 pb-md-2 pb-xl-5 pt-xl-5 me-lg-0" style="min-height: 300px;height: 0;" src="assets/img/Img1.png"></div>
            </div>
            <div class="col-md-6 col-lg-5 col-xl-4 d-none d-sm-none d-md-inline" style="height: 450px;background: #ffe09c;border-top-right-radius: 20px;border-bottom-right-radius: 20px;">
                <div class="p-xl-5 m-xl-5 mb-xl-0 mt-xl-3 mt-lg-5 pb-lg-0 pt-xl-5 pb-xl-0 mt-md-5 pb-md-0 ps-xl-0 pe-xl-0"><img class="rounded img-fluid w-100 fit-cover pb-lg-2 mb-lg-0 pb-xl-4 pt-md-0 pb-md-2" style="min-height: 300px;height: 409px;" src="assets/img/holdingman%202.png" width="164" height="409"></div>
            </div>
        </div>
    </div>
    <div class="container py-4 py-xl-5">
        <div class="row mb-5 mb-xl-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h2>Heading</h2>
                <p class="w-lg-50">Curae hendrerit donec commodo hendrerit egestas tempus, turpis facilisis nostra nunc. Vestibulum dui eget ultrices.</p>
            </div>
        </div>
        <div id="product">
            <div class="row pb-xl-5 pb-4">
                <div class="col"><button class="btn btn-primary mt-2 me-2" type="button" style="box-shadow: 0px 0px 6px rgba(13,110,253,0.46);">Historical Vinyls</button><button class="btn btn-light mt-2 me-2" type="button" style="box-shadow: 0px 0px 11px rgba(0,0,0,0.2);">Genre Vinyls</button><button class="btn btn-light mt-2 me-2" type="button" style="box-shadow: 0px 0px 11px rgba(0,0,0,0.2);">Artist Vinyls</button><button class="btn btn-light mt-2 me-2" type="button" style="box-shadow: 0px 0px 11px rgba(0,0,0,0.2);">Collector’s Vinyls</button></div>
            </div>
            <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3 mb-xl-4">
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <div class="card hover-p"><img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png">
                        <div class="card-body p-4 ps-xl-2 pe-xl-2">
                            <h4 class="card-title" style="font-size: 18px;font-family: 'Baloo Thambi 2', serif;font-weight: bold;">EyeHateGod Exclusive Brown </h4>
                            <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio,&nbsp;</p>
                            <div class="row mb-3" style="color: rgb(13,110,253);">
                                <div class="col-6 col-xl-6">
                                    <h6 style="font-family: Kanit, sans-serif;font-weight: bold;" class="mb-xl-0 pb-xl-2">ราคาปัจจุบัน</h6><span style="font-family: Kanit, sans-serif;">1,000 ฿</span>
                                </div>
                                <div class="col-6 col-xl-6 text-end">
                                    <h6 style="font-family: Kanit, sans-serif;font-weight: bold;" class="mb-xl-0 pb-xl-2">เวลาที่เหลือ</h6><span style="font-family: Kanit, sans-serif;">xx:xx:xx</span>
                                </div>
                            </div>
                            <div class="d-flex"><button class="btn btn-dark" type="button" style="font-weight: bold;width: 100%;">Start Bidding</button></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <div class="card"><img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png">
                        <div class="card-body p-4 ps-xl-2 pe-xl-2">
                            <h4 class="card-title" style="font-size: 18px;font-family: 'Baloo Thambi 2', serif;font-weight: bold;">EyeHateGod Exclusive Brown </h4>
                            <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio,&nbsp;</p>
                            <div class="row mb-3" style="color: rgb(13,110,253);">
                                <div class="col-6 col-xl-6">
                                    <h6 style="font-family: Kanit, sans-serif;font-weight: bold;" class="mb-xl-0 pb-xl-2">ราคาปัจจุบัน</h6><span style="font-family: Kanit, sans-serif;">1,000 ฿</span>
                                </div>
                                <div class="col-6 col-xl-6 text-end">
                                    <h6 style="font-family: Kanit, sans-serif;font-weight: bold;" class="mb-xl-0 pb-xl-2">เวลาที่เหลือ</h6><span style="font-family: Kanit, sans-serif;">xx:xx:xx</span>
                                </div>
                            </div>
                            <div class="d-flex"><button class="btn btn-dark" type="button" style="font-weight: bold;width: 100%;">Start Bidding</button></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <div class="card"><img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png">
                        <div class="card-body p-4 ps-xl-2 pe-xl-2">
                            <h4 class="card-title" style="font-size: 18px;font-family: 'Baloo Thambi 2', serif;font-weight: bold;">EyeHateGod Exclusive Brown </h4>
                            <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio,&nbsp;</p>
                            <div class="row mb-3" style="color: rgb(13,110,253);">
                                <div class="col-6 col-xl-6">
                                    <h6 style="font-family: Kanit, sans-serif;font-weight: bold;" class="mb-xl-0 pb-xl-2">ราคาปัจจุบัน</h6><span style="font-family: Kanit, sans-serif;">1,000 ฿</span>
                                </div>
                                <div class="col-6 col-xl-6 text-end">
                                    <h6 style="font-family: Kanit, sans-serif;font-weight: bold;" class="mb-xl-0 pb-xl-2">เวลาที่เหลือ</h6><span style="font-family: Kanit, sans-serif;">xx:xx:xx</span>
                                </div>
                            </div>
                            <div class="d-flex"><button class="btn btn-dark" type="button" style="font-weight: bold;width: 100%;">Start Bidding</button></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <div class="card"><img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png">
                        <div class="card-body p-4 ps-xl-2 pe-xl-2">
                            <h4 class="card-title" style="font-size: 18px;font-family: 'Baloo Thambi 2', serif;font-weight: bold;">EyeHateGod Exclusive Brown </h4>
                            <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio,&nbsp;</p>
                            <div class="row mb-3" style="color: rgb(13,110,253);">
                                <div class="col-6 col-xl-6">
                                    <h6 style="font-family: Kanit, sans-serif;font-weight: bold;" class="mb-xl-0 pb-xl-2">ราคาปัจจุบัน</h6><span style="font-family: Kanit, sans-serif;">1,000 ฿</span>
                                </div>
                                <div class="col-6 col-xl-6 text-end">
                                    <h6 style="font-family: Kanit, sans-serif;font-weight: bold;" class="mb-xl-0 pb-xl-2">เวลาที่เหลือ</h6><span style="font-family: Kanit, sans-serif;">xx:xx:xx</span>
                                </div>
                            </div>
                            <div class="d-flex"><button class="btn btn-dark" type="button" style="font-weight: bold;width: 100%;">Start Bidding</button></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <div class="card"><img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png">
                        <div class="card-body p-4 ps-xl-2 pe-xl-2">
                            <h4 class="card-title" style="font-size: 18px;font-family: 'Baloo Thambi 2', serif;font-weight: bold;">EyeHateGod Exclusive Brown </h4>
                            <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio,&nbsp;</p>
                            <div class="row mb-3" style="color: rgb(13,110,253);">
                                <div class="col-6 col-xl-6">
                                    <h6 style="font-family: Kanit, sans-serif;font-weight: bold;" class="mb-xl-0 pb-xl-2">ราคาปัจจุบัน</h6><span style="font-family: Kanit, sans-serif;">1,000 ฿</span>
                                </div>
                                <div class="col-6 col-xl-6 text-end">
                                    <h6 style="font-family: Kanit, sans-serif;font-weight: bold;" class="mb-xl-0 pb-xl-2">เวลาที่เหลือ</h6><span style="font-family: Kanit, sans-serif;">xx:xx:xx</span>
                                </div>
                            </div>
                            <div class="d-flex"><button class="btn btn-dark" type="button" style="font-weight: bold;width: 100%;">Start Bidding</button></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <div class="card"><img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png">
                        <div class="card-body p-4 ps-xl-2 pe-xl-2">
                            <h4 class="card-title" style="font-size: 18px;font-family: 'Baloo Thambi 2', serif;font-weight: bold;">EyeHateGod Exclusive Brown </h4>
                            <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio,&nbsp;</p>
                            <div class="row mb-3" style="color: rgb(13,110,253);">
                                <div class="col-6 col-xl-6">
                                    <h6 style="font-family: Kanit, sans-serif;font-weight: bold;" class="mb-xl-0 pb-xl-2">ราคาปัจจุบัน</h6><span style="font-family: Kanit, sans-serif;">1,000 ฿</span>
                                </div>
                                <div class="col-6 col-xl-6 text-end">
                                    <h6 style="font-family: Kanit, sans-serif;font-weight: bold;" class="mb-xl-0 pb-xl-2">เวลาที่เหลือ</h6><span style="font-family: Kanit, sans-serif;">xx:xx:xx</span>
                                </div>
                            </div>
                            <div class="d-flex"><button class="btn btn-dark" type="button" style="font-weight: bold;width: 100%;">Start Bidding</button></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <div class="card"><img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png">
                        <div class="card-body p-4 ps-xl-2 pe-xl-2">
                            <h4 class="card-title" style="font-size: 18px;font-family: 'Baloo Thambi 2', serif;font-weight: bold;">EyeHateGod Exclusive Brown </h4>
                            <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio,&nbsp;</p>
                            <div class="row mb-3" style="color: rgb(13,110,253);">
                                <div class="col-6 col-xl-6">
                                    <h6 style="font-family: Kanit, sans-serif;font-weight: bold;" class="mb-xl-0 pb-xl-2">ราคาปัจจุบัน</h6><span style="font-family: Kanit, sans-serif;">1,000 ฿</span>
                                </div>
                                <div class="col-6 col-xl-6 text-end">
                                    <h6 style="font-family: Kanit, sans-serif;font-weight: bold;" class="mb-xl-0 pb-xl-2">เวลาที่เหลือ</h6><span style="font-family: Kanit, sans-serif;">xx:xx:xx</span>
                                </div>
                            </div>
                            <div class="d-flex"><button class="btn btn-dark" type="button" style="font-weight: bold;width: 100%;">Start Bidding</button></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <div class="card"><img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png">
                        <div class="card-body p-4 ps-xl-2 pe-xl-2">
                            <h4 class="card-title" style="font-size: 18px;font-family: 'Baloo Thambi 2', serif;font-weight: bold;">EyeHateGod Exclusive Brown </h4>
                            <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio,&nbsp;</p>
                            <div class="row mb-3" style="color: rgb(13,110,253);">
                                <div class="col-6 col-xl-6">
                                    <h6 style="font-family: Kanit, sans-serif;font-weight: bold;" class="mb-xl-0 pb-xl-2">ราคาปัจจุบัน</h6><span style="font-family: Kanit, sans-serif;">1,000 ฿</span>
                                </div>
                                <div class="col-6 col-xl-6 text-end">
                                    <h6 style="font-family: Kanit, sans-serif;font-weight: bold;" class="mb-xl-0 pb-xl-2">เวลาที่เหลือ</h6><span style="font-family: Kanit, sans-serif;">xx:xx:xx</span>
                                </div>
                            </div>
                            <div class="d-flex"><button class="btn btn-dark" type="button" style="font-weight: bold;width: 100%;">Start Bidding</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="text-center bg-dark">
        <div class="container text-white py-4 py-lg-5 pb-xl-2 mt-xl-0 pt-xl-3">
            <ul class="list-inline">
                <li class="list-inline-item me-4"><a class="link-light" href="#">Web design</a></li>
                <li class="list-inline-item me-4"><a class="link-light" href="#">Development</a></li>
                <li class="list-inline-item"><a class="link-light" href="#">Hosting</a></li>
            </ul>
            <ul class="list-inline">
                <li class="list-inline-item me-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-facebook text-light">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
                    </svg></li>
                <li class="list-inline-item me-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-twitter text-light">
                        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"></path>
                    </svg></li>
                <li class="list-inline-item"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-instagram text-light">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"></path>
                    </svg></li>
            </ul>
        </div>
    </footer>
    <?php include "./includes/scripts.php" ?>
</body>

</html>
<div class="card" style="background: rgb(236,238,249);box-shadow: 0px 4px 4px rgba(33,37,41,0.25);">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h4 class="card-title " style="font-size: 28px;">Order tracking</h4>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12">
                            <div class="card card-stepper text-black">
                                <div class="card-body p-5">
                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                        <div>
                                            <h5 class="mb-0">ORDER <span class="text-primary font-weight-bold">#<?=$_GET['order_id']?></span></h5>
                                        </div>
                                        <div class="text-end">
                                            <!-- <p class="mb-0">Expected Arrival <span>01/12/19</span></p> -->
                                            <p class="mb-0">Tracking Number : <span class="font-weight-bold">234094567242423422898</span></p>
                                        </div>
                                    </div>

                                    <ul id="progressbar-2" class="d-flex justify-content-between mx-0 mt-0 mb-5 px-0 pt-0 pb-2">
                                        <li class="step0 active text-center" id="step1"></li>
                                        <li class="step0 active text-center" id="step2"></li>
                                        <li class="step0 active text-center" id="step3"></li>
                                        <li class="step0 active text-center" id="step4"></li>
                                        <!-- <li class="step0 active text-muted text-end" id="step4"></li> -->
                                    </ul>

                                    <div class="d-flex justify-content-between">
                                        <div class="d-lg-flex align-items-center">
                                            <i class="fas fa-clipboard-list fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                                            <div>
                                                <p class="fw-bold mb-1">Order</p>
                                                <p class="fw-bold mb-0">Processed</p>
                                            </div>
                                        </div>
                                        <div class="d-lg-flex align-items-center">
                                            <i class="fas fa-box-open fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                                            <div>
                                                <p class="fw-bold mb-1">Order</p>
                                                <p class="fw-bold mb-0">Shipped</p>
                                            </div>
                                        </div>
                                        <div class="d-lg-flex align-items-center">
                                            <i class="fas fa-shipping-fast fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                                            <div>
                                                <p class="fw-bold mb-1">Order</p>
                                                <p class="fw-bold mb-0">En Route</p>
                                            </div>
                                        </div>
                                        <div class="d-lg-flex align-items-center">
                                            <i class="fas fa-home fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                                            <div>
                                                <p class="fw-bold mb-1">Order</p>
                                                <p class="fw-bold mb-0">Arrived</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer py-3">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 px-4">
                <div class="d-flex justify-content-end">
                    <button class=" btn btn-primary me-2" type="submit">ทดสอบ</button>
                    <button class=" btn btn-primary " type="submit">ทดสอบ2</button>
                </div>
            </div>
        </div>

    </div>
</div>
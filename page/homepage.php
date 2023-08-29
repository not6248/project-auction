 <div class="container py-4 py-xl-5 pt-xl-3 pb-xl-3 pt-2 mt-xl-4 mt-4">
     <div class="row gy-4 gy-md-0 row-hero" style="/*background: #FFF6E2;*/border-radius: 20px;box-shadow: 8px 7px 10px rgba(33,37,41,0.18);">
         <div class="col-md-6 col-lg-4 col-xl-4 text-center text-md-start d-flex d-sm-flex d-md-flex justify-content-start align-items-center justify-content-md-start justify-content-xl-center ps-sm-0 me-sm-0 pe-sm-0 ms-sm-0 div-hero1" style="height: 450px;">
             <div class="text-start mt-xl-5 pt-xl-0 ms-xl-4 ms-sm-5 ms-4 ps-md-0 ms-md-4" style="max-width: 350px;width: 365.641px;height: 241.781px;">
                 <h1 class="text-uppercase fw-bold">Vinyl is old<br>But&nbsp;&nbsp;<span style="color: #FFB800;">GOld</span></h1>
                 <p class="my-3" style="font-size: 19px;">best auction site<br>Collected and selected for you.</p><a class="btn btn-dark btn-lg me-2" role="button" href="#product" style="font-family: 'Berkshire Swash', serif;">View Collection</a>
             </div>
         </div>
         <div class="col-md-6 col-lg-3 col-xl-4 d-none d-sm-none d-md-none d-lg-inline d-xl-flex align-items-xl-center" style="height: 450px;background: #D6FFCF;border-top-right-radius: 0px;border-bottom-right-radius: 0px;box-shadow: inset 0px 0px 17px rgba(33,37,41,0.1);">
             <div class="p-xl-5 m-xl-5 mb-xl-0 mt-xl-3 mt-lg-5 pb-lg-0 mt-md-5 pb-md-0 ps-xl-0 pe-xl-0 pt-xl-0 pb-xl-0">
                 <img class="img-fluid w-100 fit-cover pb-lg-2 mb-lg-0 pt-md-0 pb-md-2 pb-xl-5 pt-xl-5 me-lg-0" style="min-height: 300px;height: 0;" src="assets/img/Img1.png">
             </div>
         </div>
         <div class="col-md-6 col-lg-5 col-xl-4 d-none d-sm-none d-md-inline" style="height: 450px;background: #ffe09c;border-top-right-radius: 20px;border-bottom-right-radius: 20px;">
             <div class="p-xl-5 m-xl-5 mb-xl-0 mt-xl-3 mt-lg-5 pb-lg-0 pt-xl-5 pb-xl-0 mt-md-5 pb-md-0 ps-xl-0 pe-xl-0">
                 <img class="rounded img-fluid w-100 fit-cover pb-lg-2 mb-lg-0 pb-xl-4 pt-md-0 pb-md-2" style="min-height: 300px;height: 409px;" src="assets/img/holdingman%202.png" width="164" height="409">
             </div>
         </div>
     </div>
 </div>
 <div class="container py-4 py-xl-5">
     <div class="row mb-5 mb-xl-5">
         <div class="col-md-8 col-xl-6 text-center mx-auto">
             <h2>Heading</h2>
             <p class="w-lg-50">
                 Online audio auction website offers a platform for buying and selling audio recordings. Our goal is to provide a seamless and efficient marketplace for audio enthusiasts to connect and trade their recordings.</p>
         </div>
     </div>
     <?php $sqlpro_type = "SELECT * FROM product_type";
        $sqlpro_type_result = mysqli_query($conn, $sqlpro_type); ?>
     <div id="product">
         <div class="row pb-xl-5 pb-4">
             <div id="btn-product-type" class="col">
                 <a href="./" class="btn <?= !isset($_GET['filter_product_typeID'])
                                                ? "btn btn-primary"
                                                : "btn-light" ?> mt-2 me-2 category-btn" role="button">All</a>

                 <?php foreach ($sqlpro_type_result as $row_pro_type) : ?>
                     <a href="./?filter_product_typeID=<?= $row_pro_type['pd_type_id']?>" class="btn <?= isset($_GET['filter_product_typeID']) && $_GET['filter_product_typeID'] == $row_pro_type['pd_type_id']
                                                                                                            ? "btn btn-primary"
                                                                                                            : "btn-light" ?> mt-2 me-2 category-btn" role="button"><?= $row_pro_type['pd_type_name'] ?></a>
                 <?php endforeach ?>
                 <!-- <a href="" class="btn btn-primary mt-2 me-2 category-btn" role="button" ">Genre Vinyls</a> -->
             </div>
         </div>
         <div id=" product-list" class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3 mb-xl-4">
                <?php include 'homepage_product_list.php'?>
             <!-- <div class="col-sm-6 col-lg-4 col-xl-3">
                     <div class="card hover-p">
                         <img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png">
                         <div class="card-body p-4 ps-xl-2 pe-xl-2">
                             <h4 class="card-title" style="font-size: 18px;font-family: 'Baloo Thambi 2', serif;font-weight: bold;">EyeHateGod Exclusive Brown </h4>
                             <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio,&nbsp;</p>
                             <div class="row mb-3" style="color: rgb(13,110,253);">
                                 <div class="col-6 col-xl-6">
                                     <h6 style="font-weight: bold;" class="mb-xl-0 pb-xl-2">ราคาปัจจุบัน</h6>
                                     <span>1,000 ฿</span>
                                 </div>
                                 <div class="col-6 col-xl-6 text-end">
                                     <h6 style="font-weight: bold;" class="mb-xl-0 pb-xl-2">เวลาที่เหลือ</h6>
                                     <span>xx:xx:xx</span>
                                 </div>
                             </div>
                             <div class="d-flex">
                                 <button class="btn btn-dark" type="button" style="font-weight: bold;width: 100%;">Start Bidding</button>
                             </div>
                         </div>
                     </div>
                 </div> -->
         </div>
     </div>
 </div>
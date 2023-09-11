<!-- Modal -->
<div class="modal fade" id="bid-modal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div style="--bs-modal-width: 550px;" class="modal-dialog">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header border-bottom-0">
        <h1 class="modal-title fs-5"><?= $row['pd_name'] ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body py-0">
        <div class="row mb-3">
          <div class="col-6">
            <img class="product-image h-100 w-100 rounded-2" width="150" height="150" src="./upload/product/<?= $pd_img[0] ?>">
          </div>
          <div class="col-6">
            <p class=" fw-bold mb-0 fs-5">ราคาปัจจุบัน : <span id="price-now"><?=number_format($row_order_summary['total_price'], 0)?></span></p>
            <p class=" fw-bold mb-1 fs-5">สภาพสินค้า : <?= $pd_condition_arr[$row['pd_condition']] ?></p>
            <!-- Start Form -->
            <form id="bid-form" action="ajax/ajax_bid.php" method="post" data-pd-id="<?=$pd_id?>" data-pd-price-chack="<?=$row_order_summary['total_price']?>">
              <div class="input-group w-50 ">
                <!-- INPUT -->
                <input name="price-offer"  id="price-offer" type="number" class="form-control pe-1 text-end" min="1" max="10000" required aria-label="THB amount" onInput="this.value = this.value.slice(0, 5)" onkeydown="return event.keyCode !== 69">
                <span class="input-group-text px-1">0</span><span class="input-group-text px-1">฿</span>
              </div>
              <p class="fs-5 mb-0 mt-2">Offer price at : <span class=" fw-bold " id="x10-price-offer">--</span> ฿</p>
              <p class="fs-5 mb-0">หากคุณชนะ ราคาที่ชำระคือ</p>
              <p id="price-if-you-win" class="fs-5 mb-0">100000</p>
              <p></p>
          </div>
        </div>
        <div class="col d-flex ">

        </div>
      </div>
      <div class="modal-footer align-items-stretch  gap-2 pb-3 border-top-0">
        <button type="submit" class="btn btn-lg btn-primary flex-grow-1"><i class="fa-solid fa-gavel"></i> BID</button>
        <button type="button" class="btn btn-lg btn-danger  flex-grow-1" data-bs-dismiss="modal">Close</button>
      </div>
    </form>
    <!-- End Form -->
    </div>
  </div>
</div>
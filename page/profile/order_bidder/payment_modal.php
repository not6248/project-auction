<div class="modal fade" id="pay_slip_img" tabindex="-1" aria-labelledby="pay_slip_imgLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="pay_slip_imgLabel">อัพโหลดหลักฐานการชำระเงิน</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Start Form -->
                <form action="ajax/ajax_payment_upload.php" method="post" id="pay_slip_img_form" data-pd-id="<?=$row['pd_id']?>">
                    <img class="h-100 w-100" src="assets/img/payment_list.png" alt="id_card_verify" srcset="">
                    <div class="mb-3">
                        <p class="mb-0 ms-1">Payment channels</p>
                        <div class="d-flex ps-3">
                            <div class="me-4">
                                <!-- checked="checked" -->
                                <input required="" value="1" type="radio" class="form-check-input" name="bank">
                                <label class="form-check-label me-2" >ธนาคารกสิกรไทย</label>
                                <input required="" value="2" type="radio" class="form-check-input" name="bank">
                                <label class="form-check-label me-2" >พร้อมเพย์</label>
                                <input required="" value="3" type="radio" class="form-check-input" name="bank">
                                <label class="form-check-label me-2" >ธนาคารกรุงไทย</label>
                            </div>
                        </div>
                    </div>
                    <input class="form-control" name="payment-img-input" type="file" id="payment-img-input" required value="" />
                    <div class="modal-footer">
                        <button name="pay_slip_img_btn" type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
                <!-- End Form -->
            </div>
        </div>
    </div>
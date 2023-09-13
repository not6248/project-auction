<div class="modal fade" id="add_id_card_img" tabindex="-1" aria-labelledby="add_id_card_imglLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="add_id_card_imglLabel">ยืนยันบัตรประชาชน</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Start Form -->
                <form action="ajax/ajax_IDcard_upload.php" method="post" id="add_id_card_img_form">
                    <img class="h-100 w-100 " src="assets/img/id_card_verify.png" alt="id_card_verify" srcset="">
                    <input class="form-control" name="id-card-img-pd-input" type="file" id="main-img-pd-input" required value="" />
            </div>
            <div class="modal-footer">
                <button name="add_id_card_img" type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
            <!-- End Form -->
        </div>
    </div>
</div>
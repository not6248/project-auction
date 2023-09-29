<!-- Modal -->
<div class="modal fade" id="seller_contact" tabindex="-1" aria-labelledby="seller_contactLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="seller_contactLabel">ช่องทางการติดต่อผู้ขาย</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card mb-2">
                    <div class="card-body">
                        <h6 class="mb-1">เบอร์โทรศัพท์ :</h6>
                        <p class="card-text"><?=$row['ud_phone']?></p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-1">Email :</h6>
                        <p class="card-text"><?=$row['user_email']?></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>
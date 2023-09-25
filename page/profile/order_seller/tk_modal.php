<?php
$resule = mysqli_query($conn, "SELECT * FROM delivery_type");
?>
<!-- Modal -->
<div class="modal fade" id="tk_modal" tabindex="-1" aria-labelledby="tk_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tk_modalLabel">แบบฟอร์มหมายเลขพัสดุ</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="tk_form" action="ajax/ajax_tracking_number.php" method="post">
                <div class="form-floating mb-3">
                        <input type="text" name="tk_num" class="form-control rounded-3" id="floatingPassword" placeholder="Tracking number" required>
                        <label for="floatingPassword">หมายเลขพัสดุ</label>
                </div>
                <div>
                    <select class="form-select w-75" name="tk_type" id="" required>
                        <option selected disabled value="">= กรุณาเลือกช่องทางการขนส่ง =</option>
                        <?php foreach ($resule as $row) : ?>
                            <option value="<?= $row['dlvt_id'] ?>"><?=$row['dlvt_name']?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">บันทึก</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                </form>
            </div>
        </div>
    </div>
</div>
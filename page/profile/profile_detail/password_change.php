<div class="modal fade" id="passModal" tabindex="-1" aria-labelledby="passModallLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="passModallLabel">ยืนยันบัตรประชาชน</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Start Form -->
                <form action="ajax/ajax_pass_change.php" method="post" id="passModal_form">
                <div class="form-floating mb-3">
                        <input type="password" name="pass_old" class="form-control rounded-3" id="floatingPassword" placeholder="Tracking number" required>
                        <label for="floatingPassword">รหัสผ่านเก่า</label>
                </div>
                <div class="form-floating mb-3">
                        <input type="password" name="pass_new" class="form-control rounded-3" id="floatingPassword" placeholder="Tracking number" required>
                        <label for="floatingPassword">รหัสผ่านใหม่</label>
                </div>
                <div class="form-floating mb-3">
                        <input type="password" name="pass_new_c" class="form-control rounded-3" id="floatingPassword" placeholder="Tracking number" required>
                        <label for="floatingPassword">ยืนยันรหัสผ่านใหม่</label>
                </div>
            </div>
            <div class="modal-footer">
                <button name="passModal" type="submit" class="btn btn-primary">บันทึก</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
            </div>
            </form>
            <!-- End Form -->
        </div>
    </div>
</div>
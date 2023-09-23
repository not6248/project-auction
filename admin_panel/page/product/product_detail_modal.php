<!-- Modal -->
<div class="modal fade" id="product_detail_modal-<?= $row['pd_id']?>" tabindex="-1" aria-labelledby="product_detail_modal-<?= $row['pd_id']?>Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="product_detail_modal-<?= $row['pd_id']?>Label">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p><?= $row['pd_detail'] ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
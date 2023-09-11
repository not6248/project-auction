<div class="col-sm-9 col-md-6 col-lg-4 col-xl-4 mt-4 mt-md-0">
    <div class="col-12">
        <img class="product-image w-100" width="420" height="420" src="./upload/product/<?= $pd_img[0] ?>"">
    </div>
    <div class="col-12 mt-2 d-flex product-image-thumbs">
        <?php
        foreach ($pd_img as $file_img_name) : ?>
            <div class="product-image-thumb img-thumbnail cursor-pointer me-2 <?= $isFirst ? 'active' : '' ?>"><img width="80" height="80" src="./upload/product/<?= $file_img_name ?>" alt="Product Image"></div>

        <?php $isFirst = false;
        endforeach
        ?>
    </div>
</div>
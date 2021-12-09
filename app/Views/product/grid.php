<div class="row">
    <!-- Single Product -->
    <?php foreach ($products as $product) : ?>
        <div class="col-md-6 col-lg-4 col-xl-3">
            <div id="" class="single-product">
                <div class="part-1">
                    <img class="product-img" src="<?= request()->baseUrl() ?>/assets/img/product/<?= $product->image ?>" alt="">
                    <ul>
                        <li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fas fa-heart"></i></a></li>
                        <li><a href="<?= request()->baseUrl() ?>/product/detail?id=<?=$product->id?>"><i class="fas fa-expand"></i></a></li>
                        <li><a class="delete" href="<?= request()->baseUrl() ?>/delete-product" data-id="<?= $product->id ?>" title="Delete <?= $product->name ?>" data-name="<?= $product->name ?>" data-return-url="<?= request()->fullUrl(); ?>"><i class="fas fa-trash"></i></a></li>
                    </ul>
                </div>
                <div class="part-2">
                    <h3 class="product-title"><?= $product->name ?></h3>
                    <h4 class="product-old-price"><?= $product->price ?> VND</h4>
                    <h4 class="product-price"><?= $product->price ?> VND</h4>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- Single Product -->

</div>

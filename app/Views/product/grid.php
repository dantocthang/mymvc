<div class="row">
    <!-- Single Product -->
    <?php foreach ($products as $product) : ?>
        <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="single-product">
                <div class="part-1">
                    <a href="<?= request()->baseUrl() ?>/product/detail?id=<?= $product->id ?>">
                        <img class="product-img" src="<?= request()->baseUrl() ?>/assets/img/product/<?= $product->image ?>" alt="">
                    </a>
                    <ul>
                        <li><a href="/product/add-to-cart?id=<?= $product->id ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fas fa-heart"></i></a></li>
                        <li><a href="<?= request()->baseUrl() ?>/product/detail?id=<?= $product->id ?>"><i class="fas fa-expand"></i></a></li>
                    </ul>
                </div>
                <div class="part-2">
                    <h3 class="product-title fs-4"><?= $product->name ?></h3>
                    <h4 class="product-price">Giá: <?= $product->price ?> VND</h4>
                </div>
            </div>


        </div>
    <?php endforeach; ?>
    <!-- Single Product -->

</div>

<div class="pagination">
    <?= $this->insert('partials/pagination', ['paginator' => $paginator]); ?>
</div>
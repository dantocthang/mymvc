<?php $this->layout(config('view.layout')) ?>

<?php $this->start('css'); ?>
<?= $this->insert('product/grid-css'); ?>
<?php $this->stop(); ?>

<?php $this->start('page') ?>
<div class="  ">
    <div class="row">
        <section class="section-products">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-md-8 col-lg-6">
                        <div class="header">
                            <h3>Product List</h3>
                            <h2>Popular Products</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Single Product -->
                    <?php foreach ($products as $product): ?>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div id="" class="single-product">
                            <div class="part-1">
                                <img class="product-img" src="<?=request()->baseUrl()?>/assets/img/product/<?=$product->image?>" alt="">
                                <ul>
                                    <li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fas fa-plus"></i></a></li>
                                    <li><a href="#"><i class="fas fa-expand"></i></a></li>
                                </ul>
                            </div>
                            <div class="part-2">
                                <h3 class="product-title"><?=$product->name?></h3>
                                <h4 class="product-old-price"><?=$product->price?> VND</h4>
                                <h4 class="product-price"><?=$product->price?> VND</h4>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <!-- Single Product -->
                    
                </div>
            </div>
        </section>
        <?php $this->stop() ?>
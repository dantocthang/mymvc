<?php $this->layout(config('view.layout')) ?>

<?php $this->start('css'); ?>
<?= $this->insert('product/grid-css'); ?>
<?php $this->stop(); ?>

<?php $this->start('page') ?>
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
            <div id="product-list">
                <?php $this->insert('product/grid', [
                    'products' => $products,
                    //'paginator' => $paginator
                ]); ?>
            </div>
        </div>
    </section>
</div>
</div>
<?php $this->stop() ?>

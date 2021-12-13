<?php $this->layout(config('view.layout')) ?>

<?php $this->start('css'); ?>
<?= $this->insert('product/grid-css'); ?>
<?php $this->stop(); ?>

<?php $this->start('page') ?>
<div class="row">
    <section class="section-products">
        <div class="container">
            <div class="section-title">
                <h2>Danh sách sản phẩm</h2>
                
                <h3><?= $category ?? null ? $category->name : ''?></h3>
            </div>
            <div class="mb-3">
                <a href="/product" class="btn btn-primary">Tất cả sản phẩm</a>
                <?php foreach ($categories as $category) : ?>
                    <a href="/product?category_name=<?= $category->name ?>" class="btn btn-primary"><?= $category->name ?></a>
                <?php endforeach; ?>
            </div>
            <div class="mb-3 fs-5">
                <?=$keyword ?? null ? 'Tìm kiếm cho từ khóa "' . $keyword .'"' : ''?>

            </div>
            <div id="item-list">
                <?php $this->insert('product/grid', [
                    'products' => $products,
                    'paginator' => $paginator
                ]); ?>
            </div>
        </div>
    </section>
</div>
</div>
<?php $this->stop() ?>
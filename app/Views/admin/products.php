<?php $this->layout(config('view.layout')) ?>

<?php $this->start('page') ?>
<div class="section">
    <div class="containter row justify-content-center">
        <div class="row">
            <div class="col-12 ">
                <h3 class="title">Quản lý sản phẩm</h3>
            </div>
        </div>
        <div class="col-10 row align-items-start ">
            <div class="col-4 mt-5 ">
                <a href="/admin/products/add" class="btn btn-success">Thêm sản phẩm</a>
            </div>
        </div>
        <div class="col-10 row align-items-start ">
            <div class="col-10 mt-2 ">
            <a href="/admin/products" class="btn btn-primary">Tất cả sản phẩm</a>
            <?php foreach( $categories as $category): ?>
                    <a href="/admin/products?category_name=<?= $category->name?>" class="btn btn-primary"><?=$category->name?></a>
            <?php endforeach;?>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-10 m-auto mt-2 item-list">
                <?php $this->insert('admin/product-list', [
                    'products' => $products,
                    'paginator' => $paginator
                ]);
                ?>
            </div>
        </div>
    </div>
</div>


<style>
    h3.title {
        text-align: center;
        margin-top: 2rem;
        color: #1e90ff;
    }
</style>
<?php $this->stop(); ?>
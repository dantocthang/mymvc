<?php $this->layout(config('view.layout')) ?>

<?php $this->start('page') ?>
<div class="section">
    <div class="containter">
        <div class="row">
            <div class="col-12">
                <h3>Quản lý loại sản phẩm</h3>
            </div>
        </div>
        <div class="col-6 ">
            <form action="/admin/categories" method="POST">
                <div class="form-row d-flex align-items-center">
                    <input type="text" name="name" id="category" class="form-control form-input" placeholder="Nhập tên loại sản phẩm" />
                    <button type="submit" class="btn btn-primary form-btn">Thêm</button>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-10 m-auto mt-2">
                <?php $this->insert('admin/cat-list', [
                    'categories' => $categories,
                    'paginator' => $paginator
                ]);
                ?>
            </div>
        </div>
    </div>
</div>


<style>
.form-row{
    display: flex;

}
.form-input{
    flex: 1;
}

.form-btn{
    min-width: 90px;
}
</style>
<?php $this->stop(); ?>
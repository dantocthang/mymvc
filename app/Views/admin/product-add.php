<?php

use App\Models\Category;

$this->layout(config('view.layout')) ?>

<?php $this->start('page') ?>
<div class="section row justify-content-center align-items-center">
    <h3 class="title"><?= $product ?? null ? 'Chỉnh sửa thông tin sản phẩm' : 'Thêm sản phẩm' ?></h3>
    <div class="row col-8 mt-5">
        <div class="row align-items-start ">
            <div class="col-4 mt-5 ">
                <a href="/admin/products" class="btn btn-primary mb-2">Danh sách sản phẩm</a>
            </div>
        </div>
        <form action="/admin/products/<?= $product ?? null ? 'edit' : 'add' ?>" method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <select name="category" id="category" class="form-select" aria-label="Default select example">

                    <option selected>Chọn loại sản phẩm</option>

                    <?php foreach ($categories as $category) : ?>

                        <?php if ($product->id != null && $category->id == $product->category->id) : ?>
                            <option selected value="<?= $product->category->id ?>"><?= $product->category->name ?></option>
                        <?php else : ?>
                            <option value="<?= $category->id ?>"><?= $category->name ?></option>
                        <?php endif; ?>

                    <?php endforeach; ?>
                </select>


                <select name="brand" id="brand" class="form-select" aria-label="Default select example">
                    <option selected>Chọn loại hãng sản xuất</option>

                    <?php foreach ($brands as $brand) : ?>

                        <?php if ($product->id != null && $brand->id == $product->brand->id) : ?>
                            <option selected value="<?= $product->brand->id ?>"><?= $product->brand->name ?></option>
                        <?php else : ?>
                            <option value="<?= $brand->id ?>"><?= $brand->name ?></option>
                        <?php endif; ?>

                    <?php endforeach; ?>

                </select>

            </div>
            <input type="text" hidden name="product-id" value="<?= $product->id ?? null ?>">
            <div class="form-row">
                <input type="text" name="name" class="form-control form-input " placeholder="Nhập tên sản phẩm" value="<?= $product->name ?? null ?>" />

            </div>
            <div class="form-row">
                <input type="text" name="price" class="form-control form-input" placeholder="Nhập giá sản phẩm" value="<?= $product->price ?? null ?>" />

            </div>
            <div class="form-row">
                <textarea name="description" class="form-control form-input" placeholder="Mô tả sản phẩm" cols="30" rows="5"><?= $product->description ?? null ?></textarea>

            </div>
            <label for="image"><?= $product ?? null ? 'Hình ảnh sản phẩm: ' . $product->image : 'Thêm hình ảnh sản phẩm' ?></label>
            <div class="form-row">
                <input type="file" name="image" class="form-control form-input" placeholder="Chọn hình ảnh sản phẩm" id="image" value="<?= $product->image ?? null ?>" />

            </div>


            <button type="submit" name="submit" value="submit" class="btn btn-primary them fs-5"><?= $product ?? null ? 'Chỉnh sửa' : 'Thêm' ?></button>
        </form>
    </div>


</div>

<style>
    .form-input {
        flex: 1;

    }

    .form-select {
        flex: 1;
    }

    .form-select:first-child {
        margin-right: 16px;
    }

    .form-row {
        display: flex;
        margin-top: 8px;
        margin-bottom: 8px;
    }

    h3.title {
        text-align: center;
        margin-top: 2rem;
        color: #1e90ff;
    }

    .them {
        padding: 5px 40px;
    }
</style>

<?php $this->stop(); ?>
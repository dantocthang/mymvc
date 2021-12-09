<div class=" list">
    <table id="table" class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Tên</th>
                <th scope="col">Loại sản phẩm</th>
                <th scope="col">Hãng sản xuất</th>
                <th scope="col">Giá sản phẩm</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Mô tả sản phẩm</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php $start = ($paginator->currentPage() - 1) * $paginator->perPage() + 1; ?>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <th scope="row"><?= $start++; ?></th>
                    <td><?= $product->id; ?></td>
                    <td><?= $product->name; ?></td>
                    <td><?= $product->category->name ?></td>
                    <td><?= $product->brand->name ?></td>
                    <td><?= $product->price ?></td>
                    <td><img src="<?=request()->baseUrl()?>/assets/img/product/<?=$product->image?>" alt="ảnh sản phẩm" class="product-img"></td>
                    <td><?= $product->description ?></td>
                    <td><?= $product->created_at; ?></td>
                    <td>
                        <a class="remove-product delete" 
                        href="<?= request()->baseUrl(); ?>/admin/products/delete" 
                        data-id="<?= $product->id; ?>" 
                        title="Delete <?= $product->name; ?>" 
                        data-name="<?= $product->name; ?>" 
                        data-return-url="<?= request()->fullUrl(); ?>">
                        <i class="fas fa-times fa-2xl" style="font-size: 2rem;"></i>
                        </a>
                        
                    </td>
                    <td><a href="/admin/products?product-id=<?=$product->id?>"><i class="far fa-edit" style="font-size: 2rem;"></i></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- Hiển thị phân trang bên dưới bảng -->
<div class="pagination">
    <?= $this->insert('partials/pagination', ['paginator' => $paginator]); ?>
</div>

<style>
    table > thead{
        vertical-align: top !important;
    }
    .product-img{
        height: 10rem;
    }
</style>
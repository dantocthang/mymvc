<div class=" list">
    <table id="table" class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Tên</th>
                <th scope="col">Giá sản phẩm</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $start = ($paginator->currentPage() - 1) * $paginator->perPage() + 1; ?>
            <?php foreach ($cartDetails as $cartDetail) : ?>
                <tr>
                    <th scope="row"><?= $start++; ?></th>
                    <td><img src="<?=request()->baseUrl()?>/assets/img/product/<?=$cartDetail->product->image?>" alt="ảnh sản phẩm" class="cartDetail-img"></td>
                    <td><?= $cartDetail->product->name; ?></td>
                    <td><?= $cartDetail->price ?></td>
                    <td><?= $cartDetail->amount ?></td>
                    <td>
                        <a class="delete" 
                        href="<?= request()->baseUrl(); ?>/cart/delete" 
                        data-id="<?= $cartDetail->id; ?>" 
                        title="Delete <?= $cartDetail->product->name; ?>" 
                        data-name="<?= $cartDetail->product->name; ?>" 
                        data-return-url="<?= request()->fullUrl(); ?>">
                        <i class="fas fa-times fa-2xl" style="font-size: 2rem;"></i>
                        </a>
                        
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php if ($cartDetails): ?>
        <h3 id="total">Tổng giá tiền: <?=$total_price?> VNĐ</h3>
    <?php endif; ?>
</div>


<!-- Hiển thị phân trang bên dưới bảng -->
<div class="pagination">
    <?= $this->insert('partials/pagination', ['paginator' => $paginator]); ?>
</div>

<style>
    table > thead{
        vertical-align: top !important;
    }

    .cartDetail-img{
        height: 10rem;
    }

    #total{
        text-align: right;
    }

</style>
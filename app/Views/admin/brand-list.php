<div class=" list">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $start = ($paginator->currentPage() - 1) * $paginator->perPage() + 1; ?>
            <?php foreach ($brands as $brand) : ?>
                <tr>
                    <th scope="row"><?= $start++; ?></th>
                    <td><?= $brand->id; ?></td>
                    <td><?= $brand->name; ?></td>
                    <td><?= $brand->created_at; ?></td>
                    <td>
                        <a class="remove-item delete" 
                        href="<?= request()->baseUrl(); ?>/admin/brands/delete" 
                        data-id="<?= $brand->id; ?>" 
                        title="Delete <?= $brand->name; ?>" 
                        data-name="<?= $brand->name; ?>" 
                        data-return-url="<?= request()->fullUrl(); ?>">
                        <i class="fas fa-times fa-2xl" style="font-size: 1.5rem;"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- Hiển thị phân trang bên dưới bảng -->
<div class="pagination">
    <?= $this->insert('partials/pagination', ['paginator' => $paginator]); ?>
</div>
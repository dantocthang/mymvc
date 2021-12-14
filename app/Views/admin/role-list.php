<div class=" list">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Quyền</th>
                <th style="text-align: center;" scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php $start = ($paginator->currentPage() - 1) * $paginator->perPage() + 1; ?>
            <?php foreach ($roleUsers as $roleUser) : ?>
                <tr>
                    <th scope="row"><?= $start++; ?></th>
                    <td><?= $roleUser->id; ?></td>
                    <td><?= $roleUser->role->name; ?></td>
                    <td style="text-align: center;">
                    <a class="remove-category delete" 
                        href="<?= request()->baseUrl(); ?>/admin/roles/delete" 
                        data-id="<?= $roleUser->id; ?>" 
                        title="Delete <?= $roleUser->id; ?>" 
                        data-name="<?= $roleUser->id; ?>" 
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
<?php $this->layout(config('view.layout')) ?>

<?php $this->start('page') ?>
<div class="section">
    <div class="containter row justify-content-center">
        <div class="row">
            <div class="col-12 ">
                <h3 class="title">Quản lý quyền của nguời dùng <?= $user->username ?></h3>
            </div>
        </div>
        <div class="col-4 mt-5">

            <form action="/admin/roles?user_id=<?=$user->id?>" method="POST">
                <div class="form-row d-flex align-items-center">
                    <select name="role" id="role" class="form-select" aria-label="Default select example">

                        <option selected>Chọn quyền</option>

                        <?php foreach ($roles as $role) : ?>
                            <option value="<?= $role->id ?>"><?= $role->name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" name="submit" value="submit" class="btn btn-primary form-btn">Thêm</button>
                </div>
            </form>
        </div>

        <div class="row mt-5">
            <div class="col-8 m-auto mt-2 item-list">
                <?php $this->insert('admin/role-list', [
                    'roleUsers' => $roleUsers,
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

    .form-row {
        display: flex;

    }

    .form-input {
        flex: 1;
    }

    .form-btn {
        min-width: 90px;
    }
</style>
<?php $this->stop(); ?>
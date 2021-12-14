<?php $this->layout(config('view.layout')) ?>

<?php $this->start('page') ?>
<div class="section">
    <div class="containter row justify-content-center">
        <div class="row">
            <div class="col-12 ">
                <h3 class="title">Quản lý nguời dùng</h3>
            </div>
        </div>
        
        <div class="row mt-5">
            <div class="col-8 m-auto mt-2 item-list">
                <?php $this->insert('admin/user-list', [
                    'users' => $users,
                    'paginator' => $paginator
                ]);
                ?>
            </div>
        </div>
    </div>
</div>


<style>
    h3.title{
        text-align: center;
        margin-top: 2rem;
        color: #1e90ff;
    }
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
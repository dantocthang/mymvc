<?php $this->layout(config('view.layout')) ?>

<?php $this->start('css'); ?>
<?= $this->insert('user/profile-css'); ?>
<?php $this->stop(); ?>

<?php $this->start('page') ?>


<div class="container">
    <div class="row">
        <div class="section-title">
            <h3>Chỉnh sửa thông tin cá nhân</h3>
        </div>
    </div>
    <form action="/edit-profile" method="post" enctype="multipart/form-data">
        <div class="main-body">
            <div class="row gutters-sm">

                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <?php if ($profile->avatar ?? NULL) : ?>
                                    <img src="/assets/img/profile/<?= $profile->avatar ?>" alt="Avatar" class="rounded-circle" width="150">
                                <?php else : ?>
                                    <img src="/assets/img/profile/default_profile_image.png" alt="Avatar" class="rounded-circle" width="150">
                                <?php endif; ?>
                                <div id="changeAvatar mt-40">
                                    Chọn ảnh để tải lên:
                                    <input type="file" name="imageUpload" id="imageUpload">
                                </div>
                                <div class="mt-3">
                                    <h4><?= auth()->username ?></h4>
                                    <button class="btn btn-primary">Theo dõi</button>
                                    <button class="btn btn-outline-primary">Nhắn tin</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline">
                                        <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                    </svg>Github</h6>
                                <span class="text-secondary"><input class="form-input" name="github_username" id="github_username" type="text" value="<?= $profile->github_username ?? null ?>"></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info">
                                        <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                    </svg>Twitter</h6>
                                <span class="text-secondary"><input class="form-input" name="twitter_username" id="twitter_username" type="text" value="<?= $profile->twitter_username ?? null ?>"></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Tên đăng nhập</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= auth()->username ?? null ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Vị trí</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input class="form-input" name="location" id="location" type="text" value="<?= $profile->location ?? null ?>">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Tiểu sử</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input class="form-input" name="bio" id="bio" type="text" value="<?= $profile->bio ?? null ?>">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Ngày tạo</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= $profile->created_at ?? null ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <button class="btn btn-info " type="submit">Lưu</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </form>
</div>
<?php $this->stop(); ?>
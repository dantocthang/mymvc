<?php $this->layout(config('view.layout')) ?>

<?php $this->start('css'); ?>
<?= $this->insert('user/profile-css'); ?>
<?php $this->stop(); ?>

<?php $this->start('page') ?>

<div class="container">
  <div class="row">
    <div class="section-title">
      <h3>Thông tin cá nhân</h3>
    </div>
  </div>
  <div class="main-body">
    <div class="row gutters-sm">
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
              <?php if ($profile->avatar != NULL) : ?>
                <img src="/assets/img/profile/<?= $profile->avatar ?>" alt="Avatar" class="rounded-circle" width="150">
              <?php else : ?>
                <img src="/assets/img/profile/default_profile_image.png" alt="Avatar" class="rounded-circle" width="150">
              <?php endif; ?>
              <div class="mt-3">
                <h4><?= auth()->username ?? null ?></h4>
                <button class="btn btn-primary">Theo dõi</button>
                <button class="btn btn-outline-primary">Nhắn tin</button>
              </div>
            </div>
          </div>
        </div>
        <div class="card mt-3">
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <i class="fab fa-github" style="font-size: 24px;">Github</i>
              <span class="text-secondary"><?= $profile->github_username ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <i class="fab fa-twitter" style="font-size: 24px;">Twitter</i>
              <span class="text-secondary"><?= $profile->twitter_username ?></span>
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
                <?= $profile->location ?? null ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Tiểu sử</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?= $profile->bio ?? null ?>
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
                <a class="btn btn-info " href="<?= request()->baseUrl() ?>/edit-profile">Chỉnh sửa</a>
              </div>
            </div>
          </div>
        </div>





      </div>
    </div>

  </div>
</div>
<?php $this->stop(); ?>
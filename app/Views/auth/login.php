<?php $this->layout(config('view.layout')) ?>
<?php $this->start('page') ?>

<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/draw2.png" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <?php if (isset($errors)) : ?>
                    <?php foreach ($errors as $error) : ?>
                        <div class="row">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $error; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <form class="" method="post" action="/login">
                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                        <p class="lead fw-normal mb-0 me-3">Đăng nhập</p>

                    </div>

                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fw-bold mx-3 mb-0"></p>

                    </div>


                    <!-- Username input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="username">Tên đăng nhập</label>
                        <input type="text" name="username" id="username" class="form-control form-control-lg" placeholder="Tên đăng nhập" />
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <label class="form-label" for="password">Mật khẩu</label>
                        <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Mật khẩu" />
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Checkbox -->
                        <div class="form-check mb-0">
                            <label class="form-check-label" for="remember_me">
                                Nhớ đăng nhập
                            </label>
                            <input type="checkbox" name="remember_me" value="remember_password" class="form-check-input width-auto" id="remember_me" />
                        </div>
                        <a href="#" class="text-body">Quên mật khẩu?</a>
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Đăng nhập</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Chưa có tài khoản? <a href="/register" class="link-danger">Đăng ký</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Right -->
    </div>
</section>
<?php $this->stop() ?>
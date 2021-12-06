<?php $this->layout(config('view.layout')) ?>
<?php $this->start('page') ?>

<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/draw2.png" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 register-form">
                <?php if ($isPost && isset($errors['failed'])) : ?>
                    <div class="row">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $errors['failed']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                <?php endif; ?>
                <form id="form1" name="reg_form" class="" method="post" action="/register">

                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                        <p class="lead fw-normal mb-0 me-3">Register</p>

                    </div>

                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fw-bold mx-3 mb-0"></p>
                    </div>

                    <!-- Username input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="username">Username</label>
                        <input type="text" name="username" value="<?= $params['username'] ?? null ?>" id="username" class="form-control form-control-lg <?= isset($errors['username']) ? 'is-invalid' : '' ?>" placeholder="Enter username" />
                        <div class="invalid-feedback ">
                            <?= $errors['username'] ?? null; ?>
                        </div>
                        <small class="invalid-feedback "></small>
                    </div>


                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="email">Username</label>
                        <input type="email" name="email" value="<?=$params['email'] ?? null?>" id="email" class="form-control form-control-lg <?= isset($errors['email']) ? 'is-invalid' : '' ?>" placeholder="Enter email" />
                        <div id="ivl" class="invalid-feedback email-error">
                            <?= $errors['email'] ?? null; ?>
                        </div>
                        <small class="invalid-feedback "></small>
                    </div>


                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input type="passworde" name="password" id="password" class="form-control form-control-lg <?= isset($errors['password']) ? 'is-invalid' : '' ?>" placeholder="Enter password" />
                        <div class="invalid-feedback password-error">
                            <?= $errors['password'] ?? null; ?>
                        </div>
                        <small class="invalid-feedback "></small>
                    </div>

                    <!-- Re enter Password input -->
                    <div class="form-outline mb-3">
                        <label class="form-label" for="confirm_password">Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control form-control-lg <?= isset($errors['confirm_password']) ? 'is-invalid' : '' ?>" placeholder="Re enter password" />
                        <div class="invalid-feedback confirm_password-error">
                            <p id="confirm_password_err"></p>
                            <?= $errors['confirm_password'] ?? null; ?>
                        </div>
                        <small class="invalid-feedback "></small>
                    </div>

                    <div class="form-floating">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" value="" id="terms" required>
                            <label for="terms" class="form-check-label">
                                Agree to terms and conditions
                            </label>
                            <div class="invalid-feedback">
                                You must agree before submitting
                            </div>
                        </div>
                    </div>


                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="/login" class="link-danger">Login here!</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Right -->
</section>
<?php $this->stop() ?>
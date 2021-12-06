<?php $this->layout(config('view.layout')); ?>
<?php $this->start('page'); ?>
<div class="account-login section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Congratulations!</h4>
                    <p><?= $message['success']?></p>
                    <hr>
                    <p class="mb-0">Please <a href="/login">Click here</a> to login.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->stop(); ?>
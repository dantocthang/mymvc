<?php $this->layout(config('view.layout')) ?>

<?php $this->start('page') ?>
<div class="row">
    <section class="section-cart">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-8 col-lg-6">
                    <div class="header">
                        <h3>Giỏ hàng</h3>
                        <h2><?=$cart ?? null ? 'Danh sách sản phẩm đã chọn' : 'Giỏ hàng của bạn đang trống!'?></h2>
                    </div>

                </div>
            </div>
            <div class="item-list">
                <?php $this->insert('cart/cart-list', [
                    'cartDetails' => $cartDetails,
                    'paginator' => $paginator,
                    'total_price' =>$total_price
                ]); ?>
            </div>
        </div>
    </section>
</div>
</div>
<?php $this->stop() ?>

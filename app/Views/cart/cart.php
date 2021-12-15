<?php $this->layout(config('view.layout')) ?>

<?php $this->start('page') ?>
<div class="row">
    <section class="section-cart">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-8 col-lg-6">
                    <div class="section-title">
                        <h2>Giỏ hàng</h2>
                        <h3><?= $cart && $count  ? 'Danh sách sản phẩm đã chọn' : 'Giỏ hàng của bạn đang trống!' ?></h3>
                    </div>

                </div>
            </div>
            <div class="item-list">
                <?php $this->insert('cart/cart-list', [
                    'cartDetails' => $cartDetails,
                    'paginator' => $paginator,
                    'total_price' => $total_price,
                    'count'=>$count
                ]); ?>
            </div>
        </div>
    </section>
</div>
</div>
<?php $this->stop() ?>
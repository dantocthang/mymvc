<?php $this->layout(config('view.layout')) ?>

<?php $this->start('page') ?>
<section id="featured-services" class="featured-services">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-12">
                <h3>Quản lý TD Store</h3>
            </div>
        </div>
        <div class="row justify-content-around">
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0 " id="black-font">
                <a href="/admin/categories">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="far fa-list-alt"></i></div>
                        <h4 class="title">Loại sản phẩm</h4>
                        <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                    </div>
                </a>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0 ">
                <a href="/admin/brands">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><i class="fas fa-tag"></i></div>
                        <h4 class="title">Hãng sản xuất</h4>
                        <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                    </div>
                </a>

            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                <a href="/admin/products">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon"><i class="fa fa-laptop" aria-hidden="true"></i></div>
                        <h4 class="title">Sản phẩm</h4>
                        <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                    </div>
                </a>

            </div>


        </div>

    </div>


</section>

<?php $this->stop() ?>
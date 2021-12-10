<?php $this->layout(config('view.layout')) ?>
<?php $this->start('page') ?>
<section id="portfolio-details" class="portfolio-details">
    <div class="container">

        <div class="row gy-4">

            <div class="col-lg-6">
                <div class="portfolio-details-slider swiper">
                    <div class="swiper-wrapper align-items-center">

                        <div class="swiper-slide">
                            <img id="img-1" class="product-img" src="<?= request()->baseUrl(); ?>/assets/img/product/<?= $detail->image ?>" alt="">
                        </div>



                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="portfolio-info">
                    <h3><?= $detail->name ?></h3>
                    <ul>
                        <li><strong>Giá</strong>: <?= $detail->price ?> đ</li>
                    </ul>
                </div>
                <div class="portfolio-description">
                    <h2>Mô tả sản phẩm</h2>
                    <p>
                        <?= $detail->description ?>
                    </p>
                </div>
                <div class="center">
                    <div class="buttons d-flex flex-row">
                        <div class="cart"><i class="fa fa-shopping-cart" style="font-size: 2rem;"></i></div>
                        <a href="/product/add-to-cart?id=<?=$detail->id?>">
                            <button class="btn btn-primary cart-button px-5"><span class="dot"></span>Add to cart </button>
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <style>
        .buttons {
            padding: 10px;

            border-radius: 8px;
            position: relative
        }

        .dot {
            height: 20px;
            width: 20px;
            background-color: #0267f3;
            border-radius: 50%;
            position: absolute;
            left: 27%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 8px;
            color: #fff;
            opacity: 0
        }

        .cart-button {
            height: 48px
        }

        .cart-button:focus {
            box-shadow: none
        }

        .cart {
            position: relative;
            height: 48px !important;
            width: 50px;
            margin-right: 8px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #fff;
            padding: 11px;
            border-radius: 5px;
            font-size: 21px
        }

        .cart-button.clicked span.dot {
            animation: item 0.3s ease-in forwards
        }

        @keyframes item {
            0% {
                opacity: 1;
                top: 30%;
                left: 30%
            }

            25% {
                opacity: 1;
                left: 26%;
                top: 0%
            }

            50% {
                opacity: 1;
                left: 23%;
                top: -22%
            }

            75% {
                opacity: 1;
                left: 19%;
                top: -18%
            }

            100% {
                opacity: 1;
                left: 6%;
                top: 23%
            }
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var amount = 0;
            var dot = document.querySelector('.dot');
            const cartButtons = document.querySelectorAll('.cart-button');

            cartButtons.forEach(button => {

                button.addEventListener('click', cartClick);

            });

            function cartClick() {
                amount++;
                dot.innerHTML = amount;
                let button = this;
                button.classList.add('clicked');
            }
        });
    </script>
</section>
<?php $this->stop() ?>
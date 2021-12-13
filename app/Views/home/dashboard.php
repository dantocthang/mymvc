 <!-- ======= Hero Section ======= -->
 <section id="hero" class="d-flex align-items-center">
     <div class="container" data-aos="zoom-out" data-aos-delay="100">
         <h1>Welcome to <span>TDStore</span></h1>
         <h2>Bán sản phẩm công nghệ uy tín nhất Việt Nam</h2>
         <div class="d-flex">
             <a href="#about" class="btn-get-started scrollto">Get Started</a>
             <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
         </div>
     </div>
 </section><!-- End Hero -->

 <main id="main">

     <!-- ======= Loai san phan Section ======= -->
     <section id="featured-services" class="featured-services">
         <div class="container" data-aos="fade-up">

             <div class="row justify-content-around">
                 <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0 " id="black-font">
                     <a href="/product?category_name=Smartphone">
                         <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                             <div class="icon"><i class="fas fa-mobile"></i></div>
                             <h4 class="title">Điện thoại</h4>
                             <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                         </div>
                     </a>
                 </div>

                 <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0 ">
                     <a href="/product?category_name=Tablet">
                         <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                             <div class="icon"><i class="fas fa-tablet"></i></div>
                             <h4 class="title">Máy tính bảng</h4>
                             <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                         </div>
                     </a>

                 </div>

                 <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                     <a href="/product?category_name=Laptop">
                         <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                             <div class="icon"><i class="fas fa-laptop"></i></div>
                             <h4 class="title">Laptop</h4>
                             <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                         </div>
                     </a>

                 </div>


             </div>

         </div>
     </section><!-- End Featured Services Section -->

     <section id="testimonials" class="testimonials">
         <div class="container" data-aos="zoom-in">

             <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                 <div class="swiper-wrapper">

                     <div class="swiper-slide">
                         <div class="testimonial-item">
                             <img src="/assets/img/banner/banner1.png" class="" alt="">
                             <!-- <h3>Saul Goodman</h3>
                             <h4>Ceo &amp; Founder</h4>
                             <p>
                                 <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                 Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium
                                 quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                                 <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                             </p> -->
                         </div>
                     </div><!-- End testimonial item -->

                     <div class="swiper-slide">
                         <div class="testimonial-item">
                             <img src="/assets/img/banner/banner2.png" class="" alt="">

                             <!-- <h3>Sara Wilsson</h3>
                             <h4>Designer</h4>
                             <p>
                                 <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                 Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis
                                 quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                                 <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                             </p> -->
                         </div>
                     </div><!-- End testimonial item -->


                 </div>
                 <div class="swiper-pagination"></div>
             </div>

         </div>
     </section><!-- End Testimonials Section -->

     <!-- ======= San pham noi bat Section ======= -->
     <section id="about" class="about section-bg">
         <div class="container" data-aos="fade-up">

             <div class="section-title">
                 <h2>Sản phẩm nổi bật</h2>
                 <h3>Điện thoại</h3>
             </div>

             <div class="row">
                 <div class="container px-4 px-lg-5 mt-5">
                     <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                         <?php foreach ($smartphones as $smartphone) : ?>
                             <div class="col mb-5">
                                 <div class="card h-100">
                                     <!-- Product image-->
                                     <a href="<?= request()->baseUrl() ?>/product/detail?id=<?= $smartphone->id ?>">
                                     <img class="card-img-top custom-card-img" src="<?= request()->baseUrl() ?>/assets/img/product/<?= $smartphone->image ?>" alt="Smartphone" />
                                     </a>
                                     <!-- Product details-->
                                     <div class="card-body p-4">
                                         <div class="text-center">
                                             <!-- Product name-->
                                             <h5 class="fw-bolder"><?= $smartphone->name ?></h5>
                                             <!-- Product price-->
                                             <?= $smartphone->price ?>
                                         </div>
                                     </div>
                                     <!-- Product actions-->
                                     <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                         <div class="text-center"><a class="btn btn-outline-primary mt-auto" href="<?= request()->baseUrl() ?>/product/detail?id=<?= $smartphone->id ?>">Chi tiết</a></div>
                                     </div>
                                 </div>
                             </div>
                         <?php endforeach; ?>


                     </div>
                 </div>
             </div>

             <div class="section-title">
                 <h3>Máy tính bảng</h3>
             </div>

             <div class="row">
                 <div class="container px-4 px-lg-5 mt-5">
                     <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                         <?php foreach ($tablets as $tablet) : ?>
                             <div class="col mb-5">
                                 <div class="card h-100">
                                     <!-- Product image-->
                                     <a href="<?= request()->baseUrl() ?>/product/detail?id=<?= $tablet->id ?>">
                                     <img class="card-img-top" src="<?= request()->baseUrl() ?>/assets/img/product/<?= $tablet->image ?>" alt="tablet" />
                                     </a>
                                     <!-- Product details-->
                                     <div class="card-body p-4">
                                         <div class="text-center">
                                             <!-- Product name-->
                                             <h5 class="fw-bolder"><?= $tablet->name ?></h5>
                                             <!-- Product price-->
                                             <?= $tablet->price ?>
                                         </div>
                                     </div>
                                     <!-- Product actions-->
                                     <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                         <div class="text-center"><a class="btn btn-outline-primary mt-auto" href="<?= request()->baseUrl() ?>/product/detail?id=<?= $tablet->id ?>">Chi tiết</a></div>
                                     </div>
                                 </div>
                             </div>
                         <?php endforeach; ?>


                     </div>
                 </div>
             </div>

             <div class="section-title">
                 <h3>Laptop</h3>

             </div>

             <div class="row">
                 <div class="container px-4 px-lg-5 mt-5">
                     <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                         <?php foreach ($laptops as $laptop) : ?>
                             <div class="col mb-5">
                                 <div class="card h-100">
                                     <!-- Product image-->
                                     <a href="<?= request()->baseUrl() ?>/product/detail?id=<?= $laptop->id ?>">
                                     <img class="card-img-top" src="<?= request()->baseUrl() ?>/assets/img/product/<?= $laptop->image ?>" alt="laptop" />
                                     </a>
                                     <!-- Product details-->
                                     <div class="card-body p-4">
                                         <div class="text-center">
                                             <!-- Product name-->
                                             <h5 class="fw-bolder"><?= $laptop->name ?></h5>
                                             <!-- Product price-->
                                             <?= $laptop->price ?>
                                         </div>
                                     </div>
                                     <!-- Product actions-->
                                     <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                         <div class="text-center"><a class="btn btn-outline-primary mt-auto" href="<?= request()->baseUrl() ?>/product/detail?id=<?= $laptop->id ?>">Chi tiết</a></div>
                                     </div>
                                 </div>
                             </div>
                         <?php endforeach; ?>


                     </div>
                 </div>
             </div>

         </div>

         </div>
     </section><!-- End About Section -->


     <!-- ======= Counts Section ======= -->
     <section id="counts" class="counts">
         <div class="container" data-aos="fade-up">

             <div class="row">

                 <div class="col-lg-3 col-md-6">
                     <div class="count-box">
                         <i class="bi bi-emoji-smile"></i>
                         <span data-purecounter-start="0" data-purecounter-end="1247" data-purecounter-duration="1" class="purecounter"></span>
                         <p>Khách hàng</p>
                     </div>
                 </div>

                 <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                     <div class="count-box">
                         <i class="bi bi-journal-richtext"></i>
                         <span data-purecounter-start="0" data-purecounter-end="<?=$count['pcount']?>" data-purecounter-duration="1" class="purecounter"></span>
                         <p>Sản phẩm</p>
                     </div>
                 </div>

                 <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                     <div class="count-box">
                         <i class="bi bi-headset"></i>
                         <span data-purecounter-start="0" data-purecounter-end="<?=$count['bcount']?>" data-purecounter-duration="1" class="purecounter"></span>
                         <p>Đối tác</p>
                     </div>
                 </div>

                 <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                     <div class="count-box">
                         <i class="bi bi-people"></i>
                         <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                         <p>Nhân viên</p>
                     </div>
                 </div>

             </div>

         </div>
     </section><!-- End Counts Section -->


     <!-- ======= Services Section ======= -->
     <section id="services" class="services">
         <div class="container" data-aos="fade-up">

             <div class="section-title">
                 <h2>Dịch vụ</h2>
                 <h3>Hãy tận hưởng dịch vụ của chúng tôi</h3>
                 <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae
                     autem.</p>
             </div>

             <div class="row">
                 <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                     <div class="icon-box">
                         <div class="icon"><i class="bx bxl-dribbble"></i></div>
                         <h4><a href="">Sản phẩm chính hãng</a></h4>
                         <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                     </div>
                 </div>

                 <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
                     <div class="icon-box">
                         <div class="icon"><i class="bx bx-file"></i></div>
                         <h4><a href="">Giá cả cạnh tranh</a></h4>
                         <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                     </div>
                 </div>

                 <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
                     <div class="icon-box">
                         <div class="icon"><i class="bx bx-tachometer"></i></div>
                         <h4><a href="">Bảo hành nhanh chóng</a></h4>
                         <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                     </div>
                 </div>

             </div>

         </div>
     </section><!-- End Services Section -->

     <!-- ======= Testimonials Section ======= -->




     <!-- ======= Frequently Asked Questions Section ======= -->
     <section id="faq" class="faq section-bg">
         <div class="container" data-aos="fade-up">

             <div class="section-title">
                 <h2>F.A.Q</h2>
                 <h3>Câu hỏi thường gặp</h3>
                 <p>Hi vọng trong các câu hỏi và câu trả lời bên dưới có thể giải đáp thắc mắc của bạn</p>
             </div>

             <div class="row justify-content-center">
                 <div class="col-xl-10">
                     <ul class="faq-list">

                         <li>
                             <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Non consectetur a erat nam at
                                 lectus urna duis? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                             <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                                 <p>
                                     Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur
                                     gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                                 </p>
                             </div>
                         </li>

                         <li>
                             <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Feugiat scelerisque varius morbi
                                 enim nunc faucibus a pellentesque? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                             <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                                 <p>
                                     Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id
                                     donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque
                                     elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                                 </p>
                             </div>
                         </li>

                         <li>
                             <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Dolor sit amet consectetur
                                 adipiscing elit pellentesque habitant morbi? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                             <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                                 <p>
                                     Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar
                                     elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque
                                     eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis
                                     sed odio morbi quis
                                 </p>
                             </div>
                         </li>

                         <li>
                             <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Ac odio tempor orci dapibus.
                                 Aliquam eleifend mi in nulla? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                             <div id="faq4" class="collapse" data-bs-parent=".faq-list">
                                 <p>
                                     Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id
                                     donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque
                                     elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                                 </p>
                             </div>
                         </li>

                         <li>
                             <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">Tempus quam pellentesque nec nam
                                 aliquam sem et tortor consequat? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                             <div id="faq5" class="collapse" data-bs-parent=".faq-list">
                                 <p>
                                     Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in.
                                     Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est.
                                     Purus gravida quis blandit turpis cursus in
                                 </p>
                             </div>
                         </li>

                         <li>
                             <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">Tortor vitae purus faucibus
                                 ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                             <div id="faq6" class="collapse" data-bs-parent=".faq-list">
                                 <p>
                                     Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada
                                     nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut
                                     venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas
                                     egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
                                 </p>
                             </div>
                         </li>

                     </ul>
                 </div>
             </div>

         </div>
     </section><!-- End Frequently Asked Questions Section -->

     <!-- ======= Contact Section ======= -->
     <section id="contact" class="contact">
         <div class="container" data-aos="fade-up">

             <div class="section-title">
                 <h2>Liên hệ</h2>
                 <h3>Phản hồi về dịch vụ của chúng tôi</h3>
                 <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae
                     autem.</p>
             </div>

             <div class="row" data-aos="fade-up" data-aos-delay="100">
                 <div class="col-lg-6">
                     <div class="info-box mb-4">
                         <i class="bx bx-map"></i>
                         <h3>Our Address</h3>
                         <p>Đại học Cần Thơ, Đường 3/2, Phường Xuân Khánh, Quận Ninh Kiều, Thành phố Cần Thơ</p>
                     </div>
                 </div>

                 <div class="col-lg-3 col-md-6">
                     <div class="info-box  mb-4">
                         <i class="bx bx-envelope"></i>
                         <h3>Email Us</h3>
                         <p>contact@example.com</p>
                     </div>
                 </div>

                 <div class="col-lg-3 col-md-6">
                     <div class="info-box  mb-4">
                         <i class="bx bx-phone-call"></i>
                         <h3>Call Us</h3>
                         <p>+84 xx xxx xxxx</p>
                     </div>
                 </div>

             </div>

             <div class="row" data-aos="fade-up" data-aos-delay="100">

                 <div class="col-lg-6 ">
                     <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15715.366073286777!2d105.7706153!3d10.0299337!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9d76b0035f6d53d0!2zxJDhuqFpIGjhu41jIEPhuqduIFRoxqE!5e0!3m2!1svi!2s!4v1639362630088!5m2!1svi!2s"  frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
                 </div>

                 <div class="col-lg-6">
                     <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                         <div class="row">
                             <div class="col form-group">
                                 <input type="text" name="name" class="form-control" id="name" placeholder="Tên của bạn" required>
                             </div>
                             <div class="col form-group">
                                 <input type="email" class="form-control" name="email" id="email" placeholder="Địa chỉ email" required>
                             </div>
                         </div>
                         <div class="form-group">
                             <input type="text" class="form-control" name="subject" id="subject" placeholder="Tiêu đề" required>
                         </div>
                         <div class="form-group">
                             <textarea class="form-control" name="message" rows="5" placeholder="Nội dung thông điệp" required></textarea>
                         </div>
                         <div class="my-3">
                             <div class="loading">Loading</div>
                             <div class="error-message"></div>
                             <div class="sent-message">Phản hổi của bạn đã được gửi đi. Cảm ơn bạn đã đóng góp ý kiến!</div>
                         </div>
                         <div class="text-center"><button type="submit">Gửi phản hồi</button></div>
                     </form>
                 </div>

             </div>

         </div>
     </section><!-- End Contact Section -->
 </main><!-- End #main -->
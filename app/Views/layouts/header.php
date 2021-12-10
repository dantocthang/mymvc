<header id="header" class="d-flex align-items-center header">
  <div class="container d-flex align-items-center justify-content-between">

    <h1 class="logo"><a href="<?= request()->baseUrl() ?>/home">TDStore</a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->
    <div class="col-lg-5 col-md-7 d-xs-none">
      <div class="main-menu-search">
        <form action="/product/search" method="POST">
          <div class="navbar-search search-style-5">
            <div class="search-input">
              <input name="searchKeyWord" type="text" placeholder="Search" />
            </div>
            <div class="search-btn">
              <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link scrollto active" href="/home">Home</a></li>
        <li><a class="nav-link scrollto" href="/product">Sản phẩm</a></li>
        <li><a href="contact.html">Contact Us</a></li>
        <?php if (auth()) : ?>
          <li class="dropdown"><a href="#">
              <div class="user">
                <i class="fas fa-user"></i>
                Hello <?= auth()->username ?>
              </div>
            </a>
            <ul>
              <li><a href="/logout">Sign out</a></li>
              <li><a href="/profile">Profile</a></li>
              <li><a href="/contact">Contact</a></li>
              <?php if (isset($_SESSION['isAdmin'])) {
                echo '<li><a href="/admin">Trang quản lý</a></li>';
              }


              ?>
            </ul>
          </li>
        <?php else : ?>
          <li class="dropdown"><a href="#">
              <div class="user">
                <i class="fas fa-user"></i>
                Hello Guest
              </div>
            </a>
            <ul>
              <li><a href="/login">Sign In</a></li>
              <li><a href="/register">Register</a></li>
            </ul>
          </li>
        <?php endif; ?>

        <li>
          <!-- <div class="cart"> -->

          <a href="/cart">
            <div class="cart"><i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i>Cart</div>
          </a>
          <!-- </div> -->
          <!-- </a> -->

        </li>

      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>
</header><!-- End Header -->
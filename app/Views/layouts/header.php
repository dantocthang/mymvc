<header id="header" class="d-flex align-items-center header">
  <div class="container d-flex align-items-center justify-content-between">

    <h1 class="logo"><a href="index.html">TDStore</a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->
    <div class="col-lg-5 col-md-7 d-xs-none">
      <div class="main-menu-search">
        <div class="navbar-search search-style-5">
          <div class="search-select">
            <div class="select-position">
              <select id="select1">
                <option selected>All</option>
                <option value="1">option 01</option>
                <option value="2">option 02</option>
                <option value="3">option 03</option>
                <option value="4">option 04</option>
                <option value="5">option 05</option>
              </select>
            </div>
          </div>
          <div class="search-input">
            <input type="text" placeholder="Search" />
          </div>
          <div class="search-btn">
            <button><i class="fa fa-search" aria-hidden="true"></i></button>
          </div>
        </div>
      </div>
    </div>

    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
        <li><a class="nav-link scrollto" href="#about">About</a></li>
        <li><a href="contact.html">Contact Us</a></li>
        <?php if (auth()) : ?>
          <li class="dropdown"><a href="#">
              <div class="user">
                <i class="fa fa-user-circle-o fa-lg" aria-hidden="true"></i>
                Hello <?= auth()->username ?>
              </div>
            </a>
            <ul>
              <li><a href="/logout">Sign out</a></li>
              <li><a href="/profile">Profile</a></li>
              <li><a href="/contact">Contact</a></li>
            </ul>
          </li>
        <?php else : ?>
          <li class="dropdown"><a href="#">
              <div class="user">
                <i class="fa fa-user-circle-o fa-lg" aria-hidden="true"></i>
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

          <a href="#">
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
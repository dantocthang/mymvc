<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title><?= config("app.APP_NAME") ?></title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />



    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= request()->baseUrl(); ?>/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= request()->baseUrl(); ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= request()->baseUrl(); ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= request()->baseUrl(); ?>/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= request()->baseUrl(); ?>/assets/vendor/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= request()->baseUrl(); ?>/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= request()->baseUrl(); ?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- insert specific page's css -->
    <?= $this->section('css') ?>

</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>

    <!-- Header section -->

    <?= $this->insert('layouts/header') ?>

    <!-- Content section -->
    <?= $this->section('page') ?>

    <!-- Footer section -->
    <?= $this->insert('layouts/footer') ?>
    <?= $this->insert('layouts/logout_modal') ?>

    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <script src="<?= request()->baseUrl(); ?>/assets/vendor/aos/aos.js"></script>
    <script src="<?= request()->baseUrl(); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= request()->baseUrl(); ?>/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= request()->baseUrl(); ?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= request()->baseUrl(); ?>/assets/vendor/php-email-form/validate.js"></script>
    <script src="<?= request()->baseUrl(); ?>/assets/vendor/purecounter/purecounter.js"></script>
    <script src="<?= request()->baseUrl(); ?>/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= request()->baseUrl(); ?>/assets/vendor/waypoints/noframework.waypoints.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= request()->baseUrl(); ?>/assets/js/main.js"></script>
    
    <?= $this->insert('layouts/notifications'); ?>
    <?= $this->section('js') ?>


</body>

</html>
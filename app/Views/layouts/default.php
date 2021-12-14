<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title><?= config("app.APP_NAME") ?></title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />



    <link href="<?= request()->baseUrl(); ?>/assets/img/favicon.png" rel="icon">
    <link href="<?= request()->baseUrl(); ?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= request()->baseUrl(); ?>/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= request()->baseUrl(); ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= request()->baseUrl(); ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= request()->baseUrl(); ?>/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= request()->baseUrl(); ?>/assets/vendor/fontawesome-free-5.15.4-web/css/all.min.css" rel="stylesheet">
    <link href="<?= request()->baseUrl(); ?>/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= request()->baseUrl(); ?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />


    <!-- Template Main CSS File -->
    <link href="<?= request()->baseUrl(); ?>/assets/css/style.css" rel="stylesheet">
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



    <a href="#" class="back-to-top d-flex justify-content-center align-items-center">
        <i class="fas fa-chevron-up"></i>
    </a>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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
    <script src="<?= request()->baseUrl(); ?>/assets/js/delete-script.js"></script>

    <?= $this->insert('layouts/notifications'); ?>
    <?= $this->section('js') ?>


</body>

</html>
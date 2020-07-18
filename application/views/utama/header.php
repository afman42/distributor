<!doctype html>
<html lang="en">

  <head>
    <title><?= $header ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url(); ?>/tutor-master/fonts/icomoon/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/tutor-master/fonts/brand/style.css">

    <link rel="stylesheet" href="<?= base_url(); ?>/tutor-master/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/tutor-master/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/tutor-master/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/tutor-master/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/tutor-master/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/tutor-master/css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/tutor-master/css/style.css">

  </head>

  <body>

    
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>

      <header class="site-navbar light site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3">
              <div class="site-logo">
                <a href="<?= base_url();?>"><strong>Dinos</strong></a>
              </div>
            </div>

            <div class="col-9  text-right">
              
              <span class="d-inline-block d-lg-none"><a href="#" class=" site-menu-toggle js-menu-toggle py-5 "><span class="icon-menu h3 text-black"></span></a></span>

              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li class="active"><a href="<?= base_url(); ?>" class="nav-link">Home</a></li>
                  <li><a href="<?= site_url('welcome/berita');?>" class="nav-link">Berita</a></li>
                  <?php if(isset($_SESSION['nama'])){ ?>
                    <li><a href="<?= site_url('welcome/logout'); ?>" class="nav-link">Logout</a></li>
                  <?php }else { ?>
                    <li><a href="<?= site_url('welcome/daftar'); ?>" class="nav-link">Daftar</a></li>
                    <li><a href="<?= site_url('welcome/login'); ?>" class="nav-link">Masuk</a></li>
                  <?php } ?>
                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>



<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Title -->
  <title><?= ($this->uri->segment(1) ? ucwords(str_replace('-', ' ', $this->uri->segment(1)).' - Nestivent') : 'Nestivent');?></title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="./favicon.ico">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&amp;display=swap" rel="stylesheet">

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="<?= base_url();?>assets/frontend/css/vendor.min.css">

  <!-- CSS Front Template -->
  <link rel="stylesheet" href="<?= base_url();?>assets/frontend/css/theme.minc619.css?v=1.0">
  <link rel="stylesheet" href="<?= base_url();?>assets/frontend/css/custom.css">

</head>

<body>

  <?php $this->load->view('header/frontend_main'); ?>

  <main id="content" role="main">
    <?php $this->load->view($module.'/'.$fileview); ?>
  </main>
  <!-- JS Global Compulsory -->
  <!-- JS Implementing Plugins -->
  <script src="<?= base_url();?>assets/frontend/js/vendor.min.js"></script>

  <!-- JS Front -->
  <script src="<?= base_url();?>assets/frontend/js/theme.min.js"></script>

  <script>
  $(document).on('ready', function () {
    // INITIALIZATION OF HEADER
    // =======================================================
    var header = new HSHeader($('#header')).init();


    // INITIALIZATION OF MEGA MENU
    // =======================================================
    var megaMenu = new HSMegaMenu($('.js-mega-menu'), {
      desktop: {
        position: 'left'
      }
    }).init();


    // INITIALIZATION OF UNFOLD
    // =======================================================
    var unfold = new HSUnfold('.js-hs-unfold-invoker').init();


    // INITIALIZATION OF FORM VALIDATION
    // =======================================================
    $('.js-validate').each(function () {
      var validation = $.HSCore.components.HSValidation.init($(this));
    });


    // INITIALIZATION OF SLICK CAROUSEL
    // =======================================================
    $('.js-slick-carousel').each(function() {
      var slickCarousel = $.HSCore.components.HSSlickCarousel.init($(this));
    });


    // INITIALIZATION OF GO TO
    // =======================================================
    $('.js-go-to').each(function () {
      var goTo = new HSGoTo($(this)).init();
    });
  });
  </script>

  <!-- IE Support -->
  <script>
  if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="<?php base_url() ?>assets/frontend/vendor/babel-polyfill/dist/polyfill.js"><\/script>');
  </script>

</body>
</html>

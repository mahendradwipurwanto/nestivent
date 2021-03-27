<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Title -->
  <title><?= ($this->uri->segment(1) ? ucwords(str_replace('-', ' ', $this->uri->segment(1)).' - Nestivent') : 'Authentication - Nestivent');?></title>

  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Favicon -->
  <link rel="shortcut icon" href="favicon.ico">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&amp;display=swap" rel="stylesheet">

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="<?= base_url();?>assets/frontend/css/vendor.min.css">

  <!-- CSS Front Template -->
  <link rel="stylesheet" href="<?= base_url();?>assets/frontend/css/theme.minc619.css?v=1.0">
</head>
<body>
  <!-- ========== HEADER ========== -->
  <header id="header" class="header header-bg-transparent header-abs-top">
    <div class="header-section">
      <div id="logoAndNav" class="container-fluid">
        <!-- Nav -->
        <nav class="navbar navbar-expand header-navbar">
          <!-- White Logo -->
          <a class="d-none d-lg-flex navbar-brand header-navbar-brand" href="index.html" aria-label="Front">
            <img src="<?= base_url();?>assets/frontend/svg/logos/logo-white.svg" alt="Logo">
          </a>
          <!-- End White Logo -->

          <!-- Default Logo -->
          <a class="d-flex d-lg-none navbar-brand header-navbar-brand header-navbar-brand-collapsed" href="index.html" aria-label="Front">
            <img src="<?= base_url();?>assets/frontend/svg/logos/logo.svg" alt="Logo">
          </a>
          <!-- End Default Logo -->

          <!-- Button -->
          <div class="ml-auto">
            <a class="btn btn-sm btn-link text-body" href="<?= base_url() ?>">
              <i class="fas fa-angle-left fa-sm mr-1"></i> Kembali ke landing page
            </a>
          </div>
          <!-- End Button -->
        </nav>
        <!-- End Nav -->
      </div>
    </div>
  </header>
  <!-- ========== END HEADER ========== -->

  <!-- ========== MAIN ========== -->
  <main id="content" role="main">
    <?php $this->load->view($module.'/'.$fileview); ?>
  </main>
  <!-- ========== END MAIN ========== -->


  <!-- JS Implementing Plugins -->
  <script src="<?= base_url();?>assets/frontend/js/vendor.min.js"></script>

  <!-- JS Front -->
  <script src="<?= base_url();?>assets/frontend/js/theme.min.js"></script>

  <!-- IE Support -->
  <script>
    if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="<?= base_url();?>assets/frontend/vendor/babel-polyfill/dist/polyfill.js"><\/script>');
  </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Title -->
  <title><?= ($this->uri->segment(1) ? ucwords(str_replace('-', ' ', $this->uri->segment(1)).' - '.$WEB_JUDUL) : $WEB_JUDUL);?></title>

  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta property="og:title" content="<?= ($this->uri->segment(1) ? ucwords(str_replace('-', ' ', $this->uri->segment(1)).' - '.$WEB_JUDUL) : $WEB_JUDUL);?>">
  <meta property="og:description" content="<?= ($this->uri->segment(1) ? ucwords(str_replace('-', ' ', $this->uri->segment(1)).' - '.$WEB_JUDUL) : $WEB_JUDUL);?>. <?= $WEB_DESKRIPSI;?>">
  <meta property="og:image" content="<?= base_url();?>assets/<?= $LOGO_FAV;?>">
  <meta property="og:url" content="<?= base_url(uri_string()) ?>">

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= base_url() ?>assets/<?= $LOGO_FAV;?>">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&amp;display=swap" rel="stylesheet">

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="<?= base_url();?>assets/frontend/css/vendor.min.css">
  <link rel="stylesheet" href="<?= base_url();?>assets/frontend/css/custom.css?<?= time() ?>">

  <!-- CSS Front Template -->
  <link rel="stylesheet" href="<?= base_url();?>assets/frontend/css/theme.minc619.css?v=1.0">

  <link rel="stylesheet" href="<?= base_url();?>assets/frontend/plugin/toast/toast.style.css?<?= time() ?>">

  <!-- JS Implementing Plugins -->
  <script src="<?= base_url();?>assets/frontend/js/vendor.min.js"></script>

  <!-- JS Front -->
  <script src="<?= base_url();?>assets/frontend/js/theme.min.js"></script>

<script type="text/javascript" src="<?=base_url();?>assets/frontend/plugin/tinymce/jquery.tinymce.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/frontend/plugin/tinymce/tinymce.min.js"></script>
</head>
<body class="bg-img-hero-fixed" style="background-image: url(<?= base_url();?>assets/frontend/svg/illustrations/error-404.svg);">
  <!-- ========== HEADER ========== -->
  <header id="header" class="header header-bg-transparent header-abs-top py-3">
    <div class="header-section">
      <div id="logoAndNav" class="container">
        <nav class="navbar">
          <a class="navbar-brand" href="<?= base_url() ?>" aria-label="<?= $WEB_JUDUL;?>">
            <img src="<?= base_url();?>assets/logo-ts.png" class="img-12-5" alt="Logo">
          </a>
        </nav>
      </div>
    </div>
  </header>
  <!-- ========== END HEADER ========== -->

  <!-- ========== MAIN ========== -->
  <main id="content" role="main" class="bg-cs">
    <?php $this->load->view($module.'/'.$fileview); ?>
  </main>
  <!-- ========== END MAIN ========== -->

  <!-- ========== FOOTER ========== -->
  <footer class="position-absolute right-0 bottom-0 left-0 ">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center space-1">
        <!-- Copyright -->
        <p class="small text-muted mb-0">&copy; <?= $WEB_JUDUL;?>. 2020 CreativeCrew.</p>
        <!-- End Copyright -->

        <!-- Social Networks -->
        <ul class="list-inline mb-0">
          <li class="list-inline-item">
            <a class="btn btn-xs btn-icon btn-ghost-secondary" href="#">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="btn btn-xs btn-icon btn-ghost-secondary" href="#">
              <i class="fab fa-google"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="btn btn-xs btn-icon btn-ghost-secondary" href="#">
              <i class="fab fa-twitter"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="btn btn-xs btn-icon btn-ghost-secondary" href="#">
              <i class="fab fa-github"></i>
            </a>
          </li>
        </ul>
        <!-- End Social Networks -->
      </div>
    </div>
  </footer>
  <!-- ========== END FOOTER ========== -->

  <script type="text/javascript" src="<?=base_url();?>assets/frontend/plugin/toast/toast.script.js"></script>

  <?php if ($this->session->flashdata('success')) { ?>
    <script>
      $.Toast("Berhasil", "<?php echo $this->session->flashdata('success'); ?>", "success", {
        has_icon:true,
        has_close_btn:true,
        stack: true,
        fullscreen:false,
        timeout:8000,
        sticky:false,
        has_progress:true,
        rtl:false,
      });
    </script>
  <?php }?>

  <?php if ($this->session->flashdata('warning')) { ?>
    <script>
      $.Toast("Info", "<?php echo $this->session->flashdata('warning'); ?>", "notice", {
        has_icon:true,
        has_close_btn:true,
        stack: true,
        fullscreen:false,
        timeout:8000,
        sticky:false,
        has_progress:true,
        rtl:false,
      });
    </script>
  <?php }?>

  <?php if ($this->session->flashdata('error')) { ?>
    <script>
      $.Toast("Terjadi Kesalahan", "<?php echo $this->session->flashdata('error'); ?>", "error", {
        has_icon:true,
        has_close_btn:true,
        stack: true,
        fullscreen:false,
        timeout:8000,
        sticky:false,
        has_progress:true,
        rtl:false,
      });
    </script>
  <?php }?>

  <!-- IE Support -->
  <script>
    if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="<?= base_url();?>assets/frontend/vendor/babel-polyfill/dist/polyfill.js"><\/script>');
  </script>
</body>
</html>

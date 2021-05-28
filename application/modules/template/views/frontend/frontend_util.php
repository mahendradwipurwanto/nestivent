<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Title -->
  <title><?= ($this->uri->segment(1) ? ucwords(str_replace('-', ' ', $this->uri->segment(1)).' - Nestivent') : 'Opps - Nestivent');?></title>

  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= base_url() ?>assets/icon-ts.png">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&amp;display=swap" rel="stylesheet">

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="<?= base_url();?>assets/frontend/css/vendor.min.css">
  <link rel="stylesheet" href="<?= base_url();?>assets/frontend/css/custom.css">

  <!-- CSS Front Template -->
  <link rel="stylesheet" href="<?= base_url();?>assets/frontend/css/theme.minc619.css?v=1.0">
</head>
<body class="bg-img-hero-fixed" style="background-image: url(<?= base_url();?>assets/frontend/svg/illustrations/error-404.svg);">
  <!-- ========== HEADER ========== -->
  <header id="header" class="header header-bg-transparent header-abs-top py-3">
    <div class="header-section">
      <div id="logoAndNav" class="container">
        <nav class="navbar">
          <a class="navbar-brand" href="<?= base_url() ?>" aria-label="Nestivent">
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
        <p class="small text-muted mb-0">&copy; Nestivent. 2020 CreativeCrew.</p>
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


  <!-- JS Implementing Plugins -->
  <script src="<?= base_url();?>assets/frontend/js/vendor.min.js"></script>

  <!-- JS Front -->
  <script src="<?= base_url();?>assets/frontend/js/theme.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/som-components/css">
<script src="https://digitalguidelines.michigan.gov/cdn/3.2.0/som-components.js"></script>

<?php if ($this->session->flashdata('success')) { ?>
  <div class="modal fade" id="notifikasi" role="dialog" tabindex="-1" >
    <div class="modal-dialog modal-dialog-centered" role="document">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body" style="padding-bottom: 0px !important;">
          <button type="button" class="close alcs" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <som-alert type="success" headline="Notifikasi!"><?php echo $this->session->flashdata('success'); ?>
          </som-alert>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
  $(window).on('load',function(){
    $('#notifikasi').modal('show');
  });
  </script>
  <?php }?>

<?php if ($this->session->flashdata('warning')) { ?>
  <div class="modal fade" id="notifikasi" role="dialog" tabindex="-1" >
    <div class="modal-dialog modal-dialog-centered" role="document">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body" style="padding-bottom: 0px !important;">
          <button type="button" class="close alcs" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <som-alert type="warning" headline="Notifikasi!"><?php echo $this->session->flashdata('warning'); ?>
          </som-alert>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
  $(window).on('load',function(){
    $('#notifikasi').modal('show');
  });
</script>
<?php }?>

<?php if ($this->session->flashdata('error')) { ?>
<div class="modal fade" id="notifikasi" role="dialog" tabindex="-1" >
  <div class="modal-dialog modal-dialog-centered" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body" style="padding-bottom: 0px !important;">
        <button type="button" class="close alcs" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <som-alert type="warning" headline="Notifikasi!"><?php echo $this->session->flashdata('error'); ?>
        </som-alert>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(window).on('load',function(){
  $('#notifikasi').modal('show');
});
</script>
<?php }?>

  <!-- IE Support -->
  <script>
    if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="<?= base_url();?>assets/frontend/vendor/babel-polyfill/dist/polyfill.js"><\/script>');
  </script>
</body>
</html>

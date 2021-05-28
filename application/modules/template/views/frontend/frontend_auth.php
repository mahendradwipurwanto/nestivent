<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Title -->
  <title><?= ($this->uri->segment(1) ? ucwords(str_replace('-', ' ', $this->uri->segment(1)).' - Nestivent') : 'Authentication - Nestivent');?></title>

  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= base_url() ?>assets/icon-ts.png">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&amp;display=swap" rel="stylesheet">

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="<?= base_url();?>assets/frontend/css/vendor.min.css">
  <link rel="stylesheet" href="<?= base_url();?>assets/frontend/css/custom.css?<?php echo time(); ?>">

  <!-- CSS Front Template -->
  <link rel="stylesheet" href="<?= base_url();?>assets/frontend/css/theme.minc619.css?v=1.0">


  <!-- JS Implementing Plugins -->
  <script src="<?= base_url();?>assets/frontend/js/vendor.min.js"></script>

  <!-- JS Front -->
  <script src="<?= base_url();?>assets/frontend/js/theme.min.js"></script>
  <script src="<?php echo base_url();?>assets/frontend/plugin/jquery.inputmask.bundle.min.js" crossorigin="anonymous"></script>
</head>
<div id="progressMessage" style="display: none; padding:5px">
  <div id="activityIndicator">&nbsp;</div>
</div>
<body class="bg-cs">
  <!-- ========== HEADER ========== -->
  <header id="header" class="header header-bg-transparent header-abs-top">
    <div class="header-section">
      <div id="logoAndNav" class="container-fluid">
        <!-- Nav -->
        <nav class="navbar navbar-expand header-navbar">
          <!-- White Logo -->
          <a class="d-none d-lg-flex navbar-brand header-navbar-brand" href="<?= base_url() ?>" aria-label="Nestivent">
            <img src="<?= base_url();?>assets/icon-ts.png" class="img-2" alt="Logo">
          </a>
          <!-- End White Logo -->

          <!-- Default Logo -->
          <a class="d-flex d-lg-none navbar-brand header-navbar-brand header-navbar-brand-collapsed" href="<?= base_url() ?>" aria-label="Nestivent">
            <img src="<?= base_url();?>assets/logo-ts.png" class="img-2" alt="Logo">
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

  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/som-components/css">
  <script src="<?php echo base_url();?>assets/frontend/js/som-components.js"></script>

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

<script type="text/javascript">

// INITIALIZATION OF ADD INPUT FILED
// =======================================================
$('.js-add-field').each(function () {
  new HSAddField($(this), {
    addedField: function() {
      $('.js-add-field .js-custom-select-dynamic').each(function () {
        var select2Dynamic = $.HSCore.components.HSSelect2.init($(this));
      });

      $('.js-add-field .js-quill-dynamic').each(function () {
        var quillDynamic = $.HSCore.components.HSQuill.init(this);
      });
    }
  }).init();
});

// INITIALIZATION OF QUILLJS EDITOR
// =======================================================
var quill = $.HSCore.components.HSQuill.init('.js-quill');

$(document).on('ready', function () {
  // INITIALIZATION OF FORM VALIDATION
  // =======================================================
  $('.js-validate').each(function () {
    var validation = $.HSCore.components.HSValidation.init($(this));
  });
});
</script>

<!-- IE Support -->
<script>
if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="<?= base_url();?>assets/frontend/vendor/babel-polyfill/dist/polyfill.js"><\/script>');
</script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Title -->
  <title><?= ($this->uri->segment(1) ? ucwords(str_replace('-', ' ', $this->uri->segment(1)).' - Nestivent') : 'Nestivent');?></title>

  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= base_url() ?>assets/icon-ts.png">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&amp;display=swap" rel="stylesheet">

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="<?= base_url();?>assets/frontend/css/vendor.min.css">

  <!-- CSS Front Template -->
  <link rel="stylesheet" href="<?= base_url();?>assets/frontend/css/theme.minc619.css?v=1.0">
  <link rel="stylesheet" href="<?= base_url();?>assets/frontend/css/custom.css">


  <!-- JS Implementing Plugins -->
  <script src="<?= base_url();?>assets/frontend/js/vendor.min.js"></script>

  <!-- JS Front -->
  <script src="<?= base_url();?>assets/frontend/js/theme.min.js"></script>
</head>
<body>

  <?php $this->load->view('header/main_header.php') ?>

  <main id="content" role="main">
    <?php $this->load->view('header/main_sidebar.php') ?>
    <?php $this->load->view($module.'/'.$fileview); ?>
  </div>
  <!-- End Row -->
</div>
<!-- End Row -->
</div>
<!-- End Content Section -->
</main>

<?php $this->load->view('footer/main_footer.php') ?>

<!-- JS Plugins Init. -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" integrity="sha512-jNDtFf7qgU0eH/+Z42FG4fw3w7DM/9zbgNPe3wfJlCylVDTT3IgKW5r92Vy9IHa6U50vyMz5gRByIu4YIXFtaQ==" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/som-components/css">
<!-- <script src="https://digitalguidelines.michigan.gov/cdn/3.2.0/som-components.js"></script> -->

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


  // INITIALIZATION OF FANCYBOX
  // =======================================================
  $('.js-fancybox').each(function () {
    var fancybox = $.HSCore.components.HSFancyBox.init($(this));
  });


  // INITIALIZATION OF FORM VALIDATION
  // =======================================================
  $('.js-validate').each(function() {
    $.HSCore.components.HSValidation.init($(this), {
      rules: {
        confirmPassword: {
          equalTo: '#signupPassword'
        }
      }
    });
  });


  // INITIALIZATION OF SHOW ANIMATIONS
  // =======================================================
  $('.js-animation-link').each(function () {
    var showAnimation = new HSShowAnimation($(this)).init();
  });


  // INITIALIZATION OF CIRCLES
  // =======================================================
  $('.js-circle').each(function () {
    var circle = $.HSCore.components.HSCircles.init($(this));
  });

  // INITIALIZATION OF LEAFLET
  // =======================================================
  $('#map').each(function () {
    var leaflet = $.HSCore.components.HSLeaflet.init($(this)[0]);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
      id: 'mapbox/light-v9'
    }).addTo(leaflet);
  });

  // INITIALIZATION OF SELECT2
  // =======================================================
  $('.js-custom-select').each(function () {
    var select2 = $.HSCore.components.HSSelect2.init($(this));
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
if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="<?= base_url();?>assets/frontend/vendor/babel-polyfill/dist/polyfill.js"><\/script>');
</script>
</body>
</html>

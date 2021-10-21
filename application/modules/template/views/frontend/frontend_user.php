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

  <!-- CSS Front Template -->
  <link rel="stylesheet" href="<?= base_url();?>assets/frontend/css/theme.minc619.css?v=1.0">
  <link rel="stylesheet" href="<?= base_url();?>assets/frontend/css/custom.css?<?= time() ?>">

  <link rel="stylesheet" href="<?= base_url();?>assets/frontend/plugin/toast/toast.style.css?<?= time() ?>">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">


  <!-- JS Implementing Plugins -->
  <script src="<?= base_url();?>assets/frontend/js/vendor.min.js"></script>

  <!-- JS Front -->
  <script src="<?= base_url();?>assets/frontend/js/theme.min.js"></script>

  <script type="text/javascript" src="<?=base_url();?>assets/frontend/plugin/tinymce/jquery.tinymce.min.js"></script>
  <script type="text/javascript" src="<?=base_url();?>assets/frontend/plugin/tinymce/tinymce.min.js"></script>

  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

  <!-- JS Plugins Init. -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" integrity="sha512-jNDtFf7qgU0eH/+Z42FG4fw3w7DM/9zbgNPe3wfJlCylVDTT3IgKW5r92Vy9IHa6U50vyMz5gRByIu4YIXFtaQ==" crossorigin="anonymous"></script>
</head>
<body>

  <?php $this->load->view('header/user_header.php') ?>

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

<script>
  $(document).on('ready', function () {


$('#myTable').DataTable( {
  "language": {
    "emptyTable": '<div class="text-center p-4">' +
    '<img class="mb-3" src="<?= base_url() ?>assets/backend/svg/illustrations/sorry.svg" alt="Image Description" style="width: 7rem;">' +
    '<p class="mb-0">Tidak ada data untuk ditampilkan</p>' +
    '</div>'
  },
  "scrollX": true
} );
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

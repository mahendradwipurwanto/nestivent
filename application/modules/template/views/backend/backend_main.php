<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Title -->
  <title><?= ($this->uri->segment(1) ? ucwords(str_replace('-', ' ', $this->uri->segment(1)).' - Nestivent') : 'Nestivent');?></title>

  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta property="og:title" content="<?= ($this->uri->segment(1) ? ucwords(str_replace('-', ' ', $this->uri->segment(1)).' - Nestivent') : 'Nestivent');?>">
  <meta property="og:description" content="<?= ($this->uri->segment(1) ? ucwords(str_replace('-', ' ', $this->uri->segment(1)).' - Nestivent') : 'Nestivent');?>.">
  <meta property="og:image" content="<?= base_url();?>assets/icon-ts.png">
  <meta property="og:url" content="<?= base_url(uri_string()) ?>">

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= base_url() ?>assets/icon-ts.png">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&amp;display=swap" rel="stylesheet">

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="<?= base_url();?>assets/backend/css/vendor.min.css">
  <link rel="stylesheet" href="<?= base_url();?>assets/backend/vendor/icon-set/style.css">



  <!-- CSS Front Template -->
  <link rel="stylesheet" href="<?= base_url();?>assets/backend/css/theme.minc619.css?v=1.0">
  <link rel="stylesheet" href="<?= base_url();?>assets/backend/css/custom.css?<?= time() ?>">
</head>

<body class="footer-offset">

  <script src="<?= base_url();?>assets/backend/vendor/hs-navbar-vertical-aside/hs-navbar-vertical-aside-mini-cache.js"></script>

  <?php $this->load->view('header/main_header.php') ?>

  <!-- ========== MAIN CONTENT ========== -->

  <main id="content" role="main" class="main pointer-event">
    <!-- Content -->
    <div class="content container-fluid">
      <?php $this->load->view($module.'/'.$fileview); ?>
    </div>
    <!-- End Content -->
  </main>
  <!-- ========== END MAIN CONTENT ========== -->

  <!-- JS Implementing Plugins -->
  <script src="<?= base_url();?>assets/backend/js/vendor.min.js"></script>
  <script src="<?= base_url();?>assets/backend/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="<?= base_url();?>assets/backend/vendor/chart.js.extensions/chartjs-extensions.js"></script>
  <script src="<?= base_url();?>assets/backend/vendor/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js"></script>



  <!-- JS Front -->
  <script src="<?= base_url();?>assets/backend/js/theme.min.js"></script>

  <!-- ========== SECONDARY CONTENTS ========== -->

  <!-- Activity -->
  <div id="activitySidebar" class="hs-unfold-content sidebar sidebar-bordered sidebar-box-shadow">
    <div class="card card-lg sidebar-card">
      <div class="card-header">
        <h4 class="card-header-title">Activity</h4>

        <!-- Toggle Button -->
        <a class="js-hs-unfold-invoker btn btn-icon btn-xs btn-ghost-dark ml-2" href="javascript:;"
        data-hs-unfold-options='{
          "target": "#activitySidebar",
          "type": "css-animation",
          "animationIn": "fadeInRight",
          "animationOut": "fadeOutRight",
          "hasOverlay": true,
          "smartPositionOff": true
        }'>
        <i class="tio-clear tio-lg"></i>
      </a>
      <!-- End Toggle Button -->
    </div>

    <!-- Body -->
    <div class="card-body sidebar-body sidebar-scrollbar">
      <!-- Step -->
      <ul class="step step-icon-sm step-avatar-sm">
        <?php if ($aktivitas == FALSE): ?>
          <!-- Step Item -->
          <li class="step-item">
            <center>Tidak ada aktivitas terbaru</center>
          </li>
          <!-- End Step Item -->
        <?php else: ?>
          <?php foreach ($aktivitas as $key): ?>
            <!-- Step Item -->
            <li class="step-item">
              <div class="step-content-wrapper">

                <?php if ($CI->M_template->get_profil($key->SENDER) == FALSE): ?>
                  <span class="step-icon step-icon-soft-dark"><?= substr($CI->M_template->get_sender($key->SENDER), 0, 1)?></span>
                <?php else: ?>
                  <div class="step-avatar">
                    <img class="step-avatar-img" src="<?= base_url() ?>berkas/pengguna/<?= $key->SENDER ?>/foto/<?= $CI->M_template->get_profil($key->SENDER) ?>" alt="Image Description">
                  </div>
                <?php endif; ?>

                <div class="step-content">
                  <h5 class="mb-1"><?php $sender = explode(" ", $CI->M_template->get_sender($key->SENDER)); echo $sender[0];?></h5>

                  <p class="font-size-sm mb-1"><?= $key->MESSAGE ?></p>

                  <small class="text-muted text-uppercase"><?= $CI->time_elapsed($key->CREATED_AT) ?></small>
                </div>
              </div>
            </li>
            <!-- End Step Item -->
          <?php endforeach; ?>
        <?php endif; ?>
      </ul>
      <!-- End Step -->
      <?php if ($c_aktivitas > 8): ?>
        <a class="btn btn-block btn-white" href="<?= site_url('aktivitas-sistem') ?>">Lihat semua <i class="tio-chevron-right"></i></a>
      <?php endif; ?>
    </div>
    <!-- End Body -->
  </div>
</div>
<!-- End Activity -->
<!-- ========== END SECONDARY CONTENTS ========== -->

<!-- JS Plugins Init. -->
<script>
$(document).on('ready', function () {


  // INITIALIZATION OF MEGA MENU
  // =======================================================
  var megaMenu = new HSMegaMenu($('.js-mega-menu'), {
    desktop: {
      position: 'left'
    }
  }).init();



  // INITIALIZATION OF NAVBAR VERTICAL NAVIGATION
  // =======================================================
  var sidebar = $('.js-navbar-vertical-aside').hsSideNav();


  // INITIALIZATION OF TOOLTIP IN NAVBAR VERTICAL MENU
  // =======================================================
  $('.js-nav-tooltip-link').tooltip({ boundary: 'window' })

  $(".js-nav-tooltip-link").on("show.bs.tooltip", function(e) {
    if (!$("body").hasClass("navbar-vertical-aside-mini-mode")) {
      return false;
    }
  });


  // INITIALIZATION OF UNFOLD
  // =======================================================
  $('.js-hs-unfold-invoker').each(function () {
    var unfold = new HSUnfold($(this)).init();
  });


  // INITIALIZATION OF FORM SEARCH
  // =======================================================
  $('.js-form-search').each(function () {
    new HSFormSearch($(this)).init()
  });


  // INITIALIZATION OF SHOW PASSWORD
  // =======================================================
  $('.js-toggle-password').each(function () {
    new HSTogglePassword(this).init()
  });


  // INITIALIZATION OF FILE ATTACH
  // =======================================================
  $('.js-file-attach').each(function () {
    var customFile = new HSFileAttach($(this)).init();
  });


  // INITIALIZATION OF TABS
  // =======================================================
  $('.js-tabs-to-dropdown').each(function () {
    var transformTabsToBtn = new HSTransformTabsToBtn($(this)).init();
  });


  // INITIALIZATION OF STEP FORM
  // =======================================================
  $('.js-step-form').each(function () {
    var stepForm = new HSStepForm($(this), {
      finish: function() {
        $("#addUserStepFormProgress").hide();
        $("#addUserStepFormContent").hide();
        $("#successMessageContent").show();
      }
    }).init();
  });


  // INITIALIZATION OF MASKED INPUT
  // =======================================================
  $('.js-masked-input').each(function () {
    var mask = $.HSCore.components.HSMask.init($(this));
  });


  // INITIALIZATION OF SELECT2
  // =======================================================
  $('.js-select2-custom').each(function () {
    var select2 = $.HSCore.components.HSSelect2.init($(this));
  });


  // INITIALIZATION OF COUNTERS
  // =======================================================
  $('.js-counter').each(function() {
    var counter = new HSCounter($(this)).init();
  });


  // INITIALIZATION OF DATATABLES
  // =======================================================
  var datatable = $.HSCore.components.HSDatatables.init($('#datatable'), {
    dom: 'Bfrtip',
    buttons: [
      {
        extend: 'copy',
        className: 'd-none'
      },
      {
        extend: 'excel',
        className: 'd-none'
      },
      {
        extend: 'csv',
        className: 'd-none'
      },
      {
        extend: 'pdf',
        className: 'd-none'
      },
      {
        extend: 'print',
        className: 'd-none'
      },
    ],
    select: {
      style: 'multi',
      selector: 'td:first-child input[type="checkbox"]',
      classMap: {
        checkAll: '#datatableCheckAll',
        counter: '#datatableCounter',
        counterInfo: '#datatableCounterInfo'
      }
    },
    language: {
      zeroRecords: '<div class="text-center p-4">' +
      '<img class="mb-3" src="<?= base_url() ?>assets/backend/svg/illustrations/sorry.svg" alt="Image Description" style="width: 7rem;">' +
      '<p class="mb-0">No data to show</p>' +
      '</div>'
    }
  });

  $('#export-copy').click(function() {
    datatable.button('.buttons-copy').trigger()
  });

  $('#export-excel').click(function() {
    datatable.button('.buttons-excel').trigger()
  });

  $('#export-csv').click(function() {
    datatable.button('.buttons-csv').trigger()
  });

  $('#export-pdf').click(function() {
    datatable.button('.buttons-pdf').trigger()
  });

  $('#export-print').click(function() {
    datatable.button('.buttons-print').trigger()
  });

  $('.js-datatable-filter').on('change', function() {
    var $this = $(this),
    elVal = $this.val(),
    targetColumnIndex = $this.data('target-column-index');

    datatable.column(targetColumnIndex).search(elVal).draw();
  });

  $('#datatableSearch').on('mouseup', function (e) {
    var $input = $(this),
    oldValue = $input.val();

    if (oldValue == "") return;

    setTimeout(function(){
      var newValue = $input.val();

      if (newValue == ""){
        // Gotcha
        datatable.search('').draw();
      }
    }, 1);
  });

});
</script>

<!-- IE Support -->
<script>
if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="<?= base_url();?>assets/backend/vendor/babel-polyfill/polyfill.min.js"><\/script>');
</script>
</body>
</html>

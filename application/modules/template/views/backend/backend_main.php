<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Title -->
  <title>Dashboard | Front - Admin &amp; Dashboard Template</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= base_url() ?>assets/icon-ts.png">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&amp;display=swap" rel="stylesheet">

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="<?= base_url();?>assets/backend/css/vendor.min.css">
  <link rel="stylesheet" href="<?= base_url();?>assets/backend/vendor/icon-set/style.css">



  <!-- CSS Front Template -->
  <link rel="stylesheet" href="<?= base_url();?>assets/backend/css/theme.minc619.css?v=1.0">
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
          <!-- Step Item -->
          <li class="step-item">
            <div class="step-content-wrapper">
              <div class="step-avatar">
                <img class="step-avatar-img" src="<?= base_url();?>assets/backend/img/160x160/img9.jpg" alt="Image Description">
              </div>

              <div class="step-content">
                <h5 class="mb-1">Iana Robinson</h5>

                <p class="font-size-sm mb-1">Added 2 files to task <a class="text-uppercase" href="#"><i class="tio-folder-bookmarked"></i> Fd-7</a></p>

                <ul class="list-group list-group-sm">
                  <!-- List Item -->
                  <li class="list-group-item list-group-item-light">
                    <div class="row gx-1">
                      <div class="col-6">
                        <div class="media">
                          <span class="mt-1 mr-2">
                            <img class="avatar avatar-xs" src="<?= base_url();?>assets/backend/svg/brands/excel.svg" alt="Image Description">
                          </span>
                          <div class="media-body text-truncate">
                            <span class="d-block font-size-sm text-dark text-truncate" title="weekly-reports.xls">weekly-reports.xls</span>
                            <small class="d-block text-muted">12kb</small>
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="media">
                          <span class="mt-1 mr-2">
                            <img class="avatar avatar-xs" src="<?= base_url();?>assets/backend/svg/brands/word.svg" alt="Image Description">
                          </span>
                          <div class="media-body text-truncate">
                            <span class="d-block font-size-sm text-dark text-truncate" title="weekly-reports.xls">weekly-reports.xls</span>
                            <small class="d-block text-muted">4kb</small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <!-- End List Item -->
                </ul>

                <small class="text-muted text-uppercase">Now</small>
              </div>
            </div>
          </li>
          <!-- End Step Item -->
        </ul>
        <!-- End Step -->

        <a class="btn btn-block btn-white" href="javascript:;">View all <i class="tio-chevron-right"></i></a>
      </div>
      <!-- End Body -->
    </div>
  </div>
  <!-- End Activity -->
  <!-- ========== END SECONDARY CONTENTS ========== -->


  <!-- JS Implementing Plugins -->
  <script src="<?= base_url();?>assets/backend/js/vendor.min.js"></script>
  <script src="<?= base_url();?>assets/backend/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="<?= base_url();?>assets/backend/vendor/chart.js.extensions/chartjs-extensions.js"></script>
  <script src="<?= base_url();?>assets/backend/vendor/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js"></script>



  <!-- JS Front -->
  <script src="<?= base_url();?>assets/backend/js/theme.min.js"></script>

  <!-- JS Plugins Init. -->
  <script>
  $(document).on('ready', function () {

    // BUILDER TOGGLE INVOKER
    // =======================================================
    $('.js-navbar-vertical-aside-toggle-invoker').click(function () {
      $('.js-navbar-vertical-aside-toggle-invoker i').tooltip('hide');
    });


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


    // INITIALIZATION OF SELECT2
    // =======================================================
    $('.js-select2-custom').each(function () {
      var select2 = $.HSCore.components.HSSelect2.init($(this));
    });


    // INITIALIZATION OF CLIPBOARD
    // =======================================================
    $('.js-clipboard').each(function() {
      var clipboard = $.HSCore.components.HSClipboard.init(this);
    });
  });
  </script>

  <!-- IE Support -->
  <script>
  if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="<?= base_url();?>assets/backend/vendor/babel-polyfill/polyfill.min.js"><\/script>');
  </script>
  </body>
</html>

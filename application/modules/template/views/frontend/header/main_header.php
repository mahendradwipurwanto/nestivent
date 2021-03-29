<!-- ========== HEADER ========== -->
<header id="header" class="header header-box-shadow-on-scroll header-abs-top header-bg-transparent header-show-hide"
  data-hs-header-options='{
    "fixMoment": 500,
    "fixEffect": "slide"
  }'>
  <!-- Search -->
  <div id="searchPushTop" class="search-push-top">
    <div class="container position-relative">
      <div class="search-push-top-content pt-3">
        <!-- Close Button -->
        <div class="search-push-top-close-btn">
          <div class="hs-unfold">
            <a class="js-hs-unfold-invoker btn btn-icon btn-xs btn-soft-secondary mt-2 mr-2" href="javascript:;"
              data-hs-unfold-options='{
                "target": "#searchPushTop",
                "type": "jquery-slide",
                "contentSelector": ".search-push-top"
              }'>
              <svg width="10" height="10" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z"/>
              </svg>
            </a>
          </div>
        </div>
        <!-- End Close Button -->

        <!-- Input -->
        <form class="input-group">
          <input type="search" class="form-control" placeholder="Masukkan kata kunci" aria-label="Masukkan kata kunci">
          <div class="input-group-append">
            <button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button>
          </div>
        </form>
        <!-- End Input -->
      </div>
    </div>
  </div>
  <!-- End Search -->

  <div class="header-section">

    <?php $this->load->view('header/main_topbar') ?>

      <div id="logoAndNav" class="container">
        <!-- Nav -->
        <nav class="js-mega-menu navbar navbar-expand-lg">
          <div class="navbar-nav-wrap">
            <!-- Logo -->
            <a class="navbar-brand navbar-nav-wrap-brand" href="index.html" aria-label="Front">
              <img src="<?= base_url();?>assets/logo-ts.png" class="img-12-5" alt="Logo">
            </a>
            <!-- End Logo -->

            <?php $this->load->view('header/main_secondary') ?>

            <!-- Responsive Toggle Button -->
            <button type="button" class="navbar-toggler navbar-nav-wrap-toggler btn btn-icon btn-sm rounded-circle"
              aria-label="Toggle navigation"
              aria-expanded="false"
              aria-controls="navBar"
              data-toggle="collapse"
              data-target="#navBar">
              <span class="navbar-toggler-default">
                <svg width="14" height="14" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                  <path fill="currentColor" d="M17.4,6.2H0.6C0.3,6.2,0,5.9,0,5.5V4.1c0-0.4,0.3-0.7,0.6-0.7h16.9c0.3,0,0.6,0.3,0.6,0.7v1.4C18,5.9,17.7,6.2,17.4,6.2z M17.4,14.1H0.6c-0.3,0-0.6-0.3-0.6-0.7V12c0-0.4,0.3-0.7,0.6-0.7h16.9c0.3,0,0.6,0.3,0.6,0.7v1.4C18,13.7,17.7,14.1,17.4,14.1z"/>
                </svg>
              </span>
              <span class="navbar-toggler-toggled">
                <svg width="14" height="14" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                  <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z"/>
                </svg>
              </span>
            </button>
          <!-- End Responsive Toggle Button -->

          <!-- Navigation -->
          <?php $this->load->view('header/main_menu') ?>
          <!-- End Navigation -->
        </div>
      </nav>
      <!-- End Nav -->
    </div>
  </div>
</header>
<!-- ========== END HEADER ========== -->

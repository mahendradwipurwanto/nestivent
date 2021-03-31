<!-- Page Header -->
<div class="container space-top-1 space-top-lg-3">
  <div class="page-header">
    <!-- Profile Cover -->
    <div class="profile-cover">
      <div class="profile-cover-img-wrapper">
        <img class="profile-cover-img" src="<?= base_url();?>assets/frontend/img/1920x400/img1.jpg" alt="Image Description">
      </div>
    </div>
    <!-- End Profile Cover -->

    <!-- Media -->
    <div class="d-sm-flex align-items-lg-center pt-1 px-3 pb-3">
      <div class="mb-2 mb-sm-0 mr-4">
        <img class="avatar avatar-xl profile-cover-avatar shadow-soft" src="<?= base_url();?>assets/frontend/svg/brands/capsule.svg" alt="Image Description">
      </div>

      <div class="media-body">
        <div class="row">
          <div class="col-lg mb-3 mb-lg-0">
            <h1 class="h2 mb-1">Capsule <img class="avatar avatar-xs" src="<?= base_url();?>assets/frontend/svg/illustrations/top-vendor.svg" alt="Review rating" data-toggle="tooltip" data-placement="top" title="Claimed profile"></h1>

            <!-- Rating List -->
            <div class="d-flex align-items-center">
              <span class="font-weight-bold text-dark ml-1">1561</span>
              <span class="font-size-1 ml-1">Peserta)</span>
            </div>
            <!-- End Rating List -->
          </div>

          <div class="col-lg-auto align-self-lg-end text-lg-right">
            <a class="btn btn-sm btn-outline-primary mb-1 mb-sm-0" href="#">
              <i class="fas fa-plus fa-sm mr-1"></i> Daftar
            </a>
          </div>
        </div>
        <!-- End Row -->
      </div>
    </div>
    <!-- End Media -->

    <!-- Nav Scroller -->
    <div id="pageHeaderTabParent">
      <div class="js-nav-scroller js-sticky-block hs-nav-scroller-horizontal bg-white"
           data-hs-sticky-block-options='{
           "parentSelector": "#pageHeaderTabParent",
           "breakpoint": "lg",
           "startPoint": "#pageHeaderTabParent",
           "endPoint": "#pageHeaderTabEndPoint"
         }'>
        <span class="hs-nav-scroller-arrow-prev" style="display: none;">
          <a class="hs-nav-scroller-arrow-link" href="javascript:;">
            <i class="fas fa-angle-left"></i>
          </a>
        </span>

        <span class="hs-nav-scroller-arrow-next" style="display: none;">
          <a class="hs-nav-scroller-arrow-link" href="javascript:;">
            <i class="fas fa-angle-right"></i>
          </a>
        </span>

        <!-- Nav -->
        <ul class="js-scroll-nav nav nav-tabs page-header-tabs bg-white" id="pageHeaderTab" role="tablist"
            data-hs-scroll-nav-options='{
            "customOffsetTop": 40
          }'>
          <li class="nav-item active">
            <a class="nav-link" href="#tentang-section">Tentang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#narasumber-section">Narasumber</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#prestige-section">Prestige</a>
          </li>
        </ul>
        <!-- End Nav -->
      </div>
    </div>
    <!-- End Nav Scroller -->
  </div>
</div>
<!-- End Page Header -->

<!-- About Section -->
<div id="tentang-section" class="container space-top-1">
  <h3>Tentang Event</h3>

  <div class="row mb-5">
    <div class="col-md-3 order-md-2 mb-3 mb-md-0">
      <div class="pl-md-4">
        <ul class="list-unstyled list-article">
          <li>
            <span class="h5 d-block">Founded</span>
            <span class="d-block font-size-1">2009</span>
          </li>

          <li>
            <span class="h5 d-block">Company size</span>
            <span class="d-block font-size-1">150 - 300</span>
          </li>

          <li>
            <span class="h5 d-block">Avg. Salary</span>
            <span class="d-block font-size-1">$25 - $45</span>
          </li>

          <li>
            <span class="h5 d-block">Industry</span>
            <span class="d-block font-size-1">Information Technology</span>
          </li>

          <li>
            <span class="h5 d-block">Links</span>

            <ul class="list-inline">
              <li class="list-inline-item">
                <a class="icon icon-xs icon-soft-dark icon-circle" href="#" data-toggle="tooltip" data-placement="top" title="Capsule on Facebook">
                  <i class="fab fa-facebook"></i>
                </a>
              </li>

              <li class="list-inline-item">
                <a class="icon icon-xs icon-soft-dark icon-circle" href="#" data-toggle="tooltip" data-placement="top" title="Capsule on Twitter">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>

              <li class="list-inline-item">
                <a class="icon icon-xs icon-soft-dark icon-circle" href="#" data-toggle="tooltip" data-placement="top" title="Capsule on Github">
                  <i class="fab fa-github"></i>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>

    <div class="col-md-9">
      <div class="mb-5">
        <p>Capsule was launched in 2009 following the founders' frustration with existing CRM services that were either overly simplistic or far too complex for most businesses. We believe the value of a modern CRM lies in the ability to help businesses stay organized, know more about their customers, build strong relationships and to make the most of sales opportunities, all while minimizing user input. We built Capsule to deliver on these values and today Capsule is used by thousands of businesses of all sizes all over the world.</p>

        <div class="collapse" id="collapseLinkDescription">
          <p>We're based in Manchester, United Kingdom, a city with a creative heart that was founded on science and industry and the birthplace of the modern computer.</p>
        </div>

        <a class="link-collapse" data-toggle="collapse" href="#collapseLinkDescription" role="button" aria-expanded="false" aria-controls="collapseLinkDescription">
          <span class="link-collapse-default">Read more <i class="fas fa-angle-down fa-sm ml-1"></i></span>
          <span class="link-collapse-active">Read less <i class="fas fa-angle-up fa-sm ml-1"></i></span>
        </a>
      </div>

      <div id="fancyboxGallery">
        <div class="row mx-n2">
          <div class="col-4 col-sm px-2 mb-3 mb-sm-0">
            <a class="js-fancybox media-viewer" href="javascript:;"
               data-hs-fancybox-options='{
                 "selector": "#fancyboxGallery .js-fancybox",
                 "speed": 700
               }'
               data-src="<?= base_url();?>assets/frontend/img/900x900/img1.jpg"
               data-caption="Front in frames - image #01">
              <img class="img-fluid rounded" src="<?= base_url();?>assets/frontend/img/900x900/img1.jpg" alt="Image Description">

              <span class="media-viewer-container">
                <span class="media-viewer-icon">
                  <i class="fas fa-plus media-viewer-icon-inner"></i>
                </span>
              </span>
            </a>
          </div>

          <div class="col-4 col-sm px-2 mb-3 mb-sm-0">
            <a class="js-fancybox media-viewer" href="javascript:;"
               data-hs-fancybox-options='{
                 "selector": "#fancyboxGallery .js-fancybox",
                 "speed": 700
               }'
               data-src="<?= base_url();?>assets/frontend/img/900x900/img8.jpg"
               data-caption="Front in frames - image #02">
              <img class="img-fluid rounded" src="<?= base_url();?>assets/frontend/img/900x900/img8.jpg" alt="Image Description">

              <span class="media-viewer-container">
                <span class="media-viewer-icon">
                  <i class="fas fa-plus media-viewer-icon-inner"></i>
                </span>
              </span>
            </a>
          </div>

          <div class="col-4 col-sm px-2 mb-3 mb-sm-0">
            <a class="js-fancybox media-viewer" href="javascript:;"
               data-hs-fancybox-options='{
                 "selector": "#fancyboxGallery .js-fancybox",
                 "speed": 700
               }'
               data-src="<?= base_url();?>assets/frontend/img/900x900/img7.jpg"
               data-caption="Front in frames - image #03">
              <img class="img-fluid rounded" src="<?= base_url();?>assets/frontend/img/900x900/img7.jpg" alt="Image Description">

              <span class="media-viewer-container">
                <span class="media-viewer-icon">
                  <i class="fas fa-plus media-viewer-icon-inner"></i>
                </span>
              </span>
            </a>
          </div>

          <div class="col-4 col-sm px-2 mb-3 mb-sm-0">
            <a class="js-fancybox media-viewer" href="javascript:;"
               data-hs-fancybox-options='{
                 "selector": "#fancyboxGallery .js-fancybox",
                 "speed": 700
               }'
               data-src="<?= base_url();?>assets/frontend/img/900x900/img23.jpg"
               data-caption="Front in frames - image #04">
              <img class="img-fluid rounded" src="<?= base_url();?>assets/frontend/img/900x900/img23.jpg" alt="Image Description">

              <span class="media-viewer-container">
                <span class="media-viewer-icon">
                  <i class="fas fa-plus media-viewer-icon-inner"></i>
                </span>
              </span>
            </a>
          </div>

          <div class="col-4 col-sm px-2 mb-3 mb-sm-0">
            <a class="js-fancybox media-viewer" href="javascript:;"
               data-hs-fancybox-options='{
                 "selector": "#fancyboxGallery .js-fancybox",
                 "speed": 700
               }'
               data-src="<?= base_url();?>assets/frontend/img/900x900/img9.jpg"
               data-caption="Front in frames - image #05">
              <img class="img-fluid rounded" src="<?= base_url();?>assets/frontend/img/900x900/img9.jpg" alt="Image Description">

              <span class="media-viewer-container">
                <span class="media-viewer-icon media-viewer-icon-active">
                  <span class="media-viewer-icon-inner">+1</span>
                </span>
              </span>
            </a>
          </div>
        </div>

        <img class="js-fancybox d-none" alt="Image Description"
             data-hs-fancybox-options='{
               "selector": "#fancyboxGallery .js-fancybox",
               "speed": 700
             }'
             data-src="<?= base_url();?>assets/frontend/img/900x900/img2.jpg"
             data-caption="Front in frames - image #06">
      </div>
    </div>
  </div>
  <!-- End Row -->
</div>
<!-- Tentang Section -->

<!-- Divider -->
<div class="container">
  <hr class="my-10">
</div>
<!-- End Divider -->

<!-- Narasumber Section -->
<div id="narasumber-section" class="container">
  <div class="mb-4">
    <h3>Narasumber</h3>
  </div>

  <div class="row mx-n2">
    <div class="col-12 col-sm-6 col-lg-3 px-2 mb-3">
      <!-- Card -->
      <a class="card card-bordered card-hover-shadow h-100" href="#">
        <div class="card-body">
          <div class="media align-items-center">
            <img class="avatar avatar-sm avatar-circle mr-3" src="<?= base_url();?>assets/frontend/img/480x320/img28.jpg" alt="SVG">

            <div class="media-body">
              <h5 class="text-hover-primary mb-0">London, UK</h5>
            </div>

            <div class="align-self-center text-muted text-hover-primary pl-2 ml-auto">
              <i class="fas fa-angle-right"></i>
            </div>
          </div>
        </div>
      </a>
      <!-- End Card -->
    </div>

    <div class="col-12 col-sm-6 col-lg-3 px-2 mb-3">
      <!-- Card -->
      <a class="card card-bordered card-hover-shadow h-100" href="#">
        <div class="card-body">
          <div class="media align-items-center">
            <img class="avatar avatar-sm avatar-circle mr-3" src="<?= base_url();?>assets/frontend/img/480x320/img8.jpg" alt="SVG">

            <div class="media-body">
              <h5 class="text-hover-primary mb-0">Bristol, UK</h5>
            </div>

            <div class="align-self-center text-muted text-hover-primary pl-2 ml-auto">
              <i class="fas fa-angle-right"></i>
            </div>
          </div>
        </div>
      </a>
      <!-- End Card -->
    </div>

    <div class="col-12 col-sm-6 col-lg-3 px-2 mb-3">
      <!-- Card -->
      <a class="card card-bordered card-hover-shadow h-100" href="#">
        <div class="card-body">
          <div class="media align-items-center">
            <img class="avatar avatar-sm avatar-circle mr-3" src="<?= base_url();?>assets/frontend/img/480x320/img29.jpg" alt="SVG">

            <div class="media-body">
              <h5 class="text-hover-primary mb-0">Oxford, UK</h5>
            </div>

            <div class="align-self-center text-muted text-hover-primary pl-2 ml-auto">
              <i class="fas fa-angle-right"></i>
            </div>
          </div>
        </div>
      </a>
      <!-- End Card -->
    </div>

    <div class="col-12 col-sm-6 col-lg-3 px-2 mb-3">
      <!-- Card -->
      <a class="card card-bordered card-hover-shadow h-100" href="#">
        <div class="card-body">
          <div class="media align-items-center">
            <img class="avatar avatar-sm avatar-circle mr-3" src="<?= base_url();?>assets/frontend/img/480x320/img11.jpg" alt="SVG">

            <div class="media-body">
              <h5 class="text-hover-primary mb-0">Edinburgh, UK</h5>
            </div>

            <div class="align-self-center text-muted text-hover-primary pl-2 ml-auto">
              <i class="fas fa-angle-right"></i>
            </div>
          </div>
        </div>
      </a>
      <!-- End Card -->
    </div>

    <div class="col-12 col-sm-6 col-lg-3 px-2 mb-3">
      <!-- Card -->
      <a class="card card-bordered card-hover-shadow h-100" href="#">
        <div class="card-body">
          <div class="media align-items-center">
            <img class="avatar avatar-sm avatar-circle mr-3" src="<?= base_url();?>assets/frontend/img/480x320/img10.jpg" alt="SVG">

            <div class="media-body">
              <h5 class="text-hover-primary mb-0">Newcastle, UK</h5>
            </div>

            <div class="align-self-center text-muted text-hover-primary pl-2 ml-auto">
              <i class="fas fa-angle-right"></i>
            </div>
          </div>
        </div>
      </a>
      <!-- End Card -->
    </div>

    <div id="pageHeaderTabEndPoint" class="col-12 col-sm-6 col-lg-3 px-2 mb-3">
      <!-- Card -->
      <a class="card card-bordered card-hover-shadow h-100" href="#">
        <div class="card-body">
          <div class="media align-items-center">
            <img class="avatar avatar-sm avatar-circle mr-3" src="<?= base_url();?>assets/frontend/img/480x320/img9.jpg" alt="SVG">

            <div class="media-body">
              <h5 class="text-hover-primary mb-0">Liverpool, UK</h5>
            </div>

            <div class="align-self-center text-muted text-hover-primary pl-2 ml-auto">
              <i class="fas fa-angle-right"></i>
            </div>
          </div>
        </div>
      </a>
      <!-- End Card -->
    </div>
  </div>
  <!-- End Row -->
</div>
<!-- Narasumber Section -->

<!-- Divider -->
<div class="container">
  <hr class="my-10">
</div>
<!-- End Divider -->

<!-- Prestige Section -->
<div id="prestige-section" class="container space-bottom-2">
  <div class="mb-4">
    <h3>Prestige insights</h3>
    <p>Insights from 209 Front Job users who have interviewed with Capsule within the last 5 years.</p>
  </div>

  <div class="row mb-3">
    <div class="col-md mb-5">
      <!-- Card -->
      <div class="card card-bordered shadow-none h-100">
        <div class="card-body">
          <h6 class="font-weight-normal mb-1">Interview experience:</h6>
          <h4 class="card-title">Favorable</h4>
        </div>
      </div>
      <!-- End Card -->
    </div>

    <div class="col-md mb-5">
      <!-- Card -->
      <div class="card card-bordered shadow-none h-100">
        <div class="card-body">
          <h6 class="font-weight-normal mb-1">Interview difficulty:</h6>
          <h4 class="card-title">Medium</h4>
        </div>
      </div>
      <!-- End Card -->
    </div>

    <div class="col-md mb-5">
      <!-- Card -->
      <div class="card card-bordered shadow-none h-100">
        <div class="card-body">
          <h6 class="font-weight-normal mb-1">Interview process length:</h6>
          <h4 class="card-title">About a day or two</h4>
        </div>
      </div>
      <!-- End Card -->
    </div>
  </div>
  <!-- End Row -->

  <h5>Interview process length</h5>

  <div class="row mb-5 mx-n2">
    <div class="col-12 col-sm-6 col-lg px-2 mb-3">
      <!-- Card -->
      <div class="card card-bordered shadow-none h-100">
        <div class="card-body pt-3 px-3 pb-0">
          <h6 class="font-weight-normal">About a day or two</h6>
        </div>

        <div class="card-footer border-0 pt-0 px-3 pb-3">
          <span class="d-block font-size-1 mb-2">43%</span>

          <div class="progress" style="height: 8px;">
            <div class="progress-bar bg-success" role="progressbar" style="width: 43%" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div>
      <!-- End Card -->
    </div>

    <div class="col-12 col-sm-6 col-lg px-2 mb-3">
      <!-- Card -->
      <div class="card card-bordered shadow-none h-100">
        <div class="card-body pt-3 px-3 pb-0">
          <h6 class="font-weight-normal">About a week</h6>
        </div>

        <div class="card-footer border-0 pt-0 px-3 pb-3">
          <span class="d-block font-size-1 mb-2">28%</span>

          <div class="progress" style="height: 8px;">
            <div class="progress-bar bg-success" role="progressbar" style="width: 28%" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div>
      <!-- End Card -->
    </div>

    <div class="col-12 col-sm-6 col-lg px-2 mb-3">
      <!-- Card -->
      <div class="card card-bordered shadow-none h-100">
        <div class="card-body pt-3 px-3 pb-0">
          <h6 class="font-weight-normal">About two weeks</h6>
        </div>

        <div class="card-footer border-0 pt-0 px-3 pb-3">
          <span class="d-block font-size-1 mb-2">17%</span>

          <div class="progress" style="height: 8px;">
            <div class="progress-bar bg-success" role="progressbar" style="width: 17%" aria-valuenow="17" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div>
      <!-- End Card -->
    </div>

    <div class="col-12 col-sm-6 col-lg px-2 mb-3">
      <!-- Card -->
      <div class="card card-bordered shadow-none h-100">
        <div class="card-body pt-3 px-3 pb-0">
          <h6 class="font-weight-normal">More than one month</h6>
        </div>

        <div class="card-footer border-0 pt-0 px-3 pb-3">
          <span class="d-block font-size-1 mb-2">6%</span>

          <div class="progress" style="height: 8px;">
            <div class="progress-bar bg-success" role="progressbar" style="width: 6%" aria-valuenow="6" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div>
      <!-- End Card -->
    </div>

    <div class="col-12 col-sm-6 col-lg px-2 mb-3">
      <!-- Card -->
      <div class="card card-bordered shadow-none h-100">
        <div class="card-body pt-3 px-3 pb-0">
          <h6 class="font-weight-normal">About a month</h6>
        </div>

        <div class="card-footer border-0 pt-0 px-3 pb-3">
          <span class="d-block font-size-1 mb-2">5%</span>

          <div class="progress" style="height: 8px;">
            <div class="progress-bar bg-success" role="progressbar" style="width: 5%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div>
      <!-- End Card -->
    </div>
  </div>
  <!-- End Row -->
</div>
<!-- Prestige Section -->

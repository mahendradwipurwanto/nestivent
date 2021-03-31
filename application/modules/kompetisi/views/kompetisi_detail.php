<!-- Breadcrumb Section -->
<div class="container py-3 space-top-3 space-bottom-2 space-top-lg-3">
  <div class="row align-items-lg-center">
    <div class="col-lg mb-2 mb-lg-0">
      <!-- Breadcrumb -->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-no-gutter font-size-1 mb-0">
          <li class="breadcrumb-item"><a href="<?= site_url('penyelenggara') ?>">Penyelenggara</a></li>
          <li class="breadcrumb-item"><a href="<?= site_url('penyelenggara/14') ?>">Nama Penyelenggara</a></li>
          <li class="breadcrumb-item">Kompetisi</li>
          <li class="breadcrumb-item active" aria-current="page">470 Lucy Forks, Patriciafurt, YC7B</li>
        </ol>
      </nav>
      <!-- End Breadcrumb -->
    </div>

    <div class="col-lg-auto">
      <a class="btn btn-sm btn-ghost-secondary" href="javascript:;">
        <i class="fas fa-share-alt mr-2"></i> Share
      </a>
    </div>
  </div>
  <!-- End Row -->
</div>
<!-- End Breadcrumb Section -->

<!-- Gallery Section -->
<div class="container position-relative mb-5">
  <div id="fancyboxGallery" class="js-fancybox"
    data-hs-fancybox-options='{
      "selector": "#fancyboxGallery .js-fancybox-item"
    }'>
    <div class="rounded-lg overflow-hidden">
      <div class="row mx-n1">
        <div class="col-md-8 px-1">
          <!-- Gallery -->
          <a class="js-fancybox-item d-block" href="javascript:;"
          data-src="<?= base_url();?>assets/frontend/img/1920x1080/img27.jpg"
          data-caption="Front in frames - image #01">
          <img class="img-fluid w-100" src="<?= base_url();?>assets/frontend/img/900x455/img1.jpg" alt="Image Description">

          <div class="position-absolute bottom-0 right-0 pb-3 pr-3">
            <span class="d-md-none btn btn-sm btn-light">
              <i class="fas fa-expand mr-2"></i> View Photos
            </span>
          </div>
        </a>
        <!-- End Gallery -->
      </div>

      <div class="col-md-4 d-none d-md-inline-block px-1">
        <!-- Gallery -->
        <a class="js-fancybox-item d-block mb-2" href="javascript:;"
        data-src="<?= base_url();?>assets/frontend/img/1920x1080/img11.jpg"
        data-caption="Front in frames - image #04">
        <img class="img-fluid w-100" src="<?= base_url();?>assets/frontend/img/450x225/img1.jpg" alt="Image Description">
      </a>
      <!-- End Gallery -->

      <!-- Gallery -->
      <a class="js-fancybox-item d-block" href="javascript:;"
      data-src="<?= base_url();?>assets/frontend/img/1920x1080/img14.jpg"
      data-caption="Front in frames - image #04">
      <img class="img-fluid w-100" src="<?= base_url();?>assets/frontend/img/450x225/img2.jpg" alt="Image Description">

      <div class="position-absolute bottom-0 right-0 pb-3 pr-3">
        <span class="d-none d-md-inline-block btn btn-sm btn-light">
          <i class="fas fa-expand mr-2"></i> View Photos
        </span>
      </div>
    </a>
    <!-- End Gallery -->

    <img class="js-fancybox-item d-none" alt="Image Description"
    data-src="<?= base_url();?>assets/frontend/img/1920x1080/img24.jpg"
    data-caption="Front in frames - image #05">
    <img class="js-fancybox-item d-none" alt="Image Description"
    data-src="<?= base_url();?>assets/frontend/img/1920x1080/img20.jpg"
    data-caption="Front in frames - image #06">
  </div>
  </div>
  <!-- End Row -->
  </div>

  <div class="d-flex justify-content-end mt-2">
    <span class="small text-dark font-weight-bold">Published:</span>
    <span class="small ml-1">December 27, 2018</span>
  </div>
  </div>
  </div>
  <!-- End Gallery Section -->

  <!-- Property Description Section -->
  <div class="container space-bottom-2 space-top-lg-3">
    <div class="row">
      <div class="col-lg-8 mb-9 mb-lg-0">
        <div class="row justify-content-lg-between mb-7">
          <div class="col-12 mb-5 mb-sm-0">
            <h1 class="h2 mb-0">470 Lucy Forks</h1>
            <span class="d-block text-dark mb-3">Patriciafurt, YC7B, London, England</span>

            <ul class="list-inline list-separator font-size-1 text-body">
              <li class="list-inline-item">
                <i class="fas fa-bed text-muted mr-1"></i> 3 bed
              </li>
              <li class="list-inline-item">
                <i class="fas fa-bath text-muted mr-1"></i> 2 bath
              </li>
              <li class="list-inline-item">
                <i class="fas fa-ruler-combined text-muted mr-1"></i> 1,428 sqft
              </li>
            </ul>
          </div>
        </div>
        <!-- End Row -->

        <!-- Nav Classic -->
        <ul class="nav nav-segment nav-fill" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="property-details-tab" data-toggle="pill" href="#property-details" role="tab" aria-controls="property-details" aria-selected="true">
              <div class="d-md-flex justify-content-md-center align-items-md-center">
                <figure class="d-none d-md-block avatar avatar-xs mr-3">
                  <img class="avatar-img" src="<?= base_url();?>assets/frontend/svg/icons/icon-13.svg" alt="SVG">
                </figure>
                Deskripsi
              </div>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="property-floorplan-tab" data-toggle="pill" href="#property-floorplan" role="tab" aria-controls="property-floorplan" aria-selected="false">
              <div class="d-md-flex justify-content-md-center align-items-md-center">
                <figure class="d-none d-md-block avatar avatar-xs mr-3">
                  <img class="avatar-img" src="<?= base_url();?>assets/frontend/svg/icons/icon-63.svg" alt="SVG">
                </figure>
                Floorplan
              </div>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="property-market-stats-tab" data-toggle="pill" href="#property-market-stats" role="tab" aria-controls="property-market-stats" aria-selected="false">
              <div class="d-md-flex justify-content-md-center align-items-md-center">
                <figure class="d-none d-md-block avatar avatar-xs mr-3">
                  <img class="avatar-img" src="<?= base_url();?>assets/frontend/svg/icons/icon-5.svg" alt="SVG">
                </figure>
                Contact Person
              </div>
            </a>
          </li>
        </ul>
        <!-- End Nav Classic -->

        <!-- Tab Content -->
        <div class="tab-content">
          <div class="tab-pane fade mt-6 show active" id="property-details" role="tabpanel" aria-labelledby="property-details-tab">
            <h4 class="mb-4">Home details</h4>

            <div class="row justify-content-md-between">
              <div class="col-md-5">
                <dl class="row">
                  <dt class="col-sm-6 text-dark">Property ID:</dt>
                  <dd class="col-sm-6 text-sm-right">HG328e91UA</dd>

                  <dt class="col-sm-6 text-dark">Property type:</dt>
                  <dd class="col-sm-6 text-sm-right">House</dd>

                  <dt class="col-sm-6 text-dark">Year built:</dt>
                  <dd class="col-sm-6 text-sm-right">2015</dd>
                </dl>
                <!-- End Row -->
              </div>

              <div class="col-md-5">
                <dl class="row">
                  <dt class="col-sm-6 text-dark">Lot size:</dt>
                  <dd class="col-sm-6 text-sm-right">1,428 sq.m.</dd>

                  <dt class="col-sm-6 text-dark">Rooms:</dt>
                  <dd class="col-sm-6 text-sm-right">12</dd>

                  <dt class="col-sm-6 text-dark">Parking:</dt>
                  <dd class="col-sm-6 text-sm-right">2</dd>
                </dl>
                <!-- End Row -->
              </div>
            </div>
            <!-- End Row -->

            <!-- View Info -->
            <div class="border-top border-bottom py-4 mt-4 mb-7">
              <div class="row justify-content-sm-between">
                <div class="col-sm-6 text-sm-right mb-2 mb-sm-0">
                  <div class="pr-md-4">
                    <span>Last 30 days:</span>
                    <span class="text-dark font-weight-bold">920 page views</span>
                  </div>
                </div>
                <div class="col-sm-6 column-divider-sm">
                  <div class="pl-md-4">
                    <span>Since listed:</span>
                    <span class="text-dark font-weight-bold">471 page views</span>
                  </div>
                </div>
              </div>
            </div>
            <!-- End View Info -->

            <h4 class="mb-4">Description</h4>

            <p>This extremely spacious two/three bedroom duplex apartment occupies a desirable position to the South-West of Harrogate's town centre and offers a huge amount of scope to update and re-model to suit the individual including a large eaves storage room ripe for conversion into a second bathroom.</p>

            <p>Accessed via a communal hall up to the first floor, the apartment opens into a split level hall. To the front elevation there is a lovely, light and airy lounge with far reaching views towards the town centre and countryside beyond. Adjoining there is a well proportioned double bedroom with a fitted wardrobe.</p>

            <!-- Collapse Link - Content -->
            <div class="collapse" id="collapseLinkExample">
              <h4 class="mb-4">Directions</h4>

              <p>Proceed up the Otley Road from the Prince Of Wales roundabout and through the traffic lights with the turning into Harlow Moor Road. Continue ahead where the property can be found on the left hand side.</p>

              <h4 class="mb-4">Strictly by appointment through Front House</h4>

              <p>You may download, store and use the material for your own personal use and research. You may not republish, retransmit, redistribute or otherwise make the material available to any party or make the same available on any website, online service or bulletin board of your own or of any other party or make the same available in hard copy or in any other media without the website owner's express prior written consent. The website owner's copyright must remain on all reproductions of material taken from this website.</p>
            </div>
            <!-- End Collapse Link - Content -->

            <!-- Collapse Link -->
            <a class="link-collapse font-weight-bold" data-toggle="collapse" href="#collapseLinkExample" role="button" aria-expanded="false" aria-controls="collapseLinkExample">
              <span class="link-collapse-default">View More</span>
              <span class="link-collapse-active">View Less</span>
            </a>
            <!-- End Collapse Link -->

            <hr class="my-6">

            <h4 class="mb-4">Accessibility</h4>

            <div class="row">
              <div class="col-md-6">
                <!-- Accessibility List -->
                <ul class="list-unstyled list-sm-article mb-0">
                  <li class="d-flex align-items-center">
                    <h6 class="mb-0">Location</h6>

                    <div class="d-flex ml-auto">
                      <img class="avatar avatar-xss mr-1" src="<?= base_url();?>assets/frontend/svg/illustrations/star.svg" alt="Review rating">
                      <img class="avatar avatar-xss mr-1" src="<?= base_url();?>assets/frontend/svg/illustrations/star.svg" alt="Review rating">
                      <img class="avatar avatar-xss mr-1" src="<?= base_url();?>assets/frontend/svg/illustrations/star.svg" alt="Review rating">
                      <img class="avatar avatar-xss mr-1" src="<?= base_url();?>assets/frontend/svg/illustrations/star.svg" alt="Review rating">
                      <img class="avatar avatar-xss mr-1" src="<?= base_url();?>assets/frontend/svg/illustrations/star.svg" alt="Review rating">
                    </div>
                  </li>

                  <li class="d-flex align-items-center">
                    <h6 class="mb-0">Area safety</h6>

                    <div class="d-flex ml-auto">
                      <img class="avatar avatar-xss mr-1" src="<?= base_url();?>assets/frontend/svg/illustrations/star.svg" alt="Review rating">
                      <img class="avatar avatar-xss mr-1" src="<?= base_url();?>assets/frontend/svg/illustrations/star.svg" alt="Review rating">
                      <img class="avatar avatar-xss mr-1" src="<?= base_url();?>assets/frontend/svg/illustrations/star.svg" alt="Review rating">
                      <img class="avatar avatar-xss mr-1" src="<?= base_url();?>assets/frontend/svg/illustrations/star.svg" alt="Review rating">
                      <img class="avatar avatar-xss mr-1" src="<?= base_url();?>assets/frontend/svg/illustrations/star-half.svg" alt="Review rating">
                    </div>
                  </li>

                  <li class="d-flex align-items-center">
                    <h6 class="mb-0">Close to schools</h6>

                    <div class="d-flex ml-auto">
                      <img class="avatar avatar-xss mr-1" src="<?= base_url();?>assets/frontend/svg/illustrations/star.svg" alt="Review rating">
                      <img class="avatar avatar-xss mr-1" src="<?= base_url();?>assets/frontend/svg/illustrations/star.svg" alt="Review rating">
                      <img class="avatar avatar-xss mr-1" src="<?= base_url();?>assets/frontend/svg/illustrations/star.svg" alt="Review rating">
                      <img class="avatar avatar-xss mr-1" src="<?= base_url();?>assets/frontend/svg/illustrations/star-half.svg" alt="Review rating">
                      <img class="avatar avatar-xss mr-1" src="<?= base_url();?>assets/frontend/svg/illustrations/star-muted.svg" alt="Review rating">
                    </div>
                  </li>
                </ul>
                <!-- End Accessibility List -->
              </div>

              <div class="col-md-6">
                <!-- Accessibility List -->
                <ul class="list-unstyled list-sm-article mb-0">
                  <li class="d-flex align-items-center">
                    <h6 class="mb-0">Low cost</h6>

                    <div class="d-flex ml-auto">
                      <img class="avatar avatar-xss mr-1" src="<?= base_url();?>assets/frontend/svg/illustrations/star.svg" alt="Review rating">
                      <img class="avatar avatar-xss mr-1" src="<?= base_url();?>assets/frontend/svg/illustrations/star.svg" alt="Review rating">
                      <img class="avatar avatar-xss mr-1" src="<?= base_url();?>assets/frontend/svg/illustrations/star.svg" alt="Review rating">
                      <img class="avatar avatar-xss mr-1" src="<?= base_url();?>assets/frontend/svg/illustrations/star.svg" alt="Review rating">
                      <img class="avatar avatar-xss mr-1" src="<?= base_url();?>assets/frontend/svg/illustrations/star.svg" alt="Review rating">
                    </div>
                  </li>

                  <li class="d-flex align-items-center">
                    <h6 class="mb-0">Built around</h6>

                    <div class="d-flex ml-auto">
                      <img class="avatar avatar-xss mr-1" src="<?= base_url();?>assets/frontend/svg/illustrations/star.svg" alt="Review rating">
                      <img class="avatar avatar-xss mr-1" src="<?= base_url();?>assets/frontend/svg/illustrations/star.svg" alt="Review rating">
                      <img class="avatar avatar-xss mr-1" src="<?= base_url();?>assets/frontend/svg/illustrations/star.svg" alt="Review rating">
                      <img class="avatar avatar-xss mr-1" src="<?= base_url();?>assets/frontend/svg/illustrations/star.svg" alt="Review rating">
                      <img class="avatar avatar-xss mr-1" src="<?= base_url();?>assets/frontend/svg/illustrations/star-muted.svg" alt="Review rating">
                    </div>
                  </li>

                  <li class="d-flex align-items-center">
                    <h6 class="mb-0">Value</h6>

                    <div class="d-flex ml-auto">
                      <img class="avatar avatar-xss mr-1" src="<?= base_url();?>assets/frontend/svg/illustrations/star.svg" alt="Review rating">
                      <img class="avatar avatar-xss mr-1" src="<?= base_url();?>assets/frontend/svg/illustrations/star.svg" alt="Review rating">
                      <img class="avatar avatar-xss mr-1" src="<?= base_url();?>assets/frontend/svg/illustrations/star.svg" alt="Review rating">
                      <img class="avatar avatar-xss mr-1" src="<?= base_url();?>assets/frontend/svg/illustrations/star-muted.svg" alt="Review rating">
                      <img class="avatar avatar-xss mr-1" src="<?= base_url();?>assets/frontend/svg/illustrations/star-muted.svg" alt="Review rating">
                    </div>
                  </li>
                </ul>
                <!-- End Accessibility List -->
              </div>
            </div>
            <!-- End Row -->

            <hr class="my-6">

            <h4 class="mb-1">Estimated running costs</h4>
            <p class="small">Based on available 3rd party data</p>

            <div class="row">
              <div class="col-md-6">
                <span class="h1">&#163;810</span>
                <p>Approximate costs per month</p>
              </div>

              <div class="col-md-6">
                <dl class="row">
                  <dt class="col-sm-6 text-dark">
                    <i class="fas fa-hand-holding-usd nav-icon"></i> Mortgage
                  </dt>
                  <dd class="col-sm-6 text-sm-right">&#163;700 p/m</dd>

                  <dt class="col-sm-6 text-dark">
                    <i class="fas fa-burn nav-icon"></i> Energy
                  </dt>
                  <dd class="col-sm-6 text-sm-right">from &#163;72 p/m</dd>

                  <dt class="col-sm-6 text-dark">
                    <i class="fas fa-tint nav-icon"></i> Water
                  </dt>
                  <dd class="col-sm-6 text-sm-right">
                    from &#163;38 p/m
                  </dd>

                  <dt class="col-sm-6 text-dark">
                    <i class="fas fa-shield-alt nav-icon"></i> Home insurance
                  </dt>
                  <dd class="col-sm-6 text-sm-right">not known</dd>
                </dl>
                <!-- End Row -->
              </div>
            </div>
            <!-- End Row -->
          </div>

          <div class="tab-pane fade mt-6" id="property-floorplan" role="tabpanel" aria-labelledby="property-floorplan-tab">
            <!-- Gallery -->
            <a class="js-fancybox media-viewer" href="javascript:;"
              data-hs-fancybox-options='{
                "src": "<?= base_url();?>assets/frontend/img/others/img1.png",
                "fancybox": "fancyboxGalleryFloorPlan",
                "caption": "Front in frames - image #01",
                "speed": 700,
                "loop": true
              }'>
              <img class="img-fluid" src="<?= base_url();?>assets/frontend/img/others/img1.png" alt="Image Description">
            </a>
            <!-- End Gallery -->

            <small class="form-text">Image source from <a href="https://floorplanner.com/" target="_blank">floorplanner.com</a></small>
          </div>

          <div class="tab-pane fade mt-6" id="property-market-stats" role="tabpanel" aria-labelledby="property-market-stats-tab">
            <!-- Stats -->
            <div class="mb-5">
              <h5>Sale activity</h5>
              <p>Average estimated value for a flat in HG2:</p>

              <h3 class="text-primary mb-0">&#163;271,401</h3>
              <i class="fas fa-angle-down text-danger"></i>
              <span>&#163;7,710  (-2.762%)</span>
              <small class="text-muted ml-1">Over the last 12 months</small>
            </div>
            <!-- End Stats -->

            <!-- Stats -->
            <div class="mb-5">
              <h5>In the last 12 months</h5>

              <div class="row justify-content-sm-between">
                <div class="col-sm-6">
                  <span class="d-block">Average sale price</span>
                  <h3 class="text-primary mb-0">&#163;267,606</h3>
                </div>

                <div class="col-sm-6">
                  <span class="d-block">Properties sold</span>
                  <h3 class="text-primary mb-0">51</h3>
                </div>
              </div>
              <!-- End Row -->
            </div>
            <!-- End Stats -->
          </div>
        </div>
        <!-- End Tab Content -->
        <!-- End Row -->
      </div>

      <div id="stickyBlockStartPoint" class="col-lg-4">
        <!-- Contact Form -->
        <div class="js-sticky-block card card-bordered"
          data-hs-sticky-block-options='{
            "parentSelector": "#stickyBlockStartPoint",
            "breakpoint": "lg",
            "startPoint": "#stickyBlockStartPoint",
            "endPoint": "#stickyBlockEndPoint",
            "stickyOffsetTop": 24,
            "stickyOffsetBottom": 0
          }'>
          <div class="card-body">
            <!-- Header -->
            <div class="media align-items-center mb-4">
              <div class="avatar avatar-circle mr-3">
                <img class="avatar-img" src="<?= base_url();?>assets/frontend/img/100x100/img8.jpg" alt="Image Description">
              </div>
              <div class="media-body">
                <h4 class="mb-0">Pendaftaran Kompetisi</h4>
              </div>
            </div>
            <!-- End Header -->

            <!-- Form -->
            <form>

              <button type="button" class="btn btn-block btn-sm btn-primary btn-wide transition-3d-hover">Daftarkan diri</button>
            </form>
            <!-- End Form -->
          </div>

          <hr>

          <h4 class="mb-4 px-4">Contact person / Humas</h4>

          <!-- Media -->
          <div class="media mb-4 px-4">
            <span class="avatar avatar-lg avatar-soft-danger avatar-circle mr-3">
              <span class="avatar-initials">KP</span>
            </span>

            <div class="media-body">
              <h4 class="mb-1">
                <a class="text-dark" href="#">Keystones Property</a>
              </h4>

              <span class="d-block font-size-1 mb-1">
                <i class="fas fa-phone mr-1"></i>
                +1 822 012 3281
              </span>
              <a class="link" href="#">Contact</a>
            </div>
          </div>
          <!-- End Media -->

          <!-- End Contact Form -->
        </div>
      </div>
    </div>
  <!-- End Row -->

  <!-- Sticky Block End Point -->
  <div id="stickyBlockEndPoint"></div>
</div>
<!-- End Property Description Section -->

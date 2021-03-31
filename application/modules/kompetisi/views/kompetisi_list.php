<!-- Hero Section -->
<div class="container space-top-3 space-bottom-2 space-top-lg-3">
  <div class="bg-primary rounded-lg" style="background: url(<?= base_url();?>assets/frontend/svg/illustrations/book.svg) right bottom no-repeat;">
    <div class="w-lg-50">
      <div class="py-8 px-6">
        <h1 class="display-4 text-white">Kompetisi</h1>
        <p class="text-white mb-0">Pilih dari <span class="font-weight-bold"></span> kompetisi yang ingin kamu pilih.</p>
      </div>
    </div>
  </div>
</div>
<!-- End Hero Section -->

<!-- Kompetisi Section -->
<div class="container space-bottom-2 space-bottom-lg-3">
  <div class="row">
    <div class="col-lg-12">
      <!-- Title and Sort -->
      <div class="row align-items-sm-center">
        <div class="col-sm mb-3 mb-sm-0">
          <h3 class="mb-0">90 kompetisi</h3>
        </div>

        <div class="col-sm-auto">
          <div class="d-flex align-items-center">
            <span class="font-size-1 mr-2">Sort by:</span>

              <!-- Select -->
              <div id="sortBySelect" class="select2-custom select2-custom-sm-right mr-3">
                <select class="js-custom-select custom-select-sm" style="opacity: 0;"
                        data-hs-select2-options='{
                          "dropdownParent": "#sortBySelect",
                          "minimumResultsForSearch": "Infinity",
                          "customClass": "custom-select custom-select-sm",
                          "dropdownAutoWidth": true,
                          "dropdownWidth": "12rem"
                        }'>
                  <option value="Tanggal" selected>Tanggal</option>
                  <option value="Peserta">Peserta</option>
                </select>
              </div>
              <!-- End Select -->

            <!-- Nav -->
            <ul class="nav nav-segment">
              <li class="list-inline-item">
                <a class="nav-link" href="<?= site_url('kompetisi') ?>">
                  <i class="fas fa-th-large"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="nav-link active" href="<?= site_url('kompetisi-list') ?>">
                  <i class="fas fa-list"></i>
                </a>
              </li>
            </ul>
            <!-- End Nav -->
          </div>
        </div>
      </div>
      <!-- End Title and Sort -->

      <hr class="my-4">

      <!-- Card -->
      <div class="card card-bordered card-hover-shadow mb-5">
        <div class="card-body">
          <!-- Media -->
          <div class="d-sm-flex">
            <div class="media align-items-center align-items-sm-start mb-3">
              <img class="avatar avatar-sm mr-3" src="<?= base_url();?>assets/frontend/svg/brands/mailchimp.svg" alt="Image Description">
              <div class="media-body d-sm-none">
                <h6 class="mb-0">
                  <a class="text-dark" href="employer.html">Mailchimp</a>
                  <img class="avatar avatar-xss ml-1" src="<?= base_url();?>assets/frontend/svg/illustrations/top-vendor.svg" alt="Review rating" data-toggle="tooltip" data-placement="top" title="Claimed profile">
                </h6>
              </div>
            </div>

            <div class="media-body">
              <div class="row">
                <div class="col col-md-8">
                  <h3 class="mb-0">
                    <a class="text-dark" href="job-overview.html">Senior B2B sales consultant</a>
                  </h3>
                  <div class="d-none d-sm-inline-block">
                    <h6 class="mb-0">
                      <a class="text-dark" href="employer.html">Mailchimp</a>
                      <img class="avatar avatar-xss ml-1" src="<?= base_url();?>assets/frontend/svg/illustrations/top-vendor.svg" alt="Review rating" data-toggle="tooltip" data-placement="top" title="Claimed profile">
                    </h6>
                  </div>
                </div>

                <div class="col-auto order-md-3">
                  <!-- Checkbbox Bookmark -->
                  <div class="custom-control custom-checkbox-bookmark">
                    <input type="checkbox" id="checkboxBookmark1" class="custom-control-input custom-checkbox-bookmark-input">
                    <label class="custom-checkbox-bookmark-label" for="checkboxBookmark1">
                      <span class="custom-checkbox-bookmark-default" data-toggle="tooltip" data-placement="top" title="Save this job">
                        <i class="far fa-star"></i>
                      </span>
                      <span class="custom-checkbox-bookmark-active" data-toggle="tooltip" data-placement="top" title="Saved">
                        <i class="fas fa-star"></i>
                      </span>
                    </label>
                  </div>
                  <!-- End Checkbbox Bookmark -->
                </div>

                <div class="col-12 col-md mt-3 mt-md-0">
                  <span class="d-block font-size-1 text-body mb-1">$125k-$135k yearly</span>

                  <span class="badge badge-soft-info mr-2">
                    <span class="legend-indicator bg-info"></span>Remote
                  </span>
                </div>
              </div>
              <!-- End Row -->
            </div>
          </div>
          <!-- End Media -->
        </div>

        <div class="card-footer">
          <ul class="list-inline list-separator small text-body">
            <li class="list-inline-item">Posted 7 hours ago</li>
            <li class="list-inline-item">Oxford</li>
            <li class="list-inline-item">Full time</li>
          </ul>
        </div>
      </div>
      <!-- End Card -->

      <!-- Pagination -->
      <div class="d-flex justify-content-between align-items-center mt-7">
        <nav aria-label="Page navigation">
          <ul class="pagination mb-0">
            <li class="page-item ml-0">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="#">9</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
              </a>
            </li>
          </ul>
        </nav>

        <small class="d-none d-sm-inline-block text-body">Page 1 out of 9</small>
      </div>
      <!-- End Pagination -->
    </div>
  </div>
</div>
<!-- End Kompetisi Section -->

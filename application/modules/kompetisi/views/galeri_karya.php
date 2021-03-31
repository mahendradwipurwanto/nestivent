<!-- Title Section -->
<div class="container space-top-3 space-top-lg-3">
  <div class="row align-items-center">
    <div class="col-sm mb-3 mb-sm-0">
      <span class="font-size-1">128 karya</span>
      <h1 class="h2 mb-0">Galeri karya kompetisi - <b>A</b> </h1>
    </div>

    <div class="col-sm-auto">
      <!-- Select -->
      <div id="sortBySelect" class="select2-custom select2-custom-sm-right">
        <select class="js-custom-select custom-select-sm" style="opacity: 0;"
                data-hs-select2-options='{
                  "dropdownParent": "#sortBySelect",
                  "minimumResultsForSearch": "Infinity",
                  "customClass": "custom-select custom-select-sm",
                  "dropdownAutoWidth": true,
                  "dropdownWidth": "12rem"
                }'>
          <option value="Terbaru" selected>Terbaru</option>
          <option value="Peserta">Peserta</option>
        </select>
      </div>
      <!-- End Select -->
    </div>
  </div>
  <!-- End Row -->
</div>
<!-- End Title Section -->

<!-- List of Properties Section -->
<div class="container space-1 space-bottom-2 space-bottom-lg-3">
  <div class="row">
    <div class="col-sm-6 col-lg-4 mb-5">
      <!-- Karya Item -->
      <a id="fancyboxGallery1" class="js-fancybox card card-no-gutters h-100" href="property-description.html"
         data-hs-fancybox-options='{
           "selector": "#fancyboxGallery1 .js-fancybox-item"
         }'>
        <!-- Gallery -->
        <div class="js-fancybox-item media-viewer"
           data-src="<?= base_url();?>assets/frontend/img/1920x1080/img19.jpg"
           data-caption="Front in frames - image #01">
          <img class="img-fluid rounded-lg" src="<?= base_url();?>assets/frontend/img/480x320/img23.jpg" alt="Image Description">

          <div class="position-absolute bottom-0 right-0 pb-2 pr-2">
            <span class="btn btn-xs btn-icon btn-light">
              <i class="fas fa-images"></i>
            </span>
          </div>
        </div>

        <img class="js-fancybox-item d-none" alt="Image Description"
             data-src="<?= base_url();?>assets/frontend/img/1920x1080/img20.jpg"
             data-caption="Front in frames - image #02">
        <img class="js-fancybox-item d-none" alt="Image Description"
             data-src="<?= base_url();?>assets/frontend/img/1920x1080/img17.jpg"
             data-caption="Front in frames - image #03">
        <img class="js-fancybox-item d-none" alt="Image Description"
             data-src="<?= base_url();?>assets/frontend/img/1920x1080/img16.jpg"
             data-caption="Front in frames - image #04">
        <!-- End Gallery -->

        <!-- Body -->
        <div class="card-body">
          <span class="d-block font-size-1 text-body">For sale</span>

          <div class="row align-items-center">
            <div class="col">
              <h4 class="text-hover-primary">Borrett Close, London</h4>
            </div>
            <div class="col-auto">
              <h3 class="text-primary">&#163;689,000</h3>
            </div>
          </div>

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
        <!-- End Body -->
      </a>
      <!-- End Karya Item -->
    </div>

  </div>
  <!-- End Row -->

  <!-- Pagination -->
  <div class="d-flex justify-content-between align-items-center mt-3">
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
<!-- End List of Properties Section -->

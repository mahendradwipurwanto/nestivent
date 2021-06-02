<!-- ========== FOOTER ========== -->
<footer class="bg-dark">
  <div class="container">
    <div class="space-top-2 space-bottom-1 space-bottom-lg-2">
      <div class="row justify-content-lg-between">
        <div class="col-lg-6 ml-lg-auto mb-5 mb-lg-0">
          <!-- Logo -->
          <div class="mb-4">
            <a href="<?= base_url() ?>" aria-label="Front">
              <img class="brand img-12-5" src="<?= base_url();?>assets/logo-in.png" alt="Logo">
            </a>
          </div>
          <!-- End Logo -->

          <!-- Nav Link -->
          <ul class="nav nav-sm nav-x-0 nav-white flex-column">
            <li class="nav-item">
              <a class="nav-link media" href="javascript:;">
                  <span class="media">
                    <span class="fas fa-location-arrow mt-1 mr-2"></span>
                    <span class="media-body">
                      Kota Malang, Jawa Timur - Indonesia
                    </span>
                  </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link media" href="tel:1-062-109-9222">
                  <span class="media">
                    <span class="fas fa-phone-alt mt-1 mr-2"></span>
                    <span class="media-body">
                      +1 (062) 109-9222
                    </span>
                  </span>
              </a>
            </li>
          </ul>
          <!-- End Nav Link -->
        </div>

        <div class="col-6 col-md-3 col-lg mb-5 mb-lg-0">
          <h5 class="text-white">Company</h5>

          <!-- Nav Link -->
          <ul class="nav nav-sm nav-x-0 nav-white flex-column">
            <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= site_url('about-us') ?>">About Us</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= site_url('careers') ?>">Careers <span class="badge badge-primary ml-1">We're hiring</span></a></li>
            <li class="nav-item"><a class="nav-link" href="<?= site_url('blog') ?>">Blog</a></li>
          </ul>
          <!-- End Nav Link -->
        </div>

        <div class="col-6 col-md-3 col-lg">
          <h5 class="text-white">Documentation</h5>
          <!-- Nav Link -->
          <ul class="nav nav-sm nav-x-0 nav-white flex-column">
            <li class="nav-item"><a class="nav-link" href="<?= site_url('pusat-bantuan') ?>">Pusat Bantuan</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= site_url('contact-us') ?>">Contact Us</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= site_url('api-reference') ?>">API Reference</a></li>
          </ul>
          <!-- End Nav Link -->
        </div>
      </div>
    </div>

    <hr class="opacity-xs my-0">

    <div class="space-1">
      <div class="row align-items-md-center mb-7">
        <div class="col-md-6 mb-4 mb-md-0">
          <!-- Nav Link -->
          <ul class="nav nav-sm nav-white nav-x-sm align-items-center">
            <li class="nav-item">
              <a class="nav-link" href="<?= site_url('privacy-policy') ?>">Privacy &amp; Policy</a>
            </li>
            <li class="nav-item opacity mx-3">&#47;</li>
            <li class="nav-item">
              <a class="nav-link" href="<?= site_url('term-of-service') ?>">Terms of Service</a>
            </li>
          </ul>
          <!-- End Nav Link -->
        </div>

        <div class="col-md-6 text-md-right">
          <ul class="list-inline mb-0">
            <!-- Social Networks -->
            <li class="list-inline-item">
              <a class="btn btn-xs btn-icon btn-soft-light" href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn btn-xs btn-icon btn-soft-light" href="#">
                <i class="fab fa-google"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn btn-xs btn-icon btn-soft-light" href="#">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn btn-xs btn-icon btn-soft-light" href="#">
                <i class="fab fa-github"></i>
              </a>
            </li>
            <!-- End Social Networks -->
          </ul>
        </div>
      </div>

      <!-- Copyright -->
      <div class="w-md-75 text-lg-center mx-lg-auto">
        <p class="text-white opacity-sm small">&copy; Nestivent. 2021 by CreativeCrew. All rights reserved.</p>
        <p class="text-white opacity-sm small">When you visit or interact with our sites, services or tools, we or our authorised service providers may use cookies for storing information to help provide you with a better, faster and safer experience and for marketing purposes.</p>
      </div>
      <!-- End Copyright -->
    </div>
  </div>
</footer>
<!-- ========== END FOOTER ========== -->

<!-- Go to Top -->
<a class="js-go-to go-to position-fixed" href="javascript:;" style="visibility: hidden;"
   data-hs-go-to-options='{
     "offsetTop": 700,
     "position": {
       "init": {
         "right": 15
       },
       "show": {
         "bottom": 15
       },
       "hide": {
         "bottom": -15
       }
     }
   }'>
  <i class="fas fa-angle-up"></i>
</a>
<!-- End Go to Top -->

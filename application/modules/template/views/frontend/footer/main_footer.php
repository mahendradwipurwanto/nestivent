<!-- ========== FOOTER ========== -->
<footer class="bg-dark">
  <div class="container">
    <div class="space-top-2 space-bottom-1 space-bottom-lg-2">
      <div class="row justify-content-lg-between">
        <div class="col-lg-6 ml-lg-auto mb-5 mb-lg-0">
          <!-- Logo -->
          <div class="mb-4">
            <a href="<?= base_url() ?>" aria-label="<?= $WEB_JUDUL;?>">
              <img class="brand img-12-5" src="<?= base_url();?>assets/<?= $LOGO_WHITE;?>" alt="Logo">
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
                    <div class="row">
                      <div class="col-md-8">
                        <?= $WEB_DESKRIPSI;?></br>
                        Kota Malang, Jawa Timur - Indonesia
                      </div>
                    </div>
                  </span>
                </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link media" href="tel:+62<?= $WEB_WA;?>">
                <span class="media">
                  <span class="fas fa-whatsapp mt-1 mr-2"></span>
                  <span class="media-body">
                    +62<?= $WEB_WA;?>
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
          </ul>
          <!-- End Nav Link -->
        </div>

        <div class="col-6 col-md-3 col-lg">
          <h5 class="text-white">Documentation</h5>
          <!-- Nav Link -->
          <ul class="nav nav-sm nav-x-0 nav-white flex-column">
            <li class="nav-item"><a class="nav-link" href="<?= site_url('pusat-bantuan') ?>">Pusat Bantuan</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= site_url('contact-us') ?>">Contact Us</a></li>
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
            <?php if ($LN_FACEBOOK != null) :?>
              <!-- Social Networks -->
              <li class="list-inline-item">
                <a class="btn btn-xs btn-icon btn-soft-light" href="<?= prep_url($LN_FACEBOOK);?>">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
            <?php endif;?>
            <?php if ($LN_INSTAGRAM != null) :?>
              <li class="list-inline-item">
                <a class="btn btn-xs btn-icon btn-soft-light" href="<?= prep_url($LN_INSTAGRAM);?>">
                  <i class="fab fa-instagram"></i>
                </a>
              </li>
            <?php endif;?>
            <?php if ($LN_TWITTER != null) :?>
              <li class="list-inline-item">
                <a class="btn btn-xs btn-icon btn-soft-light" href="<?= prep_url($LN_TWITTER);?>">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
            <?php endif;?>
            <?php if ($LN_GITHUB != null) :?>
              <li class="list-inline-item">
                <a class="btn btn-xs btn-icon btn-soft-light" href="<?php prep_url($LN_GITHUB);?>">
                  <i class="fab fa-youtube"></i>
                </a>
              </li>
            <?php endif;?>
            <!-- End Social Networks -->
          </ul>
        </div>
      </div>

      <!-- Copyright -->
      <div class="w-md-75 text-lg-center mx-lg-auto">
        <p class="text-white opacity-sm small">&copy; <?= $WEB_JUDUL;?>. 2021 by CreativeCrew. All rights reserved.</p>
        <p class="text-white opacity-sm small">When you visit or interact with our sites, services or tools, we or our authorised service providers may use cookies for storing information to help provide you with a better, faster and safer experience and for marketing purposes.</p>
      </div>
      <!-- End Copyright -->
    </div>
  </div>
</footer>
<!-- ========== END FOOTER ========== -->

<!-- ========== SECONDARY CONTENTS ========== -->

<?php if ($this->input->cookie('cookie_agrement', TRUE)) {?>

  <!-- Cookie Alert -->
  <div class="container position-fixed bottom-0 right-0 left-0 z-index-4">
    <div class="alert bg-white w-lg-80 border shadow-sm mx-auto" role="alert">
      <h5 class="text-dark">Cookie preferences</h5>
      <p class="small"><span class="font-weight-bold">Note!</span>This website uses the following types of cookies; strictly necessary, functional and visitor statistics cookies to ensure you get the best experience on our website.</p>

      <div class="row align-items-sm-center">
        <div class="col-sm-8 mb-3 mb-sm-0">
          <div class="custom-control custom-checkbox custom-control-inline text-muted">
            <input type="checkbox" class="custom-control-input" id="defaultCheckbox" checked disabled>
            <label class="custom-control-label" for="defaultCheckbox">
              <small>Strictly necessary</small>
            </label>
          </div>

          <div class="custom-control custom-checkbox custom-control-inline text-muted">
            <input type="checkbox" class="custom-control-input" id="functionalCheckbox" checked disabled>
            <label class="custom-control-label" for="functionalCheckbox">
              <small>Functional</small>
            </label>
          </div>

          <div class="custom-control custom-checkbox custom-control-inline text-muted">
            <input type="checkbox" class="custom-control-input" id="visitorStatisticsCheckbox" checked disabled>
            <label class="custom-control-label" for="visitorStatisticsCheckbox">
              <small>Visitor statistics</small>
            </label>
          </div>
        </div>

        <div class="col-sm-4 text-sm-right">
          <a href="<?= site_url("agree-cookies") ?>" class="btn btn-sm btn-primary transition-3d-hover" data-dismiss="alert" aria-label="Close">Got it!</a>
        </div>
      </div>
    </div>
  </div>
  <!-- End Cookie Alert -->

<?php } ?>

<!-- ========== END SECONDARY CONTENTS ========== -->

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

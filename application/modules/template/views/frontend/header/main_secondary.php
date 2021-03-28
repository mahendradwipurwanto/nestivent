<!-- Secondary Content -->
<div class="navbar-nav-wrap-content text-center">
  
  <!-- Button -->
  <div class="hs-unfold">
    <a class="js-hs-unfold-invoker btn btn-sm btn-outline-primary" href="javascript:;"
      data-hs-unfold-options='{
        "target": "#signUpDropdown",
        "type": "css-animation",
        "animationIn": "slideInUp"
      }'>
      Daftar <i class="fas fa-angle-down ml-1"></i>
    </a>

    <div id="signUpDropdown" class="hs-unfold-content dropdown-menu dropdown-menu-right py-0" style="min-width: 350px;">
      <div class="card p-5">
        <form class="js-validate">

          <!-- Signup -->
          <div id="daftar" style="display: none; opacity: 0;">
            <!-- Title -->
            <div class="text-center mb-7">
              <h3 class="mb-0">Buat akun</h3>
              <p>Pilih tipe akun untuk didaftarkan.</p>
            </div>
            <!-- End Title -->

            <div class="hs-mega-menu dropdown-menu" aria-labelledby="kegiatanMegaMenu" style="min-width: 330px;">
              <!-- Kegiatan Item -->
              <div class="navbar-promo-item">
                <a class="navbar-promo-link" href="">
                  <div class="media align-items-center">
                    <img class="navbar-promo-icon" src="<?= base_url();?>assets/frontend/svg/icons/icon-2.svg" alt="SVG">
                    <div class="media-body">
                      <span class="navbar-promo-title">
                        Kompetisi
                        <span class="badge badge-secondary badge-pill ml-1">Starred</span>
                      </span>
                      <small class="navbar-promo-text">Kegiatan kompetisi</small>
                    </div>
                  </div>
                </a>
              </div>
              <!-- End Kegiatan Item -->

              <!-- Kegiatan Item -->
              <div class="navbar-promo-item">
                <a class="navbar-promo-link" href="">
                  <div class="media align-items-center">
                    <img class="navbar-promo-icon" src="<?= base_url();?>assets/frontend/svg/icons/icon-1.svg" alt="SVG">
                    <div class="media-body">
                      <span class="navbar-promo-title">Event</span>
                      <small class="navbar-promo-text">Event (Seminar, Workshop)</small>
                    </div>
                  </div>
                </a>
              </div>
              <!-- End Kegiatan Item -->
            </div>

          </div>
          <!-- End Signup -->
          <!-- Login -->
          <div id="login">
            <!-- Title -->
            <div class="text-center mb-7">
              <h3 class="mb-0">Sign In to Front</h3>
              <p>Login to manage your account.</p>
            </div>
            <!-- End Title -->

            <!-- Input Group -->
            <div class="js-form-message mb-4">
              <label class="input-label">Email</label>
              <div class="input-group input-group-sm mb-2">
                <input type="email" class="form-control" name="email" id="signinEmail" placeholder="Email" aria-label="Email" required
                data-msg="Please enter a valid email address.">
              </div>
            </div>
            <!-- End Input Group -->

            <!-- Input Group -->
            <div class="js-form-message mb-3">
              <label class="input-label">Password</label>
              <div class="input-group input-group-sm mb-2">
                <input type="password" class="form-control" name="password" id="signinPassword" placeholder="Password" aria-label="Password" required
                data-msg="Your password is invalid. Please try again.">
              </div>
            </div>
            <!-- End Input Group -->

            <div class="d-flex justify-content-end mb-4">
              <a class="js-animation-link font-size-1 link-underline" href="<?= site_url('lupa-password') ?>">Lupa password?</a>
            </div>

            <div class="mb-3">
              <button type="submit" class="btn btn-sm btn-primary btn-block">Login</button>
            </div>

            <div class="text-center">
              <span class="font-size-1 text-muted">Belum punya akun?</span>
              <a class="js-animation-link font-size-1 font-weight-bold" href="javascript:;"
                data-hs-show-animation-options='{
                  "targetSelector": "#daftar",
                  "groupName": "idForm"
                }'>Daftar
              </a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<!-- End Button -->
</div>
<!-- End Secondary Content -->

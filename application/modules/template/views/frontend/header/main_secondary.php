<!-- Secondary Content -->
<div class="navbar-nav-wrap-content text-center">
  <?php if (!$this->session->userdata('logged_in')) { ?>
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
      <div class="card p-3 pt-5 pb-5">
        <form class="js-validate">

          <!-- Signup -->
          <div id="daftar">
            <!-- Title -->
            <div class="text-center mb-2">
              <h3 class="mb-0">Buat akun</h3>
              <p>Pilih tipe akun untuk didaftarkan.</p>
            </div>
            <!-- End Title -->

            <!-- Kegiatan Item -->
            <div class="navbar-promo-item">
              <a class="navbar-promo-link" href="<?= site_url('pendaftaran/pengguna') ?>">
                <div class="media align-items-center">
                  <img class="navbar-promo-icon" src="<?= base_url();?>assets/frontend/svg/icons/icon-18.svg" alt="SVG">
                  <div class="media-body">
                    <span class="navbar-promo-title">
                      pengguna
                    </span>
                    <small class="navbar-promo-text">Daftar sebagai pengguna</small>
                  </div>
                </div>
              </a>
            </div>
            <!-- End Kegiatan Item -->

            <!-- Kegiatan Item -->
            <div class="navbar-promo-item">
              <a class="navbar-promo-link" href="<?= site_url('pendaftaran/penyelenggara') ?>">
                <div class="media align-items-center">
                  <img class="navbar-promo-icon" src="<?= base_url();?>assets/frontend/svg/icons/icon-40.svg" alt="SVG">
                  <div class="media-body">
                    <span class="navbar-promo-title">Penyelenggara
                      <span class="badge badge-secondary badge-pill ml-1">STIKI</span>
                    </span>
                    <small class="navbar-promo-text">Elemen lembaga STIKI</small>
                  </div>
                </div>
              </a>
            </div>
            <!-- End Kegiatan Item -->

            <div class="text-center">
              <span class="font-size-1 text-muted">Sudah punya akun?</span>
              <a class="js-animation-link font-size-1 font-weight-bold" href="javascript:;"
              data-hs-show-animation-options='{
                "targetSelector": "#login",
                "groupName": "idForm"
              }'>Login
            </a>
          </div>

        </div>
        <!-- End Signup -->
      </form>
      <form class="js-validate" action="<?= site_url('authentication/proses_login') ?>" method="post">
        <!-- Login -->
        <div id="login" class="pr-2 pl-2" style="display: none; opacity: 0;">
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
<?php }else{ ?>
  <!-- Account -->
  <div class="hs-unfold ml-2">
    <a class="js-hs-unfold-invoker rounded-circle" href="javascript:;"
    data-hs-unfold-options='{
      "target": "#accountDropdown",
      "type": "css-animation",
      "event": "hover",
      "duration": 50,
      "delay": 0,
      "hideOnScroll": "true"
    }'>
    <span class="avatar avatar-xs avatar-circle">
      <?php if ($pFoto->PROFIL == null) {?>
        <img class="avatar-img" src="<?= base_url();?>assets/frontend/img/100x100/img12.jpg" alt="<?= $this->session->userdata('nama') ?>">
      <?php }else { ?>
        <img class="avatar-img" src="<?= base_url();?>berkas/pengguna/<?= $this->session->userdata('kode_user') ?>/foto/<?= $pFoto->PROFIL ?>" alt="<?= $this->session->userdata('nama') ?>">
      <?php } ?>
    </span>
  </a>

  <div id="accountDropdown" class="hs-unfold-content dropdown-menu dropdown-menu-sm-right dropdown-menu-no-border-on-mobile p-0" style="min-width: 245px;">
    <div class="card">
      <!-- Header -->
      <div class="card-header p-3">
        <?php if ($this->session->userdata('role') == 0): ?>
          <a class="media align-items-center" href="<?= base_url('admin') ?>">
            <div class="avatar mr-3">
              <?php if ($pFoto->PROFIL == null) {?>
                <img class="avatar-img" src="<?= base_url();?>assets/frontend/img/100x100/img12.jpg" alt="<?= $this->session->userdata('nama') ?>">
              <?php }else { ?>
                <img class="avatar-img" src="<?= base_url();?>berkas/admin/<?= $this->session->userdata('kode_user') ?>/foto/<?= $pFoto->PROFIL ?>" alt="<?= $this->session->userdata('nama') ?>">
              <?php } ?>
            </div>
            <div class="media-body">
              <span class="d-block font-weight-bold"><?php $nama = explode(" ", $this->session->userdata('nama')); echo $nama[0]; ?></span>
              <span class="d-block small text-muted">
                <?= mb_substr($this->session->userdata('email'), 0, 3) ?>***
                @<?php $mail = explode("@", $this->session->userdata('email')); echo $mail[1]; ?>
              </span>
            </div>
          </a>
        <?php elseif ($this->session->userdata('role') == 1) : ?>
          <a class="media align-items-center" href="<?= base_url('pengguna') ?>">
            <div class="avatar mr-3">
              <?php if ($pFoto->PROFIL == null) {?>
                <img class="avatar-img" src="<?= base_url();?>assets/frontend/img/100x100/img12.jpg" alt="<?= $this->session->userdata('nama') ?>">
              <?php }else { ?>
                <img class="avatar-img" src="<?= base_url();?>berkas/pengguna/<?= $this->session->userdata('kode_user') ?>/foto/<?= $pFoto->PROFIL ?>" alt="<?= $this->session->userdata('nama') ?>">
              <?php } ?>
            </div>
            <div class="media-body">
              <span class="d-block font-weight-bold"><?php $nama = explode(" ", $this->session->userdata('nama')); echo $nama[0]; ?></span>
              <span class="d-block small text-muted">
                <?= mb_substr($this->session->userdata('email'), 0, 3) ?>***
                @<?php $mail = explode("@", $this->session->userdata('email')); echo $mail[1]; ?>
              </span>
            </div>
          </a>
        <?php else: ?>
          <a class="media align-items-center" href="<?= base_url('juri') ?>">
            <div class="avatar mr-3">
              <?php if ($pFoto->PROFIL == null) {?>
                <img class="avatar-img" src="<?= base_url();?>assets/frontend/img/100x100/img12.jpg" alt="<?= $this->session->userdata('nama') ?>">
              <?php }else { ?>
                <img class="avatar-img" src="<?= base_url();?>berkas/juri/<?= $this->session->userdata('kode_user') ?>/foto/<?= $pFoto->PROFIL ?>" alt="<?= $this->session->userdata('nama') ?>">
              <?php } ?>
            </div>
            <div class="media-body">
              <span class="d-block font-weight-bold"><?php $nama = explode(" ", $this->session->userdata('nama')); echo $nama[0]; ?></span>
              <span class="d-block small text-muted">
                <?= mb_substr($this->session->userdata('email'), 0, 3) ?>***
                @<?php $mail = explode("@", $this->session->userdata('email')); echo $mail[1]; ?>
              </span>
            </div>
          </a>
        <?php endif; ?>
      </div>
      <!-- End Header -->

      <!-- Body -->
      <div class="card-body py-3">
        <?php if ($this->session->userdata('role') == 0): ?>
          <a class="dropdown-item px-0" href="<?= base_url('admin') ?>">
            <span class="dropdown-item-icon">
              <i class="fas fa-user"></i>
            </span> Dashboard
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item px-0" href="<?= site_url('logout') ?>">
            <span class="dropdown-item-icon">
              <i class="fas fa-power-off"></i>
            </span> Log out
          </a>
        <?php elseif ($this->session->userdata('role') == 1) : ?>
          <a class="dropdown-item px-0" href="<?= base_url('pengguna') ?>">
            <span class="dropdown-item-icon">
              <i class="fas fa-user"></i>
            </span> Akun
          </a>
          <?php if ($kPanel == TRUE) { ?>
            <a class="dropdown-item px-0" href="#">
              <span class="dropdown-item-icon">
                <i class="fas fa-comments"></i>
              </span> K-Panel
            </a>
          <?php } ?>

          <div class="dropdown-divider"></div>

          <a class="dropdown-item px-0" href="<?= site_url('pengguna/pengaturan') ?>">
            <span class="dropdown-item-icon">
              <i class="fas fa-question-circle"></i>
            </span> Pengaturan
          </a>
          <a class="dropdown-item px-0" href="<?= site_url('logout') ?>">
            <span class="dropdown-item-icon">
              <i class="fas fa-power-off"></i>
            </span> Log out
          </a>
        <?php else: ?>
          <a class="dropdown-item px-0" href="<?= base_url('juri') ?>">
            <span class="dropdown-item-icon">
              <i class="fas fa-user"></i>
            </span> Akun
          </a>
          <a class="dropdown-item px-0" href="<?= base_url('juri/penilaian') ?>">
            <span class="dropdown-item-icon">
              <i class="fas fa-user"></i>
            </span> Penilaian
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item px-0" href="<?= site_url('logout') ?>">
            <span class="dropdown-item-icon">
              <i class="fas fa-power-off"></i>
            </span> Log out
          </a>
        <?php endif; ?>
      </div>
      <!-- End Body -->
    </div>
  </div>
</div>
<!-- End Account -->

<?php }?>
</div>
<!-- End Secondary Content -->

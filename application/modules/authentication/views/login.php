<!-- Login Form -->
    <div class="container space-2 space-lg-3">
      <form class="js-validate w-md-75 w-lg-50 mx-md-auto" action="<?= site_url('authentication/proses_login') ?>" method="post">
        <!-- Title -->
        <div class="mb-5 mb-md-7">
          <h1 class="h2 mb-0">Selamat datang kembali</h1>
          <p>Harap masukkan username & password anda untuk dapat melanjutkan.</p>
        </div>
        <!-- End Title -->

        <!-- Form Group -->
        <div class="js-form-message form-group">
          <label class="input-label" for="signinSrEmail">Email anda</label>
          <input type="email" class="form-control" name="email" id="signinSrEmail" placeholder="Email anda" aria-label="Email anda" required>
        </div>
        <!-- End Form Group -->

        <!-- Form Group -->
        <div class="js-form-message form-group">
          <label class="input-label" for="signinSrPassword">
            <span class="d-flex justify-content-between align-items-center">
              Password
              <a class="link-underline text-capitalize font-weight-normal" href="<?= site_url('lupa-password') ?>">lupa password?</a>
            </span>
          </label>
          <input type="password" class="form-control" name="password" id="signinSrPassword" placeholder="********" aria-label="********" required>
        </div>
        <!-- End Form Group -->

        <!-- Button -->
        <div class="row align-items-center mb-5">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <span class="font-size-1 text-muted">Belum terdaftar?</span>
            <a class="font-size-1 font-weight-bold" href="<?= site_url('pendaftaran?as=pengguna') ?>">Daftar sekarang</a>
          </div>

          <div class="col-sm-6 text-sm-right">
            <button type="submit" class="btn btn-primary btn-sm transition-3d-hover">Masuk Sekarang</button>
          </div>
        </div>
        <!-- End Button -->
      </form>
    </div>
    <!-- End Login Form -->

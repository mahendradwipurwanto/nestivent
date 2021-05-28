<!-- Login Form -->
<div class="container space-2 space-lg-3">
  <form class="js-validate w-md-75 w-lg-50 mx-md-auto" action="<?= site_url('authentication/reset_pass') ?>" method="post">
    <!-- Title -->
    <div class="mb-3 mb-md-5">
      <h1 class="h2 mb-0">Reset password akun anda</h1>
      <p class="text-muted">Harap masukkan password baru anda, untuk akun dengan email <b><?= $email ?></b> </p>
    </div>
    <!-- End Title -->
    <!-- Form Group -->
    <div class="js-form-message form-group">
      <label class="input-label" for="signinSrPassword">Password baru</label>
      <input type="password" class="form-control" name="password" minlength="6" id="signinSrPassword" placeholder="Password baru" aria-label="Email akun address" required
      data-msg="Harap masukkan password baru anda, minimal 6 karakter.">
      <small class="text-muted">Masukkan password baru untuk akun anda, minimal 6 karakter</small>
    </div>
    <!-- End Form Group -->

    <input type="hidden" name="email" value="<?= $email ?>">
    <input type="hidden" name="token" value="<?= $token ?>">

    <!-- Button -->
    <div class="row align-items-center mb-5">
      <div class="col-sm-6 mb-3 mb-sm-0">
        <a class="font-size-1 font-weight-bold" href="<?= site_url('login') ?>">
          <i class="fas fa-angle-left fa-sm mr-1"></i> Kembali ke laman login
        </a>
      </div>

      <div class="col-sm-6 text-sm-right">
        <button type="submit" class="btn btn-primary btn-sm transition-3d-hover">Reset password</button>
      </div>
    </div>
    <!-- End Button -->
  </form>
</div>
<!-- End Login Form -->

<!-- Login Form -->
<div class="container space-2 space-lg-3">
  <form class="js-validate w-md-75 w-lg-50 mx-md-auto" action="<?= site_url('authentication/proses_lupa') ?>" method="post">
    <!-- Title -->
    <div class="mb-5 mb-md-7">
      <h1 class="h2 mb-0">Ubah password anda?</h1>
      <p>Harap masukkan email akun anda yang telah terdaftar.</p>
    </div>
    <!-- End Title -->
    <!-- Form Group -->
    <div class="js-form-message form-group">
      <label class="input-label" for="signinSrEmail">Email anda</label>
      <input type="email" class="form-control" name="email" id="signinSrEmail" value="<?= $this->session->userdata('email') ?>" aria-label="Email akun address" required
      data-msg="Please enter a valid email address.">
      <small class="text-muted">Harap cek email anda yang telah anda masukkan, untuk dapat mengakses link ubah password anda. Ini biasanya membutuhkan 2 s/d 5 menit untuk link dapat masuk ke email anda</small>
    </div>
    <!-- End Form Group -->

    <!-- Button -->
    <div class="row align-items-center mb-5">
      <div class="col-sm-6 mb-3 mb-sm-0">
        <a class="font-size-1 font-weight-bold" href="<?= site_url('pengguna/pengaturan') ?>">
          <i class="fas fa-angle-left fa-sm mr-1"></i> Kembali ke laman pengguna
        </a>
      </div>

      <div class="col-sm-6 text-sm-right">
        <button type="submit" class="btn btn-primary btn-sm transition-3d-hover">Minta link ubah password akun</button>
      </div>
    </div>
    <!-- End Button -->
  </form>
</div>
<!-- End Login Form -->

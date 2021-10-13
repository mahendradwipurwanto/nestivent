<!-- Login Form -->
<div class="container space-2 space-lg-3">
  <!-- Hero Section -->
  <div class="w-md-80 w-lg-60 text-center mx-md-auto mb-5 mb-md-9">
    <h1>Buat akun</h1>
    <p>Pilih tipe akun untuk didaftarkan.</p>
  </div>

  <div class="row w-60 text-center mx-auto">
    <div class="col-md-6 mb-3 mb-md-0 mb-md-n11">
      <!-- Card -->
      <a class="card text-center h-100 transition-3d-hover" href="<?= site_url('pendaftaran?as=pengguna') ?>">
        <div class="card-body p-lg-5">
          <figure class="max-w-8rem w-100 mx-auto mb-4">
            <img class="img-fluid" src="<?= base_url();?>assets/frontend/svg/icons/icon-18.svg" alt="SVG">
          </figure>
          <h3 class="h4">Pengguna</h3>
          <p class="text-body mb-0">Daftar sebagai pengguna.</p>
        </div>
      </a>
      <!-- End Card -->
    </div>

    <div class="col-md-6 mb-3 mb-md-0 mb-md-n11">
      <!-- Card -->
      <a class="card text-center h-100 transition-3d-hover" href="<?= site_url('pengajuan-penyelenggara') ?>">
        <div class="card-body p-lg-5">
          <figure class="max-w-8rem w-100 mx-auto mb-4">
            <img class="img-fluid" src="<?= base_url();?>assets/frontend/svg/icons/icon-40.svg" alt="SVG">
          </figure>
          <h3 class="h4">Penyelenggara <span class="badge badge-secondary badge-pill ml-1">STIKI</span></h3>
          <p class="text-body mb-0">Elemen lembaga STIKI.</p>
        </div>
      </a>
      <!-- End Card -->
    </div>
  </div>
</div>
<!-- End Hero Section -->

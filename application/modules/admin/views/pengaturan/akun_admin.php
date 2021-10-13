<!-- Page Header -->
<div class="page-header">
  <div class="row align-items-end mb-3">
    <div class="col-sm">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-no-gutter">
          <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?= site_url('admin') ?>">Dashboard</a></li>
          <li class="breadcrumb-item" aria-current="page">Pengaturan</li>
          <li class="breadcrumb-item active" aria-current="page">Akun Admin</li>
        </ol>
      </nav>

      <h1 class="page-header-title">Pengaturan AKUN admin</h1>
    </div>
  </div>
  <!-- End Row -->
</div>
<!-- End Page Header -->

<div class="row">
  <div class="col-md-8">
    <div class="card card-frame card-frame-highlighted">
      <!-- Body -->
      <div class="card-body">
        <div class="row">
          <div class="col-md-9">
            <p class="setting-item">Ubah password akun admin.</p>
          </div>
          <div class="col-md-3">
            <button type="button" data-toggle="modal" data-target="#ubahPassword" class="btn btn-danger btn-sm btn-block transition-3d-hover">ubah password</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">

  </div>
</div>


<!-- ubah password Modal -->
<div class="modal fade bd-example-modal-sm"id="ubahPassword" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title h4" id="mySmallModalLabel">Ubah password akun admin</h5>
        <button type="button" class="btn btn-xs btn-icon btn-ghost-secondary" data-dismiss="modal" aria-label="Close">
          <i class="tio-clear tio-lg"></i>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('admin/ubah_passwordAdmin') ?>" method="POST">
          <div class="form-group mb-0">
            <input type="password" class="form-control form-control-sm" name="PASS_LAMA" placeholder="password lama" required>
          </div>
          <hr>
          <div class="form-group">
            <input type="password" class="form-control form-control-sm" name="PASS_BARU" minlength="4" placeholder="password baru" required>
          </div>
          <div class="form-group">
            <input type="password" class="form-control form-control-sm" name="CON_PASS" minlength="4" placeholder="konfirmasi password baru" required>
          </div>
          <button type="submit" class="btn btn-sm btn-success btn-block">Ubah Password</button>
        </form>
      </div>
    </div>
  </div>
</div>
    <!-- End ubah password Modal -->
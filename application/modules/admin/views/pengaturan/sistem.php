<!-- Page Header -->
<div class="page-header">
  <div class="row align-items-end mb-3">
    <div class="col-sm">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-no-gutter">
          <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?= site_url('admin') ?>">Dashboard</a></li>
          <li class="breadcrumb-item" aria-current="page">Pengaturan</li>
          <li class="breadcrumb-item active" aria-current="page">Sistem</li>
        </ol>
      </nav>

      <h1 class="page-header-title">Pengaturan Sistem</h1>
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

    <!-- Card -->
    <div class="card mb-3">
      <!-- Header -->
      <div class="card-header">
        <h5 class="card-header-title">Mailer</h5>
        <button type="button" data-toggle="modal" data-target="#ubahMailer" class="btn btn-xs btn-primary pull-right">manage</button>
      </div>
      <!-- End Header -->

      <!-- Body -->
      <div class="card-body">
        <ul class="list-unstyled list-unstyled-py-3 text-dark mb-3">
          <li class="py-0">
            <small class="card-subtitle">Mailer access</small>
          </li>

          <li>
            <i class="tio-usb-port nav-icon mr-1"></i>
            <?= $EM_HOST;?>
          </li>
          <li>
            <i class="tio-label-important nav-icon mr-1"></i>
            <?= $EM_USERNAME;?>
          </li>
          <li>
            <i class="tio-password nav-icon mr-1"></i>
            <?= str_repeat("*", strlen($EM_PASSWORD));?>
          </li>
        </ul>
      </div>
      <!-- End Body -->
    </div>
    <!-- End Card -->
  </div>
</div>


<!-- ubah password Modal -->
<div class="modal fade bd-example-modal-sm" id="ubahMailer" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title h4" id="mySmallModalLabel">Manage Mailer</h5>
        <button type="button" class="btn btn-xs btn-icon btn-ghost-secondary" data-dismiss="modal" aria-label="Close">
          <i class="tio-clear tio-lg"></i>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('admin/ubah_mailer') ?>" method="POST">
          <div class="form-group mb-0">
            <label class="input-label">HOST</label>
            <input type="text" class="form-control form-control-sm" name="EM_HOST" value="<?= $EM_HOST;?>" required>
          </div>
          <hr>
          <div class="form-group">
            <label class="input-label">USERNAME</label>
            <input type="text" class="form-control form-control-sm" name="EM_USERNAME" value="<?= $EM_USERNAME;?>" required>
          </div>
          <div class="form-group">
            <label class="input-label">PASSWORD</label>
            <input type="password" class="form-control form-control-sm" name="EM_PASSWORD" value="<?= $EM_PASSWORD;?>" required>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-success">Ubah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End ubah password Modal -->
<!-- Page Header -->
<div class="page-header">
  <div class="row align-items-end mb-3">
    <div class="col-sm">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-no-gutter">
          <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?= site_url('admin') ?>">Dashboard</a></li>
          <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?= site_url('k-panel/pengaturan') ?>">Pengaturan</a></li>
          <li class="breadcrumb-item active" aria-current="page">Kolabolator</li>
        </ol>
      </nav>

      <h1 class="page-header-title">Pengaturan Kolabolator <?= $this->session->userdata('penyelenggara_akses');?></h1>
    </div>
  </div>
  <!-- End Row -->
</div>
<!-- End Page Header -->
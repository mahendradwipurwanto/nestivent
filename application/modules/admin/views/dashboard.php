<!-- Page Header -->
<div class="page-header">
  <div class="row align-items-center">
    <div class="col-sm mb-2 mb-sm-0">
      <h1 class="page-header-title">Dashboard</h1>
    </div>

    <div class="col-sm-auto">
    </div>
  </div>
</div>
<!-- End Page Header -->

<!-- Stats -->
<div class="row gx-2 gx-lg-3">
  <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
    <!-- Card -->
    <a class="card card-hover-shadow h-100" href="<?= site_url('data-pengguna') ?>">
      <div class="card-body">
        <h6 class="card-subtitle">Total Pengguna</h6>

        <div class="row align-items-center gx-2 mb-1">
          <div class="col-8">
            <span class="card-title h2"><?= number_format($pengguna,0,",",".");?> </span>
          </div>
        </div>
        <!-- End Row -->

        <span class="badge badge-soft-<?= ($diffPengguna == $pengguna ? 'secondary' : ($diffPengguna < $pengguna ? 'success' : 'danger'));?>">
          <i class="<?= ($diffPengguna == $pengguna ? 'tio-voice-line' : ($diffPengguna < $pengguna ? 'tio-trending-up' : 'tio-trending-down'));?>"></i>
          <?= ($pengguna == 0 ? '0' : round(((($pengguna-$diffPengguna) / $pengguna) * 100), 1)) ?>%
        </span>
        <span class="text-body font-size-sm ml-1">dari <?= number_format($diffPengguna,0,",",".");?></span>
      </div>
    </a>
    <!-- End Card -->
  </div>
  <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
    <!-- Card -->
    <a class="card card-hover-shadow h-100" href="<?= site_url('data-penyelenggara') ?>">
      <div class="card-body">
        <h6 class="card-subtitle">Total Penyelenggara</h6>

        <div class="row align-items-center gx-2 mb-1">
          <div class="col-8">
            <span class="card-title h2"><?= number_format($penyelenggara,0,",",".");?></span>
          </div>
        </div>
        <!-- End Row -->

        <span class="badge badge-soft-<?= ($diffPenyelenggara == $penyelenggara ? 'secondary' : ($diffPenyelenggara < $penyelenggara ? 'success' : 'danger'));?>">
          <i class="<?= ($diffPenyelenggara == $penyelenggara ? 'tio-voice-line' : ($diffPenyelenggara < $penyelenggara ? 'tio-trending-up' : 'tio-trending-down'));?>"></i>
          <?= ($penyelenggara == 0 ? '0' : round(((($penyelenggara-$diffPenyelenggara) / $penyelenggara) * 100), 1)) ?>%
        </span>
        <span class="text-body font-size-sm ml-1">dari <?= number_format($diffPenyelenggara,0,",",".");?></span>
      </div>
    </a>
    <!-- End Card -->
  </div>
  <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
    <!-- Card -->
    <a class="card card-hover-shadow h-100" href="<?= site_url('data-kompetisi') ?>">
      <div class="card-body">
        <h6 class="card-subtitle">Total Kompetisi</h6>

        <div class="row align-items-center gx-2 mb-1">
          <div class="col-8">
            <span class="card-title h2"><?= number_format($kompetisi,0,",",".");?> </span>
          </div>
        </div>
        <!-- End Row -->

        <span class="badge badge-soft-<?= ($diffKompetisi == $kompetisi ? 'secondary' : ($diffKompetisi < $kompetisi ? 'success' : 'danger'));?>">
          <i class="<?= ($diffKompetisi == $kompetisi ? 'tio-voice-line' : ($diffKompetisi < $kompetisi ? 'tio-trending-up' : 'tio-trending-down'));?>"></i>
          <?= ($kompetisi == 0 ? '0' : round(((($kompetisi-$diffKompetisi) / $kompetisi) * 100), 1)) ?>%
        </span>
        <span class="text-body font-size-sm ml-1">dari <?= number_format($diffKompetisi,0,",",".");?></span>
      </div>
    </a>
    <!-- End Card -->
  </div>
  <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
    <!-- Card -->
    <a class="card card-hover-shadow h-100" href="<?= site_url('data-event') ?>">
      <div class="card-body">
        <h6 class="card-subtitle">Total Event</h6>

        <div class="row align-items-center gx-2 mb-1">
          <div class="col-8">
            <span class="card-title h2"><?= number_format($event,0,",",".");?></span>
          </div>
        </div>
        <!-- End Row -->

        <span class="badge badge-soft-<?= ($diffEvent == $event ? 'secondary' : ($diffEvent < $event ? 'success' : 'danger'));?>">
          <i class="<?= ($diffEvent == $event ? 'tio-voice-line' : ($diffEvent < $event ? 'tio-trending-up' : 'tio-trending-down'));?>"></i>
          <?= ($event == 0 ? '0' : round(((($event-$diffEvent) / $event) * 100), 1)) ?>%
        </span>
        <span class="text-body font-size-sm ml-1">dari <?= number_format($diffEvent,0,",",".");?></span>
      </div>
    </a>
    <!-- End Card -->
  </div>
</div>
<!-- End Stats -->

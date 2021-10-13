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
    <a class="card card-hover-shadow h-100" href="<?= site_url('k-panel/data-kompetisi') ?>">
      <div class="card-body">
        <h6 class="card-subtitle">Total Kompetisi</h6>

        <div class="row align-items-center gx-2 mb-1">
          <div class="col-8">
            <span class="card-title h2"><?= number_format($countKompetisi,0,",",".");?> </span>
          </div>
        </div>
        <!-- End Row -->

        <span class="badge badge-soft-<?= ($diffKompetisi == $countKompetisi ? 'secondary' : ($diffKompetisi < $countKompetisi ? 'success' : 'danger'));?>">
          <i class="<?= ($diffKompetisi == $countKompetisi ? 'tio-voice-line' : ($diffKompetisi < $countKompetisi ? 'tio-trending-up' : 'tio-trending-down'));?>"></i>
          <?= ($countKompetisi == 0 ? '0' : round(((($countKompetisi-$diffKompetisi) / $countKompetisi) * 100), 1)) ?>%
        </span>
        <span class="text-body font-size-sm ml-1">dari <?= number_format($diffKompetisi,0,",",".");?></span>
      </div>
    </a>
    <!-- End Card -->
  </div>
  <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
    <!-- Card -->
    <a class="card card-hover-shadow h-100" href="<?= site_url('k-panel/data-event') ?>">
      <div class="card-body">
        <h6 class="card-subtitle">Total Event</h6>

        <div class="row align-items-center gx-2 mb-1">
          <div class="col-8">
            <span class="card-title h2"><?= number_format($countEvent,0,",",".");?></span>
          </div>
        </div>
        <!-- End Row -->

        <span class="badge badge-soft-<?= ($diffEvent == $countEvent ? 'secondary' : ($diffEvent < $countEvent ? 'success' : 'danger'));?>">
          <i class="<?= ($diffEvent == $countEvent ? 'tio-voice-line' : ($diffEvent < $countEvent ? 'tio-trending-up' : 'tio-trending-down'));?>"></i>
          <?= ($countEvent == 0 ? '0' : round(((($countEvent-$diffEvent) / $countEvent) * 100), 1)) ?>%
        </span>
        <span class="text-body font-size-sm ml-1">dari <?= number_format($diffEvent,0,",",".");?></span>
      </div>
    </a>
    <!-- End Card -->
  </div>
</div>
<!-- End Stats -->



<div class="row">
  <div class="col-lg-4 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card h-100">
      <!-- Header -->
      <div class="card-header">
        <h4 class="card-header-title">Ratio kegiatan</h4>
      </div>
      <!-- End Header -->

      <!-- Body -->
      <div class="card-body text-center">

        <!-- Chart Half -->
        <div class="chartjs-doughnut-custom" style="height: 12rem;">
          <canvas class="js-chartjs-doughnut-half"
          data-hs-chartjs-options='{
          "type": "doughnut",
          "data": {
          "labels": ["Kompetisi", "Event"],
          "datasets": [{
          "data": [<?= $countKompetisi;?>, <?= $countEvent;?>],
          "backgroundColor": ["#377dff", "rgba(55,125,255,.35)"],
          "borderWidth": 4,
          "hoverBorderColor": "#ffffff"
        }]
      }
    }'></canvas>

    <div class="chartjs-doughnut-custom-stat">
      <small class="text-cap">Total kegiatan</small>
      <span class="h1"><?= $countKompetisi+$countEvent;?></span>
    </div>
  </div>
  <!-- End Chart Half -->

  <hr>

  <div class="row">
    <div class="col text-right">
      <span class="d-block h4 text-primary mb-0">
        <i class="<?= ($diffKompetisi == $countKompetisi ? 'tio-voice-line' : ($diffKompetisi < $countKompetisi ? 'tio-trending-up' : 'tio-trending-down'));?>"></i><?= $newKompetisi;?>
      </span>
      <span class="d-block">Kompetisi terbaru</span>
    </div>

    <div class="col column-divider text-left">
      <span class="d-block h4 text-success mb-0">
        <i class="<?= ($diffEvent == $countEvent ? 'tio-voice-line' : ($diffEvent < $countEvent ? 'tio-trending-up' : 'tio-trending-down'));?>"></i> <?= $newEvent;?>
      </span>
      <span class="d-block">Event terbaru</span>
    </div>
  </div>
  <!-- End Row -->
</div>
<!-- End Body -->
</div>
<!-- End Card -->
</div>

<div class="col-lg-8 mb-3 mb-lg-5">
  <!-- Card -->
  <div class="card h-100">
    <!-- Header -->
    <div class="card-header">
      <h4 class="card-header-title">Kegiatan terbaru</h4>
    </div>
    <!-- End Header -->

    <!-- Body -->
    <div class="card-body card-body-height">
      <ul class="list-group list-group-flush list-group-no-gutters">
        <?php if ($event != false) :?>
          <?php foreach ($event as $key) :?>
            <!-- List Item -->
            <li class="list-group-item">
              <div class="media">
                <!-- Avatar -->
                <div class="avatar avatar-sm avatar-soft-dark avatar-circle mr-3">
                  <span class="avatar-initials"><?= substr($key->JUDUL, 0, 1);?></span>
                </div>
                <!-- End Avatar -->

                <div class="media-body">
                  <div class="row">
                    <div class="col-7 col-md-5 order-md-1">
                      <a href="<?= site_url('event/'.$key->KODE_EVENT);?>"><h5 class="mb-0 text-muted"><?= $key->JUDUL;?></h5></a>
                      <span class="font-size-sm"><?= $key->NAMA;?></span>
                    </div>

                    <div class="col-5 col-md-4 order-md-3 text-right mt-2 mt-md-0">
                      <h5 class="mb-0"><?= $CI->M_admin->count_pesertaEvent($key->KODE_EVENT);?> peserta</h5>
                      <span class="font-size-sm"><?= date("d F Y", strtotime($key->TANGGAL));?></span>
                    </div>

                    <div class="col-auto col-md-3 order-md-2">
                      <span class="badge badge-soft-<?= $key->STATUS_EVENT == 0 ? 'secondary' : ($key->STATUS_EVENT == 1 ? 'success' : 'primary');?> badge-pill"><?= $key->STATUS_EVENT == 0 ? 'belum dibuka' : ($key->STATUS_EVENT == 1 ? 'berlangsung' : 'berakhir');?></span>
                    </div>
                  </div>
                  <!-- End Row -->
                </div>
              </div>
            </li>
            <!-- End List Item -->
          <?php endforeach;?>
        <?php endif;?>
        <?php if ($kompetisi != false) :?>
          <?php foreach ($kompetisi as $key) :?>
            <!-- List Item -->
            <li class="list-group-item">
              <div class="media">
                <!-- Avatar -->
                <div class="avatar avatar-sm avatar-soft-dark avatar-circle mr-3">
                  <span class="avatar-initials"><?= substr($key->JUDUL, 0, 1);?></span>
                </div>
                <!-- End Avatar -->

                <div class="media-body">
                  <div class="row">
                    <div class="col-7 col-md-5 order-md-1">
                      <a href="<?= site_url('kompetisi/'.$key->KODE_KOMPETISI);?>"><h5 class="mb-0 text-muted"><?= $key->JUDUL;?></h5></a>
                      <span class="font-size-sm"><?= $key->NAMA;?></span>
                    </div>

                    <div class="col-5 col-md-4 order-md-3 text-right mt-2 mt-md-0">
                      <h5 class="mb-0"><?= $CI->M_admin->count_pesertaKompetisi($key->KODE_KOMPETISI);?> peserta</h5>
                      <span class="font-size-sm"><?= date("d F Y", strtotime($key->TANGGAL));?></span>
                    </div>

                    <div class="col-auto col-md-3 order-md-2">
                      <span class="badge badge-soft-<?= $key->STATUS_KOMPETISI == 0 ? 'secondary' : ($key->STATUS_KOMPETISI == 1 ? 'success' : 'primary');?> badge-pill"><?= $key->STATUS_KOMPETISI == 0 ? 'belum dibuka' : ($key->STATUS_KOMPETISI == 1 ? 'berlangsung' : 'berakhir');?></span>
                    </div>
                  </div>
                  <!-- End Row -->
                </div>
              </div>
            </li>
            <!-- End List Item -->
          <?php endforeach;?>
        <?php endif;?>
      </ul>
    </div>
    <!-- End Body -->
  </div>
  <!-- End Card -->
</div>
</div>
<!-- End Row -->
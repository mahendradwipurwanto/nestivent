<style type="text/css">
  table > tbody > tr > td {
    padding-left: 0px !important; 
  }
</style>

<!-- Page Header -->
<div class="page-header mb-5 pb-0">
  <div class="row align-items-center">
    <div class="col-sm mb-2 mb-sm-0">
      <h1 class="page-header-title">Dashboard </h1>
    </div>

    <div class="col-sm-auto">
    </div>
  </div>
</div>
<!-- End Page Header -->

<!-- Stats -->
<div class="row gx-2 gx-lg-3 mb-5">
  <div class="col-sm-12 col-lg-4">
    <!-- Card -->
    <div class="card card-shadow h-100">
      <div class="card-body">
        <h6 class="card-subtitle">Total TIM <small>(Harus dinilai)</small></h6>

        <div class="row align-items-center gx-2 mb-1">
          <div class="col-8">
            <span class="card-title h2"><?= number_format($tim->semua,0,",",".");?> TIM</span>
          </div>
        </div>
      </div>
    </div>
    <!-- End Card -->
  </div>
  <div class="col-sm-12 col-lg-4">
    <!-- Card -->
    <div class="card card-shadow h-100">
      <div class="card-body">
        <h6 class="card-subtitle">Total TIM <small>(Sudah dinilai)</small></h6>

        <div class="row align-items-center gx-2 mb-1">
          <div class="col-8">
            <span class="card-title h2"><?= number_format($tim->sudah_nilai,0,",",".");?> TIM</span>
          </div>
        </div>
      </div>
    </div>
    <!-- End Card -->
  </div>
  <div class="col-sm-12 col-lg-4">
    <!-- Card -->
    <div class="card card-shadow h-100">
      <div class="card-body">
        <h6 class="card-subtitle">Download <small>(Berkas panduan)</small></h6>

        <div class="row align-items-center gx-2 mb-1">
          <a href="https://docs.google.com/viewer?url=<?= base_url();?>berkas/kebutuhan/<?= $pedoman->LINK;?>" class="btn btn-hover btn-sm btn-primary btn-block" target="_blank"><?= $pedoman->JUDUL;?></a>
        </div>
      </div>
    </div>
    <!-- End Card -->
  </div>
</div>
<?php if ($tahap == false):?>
  <!-- Card -->
  <div class="card mb-4">
    <div class="card-body">
      <div class="text-center space-1">
        <img class="avatar avatar-xl mb-3" src="<?= base_url();?>assets/backend/svg/illustrations/sorry.svg" alt="Image Description">
        <p class="card-text">Proses penilaian belum dimulai</p>
      </div>
      <!-- End Empty State -->
    </div>
  </div>

<?php else:?>

  <!-- Stats -->
  <div class="row gx-2 gx-lg-3 mb-5">
    <div class="col-sm-12 col-lg-5 mb-3 mb-lg-5">
      <div class="card card-shadow">
        <div class="card-body">
          <h6 class="card-subtitle">Infromasi Penilaian</h6>
          <hr class="my-2">
          <div class="row align-items-center gx-2 mb-0">
            <div class="col-12">
              <?php if ($tahap == false) :?>
                <div class="text-dark text-center font-weight-bold font-size-3">
                  proses penilaian belum dimulai
                </div>
                <hr class="my-2">
              <?php else:?>
                <div class="media align-items-center mb-2">
                  <span class="d-block font-size-1 mr-3">Bidang lomba</span>
                  <div class="media-body text-right">
                    <span class="text-dark font-weight-bold"><?= $controller->bidang_juri(2);?></span>
                  </div>
                </div>
                <div class="media align-items-center mb-2">
                  <span class="d-block font-size-1 mr-3">Tahap Penilaian</span>
                  <div class="media-body text-right">
                    <span class="text-dark font-weight-bold"><?= $tahap->NAMA_TAHAP;?></span>
                  </div>
                </div>
                <div class="media align-items-center mb-2">
                  <span class="d-block font-size-1 mr-3">Rentang Waktu</span>
                  <div class="media-body text-right">
                    <span class="text-dark font-weight-bold"><?= date('d F', strtotime($tahap->DATE_START));?> s/d <?= date('d F', strtotime($tahap->DATE_END));?></span>
                  </div>
                </div>
                <div class="media align-items-center">
                  <span class="d-block font-size-1 mr-3">Status</span>
                  <div class="media-body text-right">
                    <span class="text-dark font-weight-bold">
                      <?php
                      switch ($tahap->STATUS) {
                        case 0:
                        echo '<span class="badge badge-secondary">belum dimulai</span>';
                        break;

                        case 1:
                        echo '<span class="badge badge-success">berlangsung</span>';
                        break;

                        case 1:
                        echo '<span class="badge badge-danger">selesai</span>';
                        break;

                        default:
                        echo '<span class="badge badge-secondary">belum dimulai</span>';
                        break;
                      }
                      ?>
                    </span>
                  </div>
                </div>
              <?php endif;?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-12 col-lg-7 mb-3 mb-lg-5">
      <?php if ($tim->semua == $tim->sudah_nilai) :?>
        <!-- Alert -->
        <div class="alert alert-soft-dark mb-5" role="alert">
          <div class="media align-items-center">
            <img class="avatar avatar-xl mr-3" src="<?= base_url();?>assets/backend/svg/illustrations/yelling-reverse.svg" alt="Image Description">

            <div class="media-body">
              <h3 class="alert-heading mb-1">Penilaian selesai!</h3>
              <p class="mb-0">Terima kasih, anda telah menyelesaikan proses penilaian anda.</p>
            </div>
          </div>
        </div>
        <!-- End Alert -->
      <?php endif;?>
      <div class="card card-shadow mb-5">
        <div class="card-body">
          <h6 class="card-header-title text-center">Hai, <i><?= $this->session->userdata('nama');?></i></h6>
          <hr class="my-2">
          <ul>
            <li>Anda dapat mulai melakukan penilaian pada menu <b>Penilaian</b>.</li>
            <li><b>Harap</b> menyelesaikan penilaian <b>sebelum tanggal yang telah ditentukan</b> sesuai dengan Tahap Penilaian yang berlangsung.</li>
            <li>Harap matikan <strong>Internet Download Manager (IDM)</strong> untuk menghindari download secara otomatis.</li>
          </ul>
          <small>Jika terdapat <i>kendala</i> atau <i>masalah</i>, anda dapat menghubungi masing-masing LO bidang lomba anda</small>
        </div>
      </div>
    </div>
  </div>
  <!-- End Stats -->

<?php endif;?>
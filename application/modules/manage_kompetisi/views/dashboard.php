<!-- Page Header -->
<div class="page-header">
  <div class="row align-items-center">
    <div class="col-sm mb-2 mb-sm-0">
      <h1 class="page-header-title">Dashboard Panel - <i><?= $this->session->userdata('manage_namaKompetisi');?></i></h1>
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
    <a class="card card-hover-shadow h-100">
      <div class="card-body">
        <h6 class="card-subtitle">Total Peserta</h6>

        <div class="row align-items-center gx-2 mb-1">
          <div class="col-8">
            <span class="card-title h2"><?= $c_peserta;?></span>
          </div>
        </div>
        <!-- End Row -->
      </div>
    </a>
    <!-- End Card -->
  </div>
  <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
    <!-- Card -->
    <a class="card card-hover-shadow h-100">
      <div class="card-body">
        <h6 class="card-subtitle">Telah diverifikasi</h6>

        <div class="row align-items-center gx-2 mb-1">
          <div class="col-8">
            <span class="card-title h2"><?= $c_verif;?></span>
          </div>
        </div>
        <!-- End Row -->
      </div>
    </a>
    <!-- End Card -->
  </div>
</div>
<!-- End Stats -->
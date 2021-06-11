<!-- Card -->
<div class="card card-frame card-frame-highlighted">
  <div class="card-header">
    <h5 class="card-header-title">Overview Akun</h5>
  </div>
  <?php if ($aktivasi->STATUS == 0) { ?>
    <!-- Alert -->
    <div class="alert alert-soft-danger text-center rounded-0 mb-0" role="alert">
      Harap melakukan aktivasi akun terlebih dahulu untuk dapat mengakses fitur NESTIVENT. <a class="alert-link" href="<?= site_url('hold-verification') ?>">AKTIVASI SEKARANG</a>
    </div>
    <!-- End Alert -->
  <?php } ?>
  <div class="card-footer">
  </div>
</div>
<!-- End Card -->

<div class="row mt-4 mb-4">
  <div class="col-md-4">
    <div class="card card-frame h-100">
      <div class="card-body">
        <!-- Icon Block -->
        <div class="media d-block d-sm-flex">
          <figure class="w-100 max-w-8rem mb-2 mb-sm-0 mr-sm-4">
            <img class="img-fluid" src="<?= base_url();?>assets/frontend/svg/icons/icon-7.svg" alt="SVG">
          </figure>
          <div class="media-body">
            <h2 class="h4">Kompetisi</h2>
            <p class="font-size-1 text-body mb-0">4 kompetisi diikuti</p>
          </div>
        </div>
        <!-- End Icon Block -->
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card card-frame h-100">
      <div class="card-body">
        <!-- Icon Block -->
        <div class="media d-block d-sm-flex">
          <figure class="w-100 max-w-8rem mb-2 mb-sm-0 mr-sm-4">
            <img class="img-fluid" src="<?= base_url();?>assets/frontend/svg/icons/icon-18.svg" alt="SVG">
          </figure>
          <div class="media-body">
            <h2 class="h4">Event</h2>
            <p class="font-size-1 text-body mb-0">4 Event diikuti</p>
          </div>
        </div>
        <!-- End Icon Block -->
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card card-frame h-100">
      <div class="card-body">
        <!-- Icon Block -->
        <div class="media d-block d-sm-flex">
          <figure class="w-100 max-w-8rem mb-2 mb-sm-0 mr-sm-4">
            <img class="img-fluid" src="<?= base_url();?>assets/frontend/svg/icons/icon-40.svg" alt="SVG">
          </figure>
          <div class="media-body">
            <h2 class="h4">Sertifikat</h2>
            <p class="font-size-1 text-body mb-0">1 Sertifikat didapat</p>
          </div>
        </div>
        <!-- End Icon Block -->
      </div>
    </div>
  </div>
</div>

<hr class="mb-4 mt-0">
<div class="row mb-4">
  <div class="col-md-7">
    <div class="card">
      <div class="card-header">
        <h5 class="card-header-title">Kegiatan terbaru</h5>
        <a href="<?= site_url('kegiatan') ?>" class="btn btn-primary btn-xs pull-right">more</a>
      </div>
      <!-- Table -->
      <div class="card-body scroll-y-400">
        <table class="table table-borderless table-thead-bordered table-nowrap table-align-middle">
          <thead class="thead-light">
            <tr>
              <th>Kegiatan</th>
              <th>Jenis</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <div class="media align-items-center">
                  <img class="avatar avatar-sm avatar-circle mr-3" src="<?= base_url();?>assets/frontend/img/100x100/img1.jpg" alt="Image Description">

                  <div class="media-body">
                    <a class="d-inline-block text-dark" href="#">
                      <h6 class="text-hover-primary mb-0">SEMINAR SERIES I... <img class="avatar avatar-xss ml-1" src="<?= base_url();?>assets/frontend/svg/illustrations/top-vendor.svg" alt="Image Description" data-toggle="tooltip" data-placement="top" title="Verified user"></h6>
                    </a>
                    <small class="d-block">STIKI MALANG</small>
                  </div>
                </div>
              </td>
              <td>
                <span class="h4 badge badge-primary text-white">Kompetisi</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- End Table -->

      <!-- Footer -->
      <div class="card-footer d-flex justify-content-end">
      </div>
      <!-- End Footer -->
    </div>
  </div>
  <div class="col-md-5">
    <div class="card">
      <div class="card-header">
        <h5 class="card-header-title">Notifikasi terbaru</h5>
        <a href="<?= site_url('pengguna/notifikasi') ?>" class="btn btn-primary btn-xs pull-right">more</a>
      </div>
      <!-- Table -->
      <div class="card-body scroll-y-400">
        <?php if ($notifikasi == false): ?>
          <div class="row">
            <div class="col-12">
              <div class="media align-items-center">
                <div class="media-body">
                  <a class="d-inline-block text-dark">
                    <h6 class="text-hover-primary mb-0"><center>Tidak ada notifikasi terbaru</center></h6>
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php else: ?>
          <?php foreach ($notifikasi as $key): ?>
            <div class="row mb-4 cursor" data-target="#detail_notif<?= $key->ID_AKTIVITAS?>" data-toggle="modal">
              <div class="col-12">
                <div class="media align-items-center">
                  <div class="media-body">
                    <a class="d-inline-block text-dark">
                      <h6 class="text-hover-primary mb-0"><?= $key->TYPE_DESC ?></h6>
                    </a>
                    <small class="d-block"><?= $key->AKTIVITAS ?></small>
                  </div>
                </div>
              </div>
              <div class="col-12 text-right">
                <small class="text-muted pull-right"><?= date("d F Y - H:i:s", strtotime($key->LOG_TIME)) ?></small>
              </div>
            </div>

            <!-- DELETE ACCOUNT -->

            <div id="detail_notif<?= $key->ID_AKTIVITAS; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ubah_profil" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-body">
                    <!-- Form Group -->
                    <p>AKTIVITAS: <b><?= $key->TYPE_DESC ?></b></p>
                    <p><?= $key->AKTIVITAS ?> <small class="text-muted float-right pull-right"><?= date("d F Y - H:i:s", strtotime($key->LOG_TIME)) ?></small> </p>
                    <hr>
                    <button type="button" class="btn btn-xs btn-white btn-block" data-dismiss="modal">Tutup</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- END DELETE ACCOUNT -->
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
      <!-- End Table -->

      <!-- Footer -->
      <div class="card-footer d-flex justify-content-end">
      </div>
      <!-- End Footer -->
    </div>
  </div>
</div>

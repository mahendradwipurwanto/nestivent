<!-- Card -->
<div class="card">
  <div class="card-header">
    <h5 class="card-header-title">Notifikasi Anda</h5>
    <a href="<?= site_url('pengguna/read_notifikasiAll');?>" class="btn btn-primary btn-xs float-right">Tandai telah dibaca semua</a>
  </div>
  <!-- Table -->
  <div class="card-body">
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
          <div class="row mb-4 cursor" data-target="#detail_notif<?= $key->ID_LOG?>" data-toggle="modal">
            <div class="col-9">
              <div class="media align-items-center">
                <div class="media-body">
                  <a class="d-inline-block text-dark">
                    <h6 class="text-hover-primary mb-0"><?= $key->REFERENCES ?>
                    <?php if ($key->READ == 0): ?>
                      <span class="legend-indicator bg-primary"></span>
                    <?php endif; ?>
                  </h6>
                </a>
                <small class="d-block text-muted"><span class="text-dark"><?= $CI->M_pengguna->get_sender($key->SENDER) ?></span> <?= $key->MESSAGE ?></small>
              </div>
            </div>
          </div>
          <div class="col-3">
            <small class="text-muted"><?= $CI->time_elapsed($key->CREATED_AT) ?></small>
          </div>
        </div>
        <hr class="mt-2 mb-2">
        <!-- DELETE ACCOUNT -->

        <div id="detail_notif<?= $key->ID_LOG; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ubah_profil" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-body">
                <!-- Form Group -->
                <p class="h4"><b><?= $key->REFERENCES ?></b></p>
                <p class="h6 text-muted"><span class="text-dark"><?= $CI->M_pengguna->get_sender($key->SENDER) ?></span> <?= $key->MESSAGE ?><br> <small class="text-muted float-right pull-right mt-2"><?= $CI->time_elapsed($key->CREATED_AT) ?></small> </p>
                <hr class="mt-5">
                <button type="button" class="btn btn-xs btn-light" data-dismiss="modal">Tutup</button>
                <a href="<?= site_url('pengguna/read_notifikasi/'.$key->ID_LOG);?>" class="btn btn-xs btn-soft-secondary float-right">tandai telah dibaca</a>
              </div>
            </div>
          </div>
        </div>
        <!-- END DELETE ACCOUNT -->
      <?php endforeach; ?>
      <hr>
      <?= $this->pagination->create_links(); ?>
    <?php endif; ?>
  </div>
  <!-- End Table -->

  <!-- Footer -->
  <div class="card-footer d-flex justify-content-end">
  </div>
  <!-- End Footer -->
</div>
<!-- End Card -->

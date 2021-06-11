<!-- Card -->
<div class="card">
  <div class="card-header">
    <h5 class="card-header-title">Notifikasi Anda</h5>
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
        <div class="row mb-4 cursor" data-target="#detail_notif<?= $key->ID_AKTIVITAS?>" data-toggle="modal">
          <div class="col-9">
            <div class="media align-items-center">
              <div class="media-body">
                <a class="d-inline-block text-dark">
                  <h6 class="text-hover-primary mb-0"><?= $key->TYPE_DESC ?></h6>
                </a>
                <small class="d-block"><?= $key->AKTIVITAS ?></small>
              </div>
            </div>
          </div>
          <div class="col-3">
            <small class="text-muted"><?= date("d F Y - H:i:s", strtotime($key->LOG_TIME)) ?></small>
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
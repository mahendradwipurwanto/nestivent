<!-- Card -->
<div class="card">
  <div class="card-header">
    <h5 class="card-header-title">AKSES K-Panel</h5>
    <a href="<?= site_url('pengajuan/penyelenggara') ?>" class="btn btn-primary btn-xs float-right">ajukan K-panel</a>
  </div>

  <!-- Body -->
  <div class="card-body">
    <div class="mb-4">
      <p>Daftar hak akses K-Panel Terhadap akun Penyelenggara yang anda ikut bergabung sebagai admin atau panitia.</p>
    </div>

    <?php if($k_panel == FALSE): ?>
      <div class="text-center space-1">
        <img class="avatar avatar-xl mb-3" src="<?= base_url();?>assets/frontend/svg/components/empty-state-no-data.svg" alt="Image Description">
        <p class="card-text">Tidak ada akses K-Panel</p>
      </div>
      <!-- End Empty State -->
      <?php else: ?>

        <!-- List Group -->
        <ul class="list-group mb-5">

          <?php foreach ($k_panel as $key): ?>

            <!-- List Item -->
            <li class="list-group-item">
              <div class="media">
                <img class="avatar avatar-sm mr-3" src="<?= base_url();?>berkas/penyelenggara/<?= $key->KODE_PENYELENGGARA;?>/<?= $key->LOGO;?>" alt="<?= $key->NAMA;?>">

                <div class="media-body">
                  <div class="row">
                    <div class="col-sm mb-3 mb-sm-0">
                      <span class="d-block text-dark"><?= $key->NAMA;?>
                      <span class="badge badge-primary ml-1">
                        <?php if($key->BAGIAN == 0):?>
                          OWNER
                          <?php else:?>
                            <?= ($key->BAGIAN == 1 ? "ADMIN" : "PANITIA");?>
                          <?php endif;?>
                        </span>
                      </span>
                      <?= $CI->agent->is_mobile() ? '' : '<small class="d-block text-muted">'.$key->INSTANSI.'</small>';?>
                    </div>

                    <div class="col-sm-auto">
                      <?php if($key->STATUS == 0): ?>
                        <button type="button" class="btn btn-xs btn-white text-muted">
                          <i class="fas fa-paused mr-1"></i> Pending Confirmation
                        </button>
                        <?php else: ?>
                          <a class="btn btn-xs btn-white mr-2" href="<?= site_url('k-panel/init/'.$key->KODE_PENYELENGGARA);?>">
                            <i class="fas fa-pencil-alt mr-1"></i> Manage
                          </a>
                          <?php

                          if ($key->STATUS == 0):
                            $kpanel_badgeColor    = "secondary";
                            $kpanel_status      = "NON-ACTIVE";
                          elseif ($key->STATUS == 1):
                            $kpanel_badgeColor    = "primary";
                            $kpanel_status      = "ACTIVE";
                          elseif ($key->STATUS == 2):
                            $kpanel_badgeColor    = "warning";
                            $kpanel_status      = "CANCELED";
                          else:
                            $kpanel_badgeColor    = "danger";
                            $kpanel_status      = "SUSPEND";
                          endif;

                          ?>
                          <span class="badge badge-<?= $kpanel_badgeColor;?> ml-1">
                            <?= $kpanel_status;?>
                          </div>
                        <?php endif;?>
                      </div>
                      <!-- End Row -->
                    </div>
                  </div>
                </li>
                <!-- End List Item -->

              <?php endforeach;?>

            </ul>
            <!-- End List Group -->
            <?= $this->pagination->create_links(); ?>
          <?php endif;?>
        </div>
        <!-- End Body -->
      </div>
<!-- End Card -->
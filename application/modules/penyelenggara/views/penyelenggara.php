<!-- Penyelenggara Section -->
<div class="container space-bottom-2 space-top-1">
  <div class="row">

    <div class="col-12 mb-5 mb-lg-0 ml-3">
      <div class="row mx-n2 mb-7">
        <?php if ($featuredPenyelenggara != false) :?>
          <?php foreach ($featuredPenyelenggara as $key):?>
            <div class="col-sm-6 col-md-3 px-2">
              <!-- Card -->
              <a class="card card-frame h-100" href="<?= site_url('penyelenggara/'.$key->KODE_PENYELENGGARA);?>">
                <div class="card-header bg-<?php $a = rand(1, 3); if($a == 1){ echo 'primary';}elseif($a == 2){echo 'danger'; }elseif($a == 3){echo 'warning';}else{ echo 'success '; }?> text-center rounded-lg-top py-4">
                  <div class="avatar avatar-lg d-block bg-white rounded p-2 mx-auto">
                    <img class="avatar-img" src="<?= ($key->LOGO == null ? base_url().'assets/frontend/img/100x100/img12.jpg' : base_url().'berkas/penyelenggara/'.$key->KODE_PENYELENGGARA.'/'.$key->LOGO);?>" alt="<?= $key->NAMA;?>">
                  </div>
                </div>
                <div class="card-body">
                  <div class="d-flex align-items-center mb-1">
                    <span class="d-block text-dark font-weight-bold"><?= $key->NAMA;?></span>
                    <img class="ml-2" src="<?= base_url();?>assets/frontend/svg/illustrations/top-vendor.svg" alt="Image Description" title="Top Vendor" width="16">
                  </div>
                  <span class="d-block text-body font-size-1"><?= substr(strip_tags($key->INSTANSI), 0, 50);?><?= (strlen($key->INSTANSI) >= 50 ? "..." : "");?></span>
                </div>
              </a>
              <!-- End Card -->
            </div>
          <?php endforeach;?>
        <?php endif;?>
      </div>

      <!-- Title -->
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Semua penyelenggara</h3>
      </div>
      <!-- End Title -->
      <div class="row mx-n2 mb-7">
        <?php if ($penyelenggara == false) :?>
          <div class="col-md-12 text-center">
            <h4>belum ada penyelenggara</h4>
          </div>
          <?php else:?>
            <?php foreach ($penyelenggara as $key):?>
              <!-- Card -->
              <div class="col-sm-6 col-md-4 px-2 mb-3">
                <div class="card card-frame h-100">
                  <a class="card-body" href="<?= site_url('penyelenggara/'.$key->KODE_PENYELENGGARA);?>">
                    <div class="media">
                      <div class="avatar avatar-xs mt-1 mr-3">
                        <img class="avatar-img" src="<?= ($key->LOGO == null ? base_url().'assets/frontend/img/100x100/img12.jpg' : base_url().'berkas/penyelenggara/'.$key->KODE_PENYELENGGARA.'/'.$key->LOGO);?>" alt="<?= $key->NAMA;?>">
                      </div>
                      <div class="media-body text-ellipsis">
                        <div class="d-flex align-items-center">
                          <span class="d-block text-dark font-weight-bold"><?= $key->NAMA;?></span>
                        </div>
                        <small class="d-block text-body"><?= $key->INSTANSI;?></small>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
              <!-- End Card -->
            <?php endforeach;?>
          <?php endif;?>
        </div>
        <div class="row">
          <div class="col-md-12">
            <?= $this->pagination->create_links(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Penyelenggara Section -->

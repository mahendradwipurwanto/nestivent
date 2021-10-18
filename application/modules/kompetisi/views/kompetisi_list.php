<div class="container space-bottom-2 space-top-1">
  <div class="row">
    <div class="col-lg-12">
      <!-- Title and Sort -->
      <div class="row align-items-sm-center">
        <div class="col-sm mb-3 mb-sm-0">
          <h3 class="mb-0"><?= $c_kompetisi;?> kompetisi</h3>
        </div>

        <div class="col-sm-auto">
          <div class="d-flex align-items-center">

            <!-- Nav -->
            <ul class="nav nav-segment">
              <li class="list-inline-item">
                <a class="nav-link" href="<?= site_url('kompetisi') ?>">
                  <i class="fas fa-th-large"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="nav-link active" href="<?= site_url('kompetisi-list') ?>">
                  <i class="fas fa-list"></i>
                </a>
              </li>
            </ul>
            <!-- End Nav -->
          </div>
        </div>
      </div>
      <!-- End Title and Sort -->

      <hr class="my-4">

      <?php if ($kompetisi != false) :?>
        <?php foreach ($kompetisi as $key):?>
          <!-- Card -->
          <div class="card card-bordered card-hover-shadow mb-5">
            <div class="card-body">
              <!-- Media -->
              <div class="d-sm-flex">
                <div class="media align-items-center align-items-sm-start mb-3">
                  <img class="avatar avatar-sm mr-3" src="<?= ($key->LOGO == null ? base_url().'assets/frontend/svg/brands/capsule.svg' : base_url().'berkas/penyelenggara/'.$key->KODE_PENYELENGGARA.'/'.$key->LOGO);?>" alt="Image Description">
                  <div class="media-body d-sm-none">
                    <h6 class="mb-0">
                      <a class="text-dark" href="<?= site_url('penyelenggara/'.$key->KODE_PENYELENGGARA);?>"><?= $key->NAMA;?></a>
                      <img class="avatar avatar-xss ml-1" src="<?= base_url();?>assets/frontend/svg/illustrations/top-vendor.svg" alt="Review rating" data-toggle="tooltip" data-placement="top" title="Verified profile">
                    </h6>
                  </div>
                </div>

                <div class="media-body">
                  <div class="row">
                    <div class="col col-md-8">
                      <h3 class="mb-0">
                        <a class="text-dark" href="<?= site_url('kompetisi/'.$key->KODE_KOMPETISI);?>"><?= $key->JUDUL;?></a>
                      </h3>
                      <div class="d-none d-sm-inline-block">
                        <h6 class="mb-0">
                          <a class="text-dark" href="<?= site_url('penyelenggara/'.$key->KODE_PENYELENGGARA);?>"><?= $key->NAMA;?></a>
                          <img class="avatar avatar-xss ml-1" src="<?= base_url();?>assets/frontend/svg/illustrations/top-vendor.svg" alt="Review rating" data-toggle="tooltip" data-placement="top" title="Claimed profile">
                        </h6>
                      </div>
                    </div>

                    <div class="col-12 col-md mt-3 mt-md-0">
                      <span class="d-block font-size-1 text-body mb-1"><?= $key->BAYAR == 0 ? 'FREE': 'Rp.'.($CI->M_kompetisi->get_tiketRange($key->KODE_KOMPETISI)->low).' s/d '.'Rp.'.($CI->M_kompetisi->get_tiketRange($key->KODE_KOMPETISI)->high) ;?></span>

                      <span class="badge badge-soft-info mr-2">
                        <span class="legend-indicator bg-info"></span><?= $key->ONLINE == 1 ? 'ONLINE' : 'OFFLINE';?>
                      </span>
                    </div>
                  </div>
                  <!-- End Row -->
                </div>
              </div>
              <!-- End Media -->
            </div>

            <div class="card-footer">
              <ul class="list-inline list-separator small text-body">
                <li class="list-inline-item"><?= date("d F Y", strtotime($key->TANGGAL));?> - <?= $key->WAKTU;?> WIB</li>
                <li class="list-inline-item"><span class="badge badge-<?= $key->STATUS_KOMPETISI == 0 ? 'secondary' : ($key->STATUS_KOMPETISI == 1 ? 'success' : 'primary');?>"><?= $key->STATUS_KOMPETISI == 0 ? 'belum dibuka' : ($key->STATUS_KOMPETISI == 1 ? 'berlangsung' : 'berakhir');?></span></li>
              </ul>
            </div>
          </div>
          <!-- End Card -->

        <?php endforeach;?>
      <?php endif;?>
      <!-- Pagination -->
      <div class="d-flex justify-content-between align-items-center mt-7">
        <?= $this->pagination->create_links(); ?>
      </div>
      <!-- End Pagination -->
    </div>
  </div>
</div>
<!-- End Kompetisi Section -->

<!-- Kompetisi Section -->
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
                <a class="nav-link active" href="<?= site_url('kompetisi') ?>">
                  <i class="fas fa-th-large"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="nav-link" href="<?= site_url('kompetisi-list') ?>">
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

      <!-- Listing -->
      <div class="row">
        <?php if ($kompetisi != false) :?>
          <?php foreach ($kompetisi as $key):?>
            <div class="col-sm-4 mb-5">
              <!-- Card -->
              <div class="card card-bordered card-hover-shadow h-100">
                <div class="card-body">
                  <div class="row mb-3">
                    <div class="col">
                      <div class="media align-items-center">
                        <img class="avatar avatar-sm mr-3" src="<?= ($key->LOGO == null ? base_url().'assets/frontend/svg/brands/capsule.svg' : base_url().'berkas/penyelenggara/'.$key->KODE_PENYELENGGARA.'/'.$key->LOGO);?>" alt="Image Description">
                        <div class="media-body">
                          <h6 class="mb-0">
                            <a class="text-dark" href="<?= site_url('penyelenggara/'.$key->KODE_PENYELENGGARA);?>"><?= $key->NAMA;?></a>
                            <img class="avatar avatar-xss ml-1" src="<?= base_url();?>assets/frontend/svg/illustrations/top-vendor.svg" alt="Review rating" data-toggle="tooltip" data-placement="top" title="Verified profile">
                          </h6>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Row -->

                  <h3 class="mb-3">
                    <a class="text-dark" href="<?= site_url('kompetisi/'.$key->KODE_KOMPETISI);?>"><?= $key->JUDUL;?></a>
                  </h3>

                  <span class="font-size-1 text-body mb-1 mr-2"><?= $key->BAYAR == 0 ? 'FREE': 'Rp.'.($CI->M_kompetisi->get_tiketRange($key->KODE_KOMPETISI)->low).' s/d '.'Rp.'.($CI->M_kompetisi->get_tiketRange($key->KODE_KOMPETISI)->high) ;?></span>

                  <span class="badge badge-soft-info mr-2">
                    <span class="legend-indicator bg-info"></span><?= $key->ONLINE == 1 ? 'ONLINE' : 'OFFLINE';?>
                  </span>
                </div>

                <div class="card-footer">
                  <ul class="list-inline list-separator small text-body">
                    <li class="list-inline-item"><?= date("d F Y", strtotime($key->TANGGAL));?> - <?= $key->WAKTU;?> WIB</li>
                    <li class="list-inline-item"><span class="badge badge-<?= $key->STATUS_KOMPETISI == 0 ? 'secondary' : ($key->STATUS_KOMPETISI == 1 ? 'success' : 'primary');?>"><?= $key->STATUS_KOMPETISI == 0 ? 'belum dibuka' : ($key->STATUS_KOMPETISI == 1 ? 'berlangsung' : 'berakhir');?></span></li>
                  </ul>
                </div>
              </div>
              <!-- End Card -->
            </div>
          <?php endforeach;?>
        <?php endif;?>
      </div>
      <!-- End Listing -->

      <!-- Pagination -->
      <div class="d-flex justify-content-between align-items-center mt-7">
        <?= $this->pagination->create_links(); ?>
      </div>
      <!-- End Pagination -->
    </div>
  </div>
</div>
<!-- End Kompetisi Section -->

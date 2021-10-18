<!-- Featured event Section -->
<div class="space-bottom-2 space-top-1 space-bottom-3" style="background: url(<?= base_url();?>assets/frontend/svg/components/abstract-shapes-9.svg) center no-repeat;">
  <div class="position-relative">
    <div class="container">
      <!-- Title -->
      <div class="row align-items-md-center mb-3">
        <div class="col-md-6 mb-4 mb-md-0">
          <h2>Daftar event kami</h2>
          <p>Temukan event yang kamu inginkan.</p>
        </div>
      </div>
      <!-- End Title -->
      <!-- Featured event Carousel -->
      <div class="row mb-5">

        <?php if($event != false):?>
          <?php foreach($event as $key):?>
            <article class="col-3 mb-5">
              <!-- Article -->
              <div class="card card-bordered h-100">
                <div class="card-img-top position-relative">
                  <img class="card-img-top" src="<?= base_url();?>assets/frontend/svg/components/graphics-1.svg" alt="Image Description">

                  <div class="position-absolute top-0 left-0 mt-3 ml-3">
                    <small class="btn btn-xs btn-success btn-pill text-uppercase shadow-soft mb-3"><?= $key->STATUS_EVENT == 0 ? 'belum dibuka' : ($key->STATUS_EVENT == 1 ? 'berlangsung' : 'berakhir');?></small>
                  </div>
                </div>

                <div class="card-body">
                  <small class="d-block small font-weight-bold text-cap mb-2"><?= date("d F Y", strtotime($key->TANGGAL));?> - <?= $key->WAKTU;?> WIB</small>

                  <div class="mb-3">
                    <h3>
                      <a class="text-inherit" href="<?= site_url('event/'.$key->KODE_EVENT);?>"><?= $key->JUDUL;?></a>
                    </h3>
                  </div>

                  <div class="d-flex align-items-center">
                    <div class="avatar-group">
                      <a class="avatar avatar-sm avatar-circle" data-toggle="tooltip" data-placement="top" title="<?= $key->NAMA;?>">
                        <img class="avatar-img" src="<?= ($key->LOGO == null ? base_url().'assets/frontend/svg/brands/capsule.svg' : base_url().'berkas/penyelenggara/'.$key->KODE_PENYELENGGARA.'/'.$key->LOGO);?>" alt="Image Description">
                      </a>
                    </div>
                    <div class="d-flex align-items-center ml-2">
                      <div class="text-muted">
                        <?= $key->NAMA;?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Article -->
            </article>
          <?php endforeach;?>
        <?php endif;?>
      </div>
      <!-- End Featured event Carousel -->
    </div>
    <!-- End Featured event Section -->
    <hr>
    <div class="row">
      <div class="col-md-12">
        <?= $this->pagination->create_links(); ?>
      </div>
    </div>

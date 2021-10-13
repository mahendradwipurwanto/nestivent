<!-- Breadcrumb Section -->
<div class="container py-3 space-top-3 space-top-lg-3">
  <div class="row align-items-lg-center">
    <div class="col-lg mb-2 mb-lg-0">
      <!-- Breadcrumb -->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-no-gutter font-size-1 mb-0">
          <li class="breadcrumb-item"><a href="<?= site_url('penyelenggara') ?>">Penyelenggara</a></li>
          <li class="breadcrumb-item"><a href="<?= site_url('penyelenggara/'.$kompetisi->KODE_PENYELENGGARA) ?>"><?= $kompetisi->NAMA;?></a></li>
          <li class="breadcrumb-item">Kompetisi</li>
          <li class="breadcrumb-item active" aria-current="page"><?= $kompetisi->JUDUL;?></li>
        </ol>
      </nav>
      <!-- End Breadcrumb -->
    </div>

    <div class="col-lg-auto">
      <a class="btn btn-sm btn-ghost-secondary float-right" href="https://api.whatsapp.com/send?text=Hai, ayo ikuti kompetisi <?= ucwords(strtolower($kompetisi->JUDUL)) ?> lebih detail di <?php echo base_url(uri_string()); ?>" target="_blank">
        <i class="fab fa-whatsapp mr-2"></i> Share
      </a>
    </div>
  </div>
  <!-- End Row -->
</div>
<!-- End Breadcrumb Section -->

<!-- Property Description Section -->
<div class="container space-bottom-2">
  <div class="row">
    <div class="col-lg-8 mb-9 mb-lg-0">
      <div class="row justify-content-lg-between mb-<?= $CI->agent->is_mobile() ? '0' : '7';?>">
        <div class="col-12 mb-5 mb-sm-0">
          <h1 class="h2 mb-0"><?= $kompetisi->JUDUL;?></h1>
        </div>
      </div>
      <!-- End Row -->

      <!-- Nav Classic -->
      <ul class="nav nav-segment nav-fill" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="deskripsi-detail-tab" data-toggle="pill" href="#deskripsi-detail" role="tab" aria-controls="deskripsi-detail" aria-selected="true">
            <div class="d-md-flex justify-content-md-center align-items-md-center">
              <figure class="d-none d-md-block avatar avatar-xs mr-3">
                <img class="avatar-img" src="<?= base_url();?>assets/frontend/svg/icons/icon-13.svg" alt="SVG">
              </figure>
              Deskripsi
            </div>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="bidang-lomba-tab" data-toggle="pill" href="#bidang-lomba" role="tab" aria-controls="bidang-lomba" aria-selected="false">
            <div class="d-md-flex justify-content-md-center align-items-md-center">
              <figure class="d-none d-md-block avatar avatar-xs mr-3">
                <img class="avatar-img" src="<?= base_url();?>assets/frontend/svg/icons/icon-5.svg" alt="SVG">
              </figure>
              Bidang lomba
            </div>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="panduan-tab" data-toggle="pill" href="#panduan" role="tab" aria-controls="panduan" aria-selected="false">
            <div class="d-md-flex justify-content-md-center align-items-md-center">
              <figure class="d-none d-md-block avatar avatar-xs mr-3">
                <img class="avatar-img" src="<?= base_url();?>assets/frontend/svg/icons/icon-63.svg" alt="SVG">
              </figure>
              Panduan Kompetisi
            </div>
          </a>
        </li>
      </ul>
      <!-- End Nav Classic -->

      <!-- Tab Content -->
      <div class="tab-content">
        <div class="tab-pane fade mt-6 show active" id="deskripsi-detail" role="tabpanel" aria-labelledby="deskripsi-detail-tab">

          <?= substr($kompetisi->DESKRIPSI, strpos($kompetisi->DESKRIPSI, "<p"), strpos($kompetisi->DESKRIPSI, "</p>")+4);?>
          <?php if (!empty(substr($kompetisi->DESKRIPSI, strpos($kompetisi->DESKRIPSI, "</p>")))) : ?>
            <!-- Read More - Collapse -->
            <div class="collapse" id="collapseDescriptionSection">
              <?= substr($kompetisi->DESKRIPSI, strpos($kompetisi->DESKRIPSI, "</p>"));?>
            </div>
            <!-- End Read More - Collapse -->
          <?php endif; ?>

          <?php if (!empty(substr($kompetisi->DESKRIPSI, strpos($kompetisi->DESKRIPSI, "</p>")))) : ?>
            <!-- Link -->
            <a class="link link-collapse small font-size-1 font-weight-bold" data-toggle="collapse" href="#collapseDescriptionSection" role="button" aria-expanded="false" aria-controls="collapseDescriptionSection">
              <span class="link-collapse-default">Read more</span>
              <span class="link-collapse-active">Read less</span>
              <span class="link-icon ml-1">+</span>
            </a>
            <!-- End Link -->
          <?php endif; ?>

          <hr class="my-6">

          <h4 class="mb-1">Biaya Pendaftaran</h4>

          <div class="row">
            <div class="col-md-6">
              <span class="h2"><?= $kompetisi->BAYAR == 0 ? 'FREE': 'Rp.'.($CI->M_kompetisi->get_tiketRange($kompetisi->KODE_KOMPETISI)->low).' s/d '.'Rp.'.($CI->M_kompetisi->get_tiketRange($kompetisi->KODE_KOMPETISI)->high) ;?></span>
              <p class="small">Harap membaca panduan KOMPETISI!! untuk detail lebih lanjut</p>
            </div>

            <div class="col-md-6">
              <dl class="row">
                <?php if ($tiket != false) : ?>
                  <?php foreach ($tiket as $key): ?>
                    <dt class="col-sm-6 text-dark">
                      <i class="fas fa-hand-holding-usd nav-icon"></i> <?= $key->NAMA_TIKET;?>
                    </dt>
                    <dd class="col-sm-6 text-sm-right"><?= ($key->HARGA_TIKET > 0 ? 'Rp.'.$key->HARGA_TIKET : 'FREE');?></dd>
                  <?php endforeach;?>
                <?php endif;?>
              </dl>
              <!-- End Row -->
            </div>
          </div>
          <!-- End Row -->
        </div>

        <div class="tab-pane fade mt-6" id="panduan" role="tabpanel" aria-labelledby="panduan-tab">
          <!-- Gallery -->
          <a class="js-fancybox media-viewer" href="javascript:;"
          data-hs-fancybox-options='{
          "src": "<?= base_url();?>assets/frontend/img/others/img1.png",
          "fancybox": "fancyboxGalleryFloorPlan",
          "caption": "Front in frames - image #01",
          "speed": 700,
          "loop": true
        }'>
        <img class="img-fluid" src="<?= base_url();?>assets/frontend/img/others/img1.png" alt="Image Description">
      </a>
      <!-- End Gallery -->

      <small class="form-text">Image source from <a href="https://floorplanner.com/" target="_blank">floorplanner.com</a></small>
    </div>

    <div class="tab-pane fade mt-6" id="bidang-lomba" role="tabpanel" aria-labelledby="bidang-lomba-tab">
      <?php if ($bidang != false) : ?>
        <?php foreach ($bidang as $key) :?>
          <div class="card card-frame mb-3 mb-lg-5">
            <div class="card-body">
              <!-- Icon Block -->
              <div class="media d-block d-sm-flex">
                <div class="media-body">
                  <h2 class="h3"><?= $key->BIDANG_LOMBA;?> <small class="badge badge-primary"><?= ($key->TEAM == 1 ? 'Team, anggota '.$key->MIN_ANGGOTA.' s/d '.$key->MAX_ANGGOTA : 'Individu');?></small></h2>
                  <p class="font-size-1 text-body"><?= $key->KETERANGAN;?></p>
                </div>
              </div>
              <!-- End Icon Block -->
            </div>
          </div>
        <?php endforeach;?>
      <?php endif;?>
    </div>
  </div>
  <!-- End Tab Content -->
  <!-- End Row -->
</div>

<div class="col-lg-4">
  <!-- Contact Form -->
  <div class="card card-bordered">
    <div class="card-body">
      <!-- Header -->
      <div class="media align-items-center mb-4">
        <div class="avatar avatar-circle mr-3">
          <img class="avatar-img" src="<?= base_url();?>assets/frontend/img/100x100/img8.jpg" alt="Image Description">
        </div>
        <div class="media-body">
          <h4 class="mb-0">Pendaftaran Kompetisi</h4>
        </div>
      </div>
      <!-- End Header -->

      <!-- Form -->
      <?php if($this->session->userdata('logged_in') == FALSE || !$this->session->userdata('logged_in')) :?>
      <div class="col-lg-auto align-self-lg-end text-lg-right">
        <a class="btn btn-block btn-sm btn-primary btn-wide transition-3d-hover" href="<?= site_url('login');?>">
          <i class="fas fa-plus fa-sm mr-1"></i> Login untuk daftar
        </a>
      </div>
      <?php else:?>
        <?php if($kompetisi->STATUS_KOMPETISI == 1):?>
          <a href="<?= site_url('daftar/'.$kompetisi->KODE_KOMPETISI);?>" class="btn btn-block btn-sm btn-primary btn-wide transition-3d-hover"><?php if($daftar == true):?>Telah mendaftar <?php else:?>Daftarkan diri<?php endif;?></a>
          <?php elseif ($kompetisi->STATUS_KOMPETISI != 1) :?>
            <button type="button" class="btn btn-block btn-sm btn-light btn-wide transition-3d-hover"><?= ($kompetisi->STATUS_KOMPETISI == 0 ? 'Belum dibuka' : 'Telah berakhir');?></button>
          <?php endif;?>
        <?php endif;?>
        <!-- End Form -->
      </div>
      <?php if ($contact != false) :?>
        <hr>

        <h4 class="mb-4 px-4">Contact person</h4>
        <?php foreach ($contact as $key) :?>
          <!-- Media -->
          <div class="media mb-4 px-4">
            <span class="avatar avatar-lg avatar-soft-danger avatar-circle mr-3">
              <span class="avatar-initials"><?= substr($key->NAMA_CONTACT, 0, 2);?></span>
            </span>

            <div class="media-body">
              <h4 class="mb-1">
                <a class="text-dark" href="<?= $key->CONTACT_MEDIA == 'PHONE' ? 'tel:' : ($key->CONTACT_MEDIA == 'EMAIL' ? 'mailto:' : 'https://api.whatsapp.com/send?text=Hai&phone=');?><?= strtolower($key->CONTACT);?>"><?= $key->NAMA_CONTACT;?></a>
              </h4>

              <span class="d-block font-size-1 mb-1">
                <i class="<?= $key->CONTACT_MEDIA == 'WHATSAPP' ? 'fab font-weight-normal' : 'fas';?>  fa-<?= strtolower($key->CONTACT_MEDIA);?>"></i>
                <?= $key->CONTACT;?>
              </span>
              <a class="link" href="<?= $key->CONTACT_MEDIA == 'PHONE' ? 'tel:' : ($key->CONTACT_MEDIA == 'EMAIL' ? 'mailto:' : 'https://api.whatsapp.com/send?text=Hai&phone=');?><?= strtolower($key->CONTACT);?>"><?= $key->CONTACT_MEDIA;?></a>
            </div>
          </div>
          <!-- End Media -->
        <?php endforeach;?>
      <?php endif;?>
      <!-- End Contact Form -->
    </div>
  </div>
</div>
<!-- End Row -->

<!-- Sticky Block End Point -->
</div>
<!-- End Property Description Section -->

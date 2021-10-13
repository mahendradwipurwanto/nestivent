<!-- Hero Section -->
<div class="container space-top-3 space-top-lg-3 mt-5">
  <div class="row justify-content-lg-between align-items-lg-center">
    <div class="col-sm-10 col-lg-5 mb-7 mb-lg-0">
      <img class="img-fluid" src="<?= base_url();?>assets/frontend/svg/illustrations/reading.svg" alt="Image Description">
    </div>

    <div class="col-lg-6">
      <div class="mb-4">
        <h1 class="display-5 mb-3">
          Kelola kegiatan
          <br>
          <span class="text-primary font-weight-bold">
            <span class="js-text-animation"
            data-hs-typed-options='{
            "strings": ["kompetisi.", "event.", "workshop.", "seminar.", "penjurian."],
            "typeSpeed": 90,
            "loop": true,
            "backSpeed": 30,
            "backDelay": 2500
          }'></span>
        </span>
      </h1>
      <p class=""><?= $WEB_DESKRIPSI;?></p>
    </div>

    <?php if($WEB_HERO_BUTTON == 1):?>
      <div class="d-sm-flex align-items-sm-center flex-sm-wrap">
        <?php if ($this->session->userdata("logged_in") == TRUE || $this->session->userdata("logged_in")) { ?>
          <a class="btn btn-primary btn-wide transition-3d-hover mb-sm-0" style="margin-top: 10px" href="<?= site_url('pendaftaran/penyelenggara') ?>">Buat kegiatan</a>
        <?php }else{?>
          <a class="btn btn-primary btn-wide transition-3d-hover mb-sm-0" style="margin-top: 10px" href="<?= site_url('pendaftaran?as=pengguna') ?>">Daftar sekarang</a>
        <?php }?>
        <!-- End Fancybox -->
      </div>
    <?php endif;?>
  </div>
</div>
</div>
<!-- End Hero Section -->

<!-- Articles Section -->
<div class="container space-2 space-lg-3">
  <!-- Title -->
  <div class="w-md-80 w-lg-60 text-center mx-md-auto mb-5 mb-md-9">
    <h2>Semua terintegrasi dalam satu platform</h2>
  </div>
  <!-- End Title -->

  <div class="row">
    <div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
      <!-- Card -->
      <a class="card card-bg-light h-100 shadow-none overflow-hidden transition-3d-hover" href="<?= site_url('penyelenggara');?>">
        <div class="row align-items-center">
          <div class="col-8 col-md-6">
            <div class="py-3 pl-4">
              <h2 class="h4">Penyelenggara</h2>
              <span class="font-size-1 font-weight-bold">cari penyelenggara <i class="fas fa-angle-right fa-sm ml-1"></i></span>
            </div>
          </div>
          <div class="col-4 col-md-6 px-0">
            <img class="img-fluid" src="<?= base_url();?>assets/frontend/svg/illustrations/apps.svg" alt="SVG">
          </div>
        </div>
      </a>
      <!-- End Card -->
    </div>

    <div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
      <!-- Card -->
      <a class="card card-bg-light h-100 shadow-none overflow-hidden transition-3d-hover" href="<?= site_url('event');?>">
        <div class="row align-items-center">
          <div class="col-8 col-md-6">
            <div class="py-3 pl-4">
              <h2 class="h4">Event</h2>
              <span class="font-size-1 font-weight-bold">cari event <i class="fas fa-angle-right fa-sm ml-1"></i></span>
            </div>
          </div>
          <div class="col-4 col-md-6 px-0">
            <img class="img-fluid" src="<?= base_url();?>assets/frontend/svg/illustrations/calendar.svg" alt="SVG">
          </div>
        </div>
      </a>
      <!-- End Card -->
    </div>

    <div class="col-md-6 col-lg-4">
      <!-- Card -->
      <a class="card card-bg-light h-100 shadow-none overflow-hidden transition-3d-hover" href="<?= site_url('kompetisi');?>">
        <div class="row align-items-center">
          <div class="col-8 col-md-6">
            <div class="py-3 pl-4">
              <h2 class="h4">Kompetisi</h2>
              <span class="font-size-1 font-weight-bold">cari kompetisi <i class="fas fa-angle-right fa-sm ml-1"></i></span>
            </div>
          </div>
          <div class="col-4 col-md-6 px-0">
            <img class="img-fluid" src="<?= base_url();?>assets/frontend/svg/illustrations/communication.svg" alt="SVG">
          </div>
        </div>
      </a>
      <!-- End Card -->
    </div>
  </div>
</div>
<!-- End Articles Section -->

<!-- SVG Bottom Shape -->
<figure>
  <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%" height="64px"
  viewBox="0 0 1921 273" style="margin-bottom: -8px; enable-background:new 0 0 1921 273;" xml:space="preserve">
  <polygon fill="#f9fbff" points="1921,0 0,0 0,273 "/>
</svg>
</figure>
<!-- End SVG Bottom Shape -->


<?php if($event != false):?>
  <!-- Popular Categories Section -->
  <div class="space-bottom-2 space-bottom-lg-3" style="background: url(<?= base_url();?>assets/frontend/svg/components/abstract-shapes-9.svg) center no-repeat;">
    <div class="position-relative">
      <div class="container space-2">
        <!-- Title -->
        <div class="row align-items-md-center mb-7">
          <div class="col-md-6 mb-4 mb-md-0">
            <h2>Kegiatan terbaru.</h2>
          </div>
          <div class="col-md-6 text-md-right">
          </div>
        </div>
        <!-- End Title -->

        <div class="js-slick-carousel slick slick-equal-height slick-gutters-3 slick-center-mode-right slick-center-mode-right-offset"
        data-hs-slick-carousel-options='{
        "prevArrow": "<span class=\"fa fa-arrow-left slick-arrow slick-arrow-primary-white slick-arrow-left slick-arrow-centered-y shadow-soft rounded-circle ml-sm-n2\"></span>",
        "nextArrow": "<span class=\"fa fa-arrow-right slick-arrow slick-arrow-primary-white slick-arrow-right slick-arrow-centered-y shadow-soft rounded-circle mr-sm-2 mr-xl-4\"></span>",
        "slidesToShow": 5,
        "infinite": true,
        "responsive": [{
        "breakpoint": 1200,
        "settings": {
        "slidesToShow": 4
      }
    }, {
    "breakpoint": 992,
    "settings": {
    "slidesToShow": 3
  }
}, {
"breakpoint": 768,
"settings": {
"slidesToShow": 2
}
}, {
"breakpoint": 554,
"settings": {
"slidesToShow": 1
}
}]
}'>
<!-- Article -->
<?php foreach($event as $key):?>
  <article class="js-slide pt-2">
    <a class="card bg-img-hero w-100 min-h-270rem transition-3d-hover" href="<?= site_url($key->kegiatan == "kegiatan" ? 'event/'.$key->KODE : 'kompetisi/'.$key->KODE);?>" style="background-image: url(<?= base_url();?>assets/frontend/img/400x500/img<?= $key->kegiatan == "kegiatan" ? '13' : '14';?>.jpg);">
      <div class="card-body">
        <span class="d-block small text-white-70 font-weight-bold text-cap mb-2"><?= date("d F Y", strtotime($key->TANGGAL));?></span>
        <h4 class="text-white"><?= $key->JUDUL;?></h4>
        <span class="badge badge-info"><?= ($key->kegiatan == "kegiatan" ? 'event' : 'kompetisi');?></span>
      </div>
      <div class="card-footer border-0 bg-transparent pt-0">
        <span class="text-white font-size-1 font-weight-bold">Detail</span>
      </div>
    </a>
  </article>
  <!-- End Article -->
<?php endforeach;?>
</div>
</div>

<div class="w-100 w-md-65 bg-light position-absolute top-0 right-0 bottom-0 rounded-left z-index-n1"></div>
</div>
</div>
<!-- End Popular Categories Section -->
<?php endif;?>

<!-- Features Section -->
<div class="container space-2 space-lg-3">
  <!-- Title -->
  <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-5 mb-md-9">
    <span class="d-block small font-weight-bold text-cap mb-2">Fitur</span>
    <h2>Apa yang dapat kami sediakan?</h2>
  </div>
  <!-- End Title -->

  <!-- Icon Blocks -->
  <div class="row mb-5 mb-md-9">

    <div class="col-sm-6 col-md-4">
      <!-- Icon Block -->
      <div class="media align-items-center mb-2">
        <figure class="w-100 max-w-6rem mr-3">
          <img class="img-fluid" src="<?= base_url();?>assets/frontend/svg/icons/icon-6.svg" alt="SVG">
        </figure>
        <div class="media-body">
          <h4 class="mb-0">Realtime</h4>
        </div>
      </div>
      <p>Semua data kegiatan dapat diakses 24/7 secara realtime.</p>
      <!-- End Icon Block -->
    </div>

    <div class="col-sm-6 col-md-4 mb-3 mb-sm-7 mb-md-0">
      <!-- Icon Block -->
      <div class="media align-items-center mb-2">
        <figure class="w-100 max-w-6rem mr-3">
          <img class="img-fluid" src="<?= base_url();?>assets/frontend/svg/icons/icon-58.svg" alt="SVG">
        </figure>
        <div class="media-body">
          <h4 class="mb-0">Integrasi</h4>
        </div>
      </div>
      <p>Semua kegiatan saling terintegrasi pada akun yang bersangkutan.</p>
      <!-- End Icon Block -->
    </div>

    <div class="col-sm-6 col-md-4 mb-3 mb-sm-7 mb-md-0">
      <!-- Icon Block -->
      <div class="media align-items-center mb-2">
        <figure class="w-100 max-w-6rem mr-3">
          <img class="img-fluid" src="<?= base_url();?>assets/frontend/svg/icons/icon-40.svg" alt="SVG">
        </figure>
        <div class="media-body">
          <h4 class="mb-0">Penilaian</h4>
        </div>
      </div>
      <p>Lakukan proses penilaian kompetisi langsung pada 1 platfrom.</p>
      <!-- End Icon Block -->
    </div>
  </div>
  <!-- End Icon Blocks -->
</div>
<!-- End Features Section -->

<!-- SVG Top Shape -->
<figure>
  <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%" height="64px"
  viewBox="0 0 1921 273" style="margin-bottom: -8px; enable-background:new 0 0 1921 273;" xml:space="preserve">
  <polygon fill="#f9fbff" points="0,273 1921,273 1921,0 "/>
</svg>
</figure>
<!-- End SVG Top Shape -->

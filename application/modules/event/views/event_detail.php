<!-- Breadcrumb Section -->
<div class="container py-3 space-top-3 space-top-lg-3">
  <div class="row align-items-lg-center">
    <div class="col-lg mb-2 mb-lg-0">
      <!-- Breadcrumb -->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-no-gutter font-size-1 mb-0">
          <li class="breadcrumb-item"><a href="<?= site_url('penyelenggara') ?>">Penyelenggara</a></li>
          <li class="breadcrumb-item"><a href="<?= site_url('penyelenggara/'.$event->KODE_PENYELENGGARA) ?>"><?= $event->NAMA;?></a></li>
          <li class="breadcrumb-item">Event</li>
          <li class="breadcrumb-item active" aria-current="page"><?= $event->JUDUL;?></li>
        </ol>
      </nav>
      <!-- End Breadcrumb -->
    </div>

    <div class="col-lg-auto">
      <a class="btn btn-sm btn-ghost-secondary float-right" href="https://api.whatsapp.com/send?text=Hai, cek informasi penyelenggara <?= ucwords(strtolower($event->JUDUL)) ?> kami, lebih detail di <?php echo base_url(uri_string()); ?>" target="_blank">
        <i class="fab fa-whatsapp mr-2"></i> Share
      </a>
    </div>
  </div>
  <!-- End Row -->
</div>
<!-- End Breadcrumb Section -->

<!-- Page Header -->
<div class="container">
  <hr>

  <div class="page-header">

    <!-- Media -->
    <div class="d-sm-flex align-items-lg-center pt-1 px-0 pb-3">

      <div class="media-body">
        <div class="row">
          <div class="col-lg mb-3 mb-lg-0">
            <h1 class="h2 mb-1"><?= $event->JUDUL;?> <img class="avatar avatar-xs" src="<?= base_url();?>assets/frontend/svg/illustrations/top-vendor.svg" alt="Review rating" data-toggle="tooltip" data-placement="top" title="Verified"></h1>

            <!-- Rating List -->
            <div class="d-flex align-items-center">
              <span class="font-weight-bold text-dark ml-1">0</span>
              <span class="font-size-1 ml-1">Peserta</span>
              <span class="font-size-1 ml-2 pl-2 border-left font-weight-bold"><?= ($event->JENIS == 0 ? 'SEMINAR / WEBINAR' : ($event->JENIS == 1 ? 'KULIAH TAMU' : 'WORKSHOP'));?></span>
            </div>
            <!-- End Rating List -->
          </div>
          <?php if($this->session->userdata('logged_in') == FALSE || !$this->session->userdata('logged_in')) :?>
          <div class="col-lg-auto align-self-lg-end text-lg-right">
            <a class="btn btn-sm btn-outline-primary mb-1 mb-sm-0 <?= $CI->agent->is_mobile() ? 'btn-block' : '';?>" href="<?= site_url('login');?>">
              <i class="fas fa-plus fa-sm mr-1"></i> Login untuk daftar
            </a>
          </div>
          <?php else:;?>
            <?php if($event->STATUS_EVENT == 1):?>
              <div class="col-lg-auto align-self-lg-end text-lg-right">
                <a class="btn btn-sm btn-outline-primary mb-1 mb-sm-0 <?= $CI->agent->is_mobile() ? 'btn-block' : '';?>" href="<?= site_url('daftar/'.$event->KODE_EVENT);?>">
                  <?php if($daftar == true):?><i class="fas fa-check fa-sm mr-1"></i> Telah mendaftar <?php else:?><i class="fas fa-plus fa-sm mr-1"></i> Daftar<?php endif;?>
                </a>
              </div>
              <?php elseif ($event->STATUS_EVENT != 1) :?>
                <div class="col-lg-auto align-self-lg-end text-lg-right">
                  <a class="btn btn-sm btn-outline-primary mb-1 mb-sm-0 <?= $CI->agent->is_mobile() ? 'btn-block' : '';?>">
                    <?= ($event->STATUS_EVENT == 0 ? 'Belum dibuka' : 'Telah berakhir');?>
                  </a>
                </div>
              <?php endif;?>
            <?php endif;?>
          </div>
          <!-- End Row -->
        </div>
      </div>
      <!-- End Media -->

      <!-- Nav -->
      <ul class="nav nav-tabs page-header-tabs bg-white" id="pageHeaderTab" role="tablist">
        <li class="nav-item active">
          <a class="nav-link" href="#tentang-section">Tentang</a>
        </li>

        <?php if($tiket != false):?>
          <li class="nav-item">
            <a class="nav-link" href="#tiket-section">Tiket</a>
          </li>
        <?php endif;?>

        <?php if($contact != false):?>
          <li class="nav-item">
            <a class="nav-link" href="#contact-section">Contact Person</a>
          </li>
        <?php endif;?>
      </ul>
      <!-- End Nav -->
    </div>
  </div>
  <!-- End Page Header -->

  <!-- About Section -->
  <div id="tentang-section" class="container space-top-1">
    <h3>Tentang Event</h3>

    <div class="row mb-<?= $CI->agent->is_mobile() ? '0' : '5';?>">
      <div class="col-md-3 order-md-2 mb-3 mb-md-0">
        <div class="pl-md-4">
          <ul class="list-unstyled list-article">
            <li>
              <span class="h5 d-block">Penyelenggara</span>
              <span class="d-block font-size-1"><a href="<?= site_url('penyelenggara/'.$event->KODE_PENYELENGGARA) ?>"><?= $event->NAMA;?></a></span>
            </li>
            <li>
              <span class="h5 d-block">Tanggal</span>
              <span class="d-block font-size-1"><?= date("d F Y", strtotime($event->TANGGAL));?>, <?= $event->WAKTU;?> WIB</span>
            </li>

            <li>
              <span class="h5 d-block">FEE</span>
              <span class="d-block font-size-1"><?= $event->BAYAR == 0 ? 'FREE': 'Rp.'.($CI->M_event->get_tiketRange($event->KODE_EVENT)->low).' s/d '.'Rp.'.($CI->M_event->get_tiketRange($event->KODE_EVENT)->high) ;?></span>
            </li>

            <li>
              <span class="h5 d-block">PLATFORM</span>
              <span class="d-block font-size-1"><span class="badge badge-<?= $event->ONLINE == 1 ? 'primary' : 'secondary';?>"><?= $event->ONLINE == 1 ? 'ONLINE' : 'OFFLINE';?></span></span>
            </li>

            <li>
              <span class="h5 d-block">MEDIA / TEMPAT</span>
              <span class="d-block font-size-1"><?= $event->MEDIA;?></span>
            </li>
            <?php if($sosmed != false) :?>
              <li>
                <span class="h5 d-block">SOCIAL MEDIA</span>

                <ul class="list-inline">
                  <?php foreach ($sosmed as $key): ?>
                    <li class="list-inline-item">
                      <a class="icon icon-xs icon-soft-dark icon-circle" href="<?php echo $key->LINK_SOSMED;?>" data-toggle="tooltip" data-placement="top" title="<?= $key->NAMA_SOSMED;?> on <?= (isset($key->SOSMED) ? strtolower($key->SOSMED) : '');?>">
                        <i class="fab fa-<?= (isset($key->SOSMED) ? strtolower($key->SOSMED) : '');?>"></i>
                      </a>
                    </li>
                  <?php endforeach;?>
                </ul>
              </li>
            <?php endif;?>
          </ul>
        </div>
      </div>

      <div class="col-md-9">
        <div class="my-4">
          <div class="row">
            <div class="col-sm-5 col-lg-4 mb-3 mb-sm-0">
              <img class="card-img" src="<?= base_url();?><?= $event->POSTER == null ? "assets/frontend/img/400x500/img14.jpg" : "berkas/penyelenggara/".$event->KODE_PENYELENGGARA."/event/".$event->KODE_EVENT."/POSTER/".$event->POSTER;?>" alt="poster">
            </div>
            <div class="col-sm-7 col-lg-8">
              <?= substr($event->DESKRIPSI, strpos($event->DESKRIPSI, "<p"), strpos($event->DESKRIPSI, "</p>")+4);?>
              <?php if (!empty(substr($event->DESKRIPSI, strpos($event->DESKRIPSI, "</p>")))) : ?>
                <!-- Read More - Collapse -->
                <div class="collapse" id="collapseDescriptionSection">
                  <?= substr($event->DESKRIPSI, strpos($event->DESKRIPSI, "</p>"));?>
                </div>
                <!-- End Read More - Collapse -->
              <?php endif; ?>

              <?php if (!empty(substr($event->DESKRIPSI, strpos($event->DESKRIPSI, "</p>")))) : ?>
                <!-- Link -->
                <a class="link link-collapse small font-size-1 font-weight-bold" data-toggle="collapse" href="#collapseDescriptionSection" role="button" aria-expanded="false" aria-controls="collapseDescriptionSection">
                  <span class="link-collapse-default">Read more</span>
                  <span class="link-collapse-active">Read less</span>
                  <span class="link-icon ml-1">+</span>
                </a>
                <!-- End Link -->
              <?php endif; ?>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!-- End Row -->
  </div>
  <!-- Tentang Section -->

  <?php if($tiket != false):?>

    <!-- Divider -->
    <div class="container">
      <hr class="my-<?= $CI->agent->is_mobile() ? '2' : '10';?>">
    </div>
    <!-- End Divider -->

    <!-- Jobs Section -->
    <div id="tiket-section" class="container">
      <div class="mb-4">
        <h3>Tiket</h3>
        <p>Biaya pendaftaran yang harus dibayar saat melakukan pendaftaran.</p>
      </div>

      <!-- Slick Carousel -->
      <div class="js-slick-carousel slick slick-gutters-3 slick-equal-height mb-<?= $CI->agent->is_mobile() ? '2' : '7';?>"
        data-hs-slick-carousel-options='{
        "prevArrow": "<span class=\"fas fa-arrow-left slick-arrow slick-arrow-left slick-arrow-centered-y shadow-soft rounded-circle ml-sm-2 ml-md-n2\"></span>",
        "nextArrow": "<span class=\"fas fa-arrow-right slick-arrow slick-arrow-right slick-arrow-centered-y shadow-soft rounded-circle mr-sm-2 mr-md-n2\"></span>",
        "slidesToShow": 3,
        "responsive": [{
        "breakpoint": 992,
        "settings": {
        "slidesToShow": 2
      }
    }, {
    "breakpoint": 768,
    "settings": {
    "slidesToShow": 1
  }
}]
}'>

<?php foreach ($tiket as $key) : ?>
  <div class="js-slide mb-4">
    <!-- Card -->
    <div class="card card-bordered card-hover-shadow w-100">
      <div class="card-body">
        <h3 class="mb-3">
          <a class="text-dark">Tiket - <?= $key->NAMA_TIKET;?></a>
        </h3>

        <span class="font-size-1 text-body mb-1 mr-2"><?= ($key->HARGA_TIKET > 0 ? "Rp.".$key->HARGA_TIKET : "FREE");?></span>

        <span class="badge badge-soft-info mr-2">
          <span class="legend-indicator bg-info"></span><?= $event->ONLINE == 1 ? 'ONLINE' : 'OFFLINE';?>
        </span>
      </div>
    </div>
    <!-- End Card -->
  </div>
<?php endforeach;?>
</div>
<!-- End Slick Carousel -->
</div>
<!-- Jobs Section -->

<?php endif;?>

<?php if($contact != false):?>

  <!-- Divider -->
  <div class="container">
    <hr class="my-<?= $CI->agent->is_mobile() ? '2' : '10';?>">
  </div>
  <!-- End Divider -->

  <!-- Narasumber Section -->
  <div id="contact-section" class="container">
    <div class="mb-4">
      <h3>Contact Person</h3>
    </div>

    <div class="row mx-n2">
      <?php foreach ($contact as $key) : ?>
        <div class="col-12 col-sm-6 col-lg-4 px-2 mb-3">
          <!-- Card -->
          <a class="card card-bordered card-hover-shadow h-100" href="<?= $key->CONTACT_MEDIA == 'PHONE' ? 'tel:' : ($key->CONTACT_MEDIA == 'EMAIL' ? 'mailto:' : 'https://api.whatsapp.com/send?text=Hai&phone=');?><?= strtolower($key->CONTACT);?>">
            <div class="card-body">
              <div class="media align-items-center">
                <span class="avatar avatar bg-soft-secondary avatar-circle mr-3"><span class="contact-inisial"><?= strtoupper(substr($key->NAMA_CONTACT, 0, 2));?></span></span>
                <div class="media-body">
                  <h5 class="text-hover-primary mb-0"><?= $key->NAMA_CONTACT ;?></h5>
                  <small class="text-body"><?= $key->CONTACT;?></small>
                </div>
                <div class="pl-2 ml-auto">
                  <span class="text-muted text-hover-primary">
                    <i class="<?= $key->CONTACT_MEDIA == 'WHATSAPP' ? 'fab font-weight-normal font-size-2' : 'fas';?>  fa-<?= strtolower($key->CONTACT_MEDIA);?>"></i>
                  </span>
                </div>
              </div>
            </div>
          </a>
          <!-- End Card -->
        </div>
      <?php endforeach;?>
    </div>
    <!-- End Row -->
  </div>
  <!-- Narasumber Section -->

<?php endif;?>

<!-- Divider -->
<div class="container">
  <hr class="my-<?= $CI->agent->is_mobile() ? '2' : '10';?>">
</div>
<!-- End Divider -->

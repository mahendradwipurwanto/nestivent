<!-- Breadcrumb Section -->
<div class="container py-3 space-top-3 space-top-lg-3">
  <div class="row align-items-lg-center">
    <div class="col-lg mb-2 mb-lg-0">
      <!-- Breadcrumb -->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-no-gutter font-size-1 mb-0">
          <li class="breadcrumb-item"><a href="<?= site_url('penyelenggara') ?>">Penyelenggara</a></li>
          <li class="breadcrumb-item active" aria-current="page"><?= $penyelenggara->NAMA;?></li>
        </ol>
      </nav>
      <!-- End Breadcrumb -->
    </div>

    <div class="col-lg-auto">
      <a class="btn btn-sm btn-ghost-secondary" href="https://api.whatsapp.com/send?text=Hai, cek informasi penyelenggara <?= ucwords(strtolower($penyelenggara->NAMA)) ?> kami, lebih detail di <?php echo base_url(uri_string()); ?>" target="_blank">
        <i class="fab fa-whatsapp mr-2"></i> Share
      </a>
    </div>
  </div>
  <!-- End Row -->
</div>
<!-- End Breadcrumb Section -->

<!-- Profile Section -->
<div class="container space-bottom-2">
  <div class="row">
    <div id="stickyBlockStartPoint" class="col-md-5 col-lg-4 mb-7 mb-md-0">
      <div class="js-sticky-block card card-bordered p-4"
      data-hs-sticky-block-options='{
      "parentSelector": "#stickyBlockStartPoint",
      "breakpoint": "md",
      "startPoint": "#stickyBlockStartPoint",
      "endPoint": "#stickyBlockEndPoint",
      "stickyOffsetTop": 12,
      "stickyOffsetBottom": 12
    }'>
    <div class="text-center">
      <!-- User Content -->
      <img class="img-fluid rounded-circle mx-auto" src="<?= ($penyelenggara->LOGO == null ? base_url().'assets/frontend/img/100x100/img12.jpg' : base_url().'berkas/penyelenggara/'.$penyelenggara->KODE_PENYELENGGARA.'/'.$penyelenggara->LOGO);?>" alt="Image Description" width="120" height="120">

      <span class="d-block text-body font-size-1 mt-3">Joined from <?= date("d F Y", strtotime($penyelenggara->MAKE_DATE));?></span>

      <div class="mt-3">
        <?php if ($CI->M_penyelenggara->cek_hakPenyelenggara($penyelenggara->KODE_PENYELENGGARA) == TRUE) : ?>
          <a class="btn btn-sm btn-outline-primary transition-3d-hover" target="_blank" href="<?= site_url('k-panel/'.$penyelenggara->KODE_PENYELENGGARA);?>">
            <i class="fas fa-desktop mr-2"></i>
            Manage
          </a>
          <?php else: ?>
            <a class="btn btn-sm btn-outline-primary transition-3d-hover" data-toggle="modal" data-target="#kirimPesan">
              <i class="far fa-envelope mr-2"></i>
              Send Message
            </a>
          <?php endif;?>
        </div>
        <!-- End User Content -->
      </div>

      <div class="border-top pt-4 mt-4">
        <div class="row">

          <div class="col-6 col-md-12 col-lg-6">
            <!-- Icon Block -->
            <div class="d-flex">
              <span class="avatar avatar-xs mr-3">
                <img class="avatar-img" src="<?= base_url();?>assets/frontend/svg/illustrations/add-file.svg" alt="Image Description">
              </span>
              <span class="text-body font-size-1 mt-1"><?= $penyelenggara->JML_EVENT;?> event</span>
            </div>
            <!-- End Icon Block -->
          </div>

          <div class="col-6 col-md-12 col-lg-6 mb-4 col-6 col-md-12 mb-lg-0">
            <!-- Icon Block -->
            <div class="d-flex">
              <span class="avatar avatar-xs mr-3">
                <img class="avatar-img" src="<?= base_url();?>assets/frontend/svg/illustrations/medal.svg" alt="Image Description">
              </span>
              <span class="text-body font-size-1 mt-1"><?= $penyelenggara->JML_KOMPETISI;?>  kompetisi</span>
            </div>
            <!-- End Icon Block -->
          </div>
        </div>
      </div>
      <?php if ($penyelenggara->INSTAGRAM != null && $penyelenggara->TWITTER != null && $penyelenggara->FACEBOOK != null && $penyelenggara->GITHUB != null) : ?>
        <div class="border-top pt-4 mt-4">
          <h1 class="h4 mb-4">Connected accounts</h1>

          <div class="row">

            <?php if($penyelenggara->INSTAGRAM != null) :?>
              <div class="col-6 col-md-12 col-lg-6 mb-4">
                <!-- Social Profiles -->
                <a class="media" href="<?= $penyelenggara->INSTAGRAM;?>" target="_blank">
                  <div class="icon icon-xs icon-soft-secondary mr-3">
                    <i class="fab fa-instagram"></i>
                  </div>
                  <div class="media-body">
                    <span class="d-block font-size-1 font-weight-bold">Instagram</span>
                  </div>
                </a>
                <!-- End Social Profiles -->
              </div>
            <?php endif;?>

            <?php if($penyelenggara->TWITTER != null) :?>

              <div class="col-6 col-md-12 col-lg-6 mb-0 mb-md-4 mb-lg-0">
                <!-- Social Profiles -->
                <a class="media" href="<?= $penyelenggara->TWITTER;?>" target="_blank">
                  <div class="icon icon-xs icon-soft-secondary mr-3">
                    <i class="fab fa-twitter"></i>
                  </div>
                  <div class="media-body">
                    <span class="d-block font-size-1 font-weight-bold">Twitter</span>
                  </div>
                </a>
                <!-- End Social Profiles -->
              </div>
            <?php endif;?>

            <?php if($penyelenggara->FACEBOOK != null) :?>

              <div class="col-6 col-md-12 col-lg-6">
                <!-- Social Profiles -->
                <a class="media" href="<?= $penyelenggara->FACEBOOK;?>" target="_blank">
                  <div class="icon icon-xs icon-soft-secondary mr-3">
                    <i class="fab fa-facebook-f"></i>
                  </div>
                  <div class="media-body">
                    <span class="d-block font-size-1 font-weight-bold">Facebook</span>
                  </div>
                </a>
                <!-- End Social Profiles -->
              </div>
            <?php endif;?>

            <?php if($penyelenggara->GITHUB != null) :?>

              <div class="col-6 col-md-12 col-lg-6 mb-4">
                <!-- Social Profiles -->
                <a class="media" href="<?= $penyelenggara->GITHUB;?>" target="_blank">
                  <div class="icon icon-xs icon-soft-secondary mr-3">
                    <i class="fab fa-github"></i>
                  </div>
                  <div class="media-body">
                    <span class="d-block font-size-1 font-weight-bold">Github</span>
                  </div>
                </a>
                <!-- End Social Profiles -->
              </div>
            <?php endif;?>
          </div>
        </div>
      <?php endif;?>
      <div class="border-top text-center pt-4 mt-4">
        <?php if ($this->session->userdata('logged_in') == TRUE  && $this->session->userdata("role") == 0) :?>
          <a class="btn btn-ghost-secondary btn-sm btn-pill small" data-toggle="modal" data-target="#suspendPenyelenggara<?= $penyelenggara->KODE_PENYELENGGARA;?>">
            <i class="far fa-flag mr-1"></i> Suspend penyelenggara
          </a>
          <?php else: ?>
            <a class="btn btn-ghost-secondary btn-sm btn-pill small" data-toggle="modal" data-target="#laporPenyelenggara<?= $penyelenggara->KODE_PENYELENGGARA;?>">
              <i class="far fa-flag mr-1"></i> Laporkan penyelenggara
            </a>
          <?php endif;?>
        </div>
      </div>
    </div>

    <div class="col-md-7 col-lg-8">
      <div class="ml-lg-6">
        <div class="mb-3 mb-sm-0 mr-2">
          <h2><?= $penyelenggara->NAMA;?></h2>
        </div>
        <?= substr($penyelenggara->DESKRIPSI, strpos($penyelenggara->DESKRIPSI, "<p"), strpos($penyelenggara->DESKRIPSI, "</p>")+4);?>
        <?php if (!empty(substr($penyelenggara->DESKRIPSI, strpos($penyelenggara->DESKRIPSI, "</p>")))) : ?>
          <!-- Read More - Collapse -->
          <div class="collapse" id="collapseDescriptionSection">
            <?= substr($penyelenggara->DESKRIPSI, strpos($penyelenggara->DESKRIPSI, "</p>"));?>
          </div>
          <!-- End Read More - Collapse -->
        <?php endif; ?>

        <?php if (!empty(substr($penyelenggara->DESKRIPSI, strpos($penyelenggara->DESKRIPSI, "</p>")))) : ?>
          <!-- Link -->
          <a class="link link-collapse small font-size-1 font-weight-bold" data-toggle="collapse" href="#collapseDescriptionSection" role="button" aria-expanded="false" aria-controls="collapseDescriptionSection">
            <span class="link-collapse-default">Read more</span>
            <span class="link-collapse-active">Read less</span>
            <span class="link-icon ml-1">+</span>
          </a>
          <!-- End Link -->
        <?php endif; ?>

        <?php if($event != false):?>
          <!-- Event -->
          <div class="border-top pt-5 mt-5">
            <h3 class="h5 mb-4">Event penyelenggara</h3>

            <div class="row mx-n2 mx-lg-n3">
              <?php foreach($event as $key):?>
                <!-- Article -->
                <article class="col-sm-6 col-lg-4 px-2 px-lg-3 mb-3">
                  <a class="card bg-img-hero w-100 min-h-270rem transition-3d-hover" href="<?= site_url('event/'.$key->KODE_EVENT);?>" style="background-image: url(<?= base_url();?>assets/frontend/img/400x500/img13.jpg);">
                    <div class="card-body">
                      <span class="d-block small text-white-70 font-weight-bold text-cap mb-2"><?= ($key->JENIS == 0 ? 'SEMINAR / WEBINAR' : ($key->JENIS == 1 ? 'KULIAH TAMU' : 'WORKSHOP'));?></span>
                      <h3 class="text-white"><?= $key->JUDUL;?></h3>
                      <span class="badge badge-info"><?= $key->STATUS_EVENT == 0 ? 'belum dibuka' : ($key->STATUS_EVENT == 1 ? 'berlangsung' : 'berakhir');?></span>
                    </div>
                    <div class="card-footer border-0 bg-transparent pt-0">
                      <span class="text-white font-size-1 font-weight-bold">Lebih lanjut</span>
                    </div>
                  </a>
                </article>
                <!-- End Article -->
              <?php endforeach;?>
            </div>
          </div>
          <!-- End Event -->
        <?php endif;?>

        <?php if($kompetisi != false):?>

          <!-- Kompetisi -->
          <div class="border-top pt-5 mt-5">
            <h3 class="mb-4">kompetisi penyelenggara</h3>

            <?php foreach($kompetisi as $key):?>
              <!-- Kompetisi -->
              <div class="pt-0 mt-0">
                <a class="card shadow-none" href="<?= site_url('kompetisi/'.$key->KODE_KOMPETISI);?>">
                  <div class="card-body p-0">
                    <div class="row">
                      <div class="col-sm-5 col-lg-3 mb-3 mb-sm-0">
                        <img class="img-fluid rounded" src="<?= base_url();?>assets/frontend/svg/components/graphics-4.svg" alt="Image Description">
                      </div>
                      <div class="col-sm-7 col-lg-9">
                        <div class="row">
                          <div class="col-lg-6 mb-2 mb-lg-0">
                            <h5 class="text-hover-primary"><?= $key->JUDUL;?></h5>
                            <div class="d-flex align-items-center flex-wrap">
                              <span class="d-inline-block">
                                <span class="text-dark font-size-1 mr-1"><?= substr(strip_tags($key->DESKRIPSI), 0, 50);?></span>
                              </span>
                            </div>
                          </div>

                          <div class="col-lg-6">
                            <div class="row">
                              <div class="col-7">
                                <div class="small text-muted mb-2">
                                  <i class="fas fa-book-reader mr-1"></i>
                                  <?= $CI->M_penyelenggara->count_BidangLomba($key->KODE_KOMPETISI) != false ? $CI->M_penyelenggara->count_BidangLomba($key->KODE_KOMPETISI) : 0;?> bidang lomba
                                </div>
                                <div class="small text-muted">
                                  <i class="fas fa-clock mr-1"></i>
                                  <?= date("d F Y", strtotime($key->TANGGAL));?>
                                </div>
                              </div>
                              <div class="col-5 text-right">
                                <span class="h2 badge badge-<?= $key->STATUS_KOMPETISI == 0 ? 'secondary' : ($key->STATUS_KOMPETISI == 1 ? 'success' : 'primary');?> text-white mb-0"><?= $key->STATUS_KOMPETISI == 0 ? 'belum dibuka' : ($key->STATUS_KOMPETISI == 1 ? 'berlangsung' : 'berakhir');?></span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <!-- End Kompetisi -->
            <?php endforeach;?>
          </div>
          <!-- End Kompetisi -->
        <?php endif;?>

        <!-- terima Modal -->
        <div class="modal fade bd-example-modal-sm"id="suspendPenyelenggara<?= $penyelenggara->KODE_PENYELENGGARA;?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title h4" id="mySmallModalLabel">Suspend Penyelenggara</h5>
                <button type="button" class="btn btn-xs btn-icon btn-ghost-secondary" data-dismiss="modal" aria-label="Close">
                  <i class="tio-clear tio-lg"></i>
                </button>
              </div>          
              <div class="modal-body">
                <?php if ($this->session->userdata("logged_in") == TRUE || $this->session->userdata("role") == 0): ?>
                <form action="<?= site_url('suspend-penyelenggara') ?>" method="POST">
                  <input type="hidden" name="KODE_PENYELENGGARA" value="<?= $penyelenggara->KODE_PENYELENGGARA ?>">
                  <p>Kirim pesan ke penyelenggara?</p>
                  <div class="form-group">
                    <label class="title">Isi pesan anda <small class="text-danger">*</small></label>
                    <textarea class="form-control" rows="3" name="PESAN"></textarea>
                  </div>
                  <div class="modal-footer px-0">
                    <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-sm btn-info mr-0">Suspend</button>
                  </div>
                </form>
                <?php else:?>
                  <div class="alert alert-danger">
                    Opss... Harap masuk kedalam akun ADMIN anda untuk dapat me-suspend ke penyelenggara ini!!
                  </div>
                <?php endif;?>
              </div>
            </div>
          </div>
        </div>
        <!-- End terima Modal -->

        <!-- terima Modal -->
        <div class="modal fade bd-example-modal-sm"id="kirimPesan" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title h4" id="mySmallModalLabel">Kirim pesan</h5>
                <button type="button" class="btn btn-xs btn-icon btn-ghost-secondary" data-dismiss="modal" aria-label="Close">
                  <i class="tio-clear tio-lg"></i>
                </button>
              </div>          
              <div class="modal-body">
                <?php if ($this->session->userdata("logged_in") == TRUE): ?>
                  <form action="<?= site_url('kirim-pesan-penyelenggara') ?>" method="POST">
                    <input type="hidden" name="KODE_PENYELENGGARA" value="<?= $penyelenggara->KODE_PENYELENGGARA ?>">
                    <p>Kirim pesan ke penyelenggara?</p>
                    <div class="form-group">
                      <label class="title">Isi pesan anda <small class="text-danger">*</small></label>
                      <textarea class="form-control" rows="3" name="PESAN"></textarea>
                    </div>
                    <div class="modal-footer px-0">
                      <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-sm btn-info mr-0">Kirim pesan</button>
                    </div>
                  </form>
                  <?php else:?>
                    <div class="alert alert-danger">
                      Opss... Harap masuk kedalam akun pengguna anda untuk dapat mengirim pesan ke penyelenggara ini!!
                    </div>
                  <?php endif;?>
                </div>
              </div>
            </div>
          </div>
          <!-- End terima Modal -->

          <!-- terima Modal -->
          <div class="modal fade bd-example-modal-sm"id="laporPenyelenggara<?= $penyelenggara->KODE_PENYELENGGARA;?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title h4" id="mySmallModalLabel">Laporkan penyelenggara</h5>
                  <button type="button" class="btn btn-xs btn-icon btn-ghost-secondary" data-dismiss="modal" aria-label="Close">
                    <i class="tio-clear tio-lg"></i>
                  </button>
                </div>          
                <div class="modal-body">
                  <?php if ($this->session->userdata("logged_in") == TRUE): ?>
                    <form action="<?= site_url('laporkan-penyelenggara') ?>" method="POST">
                      <input type="hidden" name="KODE_PENYELENGGARA" value="<?= $penyelenggara->KODE_PENYELENGGARA ?>">
                      <p>Laporkan penyelenggara?</p>
                      <div class="form-group">
                        <label class="title">Sematkan alasan <small class="text-danger">*</small></label>
                        <textarea class="form-control" rows="3" name="PESAN"></textarea>
                      </div>
                      <div class="modal-footer px-0">
                        <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-sm btn-danger mr-0">Lapor</button>
                      </div>
                    </form>
                    <?php else:?>
                      <div class="alert alert-danger">
                        Opss... Harap masuk kedalam akun pengguna anda untuk melaporkan penyelenggara ini!!
                      </div>
                    <?php endif;?>
                  </div>
                </div>
              </div>
            </div>
            <!-- End terima Modal -->

            <!-- Sticky Block End Point -->
            <div id="stickyBlockEndPoint"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Profile Section -->

<!-- Breadcrumb Section -->
<div class="bg-dark" style="background-image: url(<?= base_url();?>assets/frontend/svg/components/abstract-shapes-20.svg);">
  <div class="container space-3 space-top-lg-3 space-bottom-lg-3">
    <div class="row align-items-center">
      <div class="col">
        <div class="d-none d-lg-block">
          <h1 class="h2 text-white"><?= ($this->uri->segment(1) ? ucwords(str_replace('-', ' ', $this->uri->segment(1))) : 'APTISI 7 JATIM');?></h1>
        </div>

        <!-- Breadcrumb -->
        <ol class="breadcrumb breadcrumb-light breadcrumb-no-gutter mb-0">
          <li class="breadcrumb-item">Dashboard</li>
          <li class="breadcrumb-item active" aria-current="page"><?= ($this->uri->segment(2) ? ucwords(str_replace('-', ' ', $this->uri->segment(2))) : '');?></li>
        </ol>
        <!-- End Breadcrumb -->
      </div>

      <div class="col-auto">
        <div class="d-none d-lg-block">
          <a class="btn btn-sm btn-soft-light" href="<?= site_url('logout') ?>">Log out</a>
        </div>

        <!-- Responsive Toggle Button -->
        <button type="button" class="navbar-toggler btn btn-icon btn-sm rounde-circle d-lg-none"
        aria-label="Toggle navigation"
        aria-expanded="false"
        aria-controls="sidebarNav"
        data-toggle="collapse"
        data-target="#sidebarNav">
        <span class="navbar-toggler-default">
          <svg width="14" height="14" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
            <path fill="currentColor" d="M17.4,6.2H0.6C0.3,6.2,0,5.9,0,5.5V4.1c0-0.4,0.3-0.7,0.6-0.7h16.9c0.3,0,0.6,0.3,0.6,0.7v1.4C18,5.9,17.7,6.2,17.4,6.2z M17.4,14.1H0.6c-0.3,0-0.6-0.3-0.6-0.7V12c0-0.4,0.3-0.7,0.6-0.7h16.9c0.3,0,0.6,0.3,0.6,0.7v1.4C18,13.7,17.7,14.1,17.4,14.1z"/>
          </svg>
        </span>
        <span class="navbar-toggler-toggled">
          <svg width="14" height="14" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
            <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z"/>
          </svg>
        </span>
      </button>
      <!-- End Responsive Toggle Button -->
    </div>
  </div>
</div>
</div>
<!-- End Breadcrumb Section -->

<!-- Content Section -->
<div class="container space-1 space-top-lg-0 space-bottom-lg-2 mt-lg-n10">
  <div class="row">
    <div class="col-lg-3">
      <!-- Navbar -->
      <div class="navbar-expand-lg navbar-expand-lg-collapse-block navbar-light">
        <div id="sidebarNav" class="collapse navbar-collapse navbar-vertical">
          <!-- Card -->
          <div class="card mb-5">
            <div class="card-body">
              <!-- Avatar -->
              <div class="d-none d-lg-block text-center mb-5">
                <div class="avatar avatar-xxl avatar-circle mb-3">
                  <?php if ($pFoto->PROFIL == null) {?>
                    <img class="avatar-img cursor" data-toggle="modal" data-target="#ubah_profil" src="<?= base_url();?>assets/frontend/img/100x100/img12.jpg" alt="<?= $this->session->userdata('nama') ?>">
                  <?php }else { ?>
                    <img class="avatar-img cursor" data-toggle="modal" data-target="#ubah_profil" src="<?= base_url();?>berkas/pengguna/<?= $this->session->userdata('kode_user') ?>/foto/<?= $pFoto->PROFIL ?>" alt="<?= $this->session->userdata('nama') ?>">
                  <?php } ?>
                  <?php if ($kPanel == TRUE) { ?>
                    <img class="avatar-status avatar-lg-status" src="<?= base_url();?>assets/frontend/svg/illustrations/top-vendor.svg" alt="Image Description" data-toggle="tooltip" data-placement="top" title="AKSES K-PANEL">
                  <?php }?>
                </div>

                <h4 class="card-title"><?php $nama = explode(" ", $this->session->userdata('nama')); echo $nama[0]; ?></h4>
                <p class="card-text font-size-1">
                  <?= mb_substr($this->session->userdata('email'), 0, 3) ?>***
                  @<?php $mail = explode("@", $this->session->userdata('email')); echo $mail[1]; ?>
                </p>
              </div>
              <!-- End Avatar -->

              <!-- CHANGE FOTO PROFIL -->

              <div id="ubah_profil" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ubah_profil" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                  <div class="modal-content">
                    <form action="<?= site_url('pengguna/ubah_foto') ?>" method="post" enctype="multipart/form-data">
                      <div class="modal-body">
                        <!-- Form Group -->
                        <div class="form-group mx-auto">
                          <label for="fotoLabel" class="input-label">Foto Profl</label>
                          <label for="GETP_FOTO" class="upload-card mx-auto">
                            <img id="P_FOTO" class="upload-img w-100 P_FOTO cursor" src="<?php echo base_url();?>assets/frontend/img/others/Pickanimage.png" alt="Placeholder">
                          </label>
                          <input type="file" id="GETP_FOTO" class="form-control-file hidden" name="profil"  onchange="previewP_FOTO(this);" accept="image/*">
                          <small class="text-muted">Max 2Mb size, and use 1:1 ratio.</small>
                        </div>
                        <!-- End Form Group -->
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-sm btn-primary">Ubah foto</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <script type="text/javascript">

              function previewP_FOTO(input){
                $(".P_FOTO").removeClass('hidden');
                var file = $("#GETP_FOTO").get(0).files[0];

                if(file){
                  var reader = new FileReader();

                  reader.onload = function(){
                    $("#P_FOTO").attr("src", reader.result);
                  }

                  reader.readAsDataURL(file);
                }
              }
              </script>
              <!-- END CHANGE FOTO PROFIL -->

              <!-- Nav -->
              <h6 class="text-cap small">Dashboard</h6>

              <!-- List -->
              <ul class="nav nav-sub nav-sm nav-tabs nav-list-y-2 mb-4">
                <li class="nav-item">
                  <a class="nav-link <?= ($this->uri->segment(1) == "pengguna" && empty($this->uri->segment(2)) ? "active" : "") ?>" href="<?= site_url('pengguna') ?>">
                    <i class="fas fa-id-card nav-icon"></i> Dashboard
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?= ($this->uri->segment(2) == "notifikasi" ? "active" : "") ?>" href="<?= site_url('pengguna/notifikasi') ?>">
                    <i class="fas fa-bell nav-icon"></i> Notifikasi
                    <?= ($c_notifikasi > 0 ? '<span class="badge badge-soft-dark badge-pill nav-link-badge">'.$c_notifikasi.'</span>' : '') ?>
                  </a>
                </li>
                <?php if ($kPanel == TRUE) { ?>
                  <li class="nav-item">
                    <a class="nav-link <?= ($this->uri->segment(1) == "k-panel" ? "active" : "") ?>" href="<?= site_url('k-panel') ?>">
                      <i class="fas fa-bell nav-icon"></i> K-Panel
                      <span class="badge badge-soft-dark badge-pill nav-link-badge">1</span>
                    </a>
                  </li>
                <?php } ?>
                <li class="nav-item">
                  <a class="nav-link <?= ($this->uri->segment(2) == "pengaturan" ? "active" : "") ?>" href="<?= site_url('pengguna/pengaturan') ?>">
                    <i class="fas fa-sliders-h nav-icon"></i> Pengaturan
                  </a>
                </li>
              </ul>
              <!-- End List -->

              <h6 class="text-cap small">Kegiatan</h6>

              <!-- List -->
              <ul class="nav nav-sub nav-sm nav-tabs nav-list-y-2 mb-4">
                <li class="nav-item">
                  <a class="nav-link <?= ($this->uri->segment(2) == "kompetisi" ? "active" : "") ?>" href="<?= site_url('pengguna/kompetisi') ?>">
                    <i class="fas fa-shopping-basket nav-icon"></i> Kompetisi
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?= ($this->uri->segment(2) == "event" ? "active" : "") ?>" href="<?= site_url('pengguna/event') ?>">
                    <i class="fas fa-users nav-icon"></i> Event
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?= ($this->uri->segment(2) == "sertifikat" ? "active" : "") ?>" href="<?= site_url('pengguna/sertifikat') ?>">
                    <i class="fas fa-users nav-icon"></i> Sertifikat
                  </a>
                </li>
              </ul>
              <!-- End List -->

              <div class="d-lg-none">
                <div class="dropdown-divider"></div>

                <!-- List -->
                <ul class="nav nav-sub nav-sm nav-tabs nav-list-y-2">
                  <li class="nav-item">
                    <a class="nav-link text-primary" href="<?= site_url('logout') ?>">
                      <i class="fas fa-sign-out-alt nav-icon"></i> Log out
                    </a>
                  </li>
                </ul>
                <!-- End List -->
              </div>
              <!-- End Nav -->
            </div>
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Navbar -->
    </div>

    <div class="col-lg-9">

<div id="navBar" class="collapse navbar-collapse navbar-nav-wrap-collapse">
  <div class="navbar-body header-abs-top-inner">
    <ul class="navbar-nav">
      <!-- Home -->
      <li class="navbar-nav-item">
        <a class="nav-link" href="<?= base_url() ?>">Home</a>
      </li>
      <!-- End Home -->

      <!-- penyelenggara -->
      <li class="hs-has-mega-menu navbar-nav-item" data-hs-mega-menu-item-options='{
        "desktop":{
        "position": "right",
        "maxWidth": "900px"
        }
      }'>
      <a id="penyelenggaraMegaMenu" class="hs-mega-menu-invoker nav-link nav-link-toggle " href="javascript:;" aria-haspopup="true" aria-expanded="false">Penyelenggara</a>

      <!-- penyelenggara - Mega Menu -->
      <div class="hs-mega-menu dropdown-menu w-<?= $CI->agent->is_mobile() ? '100' : '60';?>" aria-labelledby="penyelenggaraMegaMenu">
        <div class="row no-gutters">
          <div class="col-12">
            <?php if ($mega_penyelenggara == false) : ?>
              <div class="navbar-promo-card-deck">
                <!-- penyelenggara menu Item -->
                <div class="navbar-promo-card navbar-promo-item">
                  <a class="navbar-promo-link" href="<?= site_url('penyelenggara') ?>">
                    <div class="media align-items-center">
                      <img class="navbar-promo-icon" src="<?= base_url();?>assets/frontend/svg/icons/icon-63.svg" alt="SVG">
                      <div class="media-body">
                        <span class="navbar-promo-title">Lainnya</span>
                        <span class="navbar-promo-text">Lihat semua penyelenggara</span>
                      </div>
                    </div>
                  </a>
                </div>
                <!-- End penyelenggara menu Item -->
              </div>

              <?php else: ?>
                <?php $i=1; foreach ($mega_penyelenggara as $key) : ?>
                <?php if ($i%2 == 1) :?>
                  <div class="navbar-promo-card-deck">
                  <?php endif;?>
                  <!-- penyelenggara menu Item -->
                  <div class="navbar-promo-card navbar-promo-item">
                    <a class="navbar-promo-link" href="<?= site_url('penyelenggara/'.$key->KODE_PENYELENGGARA) ?>">
                      <div class="media align-items-center">
                        <img class="navbar-promo-icon" src="<?= base_url();?>assets/frontend/svg/icons/icon-<?php $a = rand(1, 4); if($a == 1){ echo 67;}elseif($a == 2){echo 19; }elseif($a == 3){echo 45;}elseif($a == 3){echo 7;}else{ echo 13; }?>.svg" alt="SVG">
                        <div class="media-body">
                          <span class="navbar-promo-title"><?= $key->NAMA;?></span>
                          <span class="navbar-promo-text"><?= $key->INSTANSI;?></span>
                        </div>
                      </div>
                    </a>
                  </div>
                  <?php if ($i%2 == 0) :?>
                  </div>
                <?php endif;?>
                <!-- End penyelenggara menu Item -->
                <?php if ($i >= count($mega_penyelenggara)) : ?>
                  <?php if ($i%2 == 0) :?> 
                    <div class="navbar-promo-card-deck">
                    <?php endif;?>
                    <!-- penyelenggara menu Item -->
                    <div class="navbar-promo-card navbar-promo-item">
                      <a class="navbar-promo-link" href="<?= site_url('penyelenggara') ?>">
                        <div class="media align-items-center">
                          <img class="navbar-promo-icon" src="<?= base_url();?>assets/frontend/svg/icons/icon-63.svg" alt="SVG">
                          <div class="media-body">
                            <span class="navbar-promo-title">Lainnya</span>
                            <span class="navbar-promo-text">Lihat semua penyelenggara</span>
                          </div>
                        </div>
                      </a>
                    </div>
                    <!-- End penyelenggara menu Item -->
                    <?php if ($i%2 == 1) :?>
                    </div>
                  <?php endif;?>
                  <?php if ($i%2 == 0) :?>
                  </div>
                <?php endif;?>
              <?php endif;?>
              <?php $i++; endforeach;?>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <!-- End penyelenggara - Mega Menu -->
    </li>
    <!-- End penyelenggara -->

    <!-- Kegiatan -->
    <li class="hs-has-mega-menu navbar-nav-item" data-hs-mega-menu-item-options='{
      "desktop": {
      "position": "right",
      "maxWidth": "260px"
      }
      }'>
      <a id="kegiatanMegaMenu" class="hs-mega-menu-invoker nav-link nav-link-toggle" href="javascript:;" aria-haspopup="true" aria-expanded="false">Kegiatan</a>

      <!-- Kegiatan - Submenu -->
      <div class="hs-mega-menu dropdown-menu" aria-labelledby="kegiatanMegaMenu" style="min-width: 330px;">
        <!-- Kegiatan Item -->
        <div class="navbar-promo-item">
          <a class="navbar-promo-link" href="<?= site_url('kompetisi') ?>">
            <div class="media align-items-center">
              <img class="navbar-promo-icon" src="<?= base_url();?>assets/frontend/svg/icons/icon-40.svg" alt="SVG">
              <div class="media-body">
                <span class="navbar-promo-title">
                  Kompetisi
                  <span class="badge badge-secondary badge-pill ml-1">Starred</span>
                </span>
                <small class="navbar-promo-text">Kegiatan kompetisi</small>
              </div>
            </div>
          </a>
        </div>
        <!-- End Kegiatan Item -->

        <!-- Kegiatan Item -->
        <div class="navbar-promo-item">
          <a class="navbar-promo-link" href="<?= site_url('event') ?>">
            <div class="media align-items-center">
              <img class="navbar-promo-icon" src="<?= base_url();?>assets/frontend/svg/icons/icon-33.svg" alt="SVG">
              <div class="media-body">
                <span class="navbar-promo-title">Event</span>
                <small class="navbar-promo-text">Event (Seminar, Workshop)</small>
              </div>
            </div>
          </a>
        </div>
        <!-- End Kegiatan Item -->
      </div>
      <!-- End Kegiatan - Submenu -->
      </li>
      <!-- End Kegiatan -->

      <!-- Layanan -->
      <li class="hs-has-sub-menu navbar-nav-item">
        <a id="blogMegaMenu" class="hs-mega-menu-invoker nav-link nav-link-toggle " href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-labelledby="blogSubMenu">Layanan</a>

        <!-- Blog - Submenu -->
        <div id="blogSubMenu" class="hs-sub-menu dropdown-menu" aria-labelledby="blogMegaMenu" style="min-width: 230px;">
          <a class="dropdown-item" href="<?= site_url('blog') ?>">Blog</a>
          <a class="dropdown-item" href="<?= site_url('hire-us') ?>">Hire Us</a>
          <a class="dropdown-item" href="<?= site_url('careers') ?>">Careers <?php if($OPEN_CAREER == 1):?><span class="badge badge-primary ml-1">We're hiring</span><?php endif;?></a>
        </div>
        <!-- End Submenu -->
      </li>
      <!-- End Layanan -->
      <?php if ($this->session->userdata('logged_in') == false || !$this->session->userdata('logged_in')):?>
        <!-- Button -->
        <li class="navbar-nav-last-item d-block d-sm-none">
          <a class="btn btn-sm btn-primary btn-block transition-3d-hover" href="<?= site_url('login');?>">masuk ke akun</a>
        </li>
        <!-- End Button -->
      <?php endif;?>
    </ul>
  </div>
</div>

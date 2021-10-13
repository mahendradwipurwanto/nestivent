<aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered  ">
  <div class="navbar-vertical-container">
    <div class="navbar-vertical-footer-offset">
      <div class="navbar-brand-wrapper justify-content-between">
        <!-- Logo -->
        <a class="navbar-brand" href="<?= base_url() ?>" aria-label="Front">
          <img class="navbar-brand-logo" src="<?= base_url();?>assets/<?= $LOGO_BLACK;?>" alt="Logo">
          <img class="navbar-brand-logo-mini" src="<?= base_url();?>assets/<?= $LOGO_FAV;?>" alt="Logo">
        </a>
        <!-- End Logo -->

        <!-- Navbar Vertical Toggle -->
        <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-vertical-aside-toggle btn btn-icon btn-xs btn-ghost-dark">
          <i class="tio-clear tio-lg"></i>
        </button>
        <!-- End Navbar Vertical Toggle -->
      </div>

      <!-- Content -->
      <div class="navbar-vertical-content">
        <ul class="navbar-nav navbar-nav-lg nav-tabs">
          <!-- Dashboards -->

          <li class="nav-item ">
            <a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(1) == 'manage-kompetisi' && empty($this->uri->segment(2)) ? 'active' : '') ?>" href="<?= site_url('manage-kompetisi') ?>" title="Dashboard" data-placement="left">
              <i class="tio-dashboard-vs-outlined nav-icon"></i>
              <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Dashboard</span>
            </a>
          </li>

          <li class="navbar-vertical-aside-has-menu <?= ($this->uri->segment(2) == 'notifikasi-kompetisi' || $this->uri->segment(2) == 'aktivitas-kompetisi' ? 'show' : '') ?>">
            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Pages">
              <i class="tio-browser-windows nav-icon"></i>
              <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Sistem</span>
            </a>

            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">

              <li class="nav-item ">
                <a class="nav-link <?= ($this->uri->segment(2) == 'notifikasi-kompetisi' ? 'active' : '') ?>" href="<?= site_url('manage-kompetisi/notifikasi-kompetisi') ?>" title="Notifikasi">
                  <span class="tio-circle nav-indicator-icon"></span>
                  <span class="">Notifikasi</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link <?= ($this->uri->segment(2) == 'aktivitas-kompetisi' ? 'active' : '') ?>" href="<?= site_url('manage-kompetisi/aktivitas-kompetisi') ?>" title="Aktivitas">
                  <span class="tio-circle nav-indicator-icon"></span>
                  <span class="text-truncate">Aktivitas</span>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item ">
            <a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(2) == 'pengaturan' ? 'active' : '') ?>" href="<?= site_url('manage-kompetisi/pengaturan') ?>" title="Pengaturan" data-placement="left">
              <i class="tio-tune nav-icon"></i>
              <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Pengaturan</span>
            </a>
          </li>
          <!-- End Dashboards -->

          <li class="nav-item">
            <small class="nav-subtitle" title="Data Kompetisi">Data Kompetisi</small>
            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
          </li>

          <li class="nav-item ">
            <a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(2) == 'bidang-lomba' ? 'active' : '') ?>" href="<?= site_url('manage-kompetisi/bidang-lomba') ?>" title="Bidang Lomba" data-placement="left">
              <i class="tio-albums nav-icon"></i>
              <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Bidang Lomba</span>
            </a>
          </li>
          <!-- End Dashboards -->

          <li class="nav-item ">
            <a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(2) == 'tahap-penilaian' ? 'active' : '') ?>" href="<?= site_url('manage-kompetisi/tahap-penilaian') ?>" title="Tahap Penilaian" data-placement="left">
              <i class="tio-blend-tool nav-icon"></i>
              <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Tahap Penilaian</span>
            </a>
          </li>
          <!-- End Dashboards -->

          <li class="nav-item ">
            <a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(2) == 'kriteria-penilaian' ? 'active' : '') ?>" href="<?= site_url('manage-kompetisi/kriteria-penilaian') ?>" title="Kriteria Penilaian" data-placement="left">
              <i class="tio-category-outlined nav-icon"></i>
              <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Kriteria Penilaian</span>
            </a>
          </li>
          <!-- End Dashboards -->

          <li class="nav-item ">
            <a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(2) == 'data-juri' ? 'active' : '') ?>" href="<?= site_url('manage-kompetisi/data-juri') ?>" title="Data Juri" data-placement="left">
              <i class="tio-user nav-icon"></i>
              <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Data Juri</span>
            </a>
          </li>
          <!-- End Dashboards -->
          <!-- Pengguna -->
          <li class="navbar-vertical-aside-has-menu <?= ($this->uri->segment(2) == 'atur-pendaftaran' || $this->uri->segment(2) == 'data-peserta' ? 'show' : '') ?>">
            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Pendaftaran">
              <i class="tio-file nav-icon"></i>
              <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Pendaftaran</span>
            </a>

            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">

              <li class="nav-item ">
                <a class="nav-link <?= ($this->uri->segment(2) == 'atur-pendaftaran' ? 'active' : '') ?>" href="<?= site_url('manage-kompetisi/atur-pendaftaran') ?>" title="EvenAtur Pendaftarantku">
                  <span class="tio-circle nav-indicator-icon"></span>
                  <span class="text-truncate">Atur Pendaftaran</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link <?= ($this->uri->segment(2) == 'data-peserta' ? 'active' : '') ?>" href="<?= site_url('manage-kompetisi/data-peserta') ?>" title="Data peserta">
                  <span class="tio-circle nav-indicator-icon"></span>
                  <span class="text-truncate">Data peserta</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- End Pengguna -->

          <li class="nav-item ">
            <a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(2) == 'verifikasi-berkas' ? 'active' : '') ?>" href="<?= site_url('manage-kompetisi/verifikasi-berkas') ?>" title="Verifikasi Berkas" data-placement="left">
              <i class="tio-files nav-icon"></i>
              <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Verifikasi Berkas</span>
            </a>
          </li>
          <!-- End Dashboards -->

          <li class="nav-item ">
            <a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(2) == 'hasil-penilaian' ? 'active' : '') ?>" href="<?= site_url('manage-kompetisi/hasil-penilaian') ?>" title="Hasil Penilaian" data-placement="left">
              <i class="tio-medal nav-icon"></i>
              <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Hasil Penilaian</span>
            </a>
          </li>
          <!-- End Dashboards -->

          <li class="nav-item">
            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
          </li>
        </ul>
      </div>
      <!-- End Content -->

      <!-- Footer -->
      <div class="navbar-vertical-footer">
        <ul class="navbar-vertical-footer-list">

          <li class="navbar-vertical-footer-list-item">
          </li>
        </ul>
      </div>
      <!-- End Footer -->
    </div>
  </div>
</aside>

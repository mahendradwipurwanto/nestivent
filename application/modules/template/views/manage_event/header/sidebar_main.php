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
            <a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(1) == 'manage-event' && empty($this->uri->segment(2)) ? 'active' : '') ?>" href="<?= site_url('manage-event') ?>" title="Manage Event" data-placement="left">
              <i class="tio-dashboard-vs-outlined nav-icon"></i>
              <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Dashboard</span>
            </a>
          </li>

          <li class="navbar-vertical-aside-has-menu <?= ($this->uri->segment(2) == 'notifikasi-event' || $this->uri->segment(2) == 'aktivitas-event' ? 'show' : '') ?>">
            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Pages">
              <i class="tio-browser-windows nav-icon"></i>
              <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Sistem</span>
            </a>

            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">

              <li class="nav-item ">
                <a class="nav-link <?= ($this->uri->segment(2) == 'notifikasi-event' ? 'active' : '') ?>" href="<?= site_url('manage-event/notifikasi-event') ?>" title="Notifikasi">
                  <span class="tio-circle nav-indicator-icon"></span>
                  <span class="">Notifikasi</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link <?= ($this->uri->segment(2) == 'aktivitas-event' ? 'active' : '') ?>" href="<?= site_url('manage-event/aktivitas-event') ?>" title="Aktivitas">
                  <span class="tio-circle nav-indicator-icon"></span>
                  <span class="text-truncate">Aktivitas</span>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <small class="nav-subtitle" title="Pages">Data Peserta</small>
            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
          </li>

          <li class="nav-item ">
            <a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(2) == 'atur-pendaftaran' ? 'active' : '') ?>" href="<?= site_url('manage-event/atur-pendaftaran') ?>" title="Atur Pendaftaran" data-placement="left">
              <i class="tio-attachment nav-icon"></i>
              <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Atur Pendaftaran</span>
            </a>
          </li>
          <!-- End Dashboards -->

          <li class="nav-item ">
            <a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(2) == 'verifikasi-peserta' ? 'active' : '') ?>" href="<?= site_url('manage-event/verifikasi-peserta') ?>" title="Verifikasi Peserta" data-placement="left">
              <i class="tio-user nav-icon"></i>
              <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Verifikasi Peserta</span>
            </a>
          </li>
          <!-- End Dashboards -->

          <!-- <li class="nav-item ">
            <a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(2) == 'sertifikat-peserta' ? 'active' : '') ?>" href="<?= site_url('manage-event/sertifikat-peserta') ?>" title="VeriSertifikatfikasi Peserta" data-placement="left">
              <i class="tio-folder-bookmarked nav-icon"></i>
              <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Sertifikat Peserta</span>
            </a>
          </li> -->
          <!-- End Dashboards -->

          <li class="nav-item ">
            <a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(2) == 'pengaturan' ? 'active' : '') ?>" href="<?= site_url('manage-event/pengaturan') ?>" title="Pengaturan" data-placement="left">
              <i class="tio-tune nav-icon"></i>
              <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Pengaturan</span>
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

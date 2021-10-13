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
            <a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(1) == 'k-panel' ? 'active' : '') ?>" href="<?= site_url('k-panel') ?>" title="K-Panel" data-placement="left">
              <i class="tio-dashboard-vs-outlined nav-icon"></i>
              <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Dashboard</span>
            </a>
          </li>
          <?php if($this->session->userdata("role_akses") == 0): ?>
            <!-- Pengguna -->
            <li class="navbar-vertical-aside-has-menu <?= ($this->uri->segment(2) == 'notifikasi-k-panel' || $this->uri->segment(2) == 'aktivitas-k-panel' ? 'show' : '') ?>">
              <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Pages">
                <i class="tio-browser-windows nav-icon"></i>
                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Sistem</span>
              </a>

              <ul class="js-navbar-vertical-aside-submenu nav nav-sub">

                <li class="nav-item ">
                  <a class="nav-link <?= ($this->uri->segment(2) == 'notifikasi-k-panel' ? 'active' : '') ?>" href="<?= site_url('k-panel/notifikasi-k-panel') ?>" title="Notifikasi">
                    <span class="tio-circle nav-indicator-icon"></span>
                    <span class="">Notifikasi</span>
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link <?= ($this->uri->segment(2) == 'aktivitas-k-panel' ? 'active' : '') ?>" href="<?= site_url('k-panel/aktivitas-k-panel') ?>" title="Aktivitas">
                    <span class="tio-circle nav-indicator-icon"></span>
                    <span class="text-truncate">Aktivitas</span>
                  </a>
                </li>
              </ul>
            </li>
            <!-- End Pengguna -->

            <li class="nav-item ">
              <a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(2) == 'pengaturan-k-panel' ? 'active' : '') ?>" href="<?= site_url('k-panel/pengaturan-k-panel') ?>" title="Pengaturan" data-placement="left">
                <i class="tio-tune nav-icon"></i>
                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Pengaturan</span>
              </a>
            </li>
            <!-- End Dashboards -->
          <?php endif;?>

          <li class="nav-item">
            <small class="nav-subtitle" title="Pages">Data Kegiatan</small>
            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
          </li>

          <!-- Pengguna -->
          <li class="navbar-vertical-aside-has-menu <?= ($this->uri->segment(2) == 'eventku' || $this->uri->segment(2) == 'buat-event' ? 'show' : '') ?>">
            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Pages">
              <i class="tio-browser-windows nav-icon"></i>
              <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Event</span>
            </a>

            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">

              <li class="nav-item ">
                <a class="nav-link <?= ($this->uri->segment(2) == 'eventku' ? 'active' : '') ?>" href="<?= site_url('k-panel/eventku') ?>" title="Eventku">
                  <span class="tio-circle nav-indicator-icon"></span>
                  <span class="text-truncate">Eventku</span>
                </a>
              </li>

              <?php if($this->session->userdata("role_akses") == 0): ?>
                <li class="nav-item">
                  <a class="nav-link <?= ($this->uri->segment(2) == 'buat-event' ? 'active' : '') ?>" href="<?= site_url('k-panel/buat-event') ?>" title="Buat Event">
                    <span class="tio-circle nav-indicator-icon"></span>
                    <span class="text-truncate">Buat event</span>
                  </a>
                </li>
              <?php endif;?>
            </ul>
          </li>
          <!-- End Pengguna -->

          <!-- Pengguna -->
          <li class="navbar-vertical-aside-has-menu <?= ($this->uri->segment(2) == 'kompetisiku' || $this->uri->segment(2) == 'buat-kompetisi' ? 'show' : '') ?>">
            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Pages">
              <i class="tio-browser-windows nav-icon"></i>
              <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Kompetisi</span>
            </a>

            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">

              <li class="nav-item ">
                <a class="nav-link <?= ($this->uri->segment(2) == 'kompetisiku' ? 'active' : '') ?>" href="<?= site_url('k-panel/kompetisiku') ?>" title="Kompetisiku">
                  <span class="tio-circle nav-indicator-icon"></span>
                  <span class="text-truncate">Kompetisiku</span>
                </a>
              </li>

              <?php if($this->session->userdata("role_akses") == 0): ?>
                <li class="nav-item">
                  <a class="nav-link <?= ($this->uri->segment(2) == 'buat-kompetisi' ? 'active' : '') ?>" href="<?= site_url('k-panel/buat-kompetisi') ?>" title="Buat Kompetisi">
                    <span class="tio-circle nav-indicator-icon"></span>
                    <span class="text-truncate">Buat Kompetisi</span>
                  </a>
                </li>
              <?php endif;?>
            </ul>
          </li>
          <!-- End Pengguna -->

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
          <!-- Other Links -->
          <div class="hs-unfold">
            <a class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary rounded-circle" href="javascript:;"
               data-hs-unfold-options='{
                "target": "#otherLinksDropdown",
                "type": "css-animation",
                "animationIn": "slideInDown",
                "hideOnScroll": true
               }'>
              <i class="tio-help-outlined"></i>
            </a>

            <div id="otherLinksDropdown" class="hs-unfold-content dropdown-unfold dropdown-menu navbar-vertical-footer-dropdown">
              <span class="dropdown-header">Bantuan</span>
              <a class="dropdown-item" href="#">
                <i class="tio-book-outlined dropdown-item-icon"></i>
                <span class="text-truncate pr-2" title="Pusat bantuan">Pusat bantuan</span>
              </a>
              <a class="dropdown-item" href="#">
                <i class="tio-gift dropdown-item-icon"></i>
                <span class="text-truncate pr-2" title="What's new?">What's new?</span>
              </a>
              <div class="dropdown-divider"></div>
              <span class="dropdown-header">Contacts</span>
              <a class="dropdown-item" href="#">
                <i class="tio-chat-outlined dropdown-item-icon"></i>
                <span class="text-truncate pr-2" title="Contact support">Contact support</span>
              </a>
            </div>
          </div>
          <!-- End Other Links -->
        </li>
        </ul>
      </div>
      <!-- End Footer -->
    </div>
  </div>
</aside>

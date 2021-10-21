<aside
	class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered  ">
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
				<button type="button"
					class="js-navbar-vertical-aside-toggle-invoker navbar-vertical-aside-toggle btn btn-icon btn-xs btn-ghost-dark">
					<i class="tio-clear tio-lg"></i>
				</button>
				<!-- End Navbar Vertical Toggle -->
			</div>

			<!-- Content -->
			<div class="navbar-vertical-content">
				<ul class="navbar-nav navbar-nav-lg nav-tabs">
					<!-- Dashboards -->


					<?php if($this->session->userdata('role') == 0):?>
					<li class="nav-item ">
						<a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(1) == 'admin' ? 'active' : '') ?>"
							href="<?= site_url('admin') ?>" title="Dashboard" data-placement="left">
							<i class="tio-dashboard-vs-outlined nav-icon"></i>
							<span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Dashboard</span>
						</a>
					</li>

					<!-- Pengguna -->
					<li
						class="navbar-vertical-aside-has-menu <?= ($this->uri->segment(1) == 'notifikasi-sistem' || $this->uri->segment(1) == 'aktivitas-sistem' ? 'show' : '') ?>">
						<a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Pages">
							<i class="tio-browser-windows nav-icon"></i>
							<span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Sistem</span>
						</a>

						<ul class="js-navbar-vertical-aside-submenu nav nav-sub">

							<li class="nav-item ">
								<a class="nav-link <?= ($this->uri->segment(1) == 'notifikasi-sistem' ? 'active' : '') ?>"
									href="<?= site_url('notifikasi-sistem') ?>" title="Notifikasi">
									<span class="tio-circle nav-indicator-icon"></span>
									<span class="text-truncate">Notifikasi</span>
								</a>
							</li>

							<li class="nav-item">
								<a class="nav-link <?= ($this->uri->segment(1) == 'aktivitas-sistem' ? 'active' : '') ?>"
									href="<?= site_url('aktivitas-sistem') ?>" title="Aktivitas">
									<span class="tio-circle nav-indicator-icon"></span>
									<span class="text-truncate">Aktivitas</span>
								</a>
							</li>
						</ul>
					</li>
					<!-- End Pengguna -->

					<li class="nav-item ">
						<a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(1) == 'pengaturan-admin' ? 'active' : '') ?>"
							href="<?= site_url('pengaturan-admin') ?>" title="Pengaturan" data-placement="left">
							<i class="tio-tune nav-icon"></i>
							<span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Pengaturan</span>
						</a>
					</li>
					<!-- End Dashboards -->

					<li class="nav-item">
						<small class="nav-subtitle" title="Pages">Data</small>
						<small class="tio-more-horizontal nav-subtitle-replacer"></small>
					</li>

					<!-- Pengguna -->
					<li class="nav-item">
						<a class="nav-link <?= ($this->uri->segment(1) == 'data-pengguna' ? 'active' : '') ?>"
							href="<?= site_url('data-pengguna') ?>" title="Data pengguna">
							<span class="tio-group-junior nav-icon"></span>
							<span class="text-truncate">Data pengguna</span>
						</a>
					</li>
					<!-- End Pengguna -->

					<!-- Penyelenggara -->

					<li class="nav-item ">
						<a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(1) == 'data-penyelenggara' ? 'active' : '') ?>"
							href="<?= site_url('data-penyelenggara') ?>" title="Data penyelenggara" data-placement="left">
							<i class="tio-canvas-text nav-icon"></i>
							<span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Data penyelenggara</span>
						</a>
					</li>
					<!-- End Penyelenggara -->

					<!-- Kompetisi -->

					<li class="nav-item ">
						<a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(1) == 'data-kompetisi' ? 'active' : '') ?>"
							href="<?= site_url('data-kompetisi') ?>" title="Data kompetisi" data-placement="left">
							<i class="tio-medal nav-icon"></i>
							<span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Data kompetisi</span>
						</a>
					</li>
					<!-- End Kompetisi -->

					<!-- Kompetisi -->

					<li class="nav-item ">
						<a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(1) == 'data-event' ? 'active' : '') ?>"
							href="<?= site_url('data-event') ?>" title="Data event" data-placement="left">
							<i class="tio-event nav-icon"></i>
							<span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Data event</span>
						</a>
					</li>
					<!-- End Kompetisi -->

					<!-- JURI -->
					<?php elseif($this->session->userdata('role') == 2):?>
					<!-- Dashboards -->

					<li class="nav-item ">
						<a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(1) == 'juri' && empty($this->uri->segment(2)) ? 'active' : '') ?>"
							href="<?= site_url('juri') ?>" title="Dashboard" data-placement="left">
							<i class="tio-dashboard-vs-outlined nav-icon"></i>
							<span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Dashboard</span>
						</a>
					</li>

					<li class="nav-item ">
						<a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(2) == 'penilaian' ? 'active' : '') ?>"
							href="<?= site_url('juri/penilaian') ?>" title="Penilaian" data-placement="left">
							<i class="tio-files-outlined nav-icon"></i>
							<span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Penilaian</span>
						</a>
					</li>

					<li class="nav-item ">
						<a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(2) == 'hasil-penilaian' ? 'active' : '') ?>"
							href="<?= site_url('juri/hasil-penilaian') ?>" title="Hasil Penilaian" data-placement="left">
							<i class="tio-medal nav-icon"></i>
							<span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Hasil Penilaian</span>
						</a>
					</li>
					<!-- End Dashboards -->
					<!-- PENYELENGGARA -->
					<?php elseif($this->session->userdata('role') == 3):?>

					<?php endif;?>

					<li class="nav-item">
						<small class="tio-more-horizontal nav-subtitle-replacer"></small>
					</li>
				</ul>
			</div>
			<!-- End Content -->
		</div>
	</div>
</aside>

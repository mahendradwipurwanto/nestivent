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

					<li class="nav-item ">
						<a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(1) == 'manage-kompetisi' && empty($this->uri->segment(2)) ? 'active' : '') ?>"
							href="<?= site_url('manage-kompetisi') ?>" title="Dashboard" data-placement="left">
							<i class="tio-dashboard-vs-outlined nav-icon"></i>
							<span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Dashboard</span>
						</a>
					</li>

					<li class="nav-item">
						<small class="nav-subtitle" title="Data Kompetisi">Sistem</small>
						<small class="tio-more-horizontal nav-subtitle-replacer"></small>
					</li>

					<li class="nav-item ">
						<a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(2) == 'aktivitas-kompetisi' ? 'active' : '') ?>"
							href="<?= site_url('manage-kompetisi/aktivitas-kompetisi') ?>" title="Aktivitas" data-placement="left">
							<i class="tio-browser-window nav-icon"></i>
							<span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Aktivitas</span>
						</a>
					</li>

					<li class="nav-item ">
						<a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(2) == 'notifikasi-kompetisi' ? 'active' : '') ?>"
							href="<?= site_url('manage-kompetisi/notifikasi-kompetisi') ?>" title="Notifikasi" data-placement="left">
							<i class="tio-browser-window nav-icon"></i>
							<span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Notifikasi</span>
						</a>
					</li>

					<li class="nav-item ">
						<a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(2) == 'pengaturan' ? 'active' : '') ?>"
							href="<?= site_url('manage-kompetisi/pengaturan') ?>" title="Pengaturan" data-placement="left">
							<i class="tio-tune nav-icon"></i>
							<span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Pengaturan</span>
						</a>
					</li>
					<!-- End Dashboards -->

					<li class="nav-item">
						<small class="nav-subtitle" title="Data Kompetisi">Data Pengguna</small>
						<small class="tio-more-horizontal nav-subtitle-replacer"></small>
					</li>

					<li class="nav-item ">
						<a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(2) == 'data-juri' ? 'active' : '') ?>"
							href="<?= site_url('manage-kompetisi/data-juri') ?>" title="Data Juri" data-placement="left">
							<i class="tio-user nav-icon"></i>
							<span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Data Juri</span>
						</a>
					</li>

					<li class="nav-item ">
						<a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(2) == 'data-koordinator' ? 'active' : '') ?>"
							href="<?= site_url('manage-kompetisi/data-koordinator') ?>" title="Data Koordinator"
							data-placement="left">
							<i class="tio-user nav-icon"></i>
							<span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Data Koordinator</span>
						</a>
					</li>

					<li class="nav-item ">
						<a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(2) == 'data-peserta' ? 'active' : '') ?>"
							href="<?= site_url('manage-kompetisi/data-juri') ?>" title="Data Peserta" data-placement="left">
							<i class="tio-user nav-icon"></i>
							<span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Data Peserta</span>
						</a>
					</li>

					<li class="nav-item">
						<small class="nav-subtitle" title="Data Kompetisi">Pembayaran</small>
						<small class="tio-more-horizontal nav-subtitle-replacer"></small>
					</li>

					<li class="nav-item ">
						<a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(2) == 'data-transaksi' ? 'active' : '') ?>"
							href="<?= site_url('manage-kompetisi/data-transaksi') ?>" title="Data Transaksi" data-placement="left">
							<i class="tio-receipt-outlined nav-icon"></i>
							<span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Data Transaksi</span>
						</a>
					</li>

					<li class="nav-item">
						<small class="nav-subtitle" title="Data Kompetisi">Data Master</small>
						<small class="tio-more-horizontal nav-subtitle-replacer"></small>
					</li>

					<li class="nav-item ">
						<a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(2) == 'berkas-lomba' ? 'active' : '') ?>"
							href="<?= site_url('manage-kompetisi/berkas-lomba') ?>" title="Berkas Lomba" data-placement="left">
							<i class="tio-albums nav-icon"></i>
							<span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Berkas Lomba</span>
						</a>
					</li>

					<li class="nav-item ">
						<a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(2) == 'bidang-lomba' ? 'active' : '') ?>"
							href="<?= site_url('manage-kompetisi/bidang-lomba') ?>" title="Bidang Lomba" data-placement="left">
							<i class="tio-albums nav-icon"></i>
							<span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Bidang Lomba</span>
						</a>
					</li>
					<!-- End Dashboards -->

					<li class="nav-item ">
						<a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(2) == 'tahap-penilaian' ? 'active' : '') ?>"
							href="<?= site_url('manage-kompetisi/tahap-penilaian') ?>" title="Tahap Penilaian" data-placement="left">
							<i class="tio-blend-tool nav-icon"></i>
							<span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Tahap Penilaian</span>
						</a>
					</li>
					<!-- End Dashboards -->

					<li class="nav-item ">
						<a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(2) == 'kriteria-penilaian' ? 'active' : '') ?>"
							href="<?= site_url('manage-kompetisi/kriteria-penilaian') ?>" title="Kriteria Penilaian"
							data-placement="left">
							<i class="tio-category-outlined nav-icon"></i>
							<span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Kriteria Penilaian</span>
						</a>
					</li>

					<li class="nav-item ">
						<a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(2) == 'atur-pendaftaran' ? 'active' : '') ?>"
							href="<?= site_url('manage-kompetisi/atur-pendaftaran') ?>" title="Atur Berkas" data-placement="left">
							<i class="tio-file nav-icon"></i>
							<span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Atur Berkas</span>
						</a>
					</li>

					<li class="nav-item">
						<small class="nav-subtitle" title="Data Kompetisi">Kompetisi</small>
						<small class="tio-more-horizontal nav-subtitle-replacer"></small>
					</li>

					<li class="nav-item ">
						<a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(2) == 'verifikasi-berkas' ? 'active' : '') ?>"
							href="<?= site_url('manage-kompetisi/verifikasi-berkas') ?>" title="Verifikasi Berkas"
							data-placement="left">
							<i class="tio-files nav-icon"></i>
							<span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Verifikasi Berkas</span>
						</a>
					</li>
					<!-- End Dashboards -->

					<li class="nav-item ">
						<a class="js-nav-tooltip-link nav-link <?= ($this->uri->segment(2) == 'hasil-penilaian' ? 'active' : '') ?>"
							href="<?= site_url('manage-kompetisi/hasil-penilaian') ?>" title="Hasil Penilaian" data-placement="left">
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

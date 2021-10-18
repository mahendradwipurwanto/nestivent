<header id="header"
	class="navbar navbar-expand-lg navbar-fixed navbar-height navbar-flush navbar-container navbar-bordered">
	<div class="navbar-nav-wrap">
		<div class="navbar-brand-wrapper">
			<!-- Logo -->
			<a class="navbar-brand" target="_blank" href="<?= base_url() ?>" aria-label="Front">
				<img class="navbar-brand-logo" src="<?= base_url();?>assets/<?= $LOGO_BLACK;?>" alt="Logo">
				<img class="navbar-brand-logo-mini" src="<?= base_url();?>assets/<?= $LOGO_FAV;?>" alt="Logo">
			</a>
			<!-- End Logo -->
		</div>

		<div class="navbar-nav-wrap-content-left">
			<!-- Navbar Vertical Toggle -->
			<button type="button" class="js-navbar-vertical-aside-toggle-invoker close mr-3">
				<i class="tio-first-page navbar-vertical-aside-toggle-short-align" data-toggle="tooltip" data-placement="right"
					title="Collapse"></i>
				<i class="tio-last-page navbar-vertical-aside-toggle-full-align"
					data-template='<div class="tooltip d-none d-sm-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
					data-toggle="tooltip" data-placement="right" title="Expand"></i>
			</button>
			<!-- End Navbar Vertical Toggle -->

			<div class="d-none d-md-block">
				<a href="<?= base_url() ?>" target="_blank" class="btn btn-ghost-secondary btn-sm btn-pill ml-2">Landing
					Page</a>
			</div>
		</div>

		<!-- Secondary Content -->
		<div class="navbar-nav-wrap-content-right">
			<!-- Navbar -->
			<ul class="navbar-nav align-items-center flex-row">

				<li class="nav-item d-none d-sm-inline-block">
					<!-- Notification -->
					<div class="hs-unfold">
						<a class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary rounded-circle" href="javascript:;"
							data-hs-unfold-options='{
              "target": "#notificationDropdown",
              "type": "css-animation"
            }'>
							<i class="tio-notifications-on-outlined"></i>
							<?php if ($c_notifikasi > 0): ?>
							<span class="btn-status btn-sm-status btn-status-danger"></span>
							<?php endif; ?>
						</a>

						<div id="notificationDropdown"
							class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right navbar-dropdown-menu"
							style="width: 25rem;">
							<!-- Header -->
							<div class="card-header">
								<span class="card-title h4">Notifikasi</span>
							</div>
							<!-- End Header -->

							<!-- Body -->
							<div class="card-body-height">
								<ul class="list-group list-group-flush navbar-card-list-group">
									<?php if ($notifikasi == FALSE): ?>
									<!-- Item -->
									<li class="list-group-item custom-checkbox-list-wrapper">
										<div class="row">
											<div class="col-12 text-center">
												<p class="card-text font-size-sm">Tidak ada notifikasi terbaru</p>
											</div>
										</div>
									</li>
									<!-- End Item -->
									<?php else: ?>
									<?php foreach ($notifikasi as $key): ?>
									<!-- Item -->
									<li class="list-group-item custom-checkbox-list-wrapper">
										<a class="row" <?= ($key->LINK != null ? "href='".site_url($key->LINK)."'" : "");?>>
											<div class="col-auto position-static">
												<div class="d-flex align-items-center">
													<?php if ($key->READ == 0): ?>
													<div class="custom-control custom-checkbox custom-checkbox-list">
														<input type="checkbox" class="custom-control-input" id="notificationCheck2" checked>
														<label class="custom-control-label" for="notificationCheck2"></label>
														<span class="custom-checkbox-list-stretched-bg"></span>
													</div>
													<?php endif; ?>
													<div class="avatar avatar-sm avatar-soft-dark avatar-circle">
														<?php if ($CI->M_template->get_profil($key->SENDER) == FALSE): ?>
														<span
															class="avatar-initials"><?= substr($CI->M_template->get_sender($key->SENDER), 0, 1)?></span>
														<?php else: ?>
														<img class="avatar-img"
															src="<?= base_url() ?>berkas/pengguna/<?= $key->SENDER ?>/foto/<?= $CI->M_template->get_profil($key->SENDER) ?>"
															alt="Image Description">
														<?php endif; ?>
													</div>
												</div>
											</div>
											<div class="col ml-n3">
												<span
													class="card-title h5"><?php $sender = explode(" ", $CI->M_template->get_sender($key->SENDER)); echo $sender[0];?></span>
												<p class="card-text font-size-sm ellipsis-150"><?= $key->MESSAGE ?></p>
											</div>
											<small class="col-auto text-muted text-cap"><?= $CI->time_elapsed($key->CREATED_AT) ?></small>
										</a>
									</li>
									<!-- End Item -->
									<?php endforeach; ?>
									<?php endif; ?>
								</ul>
							</div>
							<!-- End Body -->
							<?php if ($c_notifikasi > 5): ?>
							<!-- Card Footer -->
							<a class="card-footer text-center" href="<?= site_url('notifikasi-sistem') ?>">
								Lihat semua notifikasi
								<i class="tio-chevron-right"></i>
							</a>
							<!-- End Card Footer -->
							<?php endif; ?>
						</div>
					</div>
					<!-- End Notification -->
				</li>

				<li class="nav-item d-none d-sm-inline-block">
					<!-- Activity -->
					<div class="hs-unfold">
						<a class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary rounded-circle" href="javascript:;"
							data-hs-unfold-options='{
              "target": "#activitySidebar",
              "type": "css-animation",
              "animationIn": "fadeInRight",
              "animationOut": "fadeOutRight",
              "hasOverlay": true,
              "smartPositionOff": true
            }'>
							<i class="tio-voice-line"></i>
						</a>
					</div>
					<!-- Activity -->
				</li>

				<li class="nav-item">
					<!-- Account -->
					<div class="hs-unfold">
						<a class="js-hs-unfold-invoker navbar-dropdown-account-wrapper" href="javascript:;" data-hs-unfold-options='{
              "target": "#accountNavbarDropdown",
              "type": "css-animation"
            }'>
							<div class="avatar avatar-sm avatar-circle">
								<?php if ($pFoto->PROFIL == null) {?>
								<img class="avatar-img" src="<?= base_url();?>assets/frontend/img/100x100/img12.jpg"
									alt="<?= $this->session->userdata('nama') ?>">
								<?php }else { ?>
								<img class="avatar-img"
									src="<?= base_url();?>berkas/pengguna/<?= $this->session->userdata('kode_user') ?>/foto/<?= $pFoto->PROFIL ?>"
									alt="<?= $this->session->userdata('nama') ?>">
								<?php } ?>
								<span class="avatar-status avatar-sm-status avatar-status-success"></span>
							</div>
						</a>

						<div id="accountNavbarDropdown"
							class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right navbar-dropdown-menu navbar-dropdown-account"
							style="width: 16rem;">
							<div class="dropdown-item-text">
								<div class="media align-items-center">
									<div class="avatar avatar-sm avatar-circle mr-2">
										<?php if ($pFoto->PROFIL == null) {?>
										<img class="avatar-img" src="<?= base_url();?>assets/frontend/img/100x100/img12.jpg"
											alt="<?= $this->session->userdata('nama') ?>">
										<?php }else { ?>
										<img class="avatar-img"
											src="<?= base_url();?>berkas/pengguna/<?= $this->session->userdata('kode_user') ?>/foto/<?= $pFoto->PROFIL ?>"
											alt="<?= $this->session->userdata('nama') ?>">
										<?php } ?>
									</div>
									<div class="media-body">
										<span
											class="card-title h5"><?php $nama = explode(" ", $this->session->userdata('nama')); echo $nama[0]; ?></span>
										<span
											class="card-text"><?= mb_substr($this->session->userdata('email'), 0, 3) ?>***@<?php $mail = explode("@", $this->session->userdata('email')); echo $mail[1]; ?></span>
									</div>
								</div>
							</div>

							<div class="dropdown-divider"></div>
              
              <!-- ADMIN -->
							<?php if ($this->session->userdata('role') == 0) :?>
							<a class="dropdown-item" href="<?= site_url('admin'); ?>">
								<span class="text-truncate pr-2" title="Dashboard">Dashboard</span>
							</a>
							<a class="dropdown-item" href="<?= site_url('pengaturan-admin'); ?>">
								<span class="text-truncate pr-2" title="Pengaturan">Pengaturan</span>
							</a>

              <!-- JURI -->
							<?php elseif ($this->session->userdata('role') == 2) :?>
							<a class="dropdown-item" href="<?= site_url('juri'); ?>">
								<span class="text-truncate pr-2" title="Dashboard">Dashboard</span>
							</a>
							<a class="dropdown-item" href="<?= site_url('juri/penilaian'); ?>">
								<span class="text-truncate pr-2" title="Penilaian">Penilaian</span>
							</a>

              <!-- PENYELENGGARA -->
							<?php elseif ($this->session->userdata('role') == 3) :?>
							<a class="dropdown-item" href="<?= site_url('pengaturan-pts'); ?>">
								<span class="text-truncate pr-2" title="Pengaturan">Pengaturan</span>
							</a>
							<?php endif;?>

							<div class="dropdown-divider"></div>

							<a class="dropdown-item" href="<?= site_url('logout'); ?>">
								<span class="text-truncate pr-2" title="Sign out">logout</span>
							</a>
						</div>
					</div>
					<!-- End Account -->
				</li>
			</ul>
			<!-- End Navbar -->
		</div>
		<!-- End Secondary Content -->
	</div>
</header>

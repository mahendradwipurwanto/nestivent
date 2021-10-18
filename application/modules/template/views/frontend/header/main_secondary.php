<!-- Secondary Content -->
<div class="navbar-nav-wrap-content text-center">
	<?php if ($this->session->userdata('logged_in') == true) { ?>
	<!-- Account -->
	<div class="hs-unfold ml-2">
		<a class="js-hs-unfold-invoker rounded-circle" href="javascript:;" data-hs-unfold-options='{
      "target": "#accountDropdown",
      "type": "css-animation",
      "event": "hover",
      "duration": 50,
      "delay": 0,
      "hideOnScroll": "true"
    }'>
			<span class="avatar avatar-xs avatar-circle">
				<?php if ($pFoto->PROFIL == null) {?>
				<img class="avatar-img" src="<?= base_url();?>assets/frontend/img/100x100/img12.jpg"
					alt="<?= $this->session->userdata('nama') ?>">
				<?php }else { ?>
				<img class="avatar-img"
					src="<?= base_url();?>berkas/pengguna/<?= $this->session->userdata('kode_user') ?>/foto/<?= $pFoto->PROFIL ?>"
					alt="<?= $this->session->userdata('nama') ?>">
				<?php } ?>
			</span>
		</a>

		<div id="accountDropdown"
			class="hs-unfold-content dropdown-menu dropdown-menu-sm-right dropdown-menu-no-border-on-mobile p-0"
			style="min-width: 245px;">
			<div class="card">
				<!-- Header -->
				<div class="card-header p-3">
					<a class="media align-items-center">
						<div class="avatar mr-3" style="border-radius: 50%; overflow: hidden;">
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
								class="d-block font-weight-bold"><?php $nama = explode(" ", $this->session->userdata('nama')); echo $nama[0]; ?></span>
							<span class="d-block small text-muted">
								<?= mb_substr($this->session->userdata('email'), 0, 3) ?>***@<?php $mail = explode("@", $this->session->userdata('email')); echo $mail[1]; ?>
							</span>
						</div>
					</a>
				</div>
				<!-- End Header -->

				<!-- Body -->
				<div class="card-body py-3">

					<!-- ADMIN -->
					<?php if ($this->session->userdata('role') == 0): ?>
					<a class="dropdown-item px-0" href="<?= site_url('admin') ?>">
						<span class="dropdown-item-icon">
							<i class="fas fa-user"></i>
						</span> Dashboard
					</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item px-0" href="<?= site_url('logout') ?>">
						<span class="dropdown-item-icon">
							<i class="fas fa-power-off"></i>
						</span> Log out
					</a>

					<!-- PESERTA -->
					<?php elseif ($this->session->userdata('role') == 1) : ?>
					<a class="dropdown-item px-0" href="<?= site_url('pengguna') ?>">
						<span class="dropdown-item-icon">
							<i class="fas fa-user"></i>
						</span> Akun
					</a>

					<div class="dropdown-divider"></div>

					<a class="dropdown-item px-0" href="<?= site_url('pengguna/pengaturan') ?>">
						<span class="dropdown-item-icon">
							<i class="fas fa-question-circle"></i>
						</span> Pengaturan
					</a>
					<a class="dropdown-item px-0" href="<?= site_url('logout') ?>">
						<span class="dropdown-item-icon">
							<i class="fas fa-power-off"></i>
						</span> Log out
					</a>

					<!-- JURI -->
					<?php elseif ($this->session->userdata('role') == 2) : ?>
					<a class="dropdown-item px-0" href="<?= site_url('pengguna') ?>">
						<span class="dropdown-item-icon">
							<i class="fas fa-user"></i>
						</span> Akun
					</a>

					<div class="dropdown-divider"></div>

					<a class="dropdown-item px-0" href="<?= site_url('juri') ?>">
						<span class="dropdown-item-icon">
							<i class="fas fa-question-circle"></i>
						</span> Dashboard
					</a>
					<a class="dropdown-item px-0" href="<?= site_url('juri/penilaian') ?>">
						<span class="dropdown-item-icon">
							<i class="fas fa-question-circle"></i>
						</span> Penilaian
					</a>
					<a class="dropdown-item px-0" href="<?= site_url('logout') ?>">
						<span class="dropdown-item-icon">
							<i class="fas fa-power-off"></i>
						</span> Log out
					</a>

					<!-- PENYELENGGARA -->
					<?php elseif ($this->session->userdata('role') == 3) : ?>
					<a class="dropdown-item px-0" href="<?= site_url('dashboard-penyelenggara') ?>">
						<span class="dropdown-item-icon">
							<i class="fas fa-user"></i>
						</span> Dashboard
					</a>

					<div class="dropdown-divider"></div>
					<a class="dropdown-item px-0" href="<?= site_url('logout') ?>">
						<span class="dropdown-item-icon">
							<i class="fas fa-power-off"></i>
						</span> Log out
					</a>
					<?php endif; ?>
				</div>
				<!-- End Body -->
			</div>
		</div>
	</div>
	<!-- End Account -->

	<?php }?>
</div>
<!-- End Secondary Content -->

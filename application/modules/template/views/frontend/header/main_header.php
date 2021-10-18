<!-- ========== HEADER ========== -->
<header id="header" class="header shadow-soft" data-hs-header-options='{
  "fixMoment": 500,
  "fixEffect": "slide"
  }'>

	<div class="header-section">

		<?php $this->load->view('header/main_topbar') ?>

		<div id="logoAndNav" class="container">
			<!-- Nav -->
			<nav class="js-mega-menu navbar navbar-expand-lg">
				<div class="navbar-nav-wrap">
					<!-- Logo -->
					<a class="navbar-brand navbar-nav-wrap-brand" href="<?= base_url() ?>" aria-label="<?= $WEB_JUDUL; ?>">
						<img src="<?= base_url(); ?>assets/<?= $LOGO_BLACK; ?>" class="img-12-5" alt="Logo">
					</a>
					<!-- End Logo -->

					<?php $this->load->view('header/main_secondary') ?>

					<!-- Responsive Toggle Button -->
					<button type="button" class="navbar-toggler navbar-nav-wrap-toggler btn btn-icon btn-sm rounded-circle"
						aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar" data-toggle="collapse"
						data-target="#navBar">
						<span class="navbar-toggler-default">
							<svg width="14" height="14" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
								<path fill="currentColor"
									d="M17.4,6.2H0.6C0.3,6.2,0,5.9,0,5.5V4.1c0-0.4,0.3-0.7,0.6-0.7h16.9c0.3,0,0.6,0.3,0.6,0.7v1.4C18,5.9,17.7,6.2,17.4,6.2z M17.4,14.1H0.6c-0.3,0-0.6-0.3-0.6-0.7V12c0-0.4,0.3-0.7,0.6-0.7h16.9c0.3,0,0.6,0.3,0.6,0.7v1.4C18,13.7,17.7,14.1,17.4,14.1z" />
							</svg>
						</span>
						<span class="navbar-toggler-toggled">
							<svg width="14" height="14" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
								<path fill="currentColor"
									d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z" />
							</svg>
						</span>
					</button>
					<!-- End Responsive Toggle Button -->

					<!-- Navigation -->
					<?php $this->load->view('header/main_menu') ?>
					<!-- End Navigation -->
				</div>
			</nav>
			<!-- End Nav -->
		</div>
	</div>
</header>

<!-- ========== END HEADER ========== -->

<!-- Account Sidebar Navigation -->
<aside id="sidebarContent" class="hs-unfold-content sidebar">
	<div class="sidebar-scroller">
		<div class="sidebar-container">
			<div class="sidebar-footer-offset" style="padding-bottom: 7rem;">
				<!-- Toggle Button -->
				<div class="d-flex justify-content-end align-items-center pt-4 px-4">
					<div class="hs-unfold">
						<a class="js-hs-unfold-invoker btn btn-icon btn-xs btn-soft-secondary" href="javascript:;"
							data-hs-unfold-options='{
                  "target": "#sidebarContent",
                  "type": "css-animation",
                  "animationIn": "fadeInRight",
                  "animationOut": "fadeOutRight",
                  "hasOverlay": "rgba(55, 125, 255, 0.1)",
                  "smartPositionOff": true
                }'>
							<svg width="10" height="10" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
								<path fill="currentColor"
									d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z" />
							</svg>
						</a>
					</div>
				</div>
				<!-- End Toggle Button -->

				<!-- Content -->
				<div class="scrollbar sidebar-body">
					<div class="sidebar-content py-4 px-7">
						<!-- Daftar -->
						<div id="daftar" class="animated slideInUp">
							<!-- Title -->
							<div class="text-center mb-7">
								<h3 class="mb-0">Buat akun</h3>
								<p>Pilih tipe akun untuk didaftarkan.</p>
							</div>
							<!-- End Title -->

							<!-- Kegiatan Item -->
							<div class="row mb-3">
								<div class="col-lg-12 mb-3">

									<div class="card bg-primary text-white h-100 overflow-hidden p-5">
										<div class="w-70 pr-2">
											<h4 class="text-white">Peserta</h4>
											<a class="btn btn-sm btn-light transition-3d-hover"
												href="<?= site_url('pendaftaran?as=pengguna') ?>">Daftar
												<i class="fas fa-angle-right ml-1"></i></a>
										</div>
										<div class="position-absolute right-0 bottom-0 w-45 mb-n3 mr-n4">
											<img class="img-fluid lazysizes" src="<?= base_url(); ?>assets/frontend/svg/icons/icon-67.svg"
												alt="Daftar sebagai peserta">
										</div>
									</div>

								</div>
							</div>
							<div class="row mb-3">
								<div class="col-lg-12 mb-3">

									<div class="card bg-secondary text-white h-100 overflow-hidden p-5">
										<div class="w-70 pr-2">
											<h4 class="text-white">Penyelenggara</h4>
											<a class="btn btn-sm btn-light transition-3d-hover"
												href="<?= site_url('pendaftaran?as=penyelenggara') ?>">Daftar <i
													class="fas fa-angle-right ml-1"></i></a>
										</div>
										<div class="position-absolute right-0 bottom-0 w-45 mb-n3 mr-n4">
											<img class="img-fluid lazysizes" src="<?= base_url(); ?>assets/frontend/svg/icons/icon-18.svg"
												alt="Daftar sebagai peserta">
										</div>
									</div>

								</div>
							</div>
							<!-- End Kegiatan Item -->

							<div class="text-center">
								<span class="small text-muted">Sudah punya akun?</span>
								<a class="js-animation-link small font-weight-bold" href="javascript:;" data-hs-show-animation-options='{
                      "targetSelector": "#login",
                      "groupName": "idForm",
                      "animationType": "css-animation",
                      "animationIn": "slideInUp",
                      "duration": 400
                    }'>masuk
								</a>
							</div>
						</div>

						<!-- Login -->
						<div id="login" style="display: none; opacity: 0;" class="animated slideInUp">
							<!-- Title -->
							<div class="text-center mb-7">
								<h3 class="mb-0">Masuk ke akun</h3>
								<p>Masuk untuk mengelolah akun anda.</p>
							</div>
							<!-- End Title -->

							<form class="js-validate" action="<?= site_url('authentication/proses_login') ?>" method="POST">
								<!-- Input Group -->
								<div class="js-form-message mb-4">
									<label class="input-label">Email</label>
									<div class="input-group input-group-sm mb-2">
										<input type="email" class="form-control" name="email" id="signinEmail" placeholder="Email"
											aria-label="Email" required data-msg="Masukkan alamat email yang valid.">
									</div>
								</div>
								<!-- End Input Group -->

								<!-- Input Group -->
								<div class="js-form-message mb-3">
									<label class="input-label">Password</label>
									<div class="input-group input-group-sm mb-2">
										<input type="password" class="form-control" name="password" id="signinPassword" minlength="6"
											placeholder="Password" aria-label="Password" required data-msg="Masukkan password dengan benar.">
									</div>
								</div>
								<!-- End Input Group -->

								<div class="d-flex justify-content-end mb-4">
									<a class="font-size-1 link-underline" href="<?= site_url('lupa-password') ?>">lupa password?</a>
								</div>

								<div class="mb-3">
									<button type="submit" class="btn btn-sm btn-primary btn-block">Masuk</button>
								</div>

							</form>
							<div class="text-center">
								<span class="font-size-1 text-muted">Belum punya akun?</span>
								<a class="js-animation-link font-size-1 font-weight-bold" href="javascript:;"
									data-hs-show-animation-options='{
                      "targetSelector": "#daftar",
                      "groupName": "idForm"
                    }'>daftar
								</a>
							</div>
						</div>
						<!-- End Signup -->
					</div>
				</div>
				<!-- End Content -->
			</div>

			<!-- Footer -->
			<footer class="sidebar-footer border-top py-2 px-7">
				<ul class="nav nav-sm">
					<li class="nav-item">
						<a class="nav-link" href="<?= site_url('pusat-bantuan'); ?>">
							<i class="fas fa-info-circle la-lg"></i>
						</a>
					</li>
				</ul>
			</footer>
			<!-- End Footer -->
		</div>
	</div>
</aside>
<!-- End Account Sidebar Navigation -->





<!-- Account Sidebar Navigation -->
<aside id="sidebarContentLogin" class="hs-unfold-content sidebar">
	<div class="sidebar-scroller">
		<div class="sidebar-container">
			<div class="sidebar-footer-offset" style="padding-bottom: 7rem;">
				<!-- Toggle Button -->
				<div class="d-flex justify-content-end align-items-center pt-4 px-4">
					<div class="hs-unfold">
						<a class="js-hs-unfold-invoker btn btn-icon btn-xs btn-soft-secondary" href="javascript:;"
							data-hs-unfold-options='{
                  "target": "#sidebarContentLogin",
                  "type": "css-animation",
                  "animationIn": "fadeInRight",
                  "animationOut": "fadeOutRight",
                  "hasOverlay": "rgba(55, 125, 255, 0.1)",
                  "smartPositionOff": true
                }'>
							<svg width="10" height="10" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
								<path fill="currentColor"
									d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z" />
							</svg>
						</a>
					</div>
				</div>
				<!-- End Toggle Button -->

				<!-- Content -->
				<div class="scrollbar sidebar-body">
					<div class="sidebar-content py-4 px-7">

						<!-- Login -->
						<div id="loginLogin" class="animated slideInUp">
							<!-- Title -->
							<div class="text-center mb-7">
								<h3 class="mb-0">Masuk ke akun</h3>
								<p>Masuk untuk mengelolah akun anda.</p>
							</div>
							<!-- End Title -->

							<form class="js-validate" action="<?= site_url('authentication/proses_login') ?>" method="POST">
								<!-- Input Group -->
								<div class="js-form-message mb-4">
									<label class="input-label">Email</label>
									<div class="input-group input-group-sm mb-2">
										<input type="email" class="form-control" name="email" id="signinEmail" placeholder="Email"
											aria-label="Email" required data-msg="Masukkan alamat email yang valid.">
									</div>
								</div>
								<!-- End Input Group -->

								<!-- Input Group -->
								<div class="js-form-message mb-3">
									<label class="input-label">Password</label>
									<div class="input-group input-group-sm mb-2">
										<input type="password" class="form-control" name="password" id="signinPassword" minlength="6"
											placeholder="Password" aria-label="Password" required data-msg="Masukkan password dengan benar.">
									</div>
								</div>
								<!-- End Input Group -->

								<div class="d-flex justify-content-end mb-4">
									<a class="font-size-1 link-underline" href="<?= site_url('lupa-password') ?>">lupa password?</a>
								</div>

								<div class="mb-3">
									<button type="submit" class="btn btn-sm btn-primary btn-block">Masuk</button>
								</div>

							</form>
							<div class="text-center">
								<span class="font-size-1 text-muted">Belum punya akun?</span>
								<a class="js-animation-link font-size-1 font-weight-bold" href="javascript:;"
									data-hs-show-animation-options='{
                      "targetSelector": "#daftarLogin",
                      "groupName": "idFormLogin"
                    }'>daftar
								</a>
							</div>
						</div>
						<!-- End Signup -->
						<!-- Daftar -->
						<div id="daftarLogin" style="display: none; opacity: 0;" class="animated slideInUp">
							<!-- Title -->
							<div class="text-center mb-7">
								<h3 class="mb-0">Buat akun</h3>
								<p>Pilih tipe akun untuk didaftarkan.</p>
							</div>
							<!-- End Title -->

							<!-- Kegiatan Item -->
							<div class="row mb-3">
								<div class="col-lg-12 mb-3">

									<div class="card bg-primary text-white h-100 overflow-hidden p-5">
										<div class="w-70 pr-2">
											<h4 class="text-white">Peserta</h4>
											<a class="btn btn-sm btn-light transition-3d-hover"
												href="<?= site_url('pendaftaran?as=pengguna') ?>">Daftar <i
													class="fas fa-angle-right ml-1"></i></a>
										</div>
										<div class="position-absolute right-0 bottom-0 w-45 mb-n3 mr-n4">
											<img class="img-fluid lazysizes" src="<?= base_url(); ?>assets/frontend/svg/icons/icon-67.svg"
												alt="Daftar sebagai peserta">
										</div>
									</div>

								</div>
							</div>
							<div class="row mb-3">
								<div class="col-lg-12 mb-3">

									<div class="card bg-secondary text-white h-100 overflow-hidden p-5">
										<div class="w-70 pr-2">
											<h4 class="text-white">Penyelenggara</h4>
											<a class="btn btn-sm btn-light transition-3d-hover"
												href="<?= site_url('pendaftaran?as=penyelenggara') ?>">Daftar <i
													class="fas fa-angle-right ml-1"></i></a>
										</div>
										<div class="position-absolute right-0 bottom-0 w-45 mb-n3 mr-n4">
											<img class="img-fluid lazysizes" src="<?= base_url(); ?>assets/frontend/svg/icons/icon-18.svg"
												alt="Daftar sebagai peserta">
										</div>
									</div>

								</div>
							</div>
							<!-- End Kegiatan Item -->

							<div class="text-center">
								<span class="small text-muted">Sudah punya akun?</span>
								<a class="js-animation-link small font-weight-bold" href="javascript:;" data-hs-show-animation-options='{
                      "targetSelector": "#loginLogin",
                      "groupName": "idFormLogin",
                      "animationType": "css-animation",
                      "animationIn": "slideInUp",
                      "duration": 400
                    }'>masuk
								</a>
							</div>
						</div>

					</div>
				</div>
				<!-- End Content -->
			</div>

			<!-- Footer -->
			<footer class="sidebar-footer border-top py-2 px-7">
				<ul class="nav nav-sm">
					<li class="nav-item">
						<a class="nav-link" href="<?= site_url('pusat-bantuan'); ?>">
							<i class="fas fa-info-circle la-lg"></i>
						</a>
					</li>
				</ul>
			</footer>
			<!-- End Footer -->
		</div>
	</div>
</aside>
<!-- End Account Sidebar Navigation -->

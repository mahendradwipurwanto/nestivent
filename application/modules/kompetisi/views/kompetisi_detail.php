<!-- Breadcrumb Section -->
<div class="container py-3 space-top-1">
	<div class="row align-items-lg-center">
		<div class="col-lg mb-2 mb-lg-0">
			<!-- Breadcrumb -->
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb breadcrumb-no-gutter font-size-1 mb-0">
					<li class="breadcrumb-item"><a href="<?= site_url('penyelenggara') ?>">Penyelenggara</a></li>
					<li class="breadcrumb-item"><a
							href="<?= site_url('penyelenggara/'.$kompetisi->KODE_PENYELENGGARA) ?>"><?= $kompetisi->NAMA;?></a></li>
					<li class="breadcrumb-item"><a href="<?= site_url('kompetisi') ?>">Kompetisi</a></li>
					<li class="breadcrumb-item active" aria-current="page"><?= $kompetisi->JUDUL;?></li>
				</ol>
			</nav>
			<!-- End Breadcrumb -->
		</div>

		<div class="col-lg-auto">
			<a class="btn btn-sm btn-ghost-secondary float-right"
				href="https://api.whatsapp.com/send?text=Hai, ayo ikuti kompetisi <?= ucwords(strtolower($kompetisi->JUDUL)) ?> lebih detail di <?php echo base_url(uri_string()); ?>"
				target="_blank">
				<i class="fab fa-whatsapp mr-2"></i> Share
			</a>
		</div>
	</div>
	<!-- End Row -->
</div>
<!-- End Breadcrumb Section -->

<!-- Property Description Section -->
<div class="container space-bottom-2">
	<div class="row">
		<div class="col-lg-8 mb-9 mb-lg-0">
			<div class="row justify-content-lg-between mb-<?= $CI->agent->is_mobile() ? '0' : '7';?>">
				<div class="col-12 mb-5 mb-sm-0">
					<h1 class="h2 mb-0"><?= $kompetisi->JUDUL;?></h1>
				</div>
			</div>
			<!-- End Row -->

			<!-- Nav Classic -->
			<ul class="nav nav-segment nav-fill" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="deskripsi-detail-tab" data-toggle="pill" href="#deskripsi-detail" role="tab"
						aria-controls="deskripsi-detail" aria-selected="true">
						<div class="d-md-flex justify-content-md-center align-items-md-center">
							<figure class="d-none d-md-block avatar avatar-xs mr-3">
								<img class="avatar-img" src="<?= base_url();?>assets/frontend/svg/icons/icon-13.svg" alt="SVG">
							</figure>
							Tentang
						</div>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="bidang-lomba-tab" data-toggle="pill" href="#bidang-lomba" role="tab"
						aria-controls="bidang-lomba" aria-selected="false">
						<div class="d-md-flex justify-content-md-center align-items-md-center">
							<figure class="d-none d-md-block avatar avatar-xs mr-3">
								<img class="avatar-img" src="<?= base_url();?>assets/frontend/svg/icons/icon-5.svg" alt="SVG">
							</figure>
							Bidang lomba
						</div>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="panduan-tab" data-toggle="pill" href="#panduan" role="tab" aria-controls="panduan"
						aria-selected="false">
						<div class="d-md-flex justify-content-md-center align-items-md-center">
							<figure class="d-none d-md-block avatar avatar-xs mr-3">
								<img class="avatar-img" src="<?= base_url();?>assets/frontend/svg/icons/icon-63.svg" alt="SVG">
							</figure>
							Panduan Kompetisi
						</div>
					</a>
				</li>
			</ul>
			<!-- End Nav Classic -->

			<!-- Tab Content -->
			<div class="tab-content">
				<div class="tab-pane fade mt-6 show active" id="deskripsi-detail" role="tabpanel"
					aria-labelledby="deskripsi-detail-tab">

					<?= $kompetisi->DESKRIPSI;?>

					<hr class="my-6">

					<h4 class="mb-1">Biaya Pendaftaran</h4>

					<div class="row">
						<div class="col-md-6">
							<span
								class="h2"><?= $kompetisi->BAYAR == 0 ? 'FREE': 'Rp.'.($CI->M_kompetisi->get_tiketRange($kompetisi->KODE_KOMPETISI)->low).' s/d '.'Rp.'.($CI->M_kompetisi->get_tiketRange($kompetisi->KODE_KOMPETISI)->high) ;?></span>
							<p class="small">Harap membaca panduan KOMPETISI!! untuk detail lebih lanjut</p>
						</div>

						<div class="col-md-6">
							<dl class="row">
								<?php if ($tiket != false) : ?>
								<?php foreach ($tiket as $key): ?>
								<dt class="col-sm-6 text-dark">
									<i class="fas fa-hand-holding-usd nav-icon"></i> <?= $key->NAMA_TIKET;?>
								</dt>
								<dd class="col-sm-6 text-sm-right"><?= ($key->HARGA_TIKET > 0 ? 'Rp.'.$key->HARGA_TIKET : 'FREE');?>
								</dd>
								<?php endforeach;?>
								<?php endif;?>
							</dl>
							<!-- End Row -->
						</div>
					</div>
					<!-- End Row -->
				</div>

				<div class="tab-pane fade mt-6" id="panduan" role="tabpanel" aria-labelledby="panduan-tab">
					<?php if ($kompetisi->PANDUAN == null) :?>
					<small class="form-text">Panduan belum ditambahkan</small>
					<?php else:?>
					<iframe
						src="<?= base_url(); ?>berkas/penyelenggara/<?= $kompetisi->KODE_PENYELENGGARA;?>/kompetisi/<?= $kompetisi->KODE_KOMPETISI;?>/panduan/<?= $kompetisi->PANDUAN;?>"
						frameborder="0" allowfullscreen class="w-100"></iframe>
					<!-- End Gallery -->

					<small class="form-text">Download panduan <a
							href="<?= base_url(); ?>berkas/penyelenggara/<?= $kompetisi->KODE_PENYELENGGARA;?>/kompetisi/<?= $kompetisi->KODE_KOMPETISI;?>/panduan/<?= $kompetisi->PANDUAN;?>"
							target="_blank"><?= $kompetisi->JUDUL;?></a></small>
					<?php endif;?>
				</div>

				<div class="tab-pane fade mt-6" id="bidang-lomba" role="tabpanel" aria-labelledby="bidang-lomba-tab">
					<?php if ($bidang != false) : ?>
					<div class="row center-flext">
						<?php foreach ($bidang as $key) :?>
						<div class="col-6 col-md-3 px-2 mb-3">
							<div
								class="custom-control bg-white shadow-sm custom-radio custom-control-inline checkbox-outline checkbox-icon text-center w-100 h-100" data-toggle="modal" data-target="#syaratlomba<?= $key->ID_BIDANG;?>">
								<label class="checkbox-outline-label w-100 rounded py-3 px-1 mb-0">
									<img class="img-fluid w-50 mb-3"
										src="<?= base_url();?><?= $key->POSTER == null ? 'assets/frontend/svg/illustrations/discussion-scene.svg' : 'berkas/kompetisi/bidang-lomba/'.$key->POSTER;?>"
										alt="SVG">
									<span class="d-block text-muted"><?= $key->BIDANG_LOMBA;?></span>
								</label>
							</div>
						</div>

						<!-- MODAL -->
						<div class="modal fade" id="syaratlomba<?= $key->ID_BIDANG;?>" data-backdrop="static" tabindex="-1"
							role="dialog" aria-labelledby="data-anggotaLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="data-anggotaLabel">Syarat dan ketentuan lomba <?= $key->BIDANG_LOMBA;?>
										</h5>
										<button type="button" class="btn btn-xs btn-icon btn-soft-secondary" data-dismiss="modal"
											aria-label="Close">
											<svg aria-hidden="true" width="10" height="10" viewBox="0 0 18 18"
												xmlns="http://www.w3.org/2000/svg">
												<path fill="currentColor"
													d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z" />
											</svg>
										</button>
									</div>
									<div class="modal-body">
										<p><?= $key->KETERANGAN;?></p>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach;?>
					</div>
					<?php endif;?>
				</div>
			</div>
			<!-- End Tab Content -->
			<!-- End Row -->
		</div>

		<div class="col-lg-4">
			<!-- Contact Form -->
			<div class="card card-bordered">
				<div class="card-body">

					<!-- Form -->
					<?php if($this->session->userdata('logged_in') == FALSE || !$this->session->userdata('logged_in')) :?>
					<div class="col-lg-auto align-self-lg-end text-lg-right">
						<a class="btn btn-block btn-sm btn-primary btn-wide transition-3d-hover" href="<?= site_url('login');?>">
							<i class="fas fa-plus fa-sm mr-1"></i> Login untuk daftar
						</a>
					</div>
					<?php else:?>
					<?php if($kompetisi->STATUS_KOMPETISI == 1):?>
					<a href="<?= site_url('daftar/'.$kompetisi->KODE_KOMPETISI);?>"
						class="btn btn-block btn-sm btn-primary btn-wide transition-3d-hover"><?php if($daftar == true):?>Telah
						mendaftar <?php else:?>Daftarkan diri<?php endif;?></a>
					<?php elseif ($kompetisi->STATUS_KOMPETISI != 1) :?>
					<button type="button"
						class="btn btn-block btn-sm btn-light btn-wide transition-3d-hover"><?= ($kompetisi->STATUS_KOMPETISI == 0 ? 'Belum dibuka' : 'Telah berakhir');?></button>
					<?php endif;?>
					<?php endif;?>
					<!-- End Form -->
				</div>
				<?php if ($contact != false) :?>
				<hr>

				<h4 class="mb-4 px-4">Narahubung</h4>
				<?php foreach ($contact as $key) :?>
				<!-- Media -->
				<div class="media mb-4 px-4">
					<span class="avatar avatar-lg avatar-soft-danger avatar-circle mr-3">
						<span class="avatar-initials"><?= substr($key->NAMA_CONTACT, 0, 2);?></span>
					</span>

					<div class="media-body">
						<h4 class="mb-1">
							<a class="text-dark"
								href="<?= $key->CONTACT_MEDIA == 'PHONE' ? 'tel:' : ($key->CONTACT_MEDIA == 'EMAIL' ? 'mailto:' : 'https://api.whatsapp.com/send?text=Hai&phone=');?><?= strtolower($key->CONTACT);?>"><?= $key->NAMA_CONTACT;?></a>
						</h4>

						<span class="d-block font-size-1 mb-1">
							<i
								class="<?= $key->CONTACT_MEDIA == 'WHATSAPP' ? 'fab font-weight-normal' : 'fas';?>  fa-<?= strtolower($key->CONTACT_MEDIA);?>"></i>
							<?= $key->CONTACT;?>
						</span>
						<a class="link"
							href="<?= $key->CONTACT_MEDIA == 'PHONE' ? 'tel:' : ($key->CONTACT_MEDIA == 'EMAIL' ? 'mailto:' : 'https://api.whatsapp.com/send?text=Hai&phone=');?><?= strtolower($key->CONTACT);?>"><?= $key->CONTACT_MEDIA;?></a>
					</div>
				</div>
				<!-- End Media -->
				<?php endforeach;?>
				<?php endif;?>
				<!-- End Contact Form -->
			</div>
		</div>
	</div>
	<!-- End Row -->

	<!-- Sticky Block End Point -->
</div>
<!-- End Property Description Section -->

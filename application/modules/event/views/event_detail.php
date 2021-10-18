<!-- Breadcrumb Section -->
<div class="container py-3 space-top-1">
	<div class="row align-items-lg-center">
		<div class="col-lg mb-2 mb-lg-0">
			<!-- Breadcrumb -->
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb breadcrumb-no-gutter font-size-1 mb-0">
					<li class="breadcrumb-item"><a href="<?= site_url('penyelenggara') ?>">Penyelenggara</a></li>
					<li class="breadcrumb-item"><a
							href="<?= site_url('penyelenggara/'.$event->KODE_PENYELENGGARA) ?>"><?= $event->NAMA;?></a></li>
					<li class="breadcrumb-item"><a href="<?= site_url('event') ?>">Event</a></li>
					<li class="breadcrumb-item active" aria-current="page"><?= $event->JUDUL;?></li>
				</ol>
			</nav>
			<!-- End Breadcrumb -->
		</div>

		<div class="col-lg-auto">
			<a class="btn btn-sm btn-ghost-secondary float-right"
				href="https://api.whatsapp.com/send?text=Hai, cek informasi penyelenggara <?= ucwords(strtolower($event->JUDUL)) ?> kami, lebih detail di <?php echo base_url(uri_string()); ?>"
				target="_blank">
				<i class="fab fa-whatsapp mr-2"></i> Share
			</a>
		</div>
	</div>
	<!-- End Row -->
</div>
<!-- End Breadcrumb Section -->

<!-- Page Header -->
<div class="container">
	<hr>

	<div class="page-header pb-1">

		<!-- Media -->
		<div class="d-sm-flex align-items-lg-center pt-1 px-0 pb-3">

			<div class="media-body">
				<div class="row">
					<div class="col-lg mb-3 mb-lg-0">
						<h1 class="h2 mb-1"><?= $event->JUDUL;?></h1>
					</div>
					<?php if($this->session->userdata('logged_in') == FALSE || !$this->session->userdata('logged_in')) :?>
					<div class="col-lg-auto align-self-lg-end text-lg-right">
						<a class="btn btn-sm btn-outline-primary mb-1 mb-sm-0 <?= $CI->agent->is_mobile() ? 'btn-block' : '';?>"
							href="<?= site_url('login');?>">
							<i class="fas fa-plus fa-sm mr-1"></i> Login untuk daftar
						</a>
					</div>
					<?php else:;?>
					<?php if($event->STATUS_EVENT == 1):?>
					<div class="col-lg-auto align-self-lg-end text-lg-right">
						<a class="btn btn-sm btn-outline-primary mb-1 mb-sm-0 <?= $CI->agent->is_mobile() ? 'btn-block' : '';?>"
							href="<?= site_url('daftar/'.$event->KODE_EVENT);?>">
							<?php if($daftar == true):?><i class="fas fa-check fa-sm mr-1"></i> Telah mendaftar <?php else:?><i
								class="fas fa-plus fa-sm mr-1"></i> Daftar<?php endif;?>
						</a>
					</div>
					<?php elseif ($event->STATUS_EVENT != 1) :?>
					<div class="col-lg-auto align-self-lg-end text-lg-right">
						<a class="btn btn-sm btn-outline-primary mb-1 mb-sm-0 <?= $CI->agent->is_mobile() ? 'btn-block' : '';?>">
							<?= ($event->STATUS_EVENT == 0 ? 'Belum dibuka' : 'Telah berakhir');?>
						</a>
					</div>
					<?php endif;?>
					<?php endif;?>
				</div>
				<!-- End Row -->
			</div>
		</div>
		<!-- End Media -->
	</div>
</div>
<!-- End Page Header -->

<!-- About Section -->
<div id="tentang-section" class="container">
	<div class="row mb-<?= $CI->agent->is_mobile() ? '0' : '5';?>">
		<div class="col-md-3 order-md-2 mb-3 mb-md-0">
			<div class="pl-md-4">
				<ul class="list-unstyled list-article">
					<li>
						<span class="h5 d-block">Penyelenggara</span>
						<span class="d-block font-size-1"><a
								href="<?= site_url('penyelenggara/'.$event->KODE_PENYELENGGARA) ?>"><?= $event->NAMA;?></a></span>
					</li>
					<li>
						<span class="h5 d-block">Tanggal</span>
						<span class="d-block font-size-1"><?= date("d F Y", strtotime($event->TANGGAL));?>, <?= $event->WAKTU;?>
							WIB</span>
					</li>

					<li>
						<span class="h5 d-block">FEE</span>
						<span
							class="d-block font-size-1">
							<?php if($event->BAYAR == 0):?>
								<span class="badge badge-primary">FREE</span>
							<?php else:?>
								<?php if(($CI->M_event->get_tiketRange($event->KODE_EVENT)->low) == ($CI->M_event->get_tiketRange($event->KODE_EVENT)->high)):?>
									<span class="badge badge-primary"><?= 'Rp.'.($CI->M_event->get_tiketRange($event->KODE_EVENT)->low) ;?></span>
								<?php else:?>
									<span class="badge badge-primary"><?= 'Rp.'.($CI->M_event->get_tiketRange($event->KODE_EVENT)->low).' s/d '.'Rp.'.($CI->M_event->get_tiketRange($event->KODE_EVENT)->high) ;?></span>
								<?php endif;?>
							<?php endif;?>
					</li>

					<li>
						<span class="h5 d-block">PLATFORM</span>
						<span class="d-block font-size-1"><span
								class="badge badge-<?= $event->ONLINE == 1 ? 'primary' : 'secondary';?>"><?= $event->ONLINE == 1 ? 'ONLINE' : 'OFFLINE';?></span></span>
					</li>

					<li>
						<span class="h5 d-block">MEDIA / TEMPAT</span>
						<span class="d-block font-size-1"><?= $event->MEDIA;?></span>
					</li>
					<?php if($sosmed != false) :?>
					<li>
						<span class="h5 d-block">SOCIAL MEDIA</span>

						<ul class="list-inline">
							<?php foreach ($sosmed as $key): ?>
							<li class="list-inline-item">
								<a class="icon icon-xs icon-soft-dark icon-circle" href="<?php echo prep_url($key->LINK_SOSMED);?>"
									data-toggle="tooltip" data-placement="top"
									title="<?= $key->NAMA_SOSMED;?> on <?= (isset($key->SOSMED) ? strtolower($key->SOSMED) : '');?>">
									<i class="fab fa-<?= (isset($key->SOSMED) ? strtolower($key->SOSMED) : '');?>"></i>
								</a>
							</li>
							<?php endforeach;?>
						</ul>
					</li>
					<?php endif;?>
				</ul>
			</div>
		</div>

		<div class="col-md-9">

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
				<?php if($event->BAYAR != 0):?>
				<li class="nav-item">
					<a class="nav-link" id="panduan-tab" data-toggle="pill" href="#panduan" role="tab" aria-controls="panduan"
						aria-selected="false">
						<div class="d-md-flex justify-content-md-center align-items-md-center">
							<figure class="d-none d-md-block avatar avatar-xs mr-3">
								<img class="avatar-img" src="<?= base_url();?>assets/frontend/svg/icons/icon-63.svg" alt="SVG">
							</figure>
							Tiket Event
						</div>
					</a>
				</li>
				<?php endif;?>
				<li class="nav-item">
					<a class="nav-link" id="bidang-lomba-tab" data-toggle="pill" href="#bidang-lomba" role="tab"
						aria-controls="bidang-lomba" aria-selected="false">
						<div class="d-md-flex justify-content-md-center align-items-md-center">
							<figure class="d-none d-md-block avatar avatar-xs mr-3">
								<img class="avatar-img" src="<?= base_url();?>assets/frontend/svg/icons/icon-5.svg" alt="SVG">
							</figure>
							Narahubung
						</div>
					</a>
				</li>
			</ul>
			<!-- End Nav Classic -->
			<div class="my-4">

				<!-- Tab Content -->
				<div class="tab-content">

					<div class="tab-pane fade mt-6 show active" id="deskripsi-detail" role="tabpanel"
						aria-labelledby="deskripsi-detail-tab">
						<div class="row">
							<div class="col-sm-5 col-lg-4 mb-3 mb-sm-0">
								<img class="card-img"
									src="<?= base_url();?><?= $event->POSTER == null ? "assets/frontend/img/400x500/img14.jpg" : "berkas/penyelenggara/".$event->KODE_PENYELENGGARA."/event/".$event->KODE_EVENT."/POSTER/".$event->POSTER;?>"
									alt="poster">
							</div>
							<div class="col-sm-7 col-lg-8">
								<?= $event->DESKRIPSI;?>
							</div>
						</div>
					</div>
					<div class="tab-pane fade mt-6" id="panduan" role="tabpanel" aria-labelledby="panduan-tab">
						<?php if($tiket != false):?>
						<div class="mb-4">
							<p>Biaya pendaftaran yang harus dibayar saat melakukan pendaftaran.</p>
						</div>

						<!-- Slick Carousel -->
						<div class="row">
							<?php foreach ($tiket as $key) : ?>
							<div class="col-4 mb-4">
								<!-- Card -->
								<div class="card card-bordered card-hover-shadow w-100">
									<div class="card-body">
										<h3 class="mb-3">
											<a class="text-dark">Tiket - <?= $key->NAMA_TIKET;?></a>
										</h3>

										<span
											class="font-size-1 text-body mb-1 mr-2"><?= ($key->HARGA_TIKET > 0 ? "Rp.".$key->HARGA_TIKET : "FREE");?></span>

										<span class="badge badge-soft-info mr-2">
											<span class="legend-indicator bg-info"></span><?= $event->ONLINE == 1 ? 'ONLINE' : 'OFFLINE';?>
										</span>
									</div>
								</div>
								<!-- End Card -->
							</div>
							<?php endforeach;?>
						</div>
						<!-- End Slick Carousel -->
						<?php else:?>
						<small class="form-text">Tiket belum ditambahkan</small>
						<?php endif;?>
					</div>

					<div class="tab-pane fade mt-6" id="bidang-lomba" role="tabpanel" aria-labelledby="bidang-lomba-tab">
						<?php if($contact != false):?>

						<div class="row mx-n2">
							<?php foreach ($contact as $key) : ?>
							<div class="col-12 col-sm-6 col-lg-4 px-2 mb-3">
								<!-- Card -->
								<a class="card card-bordered card-hover-shadow h-100"
									href="<?= $key->CONTACT_MEDIA == 'PHONE' ? 'tel:' : ($key->CONTACT_MEDIA == 'EMAIL' ? 'mailto:' : 'https://api.whatsapp.com/send?text=Hai&phone=');?><?= strtolower($key->CONTACT);?>">
									<div class="card-body">
										<div class="media align-items-center">
											<span class="avatar avatar bg-soft-secondary avatar-circle mr-3"><span
													class="contact-inisial"><?= strtoupper(substr($key->NAMA_CONTACT, 0, 2));?></span></span>
											<div class="media-body">
												<h5 class="text-hover-primary mb-0"><?= $key->NAMA_CONTACT ;?></h5>
												<small class="text-body"><?= $key->CONTACT;?></small>
											</div>
											<div class="pl-2 ml-auto">
												<span class="text-muted text-hover-primary">
													<i
														class="<?= $key->CONTACT_MEDIA == 'WHATSAPP' ? 'fab font-weight-normal font-size-2' : 'fas';?>  fa-<?= strtolower($key->CONTACT_MEDIA);?>"></i>
												</span>
											</div>
										</div>
									</div>
								</a>
								<!-- End Card -->
							</div>
							<?php endforeach;?>
						</div>
						<!-- End Row -->
						<?php else:?>
						<small class="form-text">Tiket belum ditambahkan</small>
						<?php endif;?>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- End Row -->
</div>
<!-- Tentang Section -->

<!-- Divider -->
<div class="container">
	<hr class="my-<?= $CI->agent->is_mobile() ? '2' : '10';?>">
</div>
<!-- End Divider -->

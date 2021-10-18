  <?php if ($aktivasi->STATUS == 0) : ?>
  <!-- Alert -->
  <div class="alert alert-soft-danger text-center rounded-0 mb-4" role="alert">
  	Harap melakukan aktivasi akun terlebih dahulu untuk dapat mengakses fitur NESTIVENT. <a class="alert-link"
  		href="<?= site_url('hold-verification') ?>">AKTIVASI SEKARANG</a>
  </div>
  <!-- End Alert -->
  <?php elseif ($kPanel == FALSE AND $alert_kpanel == TRUE): ?>
  <?php if ($pending_kpanel == TRUE) : ?>
  <!-- Alert -->
  <div class="alert alert-soft-info rounded-0 mb-4" role="alert">
  	Permintaan akses K-Panel anda sedang diproses, <a class="alert-link"
  		href="<?= site_url('pengajuan/penyelenggara') ?>">cek laman k-panel</a>?
  	<small class="text-muted text-right pull-right float-right" style="margin-top: 10px !important"><a
  			href="<?= site_url('pengguna/jangan_tampilkan/ALERT_MakeK_PANEL') ?>" class="text-muted">jangan
  			tampilkan</a></small>
  </div>
  <!-- End Alert -->
  <?php else: ?>
  <!-- Alert -->
  <div class="alert alert-soft-info rounded-0 mb-4" role="alert">
  	Anda tidak memiliki akses K-Panel untuk membuat kegiatan, <a class="alert-link"
  		href="<?= site_url('pengajuan/penyelenggara') ?>">buat sekarang</a>?
  	<small class="text-muted text-right pull-right float-right" style="margin-top: 10px !important"><a
  			href="<?= site_url('pengguna/jangan_tampilkan/ALERT_MakeK_PANEL') ?>" class="text-muted">jangan
  			tampilkan</a></small>
  </div>
  <!-- End Alert -->
  <?php endif;?>
  <?php endif; ?>

  <div class="row mb-4">
  	<div class="col-6 col-sm-6">
  		<div class="card card-frame h-100">
  			<div class="card-body">
  				<!-- Icon Block -->
  				<div class="media d-block d-sm-flex">
  					<figure class="w-100 max-w-8rem mb-2 mb-sm-0 mr-sm-4">
  						<img class="img-fluid" src="<?= base_url();?>assets/frontend/svg/icons/icon-7.svg" alt="SVG">
  					</figure>
  					<div class="media-body">
  						<h2 class="h4">Kompetisi</h2>
  						<p class="font-size-1 text-body mb-0"><?= $daftarKompetisi;?> kompetisi
  							<?= $CI->agent->is_mobile() ? '' : 'diikuti';?></p>
  					</div>
  				</div>
  				<!-- End Icon Block -->
  			</div>
  		</div>
  	</div>
  	<div class="col-6 col-sm-6">
  		<div class="card card-frame h-100">
  			<div class="card-body">
  				<!-- Icon Block -->
  				<div class="media d-block d-sm-flex">
  					<figure class="w-100 max-w-8rem mb-2 mb-sm-0 mr-sm-4">
  						<img class="img-fluid" src="<?= base_url();?>assets/frontend/svg/icons/icon-18.svg" alt="SVG">
  					</figure>
  					<div class="media-body">
  						<h2 class="h4">Event</h2>
  						<p class="font-size-1 text-body mb-0"><?= $daftarEvent;?> Event
  							<?= $CI->agent->is_mobile() ? '' : 'diikuti';?></p>
  					</div>
  				</div>
  				<!-- End Icon Block -->
  			</div>
  		</div>
  	</div>
  </div>

  <hr class="mb-4 mt-0">
  <div class="row mb-4">
  	<div class="col-md-7">
  		<div class="card">
  			<div class="card-header">
  				<h5 class="card-header-title">Kegiatan terbaru</h5>
  			</div>
  			<!-- Table -->
  			<div class="card-body px-0">
  				<table class="table table-borderless table-thead-bordered table-align-middle">
  					<thead class="thead-light">
  						<tr>
  							<th>Kegiatan</th>
  							<th>Status</th>
  						</tr>
  					</thead>
  					<tbody>
  						<?php if($event != false): ?>
  						<?php foreach ($event as $key) :?>
  						<tr>
  							<td>
  								<div class="media align-items-center">
  									<div class="avatar avatar-sm avatar-soft-dark avatar-circle mr-3">
  										<span class="avatar-initials"><?= substr($key->JUDUL, 0, 1);?></span>
  									</div>

  									<div class="media-body">
  										<a class="d-inline-block text-dark"
  											href="<?= site_url($key->kegiatan == "kegiatan" ? 'event/'.$key->KODE : 'kompetisi/'.$key->KODE);?>">
  											<h6 class="text-hover-primary mb-0"><?= $key->JUDUL;?>
  												<?= $CI->agent->is_mobile() ? '' : '<img class="avatar avatar-xss ml-1" src="'.base_url().'assets/frontend/svg/illustrations/top-vendor.svg" alt="Image Description" data-toggle="tooltip" data-placement="top" title="Verified">';?>
  											</h6>
  										</a>
  										<small class="d-block"><?= date("d F Y", strtotime($key->TANGGAL));?></small>
  									</div>
  								</div>
  							</td>
  							<td>
  								<span
  									class="badge badge-soft-<?= ($key->kegiatan == "kegiatan" ? 'primary' : 'warning');?> badge-pill"><?= ($key->kegiatan == "kegiatan" ? 'event' : 'kompetisi');?></span>
  							</td>
  						</tr>
  						<?php endforeach;?>
  						<?php endif;?>
  					</tbody>
  				</table>
  			</div>
  			<!-- End Table -->

  			<!-- Footer -->
  			<div class="card-footer d-flex justify-content-end">
  			</div>
  			<!-- End Footer -->
  		</div>
  	</div>
  	<div class="col-md-5">
  		<div class="card">
  			<div class="card-header">
  				<h5 class="card-header-title">Notifikasi terbaru</h5>
  				<a href="<?= site_url('pengguna/notifikasi') ?>" class="btn btn-primary btn-xs pull-right">more</a>
  			</div>
  			<!-- Table -->
  			<div class="card-body scroll-y-400">
  				<?php if ($notifikasi == false): ?>
  				<div class="row">
  					<div class="col-12">
  						<div class="media align-items-center">
  							<div class="media-body">
  								<a class="d-inline-block text-dark">
  									<h6 class="text-hover-primary mb-0">
  										<center>Tidak ada notifikasi terbaru</center>
  									</h6>
  								</a>
  							</div>
  						</div>
  					</div>
  				</div>
  				<?php else: ?>
  				<?php foreach ($notifikasi as $key): ?>
  				<div class="row mb-4 cursor" data-target="#detail_notif<?= $key->ID_LOG?>" data-toggle="modal">
  					<div class="col-12">
  						<div class="media align-items-center">
  							<div class="media-body">
  								<a class="d-inline-block text-dark">
  									<h6 class="text-hover-primary mb-0"><?= $key->REFERENCES ?></h6>
  								</a>
  								<small class="d-block text-muted"><span
  										class="text-dark"><?= $CI->M_pengguna->get_sender($key->SENDER) ?></span>
  									<?= $key->MESSAGE ?></small>
  							</div>
  						</div>
  					</div>
  					<div class="col-12 text-right">
  						<small class="text-muted pull-right"><?= $CI->time_elapsed($key->CREATED_AT) ?></small>
  					</div>
  				</div>

  				<!-- DELETE ACCOUNT -->

  				<div id="detail_notif<?= $key->ID_LOG; ?>" class="modal fade" tabindex="-1" role="dialog"
  					aria-labelledby="ubah_profil" aria-hidden="true">
  					<div class="modal-dialog modal-dialog-centered" role="document">
  						<div class="modal-content">
  							<div class="modal-body">
  								<!-- Form Group -->
  								<p class="h4"><b><?= $key->REFERENCES ?></b></p>
  								<p class="h6 text-muted"><span
  										class="text-dark"><?= $CI->M_pengguna->get_sender($key->SENDER) ?></span> <?= $key->MESSAGE ?><br>
  									<small
  										class="text-muted float-right pull-right mt-2"><?= $CI->time_elapsed($key->CREATED_AT) ?></small>
  								</p>
  								<hr class="mt-5">
  								<button type="button" class="btn btn-xs btn-white btn-block" data-dismiss="modal">Tutup</button>
  							</div>
  						</div>
  					</div>
  				</div>
  				<!-- END DELETE ACCOUNT -->
  				<?php endforeach; ?>
  				<?php endif; ?>
  			</div>
  			<!-- End Table -->

  			<!-- Footer -->
  			<div class="card-footer d-flex justify-content-end">
  			</div>
  			<!-- End Footer -->
  		</div>
  	</div>
  </div>

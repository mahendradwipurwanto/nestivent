<!-- Card -->
<div class="card">
	<div class="card-header">
		<h5 class="card-header-title">Event yang diikuti</h5>
	</div>
	<div class="card-body">

		<?php if($eventDiikuti == FALSE): ?>
			<div class="text-center space-1">
				<img class="avatar avatar-xl mb-3" src="<?= base_url();?>assets/frontend/svg/components/empty-state-no-data.svg" alt="Image Description">
				<p class="card-text">Belum ada event yang diikuti</p>
			</div>
			<!-- End Empty State -->
			<?php else: ?>

				<!-- List Group -->
				<ul class="list-group mb-5">

					<?php foreach ($eventDiikuti as $key): ?>

						<!-- List Item -->
						<li class="list-group-item">
							<div class="media">
								<img class="avatar avatar-sm mr-3" src="<?= base_url();?>berkas/penyelenggara/<?= $key->KODE_PENYELENGGARA;?>/<?= $key->LOGO;?>" alt="<?= $key->JUDUL;?>">

								<div class="media-body">
									<div class="row">
										<div class="col-sm mb-3 mb-sm-0">
											<span class="d-block text-dark"><?= $key->JUDUL;?>
											<span class="badge badge-primary ml-1"><?= ($key->STATUS == 0 ? "Pendaftaran diproses" : ($key->STATUS == 1 ? "Pendaftaran diterima" : "Pendaftaran ditolak"));?></span>
										</span>
										<?= $CI->agent->is_mobile() ? '' : '<small class="d-block text-muted">'.$key->INSTANSI.'</small>';?>
									</div>

									<div class="col-sm-auto">
										<a class="btn btn-xs btn-white mr-2" href="<?= site_url('detail-daftar/'.$key->KODE_PENDAFTARAN);?>"><i class="fas fa-pencil-alt mr-1"></i> data pendaftaranmu</a>
									</div>
									<!-- End Row -->
								</div>
							</div>
						</li>
						<!-- End List Item -->

					<?php endforeach;?>

				</ul>
				<!-- End List Group -->
				<?= $this->pagination->create_links(); ?>
			<?php endif;?>
		</div>
	</div>
<!-- End Card -->
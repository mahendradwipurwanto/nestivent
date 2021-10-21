<!-- Card -->
<div class="card mb-4">
	<div class="card-header">
		<h5 class="card-header-title">Data pendaftaran kompetisi <?= $WEB_JUDUL;?></h5>
	</div>
	<div class="card-body">

		<div class="row">
			<div class="col-12">
				<div class="mb-4">
					<div class="row border-bottom">
						<div class="col-sm-12 col-md-6">
							<div class="media align-items-center mb-3">
								<span class="d-block font-size-1 mr-3">Bidang lomba</span>
								<div class="media-body text-right">
									<span class="text-dark font-weight-bold"><?= $dataPendaftaran->BIDANG;?></span>
								</div>
							</div>
							<div class="media align-items-center mb-3">
								<span class="d-block font-size-1 mr-3">Nama TIM </span>
								<div class="media-body text-right">
									<span class="text-dark font-weight-bold"><?= $dataPendaftaran->NAMA_TIM;?></span>
								</div>
							</div>
							<div class="media align-items-center mb-3">
								<span class="d-block font-size-1 mr-3">Asal PTS <i class="far fa-question-circle text-body ml-1"
										data-container="body" data-toggle="popover" data-placement="top" data-trigger="hover"
										title="Alamat PTS" data-content="<?= $dataPendaftaran->ALAMAT_PTS;?>"></i></span>
								<div class="media-body text-right">
									<span class="text-dark font-weight-bold"><?= $dataPendaftaran->namapt;?></span>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-md-6 border-left">
							<div class="media align-items-center mb-3">
								<span class="d-block font-size-1 mr-3">Asal PTS</span>
								<div class="media-body text-right">
									<span class="text-dark font-weight-bold"><?= $dataPendaftaran->namapt;?></span>
								</div>
							</div>
							<div class="media mb-3">
								<span class="d-block font-size-1 mr-3">Alamat PTS</span>
								<div class="media-body text-right">
									<span class="text-body"><?= $dataPendaftaran->ALAMAT_PTS;?></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="border-bottom mb-4">
					<label class="input-label">Status berkas keperluan <i class="fa fa-question-circle text-muted"
							aria-hidden="true" data-toggle="tooltip" data-placement="top"
							title="Keterangan mengenai, status semua berkas keperluan anda"></i></label>
					<div class="media align-items-center mb-3">
						<span class="d-block font-size-1 mr-3">Data TIM anda</span>
						<div class="media-body text-right">
							<?php if ($dataPendaftaran->ASAL_PTS == null || $dataPendaftaran->ALAMAT_PTS == null || $dataPendaftaran->NAMA_TIM == null):?>
							<span class="badge badge-danger" type="button" data-toggle="modal" data-target="#data-tim">lengkapi
								data</span>
							<?php else:?>
							<span class="badge badge-success" type="button" data-toggle="modal" data-target="#data-tim">lengkap</span>
							<?php endif;?>
						</div>
					</div>
					<div class="media align-items-center mb-3">
						<span class="d-block font-size-1 mr-3">Data anggota</span>
						<div class="media-body text-right">
							<?php if ($get_anggotaTim == false) :?>
							<a href="<?= site_url('pengguna/data-anggota/'.$dataPendaftaran->KODE_PENDAFTARAN);?>"
								class="badge badge-danger">lengkapi data</a>
							<?php else:?>
							<a href="<?= site_url('pengguna/data-anggota/'.$dataPendaftaran->KODE_PENDAFTARAN);?>"
								class="badge badge-success">lengkap</a>
							<?php endif;?>
						</div>
					</div>
					<div class="media align-items-center mb-3">
						<span class="d-block font-size-1 mr-3">Berkas TIM</span>
						<div class="media-body text-right">
							<?php if ($cekBerkas == false) :?>
							<a href="<?= site_url('pengguna/berkas-kompetisi/'.$dataPendaftaran->KODE_PENDAFTARAN);?>"
								class="badge badge-danger">lengkapi data</a>
							<?php else:?>
							<a href="<?= site_url('pengguna/berkas-kompetisi/'.$dataPendaftaran->KODE_PENDAFTARAN);?>"
								class="badge badge-success">lengkap</a>
							<?php endif;?>
						</div>
					</div>
					<div class="media align-items-center mb-3">
						<span class="d-block font-size-1 mr-3">Pembayaran</span>
						<div class="media-body text-right">
							<?php if ($cekPembayaran == false) :?>
							<a href="<?= site_url('pengguna/pembayaran-kompetisi/'.$dataPendaftaran->KODE_PENDAFTARAN);?>"
								class="badge badge-danger">bayar baya pendaftaran</a>
							<?php else:?>
							<!-- diproses admin -->
							<?php if ($cekPembayaran->STAT_BAYAR == 0): ?>
							<a href="<?= site_url('pengguna/pembayaran-kompetisi/'.$dataPendaftaran->KODE_PENDAFTARAN);?>"
								class="badge badge-warning">sedang diproses</a>
							<?php elseif($cekPembayaran->STAT_BAYAR == 1):?>
							<a href="<?= site_url('pengguna/pembayaran-kompetisi/'.$dataPendaftaran->KODE_PENDAFTARAN);?>"
								class="badge badge-success">diterima</a>
							<?php elseif($cekPembayaran->STAT_BAYAR == 2):?>
							<a href="<?= site_url('pengguna/pembayaran-kompetisi/'.$dataPendaftaran->KODE_PENDAFTARAN);?>"
								class="badge badge-danger">ditolak</a>
							<?php endif;?>
							<?php endif;?>
						</div>
					</div>
					<div class="media align-items-center mb-3">
						<span class="d-block font-size-1 mr-3">Unggah Karya</span>
						<div class="media-body text-right">
							<?php if ($cekPembayaran == false) :?>
							<a class="badge badge-danger">harap bayar baya pendaftaran</a>
							<?php else:?>
							<?php if ($cekPembayaran->STAT_BAYAR == 1): ?>
							<?php if ($cek_Karya == true) :?>
							<a href="<?= site_url('pengguna/data-karya/'.$dataPendaftaran->KODE_PENDAFTARAN);?>"
								class="badge badge-success">kelola karya</a>
							<?php else:?>
							<a href="<?= site_url('pengguna/data-karya/'.$dataPendaftaran->KODE_PENDAFTARAN);?>"
								class="badge badge-danger">unggah karya</a>
							<?php endif;?>
							<?php else:?>
							<a class="badge badge-warning">pembayaran sedang diproses</a>
							<?php endif;?>
							<?php endif;?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- MODAL -->
<div class="modal fade" id="data-tim" data-backdrop="static" tabindex="-1" role="dialog"
	aria-labelledby="data-anggotaLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="data-anggotaLabel">Data PTS TIM <?= $dataPendaftaran->NAMA_TIM;?></h5>
				<button type="button" class="btn btn-xs btn-icon btn-soft-secondary" data-dismiss="modal" aria-label="Close">
					<svg aria-hidden="true" width="10" height="10" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
						<path fill="currentColor"
							d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z" />
					</svg>
				</button>
			</div>
			<form action="<?= site_url('pengguna/update_pts');?>" method="POST">
				<input type="hidden" name="KODE_PENDAFTARAN" value="<?= $dataPendaftaran->KODE_PENDAFTARAN;?>">
				<div class="modal-body">
					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<label class="input-label font-weight-bold">Nama TIM<span class="text-danger">*</span></label>
								<input type="text" name="NAMA_TIM" class="form-control" value="<?= $dataPendaftaran->NAMA_TIM;?>"
									required>
							</div>

							<!-- Divider -->
							<hr class="my-0 mb-4">
							<!-- End Divider -->

						</div>
						<div class="col-12">
							<div class="form-group">
								<label class="input-label font-weight-bold">Asal PTS <small class="text-danger">*</small></label>
								<select id="select-pts" class="custom-select" name="ASAL_PTS" data-select="listPts" size="1"
									style="width: 100%;" data-hs-select2-options='{
							                "placeholder": "<?= $dataPendaftaran->namapt;?>"
							              }'>
								</select>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label class="input-label font-weight-bold">Alamat PTS <small class="text-danger">*</small></label>
								<textarea class="form-control form-control-sm" rows="3"
									name="ALAMAT_PTS"><?= $dataPendaftaran->ALAMAT_PTS;?></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-white btn-sm" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>



<script type="text/javascript">
	$('#select-pts').select2({
		ajax: {
			url: '<?= site_url('
			ajx - data - pts - all ')?>',
			dataType: 'json',
			method: 'post',
			data: params => {
				console.log(params)
				var query = {
					search: params.term,
					type: 'public'
				}
				return query;
			},
			processResults: data => {
				let arrData = [];
				for (x of data) {
					temp = {
						id: x.kodept,
						text: x.namapt
					}
					arrData.push(temp)
				}
				return {
					results: arrData
				}
			}
		},
		placeholder: "<?= $dataPendaftaran->namapt;?>",
		// selectionCssClass: 'selectcss-custom'
	});

</script>

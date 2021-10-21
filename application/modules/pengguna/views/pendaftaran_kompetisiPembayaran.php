<!-- Card -->
<div class="card">
	<div class="card-header">
		<h5 class="card-header-title">Data pembayaran TIM <?= $dataPendaftaran->NAMA_TIM;?> -
			<?= $dataPendaftaran->BIDANG_LOMBA;?></h5>
		<a href="<?= site_url('detail-daftar-kompetisi/'.$dataPendaftaran->KODE_PENDAFTARAN);?>"
			class="btn btn-xs btn-secondary float-right">kembali</a>
	</div>
	<div class="card-body">
		<?php if($dataPembayaran == false):?>
		<div class="alert alert-danger">
			<small>Harap menunggah bukti pembayaran untuk TIM anda.</small>
		</div>
		<?php endif;?>
		<form action="<?= site_url('pengguna/kelola_pembayaran');?>" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="KODE_KOMPETISI" value="<?= $dataPendaftaran->KODE_KOMPETISI;?>">
			<input type="hidden" name="KODE_PENDAFTARAN" value="<?= $dataPendaftaran->KODE_PENDAFTARAN;?>">
			<input type="hidden" name="BIDANG_LOMBA" value="<?= $dataPendaftaran->BIDANG_LOMBA;?>">
			<input type="hidden" name="TIPE_KARYA" value="<?= $dataPendaftaran->TIPE_KARYA;?>">
			<input type="hidden" name="NAMA_TIM" value="<?= $dataPendaftaran->NAMA_TIM;?>">

			<input type="hidden" name="TOT_BAYAR"
				value="<?= $controller->M_pengguna->get_biayaDaftar($dataPendaftaran->ID_TIKET);?>">

			<div class="row">
				<div class="col-6">
					<div class="media align-items-center mb-3">
						<span class="d-block font-size-1 mr-3">Nama TIM</span>
						<div class="media-body text-right">
							<span class="text-dark font-weight-bold"><?= $dataPendaftaran->NAMA_TIM;?></span>
						</div>
					</div>
					<div class="media align-items-center mb-3">
						<span class="d-block font-size-1 mr-3">Biaya pendaftaran</span>
						<div class="media-body text-right">
							<span
								class="text-dark font-weight-bold">Rp.<?= number_format($controller->M_pengguna->get_biayaDaftar($dataPendaftaran->ID_TIKET),0,",",".");?></span>
						</div>
					</div>
					<div class="media align-items-center mb-3">
						<span class="d-block font-size-1 mr-3">Bank Tujuan</span>
						<div class="media-body text-right">
							<span class="text-dark font-weight-bold"><?= $kompetisi->BANK;?></span>
						</div>
					</div>
					<div class="media align-items-center mb-3">
						<span class="d-block font-size-1 mr-3">Nomor Rekening</span>
						<div class="media-body text-right">
							<span class="text-dark font-weight-bold"><?= $kompetisi->NO_REK;?></span>
						</div>
					</div>
					<?php if($cekPembayaran != false):?>
					<input type="hidden" name="KODE_TRANS" value="<?= $dataPembayaran->KODE_TRANS;?>">
					<div class="media align-items-center mb-3">
						<span class="d-block font-size-1 mr-3">Waktu pembayaran</span>
						<div class="media-body text-right">
							<span
								class="text-dark font-weight-bold"><?= date("d F Y, H:i", strtotime($dataPembayaran->LOG_TIME));?></span>
						</div>
					</div>
					<div class="media align-items-center mb-3">
						<span class="d-block font-size-1 mr-3">Status Pembayaran</span>
						<div class="media-body text-right">
							<?php 

							switch ($dataPembayaran->STAT_BAYAR) {
								case 0:
									echo '<span class="badge badge-warning">sedang diproses</span>';
									break;
								case 1:
									echo '<span class="badge badge-success">diterima</span>';
									break;
								case 2:
									echo '<span class="badge badge-danger">ditolak</span>';
									break;
								
								default:
								echo '<span class="badge badge-warning">sedang diproses</span>';
									break;
							};?>

						</div>
					</div>
					<?php endif;?>
				</div>
				<div class="col-6 border-left">
					<div class="form-group mx-auto mb-2">
						<span class="d-block font-size-1 mr-3">Bukti Pembayaran</span>
						<label for="GETP_PEMBAYARAN" class="upload-card mx-auto" style="width: 225px; height: auto;">
							<img id="P_PEMBAYARAN" class="upload-img w-100 P_PEMBAYARAN cursor" src="
						<?php if($dataPembayaran == false):?>
						<?= base_url();?>assets/frontend/img/others/Pickanimage.png<?php else:?>
								<?php if($dataPembayaran->BUKTI_BAYAR == null):?>
								<?= base_url();?>assets/frontend/img/others/Pickanimage.png<?php else:?>
								<?= base_url();?>berkas/pendaftaran/kompetisi/<?= preg_replace("/[^a-zA-Z]+/", "_", $dataPendaftaran->BIDANG_LOMBA);?>/<?= preg_replace("/[^a-zA-Z]+/", "_", $dataPendaftaran->NAMA_TIM);?>_<?= $this->session->userdata('kode_user');?>/pembayaran/<?= $dataPembayaran->BUKTI_BAYAR;?>
								<?php endif;?>
								<?php endif;?>" alt="Placeholder">
						</label>
						<input type="file" id="GETP_PEMBAYARAN" class="form-control-file hidden" name="BUKTI_BAYAR"
							onchange="previewP_PEMBAYARAN(this);" accept="image/*" required>
						<small class="text-muted">Max 2Mb size.</small>
					</div>
				</div>
			</div>

			<div class="modal-footer px-0">
				<button type="submit" class="btn btn-primary btn-sm" id="send-button">Simpan data</button>
			</div>
		</form>
	</div>
</div>
<!-- End Card -->

<script>
	$('form').submit(function (event) {
		$('#send-button').prop("disabled", true);
		// add spinner to button
		$('#send-button').html(
			`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
		);
	});

</script>
<script type="text/javascript">
	function previewP_PEMBAYARAN(input) {
		$(".P_PEMBAYARAN").removeClass('hidden');
		var file = $("#GETP_PEMBAYARAN").get(0).files[0];

		if (file) {
			var reader = new FileReader();

			reader.onload = function () {
				$("#P_PEMBAYARAN").attr("src", reader.result);
			}

			reader.readAsDataURL(file);
		}
	}

</script>

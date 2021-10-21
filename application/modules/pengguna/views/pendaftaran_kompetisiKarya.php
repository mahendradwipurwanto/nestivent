<!-- Card -->
<div class="card">
	<div class="card-header">
		<h5 class="card-header-title">Data karya TIM <?= $dataPendaftaran->NAMA_TIM;?> -
			<?= $dataPendaftaran->BIDANG_LOMBA;?></h5>
		<a href="<?= site_url('detail-daftar-kompetisi/'.$dataPendaftaran->KODE_PENDAFTARAN);?>"
			class="btn btn-xs btn-secondary float-right">kembali</a>
	</div>
	<div class="card-body">
		<?php if($dataKarya == false):?>
		<div class="alert alert-danger">
			<small>Harap lengkapi dengan mengunggah dan lengkapi data karya dari TIM anda.</small>
		</div>
		<?php endif;?>
		<form action="<?= site_url('pengguna/kelola_karya');?>" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="KODE_KOMPETISI" value="<?= $dataPendaftaran->KODE_KOMPETISI;?>">
			<input type="hidden" name="KODE_PENDAFTARAN" value="<?= $dataPendaftaran->KODE_PENDAFTARAN;?>">
			<input type="hidden" name="BIDANG_LOMBA" value="<?= $dataPendaftaran->BIDANG_LOMBA;?>">
			<input type="hidden" name="TIPE_KARYA" value="<?= $dataPendaftaran->TIPE_KARYA;?>">
			<input type="hidden" name="NAMA_TIM" value="<?= $dataPendaftaran->NAMA_TIM;?>">
			<div class="form-group">
				<label class="input-label">Judul <small class="text-danger">*</small></label>
				<input type="text" name="JUDUL" class="form-control form-control-sm"
					value="<?= $dataKarya != false ? $dataKarya->JUDUL : '' ;?>" required>
			</div>

			<!-- PDF 1 -->
			<?php if ($dataPendaftaran->TIPE_KARYA == 1) : ?>
			<div class="form-group">
				<label class="input-label">File Karya (dokumen) <small class="text-danger">*</small> <i
						class="fa fa-question-circle text-muted" aria-hidden="true" data-toggle="tooltip" data-placement="top"
						title="Jika karya anda dalam bentuk dokumen seperti PDF atau Gambar."></i></label>
				<?php if($dataKarya != false && $dataKarya->FILE != null):?>
				<a href="<?= base_url();?>berkas/pendaftaran/kompetisi/<?= preg_replace("/[^a-zA-Z]+/", "_", $dataPendaftaran->BIDANG_LOMBA);?>/<?= preg_replace("/[^a-zA-Z]+/", "_", $dataPendaftaran->NAMA_TIM);?>_<?= $this->session->userdata('kode_user');?>/karya/<?= $dataKarya->FILE;?>"
					class="btn btn-sm btn-primary transition-3d-hover" target="_blank">Cek Berkas</a>
				<?php endif;?>
				<label class="btn btn-sm btn-primary transition-3d-hover file-attachment-btn" for="fileAttachmentBtn">
					<span
						id="customFileUpload"><?= $dataKarya != false ? $dataKarya->FILE != null ? $dataKarya->FILE : 'Tambahkan dokumen karya' : 'Tambahkan dokumen karya' ;?></span>
					<input id="fileAttachmentBtn" name="KARYA" type="file" class="js-file-attach file-attachment-btn-label"
						accept=".pdf" data-hs-file-attach-options='{
							"textTarget": "#customFileUpload",
							"maxFileSize": 10240
						}'>
				</label>
				<br>
				<small class="text-muted">Harap unggah dokumen karya anda dalam format pdf.</small>
				<script type="text/javascript">
					$('#fileAttachmentBtn').change(function () {
						var file = $('#fileAttachmentBtn')[0].files[0].name;
						$('#customFileUpload').text(file);
					});

				</script>
			</div>
			<?php endif;?>


			<!-- Gambar -->
			<?php if ($dataPendaftaran->TIPE_KARYA == 2) : ?>
			<div class="form-group">
				<label class="input-label">File Karya (gambar) <small class="text-danger">*</small> <i
						class="fa fa-question-circle text-muted" aria-hidden="true" data-toggle="tooltip" data-placement="top"
						title="Jika karya anda dalam bentuk dokumen seperti PDF atau Gambar."></i></label>
				<?php if($dataKarya != false && $dataKarya->FILE != null):?>
				<a href="<?= base_url();?>berkas/pendaftaran/kompetisi/<?= preg_replace("/[^a-zA-Z]+/", "_", $dataPendaftaran->BIDANG_LOMBA);?>/<?= preg_replace("/[^a-zA-Z]+/", "_", $dataPendaftaran->NAMA_TIM);?>_<?= $this->session->userdata('kode_user');?>/karya/<?= $dataKarya->FILE;?>"
					class="btn btn-sm btn-primary transition-3d-hover" target="_blank">Cek Berkas</a>
				<?php endif;?>
				<label class="btn btn-sm btn-primary transition-3d-hover file-attachment-btn" for="fileAttachmentBtn">
					<span
						id="customFileUpload"><?= $dataKarya != false ? $dataKarya->FILE != null ? $dataKarya->FILE : 'Tambahkan dokumen karya' : 'Tambahkan dokumen karya' ;?></span>
					<input id="fileAttachmentBtn" name="KARYA" type="file" class="js-file-attach file-attachment-btn-label"
						accept="image/*" data-hs-file-attach-options='{
							"textTarget": "#customFileUpload",
							"maxFileSize": 10240
						}'>
				</label>
				<br>
				<small class="text-muted">Harap unggah dokumen karya anda dalam format gambar (png, jpg, jpeg).</small>
				<script type="text/javascript">
					$('#fileAttachmentBtn').change(function () {
						var file = $('#fileAttachmentBtn')[0].files[0].name;
						$('#customFileUpload').text(file);
					});

				</script>
			</div>
			<?php endif;?>


			<!-- Video LINK -->
			<?php if ($dataPendaftaran->TIPE_KARYA == 3) :?>
			<div class="form-group">
				<label class="input-label">Link Youtube <small class="text-danger">*</small> <i
						class="fa fa-question-circle text-muted" aria-hidden="true" data-toggle="tooltip" data-placement="top"
						title="Jika karya anda dalam bentuk video, maka harap unggah terlebih dahulu di akun youtube anda"></i></label>
				<input type="link" name="LINK" class="form-control form-control-sm" id="link_youtube"
					value="<?= $dataKarya != false ? $dataKarya->LINK : '' ;?>">
				<small class="text-muted">Harap unggah ke youtube anda, kemudian salin link video tersebut (pastikan link dapat
					dibuka). </br>Contoh: <span class="text-primary">https://www.youtube.com/watch?v=PCGhwLRHpMo</span></small>
			</div>
			<?php endif;?>

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
	// TINYMCE
	tinymce.init({
		selector: '#TinyMCE',
		height: 200,
		menubar: false,
		branding: false,
		plugins: [
			'lists preview',
			'visualblocks',
			'table paste wordcount'
		],
		toolbar: 'undo redo | formatselect | ' +
			'bold italic | alignleft aligncenter ' +
			'alignright alignjustify | bullist numlist outdent indent | ' +
			'removeformat'
	});

</script>

<script type="text/javascript">
	$(document).ready(function () {
		$("#karya-dokumen").click(function () {
			$("#fileAttachmentBtn").prop('required', true);
			$("#link_youtube").prop('required', false);
		});

		$("#karya-video-tab").click(function () {
			$("#link_youtube").prop('required', true);
			$("#fileAttachmentBtn").prop('required', false);
		});
	});

</script>

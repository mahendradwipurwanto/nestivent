<!-- Card -->
<div class="card mb-4">
	<div class="card-header">
		<h5 class="card-header-title">Berkas pendaftaran</h5>
		<a href="<?= site_url('detail-daftar-kompetisi/'.$dataPendaftaran->KODE_PENDAFTARAN);?>" class="btn btn-secondary btn-xs float-right">kembali</a>
	</div>
	<div class="card-body">
		<div class="border-bottom">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<div class="media align-items-center mb-3">
						<span class="d-block font-size-1 mr-3">Bidang lomba</span>
						<div class="media-body text-right">
							<span class="text-dark font-weight-bold"><?= $dataPendaftaran->BIDANG;?></span>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-6 border-left">
					<div class="media align-items-center mb-3">
						<span class="d-block font-size-1 mr-3">Nama TIM </span>
						<div class="media-body text-right">
							<span class="text-dark font-weight-bold"><?= $dataPendaftaran->NAMA_TIM;?></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Title -->
<form action="<?= site_url('pengguna/update_berkasKompetisi');?>" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="KODE_KEGIATAN" value="<?= $dataPendaftaran->KODE_KOMPETISI;?>">
	<input type="hidden" name="KODE_PENDAFTARAN" value="<?= $dataPendaftaran->KODE_PENDAFTARAN;?>">
	<input type="hidden" name="NAMA_TIM" value="<?= $dataPendaftaran->NAMA_TIM;?>">
	<input type="hidden" name="BIDANG_LOMBA" value="<?= $dataPendaftaran->BIDANG;?>">

	<!-- META FORM -->
	<?php $no= 1; foreach ($formulir as $key) :?>
	<?php if ($key->TYPE == "TEXT") :?>
		<input type="hidden" name="ID_FORM[]" value="<?= $key->ID_FORM;?>">
		<input type="hidden" name="TYPE[]" value="<?= $key->TYPE;?>">

		<div class="card card-frame card-body mb-4">
			<label class="input-label"><?= $key->PERTANYAAN;?> <?= ($key->REQUIRED == 1) ? "<span class='text-danger'>*</span>" : "";?></label>
			<input class="form-control form-control-sm form-control-flush" type="text" name="JAWABAN[]" value="<?= $controller->M_pengguna->get_formData($dataPendaftaran->KODE_PENDAFTARAN, $key->ID_FORM);?>" <?= ($key->REQUIRED == 1) ? "required" : "";?>>
			<?php if (isset($key->KETERANGAN) || $key->KETERANGAN != null):?>
				<small class="text-muted mt-2"><?= $key->KETERANGAN;?></small>
			<?php endif;?>
		</div>

		<?php elseif ($key->TYPE == "TEXTAREA") :?>
			<input type="hidden" name="ID_FORM[]" value="<?= $key->ID_FORM;?>">
			<input type="hidden" name="TYPE[]" value="<?= $key->TYPE;?>">

			<div class="card card-frame card-body mb-4">
				<label class="input-label"><?= $key->PERTANYAAN;?> <?= ($key->REQUIRED == 1) ? "<span class='text-danger'>*</span>" : "";?></label>
				<textarea class="form-control form-control-sm form-control-flush" type="text" name="JAWABAN[]"  <?= ($key->REQUIRED == 1) ? "required" : "";?>><?= $controller->M_pengguna->get_formData($dataPendaftaran->KODE_PENDAFTARAN, $key->ID_FORM);?></textarea>
				<?php if (isset($key->KETERANGAN) || $key->KETERANGAN != null):?>
					<small class="text-muted mt-2"><?= $key->KETERANGAN;?></small>
				<?php endif;?>
			</div>

			<?php elseif ($key->TYPE == "FILE") :?>
				<input type="hidden" name="ID_FORM_FILE[]" value="<?= $key->ID_FORM;?>">
				<input type="hidden" name="TYPE[]" value="<?= $key->TYPE;?>">
				<input type="hidden" name="FILE_SIZE[]" value="<?= $key->FILE_SIZE;?>">

				<div class="card card-frame card-body mb-4">
					<label class="input-label"><?= $key->PERTANYAAN;?> <span class="text-danger">*</span></label>
					<div>
						<?php if(!empty($controller->M_pengguna->get_formData($dataPendaftaran->KODE_PENDAFTARAN, $key->ID_FORM))):?>
							<a href="<?= base_url();?>berkas/pendaftaran/kompetisi/lokreatif/<?= $this->session->userdata('kode_user');?>/<?= $controller->M_pengguna->get_formData($dataPendaftaran->KODE_PENDAFTARAN, $key->ID_FORM);?>" class="btn btn-sm btn-primary transition-3d-hover" target="_blank">Cek Berkas</a>
						<?php endif;?>
						<label class="btn btn-sm btn-primary transition-3d-hover file-attachment-btn" for="fileAttachmentBtn<?= $no;?>">
							<span id="customFileUpload<?= $no;?>"><?= empty($controller->M_pengguna->get_formData($dataPendaftaran->KODE_PENDAFTARAN, $key->ID_FORM)) ? 'Tambahkan file' : $controller->M_pengguna->get_formData($dataPendaftaran->KODE_PENDAFTARAN, $key->ID_FORM);?></span>
							<input id="fileAttachmentBtn<?= $no;?>" name="JAWABAN[]" type="file" class="js-file-attach file-attachment-btn-label" accept=".pdf"
							data-hs-file-attach-options='{
							"textTarget": "#customFileUpload<?= $no;?>",
		                    "maxFileSize": 10240
						}' <?= empty($controller->M_pengguna->get_formData($dataPendaftaran->KODE_PENDAFTARAN, $key->ID_FORM)) ? (($key->REQUIRED == 1) ? "required" : "") : '';?>>
					</label>
					
				</div>
				<script type="text/javascript">
					$('#fileAttachmentBtn<?= $no;?>').change(function() {
					  var file = $('#fileAttachmentBtn<?= $no;?>')[0].files[0].name;
					  $('#customFileUpload<?= $no;?>').text(file);
					});
				</script>
				<?php if (isset($key->KETERANGAN) || $key->KETERANGAN != null):?>
					<small class="text-muted mt-2">Ukuran file 10 MB. <?= $key->KETERANGAN;?></small>
				<?php endif;?>
			</div>

			<?php elseif ($key->TYPE == "RADIO") :?>
				<input type="hidden" name="ID_FORM[]" value="<?= $key->ID_FORM;?>">
				<input type="hidden" name="TYPE[]" value="<?= $key->TYPE;?>">

				<div class="card card-frame card-body mb-4">
					<label class="input-label"><?= $key->PERTANYAAN;?> <span class="text-danger">*</span></label>

					<?php if ($controller->M_pengguna->get_formItem($key->ID_FORM) == false) :?>
						<p class="text-danger"><i>Belum ada item pilihan</i></p>
						<?php else: ?>
							<!-- Input Group -->
							<div class="input-group input-group-down-break" style="max-width: 18rem;">

								<?php $radio = 1; foreach ($controller->M_pengguna->get_formData($key->ID_FORM) as $item) :?>					<!-- Custom Radio -->
								<div class="form-control form-control-sm">
									<div class="custom-control custom-radio">
										<input type="radio" class="custom-control-input" name="JAWABAN[]" id="radioItem<?= $item->ID_FORM;?><?= $radio;?>" value="<?= $item->ITEM;?>" <?= $radio == 1 ? 'checked' : '';?>>
										<label class="custom-control-label" for="radioItem<?= $item->ID_FORM;?><?= $radio;?>"><?= $item->ITEM;?></label>
									</div>
								</div>
								<!-- End Custom Radio -->
								<?php $radio++; endforeach;?>

							</div>
						<?php endif;?>

						<?php if (isset($key->KETERANGAN) || $key->KETERANGAN != null):?>
							<small class="text-muted mt-2"><?= $key->KETERANGAN;?></small>
						<?php endif;?>
					</div>

					<?php elseif ($key->TYPE == "CHECK") :?>
						<input type="hidden" name="ID_FORM[]" value="<?= $key->ID_FORM;?>">
						<input type="hidden" name="TYPE[]" value="<?= $key->TYPE;?>">

						<div class="card card-frame card-body mb-4">
							<label class="input-label"><?= $key->PERTANYAAN;?> <span class="text-danger">*</span></label>

							<?php if ($controller->M_pengguna->get_formItem($key->ID_FORM) == false) :?>
								<p class="text-danger"><i>Belum ada item pilihan</i></p>
								<?php else: ?>
									<?php $check = 1; foreach ($controller->M_pengguna->get_formItem($key->ID_FORM) as $item) :?>
									<div class="form-group">
										<!-- Checkbox -->
										<div class="custom-control custom-checkbox">
											<input type="checkbox" id="checkItem<?= $check;?>" class="custom-control-input">
											<label class="custom-control-label" for="checkItem<?= $check;?>"><?= $item->ITEM;?></label>
										</div>
										<!-- End Checkbox -->
									</div>
									<?php $check++; endforeach;?>
								<?php endif;?>

								<?php if (isset($key->KETERANGAN) || $key->KETERANGAN != null):?>
									<small class="text-muted mt-2"><?= $key->KETERANGAN;?></small>
								<?php endif;?>
							</div>

							<?php elseif ($key->TYPE == "SELECT") :?>
								<input type="hidden" name="ID_FORM[]" value="<?= $key->ID_FORM;?>">
								<input type="hidden" name="TYPE[]" value="<?= $key->TYPE;?>">

								<div class="card card-frame card-body mb-4">
									<label class="input-label"><?= $key->PERTANYAAN;?> <span class="text-danger">*</span></label>

									<select class="js-custom-select custom-select" name="JAWABAN[]" size="1"
									data-hs-select2-options='{
									"minimumResultsForSearch": "Infinity",
									"dropdownAutoWidth": true,
									"width": "auto"

								}'>
								<optgroup label="Selected">
									<option value="<?= $controller->M_pengguna->get_formData($dataPendaftaran->KODE_PENDAFTARAN, $key->ID_FORM);?>"><?= $controller->M_pengguna->get_formData($dataPendaftaran->KODE_PENDAFTARAN, $key->ID_FORM);?></option>
								</optgroup>
								<optgroup label="Change">
									<?php if ($controller->M_pengguna->get_formItem($key->ID_FORM) != false) :?>
										<?php foreach ($controller->M_pengguna->get_formItem($key->ID_FORM) as $item) :?>
											<option value="<?= $item->ITEM;?>"><?= $item->ITEM;?></option>
										<?php endforeach;?>
									<?php endif;?>
								</optgroup>
							</select>

							<?php if (isset($key->KETERANGAN) || $key->KETERANGAN != null):?>
								<small class="text-muted mt-2"><?= $key->KETERANGAN;?></small>
							<?php endif;?>
						</div>

					<?php endif;?>
					<?php $no++; endforeach;?>

					<button class="btn btn-sm btn-primary float-right" id="send-button">Simpan data berkas</button>
					<small class="text-muted">Jangan pernah mengirimkan sandi melalui Formulir.</small>
				</form>

				<script>
					$('form').submit(function(event) {
						$('#send-button').prop("disabled", true);
        // add spinner to button
        $('#send-button').html(
        	`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
        	);
        return;
    });
</script>
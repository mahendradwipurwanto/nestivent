<!-- Upload Form Section -->
<div class="container space-top-3 space-bottom-3">
	<div class="w-lg-75 mx-lg-auto">
		<!-- Title -->
		<div class="text-center mb-9">
			<h1 class="h2">Pendaftaran - <?= ucwords(strtolower($kegiatan->JUDUL)) ?></h1>
			<p class="mb-0">Lengkapi data diri berikut dengan sebenar-benarnya.</p>
		</div>
		<!-- End Title -->
		<form action="<?= site_url('pendaftaran/prosesPendaftaran/'.$kegiatan->KEGIATAN);?>" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="KODE_KEGIATAN" value="<?= $KODE_KEGIATAN;?>">

			<div class="card card-frame card-body mb-4">
				<p>Pendaftaran menggunakan akun anda <?= $this->session->userdata('nama');?> -  <?= $this->session->userdata('email');?>, ubah data diri? <a href="<?= site_url('pengguna/pengaturan');?>">ubah</a></p>
			</div>

			<?php $no= 1; foreach ($formulir as $key) :?>
			<?php if ($key->TYPE == "TEXT") :?>
				<input type="hidden" name="ID_FORM[]" value="<?= $key->ID_FORM;?>">
				<input type="hidden" name="TYPE[]" value="<?= $key->TYPE;?>">
				<input type="hidden" name="FILE_SIZE[]" value="">

				<div class="card card-frame card-body mb-4">
					<label class="input-label"><?= $key->PERTANYAAN;?> <?php if($key->REQUIRED == true):?><span class="text-danger">*</span><?php endif;?></label>
					<input class="form-control form-control-sm form-control-flush" type="text" name="JAWABAN[]" placeholder="Jawaban anda" <?= $key->REQUIRED == true ? 'required' : '';?>>
					<?php if (isset($key->KETERANGAN) || $key->KETERANGAN != null):?>
						<small class="text-muted mt-2"><?= $key->KETERANGAN;?></small>
					<?php endif;?>
				</div>

			<?php elseif ($key->TYPE == "TEXTAREA") :?>
				<input type="hidden" name="ID_FORM[]" value="<?= $key->ID_FORM;?>">
				<input type="hidden" name="TYPE[]" value="<?= $key->TYPE;?>">
				<input type="hidden" name="FILE_SIZE[]" value="">

				<div class="card card-frame card-body mb-4">
					<label class="input-label"><?= $key->PERTANYAAN;?> <?php if($key->REQUIRED == true):?><span class="text-danger">*</span><?php endif;?></label>
					<textarea class="form-control form-control-sm form-control-flush" type="text" name="JAWABAN[]" placeholder="Jawaban anda" <?= $key->REQUIRED == true ? 'required' : '';?>></textarea>
					<?php if (isset($key->KETERANGAN) || $key->KETERANGAN != null):?>
						<small class="text-muted mt-2"><?= $key->KETERANGAN;?></small>
					<?php endif;?>
				</div>

			<?php elseif ($key->TYPE == "FILE") :?>
				<input type="hidden" name="ID_FORM_FILE[]" value="<?= $key->ID_FORM;?>">
				<input type="hidden" name="TYPE[]" value="<?= $key->TYPE;?>">
				<input type="hidden" name="FILE_SIZE[]" value="<?= $key->FILE_SIZE;?>">

				<div class="card card-frame card-body mb-4">
					<label class="input-label"><?= $key->PERTANYAAN;?> <?php if($key->REQUIRED == true):?><span class="text-danger">*</span><?php endif;?></label>
					<div>

						<label class="btn btn-sm btn-primary transition-3d-hover file-attachment-btn" for="fileAttachmentBtn">
							<span id="customFileUpload<?= $no;?>">Tambahkan file</span>
							<input id="fileAttachmentBtn" name="JAWABAN[]" type="file" class="js-file-attach file-attachment-btn-label"
							data-hs-file-attach-options='{
							"textTarget": "#customFileUpload<?= $no;?>"
						}' <?= $key->REQUIRED == true ? 'required' : '';?>>
					</label>
				</div>
				<?php if (isset($key->KETERANGAN) || $key->KETERANGAN != null):?>
					<small class="text-muted mt-2">Ukuran file <?= $key->FILE_SIZE;?> MB. <?= $key->KETERANGAN;?></small>
				<?php endif;?>
			</div>

			<?php elseif ($key->TYPE == "RADIO") :?>
				<input type="hidden" name="ID_FORM[]" value="<?= $key->ID_FORM;?>">
				<input type="hidden" name="TYPE[]" value="<?= $key->TYPE;?>">
				<input type="hidden" name="FILE_SIZE[]" value="">

				<div class="card card-frame card-body mb-4">
					<label class="input-label"><?= $key->PERTANYAAN;?> <?php if($key->REQUIRED == true):?><span class="text-danger">*</span><?php endif;?></label>

					<?php if ($CI->M_daftar->get_formItem($key->ID_FORM) == false) :?>
						<p class="text-danger"><i>Belum ada item pilihan</i></p>
					<?php else: ?>
						<!-- Input Group -->
						<div class="input-group input-group-down-break" style="max-width: 18rem;">

							<?php $radio = 1; foreach ($CI->M_daftar->get_formItem($key->ID_FORM) as $item) :?>					<!-- Custom Radio -->
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
				<input type="hidden" name="FILE_SIZE[]" value="">

				<div class="card card-frame card-body mb-4">
					<label class="input-label"><?= $key->PERTANYAAN;?> <?php if($key->REQUIRED == true):?><span class="text-danger">*</span><?php endif;?></label>

					<?php if ($CI->M_daftar->get_formItem($key->ID_FORM) == false) :?>
						<p class="text-danger"><i>Belum ada item pilihan</i></p>
					<?php else: ?>
						<?php $check = 1; foreach ($CI->M_daftar->get_formItem($key->ID_FORM) as $item) :?>
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
				<input type="hidden" name="FILE_SIZE[]" value="">

				<div class="card card-frame card-body mb-4">
					<label class="input-label"><?= $key->PERTANYAAN;?> <?php if($key->REQUIRED == true):?><span class="text-danger">*</span><?php endif;?></label>

					<select class="js-select2-custom custom-select custom-select-sm custom-select-flush" size="1" name="JAWABAN[]"
							data-hs-select2-options='{
							"minimumResultsForSearch": "Infinity"
						}'>
						<?php if ($CI->M_daftar->get_formItem($key->ID_FORM) == false) :?>
							<option value="null">Tidak ada pilihan</option>
						<?php else: ?>
							<?php foreach ($CI->M_daftar->get_formItem($key->ID_FORM) as $item) :?>
								<option value="<?= $item->ITEM;?>"><?= $item->ITEM;?></option>
							<?php endforeach;?>
						<?php endif;?>
					</select>

					<?php if (isset($key->KETERANGAN) || $key->KETERANGAN != null):?>
						<small class="text-muted mt-2"><?= $key->KETERANGAN;?></small>
					<?php endif;?>
				</div>

			<?php endif;?>
			<?php $no++; endforeach;?>

			<button class="btn btn-sm btn-primary float-right">Kirim formulir</button>
			<small class="text-muted">Jangan pernah mengirimkan sandi melalui Formulir.</small>
		</form>
	</div>
</div>
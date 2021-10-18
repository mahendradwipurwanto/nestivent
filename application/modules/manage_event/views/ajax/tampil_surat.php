<?php if ($form != null) { ?>
<div class="container">
	<?php
        $check_form = $form;?>
	<div class="d-flex justify-content-between mb-3">
		<span class="font-weight-bold h4">Preview Berkas:</span>
		<a target="_blank" id="" class="btn btn-primary btn-sm"
			href="<?= base_url(); ?>berkas/pendaftaran/<?= $pendaftaran->KODE_USER; ?>/event/<?= $pendaftaran->KODE_EVENT; ?>/<?= $form ?>"
			role=" button"><i class="tio-open-in-new"></i> Buka di tab baru</a>
	</div>
	<div class="responsive-iframe">
		<iframe src="<?= base_url(); ?>berkas/pendaftaran/<?= $pendaftaran->KODE_USER; ?>/event/<?= $pendaftaran->KODE_EVENT; ?>/<?= $form ?>"
			frameborder="0" allowfullscreen class="w-100"></iframe>
	</div>
</div>
<?php } else { ?>
<center>
	<div class="alert alert-danger" role="alert">
		Berkas tidak ditemukan.
	</div>
</center>
<?php } ?>

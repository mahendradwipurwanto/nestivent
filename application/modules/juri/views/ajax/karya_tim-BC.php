<!-- PDF 1=Aplikasi, 8=Idebisnis, 10=game -->
<?php if ($berkas->ID_BIDANG == 1 || $berkas->ID_BIDANG == 8 || $berkas->ID_BIDANG == 10) { ?>
    <div class="d-flex justify-content-between mb-2">
        <label class="font-weight-bold" for="">Judul: <span class="font-weight-normal"><?= $berkas->JUDUL;?></span></label>
        <a class="btn btn-primary btn-xs" target="blank" href="<?= base_url(); ?>berkas/kompetisi/karya/<?= preg_replace("/[^a-zA-Z]+/", "_", $berkas->BIDANG_LOMBA); ?>/<?= preg_replace("/[^a-zA-Z]+/", "_", $berkas->NAMA_TIM); ?>_<?= $berkas->KODE_USER ?>/<?= $berkas->FILE; ?>" role="button"><i class="tio-open-in-new"></i> Buka di tab baru</a>
    </div>
    <div class="responsive-iframe">
        <iframe src="<?= base_url(); ?>berkas/kompetisi/karya/<?= preg_replace("/[^a-zA-Z]+/", "_", $berkas->BIDANG_LOMBA); ?>/<?= preg_replace("/[^a-zA-Z]+/", "_", $berkas->NAMA_TIM); ?>_<?= $berkas->KODE_USER ?>/<?= $berkas->FILE; ?>"  frameborder="0" allowfullscreen></iframe>
    </div>
<?php } ?>

<!-- VIDEO 3=videopendek, 13=unjuktalent -->
<?php if ($berkas->ID_BIDANG == 3 || $berkas->ID_BIDANG == 13) { ?>
    <div class="d-flex justify-content-between">
        <label class="font-weight-bold" for="">Judul: <span class="font-weight-normal"><?= $berkas->JUDUL;?></span></label>
        <a class="btn btn-danger btn-xs" target="_blank" href="<?= $berkas->LINK ?>" role="button"><i class="tio-youtube"></i> Buka di YouTube</a>
    </div>
    <div class="responsive-iframe">
        <iframe src="<?= str_replace("https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/", "$berkas->LINK") ?>" frameborder="0" allowfullscreen></iframe>
    </div>
<?php } ?>

<!-- VIDEO GDRIVE 11=tiktok -->
<?php if ($berkas->ID_BIDANG == 11) { ?>
    <div class="d-flex justify-content-between">
        <label class="font-weight-bold" for="">Judul: <span class="font-weight-normal"><?= $berkas->JUDUL;?></span></label>
        <a class="btn btn-warning btn-xs" target="_blank" href="<?= $berkas->LINK_DRIVE ?>" role="button"><i class="tio-youtube"></i> Buka di Google Drive</a>
    </div>
<?php } ?>

<!-- JPG 4=desainposter, 9=fotografi -->
<?php if ($berkas->ID_BIDANG == 4 || $berkas->ID_BIDANG == 9) { ?>
    <div class="d-flex justify-content-between">
        <label class="font-weight-bold" for="">Judul: <span class="font-weight-normal"><?= $berkas->JUDUL;?></span></label>
        <a class="btn btn-primary btn-xs" target="blank" href="<?= base_url(); ?>berkas/kompetisi/karya/<?= preg_replace("/[^a-zA-Z]+/", "_", $berkas->BIDANG_LOMBA); ?>/<?= preg_replace("/[^a-zA-Z]+/", "_", $berkas->NAMA_TIM); ?>_<?= $berkas->KODE_USER ?>/<?= $berkas->FILE; ?>" role="button"><i class="tio-open-in-new"></i> Buka di tab baru</a>
    </div>
    <img src="<?= base_url(); ?>berkas/kompetisi/karya/<?= preg_replace("/[^a-zA-Z]+/", "_", $berkas->BIDANG_LOMBA); ?>/<?= preg_replace("/[^a-zA-Z]+/", "_", $berkas->NAMA_TIM); ?>_<?= $berkas->KODE_USER ?>/<?= $berkas->FILE; ?>" class="img-fluid img-thumbnail rounded w-100 h-auto" alt="">
<?php } ?>
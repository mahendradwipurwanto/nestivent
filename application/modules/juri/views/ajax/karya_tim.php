<!-- PDF 1=Aplikasi, 8=Idebisnis, 10=game -->
<?php if ($berkas->ID_BIDANG == 1 || $berkas->ID_BIDANG == 8 || $berkas->ID_BIDANG == 10) { ?>
    <div class="card-header">
      <h5 class="card-header-title">Karya Tim</h5>
      <a class="btn btn-primary btn-xs float-right" target="blank" href="<?= base_url(); ?>berkas/kompetisi/karya/<?= preg_replace("/[^a-zA-Z]+/", "_", $berkas->BIDANG_LOMBA); ?>/<?= preg_replace("/[^a-zA-Z]+/", "_", $berkas->NAMA_TIM); ?>_<?= $berkas->KODE_USER ?>/<?= $berkas->FILE; ?>" role="button"><i class="tio-open-in-new"></i> Buka di tab baru</a>
    </div>
    <div class="card-body">
        <div class="responsive-iframe">
            <iframe src="<?= base_url(); ?>berkas/kompetisi/karya/<?= preg_replace("/[^a-zA-Z]+/", "_", $berkas->BIDANG_LOMBA); ?>/<?= preg_replace("/[^a-zA-Z]+/", "_", $berkas->NAMA_TIM); ?>_<?= $berkas->KODE_USER ?>/<?= $berkas->FILE; ?>"  frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
<?php } ?>

<!-- VIDEO 3=videopendek, 13=unjuktalent -->
<?php if ($berkas->ID_BIDANG == 3 || $berkas->ID_BIDANG == 13) { ?>
    <div class="card-header">
      <h5 class="card-header-title">Karya Tim</h5>
      <a class="btn btn-danger btn-xs float-right" target="_blank" href="<?= $berkas->LINK ?>" role="button"><i class="tio-youtube"></i> Buka di YouTube</a>
    </div>
    <div class="card-body">
        <div class="responsive-iframe">
            <iframe src="<?= str_replace("https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/", "$berkas->LINK") ?>" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
<?php } ?>

<!-- VIDEO GDRIVE 11=tiktok -->
<?php if ($berkas->ID_BIDANG == 11) { ?>
    <div class="card-header">
      <h5 class="card-header-title">Karya Tim</h5>
      <a class="btn btn-danger btn-xs float-right" target="_blank" href="<?= $berkas->LINK ?>" role="button"><i class="tio-slideshow-outlined"></i> Buka di Tiktok</a>
    </div>
    <div class="card-body">
        <div id="tiktok-embed"></div>
        <script>
            $(document).ready(function() {
                $('#tiktok-embed').html(
                    `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memuat tiktok....`
                );
                jQuery.ajax({
                    url: "https://www.tiktok.com/oembed?url=<?= $berkas->LINK ?>",
                    type: "GET",
                    success: function(data) {
                        console.log(data);
                        $("#tiktok-embed").html(data.html);
                    }
                });
            });
        </script>
    </div>
<?php } ?>

<!-- JPG 4=desainposter, 9=fotografi -->
<?php if ($berkas->ID_BIDANG == 4 || $berkas->ID_BIDANG == 9) { ?>
    <div class="card-header">
      <h5 class="card-header-title">Karya Tim</h5>
      <a class="btn btn-primary btn-xs float-right" target="blank" href="<?= base_url(); ?>berkas/kompetisi/karya/<?= preg_replace("/[^a-zA-Z]+/", "_", $berkas->BIDANG_LOMBA); ?>/<?= preg_replace("/[^a-zA-Z]+/", "_", $berkas->NAMA_TIM); ?>_<?= $berkas->KODE_USER ?>/<?= $berkas->FILE; ?>" role="button"><i class="tio-open-in-new"></i> Buka di tab baru</a>
    </div>
    <div class="card-body">
        <img src="<?= base_url(); ?>berkas/kompetisi/karya/<?= preg_replace("/[^a-zA-Z]+/", "_", $berkas->BIDANG_LOMBA); ?>/<?= preg_replace("/[^a-zA-Z]+/", "_", $berkas->NAMA_TIM); ?>_<?= $berkas->KODE_USER ?>/<?= $berkas->FILE; ?>" class="img-fluid img-thumbnail rounded w-100 h-auto" alt="">
    </div>
<?php } ?>
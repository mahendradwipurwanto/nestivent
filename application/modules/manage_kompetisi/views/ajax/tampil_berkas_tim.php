<?php if ($berkas == false) { ?>
    <center>
        <div class="alert alert-soft-danger" role="alert">
            Tim belum mengunggah karya.
        </div>
    </center>
<?php } else { ?>
    <div class="container">
        <div class="row border mb-3">
            <div class="col-lg-6 mt-2">
                <label class="font-weight-bold" for="">Judul Karya:</label><br>
                <p><?= $berkas->JUDUL ?></p>
            </div>
            <div class="col-lg-6 mt-2 border-left">
                <label class="font-weight-bold" for="">Bidang Lomba:</label><br>
                <p><?= $berkas->BIDANG_LOMBA ?></p>
            </div>
        </div>

        <!-- PDF 1 || 2 GAMBAR -->
        <?php if ($berkas->TIPE_KARYA == 1 || $berkas->TIPE_KARYA == 2) { ?>
            <div class="card-header">
            <h5 class="card-header-title">Karya Tim</h5>
            <a class="btn btn-primary btn-xs float-right" target="blank" href="<?= base_url();?>berkas/pendaftaran/kompetisi/<?= preg_replace("/[^a-zA-Z]+/", "_", $berkas->BIDANG_LOMBA);?>/<?= preg_replace("/[^a-zA-Z]+/", "_", $berkas->NAMA_TIM);?>_<?= $this->session->userdata('kode_user');?>/karya/<?= $berkas->FILE;?>" role="button"><i class="tio-open-in-new"></i> Buka di tab baru</a>
            </div>
            <div class="card-body">
                <div class="responsive-iframe">
                    <iframe src="<?= base_url();?>berkas/pendaftaran/kompetisi/<?= preg_replace("/[^a-zA-Z]+/", "_", $berkas->BIDANG_LOMBA);?>/<?= preg_replace("/[^a-zA-Z]+/", "_", $berkas->NAMA_TIM);?>_<?= $berkas->KODE_USER;?>/karya/<?= $berkas->FILE;?>"  frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        <?php } ?>

        <!-- VIDEO 3=videopendek, 13=unjuktalent -->
        <?php if ($berkas->TIPE_KARYA == 3) { ?>
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
    </div>
<?php } ?>
<!-- Page Header -->
<div class="page-header">
  <div class="row align-items-end">
    <div class="col-sm mb-2 mb-sm-0">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-no-gutter">
          <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?= site_url('manage-kompetisi') ?>">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Kriteria penilaian</li>
        </ol>
      </nav>

      <h1 class="page-header-title">Kriteria penilaian</h1>
    </div>

    <div class="col-sm-auto">
    </div>
  </div>
  <!-- End Row -->
</div>
<!-- End Page Header -->

<div class="row">
  <div class="col-4">
    <div class="card">
      <div class="card-header">
        <h5 class="card-header-title">Pilih tahap penilaian</h5>
      </div>
      <div class="card-body p-0">
        <!-- Nav -->
        <ul class="nav flex-column nav-pills justify-content-center" role="tablist" aria-orientation="vertical">
          <?php if ($tahap_penilaian == false) :?>
          <li class="nav-item m-0">
            <a class="nav-link active" id="not-set-tab" data-toggle="pill" href="#not-set" role="tab" aria-controls="not-set" aria-selected="true">Belum ada tahap</a>
          </li>
          <?php else: ?>
            <?php $no=1; foreach ($tahap_penilaian as $key):?>

              <li class="nav-item m-0">
                <a class="nav-link <?= ($no++ == 1? 'active' : '');?>" id="tahap-penilaian-<?= $key->ID_TAHAP;?>-tab" data-toggle="pill" href="#tahap-penilaian-<?= $key->ID_TAHAP;?>" role="tab" aria-controls="tahap-penilaian-<?= $key->ID_TAHAP;?>" aria-selected="<?= ($no++ == 1? 'true' : 'false');?>"><?= $key->NAMA_TAHAP;?></a>
              </li>
            <?php endforeach;?>
          <?php endif;?>
        </ul>
        <!-- End Nav -->
      </div>
    </div>
  </div>
  <div class="col-8">


    <!-- Tab Content -->
    <div class="tab-content">
      <?php if ($tahap_penilaian == false) :?>
      <div class="tab-pane fade show active" id="not-set" role="tabpanel" aria-labelledby="not-set-tab">
        <div class="card">
          <div class="card-header">
            <h5 class="card-header-title">Pilih bidang lomba</h5>
          </div>
          <div class="card-body">
            <h4 class="text-center">Harap menambahkan tahap penilian terlebih dahulu !!</h4>
          </div>
        </div>
      </div>
      <?php else: ?>
        <?php $num = 1; foreach ($tahap_penilaian as $key):?>
          <div class="tab-pane fade <?= ($num++ == 1 ? 'show active' : '');?>" id="tahap-penilaian-<?= $key->ID_TAHAP;?>" role="tabpanel" aria-labelledby="tahap-penilaian-<?= $key->ID_TAHAP;?>-tab">
            <div class="card">
              <div class="card-header">
                <h5 class="card-header-title">Pilih bidang lomba - <?= $key->NAMA_TAHAP;?></h5>
              </div>
              <div class="card-body">
                <?php if ($key->STATUS == 3) :?>
                <h4 class="text-center">Tahap penilaian ini telah selesai !!</h4>
                <?php else:?>
                  <?php if ($bidang_lomba == false) :?>
                  <h4 class="text-center">Harap menambahkan bidang lomba terlebih dahulu !!</h4>
                  <?php else:?>
                    <div class="row">
                      <?php foreach ($bidang_lomba as $value):?>
                          <div class="col-4 mb-4">
                            <a href="<?php echo site_url('manage-kompetisi/kriteria-penilaian/'.$key->ID_TAHAP.'/'.$value->ID_BIDANG);?>" class="card text-none text-center">
                              <div class="card-block p-2">
                                <h5 class="card-title"><?php echo $value->BIDANG_LOMBA;?></h5>
                                <h3><i class="tio-book-opened display-1 font-weight-light"></i></h3>
                                <h6><?php if($CI->M_manage->cek_kriteriaAtur($key->ID_TAHAP, $value->ID_BIDANG) > 0):?><span class="badge badge-success">sudah diatur</span><?php else:?><span class="badge badge-secondary">belum diatur</span><?php endif;?></h6>
                              </div>
                            </a>
                          </div>
                      <?php endforeach;?>
                    </div>
                  <?php endif;?>
                <?php endif;?>
              </div>
            </div>
          </div>
        <?php endforeach;?>
      <?php endif;?>
    </div>
    <!-- End Tab Content -->
  </div>
</div>
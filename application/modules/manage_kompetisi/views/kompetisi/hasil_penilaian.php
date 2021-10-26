<!-- Page Header -->
<div class="page-header">
  <div class="row align-items-end">
    <div class="col-sm mb-2 mb-sm-0">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-no-gutter">
          <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?= site_url('manage-manage-kompetisi') ?>">Dashboard</a></li>
          <li class="breadcrumb-item">Penilaian</li>
          <li class="breadcrumb-item active" aria-current="page">Hasil Penilaian</li>
        </ol>
      </nav>
      <div class="d-flex justify-content-between">
        <h1 class="page-header-title mt-3 mb-3">Hasil Penilaian - Tahap penilaian <span class="badge badge-primary"><?= $tahap_penilaian ?></span></h1>
        <div class="d-flex">
          <div class="dropdown mt-2 mr-2">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php if ($id_tahap == 0) :?>
                Tahap Penilaian
              <?php else:?>
                <?= $tahap_penilaian ?>
              <?php endif;?>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="<?= site_url('manage-kompetisi/hasil-penilaian/') ?>">Pilih Tahap</a>
              <?php foreach ($tahap as $row) { ?>
                <a class="dropdown-item" href="<?= site_url('manage-kompetisi/hasil-penilaian/' . $row->ID_TAHAP) ?>"><?= $row->NAMA_TAHAP ?></a>
              <?php } ?>
            </div>
          </div>
          <?php if ($id_tahap != 0) :?>
            <div class="dropdown mt-2">
              <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php if ($id_bidang == 0) :?>
                  Bidang Lomba
                <?php else:?>
                  <?= $bidang_lomba ?>
                <?php endif;?>
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="<?= site_url('manage-kompetisi/hasil-penilaian/'.$id_tahap) ?>">Pilih Lomba</a>
                <?php foreach ($all_bidang_lomba as $row) { ?>
                  <a class="dropdown-item" href="<?= site_url('manage-kompetisi/hasil-penilaian/'.$id_tahap.'/'.$row->ID_BIDANG) ?>"><?= $row->BIDANG_LOMBA ?></a>
                <?php } ?>
              </div>
            </div>
          <?php endif;?>
        </div>
      </div>
    </div>

    <div class="col-sm-auto">
    </div>
  </div>
  <!-- End Row -->
</div>
<!-- End Page Header -->

<!-- Card -->
<div class="card overflow-hidden">
  <!-- Tab Content -->
  <div class="tab-content" id="leaderboardTabContent">
    <div class="tab-pane fade show active" id="all-time" role="tabpanel" aria-labelledby="all-time-tab">
      <!-- Table -->
      <div class="card-body">
        <?php if ($id_tahap == 0 && $id_bidang == 0):?>
          <div class="text-center mt-lg-5 my-auto mx-lg-10">
            <img class="avatar avatar-xxl" src="<?= base_url();?>assets/backend/svg/illustrations/sorry.svg" alt="Image Description">
            <p class="card-text">Tidak dapat menampilkan hasil penilaian, harap pilih tahap penilaian dan bidang lomba terlebih dahulu.</p>
          </div>
        <?php else:?>
          <table id="myTableNilai" class="table table-borderless table-thead-bordered table-nowrap table-text-center table-align-middle card-table w-100">
            <thead class="thead-light">
              <tr>
                <th scope="col" style="width: 2rem;">Peringkat</th>
                <th scope="col" class="text-left">Nama TIM</th>
                <th scope="col">Asal PTS</th>
                <th scope="col">Total Nilai</th>
              </tr>
            </thead>

            <tbody>
              <?php if ($tim != false): $no = 1;foreach ($tim as $key):?>
                <tr>
                  <td></td>
                  <td class="text-left">
                    <span class="d-block h5 text-hover-primary mb-0"><?= $key->NAMA_TIM;?></span>
                  </td>
                  <td><?= $key->namapt;?></td>
                  <td><i class="tio-star text-warning mr-1"></i> <?= $CI->M_manage->get_TotNilai($key->KODE_PENDAFTARAN, $id_tahap)->TOT_NILAI;?> dari (<?= $CI->M_manage->get_TotNilai($key->KODE_PENDAFTARAN, $id_tahap)->JML_JURI;?> Juri)</td>
                </tr>
              <?php $no++; endforeach; endif;?>
            </tbody>
          </table>
        <?php endif;?>
      </div>
      <!-- End Table -->
    </div>
  </div>
  <!-- End Tab Content -->
</div>
<!-- End Card -->
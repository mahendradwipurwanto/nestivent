<!-- Page Header -->
<div class="page-header">
  <div class="row align-items-end">
    <div class="col-sm mb-2 mb-sm-0">
      <div class="d-flex justify-content-between">
        <h1 class="page-header-title mt-3 mb-3">Hasil Penilaian - Bidang lomba <span class="badge badge-primary"><?= $bidang_lomba ?></span></h1>
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
                <a class="dropdown-item" href="<?= site_url('juri/hasil-penilaian/') ?>">Pilih Tahap</a>
              <?php foreach ($tahap as $row) { ?>
                <a class="dropdown-item" href="<?= site_url('juri/hasil-penilaian/' . $row->ID_TAHAP) ?>"><?= $row->NAMA_TAHAP ?></a>
              <?php } ?>
            </div>
          </div>
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
        <?php if ($id_tahap == 0 ):?>
          <div class="text-center mt-lg-5 my-auto mx-lg-10">
            <img class="avatar avatar-xxl" src="<?= base_url();?>assets/backend/svg/illustrations/sorry.svg" alt="Image Description">
            <p class="card-text">Tidak dapat menampilkan hasil penilaian, harap pilih tahap penilaian terlebih dahulu.</p>
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
                    <div class="ml-3">
                      <span class="d-block h5 text-hover-primary mb-0"><?= $key->NAMA_TIM;?></span>
                    </div>
                  </td>
                  <td><?= $key->namapt;?></td>
                  <td class="text-left">
                    <?php if ($controller->M_juri->get_TotNilai($key->KODE_PENDAFTARAN, $id_tahap)->JML_JURI <= 0) :?>
                      <span class="badge badge-danger">belum dinilai</span>
                    <?php else:?>
                      <i class="tio-star text-warning mr-1"></i> <?= $controller->M_juri->get_TotNilai($key->KODE_PENDAFTARAN, $id_tahap)->TOT_NILAI;?> dari (<?= $controller->M_juri->get_TotNilai($key->KODE_PENDAFTARAN, $id_tahap)->JML_JURI;?> Juri)
                    <?php endif;?>
                  </td>
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
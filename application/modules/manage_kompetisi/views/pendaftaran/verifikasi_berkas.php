  <!-- Page Header -->
  <div class="page-header">
      <div class="row align-items-end">
          <div class="col-sm mb-2 mb-sm-0">
              <nav aria-label="breadcrumb">
                  <ol class="breadcrumb breadcrumb-no-gutter">
                      <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?= site_url('manage-kompetisi') ?>">Dashboard</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Verifikasi berkas</li>
                  </ol>
              </nav>
              <div class="d-flex justify-content-between">
                  <h1 class="page-header-title mt-3 mb-3">Verifikasi Berkas - Bidang Lomba <span class="badge badge-primary"><?= $bidang_lomba ?></span></h1>
                      <div class="dropdown mt-2">
                          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Bidang Lomba
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="<?= base_url('manage-kompetisi/verifikasi-berkas/') ?>">Semua Lomba</a>
                              <?php foreach ($all_bidang_lomba as $row) { ?>
                                  <a class="dropdown-item" href="<?= base_url('manage-kompetisi/verifikasi-berkas/' . $row->ID_BIDANG) ?>"><?= $row->BIDANG_LOMBA ?></a>
                              <?php } ?>
                          </div>
                      </div>
              </div>
          </div>
          <div class="col-sm-auto">
          </div>
      </div>
      <!-- End Row -->
      <div class="alert alert-soft-secondary alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
          </button>
          <strong>Perhatian!</strong> Harap matikan <strong>Internet Download Manager (IDM)</strong> untuk menghindari download secara otomatis.
      </div>
      <!-- Stats -->
      <div class="row gx-2 gx-lg-3 mt-3">
          <div class="col-sm-6 col-lg-3 mb-sm-3">
              <!-- Card -->
              <a class="card card-hover-shadow h-100" href="#">
                  <div class="card-body">
                      <h6 class="card-subtitle">Total Tim</h6>

                      <div class="row align-items-center gx-2 mb-1">
                          <div class="col-8">
                              <span class="card-title h1"> <?= $jumlah_tim ?> </span>
                          </div>
                      </div>
                      <!-- End Row -->
                  </div>
              </a>
              <!-- End Card -->
          </div>
          <div class="col-sm-6 col-lg-3 mb-sm-3">
              <!-- Card -->
              <a class="card card-hover-shadow h-100 bg-soft-primary" href="#">
                  <div class="card-body">
                      <h6 class="card-subtitle text-primary">Belum Teriverifikasi</h6>

                      <div class="row align-items-center gx-2 mb-1">
                          <div class="col-8">
                              <span class="card-title h1"><?= $jumlah_berkas_belum_terverifikasi ?></span>
                          </div>
                      </div>
                      <!-- End Row -->
                  </div>
              </a>
              <!-- End Card -->
          </div>
          <div class="col-sm-6 col-lg-3 mb-sm-3">
              <!-- Card -->
              <a class="card card-hover-shadow h-100 bg-soft-success" href="#">
                  <div class="card-body">
                      <h6 class="card-subtitle text-success">Terverifikasi</h6>

                      <div class="row align-items-center gx-2 mb-1">
                          <div class="col-8">
                              <span class="card-title h1"> <?= $jumlah_berkas_terverifikasi ?></span>
                          </div>
                      </div>
                      <!-- End Row -->
                  </div>
              </a>
              <!-- End Card -->
          </div>
          <div class="col-sm-6 col-lg-3 mb-sm-3">
              <!-- Card -->
              <a class="card card-hover-shadow h-100 bg-soft-danger" href="#">
                  <div class="card-body">
                      <h6 class="card-subtitle text-danger">Ditolak</h6>

                      <div class="row align-items-center gx-2 mb-1">
                          <div class="col-8">
                              <span class="card-title h1"> <?= $jumlah_berkas_ditolak ?></span>
                          </div>
                      </div>
                      <!-- End Row -->
                  </div>
              </a>
              <!-- End Card -->
          </div>
      </div>
      <!-- End Stats -->
  </div>
  <!-- End Page Header -->

  <!-- Card -->
  <?php if ($cek_form == false) : ?>
      <div class="alert alert-info shadow">
          <p class="mb-0"><b>PERINGATAN!!</b>Anda belum mengatur formulir pendaftaran!!, harap atur terlebih dahulu agar Tim dapat mulai mendaftarkan diri pada event anda.</p>
      </div>
  <?php else : ?>
      <div class="card">
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-stripped table-nowrap table-align-middle table-hover" width="100%" id="myTable">
                      <thead class="thead-light">
                          <tr>
                              <th>No</th>
                              <th>Aksi</th>
                              <th>Status</th>
                              <th>NAMA TIM</th>
                              <th>Bidang Lomba</th>
                              <th>KETUA</th>
                              <th>ANGGOTA</th>
                              <?php foreach ($get_form as $key) : ?>
                                  <th><?= $key->PERTANYAAN; ?></th>
                              <?php endforeach; ?>
                              <?php foreach ($get_formBerkas as $key) : ?>
                                  <th><?= $key->PERTANYAAN; ?></th>
                              <?php endforeach; ?>
                              <th>BERKAS KARYA</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php if ($get_pendaftaran == false) : ?>
                              <td colspan="<?= 3 + count($get_form); ?>">
                                  <center>belum ada data pendaftaran</center>
                              </td>
                          <?php else : ?>
                              <?php $no = 1;
                                foreach ($get_pendaftaran as $data) : ?>
                                  <tr>
                                      <td><?= $no; ?></td>
                                      <td>
                                          <?php if ($data->STATUS == 0) : ?>
                                              <button type="button" class="btn btn-xs btn-success" title="Setujui Berkas" data-toggle="modal" data-target="#verif<?= $no; ?>"><i class="tio-done"></i></button>
                                              <button type="button" class="btn btn-xs btn-danger" title="Tolak Berkas" data-toggle="modal" data-target="#tolak<?= $no; ?>"><i class="tio-clear"></i></button>
                                          <?php elseif ($data->STATUS == 1) : ?>
                                              <button type="button" class="btn btn-xs btn-danger" title="Tolak Berkas" data-toggle="modal" data-target="#tolak<?= $no; ?>"><i class="tio-clear"></i></button>
                                          <?php elseif ($data->STATUS == 2) : ?>
                                              <button type="button" class="btn btn-xs btn-success" title="Setujui Berkas" data-toggle="modal" data-target="#verif<?= $no; ?>"><i class="tio-done"></i></button>
                                          <?php endif; ?>
                                      </td>
                                      <td>
                                          <?php switch ($data->STATUS) {
                                                case 0:
                                                    echo '<span class="badge badge-secondary">Menunggu proses verifikasi</span>';
                                                    break;

                                                case 1:
                                                    echo '<span class="badge badge-success">Berkas telah diverifikasi</span>';
                                                    break;

                                                case 2:
                                                    echo '<span class="badge badge-danger">Berkas ditolak</span>';
                                                    break;

                                                case 3:
                                                    echo '<span class="badge badge-warning">Masuk ke babak Final</span>';
                                                    break;

                                                default:
                                                    echo '<span class="badge badge-secondary">Menunggu proses verifikasi</span>';
                                                    break;
                                            }; ?>

                                      </td>
                                      <td><?= $data->NAMA_TIM; ?></td>
                                      <td><?= $data->NAMA_LOMBA ?></td>
                                      <td><?= $data->NAMA; ?></td>
                                      <td>
                                          <?php if ($controller->M_manage->get_anggota_tim($data->KODE_PENDAFTARAN) == false) : ?>
                                              <!-- Button trigger modal -->
                                              <button type="button" class="btn btn-soft-danger btn-xs" title="Cek Anggota Tim" id="btn-anggota<?= $no ?>" data-toggle="modal" data-target="#modalanggota<?= $no ?>">
                                                  <i class="tio-group-senior"></i> Anggota
                                              </button>
                                          <?php else : ?>
                                              <!-- Button trigger modal -->
                                              <button type="button" class="btn btn-primary btn-xs" title="Cek Anggota Tim" id="btn-anggota<?= $no ?>" data-toggle="modal" data-target="#modalanggota<?= $no ?>">
                                                  <i class="tio-group-senior"></i> Anggota
                                              </button>
                                          <?php endif; ?>


                                          <!-- Modal -->
                                          <div class="modal fade" id="modalanggota<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                              <div class="modal-dialog modal-xl" role="document">
                                                  <div class="modal-content">
                                                      <div class="modal-header">
                                                          <h3 class="modal-title">Anggota Tim - <?= $data->NAMA_TIM ?></h3>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                          </button>
                                                      </div>
                                                      <div class="modal-body">
                                                          <div id="anggota<?= $no ?>"></div>
                                                      </div>
                                                      <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>

                                          <!-- Get anggota -->
                                          <script>
                                              $("#btn-anggota<?= $no ?>").click(function() {
                                                  if ($(".exists<?= $no ?>")[0]) {
                                                      // Do something if class exists
                                                  } else {
                                                      // Do something if class does not exist
                                                      $("#anggota<?= $no ?>").html(`<center><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sedang memuat anggota...</center>`);
                                                      $("#anggota<?= $no ?>").addClass('exists<?= $no ?>');
                                                      jQuery.ajax({
                                                          url: "<?= base_url('manage_kompetisi/tampil_anggota_tim/' . $data->KODE_PENDAFTARAN) ?>",
                                                          type: "GET",
                                                          success: function(data) {
                                                              $("#anggota<?= $no ?>").html(data);
                                                          }
                                                      });
                                                  }
                                              });
                                          </script>
                                      </td>
                                      <?php $i = 1;
                                        foreach ($get_form as $key) : ?>
                                          <td>
                                            <?php if ($controller->M_manage->get_formData($data->KODE_PENDAFTARAN, $key->ID_FORM) == false) : ?>
                                            <span class="badge badge-soft-danger"> Belum Melengkapi</span>
                                            <?php else : ?>
                                            <span class="badge badge-soft-success"><?= $controller->M_manage->get_formData($data->KODE_PENDAFTARAN, $key->ID_FORM);?></span>
                                            <?php endif; ?>
                                          </td>
                                      <?php endforeach;?>
                                      <?php $i = 1;
                                        foreach ($get_formBerkas as $key) : ?>
                                          <td>
                                            <?php if ($controller->M_manage->get_formData($data->KODE_PENDAFTARAN, $key->ID_FORM) == false) : ?>
                                            <button type="button" id="btn-surat<?= $key->ID_FORM ?>" class="btn btn-xs btn-soft-danger"
                                              title="Belum Melengkapi" disabled><i class="tio-open-in-new" data-toggle="modal"
                                                data-target="#modalsurat<?= $key->ID_FORM . $data->KODE_PENDAFTARAN ?>"></i> Belum Ada</button>
                                            <?php else : ?>
                                            <a class="btn btn-xs btn-primary" id="btn-surat<?= $key->ID_FORM . $data->KODE_PENDAFTARAN ?>"
                                              title="Cek berkas" data-toggle="modal"
                                              data-target="#modalsurat<?= $key->ID_FORM . $data->KODE_PENDAFTARAN ?>"><i class="tio-open-in-new"></i>
                                              Cek Berkas</a>
                                            <?php endif; ?>
                                          </td>
                                          <!-- Modal Cek Berkas-->
                                          <div class="modal fade modal-fullscreen" id="modalsurat<?= $key->ID_FORM . $data->KODE_PENDAFTARAN ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                              <div class="modal-dialog modal-xl" role="document">
                                                  <div class="modal-content">
                                                      <div class="modal-header">
                                                          <h3 class="modal-title"><?= $key->PERTANYAAN; ?> - <?= $data->NAMA_TIM ?></h3>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                          </button>
                                                      </div>
                                                      <div class="modal-body">
                                                          <div id="file_surat<?= $key->ID_FORM . $data->KODE_PENDAFTARAN ?>"></div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <!-- Get anggota -->
                                          <script>
                                              $("#btn-surat<?= $key->ID_FORM . $data->KODE_PENDAFTARAN ?>").click(function() {
                                                  if ($(".surat_exists<?= $key->ID_FORM . $data->KODE_PENDAFTARAN ?>")[0]) {
                                                      // Do something if class exists
                                                  } else {
                                                      // Do something if class does not exist
                                                      $("#file_surat<?= $key->ID_FORM . $data->KODE_PENDAFTARAN ?>").html(`<center><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sedang memuat ...</center>`);
                                                      $("#file_surat<?= $key->ID_FORM . $data->KODE_PENDAFTARAN ?>").addClass('surat_exists<?= $key->ID_FORM . $data->KODE_PENDAFTARAN ?>');
                                                      jQuery.ajax({
                                                          url: "<?= base_url('manage_kompetisi/tampil_surat/' . $data->KODE_PENDAFTARAN . '/' . $key->ID_FORM) ?>",
                                                          type: "GET",
                                                          success: function(data) {
                                                              $("#file_surat<?= $key->ID_FORM . $data->KODE_PENDAFTARAN ?>").html(data);
                                                          }
                                                      });
                                                  }
                                              });
                                          </script>
                                      <?php $i++;
                                        endforeach; ?>
                                      <td>
                                          <?php if ($controller->M_manage->get_karya_by_kode_pendaftaran($data->KODE_PENDAFTARAN) == false) : ?>
                                              <!-- Button trigger modal -->
                                              <button type="button" class="btn btn-soft-danger btn-xs" title="Cek Anggota Tim" id="btn-karya<?= $no ?>" data-toggle="modal" data-target="#modakarya<?= $no ?>" disabled>
                                                  <i class="tio-open-in-new"></i> Belum Ada
                                              </button>
                                          <?php else : ?>
                                              <!-- Button trigger modal -->
                                              <button type="button" class="btn btn-primary btn-xs" title="Cek Anggota Tim" id="btn-karya<?= $no ?>" data-toggle="modal" data-target="#modakarya<?= $no ?>">
                                                  <i class="tio-open-in-new"></i> Cek Karya
                                              </button>
                                          <?php endif; ?>

                                          <!-- Get anggota -->
                                          <script>
                                              $("#btn-karya<?= $no ?>").click(function() {
                                                  if ($(".file_exists<?= $no ?>")[0]) {
                                                      // Do something if class exists
                                                  } else {
                                                      // Do something if class does not exist
                                                      $("#file_karya<?= $no ?>").html(`<center><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sedang memuat file karya...</center>`);
                                                      $("#file_karya<?= $no ?>").addClass('file_exists<?= $no ?>');
                                                      jQuery.ajax({
                                                          url: "<?= base_url('manage_kompetisi/tampil_berkas_tim/' . $data->KODE_PENDAFTARAN) ?>",
                                                          type: "GET",
                                                          success: function(data) {
                                                              $("#file_karya<?= $no ?>").html(data);
                                                          }
                                                      });
                                                  }
                                              });
                                          </script>
                                      </td>
                                  </tr>

                                  <!-- Modal Verif Berkas -->
                                  <div class="modal fade" id="verif<?= $no; ?>" tabindex="-1" role="dialog" aria-labelledby="detailUserModalTitle" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                          <div class="modal-content">
                                              <!-- Header -->
                                              <div class="modal-header">
                                                  <h4 id="detailUserModalTitle" class="modal-title">Verifikasi berkas Tim</h4>
                                              </div>
                                              <!-- End Header -->

                                              <!-- Body -->
                                              <div class="modal-body">
                                                  <div class="alert alert-soft-warning" role="alert">
                                                      Pastikan berkas-berkas Tim telah sesuai dengan panduan lomba.
                                                  </div>
                                                  <p class="mb-0">Apakah yakin untuk verifikasi berkas Tim <b><?= $data->NAMA_TIM; ?></b>?</p>
                                              </div>

                                              <!-- Body -->
                                              <div class="modal-footer">
                                                  <form action="<?= site_url('manage_kompetisi/terima_pendaftaran'); ?>" method="post">
                                                      <input type="hidden" name="KODE_USER" value="<?= $data->KODE_USER; ?>">
                                                      <input type="hidden" name="NAMA_TIM" value="<?= $data->NAMA_TIM; ?>">
                                                      <button type="button" class="btn btn-sm btn-light" data-dismiss="modal" aria-label="Close">Batal</button>
                                                      <button type="submit" class="btn btn-sm btn-success">Verifikasi</button>
                                                  </form>
                                              </div>
                                          </div>
                                      </div>
                                  </div>

                                  <!-- Modal Total Berkas -->
                                  <div class="modal fade" id="tolak<?= $no; ?>" tabindex="-1" role="dialog" aria-labelledby="detailUserModalTitle" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                          <div class="modal-content">
                                              <!-- Header -->
                                              <div class="modal-header">
                                                  <h4 id="detailUserModalTitle" class="modal-title">Tolak berkas Tim</h4>
                                              </div>
                                              <!-- End Header -->

                                              <!-- Body -->
                                              <div class="modal-body">
                                                  <p class="mb-0">Tolak berkas Tim, <b><?= $data->NAMA_TIM; ?></b></p>
                                                  <hr class="my-1">
                                                  <p class="mb-0">Hubungi ketua tim, untuk konfirmasi berkas sebelum menolak pendaftaran ini?
                                                      <a href="https://api.whatsapp.com/send?text=Hai&phone=+62<?= $data->HP; ?>" target="_blank" class="text-success"><i class="tio-whatsapp"></i> hubungi sekarang</a>
                                                  </p>
                                              </div>

                                              <!-- Body -->
                                              <div class="modal-footer">
                                                  <form action="<?= site_url('manage_kompetisi/tolak_pendaftaran'); ?>" method="post">
                                                      <input type="hidden" name="KODE_USER" value="<?= $data->KODE_USER; ?>">
                                                      <input type="hidden" name="NAMA_TIM" value="<?= $data->NAMA_TIM; ?>">
                                                      <button type="button" class="btn btn-sm btn-light" data-dismiss="modal" aria-label="Close">Batal</button>
                                                      <button type="submit" class="btn btn-sm btn-danger">Tolak</button>
                                                  </form>
                                              </div>
                                          </div>
                                      </div>
                                  </div>

                                  <!-- Modal Cek Berkas-->
                                  <div class="modal fade modal-fullscreen" id="modakarya<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                      <div class="modal-dialog modal-xl" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h3 class="modal-title">Karya Tim - <?= $data->NAMA_TIM ?></h3>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body">
                                                  <div id="file_karya<?= $no ?>"></div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>


                              <?php $no++;
                                endforeach; ?>
                          <?php endif; ?>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  <?php endif; ?>
  <!-- End Card -->
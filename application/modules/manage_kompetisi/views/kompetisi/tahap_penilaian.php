<!-- Page Header -->
<div class="page-header">
  <div class="row align-items-end">
    <div class="col-sm mb-2 mb-sm-0">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-no-gutter">
          <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?= site_url('manage-kompetisi') ?>">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tahap penilaian</li>
        </ol>
      </nav>

      <h1 class="page-header-title">Tahap penilaian</h1>
    </div>

    <div class="col-sm-auto">
    </div>
  </div>
  <!-- End Row -->
</div>
<!-- End Page Header -->

<!-- Card -->
<div class="card">
  <div class="card-header">
    <h5 class="card-header-title">Data tahap penilaian</h5>
    <button type="button" class="btn btn-xs btn-primary float-right" data-toggle="modal" data-target="#tambah">Tambah tahap</button>

    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah tahap penilaian</h5>
            <button type="button" class="btn btn-xs btn-icon btn-soft-secondary" data-dismiss="modal" aria-label="Close">
              <svg aria-hidden="true" width="10" height="10" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z"/>
              </svg>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= site_url('manage_kompetisi/tambah_tahap');?>" method="post">

              <div class="row">
                <div class="col-8">
                  <div class="form-group">
                    <label class="input-label font-weight-bold">Nama Tahap <small class="text-danger">*</small></label>
                    <input type="text" class="form-control form-control-sm" name="NAMA_TAHAP" placeholder="Masukkan nama tahap penilaian" reqired>
                    <small class="text-muted">ex: Penyisihan</small>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label class="input-label font-weight-bold">Team/Peserta finalis <small class="text-danger">*</small></label>
                    <div class="js-quantity-counter input-group-quantity-counter w-100">
                      <input type="number" class="js-result form-control form-control-sm input-group-quantity-counter-control" value="1" min="1" max="50" name="TEAM">

                      <div class="input-group-quantity-counter-toggle">
                        <a class="js-minus input-group-quantity-counter-btn" href="javascript:;">
                          <i class="tio-remove"></i>
                        </a>
                        <a class="js-plus input-group-quantity-counter-btn" href="javascript:;">
                          <i class="tio-add"></i>
                        </a>
                      </div>
                    </div>
                    <small class="text-muted">Default: 1 finalis</small>
                  </div>
                </div>
              </div>            
              <div class="row">
                <div class="col-3">
                  <div class="form-group">
                    <label class="input-label font-weight-bold">Tanggal dimulai<small class="text-danger">*</small></label>
                    <input type="date" class="form-control form-control-sm" name="TANGGAL_MULAI" placeholder="Masukkan no telepon juri">
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-group">
                    <label class="input-label font-weight-bold">Waktu dimulai <small class="text-danger">*</small></label>
                    <input type="time" class="form-control form-control-sm"  name="WAKTU_MULAI" reqired>
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-group">
                    <label class="input-label font-weight-bold">Tanggal berakhir<small class="text-danger">*</small></label>
                    <input type="date" class="form-control form-control-sm" name="TANGGAL_BERAKHIR" placeholder="Masukkan no telepon juri">
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-group">
                    <label class="input-label font-weight-bold">Waktu berakhir <small class="text-danger">*</small></label>
                    <input type="time" class="form-control form-control-sm" name="WAKTU_BERAKHIR" reqired>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="input-label font-weight-bold">Keterangan <small class="text-muted">(optional)</small></label>
                <textarea type="text" class="form-control form-control-sm" name="KETERANGAN" rows="3" placeholder="Tambahkan keterangan"></textarea>
              </div>

              <div class="modal-footer px-0 pb-0">
                <button type="button" class="btn btn-light btn-xs" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary btn-xs">Tambah</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card-body">
    <table id="myTable" class="table table-bordered table-nowrap table-align-middle table-hover" width="100%">
      <thead class="thead-light">
        <tr>
          <th>No</th>
          <th></th>
          <th>Tahap Penilaian</th>
          <th>Mulai</th>
          <th>Berakhir</th>
          <th>TEAM</th>
          <th>keterangan</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($tahap_penilaian != false) :?>
          <?php $no = 1; foreach ($tahap_penilaian as $key): ?>
          <tr>
            <td><?= $no++;?></td>
            <td>
              <button type="button" class="btn btn-xs btn-info" data-toggle="modal" data-target="#edit<?= $no;?>"><i class="tio-edit"></i></button>
              <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#hapus<?= $no;?>"><i class="tio-delete"></i></button>
            </td>
            <td><?= $key->NAMA_TAHAP;?></td>
            <td><?= date("d F Y", strtotime($key->DATE_START));?> <?= $key->TIME_START;?></td>
            <td><?= date("d F Y", strtotime($key->DATE_END));?> <?= $key->TIME_END;?></td>
            <td>Diambil <?= $key->TEAM;?> finalis</td>
            <td>
              <button type="button" class="btn btn-xs btn-secondary" data-toggle="modal" data-target="#keterangan<?= $no;?>">keterangan</button>
            </td>
          </tr>

          <div class="modal fade" id="keterangan<?= $no;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Keterangan tahap penilaian <?= $key->NAMA_TAHAP;?></h5>
                  <button type="button" class="btn btn-xs btn-icon btn-soft-secondary" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" width="10" height="10" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                      <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z"/>
                    </svg>
                  </button>
                </div>
                <div class="modal-body">
                  <p><?= $key->KETERANGAN;?></p>
                  <div class="modal-footer px-0 pb-0">
                    <button type="button" class="btn btn-light btn-xs" data-dismiss="modal">Tutup</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="edit<?= $no;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit tahap penilaian</h5>
                  <button type="button" class="btn btn-xs btn-icon btn-soft-secondary" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" width="10" height="10" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                      <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z"/>
                    </svg>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="<?= site_url('manage_kompetisi/edit_tahap');?>" method="post">
                    <input type="hidden" name="ID_TAHAP" value="<?= $key->ID_TAHAP;?>">

                    <div class="row">
                      <div class="col-8">
                        <div class="form-group">
                          <label class="input-label font-weight-bold">Nama Tahap <small class="text-danger">*</small></label>
                          <input type="text" class="form-control form-control-sm" name="NAMA_TAHAP" value="<?= $key->NAMA_TAHAP;?>" reqired>
                          <small class="text-muted">ex: Penyisihan</small>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <label class="input-label font-weight-bold">Team finalis <small class="text-danger">*</small></label>
                          <div class="js-quantity-counter input-group-quantity-counter w-100">
                            <input type="number" class="js-result form-control form-control-sm input-group-quantity-counter-control" value="<?= $key->TEAM;?>" min="1" max="50" name="TEAM">

                            <div class="input-group-quantity-counter-toggle">
                              <a class="js-minus input-group-quantity-counter-btn" href="javascript:;">
                                <i class="tio-remove"></i>
                              </a>
                              <a class="js-plus input-group-quantity-counter-btn" href="javascript:;">
                                <i class="tio-add"></i>
                              </a>
                            </div>
                          </div>
                          <small class="text-muted">Default: 1 finalis</small>
                        </div>
                      </div>
                    </div>            
                    <div class="row">
                      <div class="col-3">
                        <div class="form-group">
                          <label class="input-label font-weight-bold">Tanggal dimulai<small class="text-danger">*</small></label>
                          <input type="date" class="form-control form-control-sm" name="TANGGAL_MULAI" value="<?= $key->DATE_START;?>">
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="form-group">
                          <label class="input-label font-weight-bold">Waktu dimulai <small class="text-danger">*</small></label>
                          <input type="time" class="form-control form-control-sm"  name="WAKTU_MULAI" value="<?= $key->TIME_START;?>" reqired>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="form-group">
                          <label class="input-label font-weight-bold">Tanggal berakhir<small class="text-danger">*</small></label>
                          <input type="date" class="form-control form-control-sm" name="TANGGAL_BERAKHIR" value="<?= $key->DATE_END;?>">
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="form-group">
                          <label class="input-label font-weight-bold">Waktu berakhir <small class="text-danger">*</small></label>
                          <input type="time" class="form-control form-control-sm" name="WAKTU_BERAKHIR" value="<?= $key->TIME_END;?>" reqired>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="input-label font-weight-bold">Keterangan <small class="text-muted">(optional)</small></label>
                      <textarea type="text" class="form-control form-control-sm" name="KETERANGAN" rows="3"><?= $key->KETERANGAN;?></textarea>
                    </div>

                    <div class="modal-footer px-0 pb-0">
                      <button type="button" class="btn btn-light btn-xs" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-info btn-xs">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="hapus<?= $no;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Hapus tahap penilaian</h5>
                  <button type="button" class="btn btn-xs btn-icon btn-soft-secondary" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" width="10" height="10" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                      <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z"/>
                    </svg>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="<?= site_url('manage_kompetisi/hapus_tahap');?>" method="post">
                    <input type="hidden" name="ID_TAHAP" value="<?= $key->ID_TAHAP;?>">
                    <p>Apakah anda yakin ingin menghapus tahap penilaian <i><?= $key->NAMA_TAHAP;?></i>?</p>
                    <div class="modal-footer px-0 pb-0">
                      <button type="button" class="btn btn-light btn-xs" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-danger btn-xs">Hapus</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach;?>
      <?php endif;?>
    </tbody>
  </table>
</div>
</div>
<!-- End Card -->
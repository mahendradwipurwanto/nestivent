<!-- Page Header -->
<div class="page-header">
  <div class="row align-items-end">
    <div class="col-sm mb-2 mb-sm-0">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-no-gutter">
          <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?= site_url('manage-kompetisi') ?>">Dashboard</a></li>
          <li class="breadcrumb-item" aria-current="page"><a class="breadcrumb-link" href="<?= site_url('manage-kompetisi/kriteria-penilaian') ?>">Kriteria penilaian</a></li>
          <li class="breadcrumb-item active" aria-current="page">Atur kriteria penilaian</li>
        </ol>
      </nav>

      <h1 class="page-header-title">Atur kriteria penilaian</h1>
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
    <h5 class="card-header-title">Data kriteria penilaian</h5>
    <button type="button" class="btn btn-xs btn-primary float-right" data-toggle="modal" data-target="#tambah">Tambah kriteria</button>

    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah kriteria penilaian</h5>
            <button type="button" class="btn btn-xs btn-icon btn-soft-secondary" data-dismiss="modal" aria-label="Close">
              <svg aria-hidden="true" width="10" height="10" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z"/>
              </svg>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= site_url('manage_kompetisi/tambah_kriteria/'.$id_tahap.'/'.$id_bidang);?>" method="post">

              <!-- Form Group -->
              <div class="js-add-field form-group mb-0" data-hs-add-field-options='{"template": "#addKriteriaFieldTemplate", "container": "#addKriteriaFieldContainer", "defaultCreated": 0}'>

                <div class="row">
                  <div class="col-12">

                    <div class="row">
                      <div class="col-8">
                        <div class="form-group">
                          <label class="input-label font-weight-bold">Nama Kriteria <small class="text-danger">*</small></label>
                          <input type="text" class="form-control form-control-sm" name="KRITERIA[]" placeholder="Masukkan nama kriteria" reqired>
                          <small class="text-muted">ex: Kerativitas</small>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <label class="input-label font-weight-bold">Bobot Kriteria <small class="text-danger">*</small></label>
                          <div class="js-quantity-counter input-group-quantity-counter w-100">
                            <input type="number" class="js-result form-control form-control-sm input-group-quantity-counter-control" value="0" min="0" max="100" name="BOBOT[]" required>

                            <div class="input-group-quantity-counter-toggle">
                              <a class="js-minus input-group-quantity-counter-btn" href="javascript:;">
                                <i class="tio-remove"></i>
                              </a>
                              <a class="js-plus input-group-quantity-counter-btn" href="javascript:;">
                                <i class="tio-add"></i>
                              </a>
                            </div>
                          </div>
                          <small class="text-muted">dalam %</small>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="input-label font-weight-bold">Keterangan Kriteria <small class="text-muted">(optional)</small></label>
                      <textarea type="text" class="form-control form-control-sm editor" name="KETERANGAN[]" placeholder="Tambahkan keterangan kriteria"></textarea>
                      <small class="text-muted">ex: Penyisihan</small>
                    </div>

                  </div>
                </div>


                <!-- Container For Input Field -->
                <div id="addKriteriaFieldContainer"></div>

                <div class="modal-footer px-0 pb-0">
                  <button type="button" class="btn btn-light btn-xs" data-dismiss="modal">Batal</button>
                  <a href="javascript:;" class="js-create-field form-link btn btn-sm btn-no-focus btn-ghost-primary">
                    <i class="fas fa-plus mr-1"></i> Tambah field
                  </a>
                  <button type="submit" class="btn btn-primary btn-xs">Tambah</button>
                </div>

              </div>

            </form>

            <!-- Add Phone Input Field -->
            <div id="addKriteriaFieldTemplate" style="display: none;">
              <div class="row">
                <div class="col-12">
                  <div class="row">
                    <div class="col-8">
                      <div class="form-group">
                        <label class="input-label font-weight-bold">Nama Kriteria <small class="text-danger">*</small></label>
                        <input type="text" class="form-control form-control-sm" name="KRITERIA[]" placeholder="Masukkan nama kriteria" reqired>
                        <small class="text-muted">ex: Kerativitas</small>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label class="input-label font-weight-bold">Bobot Kriteria <small class="text-danger">*</small></label>
                        <div class="js-quantity-counter input-group-quantity-counter w-100">
                          <input type="number" class="js-result form-control form-control-sm input-group-quantity-counter-control" value="0" min="0" max="100" name="BOBOT[]">

                          <div class="input-group-quantity-counter-toggle">
                            <a class="js-minus input-group-quantity-counter-btn" href="javascript:;">
                              <i class="tio-remove"></i>
                            </a>
                            <a class="js-plus input-group-quantity-counter-btn" href="javascript:;">
                              <i class="tio-add"></i>
                            </a>
                          </div>
                        </div>
                        <small class="text-muted">dalam %</small>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="input-label font-weight-bold">Keterangan Kriteria <small class="text-muted">(optional)</small></label>
                    <textarea type="text" class="form-control form-control-sm editor" name="KETERANGAN" placeholder="Tambahkan keterangan kriteria"></textarea>
                    <small class="text-muted">ex: Penyisihan</small>
                  </div>
                </div>

                <a class="js-delete-field input-group-add-field-delete" href="javascript:;">
                  <i class="tio-delete"></i>
                </a>
              </div>
            </div>
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
          <th>Kriteria</th>
          <th>Bobot</th>
          <th>Keterangan</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($kriteria_penilaian != false) :?>
          <?php $no = 1; foreach ($kriteria_penilaian as $key): ?>
          <tr>
            <td><?= $no++;?></td>
            <td>
              <button type="button" class="btn btn-xs btn-info" data-toggle="modal" data-target="#edit<?= $no;?>"><i class="tio-edit"></i></button>
              <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#hapus<?= $no;?>"><i class="tio-delete"></i></button>
            </td>
            <td><?= $key->KRITERIA;?></td>
            <td><?= $key->BOBOT;?>%</td>
            <td><?= $key->KETERANGAN;?></td>
          </tr>

          <div class="modal fade" id="edit<?= $no;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit kriteria penilaian</h5>
                  <button type="button" class="btn btn-xs btn-icon btn-soft-secondary" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" width="10" height="10" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                      <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z"/>
                    </svg>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="<?= site_url('manage_kompetisi/edit_kriteria');?>" method="post">
                    <input type="hidden" name="ID_KRITERIA" value="<?= $key->ID_KRITERIA;?>">

                    <div class="row">
                      <div class="col-8">
                        <div class="form-group">
                          <label class="input-label font-weight-bold">Nama Kriteria <small class="text-danger">*</small></label>
                          <input type="text" class="form-control form-control-sm" name="KRITERIA" value="<?= $key->KRITERIA;?>" reqired>
                          <small class="text-muted">ex: Kerativitas</small>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <label class="input-label font-weight-bold">Bobot Kriteria <small class="text-danger">*</small></label>
                          <div class="js-quantity-counter input-group-quantity-counter w-100">
                            <input type="number" class="js-result form-control form-control-sm input-group-quantity-counter-control" value="<?= $key->BOBOT;?>" min="0" max="100" name="BOBOT">

                            <div class="input-group-quantity-counter-toggle">
                              <a class="js-minus input-group-quantity-counter-btn" href="javascript:;">
                                <i class="tio-remove"></i>
                              </a>
                              <a class="js-plus input-group-quantity-counter-btn" href="javascript:;">
                                <i class="tio-add"></i>
                              </a>
                            </div>
                          </div>
                          <small class="text-muted">dalam %</small>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="input-label font-weight-bold">Keterangan Kriteria <small class="text-muted">(optional)</small></label>
                      <textarea type="text" class="form-control form-control-sm editor" name="KETERANGAN"><?= $key->KETERANGAN;?></textarea>
                      <small class="text-muted">ex: Penyisihan</small>
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
                  <h5 class="modal-title" id="exampleModalLabel">Hapus kriteria penilaian</h5>
                  <button type="button" class="btn btn-xs btn-icon btn-soft-secondary" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" width="10" height="10" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                      <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z"/>
                    </svg>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="<?= site_url('manage_kompetisi/hapus_kriteria');?>" method="post">
                    <input type="hidden" name="ID_KRITERIA" value="<?= $key->ID_KRITERIA;?>">
                    <p>Apakah anda yakin ingin menghapus kriteria penilaian <i><?= $key->KRITERIA;?></i>?</p>
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

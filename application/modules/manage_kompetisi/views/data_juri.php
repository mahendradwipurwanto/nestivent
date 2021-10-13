<!-- Page Header -->
<div class="page-header">
  <div class="row align-items-end">
    <div class="col-sm mb-2 mb-sm-0">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-no-gutter">
          <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?= site_url('manage-kompetisi') ?>">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Data juri</li>
        </ol>
      </nav>

      <h1 class="page-header-title">Data juri</h1>
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
    <h5 class="card-header-title">Data juri</h5>
    <button type="button" class="btn btn-xs btn-primary float-right" data-toggle="modal" data-target="#tambah">Tambah juri</button>

    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah juri</h5>
            <button type="button" class="btn btn-xs btn-icon btn-soft-secondary" data-dismiss="modal" aria-label="Close">
              <svg aria-hidden="true" width="10" height="10" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z"/>
              </svg>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= site_url('manage_kompetisi/tambah_juri');?>" method="post">

              <div class="row mb-2">
                <div class="col-6">

                  <div class="form-group">
                    <label class="input-label font-weight-bold">Nama juri <small class="text-danger">*</small></label>
                    <input type="text" class="form-control form-control-sm" name="NAMA_JURI" placeholder="Masukkan nama juri" reqired>
                  </div>
                  <div class="form-group">
                    <label class="input-label font-weight-bold">Email juri <small class="text-danger">*</small></label>
                    <input type="email" class="form-control form-control-sm" name="EMAIL" placeholder="Masukkan email juri" reqired>
                  </div>
                  <div class="form-group">
                    <label class="input-label font-weight-bold">No telp <small class="text-muted">(optional)</small></label>
                    <input type="number" class="form-control form-control-sm" name="HP" placeholder="Masukkan no telepon juri">
                  </div>
                  <div class="form-group">
                    <label class="input-label font-weight-bold">Password juri <small class="text-danger">*</small></label>
                    <input type="password" class="form-control form-control-sm" minlength="6" name="PASSWORD" reqired>
                  </div>
                  <div class="form-group">
                    <label class="input-label font-weight-bold">Confirm Password juri <small class="text-danger">*</small></label>
                    <input type="password" class="form-control form-control-sm" minlength="6" name="CONFIRM_PASSWORD" reqired>
                  </div>

                </div>
                <div class="col-6">
                  <label class="input-label font-weight-bold">Bidang lomba juri <small class="text-danger">*</small></label><!-- Input Group -->
                  <div class="input-group input-group-down-break">

                    <?php if ($bidang_lomba == false):?>

                      <!-- Custom Radio -->
                      <div class="form-control">
                        <div class="custom-control custom-radio">
                          <label class="custom-control-label">Belum ada bidang lomba</label>
                        </div>
                      </div>
                      <!-- End Custom Radio -->

                      <?php else:?>
                        <?php $num = 1; foreach ($bidang_lomba as $key) :?>

                        <!-- Custom Radio -->
                        <div class="form-control">
                          <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="BIDANG_JURI" id="<?= $key->ID_BIDANG;?>" <?= ($num++ == 1? 'checked' : '');?> value="<?= $key->ID_BIDANG;?>">
                            <label class="custom-control-label" for="<?= $key->ID_BIDANG;?>"><?= $key->BIDANG_LOMBA;?></label>
                          </div>
                        </div>
                        <!-- End Custom Radio -->

                      <?php endforeach;?>
                    <?php endif;?>

                  </div>
                  <!-- End Input Group -->
                </div>
              </div>

              <div class="modal-footer px-0 pb-0">
                <button type="button" class="btn btn-light btn-xs" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary btn-xs">Tambah juri</button>
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
          <th>Nama juri</th>
          <th>Email juri</th>
          <th>Bidang Juri</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($data_juri != false) :?>
          <?php $no = 1; foreach ($data_juri as $key): ?>
          <tr>
            <td><?= $no++;?></td>
            <td>
              <button type="button" class="btn btn-xs btn-info" data-toggle="modal" data-target="#edit<?= $no;?>"><i class="tio-edit"></i></button>
              <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#hapus<?= $no;?>"><i class="tio-delete"></i></button>
            </td>
            <td><?= $key->NAMA;?></td>
            <td><?= $key->EMAIL;?></td>
            <td><?= ($CI->M_manage->get_bidangJuri($key->KODE_USER) != false ? $CI->M_manage->get_bidangJuri($key->KODE_USER)->BIDANG_LOMBA : 'BIDANG TIDAK DITEMUKAN');?></td>
          </tr>

          <div class="modal fade" id="hapus<?= $no;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Hapus data juri</h5>
                  <button type="button" class="btn btn-xs btn-icon btn-soft-secondary" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" width="10" height="10" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                      <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z"/>
                    </svg>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="<?= site_url('manage_kompetisi/hapus_juri');?>" method="post">
                    <input type="hidden" name="KODE_USER" value="<?= $key->KODE_USER;?>">
                    <input type="hidden" name="ID" value="<?= $CI->M_manage->get_bidangJuri($key->KODE_USER)->ID;?>">
                    <p>Apakah anda yakin ingin menghapus data juri <i><?= $key->NAMA;?></i>?</p>
                    <div class="modal-footer px-0 pb-0">
                      <button type="button" class="btn btn-light btn-xs" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-danger btn-xs">Hapus</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="edit<?= $no;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit data juri</h5>
                  <button type="button" class="btn btn-xs btn-icon btn-soft-secondary" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" width="10" height="10" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                      <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z"/>
                    </svg>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="<?= site_url('manage_kompetisi/edit_juri');?>" method="post">
                    <input type="hidden" name="KODE_USER" value="<?= $key->KODE_USER;?>">
                    <input type="hidden" name="ID" value="<?= $CI->M_manage->get_bidangJuri($key->KODE_USER)->ID;?>">
                    <div class="row mb-2">
                      <div class="col-6">

                        <div class="form-group">
                          <label class="input-label font-weight-bold">Nama juri <small class="text-danger">*</small></label>
                          <input type="text" class="form-control form-control-sm" name="NAMA_JURI" value="<?= $key->NAMA;?>" reqired>
                        </div>
                        <div class="form-group">
                          <label class="input-label font-weight-bold">Email juri <small class="text-danger">*</small></label>
                          <input type="email" class="form-control form-control-sm" name="EMAIL" value="<?= $key->EMAIL;?>" reqired>
                        </div>
                        <div class="form-group">
                          <label class="input-label font-weight-bold">No telp <small class="text-danger">*</small></label>
                          <input type="number" class="form-control form-control-sm" name="HP" value="<?= $key->HP;?>">
                        </div>
                        <div class="form-group">
                          <label class="input-label font-weight-bold">Password juri <small class="text-danger">*</small></label>
                          <input type="password" class="form-control form-control-sm" minlength="6" name="PASSWORD" reqired>
                        </div>
                        <div class="form-group">
                          <label class="input-label font-weight-bold">Confirm Password juri <small class="text-danger">*</small></label>
                          <input type="password" class="form-control form-control-sm" minlength="6" name="CONFIRM_PASSWORD" reqired>
                        </div>

                      </div>
                      <div class="col-6">
                        <label class="input-label font-weight-bold">Bidang lomba juri <small class="text-danger">*</small></label><!-- Input Group -->
                        <div class="input-group input-group-down-break">

                          <?php if ($bidang_lomba == false):?>

                            <!-- Custom Radio -->
                            <div class="form-control">
                              <div class="custom-control custom-radio">
                                <label class="custom-control-label">Belum ada bidang lomba</label>
                              </div>
                            </div>
                            <!-- End Custom Radio -->

                            <?php else:?>
                              <?php foreach ($bidang_lomba as $value) :?>

                              <!-- Custom Radio -->
                              <div class="form-control">
                                <div class="custom-control custom-radio">
                                  <input type="radio" class="custom-control-input" name="BIDANG_JURI" id="<?= $key->KODE_USER;?><?= $value->ID_BIDANG;?>" <?= ($CI->M_manage->get_bidangJuri($key->KODE_USER)->ID_BIDANG) == $value->ID_BIDANG ? 'checked' : '';?> value="<?= $value->ID_BIDANG;?>">
                                  <label class="custom-control-label" for="<?= $key->KODE_USER;?><?= $value->ID_BIDANG;?>"><?= $value->BIDANG_LOMBA;?></label>
                                </div>
                              </div>
                              <!-- End Custom Radio -->

                            <?php endforeach;?>
                          <?php endif;?>

                        </div>
                        <!-- End Input Group -->
                      </div>
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
        <?php endforeach;?>
      <?php endif;?>
    </tbody>
  </table>
</div>
</div>
<!-- End Card -->
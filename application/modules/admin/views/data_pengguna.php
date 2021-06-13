<!-- Page Header -->
<div class="page-header">
  <div class="row align-items-end">
    <div class="col-sm mb-2 mb-sm-0">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-no-gutter">
          <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?= site_url('admin') ?>">dashboard</a></li>
          <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Pengguna</a></li>
          <li class="breadcrumb-item active" aria-current="page">Data Pengguna</li>
        </ol>
      </nav>

      <h1 class="page-header-title">Data Pengguna</h1>
    </div>

    <div class="col-sm-auto">
    </div>
  </div>
  <!-- End Row -->
</div>
<!-- End Page Header -->

<!-- Stats -->
<div class="row gx-2 gx-lg-3">
  <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card h-100">
      <div class="card-body">
        <h6 class="card-subtitle mb-2">Total pengguna</h6>

        <div class="row align-items-center gx-2">
          <div class="col">
            <span class="js-counter display-4 text-dark"><?= number_format($countPengguna,0,",",".");?></span>
          </div>
        </div>
        <!-- End Row -->
      </div>
    </div>
    <!-- End Card -->
  </div>

  <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card h-100">
      <div class="card-body">
        <h6 class="card-subtitle mb-2">Pengguna baru</h6>

        <div class="row align-items-center gx-2">
          <div class="col">
            <span class="js-counter display-4 text-dark"><?= number_format($NewPengguna,0,",",".");?></span>
          </div>

          <div class="col-auto">
            <span class="badge badge-soft-<?= ($NewPengguna == 0 ? 'secondary' : ($NewPengguna > $countPengguna ? 'success' : 'danger'));?> p-1">
              <i class="<?= ($NewPengguna == 0 ? 'tio-voice-line' : ($NewPengguna > $countPengguna ? 'tio-trending-up' : 'tio-trending-down'));?>"></i>
              <?= ($NewPengguna == 0 ? '0' : round(((($countPengguna-$NewPengguna) / $countPengguna) * 100), 1)) ?>%
            </span>
          </div>
        </div>
        <!-- End Row -->
      </div>
    </div>
    <!-- End Card -->
  </div>

  <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card h-100">
      <div class="card-body">
        <h6 class="card-subtitle mb-2">Pengguna non-aktif</h6>

        <div class="row align-items-center gx-2">
          <div class="col">
            <span class="js-counter display-4 text-dark"><?= number_format($nonPengguna,0,",",".");?></span>
          </div>

          <div class="col-auto">
            <span class="badge badge-soft-<?= ($diffNonPengguna == $nonPengguna ? 'secondary' : ($diffNonPengguna < $nonPengguna ? 'success' : 'danger'));?> p-1">
              <i class="<?= ($diffNonPengguna == $nonPengguna ? 'tio-voice-line' : ($diffNonPengguna < $nonPengguna ? 'tio-trending-up' : 'tio-trending-down'));?>"></i>
              <?= ($nonPengguna == 0 ? '0' : round(((($nonPengguna-$diffNonPengguna) / $nonPengguna) * 100), 1)) ?>%
            </span>
          </div>
        </div>
        <!-- End Row -->
      </div>
    </div>
    <!-- End Card -->
  </div>

  <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card h-100">
      <div class="card-body">
        <h6 class="card-subtitle mb-2">Hak akses K-PANEL</h6>

        <div class="row align-items-center gx-2">
          <div class="col">
            <span class="js-counter display-4 text-dark"><?= number_format($countKPanel,0,",",".");?></span>
          </div>

          <div class="col-auto">
            <span class="badge badge-soft-<?= ($diffKPanel == $countKPanel ? 'secondary' : ($diffKPanel < $countKPanel ? 'success' : 'danger'));?> p-1">
              <i class="<?= ($diffKPanel == $countKPanel ? 'tio-voice-line' : ($diffKPanel < $countKPanel ? 'tio-trending-up' : 'tio-trending-down'));?>"></i>
              <?= ($countKPanel == 0 ? '0' : round(((($countKPanel-$diffKPanel) / $countKPanel) * 100), 1)) ?>%
            </span>
          </div>
        </div>
        <!-- End Row -->
      </div>
    </div>
    <!-- End Card -->
  </div>
</div>
<!-- End Stats -->

<!-- Card -->
<div class="card">
  <!-- Header -->
  <div class="card-header">
    <div class="row justify-content-between align-items-center flex-grow-1">
      <div class="col-sm-6 col-md-4 mb-3 mb-sm-0">
        <form>
          <!-- Search -->
          <div class="input-group input-group-merge input-group-flush">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="tio-search"></i>
              </div>
            </div>
            <input id="datatableSearch" type="search" class="form-control" placeholder="Search users" aria-label="Search users">
          </div>
          <!-- End Search -->
        </form>
      </div>

      <div class="col-sm-6">
        <div class="d-sm-flex justify-content-sm-end align-items-sm-center">

          <!-- Unfold -->
          <div class="hs-unfold mr-2">
            <a class="js-hs-unfold-invoker btn btn-sm btn-white dropdown-toggle" href="javascript:;"
              data-hs-unfold-options='{
                "target": "#usersExportDropdown",
                "type": "css-animation"
              }'>
              <i class="tio-download-to mr-1"></i> Export
            </a>

            <div id="usersExportDropdown" class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-sm-right">
              <span class="dropdown-header">Options</span>
              <a id="export-copy" class="dropdown-item" href="javascript:;">
                <img class="avatar avatar-xss avatar-4by3 mr-2" src="<?= base_url();?>assets/backend/svg/illustrations/copy.svg" alt="Image Description">
                Copy
              </a>
              <a id="export-print" class="dropdown-item" href="javascript:;">
                <img class="avatar avatar-xss avatar-4by3 mr-2" src="<?= base_url();?>assets/backend/svg/illustrations/print.svg" alt="Image Description">
                Print
              </a>
              <div class="dropdown-divider"></div>
              <span class="dropdown-header">Download options</span>
              <a id="export-excel" class="dropdown-item" href="javascript:;">
                <img class="avatar avatar-xss avatar-4by3 mr-2" src="<?= base_url();?>assets/backend/svg/brands/excel.svg" alt="Image Description">
                Excel
              </a>
              <a id="export-csv" class="dropdown-item" href="javascript:;">
                <img class="avatar avatar-xss avatar-4by3 mr-2" src="<?= base_url();?>assets/backend/svg/components/placeholder-csv-format.svg" alt="Image Description">
                .CSV
              </a>
              <a id="export-pdf" class="dropdown-item" href="javascript:;">
                <img class="avatar avatar-xss avatar-4by3 mr-2" src="<?= base_url();?>assets/backend/svg/brands/pdf.svg" alt="Image Description">
                PDF
              </a>
            </div>
          </div>
          <!-- End Unfold -->
        </div>
      </div>
    </div>
    <!-- End Row -->
  </div>
  <!-- End Header -->

  <!-- Table -->
  <div class="table-responsive datatable-custom">
    <table id="datatable" class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
    data-hs-datatables-options='{
      "columnDefs": [{
        "targets": [0, 5],
        "orderable": false
      }],
      "order": [],
      "info": {
        "totalQty": "#datatableWithPaginationInfoTotalQty"
      },
      "search": "#datatableSearch",
      "entries": "#datatableEntries",
      "pageLength": 15,
      "isResponsive": false,
      "isShowPaging": false,
      "pagination": "datatablePagination"
    }'>
    <thead class="thead-light">
      <tr>
        <th class="table-column-pr-0">No</th>
        <th class="table-column-pl-0">Nama</th>
        <th>Jenis Kelamin</th>
        <th>Telepon</th>
        <th>Instansi/Role</th>
        <th></th>
      </tr>
    </thead>

    <tbody>
      <?php if ($countPengguna > 0): ?>
        <?php $no = 1; foreach ($pengguna as $key): ?>
          <tr>
            <td class="table-column-pr-0"><?= $no++; ?></td>
            <td class="table-column-pl-0">
              <a class="d-flex align-items-center" href="mailto:<?= $key->EMAIL ?>">
                <div class="avatar avatar-circle">
                  <img class="avatar-img" src="<?= ($key->PROFIL == null ? base_url().'assets/frontend/img/100x100/img12.jpg' : base_url().'berkas/pengguna/'.$key->KODE_USER.'/foto/'.$key->PROFIL);?>" alt="Image Description">
                </div>
                <div class="ml-3">
                  <span class="d-block h5 text-hover-primary mb-0"><?= $key->NAMA ?></span>
                  <span class="d-block font-size-sm text-body"><?= $key->EMAIL ?></span>
                </div>
              </a>
            </td>
            <td><?= ($key->JK == "L" ? "Laki-laki" : "Perempuan") ?></span></td>
            <td><a href="tel:+62<?= $key->HP ?>">+62<?= $key->HP ?></a></span></td>
            <td>
              <span class="d-block h5 mb-0"><?= $key->INSTANSI ?></span>
              <span class="d-block font-size-sm"><?php $jabatan = explode("|", $key->JABATAN); echo $jabatan[1] ?></span>
            </td>
            <td>
              <a class="btn btn-sm btn-white" data-toggle="modal" data-target="#detailUser<?= $key->KODE_USER;?>">
                <i class="tio-eye"></i> View
              </a>
            </td>
          </tr>
          <!-- detail user Modal -->
          <div class="modal fade" id="detailUser<?= $key->KODE_USER;?>" tabindex="-1" role="dialog" aria-labelledby="detailUserModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                <!-- Header -->
                <div class="modal-header">
                  <h4 id="detailUserModalTitle" class="modal-title">Detail pengguna</h4>

                  <button type="button" class="btn btn-white mr-2" data-dismiss="modal" aria-label="Close">Tutup</button>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="modal-body">
                  <!-- Profile Cover -->
                  <div class="profile-cover">
                    <div class="profile-cover-img-wrapper">
                      <img id="detailProfileCoverImgModal" class="profile-cover-img" src="<?= base_url() ?>assets/backend/img/1920x400/img1.jpg" alt="Image Description">
                    </div>
                  </div>
                  <!-- End Profile Cover -->

                  <!-- Avatar -->
                  <label class="avatar avatar-xxl avatar-circle avatar-border-lg profile-cover-avatar mb-5" for="detailAvatarUploaderModal">
                    <img id="detailAvatarImgModal" class="avatar-img" src="<?= ($key->PROFIL == null ? base_url().'assets/frontend/img/100x100/img12.jpg' : base_url().'berkas/pengguna/'.$key->KODE_USER.'/foto/'.$key->PROFIL);?>" alt="Image Description">
                  </label>
                  <!-- End Avatar -->

                  <!-- Form Group -->
                  <div class="row form-group">
                    <label for="detailFirstNameModalLabel" class="col-sm-3 col-form-label input-label">Nama Lengkap</label>

                    <div class="col-sm-9">
                      <div class="js-form-message input-group input-group-sm-down-break">
                        <input type="text" class="form-control" name="detailFirstNameModal" id="detailFirstNameModalLabel" value="<?= $key->NAMA;?>" readonly>
                      </div>
                    </div>
                  </div>
                  <!-- End Form Group -->

                  <!-- Form Group -->
                  <div class="row form-group">
                    <label for="detailEmailModalLabel" class="col-sm-3 col-form-label input-label">Email</label>

                    <div class="col-sm-9">
                      <div class="js-form-message">
                        <!-- Input Group -->
                        <div class="input-group input-group-merge">
                          <input type="email" class="form-control" name="detailEmailModal" id="detailEmailModalLabel" value="<?= $key->EMAIL;?>" readonly>
                            <a class="input-group-append" href="mailto:<?= $key->EMAIL;?>" target="_blank">
                              <span class="input-group-text p-2">
                                send mail
                              </span>
                            </a>
                        </div>
                        <!-- End Input Group -->
                      </div>
                    </div>
                  </div>
                  <!-- End Form Group -->

                  <!-- Form Group -->
                  <div class="row form-group">
                    <label for="detailEmailModalLabel" class="col-sm-3 col-form-label input-label">Telepon</label>

                    <div class="col-sm-4">
                      <div class="js-form-message">
                      </div>
                        <!-- Input Group -->
                        <div class="input-group input-group-merge">
                          <input type="text" class="form-control" name="detailEmailModal" id="detailEmailModalLabel" value="+62<?= $key->HP;?>" readonly>
                            <a class="input-group-append" href="tel:+62<?= $key->HP;?>" target="_blank">
                              <span class="input-group-text p-2">
                                <i class="tio-call-talking"></i>
                              </span>
                            </a>
                        </div>
                        <!-- End Input Group -->
                    </div>
                    <label for="detailEmailModalLabel" class="col-sm-2 col-form-label input-label">Jenis Kelamin</label>

                    <div class="col-sm-3">
                      <div class="js-form-message">
                        <input type="text" class="form-control" name="detailEmailModal" id="detailEmailModalLabel" value="<?= $key->JK;?>" readonly>
                      </div>
                    </div>
                  </div>
                  <!-- End Form Group -->

                  <!-- Form Group -->
                  <div class="row form-group">
                    <label for="detailOrganizationModalLabel" class="col-sm-3 col-form-label input-label">Instansi</label>

                    <div class="col-sm-9">
                      <div class="js-form-message">
                        <input type="text" class="form-control" name="detailOrganizationModal" id="detailOrganizationModalLabel" value="<?= $key->INSTANSI;?>" readonly>
                      </div>
                    </div>
                  </div>
                  <!-- End Form Group -->

                  <!-- Form Group -->
                  <div class="row form-group">
                    <label for="detailDepartmentModalLabel" class="col-sm-3 col-form-label input-label">Jabatan</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="detailDepartmentModal" id="detailDepartmentModalLabel" value="<?php $jabatan = explode("|", $key->JABATAN); echo $jabatan[1]?>">
                    </div>
                  </div>
                  <!-- End Form Group -->

                  <!-- Form Group -->
                  <div class="row form-group">
                    <label for="detailDepartmentModalLabel" class="col-sm-3 col-form-label input-label">Instagram</label>

                    <div class="col-sm-9">
                      <!-- Input Group -->
                      <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                          <span class="input-group-text p-2">
                            @
                          </span>
                        </div>
                        <input type="text" class="form-control" name="detailInstagramModalLabel" id="detailInstagramModalLabel" value="<?= $key->INSTAGRAM;?>" readonly>
                      </div>
                      <!-- End Input Group -->
                    </div>
                  </div>
                  <!-- End Form Group -->

                  <!-- Form Group -->
                  <div class="row form-group">
                    <label for="detailDepartmentModalLabel" class="col-sm-3 col-form-label input-label">Alamat</label>

                    <div class="col-sm-9">
                      <!-- Input Group -->
                      <textarea class="form-control" name="detailAlamatModalLabel" id="detailAlamatModalLabel" rows="3"><?= $key->ALAMAT;?></textarea>
                    </div>
                    <!-- End Input Group -->
                  </div>
                </div>
                <!-- End Form Group -->
              </div>
              <!-- End Body -->
            </div>
          </div>
        </div>
        <!-- End detail user Modal -->
      <?php endforeach; ?>
    <?php endif; ?>
  </tbody>
  </table>
  </div>
  <!-- End Table -->

  <!-- Footer -->
  <div class="card-footer">
    <!-- Pagination -->
    <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
      <div class="col-sm mb-2 mb-sm-0">
        <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
          <span class="mr-2">Menampilkan:</span>

          <!-- Select -->
          <select id="datatableEntries" class="js-select2-custom"
            data-hs-select2-options='{
              "minimumResultsForSearch": "Infinity",
              "customClass": "custom-select custom-select-sm custom-select-borderless",
              "dropdownAutoWidth": true,
              "width": true
            }'>
            <option value="10" selected>10</option>
            <option value="15">15</option>
            <option value="20">20</option>
          </select>
          <!-- End Select -->

          <span class="text-secondary mr-2">dari</span>

          <!-- Pagination Quantity -->
          <span id="datatableWithPaginationInfoTotalQty"></span>
        </div>
      </div>

      <div class="col-sm-auto">
        <div class="d-flex justify-content-center justify-content-sm-end">
          <!-- Pagination -->
          <nav id="datatablePagination" aria-label="Activity pagination"></nav>
        </div>
      </div>
    </div>
    <!-- End Pagination -->
  </div>
  <!-- End Footer -->
</div>
<!-- End Card -->

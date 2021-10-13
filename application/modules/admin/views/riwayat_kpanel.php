<!-- Page Header -->
<div class="page-header">
  <div class="row align-items-end">
    <div class="col-sm mb-2 mb-sm-0">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-no-gutter">
          <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?= site_url('admin') ?>">dashboard</a></li>
          <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Pengajuan</a></li>
          <li class="breadcrumb-item active" aria-current="page">Riwayat Pengajuan K-Panel</li>
        </ol>
      </nav>

      <h1 class="page-header-title">Riwayat Pengajuan K-Panel</h1>
    </div>

    <div class="col-sm-auto">
    </div>
  </div>
  <!-- End Row -->
</div>
<!-- End Page Header -->

<!-- Stats -->
<div class="row gx-2 gx-lg-3">
  <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card h-100">
      <div class="card-body">
        <h6 class="card-subtitle mb-2">Total pengajuan hingga hari ini</h6>

        <div class="row align-items-center gx-2">
          <div class="col">
            <span class="js-counter display-4 text-dark"><?= number_format($countPengajuan,0,",",".");?></span>
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
        <h6 class="card-subtitle mb-2">Pengajuan hari ini</h6>

        <div class="row align-items-center gx-2">
          <div class="col">
            <span class="js-counter display-4 text-dark"><?= number_format($pengajuanHariINI,0,",",".");?></span>
          </div>

          <div class="col-auto">
            <span class="badge badge-soft-<?= ($pengajuanHariINI == 0 ? 'secondary' : ($pengajuanHariINI > $pengajuanLama ? 'success' : 'danger'));?> p-1">
              <i class="<?= ($pengajuanHariINI == 0 ? 'tio-voice-line' : ($pengajuanHariINI > $pengajuanLama ? 'tio-trending-up' : 'tio-trending-down'));?>"></i>
              <?= ($pengajuanHariINI == 0 ? '0' : round(((($pengajuanHariINI-$pengajuanLama) / $pengajuanHariINI) * 100), 1)) ?>%
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
            <input id="datatableSearch" type="search" class="form-control" placeholder="Cari data" aria-label="Search users">
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
    <th class="table-column-pl-0">Nama Penyelenggara</th>
    <th>Pengaju</th>
    <th></th>
    <th>Waktu Pengajuan</th>
    <th></th>
  </tr>
</thead>

<tbody>
  <?php if ($countPengajuan > 0): ?>
    <?php $no = 1; foreach ($penyelenggara as $key): ?>
    <tr>
      <td class="table-column-pr-0"><?= $no++; ?></td>
      <td class="table-column-pl-0">
        <a class="d-flex align-items-center">
          <div class="avatar avatar-circle">
            <img class="avatar-img" src="<?= ($key->LOGO == null ? base_url().'assets/frontend/img/100x100/img12.jpg' : base_url().'berkas/penyelenggara/'.$key->KODE_PENYELENGGARA.'/'.$key->LOGO);?>" alt="<?= $key->NAMA ?>">
          </div>
          <div class="ml-3">
            <span class="d-block h5 text-hover-primary mb-0"><?= $key->NAMA ?></span>
            <span class="d-block font-size-sm text-body"><?= $key->INSTANSI ?></span>
          </div>
        </a>
      </td>
      <td><?= $CI->M_admin->get_pengajuPenyelenggara($key->KODE_PENYELENGGARA); ?></td>
      <td>
        <a class="btn btn-sm btn-white" data-toggle="modal" data-target="#daftarKolabolator<?= $key->KODE_PENYELENGGARA;?>">
          <i class="tio-eye"></i> Kolabolator
        </a>
      </td>
      <td><?= date("H:i, d F Y", strtotime($key->MAKE_DATE)); ?></td>
      <td>
        <a class="btn btn-sm btn-<?= ($key->STATUS == 2) ? "danger" : (($key->STATUS == 1) ? "success" : "secondary");?>">
          <i class="tio-poi-outlined"></i> <?= ($key->STATUS == 2) ? "DITOLAK" : (($key->STATUS == 1) ? "DITERIMA" : "PENDING");?>
        </a>
      </td>
    </tr>

    <!-- data kolabolator Modal -->
    <div class="modal fade" id="daftarKolabolator<?= $key->KODE_PENYELENGGARA;?>" tabindex="-1" role="dialog" aria-labelledby="detailUserModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <!-- Header -->
          <div class="modal-header">
            <h4 id="detailUserModalTitle" class="modal-title">Daftar Kolabolator</h4>

            <button type="button" class="btn btn-white mr-2" data-dismiss="modal" aria-label="Close">Tutup</button>
          </div>
          <!-- End Header -->

          <!-- Body -->
          <div class="modal-body">
            <!-- Profile Cover -->
            <div class="profile-cover">
              <div class="profile-cover-img-wrapper">
                <img id="detailProfileCoverImgModal" class="profile-cover-img" src="<?= base_url() ?>assets/backend/img/1920x400/img1.jpg" alt="<?= $key->NAMA ?>">
              </div>
            </div>
            <!-- End Profile Cover -->

            <!-- Avatar -->
            <label class="avatar avatar-xxl avatar-circle avatar-border-lg profile-cover-avatar mb-5" for="detailAvatarUploaderModal">
              <img id="detailAvatarImgModal" class="avatar-img" src="<?= ($key->LOGO == null ? base_url().'assets/frontend/img/100x100/img12.jpg' : base_url().'berkas/penyelenggara/'.$key->KODE_PENYELENGGARA.'/'.$key->LOGO);?>" alt="<?= $key->NAMA ?>">
            </label>
            <!-- End Avatar -->


            <?php $kolabolator = $CI->M_admin->get_kolabolatorList($key->KODE_PENYELENGGARA); foreach ($kolabolator as $value):?>

            <?php if($CI->M_admin->cek_kolabolatorAkun($value->EMAIL) == TRUE): ?>

            <!-- Form Group -->
            <div class="row form-group">
              <label for="detailFirstNameModalLabel" class="col-sm-3 col-form-label input-label">Nama Lengkap</label>

              <div class="col-sm-9">
                <div class="js-form-message input-group input-group-sm-down-break">
                  <input type="text" class="form-control" name="detailFirstNameModal" id="detailFirstNameModalLabel" value="<?= $value->NAMA;?>" readonly>
                </div>
              </div>
            </div>
            <!-- End Form Group -->
            <?php endif;?>
            <!-- Form Group -->
            <div class="row form-group">
              <label for="detailEmailModalLabel" class="col-sm-3 col-form-label input-label">Email <span class="badge badge-primary"><?= $CI->M_admin->cek_kolabolatorAkun($value->EMAIL) == TRUE ? "Non-Akun" : "Akun";?></span></label>

              <div class="col-sm-6">
                <div class="js-form-message">
                  <!-- Input Group -->
                  <div class="input-group input-group-merge">
                    <input type="email" class="form-control" name="detailEmailModal" id="detailEmailModalLabel" value="<?= $value->EMAIL;?>" readonly>
                    <a class="input-group-append" href="mailto:<?= $value->EMAIL;?>" target="_blank">
                      <span class="input-group-text p-2">
                        send mail
                      </span>
                    </a>
                  </div>
                  <!-- End Input Group -->
                </div>
              </div>
              <label for="detailEmailModalLabel" class="col-sm-3 col-form-label input-label"><?= ($value->STATUS == 0 ? "Pending" : "Joined") ;?></label>
            </div>
            <!-- End Form Group -->
            <hr>
            <?php endforeach;?>

          </div>
          <!-- End Modal -->
        </div>
        <!-- End Body -->
      </div>
    </div>
    <!-- End data kolabolator Modal -->

    <!-- terima Modal -->
    <div class="modal fade bd-example-modal-sm"id="terimaPenyelenggara<?= $key->KODE_PENYELENGGARA;?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title h4" id="mySmallModalLabel">Terima permintaan</h5>
            <button type="button" class="btn btn-xs btn-icon btn-ghost-secondary" data-dismiss="modal" aria-label="Close">
              <i class="tio-clear tio-lg"></i>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= site_url('admin/terimaPenyelenggara') ?>" method="POST">
              <input type="hidden" name="KODE_PENYELENGGARA" value="<?= $key->KODE_PENYELENGGARA ?>">
              <p>Terima permintaan ini?</p>
              <div class="form-group">
                <label class="title">Sematkan pesan <small class="text-muted">(Optional)</small></label>
                <textarea class="form-control" rows="3" name="PESAN"></textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-sm btn-success">Terima</a>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
    <!-- End terima Modal -->

    <!-- terima Modal -->
    <div class="modal fade bd-example-modal-sm"id="tolakPenyelenggara<?= $key->KODE_PENYELENGGARA;?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title h4" id="mySmallModalLabel">Terima permintaan</h5>
            <button type="button" class="btn btn-xs btn-icon btn-ghost-secondary" data-dismiss="modal" aria-label="Close">
              <i class="tio-clear tio-lg"></i>
            </button>
          </div>          
          <div class="modal-body">
            <form action="<?= site_url('admin/tolakPenyelenggara') ?>" method="POST">
              <input type="hidden" name="KODE_PENYELENGGARA" value="<?= $key->KODE_PENYELENGGARA ?>">
              <p>Tolak permintaan ini?</p>
              <div class="form-group">
                <label class="title">Sematkan pesan <small class="text-muted">(Optional)</small></label>
                <textarea class="form-control" rows="3" name="PESAN"></textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-sm btn-danger">Tolak</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- End terima Modal -->


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
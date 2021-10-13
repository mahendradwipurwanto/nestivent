<!-- Page Header -->
<div class="page-header">
  <div class="row align-items-end">
    <div class="col-sm mb-2 mb-sm-0">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-no-gutter">
          <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?= site_url('k-panel') ?>">Dashboard</a></li>
          <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Event</a></li>
          <li class="breadcrumb-item active" aria-current="page">Data event</li>
        </ol>
      </nav>

      <h1 class="page-header-title">Data event</h1>
    </div>

    <div class="col-sm-auto">
    </div>
  </div>
  <!-- End Row -->
</div>
<!-- End Page Header -->

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
    </div>
    <!-- End Row -->
  </div>
  <!-- End Header -->

  <!-- Table -->
  <div class="table-responsive datatable-custom">
    <table id="datatable" class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
    data-hs-datatables-options='{
      "columnDefs": [{
      "targets": [0, 4],
      "orderable": false
      }],
        "order": [],
        "info": {
        "totalQty": "#datatableWithPaginationInfoTotalQty"
      },
      "search": "#datatableSearch",
      "entries": "#datatableEntries",
      "pageLength": 10,
      "isResponsive": false,
      "isShowPaging": false,
      "pagination": "datatablePagination"
      }'>
      <thead class="thead-light">
        <tr>
          <th class="table-column-pr-0">No</th>
          <th></th>
          <th>JUDUL</th>
          <th>WAKTU</th>
          <th>STATUS</th>
        </tr>
      </thead>

      <tbody>
        <?php if ($event > 0): ?>
          <?php $no = 1; foreach ($event as $key): ?>
          <tr>
            <td class="table-column-pr-0"><?= $no++; ?></td>
            <td>
              <a class="btn btn-xs btn-white" href="<?= site_url('event/'.$key->KODE_EVENT);?>" target="_blank">
                <i class="tio-eye"></i> View
              </a>
              <a class="btn btn-xs btn-primary" href="<?= site_url('akses-event/'.$key->KODE_EVENT);?>">
                <i class="tio-edit"></i> Manage
              </a>
            </td>
            <td><?= $key->JUDUL ?></td>
            <td><?= date("d F Y", strtotime($key->TANGGAL)) ?></td>
            <td>
              <span class="badge badge-<?= $key->STATUS_EVENT == 0 ? 'secondary' : ($key->STATUS_EVENT == 1 ? 'success' : 'primary');?>"><?= $key->STATUS_EVENT == 0 ? 'belum dibuka' : ($key->STATUS_EVENT == 1 ? 'berlangsung' : 'berakhir');?></span>
            </td>
          </tr>
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
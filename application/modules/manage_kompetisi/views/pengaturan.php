<!-- Page Header -->
<div class="page-header">
  <div class="row align-items-end mb-3">
    <div class="col-sm">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-no-gutter">
          <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?= site_url('manage-kompetisi') ?>">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Pengaturan</li>
        </ol>
      </nav>

      <h1 class="page-header-title">Pengaturan</h1>
    </div>
  </div>
  <!-- End Row -->
</div>
<!-- End Page Header -->
<div class="row">
  <div class="col-md-8">
    <div class="row row-cols-1">

      <div class="col mb-3">
        <!-- Card -->
        <div class="card card-body">
          <div class="media align-items-md-center">
            <!-- Avatar -->
            <div class="avatar avatar-lg avatar-soft-warning avatar-circle avatar-border-lg mr-3">
              <span class="avatar-initials">I</span>
            </div>
            <!-- End Avatar -->

            <div class="media-body">
              <div class="row align-items-md-center">
                <div class="col-9 col-md-4 col-lg-3 mb-2 mb-md-0">
                  <h4 class="mb-1">
                    <a class="text-dark">Informasi Umum</a>
                  </h4>
                </div>

                <div class="col-sm mb-2 mb-sm-0">
                  <!-- Badges -->
                  <ul class="list-inline list-inline-m-1 mb-0">
                    <li class="list-inline-item"><a class="badge badge-soft-secondary p-2" href="#">info event</a></li>
                    <li class="list-inline-item"><a class="badge badge-soft-secondary p-2" href="#">contact person</a></li>
                    <li class="list-inline-item"><a class="badge badge-soft-secondary p-2" href="#">tiket</a></li>
                    <li class="list-inline-item"><a class="badge badge-soft-secondary p-2" href="#">social media</a></li>
                  </ul>
                  <!-- End Badges -->
                </div>

                <div class="col-sm-auto">
                  <a href="<?= site_url('manage-kompetisi/pengaturan-umum') ?>" class="btn btn-sm btn-light">manage</a>
                </div>
              </div>
              <!-- End Row -->
            </div>
          </div>
        </div>
        <!-- End Card -->
      </div>
    </div>
  </div>
  <div class="col-md-4">
    
  </div>
</div>
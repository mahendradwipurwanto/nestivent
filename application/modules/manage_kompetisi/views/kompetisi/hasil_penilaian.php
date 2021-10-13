<!-- Page Header -->
<div class="page-header">
  <div class="row align-items-end">
    <div class="col-sm mb-2 mb-sm-0">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-no-gutter">
          <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?= site_url('manage-kompetisi') ?>">Dashboard</a></li>
          <li class="breadcrumb-item">Penilaian</li>
          <li class="breadcrumb-item active" aria-current="page">Hasil Penilaian</li>
        </ol>
      </nav>

      <h1 class="page-header-title">Hasil Penilaian</h1>
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
      <div class="table-responsive">
        <table class="table table-borderless table-thead-bordered table-nowrap table-text-center table-align-middle card-table">
          <thead class="thead-light">
            <tr>
              <th scope="col" style="width: 2rem;">Rank</th>
              <th scope="col" class="text-left">Name</th>
              <th scope="col">Closed issues</th>
              <th scope="col">Completed projects</th>
              <th scope="col">Efficiency rate</th>
              <th scope="col">Hours</th>
              <th scope="col">Avg. Score</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td><span class="text-warning" style="font-size: 1.5rem;">🥇</span></td>
              <td class="text-left">
                <a class="d-flex align-items-center" href="user-profile.html">
                  <div class="avatar avatar-circle">
                    <img class="avatar-img" src="<?= base_url();?>assets/backend/img/160x160/img10.jpg" alt="Image Description">
                  </div>
                  <div class="ml-3">
                    <span class="d-block h5 text-hover-primary mb-0">Amanda Harvey</span>
                  </div>
                </a>
              </td>
              <td>20</td>
              <td>35</td>
              <td>
                <span class="badge badge-soft-success p-1">
                  <i class="tio-trending-up"></i> 1.5%
                </span>
              </td>
              <td>505</td>
              <td><i class="tio-star text-warning mr-1"></i> 4.97</td>
            </tr>

            <tr>
              <td><span class="text-secondary" style="font-size: 1.5rem;">🥈</span></td>
              <td class="text-left">
                <a class="d-flex align-items-center" href="user-profile.html">
                  <div class="avatar avatar-circle">
                    <img class="avatar-img" src="<?= base_url();?>assets/backend/img/160x160/img3.jpg" alt="Image Description">
                  </div>
                  <div class="ml-3">
                    <span class="d-block h5 text-hover-primary mb-0">David Harrison</span>
                  </div>
                </a>
              </td>
              <td>12</td>
              <td>54</td>
              <td>
                <span class="badge badge-soft-success p-1">
                  <i class="tio-trending-up"></i> 3.5%
                </span>
              </td>
              <td>467</td>
              <td><i class="tio-star text-warning mr-1"></i> 4.95</td>
            </tr>

            <tr>
              <td><span style="font-size: 1.5rem; color: #924b18;">🥉</span></td>
              <td class="text-left">
                <a class="d-flex align-items-center" href="user-profile.html">
                  <div class="avatar avatar-soft-info avatar-circle">
                    <span class="avatar-initials">L</span>
                  </div>
                  <div class="ml-3">
                    <span class="d-block h5 text-hover-primary mb-0">Lori Hunter</span>
                  </div>
                </a>
              </td>
              <td>62</td>
              <td>31</td>
              <td>
                <span class="badge badge-soft-danger p-1">
                  <i class="tio-trending-down"></i> 2.1%
                </span>
              </td>
              <td>460</td>
              <td><i class="tio-star text-warning mr-1"></i> 4.90</td>
            </tr>

            <tr>
              <td>4</td>
              <td class="text-left">
                <a class="d-flex align-items-center" href="user-profile.html">
                  <div class="avatar avatar-circle">
                    <img class="avatar-img" src="<?= base_url();?>assets/backend/img/160x160/img8.jpg" alt="Image Description">
                  </div>
                  <div class="ml-3">
                    <span class="d-block h5 text-hover-primary mb-0">Linda Bates</span>
                  </div>
                </a>
              </td>
              <td>0</td>
              <td>76</td>
              <td>
                <span class="badge badge-soft-success p-1">
                  <i class="tio-trending-up"></i> 9.6%
                </span>
              </td>
              <td>414</td>
              <td><i class="tio-star text-warning mr-1"></i> 4.52</td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- End Table -->
    </div>
  </div>
  <!-- End Tab Content -->
</div>
<!-- End Card -->
<!-- Page Header -->
<div class="page-header">
  <div class="row align-items-end mb-3">
    <div class="col-sm">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-no-gutter">
          <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?= site_url('manage-event') ?>">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Aktivitas Event Anda</li>
        </ol>
      </nav>

      <h1 class="page-header-title">Aktivitas Event Anda</h1>
    </div>
  </div>
  <!-- End Row -->
</div>
<!-- End Page Header -->

<div class="row justify-content-lg-center">
  <div class="col-lg-9">
    <!-- Alert -->
    <div class="alert alert-soft-dark mb-5 mb-lg-7" role="alert">
      <div class="media align-items-center">
        <img class="avatar avatar-xl mr-3" src="<?= base_url();?>assets/backend/svg/illustrations/yelling-reverse.svg" alt="Image Description">

        <div class="media-body">
          <h3 class="alert-heading mb-1">Aktivitas terbaru pada Event Anda!</h3>
          <p class="mb-0">Aktivitas terbaru yang terekam pada Event Anda.</p>
        </div>
      </div>
    </div>
    <!-- End Alert -->

    <!-- Step -->
    <ul class="step">
      <!-- End Step Item -->
      <?php if ($aktivitas == FALSE): ?>
        <!-- Step Item -->
        <li class="step-item">
          <center>Tidak ada aktivitas terbaru</center>
        </li>
        <!-- End Step Item -->
      <?php else: ?>
        <?php foreach ($aktivitas as $key): ?>
          <!-- Step Item -->
          <li class="step-item"><?php  ?>
            <div class="step-content-wrapper">

              <?php if ($CI->M_template->get_profil($key->SENDER) == FALSE): ?>
                <span class="step-icon step-icon-soft-dark"><?= substr($CI->M_kpanel->get_sender($key->SENDER), 0, 1)?></span>
              <?php else: ?>
                <div class="step-avatar">
                  <img class="step-avatar-img" src="<?= base_url() ?>berkas/pengguna/<?= $key->SENDER ?>/foto/<?= $CI->M_kpanel->get_profil($key->SENDER) ?>" alt="Image Description">
                </div>
              <?php endif; ?>

              <div class="step-content">
                <h5 class="mb-1"><?php $sender = explode(" ", $CI->M_kpanel->get_sender($key->SENDER)); echo $sender[0];?></h5>

                <p class="font-size-sm mb-1"><?= $key->MESSAGE ?></p>

                <small class="text-muted text-uppercase"><?= $CI->time_elapsed($key->CREATED_AT) ?></small>
              </div>
            </div>
          </li>
          <!-- End Step Item -->
        <?php endforeach; ?>
        <br>
        <br>
        <hr>
        <div class="row">
          <div class="col-md-12">
            <?= $this->pagination->create_links(); ?>
          </div>
        </div>
      <?php endif; ?>
    </ul>
    <!-- End Step -->
  </div>
</div>
<!-- End Row -->

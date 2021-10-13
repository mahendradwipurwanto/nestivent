<!-- Page Header -->
<div class="page-header">
  <div class="row align-items-end">
    <div class="col-sm mb-2 mb-sm-0">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-no-gutter">
          <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?= site_url('manage-event') ?>">Dashboard</a></li>
          <li class="breadcrumb-item">Pendaftaran</li>
          <li class="breadcrumb-item active" aria-current="page">Data peserta</li>
        </ol>
      </nav>

      <h1 class="page-header-title">Data Peserta</h1>
    </div>

    <div class="col-sm-auto">
    </div>
  </div>
  <!-- End Row -->
</div>
<!-- End Page Header -->

<!-- Card -->
<?php if ($cek_form == false):?>
<div class="alert alert-info shadow">
  <p class="mb-0"><b>PERINGATAN!!</b>Anda belum mengatur formulir pendaftaran!!, harap atur terlebih dahulu agar peserta dapat mulai mendaftarkan diri pada event anda.</p>
</div>
<?php else:?>
  <div class="card">
    <div class="card-body">
      <table id="myTable" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th></th>
            <th>NAMA</th>
            <?php foreach ($get_form as $key) :?>
              <th><?= $key->PERTANYAAN;?></th>
            <?php endforeach;?>
          </tr>
        </thead>
        <tbody>
          <?php if ($get_pendaftaran == false) :?>
            <td colspan="<?= 3+count($get_form);?>"><center>belum ada data pendaftaran</center></td>
          <?php else:?>
            <?php $no = 1; foreach ($get_pendaftaran as $data) :?>
              <tr>
                <td><?= $no++;?></td>
                <td></td>
                <td><?= $data->NAMA;?></td>
                <?php foreach ($get_form as $key) :?>
                  <td><?= $CI->get_formData($data->KODE_PENDAFTARAN, $key->ID_FORM);?></td>
                <?php endforeach;?>
              </tr>
            <?php endforeach;?>
          <?php endif;?>
        </tbody>
      </table>
    </div>
  </div>
<?php endif;?>
<!-- End Card -->
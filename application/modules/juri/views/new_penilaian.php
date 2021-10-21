<!-- Page Header -->
<div class="page-header mb-5 pb-0">
  <div class="row align-items-center">
    <div class="col-sm mb-2 mb-sm-0">
      <h1 class="page-header-title">Penilaian <?= $tahap != false ? '- Tahap '.$tahap->NAMA_TAHAP : '';?></h1>
    </div>

    <div class="col-sm-auto">
    </div>
  </div>
</div>
<!-- End Page Header -->

<?php if ($tahap == false):?>
  <!-- Card -->
  <div class="card mb-4">
    <div class="card-body">
      <div class="text-center space-1">
        <img class="avatar avatar-xl mb-3" src="<?= base_url();?>assets/backend/svg/illustrations/sorry.svg" alt="Image Description">
        <p class="card-text">Proses penilaian belum dimulai</p>
      </div>
      <!-- End Empty State -->
    </div>
  </div>
    <?php else:?>

<?php if ($tim->semua == $tim->sudah_nilai) :?>
    <div class="row mb-5">
      <div class="col-12">
  <!-- Alert -->
  <div class="alert alert-soft-dark mb-5" role="alert">
    <div class="media align-items-center">
      <img class="avatar avatar-xl mr-3" src="<?= base_url();?>assets/backend/svg/illustrations/yelling-reverse.svg" alt="Image Description">

      <div class="media-body">
        <h3 class="alert-heading mb-1">Penilaian selesai!</h3>
        <p class="mb-0">Terima kasih, anda telah menyelesaikan proses penilaian anda.</p>
      </div>
    </div>
  </div>
  <!-- End Alert -->
  </div>
  </div>
<?php endif;?>
      <div class="row mb-5">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-4">
                  <h5 class="card-header-title">Pilih TIM</h5>
                  <!-- Select2 -->
                  <select class="js-select2-custom custom-select" size="1" id="pick-tim" 
                  data-hs-select2-options='{
                  "placeholder": "Pilih TIM"
                }'>
                <option value="0">Pilih TIM</option>
                  <?php if ($daftar_tim != false):?>
                <optgroup label="belum dinilai">
                    <?php foreach ($daftar_tim as $key):?>
                      <option value="<?php echo $key->KODE_PENDAFTARAN;?>"><?php echo $key->NAMA_TIM;?></option>
                    <?php endforeach;?>
                </optgroup>
                  <?php endif;?>
                  <?php if ($daftar_timSudah != false):?>
                <optgroup label="sudah dinilai">
                    <?php foreach ($daftar_timSudah as $key):?>
                      <option value="<?php echo $key->KODE_PENDAFTARAN;?>"><?php echo $key->NAMA_TIM;?></option>
                    <?php endforeach;?>
                </optgroup>
                  <?php endif;?>
              </select>
              <!-- End Select2 -->
            </div>
            <div class="col-8" id="detail-karya">
              <h5 class="card-header-title">Detail Karya</h5>
              <table class="table table-borderless mb-0">
                <tr>
                  <td class="pl-0"><span class="text-body">harap pilih tim terlebih dahulu</span></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <div class="row">
      <div class="col-6">
        <div class="card" id="karya-tim">
          <div class="card-header">
            <h5 class="card-header-title">Karya Tim</h5>
          </div>
          <div class="card-body">
            <div class="alert alert-soft-secondary alert-dismissible fade show" role="alert">
              <strong>Perhatian!</strong> Harap matikan <strong>Internet Download Manager (IDM)</strong> untuk menghindari download secara otomatis.
            </div>
            <div class="text-center mt-lg-5 my-auto mx-lg-10">
              <img class="avatar avatar-xxl mb-3" src="<?= base_url();?>assets/backend/svg/illustrations/sorry.svg" alt="Image Description">
              <p class="card-text">Tidak ada data karya yang dapat ditampilkan. Harap pilih salah satu TIM terlebih dahulu.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card" id="lembar-penilaian">
          <div class="text-center mt-lg-5 my-auto mx-lg-10">
            <img class="avatar avatar-xxl mb-3" src="<?= base_url();?>assets/backend/svg/illustrations/sorry.svg" alt="Image Description">
            <p class="card-text">Harap pilih salah satu TIM terlebih dahulu.</p>
          </div>
        </div>
    </div>
  </div>
<script type="text/javascript">
  const formatter = new Intl.NumberFormat('en-US', {
   minimumFractionDigits: 2,      
   maximumFractionDigits: 2,
 });
</script>
<?php endif;?>

<script type="text/javascript">
  $(document).ready(function() {
    $('#pick-tim').change(function(e) {  
      var kode = $(this).val();
      $(".input-group-quantity-counter-control").val(1);
      $("#karya-tim").html(`<center class="mt-lg-10 my-auto mx-lg-10"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sedang memuat karya...</center></br></br></br>`)
      $("#lembar-penilaian").html(`<center class="mt-lg-10 my-auto mx-lg-10"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sedang memuat nilai...</center></br></br></br>`);;
      jQuery.ajax({
        url: "<?= base_url('juri/get_karyaTim/') ?>"+kode,
        type: "GET",
        success: function(data) {
          $("#karya-tim").html(data);
          $(".input-group-quantity-counter-control").val(1);
          $("#submit-nilai").prop("disabled", false);
        }
      });
      jQuery.ajax({
        url: "<?= base_url('juri/get_detailTim/') ?>"+kode,
        type: "GET",
        success: function(data) {
          $("#detail-karya").html(data);
        }
      });
      jQuery.ajax({
        url: "<?= base_url('juri/get_riwayatNilai/') ?>"+kode,
        type: "GET",
        success: function(data) {
          $("#lembar-penilaian").html(data);
          $(".input-group-quantity-counter-control").val(1);
        }
      });
      $("input[name='KODE_PENDAFTARAN']").val(kode);
      console.log(kode);
    });
  });
</script>
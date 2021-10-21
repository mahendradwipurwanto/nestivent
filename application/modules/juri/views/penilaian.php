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

  <?php elseif ($tim->semua == $tim->sudah_nilai) :?>
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
    <?php else:?>
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
                  <?php foreach ($daftar_tim as $key):?>
                    <option value="<?php echo $key->KODE_PENDAFTARAN;?>"><?php echo $key->NAMA_TIM;?></option>
                  <?php endforeach;?>
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

  <form action="<?= site_url('juri/submit_nilai');?>" method="POST" id="form-penilaian">
    <input type="hidden" name="KODE_PENDAFTARAN" value="0">
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
        <div class="card">
          <div class="card-header">
            <h5 class="card-header-title">Lembar Penilaian</h5>
            <button type="button" data-toggle="modal" data-target="#submit-nilai-done" id="submit-nilai" class="btn btn-success btn-xs float-right" disabled>submit nilai</button>
          </div>
          <div class="card-body">
            <div class="text-center mt-lg-5 my-auto mx-lg-10" id="belum-pilih">
              <img class="avatar avatar-xxl mb-3" src="<?= base_url();?>assets/backend/svg/illustrations/sorry.svg" alt="Image Description">
              <p class="card-text">Harap pilih salah satu TIM terlebih dahulu.</p>
            </div>
            <table class="table table-bordered d-none" id="tabel-nilai">
              <thead class="thead-light">
                <th width="2%">No</th>
                <th width="90%">Kriteria Penilaian</th>
                <th width="3%">Bobot</th>
                <th width="5%">Nilai</th>
              </thead>
              <tbody>
                <?php $no = 1; if($dataKriteria != false): foreach($dataKriteria as $kriteria):?>
                <tr>
                  <td <?= (!empty($kriteria->KETERANGAN) ? 'rowspan="2"' : '');?>>
                    <?= $no;?>
                  </td>
                  <td>
                    <input type="hidden" name="ID_KRITERIA[]" value="<?= $kriteria->ID_KRITERIA;?>">
                    <?= $kriteria->KRITERIA;?>
                  </td>
                  <td <?= (!empty($kriteria->KETERANGAN) ? 'rowspan="2"' : '');?>>
                    <input type="hidden" name="BOBOT[]" value="<?= $kriteria->BOBOT;?>" id="bobot-<?= $no;?>">
                    <?= $kriteria->BOBOT;?>%
                  </td>
                  <td <?= (!empty($kriteria->KETERANGAN) ? 'rowspan="2"' : '');?>>
                    <!-- Quantity Counter -->
                    <div class="js-quantity-counter input-group-quantity-counter">
                      <input type="hidden" name="NILAI_OLAH[]" id="nilai-olah-<?= $no;?>" value="<?= (($kriteria->BOBOT/100)*1);?>">
                      <input type="number" name="NILAI[]" class="counter-<?=$no;?> form-control input-group-quantity-counter-control" value="1" min="1" max="5">

                      <div class="input-group-quantity-counter-toggle">
                        <a class="decrement-<?=$no;?> input-group-quantity-counter-btn" href="javascript:;">
                          <i class="tio-remove"></i>
                        </a>
                        <a class="increment-<?=$no;?> input-group-quantity-counter-btn" href="javascript:;">
                          <i class="tio-add"></i>
                        </a>
                      </div>
                    </div>
                    <!-- End Quantity Counter -->
                  </td>
                </tr>
                <?php if (!empty($kriteria->KETERANGAN)):?>
                  <tr>
                    <td><?= $kriteria->KETERANGAN;?></td>
                  </tr>
                <?php endif;?>
                <script type="text/javascript">
                  var value<?=$no;?> = 1
                  var bobot = $('#bobot-'+<?= $no;?>).val();
                  var nilai_akhir = 1;
                  $('.increment-'+<?=$no;?>).on("click", function() {
                    if(value<?=$no;?> > 0 && value<?=$no;?> <5){
                      value<?=$no;?> = parseInt(value<?=$no;?>+1);
                      $(".counter-"+<?=$no;?>).val(value<?=$no;?>);
                      nilai_akhir = (bobot*value<?=$no;?>/100);
                      $("#nilai-olah-"+<?=$no;?>).val(formatter.format(nilai_akhir));
                    }
                  });
                  $('.decrement-'+<?=$no;?>).on("click", function(){
                    if(value<?=$no;?> > 1){
                      value<?=$no;?> = parseInt(value<?=$no;?>-1);
                      $(".counter-"+<?=$no;?>).val(value<?=$no;?>);
                      nilai_akhir = bobot*value<?=$no;?>/100;
                      $("#nilai-olah-"+<?=$no;?>).val(formatter.format(nilai_akhir));
                    }else{
                      value<?=$no;?> = 1;
                      $(".counter-"+<?=$no;?>).val(value<?=$no;?>);
                      nilai_akhir = bobot*value<?=$no;?>/100;
                      $("#nilai-olah-"+<?=$no;?>).val(formatter.format(nilai_akhir));
                    }
                  });
                </script>
              <?php $no++;endforeach; endif;?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="modal fade" id="submit-nilai-done" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Kirim nilai anda</h5>
              <button type="button" class="btn btn-xs btn-icon btn-soft-secondary" data-dismiss="modal" aria-label="Close">
                <svg aria-hidden="true" width="10" height="10" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                  <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z"/>
                </svg>
              </button>
            </div>
            <div class="modal-body">
              <p>Yakin kirim hasil penilaian anda terhadap tim ini, dengan total nilai <b id="total_nilai">1</b> ?</p>
              <div class="modal-footer px-0 pb-0">
                <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success btn-sm">Yakin dan kirim</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
<script type="text/javascript">
  $("#karya-tim-tab").click(function() {
    $("#karya").removeClass('d-none');
    $("#lembar").addClass('d-none');
  });
  $("#lembar-penilaian-tab").click(function() {
    $("#karya").addClass('d-none');
    $("#lembar").removeClass('d-none');
  });
  $(".input-group-quantity-counter-control").on('keydown keyup change', function(e){
    if ($(this).val() > 5 && $(this).val() > 0
            && e.keyCode !== 46 // keycode for delete
            && e.keyCode !== 8 // keycode for backspace
            ) {
     e.preventDefault();
   $(this).val(5);
 }
});
  const formatter = new Intl.NumberFormat('en-US', {
   minimumFractionDigits: 2,      
   maximumFractionDigits: 2,
 });

  $('#submit-nilai').click(function() {
    $("#total_nilai").html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Menghitung...`);
    jQuery.ajax({
      url: '<?= site_url('juri/count_totalNilai')?>',
      data: $('#form-penilaian').serialize(),
      method: 'post',
      dataType: 'json',
      success: function(data) {
        $("#total_nilai").html(formatter.format(data));
      }
    });
  });
</script>
<?php endif;?>

<script type="text/javascript">
  $(document).ready(function() {
    $('#pick-tim').change(function(e) {  
      var kode = $(this).val();
      $(".input-group-quantity-counter-control").val(1);
      $("input[name='KODE_PENDAFTARAN']").val(kode);
      $("#karya-tim").html(`<center class="mt-lg-10 my-auto mx-lg-10"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sedang memuat karya...</center></br></br></br>`);
      jQuery.ajax({
        url: "<?= base_url('juri/get_karyaTim/') ?>"+kode,
        type: "GET",
        success: function(data) {
          $("#karya-tim").html(data);
          $(".input-group-quantity-counter-control").val(1);;
          $("#belum-pilih").addClass('d-none');
          $("#tabel-nilai").removeClass('d-none');
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
      console.log(kode);
    });
  });
</script>
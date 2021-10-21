  <form action="<?= site_url('juri/submit_nilai');?>" method="POST" id="form-penilaian">
          <input type="hidden" name="KODE_PENDAFTARAN" value="<?= $KODE_PENDAFTARAN;?>">
          <div class="card-header">
            <h5 class="card-header-title">Lembar Penilaian</h5>
            <button type="button" data-toggle="modal" data-target="#submit-nilai-done" id="submit-nilai" class="btn btn-success btn-xs float-right">submit nilai</button>
          </div>
          <div class="card-body">
            <table class="table table-bordered" id="tabel-nilai">
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
</form>

<script type="text/javascript">
  $(".input-group-quantity-counter-control").on('keydown keyup change', function(e){
    if ($(this).val() > 5 
          && e.keyCode !== 46 // keycode for delete
          && e.keyCode !== 8 // keycode for backspace
          ) {
      e.preventDefault();
    $(this).val(5);
  }
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
<!-- Upload Form Section -->
<div class="container space-top-1 space-bottom-3">
	<div class="w-lg-75 mx-lg-auto">
		<!-- Title -->
		<div class="text-center mb-9">
			<h1 class="h2">Pendaftaran kompetisi <?= $WEB_JUDUL;?></h1>
			<p class="mb-0">Lengkapi data diri berikut dengan sebenar-benarnya.</p>
		</div>
		<!-- End Title -->
		<form action="<?= site_url('pendaftaran/prosesPendaftaranKompetisi');?>" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="KODE_KEGIATAN" value="<?= $KODE_KEGIATAN;?>">

			<div class="card card-frame card-body mb-4">
				<p class="font-size-1">Pendaftaran lomba ini menggunakan akun <?= $this->session->userdata('nama');?> -  <?= $this->session->userdata('email');?> sebagai KETUA TIM, <a href="<?= site_url('logout');?>">ganti akun?</a></p>
			</div>

      <?php if($kegiatan->BAYAR != 0):?>
      <div class="card card-frame card-body mb-4">
        <label class="input-label">Pilih jenis tiket anda <span class="text-danger">*</span></label>

        <!-- Radio Checkbox Group -->
        <div class="row center-flext">
          <?php $no=1; foreach ($CI->M_daftar->get_kegiatanTiket($KODE_KEGIATAN) as $key) :?>
          <div class="col-6 col-md-3 px-2 mb-3">
            <div
              class="custom-control custom-radio custom-control-inline checkbox-outline checkbox-icon text-center w-100 h-100">
              <input type="radio" id="radioLombaTiket<?= $no;?>" name="ID_TIKET" value="<?= $key->ID_TIKET;?>"
                class="custom-control-input checkbox-outline-input checkbox-icon-input" required>
              <label class="checkbox-outline-label checkbox-icon-label w-100 rounded py-3 px-1 mb-0"
                for="radioLombaTiket<?= $no;?>">
                <span class="d-block text-primary font-weight-bold"><?= $key->NAMA_TIKET;?></span>
                <img class="img-fluid w-50 mb-3"
                  src="<?= base_url();?>assets/frontend/svg/illustrations/discussion-scene.svg" alt="SVG">
                <span class="d-block">Rp.<?= number_format($key->HARGA_TIKET,0,",",".");?></span>
              </label>
            </div>
          </div>
          <?php $no++; endforeach;?>
        </div>
      </div>
      <?php endif;?>

			<div class="card card-frame card-body mb-4">
				<label class="input-label">Pilih bidang lomba yang diikuti <span class="text-danger">*</span></label>

				<!-- Radio Checkbox Group -->
				<div class="row center-flext">
					<?php $no=1; foreach ($bidang_lomba as $lomba) :?>
					<div class="col-6 col-md-3 px-2 mb-3">
						<div class="custom-control custom-radio custom-control-inline checkbox-outline checkbox-icon text-center w-100 h-100">
							<input type="radio" id="radioLomba<?= $no;?>" name="BIDANG_LOMBA" value="<?= $lomba->ID_BIDANG;?>" class="custom-control-input checkbox-outline-input checkbox-icon-input" required>
							<label class="checkbox-outline-label checkbox-icon-label w-100 rounded py-3 px-1 mb-0" for="radioLomba<?= $no;?>">
								<img class="img-fluid w-50 mb-3" src="<?= base_url();?><?= $lomba->POSTER == null ? 'assets/frontend/svg/illustrations/discussion-scene.svg' : 'berkas/kompetisi/bidang-lomba/'.$lomba->POSTER;?>" alt="SVG">
								<span class="d-block"><?= $lomba->BIDANG_LOMBA;?></span>
							</label>
						</div>
					</div>
					<?php $no++; endforeach;?>
				</div>
				<!-- End Radio Checkbox Group -->
				<div id="ketentuan">
				</div>

				<?php foreach ($bidang_lomba as $lomba) :?>
					<!-- MODAL -->
					<div class="modal fade" id="syaratlomba<?= $lomba->ID_BIDANG;?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="data-anggotaLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="data-anggotaLabel">Syarat dan ketentuan lomba <?= $lomba->BIDANG_LOMBA;?></h5>
									<button type="button" class="btn btn-xs btn-icon btn-soft-secondary" data-dismiss="modal" aria-label="Close">
										<svg aria-hidden="true" width="10" height="10" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
											<path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z"/>
										</svg>
									</button>
								</div>
								<div class="modal-body">
									<p><?= $lomba->KETERANGAN;?></p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-white btn-sm" data-dismiss="modal">Tutup</button>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach;?>
			</div>

			<div class="card card-frame card-body mb-4">
				<div class="form-group">
					<label class="input-label">Nama TIM<span class="text-danger">*</span></label>
					<input type="text" name="NAMA_TIM" class="form-control form-control-sm form-control-flush" placeholder="Masukkan nama tim anda" required>
				</div>
				<!-- Form Group -->
				<div class="form-group">
					<label class="input-label" for="signinSrNama">Nama PTS <span class="text-danger">*</span></label>
					<select name="ASAL_PTS" id="select-pts" class="custom-select custom-select-flush" data-select="listPts" size="1" style="width: 100%;"
					data-hs-select2-options='{
					"placeholder": "Pilih PTS"
				}' required>
			</select>
		</div>
		<!-- End Form Group -->
		<div class="form-group">
			<label class="input-label">Alamat PTS<span class="text-danger">*</span></label>
			<textarea type="text" name="ALAMAT_PTS" class="form-control form-control-sm form-control-flush" placeholder="Masukkan alamat pts anda" required></textarea>
		</div>
	</div>

	<!-- Divider -->
	<hr class="my-0 mb-4">
	<!-- End Divider -->


	<button class="btn btn-sm btn-primary float-right" id="send-button">Daftar</button>
</form>
</div>
</div>
<script>
    $('form').submit(function(event) {
        $('#send-button').prop("disabled", true);
        // add spinner to button
        $('#send-button').html(
            `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
        );
    });
</script>
<script type="text/javascript">
	$('#select-pts').select2({
		ajax: {
			url: '<?= site_url('ajx-data-pts-all')?>',
			dataType: 'json',
			method: 'post',
			data: params => {
				console.log(params)
				var query = {
					search: params.term,
					type: 'public'
				}
				return query;
			},
			processResults: data => {
				let arrData = [];
				for(x of data){
					temp = {id: x.kodept, text: x.namapt}
					arrData.push(temp)
				}
				return {results: arrData}
			}
		},
		placeholder: "Pilih PTS",
    // selectionCssClass: 'selectcss-custom'
});


        // check radio ewaller
        $("input[name='BIDANG_LOMBA']").on('change', function() {
            // show or hide alert
            var method = $('input[name=BIDANG_LOMBA]:checked').val();
            $('#ketentuan').html('<span class="text-primary cursor" data-toggle="modal" data-target="#syaratlomba'+method+'">Syarat dan ketentuan lomba</span>');



        });
    </script>
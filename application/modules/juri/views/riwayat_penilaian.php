<!-- Page Header -->
<div class="page-header mb-5 pb-0">
  <div class="row align-items-end">
    <div class="col-sm mb-2 mb-sm-0">
      <div class="d-flex justify-content-between">
        <h1 class="page-header-title mt-3 mb-3">Riwayat Penilaian - Tahap <span class="badge badge-primary"><?= $tahap_penilaian ?></span></h1>
        <div class="d-flex">
          <div class="dropdown mt-2">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php if ($id_tahap == 0) :?>
                Tahap Penilaian
              <?php else:?>
                <?= $tahap_penilaian ?>
              <?php endif;?>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="<?= site_url('juri/riwayat-penilaian/') ?>">Pilih Tahap</a>
              <?php foreach ($tahap as $row) { ?>
                <a class="dropdown-item" href="<?= site_url('juri/riwayat-penilaian/' . $row->ID_TAHAP) ?>"><?= $row->NAMA_TAHAP ?></a>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-auto">
    </div>
  </div>
  <!-- End Row -->
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

	<div class="row">
		<div class="col-3">
			<div class="card mb-4">
				<div class="card-header">
					<h5 class="card-header-title">Pilih TIM - 
		              <?php if ($id_tahap == 0) :?>
		                Tahap Penilaian
		              <?php else:?>
		                <?= $tahap_penilaian ?>
		              <?php endif;?>
              		</h5>
				</div>
				<div class="card-body p-0 overflow-auto w-100" style="max-height: 400px;">
					<table class="table">
						<?php if ($daftar_tim != false):?>
							<?php $no=1;foreach ($daftar_tim as $key):?>
								<tr class="text-body btn-tim" id="btn-<?= $key->KODE_PENDAFTARAN;?>">
									<td width="5%" class="pr-0">
										<?= $no++;?>. 
									</td>
									<td width="95%">
										<div class="text-none cursor pick-tim" id="<?= $key->KODE_PENDAFTARAN;?>">
											<div class="card-body text-right p-0">
												<span class="float-left"><?php echo $key->NAMA_TIM;?></span> <i class="tio-checkmark-circle-outlined text-white"></i>
											</div>
										</div>
									</td>
								</tr>
							<?php endforeach;?>

						<?php else:?>
							<tr class="text-body">
								<td width="100%">
									<div class="text-none cursor">
										<div class="card-body text-center p-0">
											belum ada TIM
										</div>
									</div>
								</td>
							</tr>
						<?php endif;?>
					</table>
				</div>
			</div>
		</div>
		<div class="col-9">
			<div class="card mb-4">
				<div class="card-header">
					<h5 class="card-header-title" id="lembar">Lembar Penilaian</h5>
					<div class="text-right">
						<ul class="nav nav-segment" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="lembar-penilaian-tab" data-toggle="pill" href="##lembar-penilaian" role="tab" aria-controls="lembar-penilaian" aria-selected="false">Lembar Penilaian</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="card-body">

					<!-- Tab Content -->
					<div class="tab-content">
						<div class="tab-pane fade show active" style="min-height: 250px" id="lembar-penilaian" role="tabpanel" aria-labelledby="lembar-penilaian-tab">
							<div class="text-center mt-lg-5 my-auto mx-lg-10">
								<img class="avatar avatar-xxl mb-3" src="<?= base_url();?>assets/backend/svg/illustrations/sorry.svg" alt="Image Description">
								<p class="card-text">Tidak ada data penilaian yang dapat ditampilkan. Harap pilih salah satu TIM terlebih dahulu.</p>
							</div>
						</div>
					</div>
					<!-- End Tab Content -->
				</div>
			</div>
			<div class="mb-4">
				<!-- End Nav -->
			</div>
		</div>
	</div>
<?php endif;?>

<script type="text/javascript">
	$(document).ready(function() {
	    $('.pick-tim').click(function(e) {  
		    var kode = $(this).attr('id');
			$(".btn-tim").removeClass('bg-primary');
			$(".btn-tim").removeClass('text-white');
			$("input[name='KODE_PENDAFTARAN']").val(kode);
		    $("#lembar-penilaian").html(`<center class="mt-lg-10 my-auto mx-lg-10"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sedang memuat nilai...</center>`);
			jQuery.ajax({
	            url: "<?= base_url('juri/get_riwayatNilai/') ?>"+kode,
	            type: "GET",
	            success: function(data) {
                    $("#lembar-penilaian").html(data);
					$("#btn-"+kode).removeClass('text-body');
					$("#btn-"+kode).addClass('text-white');
					$("#btn-"+kode).addClass('bg-primary');
					$(".input-group-quantity-counter-control").val(1);
	            }
            });
            console.log(kode);
	    });
	});
</script>
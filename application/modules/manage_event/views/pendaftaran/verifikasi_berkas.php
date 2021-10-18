<!-- Page Header -->
<div class="page-header">
	<div class="row align-items-end">
		<div class="col-sm mb-2 mb-sm-0">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb breadcrumb-no-gutter">
					<li class="breadcrumb-item"><a class="breadcrumb-link" href="<?= site_url('manage-event') ?>">Dashboard</a>
					</li>
					<li class="breadcrumb-item">Pendaftaran</li>
					<li class="breadcrumb-item active" aria-current="page">Verifikasi berkas</li>
				</ol>
			</nav>

			<h1 class="page-header-title">Verifikasi Berkas</h1>
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
	<p class="mb-0"><b>PERINGATAN!!</b>Anda belum mengatur formulir pendaftaran!!, harap atur terlebih dahulu agar peserta
		dapat mulai mendaftarkan diri pada event anda.</p>
</div>
<?php else:?>
<div class="card">
	<div class="card-body">
		<table id="myTable" class="table table-bordered table-hover w-100">
			<thead>
				<tr>
					<th>No</th>
					<th></th>
					<th>Status</th>
					<th>NAMA</th>
					<?php if($event->BAYAR == 1):?>
					<th>Bukti bayar</th>
					<?php endif;?>
					<?php foreach ($get_form as $key) :?>
					<th><?= $key->PERTANYAAN;?></th>
					<?php endforeach;?>
				</tr>
			</thead>
			<tbody>
				<?php if ($get_pendaftaran == false) :?>
				<td colspan="<?= 3+count($get_form);?>">
					<center>belum ada data pendaftaran</center>
				</td>
				<?php else:?>
				<?php $no = 1; foreach ($get_pendaftaran as $data) :?>
				<tr>
					<td><?= $no++;?></td>
					<td>
						<?php if ($data->STATUS == 0) : ?>
						<button type="button" class="btn btn-xs btn-success" title="Setujui Berkas" data-toggle="modal"
							data-target="#verif<?= $no; ?>"><i class="tio-done"></i></button>
						<button type="button" class="btn btn-xs btn-danger" title="Tolak Berkas" data-toggle="modal"
							data-target="#tolak<?= $no; ?>"><i class="tio-clear"></i></button>
						<?php elseif ($data->STATUS == 1) : ?>
						<button type="button" class="btn btn-xs btn-danger" title="Tolak Berkas" data-toggle="modal"
							data-target="#tolak<?= $no; ?>"><i class="tio-clear"></i></button>
						<?php elseif ($data->STATUS == 2) : ?>
						<button type="button" class="btn btn-xs btn-success" title="Setujui Berkas" data-toggle="modal"
							data-target="#verif<?= $no; ?>"><i class="tio-done"></i></button>
						<?php endif; ?>
					</td>
					<td>
						<?php switch ($data->STATUS) {
              case 0:
                  echo '<span class="badge badge-secondary">Menunggu proses verifikasi</span>';
                  break;

              case 1:
                  echo '<span class="badge badge-success">Berkas telah diverifikasi</span>';
                  break;

              case 2:
                  echo '<span class="badge badge-danger">Berkas ditolak</span>';
                  break;

              case 3:
                  echo '<span class="badge badge-warning">Masuk ke babak Final</span>';
                  break;

              default:
                  echo '<span class="badge badge-secondary">Menunggu proses verifikasi</span>';
                  break;
          }; ?>

					</td>
					<td><?= $data->NAMA;?></td>
					<?php if($event->BAYAR == 1):?>
					<td>
						<?php if($data->BUKTI_BAYAR == null):?>
						<button type="button" class="btn btn-xs btn-soft-danger" title="Belum Melengkapi" disabled><i
								class="tio-open-in-new"></i> Belum Ada</button>
						<?php else:?>
						<button type="button" class="btn btn-xs btn-primary" title="Cek bukti" data-toggle="modal"
							data-target="#buktibayar<?= $no?>"><i class="tio-open-in-new"></i> Cek bukti</button>
						<?php endif;?>
					</td>
					<?php endif;?>
					<?php $i = 1; foreach ($get_form as $key) :?>
					<td>
						<?php if ($controller->M_manage->get_formData($data->KODE_PENDAFTARAN, $key->ID_FORM) == false) : ?>
						<button type="button" id="btn-surat<?= $key->ID_FORM ?>" class="btn btn-xs btn-soft-danger"
							title="Belum Melengkapi" disabled><i class="tio-open-in-new" data-toggle="modal"
								data-target="#modalsurat<?= $key->ID_FORM . $data->KODE_PENDAFTARAN ?>"></i> Belum Ada</button>
						<?php else : ?>
						<a class="btn btn-xs btn-primary" id="btn-surat<?= $key->ID_FORM . $data->KODE_PENDAFTARAN ?>"
							title="Cek berkas" data-toggle="modal"
							data-target="#modalsurat<?= $key->ID_FORM . $data->KODE_PENDAFTARAN ?>"><i class="tio-open-in-new"></i>
							Cek Berkas</a>
						<?php endif; ?>
					</td>
					<!-- Modal Cek Berkas-->
					<div class="modal fade" id="buktibayar<?= $no ?>" tabindex="-1" role="dialog"
						aria-labelledby="modelTitleId" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h3 class="modal-title">Bukti bayar - <?= $data->NAMA ?></h3>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="d-flex justify-content-between mb-3">
										<span class="font-weight-bold h4">Harga tiket Rp.<?= $controller->M_manage->cek_hargaTiket($data->ID_TIKET);?></span>
										<a target="_blank" id="" class="btn btn-primary btn-xs"
											href="<?= base_url();?>berkas/pendaftaran/<?= $data->KODE_USER;?>/event/<?= $this->session->userdata('manage_event');?>/<?= $data->BUKTI_BAYAR;?>"
											role=" button"><i class="tio-open-in-new"></i> Buka di tab baru</a>
									</div>
									<div class="responsive-iframe">
										<img
											src="<?= base_url();?>berkas/pendaftaran/<?= $data->KODE_USER;?>/event/<?= $this->session->userdata('manage_event');?>/<?= $data->BUKTI_BAYAR;?>"
											class="w-100">
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Get anggota -->
					<!-- Modal Cek Berkas-->
					<div class="modal fade modal-fullscreen" id="modalsurat<?= $key->ID_FORM . $data->KODE_PENDAFTARAN ?>"
						tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
						<div class="modal-dialog modal-xl" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h3 class="modal-title"><?= $key->PERTANYAAN; ?> - <?= $data->NAMA ?></h3>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<div id="file_surat<?= $key->ID_FORM . $data->KODE_PENDAFTARAN ?>"></div>
								</div>
							</div>
						</div>
					</div>
					<!-- Get anggota -->
					<script>
						$("#btn-surat<?= $key->ID_FORM . $data->KODE_PENDAFTARAN ?>").click(function () {
							if ($(".surat_exists<?= $key->ID_FORM . $data->KODE_PENDAFTARAN ?>")[0]) {
								// Do something if class exists
							} else {
								// Do something if class does not exist
								$("#file_surat<?= $key->ID_FORM . $data->KODE_PENDAFTARAN ?>").html(
									`<center><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sedang memuat ...</center>`
								);
								$("#file_surat<?= $key->ID_FORM . $data->KODE_PENDAFTARAN ?>").addClass(
									'surat_exists<?= $key->ID_FORM . $data->KODE_PENDAFTARAN ?>');
								jQuery.ajax({
									url: "<?= base_url('Manage_event/tampil_surat/' . $data->KODE_PENDAFTARAN . '/' . $key->ID_FORM) ?>",
									type: "GET",
									success: function (data) {
										$("#file_surat<?= $key->ID_FORM . $data->KODE_PENDAFTARAN ?>").html(data);
									}
								});
							}
						});

					</script>
					<?php $i++;endforeach;?>
				</tr>

				<!-- Modal Verif Berkas -->
				<div class="modal fade" id="verif<?= $no; ?>" tabindex="-1" role="dialog" aria-labelledby="detailUserModalTitle"
					aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
						<div class="modal-content">
							<!-- Header -->
							<div class="modal-header">
								<h4 id="detailUserModalTitle" class="modal-title">Verifikasi berkas peserta</h4>
							</div>
							<!-- End Header -->

							<!-- Body -->
							<div class="modal-body">
								<div class="alert alert-soft-warning" role="alert">
									Pastikan berkas-berkas peserta telah sesuai.
								</div>
								<p class="mb-0">Apakah yakin untuk verifikasi berkas <b><?= $data->NAMA; ?></b>?</p>
							</div>

							<!-- Body -->
							<div class="modal-footer">
								<form action="<?= site_url('Manage_event/terima_pendaftaranEvent'); ?>" method="post">
									<input type="hidden" name="KODE_USER" value="<?= $data->KODE_USER; ?>">
									<input type="hidden" name="NAMA" value="<?= $data->NAMA; ?>">
									<button type="button" class="btn btn-sm btn-light" data-dismiss="modal"
										aria-label="Close">Batal</button>
									<button type="submit" class="btn btn-sm btn-success">Verifikasi</button>
								</form>
							</div>
						</div>
					</div>
				</div>

				<!-- Modal Total Berkas -->
				<div class="modal fade" id="tolak<?= $no; ?>" tabindex="-1" role="dialog" aria-labelledby="detailUserModalTitle"
					aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
						<div class="modal-content">
							<!-- Header -->
							<div class="modal-header">
								<h4 id="detailUserModalTitle" class="modal-title">Tolak berkas peserta</h4>
							</div>
							<!-- End Header -->

							<!-- Body -->
							<div class="modal-body">
								<p class="mb-0">Tolak berkas, <b><?= $data->NAMA; ?></b></p>
								<hr class="my-1">
								<p class="mb-0">Hubungi peserta ini, untuk konfirmasi berkas sebelum menolak pendaftaran ini?
									<a href="https://api.whatsapp.com/send?text=Hai&phone=+62<?= $data->HP; ?>" target="_blank"
										class="text-success"><i class="tio-whatsapp"></i> hubungi sekarang</a>
								</p>
							</div>

							<!-- Body -->
							<div class="modal-footer">
								<form action="<?= site_url('Manage_event/tolak_pendaftaranEvent'); ?>" method="post">
									<input type="hidden" name="KODE_USER" value="<?= $data->KODE_USER; ?>">
									<input type="hidden" name="NAMA" value="<?= $data->NAMA; ?>">
									<button type="button" class="btn btn-sm btn-light" data-dismiss="modal"
										aria-label="Close">Batal</button>
									<button type="submit" class="btn btn-sm btn-danger">Tolak</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach;?>
				<?php endif;?>
			</tbody>
		</table>
	</div>
</div>
<?php endif;?>
<!-- End Card -->

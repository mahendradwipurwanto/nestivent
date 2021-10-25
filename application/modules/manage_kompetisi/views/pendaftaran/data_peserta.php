<!-- Page Header -->
<div class="page-header">
	<div class="row align-items-end">
		<div class="col-sm mb-2 mb-sm-0">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb breadcrumb-no-gutter">
					<li class="breadcrumb-item"><a class="breadcrumb-link"
							href="<?= site_url('manage-kompetisi') ?>">dashboard</a></li>
					<li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Peserta</a></li>
					<li class="breadcrumb-item active" aria-current="page">Data Peserta</li>
				</ol>
			</nav>
			<div class="d-flex justify-content-between">
				<h1 class="page-header-title mt-3 mb-3">Data Peserta - Bidang Lomba <span
						class="badge badge-primary"><?= $bidang_lomba ?></span></h1>
				<div class="dropdown mt-2">
					<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
						aria-haspopup="true" aria-expanded="false">
						Bidang Lomba
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" href="<?= base_url('manage-kompetisi/data-peserta/') ?>">Semua Lomba</a>
						<?php foreach ($all_bidang_lomba as $row) { ?>
						<a class="dropdown-item"
							href="<?= base_url('manage-kompetisi/data-peserta/' . $row->ID_BIDANG) ?>"><?= $row->BIDANG_LOMBA ?></a>
						<?php } ?>
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

<!-- Stats -->
<div class="row gx-2 gx-lg-3">
	<div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
		<!-- Card -->
		<div class="card h-100">
			<div class="card-body">
				<h6 class="card-subtitle mb-2">Total TIM</h6>

				<div class="row align-items-center gx-2">
					<div class="col">
						<span class="js-counter display-4 text-dark"><?= number_format($jmlTim->JML_TIM,0,",",".")?></span>
					</div>
				</div>
				<!-- End Row -->
			</div>
		</div>
		<!-- End Card -->
	</div>

	<div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
		<!-- Card -->
		<div class="card h-100">
			<div class="card-body">
				<h6 class="card-subtitle mb-2">Total Peserta</h6>

				<div class="row align-items-center gx-2">
					<div class="col">
						<span class="js-counter display-4 text-dark"><?= number_format($jmlMhs->JML_MHS,0,",",".")?></span>
					</div>
				</div>
				<!-- End Row -->
			</div>
		</div>
		<!-- End Card -->
	</div>

	<div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
		<!-- Card -->
		<div class="card h-100">
			<div class="card-body">
				<h6 class="card-subtitle mb-2">Total PTS</h6>

				<div class="row align-items-center gx-2">
					<div class="col">
						<span class="js-counter display-4 text-dark"><?= number_format($jmlPTS,0,",",".")?></span>
					</div>
				</div>
				<!-- End Row -->
			</div>
		</div>
		<!-- End Card -->
	</div>

</div>
<!-- End Stats -->

<!-- Card -->
<div class="card">
	<!-- Table -->
	<div class="card-body">
		<div class="table-responsive">
			<table id="myTable" class="table table-stripped table-nowrap table-align-middle table-hover" width="100%">
				<thead class="thead-light">
					<tr>
						<th class="table-column-pr-0">No</th>
						<th class="table-column-pl-0">Nama TIM</th>
						<th>Asal PTS</th>
						<th>Status</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					<?php if ($peserta != false): ?>
					<?php $no = 1; foreach ($peserta as $key): ?>
					<tr>
						<td class="table-column-pr-0"><?= $no++; ?></td>
						<td class="table-column-pl-0">
							<a class="d-flex align-items-center" href="mailto:<?= $key->EMAIL ?>">
								<div class="ml-3">
									<span class="d-block h5 text-hover-primary mb-0"><?= $key->NAMA_TIM ?></span>
									<span class="d-block font-size-sm text-body"><?= $key->EMAIL ?></span>
								</div>
							</a>
						</td>
						<td><?= $CI->M_manage->get_pesertaPendaftaran($key->KODE_USER)->namapt;?></td>
						<td>
							<?php if ($CI->M_manage->get_pesertaPendaftaran($key->KODE_USER) == false) :?>
							<span class="btn btn-sm btn-secondary">Belum mendaftarkan diri di kompetisi</span>
							<?php else:?>
							<?php if($kegiatan->BAYAR == 1):?>
							<?php if($CI->M_manage->cek_pembayaranPeserta($key->KODE_PENDAFTARAN) != false):?>

							<?php if($CI->M_manage->cek_pembayaranPeserta($key->KODE_PENDAFTARAN)->STAT_BAYAR == 0):?>
							<span class="btn btn-sm btn-secondary">Pembayaran menunggu verifikasi</span>
							<?php elseif($CI->M_manage->cek_pembayaranPeserta($key->KODE_PENDAFTARAN)->STAT_BAYAR == 1):?>
							<?php switch ($CI->M_manage->get_pesertaPendaftaran($key->KODE_USER)->STATUS) {
                      case 0:
                        echo '<span class="btn btn-sm btn-secondary">Menunggu verifikasi berkas</span>';
                        break;

                      case 1:
                        echo '<span class="btn btn-sm btn-success">Berkas telah diverifikasi</span>';
                        break;

                      case 2:
                        echo '<span class="btn btn-sm btn-danger">Berkas ditolak</span>';
                        break;

                      case 3:
                        echo '<span class="btn btn-sm btn-warning">Masuk ke babak Final</span>';
                        break;
                      
                      default:
                        echo '<span class="btn btn-sm btn-secondary">Menunggu verifikasi berkas</span>';
                        break;
                    };?>
							<?php elseif($CI->M_manage->cek_pembayaranPeserta($key->KODE_PENDAFTARAN)->STAT_BAYAR == 2):?>
							<span class="btn btn-sm btn-danger">Pembayaran ditolak</span>
							<?php endif;?>
							<?php else:?>
							<span class="btn btn-sm btn-danger">Belum melakukan pembayaran</span>
							<?php endif;?>
							<?php else:?>
							<?php switch ($CI->M_manage->get_pesertaPendaftaran($key->KODE_USER)->STATUS) {
                      case 0:
                        echo '<span class="btn btn-sm btn-secondary">Menunggu verifikasi berkas</span>';
                        break;

                      case 1:
                        echo '<span class="btn btn-sm btn-success">Berkas telah diverifikasi</span>';
                        break;

                      case 2:
                        echo '<span class="btn btn-sm btn-danger">Berkas ditolak</span>';
                        break;

                      case 3:
                        echo '<span class="btn btn-sm btn-warning">Masuk ke babak Final</span>';
                        break;
                      
                      default:
                        echo '<span class="btn btn-sm btn-secondary">Menunggu verifikasi berkas</span>';
                        break;
                    };?>
							<?php endif;?>
							<?php endif;?>
						</td>
						<td>
							<a class="btn btn-sm btn-white pick-tim" data-toggle="modal"
								data-target="#detailUser<?= $key->KODE_USER;?>" id="<?= $key->KODE_USER;?>">
								<i class="tio-eye"></i> View
							</a>
						</td>
					</tr>
					<!-- detail user Modal -->
					<div class="modal fade" id="detailUser<?= $key->KODE_USER;?>" tabindex="-1" role="dialog"
						aria-labelledby="detailUserModalTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
							<div class="modal-content">
								<!-- Header -->
								<div class="modal-header">
									<h4 id="detailUserModalTitle" class="modal-title">Detail peserta</h4>

									<button type="button" class="btn btn-white mr-2" data-dismiss="modal"
										aria-label="Close">Tutup</button>
								</div>
								<!-- End Header -->
								<div id="detail-peserta<?= $key->KODE_USER;?>">

								</div>
							</div>
							<!-- End Body -->
						</div>
					</div>
					<!-- End detail user Modal -->
					<?php endforeach; ?>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
	<!-- End Table -->
</div>
<!-- End Card -->

<script type="text/javascript">
	$(document).ready(function () {
		$('.pick-tim').click(function (e) {
			var kode = $(this).attr('id');
			$("#detail-peserta" + kode).html(
				`<center class="mt-lg-10 my-auto mx-lg-10"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sedang memuat data peserta...</center></br></br></br>`
			);
			jQuery.ajax({
				url: "<?= base_url('manage_kompetisi/get_detailPeserta/') ?>" + kode,
				type: "GET",
				success: function (data) {
					$("#detail-peserta" + kode).html(data);
				}
			});
			console.log(kode);
		});
	});

</script>

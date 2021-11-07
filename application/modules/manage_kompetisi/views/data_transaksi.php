<!-- Page Header -->
<div class="page-header">
	<div class="row align-items-end">
		<div class="col-sm mb-2 mb-sm-0">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb breadcrumb-no-gutter">
					<li class="breadcrumb-item"><a class="breadcrumb-link" href="<?= site_url('admin') ?>">Dashboard</a></li>
					<li class="breadcrumb-item">Transaksi</li>
					<li class="breadcrumb-item active" aria-current="page">Data Transaksi</li>
				</ol>
			</nav>
			<h1 class="page-header-title mt-3">Data Transaksi</h1>

			<!-- Stats -->
			<div class="row gx-2 gx-lg-3 mt-3">
				<div class="col-sm-12 col-lg-4 mb-3 mb-lg-5">
					<!-- Card -->
					<a class="card card-hover-shadow h-100" href="#">
						<div class="card-body">
							<h6 class="card-subtitle">Jumlah Transaksi</h6>

							<div class="row align-items-center gx-2 mb-1">
								<div class="col-8">
									<span class="card-title h1"> <?= $jumlah_transaksi ?> </span>
								</div>
							</div>
							<!-- End Row -->
						</div>
					</a>
					<!-- End Card -->
				</div>
				<div class="col-sm-12 col-lg-4 mb-3 mb-lg-5">
					<!-- Card -->
					<a class="card card-hover-shadow h-100" href="#">
						<div class="card-body">
							<h6 class="card-subtitle">Total Uang Masuk</h6>

							<div class="row align-items-center gx-2 mb-1">
								<div class="col-8">
									<span class="card-title h1">Rp <?= number_format($total_uang_masuk, 0, ',', '.') ?></span>
								</div>
							</div>
							<!-- End Row -->
						</div>
					</a>
					<!-- End Card -->
				</div>
				<div class="col-sm-12 col-lg-4 mb-3 mb-lg-5">
					<!-- Card -->
					<a class="card card-hover-shadow h-100" href="#">
						<div class="card-body">
							<h6 class="card-subtitle">Pembayaran Sukses</h6>

							<div class="row align-items-center gx-2 mb-1">
								<div class="col-8">
									<span class="card-title h1"> <?= $jumlah_pembayaran_sukses ?></span>
								</div>
							</div>
							<!-- End Row -->
						</div>
					</a>
					<!-- End Card -->
				</div>
			</div>
			<!-- End Stats -->
		</div>

		<div class="col-sm-auto">
		</div>
	</div>
	<!-- End Row -->
</div>
<!-- End Page Header -->

<div class="card">
	<div class="card-header">Data Transaksi</div>
	<div class="card-body">
		<table id="myTable" class="table table-stripped table-nowrap table-align-middle table-hover" width="100%">
			<thead class="thead-light">
				<tr>
					<th>No</th>
					<th>KODE Transaksi</th>
					<th>Tgl. Transaksi</th>
					<th>Dibayar Oleh</th>
					<th>Status</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1;
                foreach ($transaksi as $row) {
                ?>
				<tr>
					<td scope="row"><?= $no ?></td>
					<td>

						<!-- Button trigger modal -->
						<button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edittrans<?= $no ?>">
							<i class="tio-settings"></i>
						</button>

						<!-- Button trigger modal -->
						<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#buktiBayar<?= $no ?>">
							<i class="tio-receipt-outlined"></i>
						</button>

						<!-- Button trigger modal -->
						<button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
							data-target="#deletetrans<?= $no ?>">
							<i class="tio-delete"></i>
						</button>
					</td>
					<td><?= $row->KODE_TRANS ?></td>
					<td><?= date("d M Y -H:i:s", strtotime($row->LOG_TIME)) ?></td>
					<td><span class="legend-indicator bg-primary"></span><?= $row->NAMA;?></span></td>
					<td>
						<?php 
                            switch ($row->STAT_BAYAR) {
                              case 0:
                                echo '<span class="badge badge-secondary">Belum melakukan pembayaran</span>';
                                break;
                              
                              case 1:
                                echo '<span class="badge badge-success">Pembayaran diterima</span>';
                                break;
                              
                              case 2:
                                echo '<span class="badge badge-danger">Pembayaran ditolak</span>';
                                break;
                              
                              default:
                                echo '<span class="badge badge-secondary">Belum melakukan pembayaran</span>';
                                break;
                            }?>
					</td>
				</tr>

				<!-- Modal -->
				<div class="modal fade" id="edittrans<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
					aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Ubah Status Transaksi - #<?= $row->KODE_TRANS ?></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form action="<?= base_url('manage_kompetisi/update_status_transaksi/' . $row->KODE_TRANS) ?>"
								method="POST">
								<div class="modal-body">
									<div class="alert alert-soft-warning text-dark" role="alert">
										<strong><i class="tio-info"></i></strong> Hati-hati dalam mengubah status transaksi.
									</div>
									<label for="">Status Saat Ini:</label><br>
									<?php 
                            switch ($row->STAT_BAYAR) {
                              case 0:
                                echo '<span class="badge badge-secondary">Belum melakukan pembayaran</span>';
                                break;
                              
                              case 1:
                                echo '<span class="badge badge-success">Pembayaran diterima</span>';
                                break;
                              
                              case 2:
                                echo '<span class="badge badge-danger">Pembayaran ditolak</span>';
                                break;
                              
                              default:
                                echo '<span class="badge badge-secondary">Belum melakukan pembayaran</span>';
                                break;
                            }?>
									<div class="form-group mt-3">
										<label for="">Ubah Status Transaksi:</label>
										<select class="form-control" name="status_transaksi">
											<option value="0">Diproses</option>
											<option value="1">Success</option>
											<option value="2">Ditolak</option>
										</select>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
									<button type="submit" class="btn btn-primary">Simpan</button>
								</div>
							</form>
						</div>
					</div>
				</div>

				<!-- Modal -->
				<div class="modal fade" id="deletetrans<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
					aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Hapus Transaksi #<?= $row->KODE_TRANS ?></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<span class="">
									<p>
										Apakah Anda yakin untuk <strong class="text-danger">menghapus</strong><br> Transaksi
										<strong>#<?= $row->KODE_TRANS ?></strong> secara <strong>permanen</strong>?
									</p>
								</span>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<a href="<?= base_url('manage_kompetisi/delete_transaksi/' . $row->KODE_TRANS) ?>"
									class="btn btn-danger">Ya, Hapus</a>
							</div>
						</div>
					</div>
				</div>

				<!-- Modal -->
				<div class="modal fade" id="buktiBayar<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
					aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Bukti Transaksi #<?= $row->KODE_TRANS ?></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
							<center>
								<img src="<?= base_url();?>berkas/pendaftaran/kompetisi/<?= preg_replace("/[^a-zA-Z]+/", "_", $row->BIDANG_LOMBA);?>/<?= preg_replace("/[^a-zA-Z]+/", "_", $row->NAMA_TIM);?>_<?= $row->KODE_USER;?>/pembayaran/<?= $row->BUKTI_BAYAR;?>" <style="width: 100%; heigth: 100%">
								</center>
							</div>
						</div>
					</div>
				</div>
				<?php $no++;
                } ?>
			</tbody>
		</table>
	</div>
</div>

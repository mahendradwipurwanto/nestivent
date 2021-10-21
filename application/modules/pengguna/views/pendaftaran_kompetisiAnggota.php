<div class="card">
	<div class="card-header">
		<h5 class="card-header-title">Data anggota</h5>
		<div class="text-right">
			<button class="btn btn-primary btn-xs float-right" data-toggle="modal" data-target="#tambahAnggota">tambah data
				anggota</button>
			<a href="<?= site_url('detail-daftar-kompetisi/'.$KODE_PENDAFTARAN);?>"
				class="btn btn-xs btn-secondary float-right mr-2">kembali</a>
		</div>
	</div>

	<!-- MODAL -->
	<div class="modal fade" id="tambahAnggota" data-backdrop="static" tabindex="-1" role="dialog"
		aria-labelledby="data-anggotaLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="data-anggotaLabel">Tambahkan data anggota - <?= $dataPendaftaran->NAMA_TIM;?></h5>
					<button type="button" class="btn btn-xs btn-icon btn-soft-secondary" data-dismiss="modal" aria-label="Close">
						<svg aria-hidden="true" width="10" height="10" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
							<path fill="currentColor"
								d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z" />
						</svg>
					</button>
				</div>
				<form action="<?= site_url('pengguna/tambah_anggota');?>" method="POST">
					<input type="hidden" name="KODE_PENDAFTARAN" value="<?= $dataPendaftaran->KODE_PENDAFTARAN;?>">
					<div class="modal-body">
						<div class="form-group">
							<label class="input-label font-weight-bold">Nama <small class="text-danger">*</small></label>
							<input type="text" name="NAMA" class="form-control" placeholder="Nama anggota" required>
						</div>
						<div class="form-group">
							<label class="input-label font-weight-bold">NIM / NIDN <small class="text-danger">*</small></label>
							<input type="text" name="NIM" class="form-control" placeholder="NIM / NIDN anggota">
							<small class="text-muted">Isikan NIM untuk anggota anda dan NIDN untuk dospem anda jika ada</small>
						</div>
						<div class="form-group">
							<label class="input-label font-weight-bold">Email <small class="text-danger">*</small></label>
							<input type="text" name="EMAIL" class="form-control" placeholder="Email anggota" required>
						</div>
						<div class="form-group">
							<label class="input-label font-weight-bold">No. Telp <small class="text-danger">*</small></label>
							<input type="text" name="HP" class="form-control" placeholder="HP anggota" required>
						</div>
						<div class="form-group">
							<label class="input-label font-weight-bold">Peran dalam TIM <small class="text-danger">*</small></label>
							<!-- Select -->
							<select class="js-custom-select custom-select" size="1" name="PERAN" required data-hs-select2-options='{
          "minimumResultsForSearch": "Infinity",
          "placeholder": "Pilih Peran"
        }'>
								<option label="empty"></option>
								<?php if($dataKetua == false):?>
								<option value="1">Ketua</option>
								<?php endif;?>
								<?php if($dataDospem == false):?>
								<option value="2">Dospem</option>
								<?php endif;?>
								<option value="3">Anggota</option>
							</select>
							<!-- End Select -->
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-white btn-sm" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary btn-sm">Tambah</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="card-body">
		<?php if($dataKetua == false):?>
		<div class="alert alert-danger">
			<p class="mb-0"><b>Perhatian !!!</b> anda belum menambahkan data KETUA TIM anda</p>
		</div>
		<?php endif;?>
		<?php if($dataDospem == false):?>
		<div class="alert alert-danger">
			<p class="mb-0"><b>Perhatian !!!</b> anda belum menambahkan data Dosen Pembimbing TIM anda</p>
		</div>
		<?php endif;?>
		<?php if($dataPendaftaran->TEAM == true):?>
		<?php if($dataAnggota == false):?>
		<div class="alert alert-danger">
			<p class="mb-0"><b>Perhatian !!!</b> anda belum menambahkan satupun data anggota TIM anda</p>
		</div>
		<?php else:?>
		<?php if(count($dataAnggota)+1 < $dataPendaftaran->MIN_ANGGOTA):?>
		<div class="alert alert-danger">
			<p class="mb-0"><b>Perhatian !!!</b> anda hanya memiliki <?= count($dataAnggota)+1;?> anggota dari minimal persyaratan
				jumlah
				<?= $dataPendaftaran->MIN_ANGGOTA;?> anggota, harap tambahkan <?= $dataPendaftaran->MIN_ANGGOTA - count($dataAnggota)+1;?>
				lagi</p>
		</div>
		<?php endif;?>
		<?php if(count($dataAnggota)+1 > $dataPendaftaran->MAX_ANGGOTA):?>
		<div class="alert alert-danger">
			<p class="mb-0"><b>Perhatian !!!</b> anda memiliki <?= count($dataAnggota)+1;?> anggota dari maximal persyaratan
				jumlah
				<?= $dataPendaftaran->MAX_ANGGOTA;?> anggota, harap hapus sebanyak
				<?= $dataPendaftaran->MAX_ANGGOTA - count($dataAnggota)+1;?>
				data anggota</p>
		</div>
		<?php endif;?>
		<?php endif;?>
		<?php endif;?>
		<table class="table table-stripped table-nowrap table-align-middle table-hover" width="100%" id="myTable">
			<thead>
				<tr>
					<th>No</th>
					<th></th>
					<th>Peran</th>
					<th>Nama</th>
					<th>NIM/NIDN</th>
					<th>EMAIL</th>
					<th>No. Telp</th>
				</tr>
			</thead>
			<tbody>
				<?php if ($get_anggotaTim != null) :?>
				<?php $no=1; foreach ($get_anggotaTim as $key) :?>
				<tr>
					<td><?= $no++;?></td>
					<td>
						<button type="button" class="btn btn-info btn-xs" data-toggle="modal"
							data-target="#editAnggota<?= $key->ID_ANGGOTA;?>"><i class="fas fa-pencil-alt"></i></button>
						<button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
							data-target="#hapusAnggota<?= $key->ID_ANGGOTA;?>"><i class="fa fa-eraser"></i></button>
					</td>
					<td>
						<?php switch ($key->PERAN) {
              case 1:
                echo '<span class="badge badge-primary">KETUA</span>';
                break;
              case 2:
                echo '<span class="badge badge-warning">DOSPEM</span>';
                break;
              case 3:
                echo '<span class="badge badge-info">ANGGOTA</span>';
                break;
              
              default:
                echo '<span class="badge badge-secondary">Belum diatur</span>';
                break;
            }?>
					</td>
					<td><?= $key->NAMA;?></td>
					<td><?= $key->NIM;?></td>
					<td><?= $key->EMAIL;?></td>
					<td><?= $key->HP;?></td>
				</tr>

				<!-- MODAL -->
				<div class="modal fade" id="editAnggota<?= $key->ID_ANGGOTA;?>" data-backdrop="static" tabindex="-1"
					role="dialog" aria-labelledby="data-anggotaLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="data-anggotaLabel">Ubah data anggota -
									<?= $dataPendaftaran->NAMA_TIM;?></h5>
								<button type="button" class="btn btn-xs btn-icon btn-soft-secondary" data-dismiss="modal"
									aria-label="Close">
									<svg aria-hidden="true" width="10" height="10" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
										<path fill="currentColor"
											d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z" />
									</svg>
								</button>
							</div>
							<form action="<?= site_url('pengguna/edit_anggota');?>" method="POST">
								<input type="hidden" name="KODE_PENDAFTARAN" value="<?= $dataPendaftaran->KODE_PENDAFTARAN;?>">
								<div class="modal-body">
									<div class="form-group">
										<label class="input-label font-weight-bold">Nama<span class="text-danger">*</span></label>
										<input type="text" name="NAMA" class="form-control" value="<?= $key->NAMA;?>" required>
									</div>
									<div class="form-group">
										<label class="input-label font-weight-bold">NIM / NIDN<span class="text-danger">*</span></label>
										<input type="text" name="NIM" class="form-control" value="<?= $key->NIM;?>">
										<small class="text-muted">Isikan NIM untuk anggota anda dan NIDN untuk dospem anda jika ada</small>
									</div>
									<div class="form-group">
										<label class="input-label font-weight-bold">Email<span class="text-danger">*</span></label>
										<input type="text" name="EMAIL" class="form-control" value="<?= $key->EMAIL;?>" required>
									</div>
									<div class="form-group">
										<label class="input-label font-weight-bold">No. Telp<span class="text-danger">*</span></label>
										<input type="text" name="HP" class="form-control" value="<?= $key->HP;?>" required>
									</div>
									<div class="form-group">
										<label class="input-label font-weight-bold">Peran dalam TIM <span
												class="text-danger">*</span></label>
										<!-- Select -->
										<select class="js-custom-select custom-select" size="1" name="PERAN" required
											data-hs-select2-options='{
        "minimumResultsForSearch": "Infinity"
      }'>
											<optgroup label="Current">
												<option value="<?= $key->PERAN;?>">
													<?php switch ($key->PERAN) {
              case 1:
                echo 'KETUA';
                break;
              case 2:
                echo 'DOSPEM';
                break;
              case 3:
                echo 'ANGGOTA';
                break;
              
              default:
                echo 'Belum diatur';
                break;
            }?>
												</option>
											</optgroup>
											<optgroup label="Change">
												<?php if($dataKetua == false):?>
												<option value="1">Ketua</option>
												<?php endif;?>
												<?php if($dataDospem == false):?>
												<option value="2">Dospem</option>
												<?php endif;?>
												<option value="3">Anggota</option>
											</optgroup>
										</select>
										<!-- End Select -->
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-white btn-sm" data-dismiss="modal">Batal</button>
									<button type="submit" class="btn btn-info btn-sm">Ubah</button>
								</div>
							</form>
						</div>
					</div>
				</div>

				<!-- MODAL -->
				<div class="modal fade" id="hapusAnggota<?= $key->ID_ANGGOTA;?>" data-backdrop="static" tabindex="-1"
					role="dialog" aria-labelledby="data-anggotaLabel" aria-hidden="true">
					<div class="modal-dialog modal-sm" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="data-anggotaLabel">Hapus data anggota - <?= $dataPendaftaran->NAMA_TIM;?>
								</h5>
								<button type="button" class="btn btn-xs btn-icon btn-soft-secondary" data-dismiss="modal"
									aria-label="Close">
									<svg aria-hidden="true" width="10" height="10" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
										<path fill="currentColor"
											d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z" />
									</svg>
								</button>
							</div>
							<form action="<?= site_url('pengguna/hapus_anggota');?>" method="POST">
								<input type="hidden" name="ID_ANGGOTA" value="<?= $key->ID_ANGGOTA;?>">
								<div class="modal-body">
									<p>Apakah anda yakin ingin menghapus data anggota anda, atas nama <?= $key->NAMA;?></p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-white btn-sm" data-dismiss="modal">Batal</button>
									<button type="submit" class="btn btn-danger btn-sm">Hapus</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<?php endforeach;?>
				<?php endif;?>
			</tbody>
		</table>
	</div>
</div>

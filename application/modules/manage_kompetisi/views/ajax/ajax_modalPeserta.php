<!-- Body -->
<div class="modal-body">
	<!-- Profile Cover -->
	<div class="profile-cover">
		<div class="profile-cover-img-wrapper">
			<img id="detailProfileCoverImgModal" class="profile-cover-img"
				src="<?= base_url() ?>assets/backend/img/1920x400/img1.jpg" alt="<?= $key->NAMA ?>">
		</div>
	</div>
	<!-- End Profile Cover -->

	<!-- Avatar -->
	<label class="avatar avatar-xxl avatar-circle avatar-border-lg profile-cover-avatar mb-5"
		for="detailAvatarUploaderModal">
		<img id="detailAvatarImgModal" class="avatar-img"
			src="<?= ($key->PROFIL == null ? base_url().'assets/frontend/img/100x100/img12.jpg' : base_url().'berkas/pengguna/'.$key->KODE_USER.'/foto/'.$key->PROFIL);?>"
			alt="<?= $key->NAMA ?>">
	</label>
	<!-- End Avatar -->

	<!-- Form Group -->
	<div class="row form-group">
		<label for="detailFirstNameModalLabel" class="col-sm-3 col-form-label input-label">Nama Ketua TIM</label>

		<div class="col-sm-9">
			<div class="js-form-message input-group input-group-sm-down-break">
				<input type="text" class="form-control" name="detailFirstNameModal" id="detailFirstNameModalLabel"
					value="<?= $key->NAMA;?>" readonly>
			</div>
		</div>
	</div>
	<!-- End Form Group -->

	<!-- Form Group -->
	<div class="row form-group">
		<label for="detailEmailModalLabel" class="col-sm-3 col-form-label input-label">Email</label>

		<div class="col-sm-9">
			<div class="js-form-message">
				<!-- Input Group -->
				<div class="input-group input-group-merge">
					<input type="email" class="form-control" name="detailEmailModal" id="detailEmailModalLabel"
						value="<?= $key->EMAIL;?>" readonly>
					<a class="input-group-append" href="mailto:<?= $key->EMAIL;?>" target="_blank">
						<span class="input-group-text p-2">
							send mail
						</span>
					</a>
				</div>
				<!-- End Input Group -->
			</div>
		</div>
	</div>
	<!-- End Form Group -->

	<!-- Form Group -->
	<div class="row form-group">
		<label for="detailEmailModalLabel" class="col-sm-3 col-form-label input-label">Telepon</label>

		<div class="col-sm-4">
			<div class="js-form-message">
			</div>
			<!-- Input Group -->
			<div class="input-group input-group-merge">
				<input type="text" class="form-control" name="detailEmailModal" id="detailEmailModalLabel"
					value="+62<?= $key->HP;?>" readonly>
				<span class="input-group-append">
					<a href="https://api.whatsapp.com/send?text=Hai&phone=62<?= $key->HP;?>" target="_blank">
						<span class="input-group-text" style="padding-top: .75rem !important">
							<i class="tio-whatsapp"></i>
						</span>
					</a>
					<a href="tel:+62<?= $key->HP;?>" target="_blank">
						<span class="input-group-text" style="padding-top: .75rem !important">
							<i class="tio-call-talking"></i>
						</span>
					</a>
				</span>
			</div>
			<!-- End Input Group -->
		</div>
		<label for="detailEmailModalLabel" class="col-sm-3 col-form-label input-label">Jenis Kelamin</label>

		<div class="col-sm-2">
			<div class="js-form-message">
				<input type="text" class="form-control" name="detailEmailModal" id="detailEmailModalLabel"
					value="<?= $key->JK;?>" readonly>
			</div>
		</div>
	</div>
	<!-- End Form Group -->
	<hr>
	<?php if ($CI->M_manage->get_pesertaPendaftaran($key->KODE_USER) == false) :?>
	<div class="alert alert-info">
		<p class="mb-0 text-center">Belum mendaftarkan diri dalam kompetisi LO Kreatif 2021</p>
	</div>
	<?php else:?>

	<!-- Form Group -->
	<div class="row form-group">
		<label for="detailFirstNameModalLabel" class="col-sm-3 col-form-label input-label">Bidang Lomba</label>

		<div class="col-sm-9">
			<div class="js-form-message input-group input-group-sm-down-break">
				<input type="text" class="form-control" name="detailFirstNameModal" id="detailFirstNameModalLabel"
					value="<?= $CI->M_manage->get_pesertaPendaftaran($key->KODE_USER)->LOMBA;?>" readonly>
			</div>
		</div>
	</div>
	<!-- End Form Group -->

	<!-- Form Group -->
	<div class="row form-group">
		<label for="detailFirstNameModalLabel" class="col-sm-3 col-form-label input-label">Asal PTS</label>

		<div class="col-sm-9">
			<div class="js-form-message input-group input-group-sm-down-break">
				<input type="text" class="form-control" name="detailFirstNameModal" id="detailFirstNameModalLabel"
					value="<?= $CI->M_manage->get_pesertaPendaftaran($key->KODE_USER)->namapt;?>" readonly>
			</div>
		</div>
	</div>
	<!-- End Form Group -->

	<!-- Form Group -->
	<div class="row form-group">
		<label for="detailFirstNameModalLabel" class="col-sm-3 col-form-label input-label">Nama TIM</label>

		<div class="col-sm-9">
			<div class="js-form-message input-group input-group-sm-down-break">
				<input type="text" class="form-control" name="detailFirstNameModal" id="detailFirstNameModalLabel"
					value="<?= $CI->M_manage->get_pesertaPendaftaran($key->KODE_USER)->NAMA_TIM;?>" readonly>
			</div>
		</div>
	</div>
	<!-- End Form Group -->

	<!-- Form Group -->
	<div class="row form-group">
		<label for="detailFirstNameModalLabel" class="col-sm-3 col-form-label input-label">Status TIM</label>

		<div class="col-sm-9"><?php if ($CI->M_manage->get_pesertaPendaftaran($key->KODE_USER) == false) :?>
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
		</div>
	</div>
	<hr>
	<?php if ($anggota == false) { ?>
	<center>
		<div class="alert alert-soft-danger" role="alert">
			Ketua Tim belum melengkapi formulir anggota.
		</div>
	</center>
	<?php } else { ?>
	<table class="table">
		<thead>
			<tr>
				<th>Peran</th>
				<th>Nama</th>
				<th>NIDN/NIM</th>
				<th>E-mail</th>
				<th>Whatsapp</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1;
                foreach ($anggota as $row) {
                  if ($row->PERAN == 1) {
                    $peran = '<strong>Ketua</strong>';
                  } elseif ($row->PERAN == 2) {
                    $peran = '<strong>Dosen Pembimbing</strong>';
                  } elseif ($row->PERAN == 3) {
                    $peran = 'Anggota';
                  }

                  // reaplace first char
                  $ptn = "/^0/";
                  $str = $row->HP;
                  $rpltxt = "62";
                  $hp = preg_replace($ptn, $rpltxt, $str);
                  ?>
			<tr>
				<td><?= $peran ?></td>
				<td><?= $row->NAMA ?></td>
				<td><?= ($row->NIM != "") ? $row->NIM : "-" ?></td>
				<td><a href="mailto:<?= $row->EMAIL ?>"><?= $row->EMAIL ?></a></td>
				<td>
					<a href="https://api.whatsapp.com/send?phone=<?= $hp ?>&text=Hallo%20<?= $row->NAMA ?>" target="_blank"
						id="btn-anggota<?= $no ?>" class="btn btn-xs btn-success"><i class="tio-whatsapp"></i></a>
				</td>
			</tr>
			<?php $no++;
                } ?>
		</tbody>
	</table>
	<?php } ?>
	<!-- End Form Group -->
	<?php endif;?>
</div>
<!-- End Form Group -->

<!-- Login Form -->
<div class="container space-2 space-lg-3">
	<form class="js-validate w-md-75 w-lg-50 mx-md-auto" action="<?= site_url('authentication/daftar_pengguna') ?>"
		method="post">
		<!-- Title -->
		<div class="mb-5 mb-md-7">
			<h1 class="h2 mb-0">Gabung sekarang!</h1>
			<p>Daftarkan akun anda untuk dapat bergabung bersama kami.</p>
		</div>
		<!-- End Title -->

		<!-- Form Group -->
		<div class="js-form-message form-group">
			<label class="input-label" for="signinSrNama">Nama lengkap anda <span class="text-danger">*</span></label>
			<input type="text" class="form-control" name="nama" id="signinSrNama" placeholder="Nama lengkap anda"
				aria-label="Nama lengkap anda" required data-msg="Harap masukkan nama lengkap anda.">
		</div>
		<!-- End Form Group -->

		<!-- Form Group -->
		<div class="js-form-message form-group">
			<label for="listingBathrooms" class="input-label">Jenis Kelamin <span class="text-danger">*</span></label>
			<div class="input-group input-group-up-break">
				<!-- Custom Radio -->
				<div class="form-control">
					<div class="custom-control custom-radio">
						<input type="radio" class="custom-control-input" name="jk" id="jk1" value="L" checked>
						<label class="custom-control-label" for="jk1">Laki-laki</label>
					</div>
				</div>
				<!-- End Custom Radio -->

				<!-- Custom Radio -->
				<div class="form-control">
					<div class="custom-control custom-radio">
						<input type="radio" class="custom-control-input" name="jk" id="jk2" value="P">
						<label class="custom-control-label" for="jk2">Perempuan</label>
					</div>
				</div>
				<!-- End Custom Radio -->
			</div>
		</div>

		<!-- Form Group -->
		<div class="js-form-message form-group">
			<label class="input-label" for="signinSrInstansi">Asal Instansi <span class="text-danger">*</span></label>
			<input type="text" class="form-control" name="instansi" id="signinSrInstansi" placeholder="Asal Instansi anda"
				aria-label="Asal Instansi anda" required data-msg="Harap masukkan asal Instansi.">
		</div>
		<!-- End Form Group -->

		<!-- Form Group -->
		<div class="js-form-message form-group">
			<label for="listingBathrooms" class="input-label">Jabatan <span class="text-danger">*</span></label>
			<div class="input-group input-group-down-break">
				<!-- Custom Radio -->
				<div class="form-control">
					<div class="custom-control custom-radio">
						<input type="radio" class="custom-control-input" name="jabatan" id="jabatan1" value="1|Pelajar / Mahasiswa"
							checked>
						<label class="custom-control-label" for="jabatan1">Pelajar / Mahasiswa</label>
					</div>
				</div>
				<!-- End Custom Radio -->

				<!-- Custom Radio -->
				<div class="form-control">
					<div class="custom-control custom-radio">
						<input type="radio" class="custom-control-input" name="jabatan" id="jabatan2" value="2|Dosen / Guru">
						<label class="custom-control-label" for="jabatan2">Dosen / Guru</label>
					</div>
				</div>
				<!-- End Custom Radio -->

				<!-- Custom Radio -->
				<div class="form-control">
					<div class="custom-control custom-radio">
						<input type="radio" class="custom-control-input" name="jabatan" id="jabatan3" value="3">
						<label class="custom-control-label" for="jabatan3">Lainnya</label>
					</div>
				</div>
				<!-- End Custom Radio -->
			</div>

			<!-- Form Group -->
			<div class="js-form-message form-group hidden" id="lainnya">
				<input type="text" class="form-control" name="lainnya" id="signinSrLainnya" placeholder="Masukkan jabatan anda"
					aria-label="Masukkan jabatan anda" required data-msg="Harap masukkan jabatan anda.">
			</div>
			<!-- End Form Group -->
			<small class="text-muted">Masukkan jabatan / peran anda dalam instansi</small>
		</div>
		<!-- End Form Group -->

		<!-- Form Group -->
		<div class="js-form-message form-group">
			<label class="input-label" for="signinSrEmail">Email anda <span class="text-danger">*</span></label>
			<input type="text" class="form-control" name="email" id="signinSrEmail" placeholder="Masukkan Email"
				aria-label="Email anda" required data-msg="Harap masukkan email anda.">
		</div>
		<!-- End Form Group -->

		<!-- Form Group -->
		<div class="js-form-message form-group">
			<label class="input-label" for="signinSrTelepon">Nomor telepon anda <span class="text-danger">*</span></label>
			<!-- Input Group -->
			<div class="input-group input-group-merge">
				<div class="input-group-prepend">
					<span class="input-group-text p-2">
						+62
					</span>
				</div>
				<input type="tel" class="form-control" name="hp" id="signinSrTelepon" placeholder="Nomor telepon anda"
					aria-label="Nomor telepon anda" required data-msg="Harap masukkan nomor telepon anda.">
			</div>
			<!-- End Input Group -->
			<small class="text-muted">Ex: 81987123465</small>
		</div>
		<!-- End Form Group -->

		<!-- Form Group -->
		<div class="js-form-message form-group">
			<label class="input-label" for="signinSrAlamat">Alamat anda <span class="text-danger">*</span></label>
			<textarea type="text" class="form-control" name="alamat" id="signinSrAlamat" placeholder="Alamat lengkap anda"
				aria-label="Alamat lengkap anda" required rows="3"></textarea>
		</div>
		<!-- End Form Group -->

		<!-- Form Group -->
		<div class="js-form-message form-group">
			<label class="input-label" for="signinSrInstagram">ID Instagram anda <small
					class="text-muted">(Optional)</small></label>
			<!-- Input Group -->
			<div class="input-group input-group-merge">
				<div class="input-group-prepend">
					<span class="input-group-text p-2">
						@
					</span>
				</div>
				<input type="text" class="form-control" name="instagram" id="signinSrInstagram" placeholder="ID Instagram anda"
					aria-label="ID Instagram anda" data-msg="Harap masukkan ID Instagram anda.">
			</div>
			<!-- End Input Group -->
		</div>
		<!-- End Form Group -->

		<!-- Form Group -->
		<div class="js-form-message form-group">
			<label class="input-label" for="signinSrPassword">Password <span class="text-danger">*</span></label>
			<input type="password" class="form-control" name="password" minlength="6" id="signinSrPassword"
				placeholder="********" aria-label="********" required required
				data-msg="Harap masukkan password, minimal 6 karakter.">
		</div>
		<!-- End Form Group -->

		<!-- Form Group -->
		<div class="js-form-message form-group">
			<label class="input-label" for="signinSrConfirmPassword">Konfirmasi password</label>
			<input type="password" class="form-control" name="confirmPassword" minlength="6" id="signinSrConfirmPassword"
				placeholder="********" aria-label="********" required required
				data-msg="Harap masukkan konfirmasi password, minimal 6 karakter">
		</div>
		<!-- End Form Group -->

		<!-- Checkbox -->
		<div class="js-form-message mb-5">
			<div class="custom-control custom-checkbox d-flex align-items-center text-muted">
				<input type="checkbox" class="custom-control-input" id="termsCheckbox" name="termsCheckbox" required
					data-msg="Harap setuju dengan syarat dan kondisi kami.">
				<label class="custom-control-label" for="termsCheckbox">
					<small>
						Saya setuju dengan
						<a class="link-underline" data-toggle="modal" data-target="#syaratdanketentuan">Syarat dan kondisi</a>
					</small>
				</label>
			</div>
		</div>
		<!-- End Checkbox -->

		<!-- Button -->
		<div class="row align-items-center mb-5">
			<div class="col-sm-6 mb-3 mb-sm-0">
				<span class="font-size-1 text-muted">Sudah punya akun?</span>
				<a class="font-size-1 font-weight-bold" href="<?= site_url('login') ?>">Login</a>
			</div>

			<div class="col-sm-6 text-sm-right">
				<button type="submit" class="btn btn-primary btn-sm transition-3d-hover" id="submit">Daftar Sekarang</button>
			</div>
		</div>
		<!-- End Button -->
	</form>
</div>
<!-- End Login Form -->

<div class="modal fade" id="syaratdanketentuan" role="dialog" tabindex="-1" role="dialog"
	aria-labelledby="syaratdanketentuan" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close alcs" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h2><strong>Terms and Conditions</strong></h2>

        <?= $WEB_TERM;?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-white" data-dismiss="modal">Mengerti</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('form').submit(function (event) {
		$('#send-button').prop("disabled", true);
		// add spinner to button
		$('#send-button').html(
			`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
		);
		return;
	});
	$('input:radio[name="jabatan"]').change(
		function () {
			if (this.checked && this.value == '3') {
				$("#lainnya").removeClass('hidden');
				console.log("check");
			} else {
				$("#lainnya").addClass('hidden');
				console.log("uncheck");
			}
		});

	$("#signinSrNama").keydown(function (event) {
	var inputValue = event.which;
	// allow letters and whitespaces only.
	if (!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0 && inputValue != 8 &&
			inputValue != 37 && inputValue != 39)) {
		event.preventDefault();
	}
	});

	$("#signinSrTelepon").keyup(function () {
		var value = $(this).val();
		value = value.replace(/^(0*)/, "");
		$(this).val(value);
	});

	// Restricts input for the given textbox to the given inputFilter.
	function setInputFilter(textbox, inputFilter) {
		["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function (event) {
			textbox.addEventListener(event, function () {
				if (inputFilter(this.value)) {
					this.oldValue = this.value;
					this.oldSelectionStart = this.selectionStart;
					this.oldSelectionEnd = this.selectionEnd;
				} else if (this.hasOwnProperty("oldValue")) {
					this.value = this.oldValue;
					this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
				} else {
					this.value = "";
				}
			});
		});
	}

	// Install input filters Tambah Hp Pegawai.
	setInputFilter(document.getElementById("signinSrTelepon"), function (value) {
		return /^\d*$/.test(value);
	});

</script>

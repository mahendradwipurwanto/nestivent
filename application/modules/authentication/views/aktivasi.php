<div class="container">
	<div class="row justify-content-center mt-5 space-top-2">
		<div class="col-lg-6 col-md-6 col-sm-8 col-xs-10 ">
			<!-- Social login form-->
			<div class="card my-4 text-center shadow">
				<div class="card-body">
					<div class="text-gray-700 text-lg font-weight-700">Aktivasi Email Anda</div>
					<div><i class="fa fa-envelope text-blue fa-4x"></i></div>
					<div class="text-gray-500 small">Kami telah mengirimkan email anda <span
							class="font-weight-500 text-gray-600"><?= $mail?></span>. Silakan masukkan kode verifikasi Anda.</div>
				</div>
				<div class="card-body p-4" style="padding-top: 0px !important">
					<!-- login form-->
					<div class="row justify-content-center">
						<div class="col-6">
							<div class="form-group">
								<form action="<?php echo site_url('authentication/aktivasi_akun')?>" method="POST">
									<div class="form-group">
										<input type="text" name="kode_aktivasi" class="form-control form-control-solid text-center text-lg"
											data-inputmask="'mask': '999-999'" id="paket" name="kode_aktivasi"
											placeholder-aria-label="kode_aktivasi" aria-describedby="kode_aktivasi" required>
										<div class="input-group-append">
										</div>
									</div>
									<div class="form-group text-center">
										<button type="submit" class="btn btn-primary btn-sm text-white text-md pointer"
											id="send-button">Aktivasi akun</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="text-gray-500 small d-inline">Tidak menerima kode? <span class="text-primary d-inline cursor"
							onclick="location.reload()">Kirim Ulang</span> </div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		$(":input").inputmask();
	});

</script>

<script>
	$('form').submit(function (event) {
		$('#send-button').prop("disabled", true);
		// add spinner to button
		$('#send-button').html(
			`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
		);
		return;
	});

</script>

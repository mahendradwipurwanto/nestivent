<div class="container">
  <div class="row justify-content-center mt-5 space-top-2">
    <div class="col-lg-6 col-md-6 col-sm-8 col-xs-10 ">
      <!-- Social login form-->
      <div class="card my-4 text-center shadow">
        <div class="card-body">
          <div class="text-gray-700 text-lg font-weight-700">Aktivasi Email Anda</div>
          <div><i class="fa fa-envelope text-blue fa-4x"></i></div>
          <div class="text-gray-800 font-weight-500 my-2"><?= $mail;?></div>
          <div class="text-gray-500 small">Demi menjaga keamanan, kami ingin melakukan verifikasi ke email anda. Yuk lakukan aktivasi sekarang sebelum melanjutkan ke dashboard.</div>
          <div class="text-gray-500 small mt-2"><i class="fa fa-info-circle mr-2"></i> Kami akan mengirimkan kode aktivasi melalui email anda.</div>
        </div>
        <div class="card-body p-4" style="padding-top: 0px !important">
          <!-- login form-->
          <div class="row justify-content-center">
            <div class="col-6">
              <div class="form-group">
                <a href="<?= site_url('email-verification');?>" class="btn btn-primary shadow py-2" onclick="showProgressCursor();">Verifikasi Sekarang</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

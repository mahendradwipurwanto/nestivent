<!-- Card -->
<div class="card mb-3 mb-lg-5">
  <div class="card-header">
    <h5 class="card-title">Informasi Pribadi</h5>
  </div>
  <div class="card-body">
    <form action="<?= site_url('pengguna/ubah_profil') ?>" method="post" enctype="multipart/form-data">

      <!-- Form Group -->
      <div class="row form-group">
        <label class="col-sm-3 col-form-label input-label" for="signinSrNama">Nama lengkap anda <span class="text-danger">*</span></label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="nama" id="signinSrNama" value="<?= $user->NAMA ?>" aria-label="Nama lengkap anda" required data-msg="Harap masukkan nama lengkap anda.">
        </div>
      </div>
      <!-- End Form Group -->

      <!-- Form Group -->
      <div class="row form-group">
        <label class="col-sm-3 col-form-label input-label" for="signinSrEmail">Email anda <span class="text-danger">*</span></label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="email" id="signinSrEmail" value="<?= $user->EMAIL ?>" aria-label="Email anda" readonly>
        </div>
      </div>
      <!-- End Form Group -->

      <!-- Form Group -->
      <div class="row form-group">
        <label for="listingBathrooms" class="col-sm-3 col-form-label input-label">Jenis Kelamin <span class="text-danger">*</span></label>
        <div class="col-sm-9">
          <div class="input-group input-group-down-break">
            <!-- Custom Radio -->
            <div class="form-control">
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" name="jk" id="jk1" value="L" <?= ($user->JK == "L" ? "checked" : "") ?>>
                <label class="custom-control-label" for="jk1">Laki-laki</label>
              </div>
            </div>
            <!-- End Custom Radio -->

            <!-- Custom Radio -->
            <div class="form-control">
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" name="jk" id="jk2" value="P" <?= ($user->JK == "P" ? "checked" : "") ?>>
                <label class="custom-control-label" for="jk2">Perempuan</label>
              </div>
            </div>
            <!-- End Custom Radio -->
          </div>
        </div>
      </div>

      <!-- Form Group -->
      <div class="row form-group">
        <label class="col-sm-3 col-form-label input-label" for="signinSrInstansi">Asal Instansi <span class="text-danger">*</span></label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="instansi" id="signinSrInstansi" value="<?= $user->INSTANSI ?>" aria-label="Asal Instansi anda" required data-msg="Harap masukkan asal Instansi.">
        </div>
      </div>
      <!-- End Form Group -->
      <?php $jabatan = explode("|", $user->JABATAN); ?>
      <!-- Form Group -->
      <div class="row form-group">
        <label for="listingBathrooms" class="col-sm-3 col-form-label input-label">Jabatan <span class="text-danger">*</span></label>
        <div class="col-sm-9">
          <div class="input-group input-group-down-break">
            <!-- Custom Radio -->
            <div class="form-control">
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" name="jabatan" id="jabatan1" value="1|Pelajar / Mahasiswa" <?= ($jabatan[0] == "1" ? "checked" : "") ?>>
                <label class="custom-control-label" for="jabatan1">Pelajar / Mahasiswa</label>
              </div>
            </div>
            <!-- End Custom Radio -->

            <!-- Custom Radio -->
            <div class="form-control">
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" name="jabatan" id="jabatan2" value="2|Dosen / Guru" <?= ($jabatan[0] == "2" ? "checked" : "") ?>>
                <label class="custom-control-label" for="jabatan2">Dosen / Guru</label>
              </div>
            </div>
            <!-- End Custom Radio -->

            <!-- Custom Radio -->
            <div class="form-control">
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" name="jabatan" id="jabatan3" value="3" <?= ($jabatan[0] == "3" ? "checked" : "") ?>>
                <label class="custom-control-label" for="jabatan3">Lainnya</label>
              </div>
            </div>
            <!-- End Custom Radio -->
          </div>

          <!-- Form Group -->
          <div class="form-group <?= ($jabatan[0] == "3" ? "" : "hidden") ?>" id="lainnya">
            <input type="text" class="form-control" name="lainnya" id="signinSrLainnya" value="<?= ($jabatan[0] == "3" ? $jabatan[1] : '') ?>" aria-label="Masukkan jabatan anda" data-msg="Harap masukkan jabatan anda.">
          </div>
          <!-- End Form Group -->
        </div>
        <small class="text-muted">Masukkan jabatan / peran anda dalam instansi</small>
      </div>
      <!-- End Form Group -->

      <!-- Form Group -->
      <div class="row form-group">
        <label class="col-sm-3 col-form-label input-label" for="signinSrTelepon">Nomor telepon anda <span class="text-danger">*</span></label>
        <div class="col-sm-9">
          <!-- Input Group -->
          <div class="input-group input-group-merge">
            <div class="input-group-prepend">
              <span class="input-group-text p-2">
                +62
              </span>
            </div>
            <input type="tel" class="form-control" name="hp" id="signinSrTelepon" value="<?= $user->HP ?>" aria-label="Nomor telepon anda" required data-msg="Harap masukkan nomor telepon anda.">
          </div>
          <!-- End Input Group -->
          <small class="text-muted">Ex: 81987123465</small>
        </div>
      </div>
      <!-- End Form Group -->

      <!-- Form Group -->
      <div class="row form-group">
        <label class="col-sm-3 col-form-label input-label" for="signinSrAlamat">Alamat anda <span class="text-danger">*</span></label>
        <div class="col-sm-9">
          <textarea  type="text" class="form-control" name="alamat" id="signinSrAlamat" value="<?= $user->ALAMAT ?>" aria-label="Alamat lengkap anda" required rows="3"><?= $user->ALAMAT ?></textarea>
        </div>
      </div>
      <!-- End Form Group -->

      <!-- Form Group -->
      <div class="row form-group">
        <label class="col-sm-3 col-form-label input-label" for="signinSrInstagram">ID Instagram anda <span class="text-danger">*</span></label>
        <div class="col-sm-9">
          <!-- Input Group -->
          <div class="input-group input-group-merge">
            <div class="input-group-prepend">
              <span class="input-group-text p-2">
                @
              </span>
            </div>
            <input type="text" class="form-control" name="instagram" id="signinSrInstagram" value="<?= $user->INSTAGRAM ?>" aria-label="ID Instagram anda" required data-msg="Harap masukkan ID Instagram anda.">
          </div>
          <!-- End Input Group -->
        </div>
      </div>
      <!-- End Form Group -->

      <!-- Footer -->
      <div class="card-footer d-flex justify-content-end px-0">
        <button type="submit" class="btn btn-primary btn-sm <?= $CI->agent->is_mobile() ? 'btn-block' : '';?>">Simpan perubahan</button>
      </div>
      <!-- End Footer -->
    </form>
  </div>
</div>
<!-- End Card -->

<!-- Card -->
<div class="card card-frame card-frame-highlighted mt-4">
  <!-- Body -->
  <div class="card-body">
    <div class="row">
      <div class="col-md-9 col-sm-12">
        <p class="setting-item">Ubah password lama anda.</p>
      </div>
      <div class="col-md-3 col-sm-12">
        <a href="<?= site_url('ubah-password') ?>" class="btn btn-danger btn-sm btn-block transition-3d-hover">ubah password</a>
      </div>
    </div>
    <div class="row d-none">
      <?php if ($user->NONAKTIF == 1): ?>
        <div class="col-md-9 col-sm-12">
          <p class="setting-item">Pembatalan hapus akun anda, <span class="text-danger">Batas akhir <?= date("d F Y - H:i", $user->DEADLINE) ?></span> </p>
        </div>
        <div class="col-md-3 col-sm-12">
          <button type="button" data-toggle="modal" data-target="#batal_hapus" class="btn btn-danger btn-sm btn-block transition-3d-hover">Batal hapus akun</a>
        </div>
      <?php else: ?>
        <div class="col-md-9 col-sm-12">
          <p class="setting-item">Hapus akun anda.</p>
        </div>
        <div class="col-md-3 col-sm-12">
          <button type="button" data-toggle="modal" data-target="#hapus_profil" class="btn btn-danger btn-sm btn-block transition-3d-hover">Hapus akun</a>
        </div>
      <?php endif; ?>
    </div>

    <!-- DELETE ACCOUNT -->

    <div id="hapus_profil" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ubah_profil" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
          <form action="<?= site_url('pengguna/hapus_akun') ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <!-- Form Group -->
              <small><b>Hapus akun</b> - Setelah melakukan proses ini, akun anda akan masuk kedalam masa <i>Non-Aktif</i> selama 7 Hari sebelum semua data mengenai akun anda akan dihapus secara <u>permanen</u>. Anda dapat membatalkan tindakan ini pada pengaturan > pembatalan hapus akun.
              <br>Ketik <span class="text-primary">hapus/<?= $this->session->userdata("email") ?></span> untuk melanjutkan </small>
              <!-- End Form Group -->
              <div class="form-group mb-0">
                <input type="text" class="form-control form-control-sm" name="hapus_akun"  aria-label="Masukkan jabatan anda" data-msg="Harap masukkan kalimat diatas untuk melanjutkan." required>
              </div>
              <hr>
              <button type="button" class="btn btn-xs btn-white btn-block" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-xs btn-primary btn-block">Ya, saya yakin</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- END DELETE ACCOUNT -->

    <!-- CANCEL DELETE ACCOUNT -->

    <div id="batal_hapus" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ubah_profil" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
          <form action="<?= site_url('pengguna/batal_hapus') ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <!-- Form Group -->
              <small><b>Pembatalan Hapus akun</b> - dengan melanjutkan proses ini, maka proses penghapusan data akun anda akan dibatalkan.
              <br>Ketik <span class="text-primary">batal/<?= $this->session->userdata("email") ?></span> untuk melanjutkan </small>
              <!-- End Form Group -->
              <div class="form-group mb-0">
                <input type="text" class="form-control form-control-sm" name="batal_hapus"  aria-label="Masukkan jabatan anda" data-msg="Harap masukkan kalimat diatas untuk melanjutkan." required>
              </div>
              <hr>
              <button type="button" class="btn btn-xs btn-white btn-block" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-xs btn-primary btn-block">Ya, saya yakin</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- END CANCEL DELETE ACCOUNT -->
  </div>
  <!-- End Body -->
</div>
<!-- End Card -->


<script type="text/javascript">

$('input:radio[name="jabatan"]').change(
  function(){
    if (this.checked && this.value == '3') {
      $("#lainnya").removeClass('hidden');
      console.log("check");
    }else {
      $("#lainnya").addClass('hidden');
      console.log("uncheck");
    }
  });

  $("#signinSrTelepon").keyup(function(){
    var value = $(this).val();
    value = value.replace(/^(0*)/,"");
    $(this).val(value);
  });

  // Restricts input for the given textbox to the given inputFilter.
  function setInputFilter(textbox, inputFilter) {
    ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
      textbox.addEventListener(event, function() {
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
  setInputFilter(document.getElementById("signinSrTelepon"), function(value) { return /^\d*$/.test(value); });
  </script>

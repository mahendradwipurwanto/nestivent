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

      <!-- Form Group -->
      <div class="row form-group">
        <label for="listingBathrooms" class="col-sm-3 col-form-label input-label">Jabatan <span class="text-danger">*</span></label>
        <div class="col-sm-9">
          <div class="input-group input-group-down-break">
            <!-- Custom Radio -->
            <div class="form-control">
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" name="jabatan" id="jabatan1" value="Pelajar /  Mahasiswa" <?= ($user->JK == "Pelajar /  Mahasiswa" ? "checked" : "") ?>>
                <label class="custom-control-label" for="jabatan1">Pelajar / Mahasiswa</label>
              </div>
            </div>
            <!-- End Custom Radio -->

            <!-- Custom Radio -->
            <div class="form-control">
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" name="jabatan" id="jabatan2" value="Dosen / Guru" <?= ($user->JABATAN == "Dosen / Guru" ? "checked" : "") ?>>
                <label class="custom-control-label" for="jabatan2">Dosen / Guru</label>
              </div>
            </div>
            <!-- End Custom Radio -->

            <!-- Custom Radio -->
            <div class="form-control">
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" name="jabatan" id="jabatan3" value="3" <?= ($user->JABATAN == "3" ? "checked" : "") ?>>
                <label class="custom-control-label" for="jabatan3">Lainnya</label>
              </div>
            </div>
            <!-- End Custom Radio -->
          </div>
        </div>

        <!-- Form Group -->
        <div class="form-group <?= ($user->JABATAN == "Dosen / Guru" || $user->JABATAN == "Pelajar /  Mahasiswa" ? "hidden" : "") ?>" id="lainnya">
          <input type="text" class="form-control" name="lainnya" id="signinSrLainnya" value="<?= ($user->JABATAN == "Dosen / Guru" || $user->JABATAN == "Pelajar /  Mahasiswa" ? "" : $user->JABATAN) ?>" aria-label="Masukkan jabatan anda" data-msg="Harap masukkan jabatan anda.">
        </div>
        <!-- End Form Group -->
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
      <div class="card-footer d-flex justify-content-end">
        <button type="submit" class="btn btn-primary btn-sm">Simpan perubahan</button>
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
    <a href="<?= site_url('ubah-password') ?>" class="btn btn-danger btn-sm transition-3d-hover">ubah password</a>
    <small class="text-muted">Ubah password lama anda.</small>
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

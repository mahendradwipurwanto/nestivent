<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/stepy.css?<?= time() ?>">

<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col-lg-8 col-md-6 col-sm-8 col-xs-10 ">
      <!-- Social login form-->
      <div class="card card-bordered my-4">
        <div class="card-body p-4">
          <!-- login form-->
          <div class="wizard">
            <div class="wizard-inner">
              <div class="connecting-line"></div>
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                  <a href="#syarat" data-toggle="tab" aria-controls="syarat" role="tab" aria-expanded="fatruelse"><span class="round-tab">1 </span> </a>
                </li>
                <li role="presentation" class="disabled">
                  <a href="#akun" data-toggle="tab" aria-controls="akun" role="tab" aria-expanded="false"><span class="round-tab">2</span> </a>
                </li>
                <li role="presentation" class="disabled">
                  <a href="#informasi" data-toggle="tab" aria-controls="informasi" role="tab" aria-expanded="false"><span class="round-tab">3</span> </a>
                </li>
                <li role="presentation" class="disabled">
                  <a href="#selesai" data-toggle="tab" aria-controls="selesai" role="tab"><span class="round-tab">4</span> </a>
                </li>
              </ul>
            </div>

            <form role="form" action="<?= site_url('authentication/ajukan_penyelenggara') ?>" name="form" method="post" enctype="multipart/form-data" class="login-box">
              <div class="tab-content" id="main_form">
                <div class="tab-pane active" role="tabpanel" id="syarat">
                  <div class="row mb-2">
                    <div class="col-md-12 text-center">
                      <div class="text-gray-700 text-xl font-weight-700">Syarat dan Ketentuan</div>
                      <div class="text-gray-500 small">Harap baca syarat dan ketentuan berikut dengan teliti.</div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <!-- CONTENT -->
                      <div class="modal-dialog modal-dialog-scrollable" style="max-width: 100% !important" role="document">
                        <div class="modal-content">
                          <div class="modal-body">

                            <div class="row mb-4">
                              <div class="card card-frame h-100 col-12">
                                <div class="card-body">
                                  <!-- Icon Block -->
                                  <div class="media d-block d-sm-flex">
                                    <figure class="w-100 max-w-8rem mb-2 mb-sm-0 mr-sm-4">
                                      <img class="img-fluid" src="<?= base_url();?>assets/frontend/svg/icons/icon-20.svg" alt="SVG">
                                    </figure>
                                    <div class="media-body">
                                      <h2 class="h3">Akses AKUN</h2>
                                      <p class="font-size-1 text-body mb-0">Memiliki akun <b class="text-primary">NESTIVENT</b> yang telah <span class="text-success">terverifikasi</span>.</p>
                                    </div>
                                  </div>
                                  <!-- End Icon Block -->
                                </div>
                              </div>
                            </div>

                            <div class="row mb-2">
                              <div class="card card-frame h-100 col-12">
                                <div class="card-body">
                                  <!-- Icon Block -->
                                  <div class="media d-block d-sm-flex">
                                    <figure class="w-100 max-w-8rem mb-2 mb-sm-0 mr-sm-4">
                                      <img class="img-fluid" src="<?= base_url();?>assets/frontend/svg/icons/icon-2.svg" alt="SVG">
                                    </figure>
                                    <div class="media-body">
                                      <h2 class="h3">Data Keperluan</h2>
                                      <p class="font-size-1 text-body mb-0">Mengisi data keperluan pengajuan <mark>AKSES PENYELENGGARA</mark> dengan sebenar-benarnya.</p>
                                    </div>
                                  </div>
                                  <!-- End Icon Block -->
                                </div>
                              </div>
                            </div>
                            <p>
                              <ul>
                                <li class="mb-2">Pihak <b class="text-primary">NESTIVENT</b> berhak me-suspend akses penyelenggara anda jika:
                                  <ul>
                                    <li>Menyelenggarakan kegiatan yang bersifat <span class="text-danger">NEGATIF</span>.</li>
                                    <li>Melakukan <span class="text-danger">SCAM</span> kegiatan demi mendapat keuntungan.</li>
                                    <li><span class="text-danger">Menyalahgunakan</span> data peserta kegiatan.</li>
                                    <li><span class="text-danger">Menyalahgunakan</span> segala fitur <mark>AKSES PENYELENGGARA</mark>.</li>
                                  </ul>
                                </li>
                                <li class="mb-2">Proses pengajuan memakan waktu <span class="text-warning">2x24JAM</span> waktu kerja.</li>
                                <li class="mb-2">Anda akan menerima notifikasi pada akun <b class="text-primary">NESTIVENT</b> serta <i>EMAIL</i> anda mengenai pengajuan <mark>AKSES PENYELENGGARA</mark>.</li>
                                <li class="mb-2">Anda dapat menghubungi pihak <b class="text-primary">NESTIVENT</b> jika pengajuan anda masih belum mendapat balasan dalam batas waktu yang ditentukan.</li>
                              </ul>
                            </p>
                          </div>
                        </div>
                      </div>
                      <!-- END CONTENT -->
                    </div>
                  </div>
                  <hr class="mb-0 mt-0">
                  <div class="row">
                    <div class="col-md-12">
                      <button type="button" class="btn btn-block no-hover next-step">Ok, mengerti <i class="fa fa-vote-yea ml-2"></i> </button>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" role="tabpanel" id="akun">
                  <div class="row mb-4">
                    <div class="col-md-12 text-center">
                      <div class="text-gray-700 text-xl font-weight-700">Konfirmasi akun UTAMA</div>
                      <div class="text-gray-500 small">Pastikan data berikut merupakan benar akun UTAMA penyelenggara.</div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-md-12 mb-3">
                      <!-- CONTENT -->
                      <!-- Card -->
                      <div class="card card-bordered">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm mb-2 mb-sm-0">
                              <h5 class="text-cap mb-1">
                                <i class="fas fa-user mr-1"></i> <?php $nama = explode(" ", $this->session->userdata('nama')); echo $nama[0]; ?>
                                <small class="text-muted">
                                  <?= mb_substr($this->session->userdata('email'), 0, 3) ?>***@<?php $mail = explode("@", $this->session->userdata('email')); echo $mail[1]; ?>
                                </small>
                              </h5>
                              <small><span class="badge badge-primary">ADMIN</span> - Akun <mark>UTAMA</mark> akses PENYELENGGARA kegiatan anda.</small>
                            </div>

                            <div class="col-sm-auto">
                              <!-- Unfold -->
                              <a href="<?= site_url("logout?act=draft-penyelenggara"); ?>" class="btn btn-sm btn-primary">Logout dan ganti akun</a>
                              <!-- End Unfold -->
                            </div>
                          </div>
                          <!-- End Row -->
                        </div>
                      </div>
                      <!-- End Card -->
                      <!-- END CONTENT -->
                    </div>
                  </div>
                  <hr class="mb-4 mt-0">
                  <div class="row">
                    <div class="col-md-12 mb-0">
                      <!-- CONTENT -->

                      <!-- Form Group -->
                      <div class="js-add-field form-group"
                      data-hs-add-field-options='{
                      "template": "#addEmailFieldTemplate",
                      "container": "#addEmailFieldContainer",
                      "defaultCreated": 0
                    }'>
                    <label for="emailLabel" class="input-label title">Tambahkan <mark>KOLABOLATOR</mark> <small class="text-muted">(optional)</small></label>

                    <div class="input-group align-items-center">
                      <input type="email" class="js-masked-input form-control" name="kolabolator[]" id="emailLabel" placeholder="Masukkan email panitia kolabolator" aria-label="Masukkan email panitia kolabolator">

                      <div class="input-group-append">
                        <!-- Select -->
                        <select class="js-custom-select custom-select dropdown-toggle" name="bagian[]"
                        data-hs-select2-options='{
                        "minimumResultsForSearch": "Infinity",
                        "customClass": "custom-select",
                        "dropdownAutoWidth": true,
                        "width": true
                      }'>
                      <option value="1" selected>ADMIN</option>
                      <option value="2">PANITIA</option>
                    </select>
                    <!-- End Select -->
                  </div>
                </div>

                <!-- Container For Input Field -->
                <div id="addEmailFieldContainer"></div>

                <a href="javascript:;" class="js-create-field form-link btn btn-xs btn-no-focus btn-ghost-primary">
                  <i class="fas fa-plus mr-1"></i> Tambahkan <mark>PANITIA KOLABOLATOR</mark>
                </a>
              </div>
              <!-- End Form Group -->

              <!-- Add Phone Input Field -->
              <div id="addEmailFieldTemplate" style="display: none;">
                <div class="input-group input-group-add-field">
                  <input type="email" class="js-masked-input form-control" data-name="kolabolator[]" name="kolabolator[]" id="emailLabel" placeholder="Masukkan email panitia kolabolator" aria-label="Masukkan email panitia kolabolator">

                  <div class="input-group-append">
                    <!-- Select -->
                    <select class="js-custom-select-dynamic btn btn-white dropdown-toggle"
                    data-name="bagian[]" name="bagian[]"
                    data-hs-select2-options='{
                    "minimumResultsForSearch": "Infinity",
                    "customClass": "custom-select",
                    "dropdownAutoWidth": true,
                    "width": true
                  }'>
                  <option value="1" selected>ADMIN</option>
                  <option value="2">PANITIA</option>
                </select>
                <!-- End Select -->
              </div>

              <a class="js-delete-field input-group-add-field-delete" href="javascript:;">
                <i class="fas fa-times"></i>
              </a>
            </div>
          </div>
          <!-- End Add Phone Input Field -->
          <!-- END CONTENT -->
        </div>
      </div>
      <hr class="mb-0 mt-0">
      <div class="row">
        <div class="col-md-2 pr-0">
          <button type="button" class="btn btn-light btn-block prev-step"><i class="fa fa-chevron-left fa-lg"></i></button>
        </div>
        <div class="col-md-10">
          <button type="button" class="btn btn-block no-hover next-step">Lanjutkan <i class="fa fa-pen-fancy ml-2"></i></button>
        </div>
      </div>
    </div>
    <div class="tab-pane" role="tabpanel" id="informasi">
      <div class="row mb-4">
        <div class="col-md-12 text-center">
          <div class="text-gray-700 text-xl font-weight-700">Informasi Penyelenggara</div>
          <div class="text-gray-500 small">Isi data penyelenggara berikut dengan benar.</div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mb-0">
          <!-- CONTENT -->
          <!-- Form Group -->
          <div class="form-group">
            <label for="nameLabel" class="input-label">Nama penyelenggara <small class="text-danger">*</small></label>

            <input type="text" class="form-control" name="nama" id="nameLabel" placeholder="Masukkan nama penyelenggara" aria-label="Masukkan nama penyelenggara" required>
            <small class="text-muted">ex: NESTIVENT, KEMENDIKBUD, Lo Kreatif, etc</small>
          </div>
          <!-- End Form Group -->
          <!-- Form Group -->
          <div class="form-group">
            <label for="fotoLabel" class="input-label">Logo <small class="text-muted">(Optional)</small></label>
            <label for="GETL_FOTO" class="upload-card">
              <img id="L_FOTO" class="mb-2 upload-img w-100 L_FOTO cursor" src="<?php echo base_url();?>assets/frontend/img/others/Pickanimage.png" alt="Placeholder">
            </label>
            <input type="file" id="GETL_FOTO" class="form-control-file hidden" name="logo"  onchange="previewL_FOTO(this);" accept="image/*">
            <small class="text-muted">Max 2Mb size, and use 1:1 ratio.</small>
          </div>
          <!-- End Form Group -->
          <!-- Form Group -->
          <div class="form-group">
            <label for="instansiLabel" class="input-label">Asal instansi <small class="text-danger">*</small></label>

            <input type="text" class="form-control" name="instansi" id="instansiLabel" placeholder="Masukkan asal instansi anda" aria-label="Masukkan asal instansi anda" required>
            <small class="text-muted">Dari STIKI Malang, atau lembaga lain dengan persetujuan STIKI Malang.</small>
          </div>
          <!-- End Form Group -->
          <!-- Form Group -->
          <div class="form-group">
            <label for="instansiLabel" class="input-label">Deskripsi <small class="text-muted">(Optional)</small></label>

            <textarea id="deskripsi" class="form-control" rows="3" placeholder="Masukkan deskripsi singkat"></textarea>
          </div>
          <!-- End Form Group -->
          <!-- END CONTENT -->
        </div>
      </div>
      <hr class="mb-0 mt-0">
      <div class="row">
        <div class="col-md-2 pr-0">
          <button type="button" class="btn btn-light btn-block prev-step"><i class="fa fa-chevron-left fa-lg"></i></button>
        </div>
        <div class="col-md-10">
          <button type="button" class="btn btn-block no-hover next-step">Lanjutkan <i class="fa fa-pencil-alt ml-2"></i></button>
        </div>
      </div>
    </div>
    <div class="tab-pane" role="tabpanel" id="selesai">
      <div class="row mb-4">
        <div class="col-md-12 text-center">
          <div class="text-gray-700 text-lg font-weight-700">Pengajuan Siap Diajukan</div>
          <div class="text-gray-500 small">Harap cek kembali data dengan teliti sebelum melanjutkan.</div>
        </div>
      </div>
      <div class="row">

        <div class="col-md-12">
          <div class="text-center mx-md-auto">
            <i class="fas fa-file-archive text-primary fa-5x mb-3"></i>
            <div class="mb-5">
              <h1 class="h2">SIAP DIAJUKAN</h1>
              <p>Pengajuan <mark>AKSES PENYELENGGARA</mark> anda atas akun UTAMA <span class="text-primary">mahendra</span> siap diajukan, anda akan menerima notifikasi pada email dan akun <b class="text-primary">NESTIVENT</b> anda kurang dari <span class="text-warning">2x24JAM</span>.</p>
              <small class="text-muted">Harap hubungi kami, jika belum ada balasan dalam batas waktu</small>
            </div>
          </div>
        </div>

      </div>
      <hr class="mb-0 mt-0">
      <div class="row">
        <div class="col-md-2 pr-0">
          <button type="button" class="btn btn-light btn-block prev-step"><i class="fa fa-chevron-left fa-lg"></i></button>
        </div>
        <div class="col-md-10">
          <button type="submit" class="btn btn-block no-hover next-step" onclick="validateForm()">Kirim PENGAJUAN SEKARANG! <i class="fa fa-paper-plane ml-2"></i></button>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>

</form>
</div>
</div>
</div>
</div>
</div>
</div>

<script type="text/javascript">
// TINYMCE
tinymce.init({
  selector: 'textarea#deskripsi',
  height: 300,
  menubar: false,
  branding: false,
  plugins: [
  'advlist autolink lists link image charmap print preview anchor',
  'searchreplace visualblocks code fullscreen',
  'insertdatetime media table paste code help wordcount'
  ],
  toolbar: 'undo redo | formatselect | ' +
  'bold italic backcolor | alignleft aligncenter ' +
  'alignright alignjustify | bullist numlist outdent indent | ' +
  'removeformat | help',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});

// VALIDATION
function validateForm() {
  var a = document.forms["form"]["nama"].value;
  var c = document.forms["form"]["instansi"].value;
  if (a == null || a == "", c == null || c == "") {
    alert("Mohon lengkapi informasi penyelenggara!");
    return false;
  }
}

var form = document.querySelector('form');
form.onsubmit = function() {
  // Populate hidden form on submit
  var deskripsi = document.querySelector('input[name=deskripsi]');
  deskripsi.value = JSON.stringify(quill.getContents());
};

function previewL_FOTO(input){
  $(".L_FOTO").removeClass('hidden');
  var file = $("#GETL_FOTO").get(0).files[0];

  if(file){
    var reader = new FileReader();

    reader.onload = function(){
      $("#L_FOTO").attr("src", reader.result);
    }

    reader.readAsDataURL(file);
  }
}
</script>
<script src="<?php echo base_url();?>assets/frontend/js/stepy.js" type="text/javascript"></script>

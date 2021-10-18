<!-- Page Header -->
<div class="page-header">
  <div class="row align-items-end mb-3">
    <div class="col-sm">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-no-gutter">
          <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?= site_url('admin') ?>">Dashboard</a></li>
          <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?= site_url('k-panel/pengaturan') ?>">Pengaturan</a></li>
          <li class="breadcrumb-item active" aria-current="page">Informasi Umum</li>
        </ol>
      </nav>

      <h1 class="page-header-title">Pengaturan Informasi Umum <?= $this->session->userdata('penyelenggara_akses');?></h1>
    </div>
  </div>
  <!-- End Row -->
</div>
<!-- End Page Header -->

<div class="row">
  <div class="col-8">
    <div class="card">
      <div class="card-header">
        <h5 class="card-header-title">Informasi penyelenggara</h5>
      </div>
      <div class="card-body">
        <form action="<?= site_url('k_panel/ubah_informasi');?>" method="POST">
          <div class="form-group">
            <label class="input-title">Nama akun</label>
            <input type="text" class="form-control form-control-sm" name="NAMA_AKUN" value="<?= $penyelenggara->NAMA_AKUN;?>" required>
          </div>
          <div class="form-group">
            <label class="input-title">No Telepon</label>
            <input type="text" class="form-control form-control-sm" name="HP" value="<?= $penyelenggara->HP;?>" required>
          </div>
          <div class="form-group mb-0">
            <label class="input-title">Email</label>
            <input type="text" class="form-control form-control-sm" value="<?= $penyelenggara->EMAIL;?>" readonly>
          </div>
          <hr>
          <div class="form-group">
            <label class="input-title">Nama penyelenggara</label>
            <input type="text" class="form-control form-control-sm" name="NAMA" value="<?= $penyelenggara->NAMA_P;?>" required>
          </div>
          <div class="form-group">
            <label class="input-title">Instansi</label>
            <input type="text" class="form-control form-control-sm" name="INSTANSI" value="<?= $penyelenggara->INSTANSI;?>" required>
          </div>
          <div class="form-group">
            <label class="input-title">Alamat</label>
            <textarea type="text" class="form-control form-control-sm" name="ALAMAT" required><?= $penyelenggara->ALAMAT;?></textarea>
          </div>
          <div class="form-group">
            <label class="input-title">Deskripsi</label>
            <textarea id="richTextArea" type="text" class="form-control form-control-sm" name="DESKRIPSI" required><?= $penyelenggara->DESKRIPSI;?></textarea>
          </div>
          <div class="card-footer px-0">
            <button type="submit" class="btn btn-sm btn-primary float-right">Simpan perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-4">
    <div class="card mb-4">
      <div class="card-header">
        <h5 class="card-header-title">Informasi tambahan</h5>
      </div>
      <div class="card-body">
        <button type="button" class="btn btn-soft-primary btn-pill mr-1" data-toggle="modal" data-target="#ubah_logo"><i class="tio-image"></i> Logo penyelenggara</button>
      </div>
    </div>
    <div class="card">
    <!-- Header -->
    <div class="card-header">
      <h5 class="card-header-title">Social Media</h5>
      <button type="button" data-toggle="modal" data-target="#ubahSosmed" class="btn btn-xs btn-primary pull-right">manage</button>
    </div>
    <!-- End Header -->

    <!-- Body -->
    <div class="card-body">
      <ul class="list-unstyled list-unstyled-py-3 text-dark mb-3">
        <li class="py-0">
          <small class="card-subtitle">Link sosmed</small>
        </li>

        <li>
          <i class="tio-instagram nav-icon mr-1"></i>
          <a href="<?= $penyelenggara->INSTAGRAM;?>" class="text-muted" target="_blank"><?= ($penyelenggara->INSTAGRAM == null ? 'Belum diatur' : $penyelenggara->INSTAGRAM);?></a>
        </li>
        <li>
          <i class="tio-facebook nav-icon mr-1"></i>
          <a href="<?= $penyelenggara->FACEBOOK;?>" class="text-muted" target="_blank"><?= ($penyelenggara->FACEBOOK == null ? 'Belum diatur' : $penyelenggara->FACEBOOK);?></a>
        </li>
        <li>
          <i class="tio-twitter nav-icon mr-1"></i>
          <a href="<?= $penyelenggara->TWITTER;?>" class="text-muted" target="_blank"><?= ($penyelenggara->TWITTER == null ? 'Belum diatur' : $penyelenggara->TWITTER);?></a>
        </li>
        <li>
          <i class="tio-youtube nav-icon mr-1"></i>
          <a href="<?= $penyelenggara->GITHUB;?>" class="text-muted" target="_blank"><?= ($penyelenggara->GITHUB == null ? 'Belum diatur' : $penyelenggara->GITHUB);?></a>
        </li>
      </ul>
    </div>
    <!-- End Body -->
    </div>
  </div>
</div>
<!-- ubah password Modal -->
<div class="modal fade bd-example-modal-sm" id="ubahSosmed" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title h4" id="mySmallModalLabel">Manage Sosmed link</h5>
        <button type="button" class="btn btn-xs btn-icon btn-ghost-secondary" data-dismiss="modal" aria-label="Close">
          <i class="tio-clear tio-lg"></i>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('k_panel/ubah_sosmed') ?>" method="POST">
          <div class="form-group">
            <label class="input-label"><i class="tio-facebook nav-icon mr-1"></i> Instagram</label>
            <input type="text" class="form-control form-control-sm" name="INSTAGRAM" value="<?= ($penyelenggara->INSTAGRAM == null ? 'Belum diatur' : $penyelenggara->INSTAGRAM);?>" required>
          </div>
          <div class="form-group">
            <label class="input-label"><i class="tio-twitter nav-icon mr-1"></i> Twitter</label>
            <input type="text" class="form-control form-control-sm" name="TWITTER" value="<?= ($penyelenggara->TWITTER == null ? 'Belum diatur' : $penyelenggara->TWITTER);?>" required>
          </div>
          <div class="form-group">
            <label class="input-label"><i class="tio-instagram nav-icon mr-1"></i> Facebook</label>
            <input type="text" class="form-control form-control-sm" name="FACEBOOK" value="<?= ($penyelenggara->FACEBOOK == null ? 'Belum diatur' : $penyelenggara->FACEBOOK);?>" required>
          </div>
          <div class="form-group">
            <label class="input-label"><i class="tio-youtube nav-icon mr-1"></i> Youtube</label>
            <input type="text" class="form-control form-control-sm" name="GITHUB" value="<?= ($penyelenggara->GITHUB == null ? 'Belum diatur' : $penyelenggara->GITHUB);?>" required>
          </div>
          <hr>
          <button type="submit" class="btn btn-sm btn-success float-right">Ubah</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End ubah password Modal -->

<div id="ubah_logo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ubah_logo" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <form action="<?= site_url('k_panel/ubah_logo') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body pb-0">
          <!-- Form Group -->
          <div class="form-group mx-auto mb-2">
            <label for="fotoLabel" class="input-label">Logo penyelenggara</label>
            <label for="GETL_LOGO" class="upload-card mx-auto">
              <img id="L_LOGO" class="upload-img w-100 L_LOGO cursor" src="<?= ($penyelenggara->LOGO == null ? base_url().'assets/backend/frontend/img/others/Pickanimage.png' : base_url().'berkas/penyelenggara/'.$penyelenggara->KODE_PENYELENGGARA.'/'.$penyelenggara->LOGO);?>" alt="Placeholder">
            </label>
            <input type="file" id="GETL_LOGO" class="form-control-file hidden" name="LOGO"  onchange="previewL_LOGO(this);" accept="image/*">
            <small class="text-muted">Max 2Mb size, and use 1:1 ratio.</small>
          </div>
          <!-- End Form Group -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-sm btn-primary">Ubah foto</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">

  function previewL_LOGO(input){
    $(".L_LOGO").removeClass('hidden');
    var file = $("#GETL_LOGO").get(0).files[0];

    if(file){
      var reader = new FileReader();

      reader.onload = function(){
        $("#L_LOGO").attr("src", reader.result);
      }

      reader.readAsDataURL(file);
    }
  }
</script>
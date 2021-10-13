<!-- Page Header -->
<div class="page-header">
  <div class="row align-items-end mb-3">
    <div class="col-sm">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-no-gutter">
          <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?= site_url('admin') ?>">Dashboard</a></li>
          <li class="breadcrumb-item" aria-current="page">Pengaturan</li>
          <li class="breadcrumb-item active" aria-current="page">Website</li>
        </ol>
      </nav>

      <h1 class="page-header-title">Pengaturan website</h1>
    </div>
  </div>
  <!-- End Row -->
</div>
<!-- End Page Header -->

<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h5 class="card-header-title">Website</h5>
      </div>
      <div class="card-body">
        <button type="button" class="btn btn-soft-primary btn-pill mr-1" data-toggle="modal" data-target="#ubah_logoFav"><i class="tio-image"></i> favicon</button>
        <button type="button" class="btn btn-soft-primary btn-pill mr-1" data-toggle="modal" data-target="#ubah_logoBlack"><i class="tio-photo-square"></i> logo default</button>
        <button type="button" class="btn btn-soft-primary btn-pill" data-toggle="modal" data-target="#ubah_logoWhite"><i class="tio-photo-square-outlined"></i> logo inverse</button>
        <hr>
        <form action="<?= site_url('admin/ubah_websiteInfo') ?>" method="post">
          <div class="form-group">
            <label class="input-label">Judul</label>
            <input type="text" name="WEB_JUDUL" class="form-control" value="<?= $WEB_JUDUL;?>" required>
          </div>
          <div class="form-group">
            <label class="input-label">Deskripsi</label>
            <textarea type="text" name="WEB_DESKRIPSI" class="form-control" rows="3" required><?= $WEB_DESKRIPSI;?></textarea>
          </div>
          <div class="form-group">
            <label class="input-label">Contact (WA)</label>
            <!-- Input Group -->
            <div class="input-group input-group-merge">
              <div class="input-group-prepend">
                <span class="input-group-text p-2">
                  +62
                </span>
              </div>
              <input type="text" name="WEB_WA" class="form-control" minlength="10" value="<?= $WEB_WA;?>" required>
            </div>
            <!-- End Input Group -->
          </div>
          <div class="row">
            <div class="col-4">
              <div class="form-group">
                <label class="input-label">Hero button</label>
                <div class="onoffswitch">
                  <input type="checkbox" name="WEB_HERO_BUTTON" class="onoffswitch-checkbox" id="WEB_HERO_BUTTON" tabindex="0" <?= ($WEB_HERO_BUTTON == 1) ? "checked" : "";?>>
                  <label class="onoffswitch-label" for="WEB_HERO_BUTTON">
                    <span class="onoffswitch-inner"></span>
                    <span class="onoffswitch-switch"></span>
                  </label>
                </div>
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label class="input-label">Open Career?</label>
                <div class="onoffswitch">
                  <input type="checkbox" name="OPEN_CAREER" class="onoffswitch-checkbox" id="OPEN_CAREER" tabindex="0" <?= ($OPEN_CAREER == 1) ? "checked" : "";?>>
                  <label class="onoffswitch-label" for="OPEN_CAREER">
                    <span class="onoffswitch-inner"></span>
                    <span class="onoffswitch-switch"></span>
                  </label>
                </div>
              </div>
            </div>
          </div>
          <hr><br>
          <button type="submit" class="btn btn-sm btn-primary float-right">Simpan perubahan</button>
        </form>
      </div>
    </div>

  </div>

  <div class="col-md-4">

    <!-- Card -->
    <div class="card mb-3">
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
            <a href="<?= $LN_INSTAGRAM;?>" class="text-muted" target="_blank"><?= $LN_INSTAGRAM;?></a>
          </li>
          <li>
            <i class="tio-facebook nav-icon mr-1"></i>
            <a href="<?= $LN_FACEBOOK;?>" class="text-muted" target="_blank"><?= $LN_FACEBOOK;?></a>
          </li>
          <li>
            <i class="tio-twitter nav-icon mr-1"></i>
            <a href="<?= $LN_TWITTER;?>" class="text-muted" target="_blank"><?= $LN_TWITTER;?></a>
          </li>
          <li>
            <i class="tio-github nav-icon mr-1"></i>
            <a href="<?= $LN_GITHUB;?>" class="text-muted" target="_blank"><?= $LN_GITHUB;?></a>
          </li>
        </ul>
      </div>
      <!-- End Body -->
    </div>
    <!-- End Card -->

    <!-- Card -->
    <div class="card mb-3">
      <!-- Header -->
      <div class="card-header">
        <!-- <button type="button" data-toggle="modal" data-target="#ubahMegaMENUurut" class="btn btn-xs btn-primary">manage position</button> -->
        <button type="button" data-toggle="modal" data-target="#ubahMegaMENUdaftar" class="btn btn-xs float-right btn-primary">manage list</button>
      </div>
      <!-- End Header -->

      <!-- Body -->
      <div class="card-body">
        <ul class="list-unstyled list-unstyled-py-3 text-dark mb-3">
          <li class="py-0">
            <small class="card-subtitle">Mega menu penyelenggara</small>
          </li>

          <?php if ($mega_penyelenggara == false) :?>

            <!-- List Item -->
            <li>
              <div class="align-items-center text-center">
                <h5 class="text-muted mb-0">belum diatur</h5>
              </div>
            </li>
            <!-- End List Item -->

            <?php else: ?>
              <?php foreach ($mega_penyelenggara as $key) : ?>

                <!-- List Item -->
                <li>
                  <div class="d-flex align-items-center">
                    <a class="d-flex align-items-center mr-2">
                      <div class="avatar avatar-sm avatar-circle">
                        <img class="avatar-img" src="<?= ($key->LOGO == null ? base_url().'assets/frontend/img/100x100/img12.jpg' : base_url().'berkas/penyelenggara/'.$key->KODE_PENYELENGGARA.'/'.$key->LOGO);?>" alt="Image Description">
                      </div>
                      <div class="ml-3">
                        <h5 class="text-hover-primary mb-0"><?= $key->NAMA;?></h5>
                        <span class="font-size-sm text-body"><?= $key->INSTANSI;?></span>
                      </div>
                    </a>
                    <div class="ml-auto">
                      <!-- Checkbox -->
                      <div class="btn btn-soft-primary btn-pill">
                        <?= $key->POSITION;?>
                      </div>
                      <!-- End Checkbox -->
                    </div>
                  </div>
                </li>
                <!-- End List Item -->

              <?php endforeach;?>
            <?php endif;?>
          </ul>
        </div>
        <!-- End Body -->
      </div>
      <!-- End Card -->

    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="ubahMegaMENUdaftar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <!-- Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Daftar penyelenggara MEGA MENU</h5>
          <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary" data-dismiss="modal" aria-label="Close">
            <i class="tio-clear tio-lg" aria-hidden="true"></i>
          </button>
        </div>
        <!-- End Header -->
        <form action="<?= site_url('admin/atur_daftarPenyelenggara');?>" method="POST">
          <!-- Body -->
          <div class="modal-body">
            <!-- Select2 -->
            <select class="js-select2-custom custom-select" name="daftarPenyelenggara[]" multiple size="1" style="opacity: 0;"
            data-hs-select2-options='{
            "minimumResultsForSearch": "Infinity",
            "maximumSelectionLength": "5"
          }'>
          <?php foreach ($penyelenggara as $key) : ?>
            <option value="<?= $key->KODE_PENYELENGGARA;?>" <?= ($CI->M_admin->cek_menuPenyelenggara($key->KODE_PENYELENGGARA) == true) ? "selected" : ""?>><?= $key->NAMA;?></option>
          <?php endforeach;?>
        </select>
        <!-- End Select2 -->
      </div>
      <!-- End Body -->

      <!-- Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      <!-- End Footer -->
    </form>
  </div>
</div>
</div>
<!-- End Modal -->


<!-- ubah password Modal -->
<div class="modal fade bd-example-modal-sm" id="ubahMegaMENUurut" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title h4" id="mySmallModalLabel">Manage Mega Menu Penyelenggara</h5>
        <button type="button" class="btn btn-xs btn-icon btn-ghost-secondary" data-dismiss="modal" aria-label="Close">
          <i class="tio-clear tio-lg"></i>
        </button>
      </div>
      <div class="modal-body">
        <?php if ($mega_penyelenggara == false) :?>
          <p>Harap pilih lebih dari 2 penyelenggara!</p>
          <hr>
          <button type="button" class="btn btn-sm btn-light float-right" data-dismiss="modal">Tutup</button>
          <?php else: ?>
            <form action="" method="POST"><!-- List Group -->
              <div class="js-sortable list-group" id="sortable"
              data-hs-sortable-options='{
              "animation": 150,
              "swap": true,
              "swapClass": "active"
            }'>
            <?php $i = 1; foreach ($mega_penyelenggara as $key) : ?>
            <div class="list-group-item" id="<?= $i;?>" data-id="<?= $i;?>" ><?= $key->NAMA;?></div>
          <?php $i++; endforeach;?>
        </div>
        <span id="query"></span>
        <!-- End List Group -->
        <hr>
        <button type="button" id="get-order" class="btn btn-sm btn-success float-right">Get Order</button>
        <button type="submit" class="btn btn-sm btn-success float-right">Ubah</button>
      </form>
      <script src="https://unpkg.com/sortablejs-make/Sortable.min.js"></script>
      <script src="https://code.jquery.com/jquery-2.2.4.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/jquery-sortablejs@latest/jquery-sortable.js"></script>
    <?php endif;?>
    <script type="text/javascript">
            // List 1
            $('#sortable').sortable({
              store: {
                set: function (sortable) {
                  var order = sortable.toArray();
                  console.log(order);
                }
              }
            });

            // Arrays of "data-id"
            $('#get-order').click(function() {
                var sort1 = $('#sortable').toArray();
                console.log(sort1);
            }); 
          </script>
        </div>
      </div>
    </div>
  </div>
  <!-- End ubah password Modal -->


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
          <form action="<?= site_url('admin/ubah_sosmed') ?>" method="POST">
            <div class="form-group mb-0">
              <label class="input-label"><i class="tio-instagram nav-icon mr-1"></i> Facebook</label>
              <input type="text" class="form-control form-control-sm" name="LN_FACEBOOK" value="<?= $LN_FACEBOOK;?>" required>
            </div>
            <hr>
            <div class="form-group">
              <label class="input-label"><i class="tio-facebook nav-icon mr-1"></i> Instagram</label>
              <input type="text" class="form-control form-control-sm" name="LN_INSTAGRAM" value="<?= $LN_INSTAGRAM;?>" required>
            </div>
            <div class="form-group">
              <label class="input-label"><i class="tio-twitter nav-icon mr-1"></i> Twitter</label>
              <input type="text" class="form-control form-control-sm" name="LN_TWITTER" value="<?= $LN_TWITTER;?>" required>
            </div>
            <div class="form-group">
              <label class="input-label"><i class="tio-github nav-icon mr-1"></i> Github</label>
              <input type="text" class="form-control form-control-sm" name="LN_GITHUB" value="<?= $LN_GITHUB;?>" required>
            </div>
            <hr>
            <button type="submit" class="btn btn-sm btn-success float-right">Ubah</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End ubah password Modal -->



  <!-- CHANGE LOGO PROFIL -->

  <div id="ubah_logoFav" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ubah_logoFav" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
      <div class="modal-content">
        <form action="<?= site_url('admin/ubah_logoFav') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body pb-0">
            <!-- Form Group -->
            <div class="form-group mx-auto mb-2">
              <label for="fotoLabel" class="input-label">Logo Favicon</label>
              <label for="GETL_LOGO_FAV" class="upload-card mx-auto">
                <img id="L_LOGO_FAV" class="upload-img w-100 L_LOGO_FAV cursor" src="<?= ($LOGO_FAV == null ? base_url().'assets/backend/frontend/img/others/Pickanimage.png' : base_url().'assets/backend/'.$LOGO_FAV);?>" alt="Placeholder">
              </label>
              <input type="file" id="GETL_LOGO_FAV" class="form-control-file hidden" name="LOGO_FAV"  onchange="previewL_LOGO_FAV(this);" accept="image/*">
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

    function previewL_LOGO_FAV(input){
      $(".L_LOGO_FAV").removeClass('hidden');
      var file = $("#GETL_LOGO_FAV").get(0).files[0];

      if(file){
        var reader = new FileReader();

        reader.onload = function(){
          $("#L_LOGO_FAV").attr("src", reader.result);
        }

        reader.readAsDataURL(file);
      }
    }
  </script>

  <!-- CHANGE LOGO PROFIL -->

  <div id="ubah_logoWhite" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ubah_logoWhite" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
      <div class="modal-content bg-soft-secondary">
        <form action="<?= site_url('admin/ubah_logoWhite') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body pb-0">
            <!-- Form Group -->
            <div class="form-group mx-auto mb-2">
              <label for="fotoLabel" class="input-label">Logo Favicon</label>
              <label for="GETL_LOGO_WHITE" class="upload-card mx-auto">
                <img id="L_LOGO_WHITE" class="w-100 L_LOGO_WHITE cursor" src="<?= ($LOGO_WHITE == null ? base_url().'<?= base_url();?>assets/backend/frontend/img/others/Pickanimage.png' : base_url().'<?= base_url();?>assets/backend/'.$LOGO_WHITE);?>" alt="Placeholder">
              </label>
              <input type="file" id="GETL_LOGO_WHITE" class="form-control-file hidden" name="LOGO_WHITE"  onchange="previewL_LOGO_WHITE(this);" accept="image/*">
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

    function previewL_LOGO_WHITE(input){
      $(".L_LOGO_WHITE").removeClass('hidden');
      var file = $("#GETL_LOGO_WHITE").get(0).files[0];

      if(file){
        var reader = new FileReader();

        reader.onload = function(){
          $("#L_LOGO_WHITE").attr("src", reader.result);
        }

        reader.readAsDataURL(file);
      }
    }
  </script>

  <!-- CHANGE LOGO PROFIL -->

  <div id="ubah_logoBlack" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ubah_logoBlack" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
      <div class="modal-content">
        <form action="<?= site_url('admin/ubah_logoBlack') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body pb-0">
            <!-- Form Group -->
            <div class="form-group mx-auto mb-2">
              <label for="fotoLabel" class="input-label">Logo Favicon</label>
              <label for="GETL_LOGO_BLACK" class="upload-card mx-auto">
                <img id="L_LOGO_BLACK" class="w-100 L_LOGO_BLACK cursor" src="<?= ($LOGO_BLACK == null ? base_url().'<?= base_url();?>assets/backend/frontend/img/others/Pickanimage.png' : base_url().'<?= base_url();?>assets/backend/'.$LOGO_BLACK);?>" alt="Placeholder">
              </label>
              <input type="file" id="GETL_LOGO_BLACK" class="form-control-file hidden" name="LOGO_BLACK"  onchange="previewL_LOGO_BLACK(this);" accept="image/*">
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

    function previewL_LOGO_BLACK(input){
      $(".L_LOGO_BLACK").removeClass('hidden');
      var file = $("#GETL_LOGO_BLACK").get(0).files[0];

      if(file){
        var reader = new FileReader();

        reader.onload = function(){
          $("#L_LOGO_BLACK").attr("src", reader.result);
        }

        reader.readAsDataURL(file);
      }
    }
  </script>
<!-- Page Header -->
<div class="page-header">
  <div class="row align-items-end">
    <div class="col-sm mb-2 mb-sm-0">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-no-gutter">
          <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?= site_url('manage-event') ?>">Dashboard</a></li>
          <li class="breadcrumb-item">Pendaftaran</li>
          <li class="breadcrumb-item active" aria-current="page">Atur pendaftaran</li>
        </ol>
      </nav>

      <h1 class="page-header-title">Atur pendaftaran</h1>
    </div>

    <div class="col-sm-auto">
    </div>
  </div>
  <!-- End Row -->
</div>
<!-- End Page Header -->

<!-- Card -->

<form action="<?= site_url('manage_event/'.($cek_form == true ? 'proses_updatePendaftaran' : 'proses_aturPendaftaran'));?>" method="POST">

  <div class="row">

    <div class="col-9">
      <div class="card mb-4">
        <div class="card-body">
          <div class="alert alert-<?= $cek_form == true ? 'primary' : 'info';?> mb-0">
            <p class="mb-0"><?= $cek_form == true ? 'Anda telah mengatur formulir pendaftaran! anda dapat merubah formulir pendaftaran jika diperlukan.<br> <b>PERHATIAN!</b> <i>Peserta yang telah mendaftaran, harus melakukan pendaftaran ulang jika dilakukan perubahan formulir pendaftaran!!</i>' : 'Pendaftaran pada event tidak akan terbuka sebelum anda mengatur form pendaftaran, harap mengatur form pendaftaran sebaik mungkin.';?></p>
          </div>
          <hr>
          <fieldset>
            <legend>Formulir wajib</legend>
            <div class="row mb-0">
              <div class="col-6">
                <div class="form-group">
                  <label class="input-label">Nama</label>
                  <input type="text" class="form-control form-control-flush" readonly>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label class="input-label">Email</label>
                  <input type="email" class="form-control form-control-flush" readonly>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label class="input-label">Nomor Telepon</label>
                  <input type="text" class="form-control form-control-flush" readonly>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group mb-0">
                  <label class="input-label">Asal Instansi</label>
                  <input type="text" class="form-control form-control-flush" readonly>
                </div>
              </div>
            </div>
          </fieldset>
        </div>
      </div>
      <div class="alert alert-info shadow mb-4">
        <p class="mb-0">Tambahkan formulir sesuai dengan kebutuhan anda</p>
      </div>

      <div id="dynamic_field">

        <?php if($cek_form == true):?>
          <?php if($get_form == true):?>
            <?php foreach ($get_form as $form):?>
              <?php if ($form->TYPE == "TEXT" || $form->TYPE == "TEXTAREA") :?>

                <input type="hidden" name="TAMBAH[]" value="false">
                <input type="hidden" name="ID_FORM[]" value="<?= $form->ID_FORM;?>">
                <div class="card card-body mb-4">
                  <div class="row mb-0">
                    <div class="col-9">
                      <div class="form-group">
                        <input type="text" class="form-control form-control-flush" name="PERTANYAAN[]" value="<?= $form->PERTANYAAN;?>" required>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                        <?php if($form->TYPE == "FILE"):?>
                          <input type="text" class="form-control form-control-flush" value="Upload file" readonly>
                          <input type="hidden" name="TIPE[]" value="FILE" readonly>
                          <?php else: ?>
                            <select class="custom-select custom-select-flush" name="TIPE[]">
                              <optgroup label="selected">
                                <option value="<?= $form->TYPE;?>">
                                  <?= ($form->TYPE == "TEXT" ? "Jawaban singkat" : "Paragraf");?>
                                </option>
                              </optgroup>
                              <optgroup label="changes">
                                <option value="TEXT">
                                  Jawaban singkat
                                </option>
                                <option value="TEXTAREA">
                                  Paragraf
                                </option>
                                <option value="FILE">
                                  Upload file
                                </option>
                              </optgroup>
                            </select>
                          <?php endif;?>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group mb-0">
                          <textarea type="text" class="form-control form-control-flush <?= $form->KETERANGAN != null  || isset($form->KETERANGAN) ? '' : 'd-none';?>" id="ket_form<?= $form->ID_FORM;?>" name="KETERANGAN[]" rows="1"><?= $form->KETERANGAN;?></textarea>
                          <input type="hidden" id="status_ket<?= $form->ID_FORM;?>" value="0" />
                        </div>
                      </div>
                    </div>
                    <div class="row mt-4 pt-3 border-top">
                      <div class="col-8">
                        <button type="button" class="btn btn-light float-right btn-sm btn_remove" onclick=""><i class="tio-delete"></i></button>
                      </div>
                      <div class="col-1 border-left">
                        <button type="button" class="btn btn-light btn-sm <?= $form->KETERANGAN != null  || isset($form->KETERANGAN) ? 'text-info' : '';?>" id="btn_ket<?= $form->ID_FORM;?>"><i class="tio-text"></i></button>
                      </div>
                      <div class="col-3">
                        <div class="form-group mb-0">
                          <label class="toggle-switch d-flex align-items-center" for="REQUIRED<?= $form->ID_FORM;?>">
                            <input type="checkbox" class="toggle-switch-input" name="REQUIRED[]" id="REQUIRED<?= $form->ID_FORM;?>" <?= ($form->REQUIRED == 1) ? "checked" : "";?>>
                            <span class="toggle-switch-label">
                              <span class="toggle-switch-indicator"></span>
                            </span>
                            <span class="toggle-switch-content">
                              <span class="d-block">Wajib diisi?</span>
                            </span>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php elseif($form->TYPE == "FILE"):?>

                    <input type="hidden" name="TAMBAH[]" value="false">
                    <input type="hidden" name="ID_FORM[]" value="<?= $form->ID_FORM;?>">
                    <div class="card card-body mb-4">
                      <div class="row mb-0">
                        <div class="col-9">
                          <div class="form-group"><input type="text" class="form-control form-control-flush" name="PERTANYAAN[]" value="<?= $form->PERTANYAAN;?>" required /></div>
                        </div>
                        <div class="col-3">
                          <div class="form-group"><input type="text" class="form-control form-control-flush" value="Upload file" readonly /><input type="hidden" name="TIPE[]" value="FILE" readonly /></div>
                        </div>
                      </div>
                      <div class="row mb-0">
                        <div class="col-4">
                          <label class="input-label">Ukuran file</label>
                          <div class="form-group">
                            <select class="js-select2-custom custom-select custom-select-sm custom-select-flush" size="1" name="FILE_SIZE[]"
                            data-hs-select2-options='{
                            "minimumResultsForSearch": "Infinity"
                          }'>
                          <optgroup label="Current">
                            <option value="<?= $form->FILE_SIZE;?>"><?= $form->FILE_SIZE;?> MB</option>
                          </optgroup>
                          <optgroup label="Change">
                            <option value="1">1 MB</option>
                            <option value="10">10 MB</option>
                            <option value="100">100 MB</option>
                          </optgroup>
                        </select>
                      </div>
                    </div>
                    <div class="col-8">
                      <label class="input-label">Jenis file yang diinjinkan</label>
                      <div class="row mb-0">
                        <div class="col-6">
                          <div class="form-group">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" id="gambarCheck<?= $form->ID_FORM;?>" class="custom-control-input" name="FILE_TYPE[]" value="1" checked /> <label class="custom-control-label" for="gambarCheck<?= $form->ID_FORM;?>">Gambar</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" id="dokumenCheck<?= $form->ID_FORM;?>" class="custom-control-input" name="FILE_TYPE[]" value="2" /> <label class="custom-control-label" for="dokumenCheck<?= $form->ID_FORM;?>">Dokumen (word, ppt, excel)</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" id="pdfCheck<?= $form->ID_FORM;?>" class="custom-control-input" name="FILE_TYPE[]" value="3" /> <label class="custom-control-label" for="pdfCheck<?= $form->ID_FORM;?>">PDF</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" id="videoCheck<?= $form->ID_FORM;?>" class="custom-control-input" name="FILE_TYPE[]" value="4" /> <label class="custom-control-label" for="videoCheck<?= $form->ID_FORM;?>">Video</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-0">
                    <div class="col-12">
                      <div class="form-group mb-0">
                        <textarea type="text" class="form-control form-control-flush d-none" id="ket<?= $form->ID_FORM;?>" name="KETERANGAN[]" rows="1" placeholder="Keterangan"></textarea><input type="hidden" id="status_ket<?= $form->ID_FORM;?>" value="0" />
                      </div>
                    </div>
                  </div>
                  <div class="row mt-4 pt-3 border-top">
                    <div class="col-8">
                      <button type="button" class="btn btn-light float-right btn-sm btn_remove" id="<?= $form->ID_FORM;?>"><i class="tio-delete"></i></button>
                    </div>
                    <div class="col-1 border-left">
                      <button type="button" class="btn btn-light btn-sm btn_ket" id="<?= $form->ID_FORM;?>"><i class="tio-text"></i></button>
                    </div>
                    <div class="col-3">
                      <div class="form-group mb-0">
                        <label class="toggle-switch d-flex align-items-center" for="REQUIRED<?= $form->ID_FORM;?>">
                          <input type="checkbox" class="toggle-switch-input" name="REQUIRED[]" id="REQUIRED<?= $form->ID_FORM;?>" /><span class="toggle-switch-label"><span class="toggle-switch-indicator"></span></span>
                          <span class="toggle-switch-content"><span class="d-block">Wajib diisi?</span></span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <?php else:?>

                  <input type="hidden" name="TAMBAH[]" value="false">
                  <input type="hidden" name="ID_FORM[]" value="<?= $form->ID_FORM;?>">

                  <div class="card card-body mb-4">
                    <div class="row mb-0">
                      <div class="col-9">
                        <div class="form-group"><input type="text" class="form-control form-control-flush" name="PERTANYAAN[]" value="<?= $form->PERTANYAAN;?>" required /></div>
                      </div>
                      <div class="col-3">
                        <div class="form-group">
                          <select class="custom-select custom-select-flush" name="TIPE[]">
                            <option value="RADIO" selected> Pilihan ganda </option>
                            <option value="CHECK"> Kotak centang </option>
                            <option value="SELECT"> Drop-down </option>
                          </select>
                        </div>
                      </div>
                      <div class="col-12">
                        <?php if($CI->M_manage->get_formItem($form->ID_FORM) == false):?>
                          <div class="row">
                            <div class="col-11">
                              <input type="text" class="form-control form-control-flush" name="ITEM[]" placeholder="Tambahkan item" />
                            </div>
                          </div>
                          <?php else:?>
                            <?php foreach ($CI->M_manage->get_formItem($form->ID_FORM) as $item) :?>
                              <div class="row">
                                <div class="col-11">
                                  <input type="text" class="form-control form-control-flush" name="ITEM[]" value="<?= $item->ITEM;?>" />
                                </div>
                                <div class="col-1">
                                  <button type="button" class="btn btn-light float-right btn-sm"><i class="tio-delete"></i></button>
                                </div>
                              </div>
                            <?php endforeach;?>
                          <?php endif;?>
                          <div id="addMultiContainer"></div>
                          <div class="row">
                            <div class="col-12">
                              <button type="button" class="form-link btn btn-sm btn-no-focus btn-ghost-primary add_multiItem"><i class="fas fa-plus mr-1"></i> Tambah</button>
                            </div>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group mb-0">
                            <textarea type="text" class="form-control form-control-flush <?= $form->KETERANGAN != null  || isset($form->KETERANGAN) ? '' : 'd-none';?>" id="ket_form<?= $form->ID_FORM;?>" name="KETERANGAN[]" rows="1"><?= $form->KETERANGAN;?></textarea>
                            <input type="hidden" id="status_ket<?= $form->ID_FORM;?>" value="0" />
                          </div>
                        </div>
                      </div>
                      <div class="row mt-4 pt-3 border-top">
                        <div class="col-8">
                          <button type="button" class="btn btn-light float-right btn-sm btn_remove"><i class="tio-delete"></i></button>
                        </div>
                        <div class="col-1 border-left">
                          <button type="button" class="btn btn-light btn-sm <?= $form->KETERANGAN != null  || isset($form->KETERANGAN) ? 'text-info' : '';?>" id="btn_ket<?= $form->ID_FORM;?>"><i class="tio-text"></i></button>
                        </div>
                        <div class="col-3">
                          <div class="form-group mb-0">
                            <label class="toggle-switch d-flex align-items-center" for="REQUIRED<?= $form->ID_FORM;?>">
                              <input type="checkbox" class="toggle-switch-input" name="REQUIRED[]" id="REQUIRED<?= $form->ID_FORM;?>" <?= ($form->REQUIRED == 1) ? "checked" : "";?> /><span class="toggle-switch-label"><span class="toggle-switch-indicator"></span></span>
                              <span class="toggle-switch-content"><span class="d-block">Wajib diisi?</span></span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endif;?>
                  <script type="text/javascript">
                    $(document).on('click', '#btn_ket<?= $form->ID_FORM;?>', function(){ 
                      status = $('#status_ket<?= $form->ID_FORM;?>').val();
                      if (status == 1) { 
                        $('#status_ket<?= $form->ID_FORM;?>').val(0);
                        $("#ket_form<?= $form->ID_FORM;?>").removeClass('d-none');
                        $(this).removeClass('text-info'); 
                      }else{
                        $('#status_ket<?= $form->ID_FORM;?>').val(1);
                        $("#ket_form<?= $form->ID_FORM;?>").addClass('d-none');
                        $(this).addClass('text-info');   
                      }
                    });
                  </script>

                <?php endforeach;?>
              <?php endif;?>
            <?php endif;?>

          </div>

        </div>
        <div class="col-3">
          <div class="sticky-top">
            <button type="submit" class="btn btn-sm btn-primary btn-block"><?= $cek_form == true ? 'Update' : 'Atur';?> formulir</button>
            <?php if($cek_form == true):?>
              <a href="<?= site_url('daftar/'.$this->session->userdata('manage_event'));?>" target="_blank" class="btn btn-sm btn-info btn-block">Lihat formulir</a>
            <?php endif;?>
            <hr>
            <div class="card">
              <div class="card-header">
                <h5 class="card-header-title">Tambahkan form</h5>
              </div>
              <div class="card-body">
                <button type="button" class="btn btn-sm btn-light btn-block text-left" id="add_text"><i class="tio-file mr-2"></i>Jawaban</button>
                <button type="button" class="btn btn-sm btn-light btn-block text-left" id="add_multi"><i class="tio-file mr-2"></i>Multi jawaban</button>
                <button type="button" class="btn btn-sm btn-light btn-block text-left" id="add_file"><i class="tio-file mr-2"></i>Upload file</button>
              </div>
            </div>
            <div class="alert alert-info shadow mt-3">
              <p class="mb-0">Versi ini masih belum memuat update formulir untuk tipe <i>Pilihan ganda, Kotak centang,</i> dan <i>Drop down</i>.</p>
            </div>
          </div>
        </div>

      </div>

    </form>
    <!-- End Card -->

    <script>  
     $(document).ready(function(){  
      var i=1;  
      var a=1;  

      $('#add_text').click(function(){  
       i++;  
       $('#dynamic_field').append('<input type="hidden" name="ID_FORM[]" value=""><input type="hidden" name="ITEM_SPLIT[]"  value=""/><input type="hidden" name="FILE_SIZE[]" value=""><input type="hidden" name="FILE_TYPE[]" value=""><div class="card card-body mb-4" id="row'+i+'"><div class="row mb-0"><div class="col-9"><div class="form-group"><input type="text" class="form-control form-control-flush" name="PERTANYAAN[]" placeholder="Pertanyaan anda" required></div></div><div class="col-3"><div class="form-group"><select class="custom-select custom-select-flush" name="TIPE[]"><option value="TEXT" selected>Jawaban singkat </option><option value="TEXTAREA">Paragraf </option></select></div></div><div class="col-12"><div class="form-group mb-0"><textarea type="text" class="form-control form-control-flush d-none" id="ket'+i+'" name="KETERANGAN[]" rows="1" placeholder="Keterangan"></textarea><input type="hidden" id="status_ket'+i+'" value="0"></div></div></div><div class="row mt-4 pt-3 border-top"><div class="col-8"><button type="button" class="btn btn-light float-right btn-sm btn_remove" id="'+i+'"><i class="tio-delete"></i></button></div><div class="col-1 border-left"><button type="button" class="btn btn-light btn-sm btn_ket" id="'+i+'"><i class="tio-text"></i></button></div><div class="col-3"><div class="form-group mb-0"><label class="toggle-switch d-flex align-items-center" for="REQUIRED'+i+'"><input type="checkbox" class="toggle-switch-input" name="REQUIRED[]" id="REQUIRED'+i+'"><span class="toggle-switch-label"><span class="toggle-switch-indicator"></span></span><span class="toggle-switch-content"><span class="d-block">Wajib diisi?</span></span></label></div></div></div></div>');  
     });  

      $('#add_multi').click(function(){  
       i++;  
       $('#dynamic_field').append('<input type="hidden" name="ITEM_SPLIT[]" id="split'+i+'" value="1"/><input type="hidden" name="ID_FORM[]" value=""/><input type="hidden" name="FILE_SIZE[]" value=""><input type="hidden" name="FILE_TYPE[]" value=""><div class="card card-body mb-4" id="row'+i+'"><div class="row mb-0"><div class="col-9"><div class="form-group"><input type="text" class="form-control form-control-flush" name="PERTANYAAN[]" placeholder="Pertanyaan anda" required/></div></div><div class="col-3"><div class="form-group"><select class="custom-select custom-select-flush" name="TIPE[]"><option value="RADIO" selected> Pilihan ganda </option><option value="CHECK"> Kotak centang </option><option value="SELECT"> Drop-down </option></select></div></div><div class="col-12"><div class="row"><div class="col-11"><input type="text" class="form-control form-control-flush" name="ITEM[]" id="itemName'+i+'" placeholder="Tambahkan item"/></div></div><div id="addMultiContainer'+i+'"></div><div class="row"><div class="col-12"><button type="button" class="form-link btn btn-sm btn-no-focus btn-ghost-primary add_multiItem" id="'+i+'"><i class="fas fa-plus mr-1"></i> Tambah</button></div></div></div><div class="col-12"><div class="form-group mb-0"><textarea type="text" class="form-control form-control-flush d-none" id="ket'+i+'" name="KETERANGAN[]" rows="1" placeholder="Keterangan"></textarea><input type="hidden" id="status_ket'+i+'" value="0"></div></div></div><div class="row mt-4 pt-3 border-top"><div class="col-8"><button type="button" class="btn btn-light float-right btn-sm btn_remove" id="'+i+'"><i class="tio-delete"></i></button></div><div class="col-1 border-left"><button type="button" class="btn btn-light btn-sm btn_ket" id="'+i+'"><i class="tio-text"></i></button></div><div class="col-3"><div class="form-group mb-0"><label class="toggle-switch d-flex align-items-center" for="REQUIRED'+i+'"><input type="checkbox" class="toggle-switch-input" name="REQUIRED[]" id="REQUIRED'+i+'"><span class="toggle-switch-label"><span class="toggle-switch-indicator"></span></span><span class="toggle-switch-content"><span class="d-block">Wajib diisi?</span></span></label></div></div></div></div>'); 
     }); 

      $(document).on('click', '.add_multiItem', function(){  
       var button_id = $(this).attr("id"); 
       $('#split'+button_id+'').val(function(i, val) { return val*1+1 });
       a++;
       $('#addMultiContainer'+button_id).append('<div class="row" id=rowItem'+a+'> <div class="col-11"> <input type="text" class="form-control form-control-flush" name="ITEM[]" id="itemName'+i+'" placeholder="Tambahkan item"> </div><div class="col-1"><button type="button" class="btn btn-light float-right btn-sm btn_removeItem" id="'+a+'"><i class="tio-delete"></i></button></div></div>');  
     });  

      $('#add_file').click(function(){  
       i++;  
       $('#dynamic_field').append('<input type="hidden" name="ID_FORM[]" value=""/><input type="hidden" name="ITEM_SPLIT[]"  value=""/><div class="card card-body mb-4" id="row'+i+'"> <div class="row mb-0"> <div class="col-9"> <div class="form-group"><input type="text" class="form-control form-control-flush" name="PERTANYAAN[]" placeholder="Pertanyaan anda" required/></div></div><div class="col-3"> <div class="form-group"><input type="text" class="form-control form-control-flush" value="Upload file" readonly/><input type="hidden" name="TIPE[]" value="FILE" readonly/></div></div></div><div class="row mb-0"> <div class="col-4"> <label class="input-label">Ukuran file</label> <div class="form-group"> <select class="js-select2-custom custom-select custom-select-sm custom-select-flush" size="1" name="FILE_SIZE[]" data-hs-select2-options=\'{"minimumResultsForSearch": "Infinity"}\'> <option value="1">1 MB</option> <option value="10">10 MB</option> <option value="100">100 MB</option> </select> </div></div><div class="col-8"> <label class="input-label">Jenis file yang diinjinkan</label> <div class="row mb-0"> <div class="col-6"> <div class="form-group"> <div class="custom-control custom-checkbox"> <input type="checkbox" id="gambarCheck'+i+'" class="custom-control-input" name="FILE_TYPE[]" value="png|jpg|jpeg" checked/> <label class="custom-control-label" for="gambarCheck'+i+'">Gambar</label> </div></div><div class="form-group"> <div class="custom-control custom-checkbox"> <input type="checkbox" id="dokumenCheck'+i+'" class="custom-control-input" name="FILE_TYPE[]" value="doc|docx|ppt|pptx|xls|xlsx"/> <label class="custom-control-label" for="dokumenCheck'+i+'">Dokumen (word, ppt, excel)</label> </div></div></div><div class="col-6"> <div class="form-group"> <div class="custom-control custom-checkbox"> <input type="checkbox" id="pdfCheck'+i+'" class="custom-control-input" name="FILE_TYPE[]" value="pdf"/> <label class="custom-control-label" for="pdfCheck'+i+'">PDF</label> </div></div><div class="form-group"> <div class="custom-control custom-checkbox"> <input type="checkbox" id="videoCheck'+i+'" class="custom-control-input" name="FILE_TYPE[]" value="mp4|avi"/> <label class="custom-control-label" for="videoCheck'+i+'">Video</label> </div></div></div></div></div></div><div class="row mb-0"> <div class="col-12"> <div class="form-group mb-0"> <textarea type="text" class="form-control form-control-flush d-none" id="ket'+i+'" name="KETERANGAN[]" rows="1" placeholder="Keterangan"></textarea><input type="hidden" id="status_ket'+i+'" value="0"/> </div></div></div><div class="row mt-4 pt-3 border-top"> <div class="col-8"> <button type="button" class="btn btn-light float-right btn-sm btn_remove" id="'+i+'"><i class="tio-delete"></i></button> </div><div class="col-1 border-left"> <button type="button" class="btn btn-light btn-sm btn_ket" id="'+i+'"><i class="tio-text"></i></button> </div><div class="col-3"> <div class="form-group mb-0"> <label class="toggle-switch d-flex align-items-center" for="REQUIRED'+i+'"> <input type="checkbox" class="toggle-switch-input" name="REQUIRED[]" id="REQUIRED'+i+'"/><span class="toggle-switch-label"><span class="toggle-switch-indicator"></span></span> <span class="toggle-switch-content"><span class="d-block">Wajib diisi?</span></span> </label> </div></div></div></div>');  
     });  

      $(document).on('click', '.btn_remove', function(){  
       var button_id = $(this).attr("id");   
       $('#row'+button_id+'').remove();  
     }); 

      $(document).on('click', '.btn_ket', function(){  
       var button_id = $(this).attr("id");   
       status = $('#status_ket'+button_id+'').val();
       if (status == 1) { 
        $('#status_ket'+button_id).val(0);
        $('#ket'+button_id+'').addClass('d-none'); 
        $(this).removeClass('text-info'); 
      }else{
        $('#status_ket'+button_id+'').val(1);
        $('#ket'+button_id+'').removeClass('d-none');
        $(this).addClass('text-info');   
      }
    });  

      $(document).on('click', '.btn_removeItem', function(){  
       var button_id = $(this).attr("id");   
       $('#rowItem'+button_id+'').remove();  
     }); 
    });  
  </script>
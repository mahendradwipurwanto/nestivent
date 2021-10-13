<style type="text/css">
	.input-group-add-field-delete {
		position: relative;
		top: 2.4rem;
		right: 0.5rem;
		width: 1rem;
		color: #ed4c78;
		opacity: 100% !important; 
		margin-right: -1rem;
		padding-left: .25rem;
		z-index: 9999;
	}
</style>
<!-- Page Header -->
<div class="page-header">
	<div class="row align-items-end">
		<div class="col-sm mb-2 mb-sm-0">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb breadcrumb-no-gutter">
					<li class="breadcrumb-item"><a class="breadcrumb-link" href="<?= site_url('k-panel') ?>">Dashboard</a></li>
					<li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Event</a></li>
					<li class="breadcrumb-item active" aria-current="page">Buat event</li>
				</ol>
			</nav>

			<h1 class="page-header-title">Buat event</h1>
		</div>

		<div class="col-sm-auto">
		</div>
	</div>
	<!-- End Row -->
</div>
<!-- End Page Header -->

<form action="<?= site_url('k_panel/proses_buatEvent') ?>" method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h5 class="card-header-title">Data Event</h5>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-9">
							<div class="form-group">
								<label class="input-label font-weight-bold">JENIS EVENT <small class="text-danger">*</small></label>
								<div class="input-group input-group-down-break">
									<!-- Custom Radio -->
									<div class="form-control">
										<div class="custom-control custom-radio">
											<input type="radio" class="custom-control-input" name="JENIS" id="JENIS1" value="1" checked>
											<label class="custom-control-label" for="JENIS1">SEMINAR / WEBINAR</label>
										</div>
									</div>
									<!-- End Custom Radio -->

									<!-- Custom Radio -->
									<div class="form-control">
										<div class="custom-control custom-radio">
											<input type="radio" class="custom-control-input" name="JENIS" id="JENIS2" value="2">
											<label class="custom-control-label" for="JENIS2">KULIAH TAMU</label>
										</div>
									</div>
									<!-- End Custom Radio -->

									<!-- Custom Radio -->
									<div class="form-control">
										<div class="custom-control custom-radio">
											<input type="radio" class="custom-control-input" name="JENIS" id="JENIS3" value="3">
											<label class="custom-control-label" for="JENIS3">WORKSHOP</label>
										</div>
									</div>
									<!-- End Custom Radio -->
								</div>
							</div>
							<div class="form-group">
								<label class="input-label font-weight-bold">JUDUL <small class="text-danger">*</small></label>
								<input type="text" class="form-control form-control-sm" name="JUDUL" placeholder="Masukkan Judul Event" required>
							</div>
							<div class="row">
								<div class="col-4">
									<div class="form-group">
										<label class="input-label font-weight-bold">Tanggal <small class="text-danger">*</small></label>
										<input type="date" class="form-control form-control-sm" name="TANGGAL" required>
									</div>
								</div>
								<div class="col-2">
									<div class="form-group">
										<label class="input-label font-weight-bold">Waktu <small class="text-danger">*</small></label>
										<input type="time" class="form-control form-control-sm" name="WAKTU" required>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label class="input-label font-weight-bold">Media / Tempat <small class="text-danger">*</small></label>
										<input type="text" name="MEDIA" class="form-control form-control-sm" placeholder="Media / Tempat event" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-3">
									<label class="toggle-switch d-flex align-items-center mb-3" for="bayar">
										<input type="checkbox" class="toggle-switch-input" name="BAYAR" id="bayar">
										<span class="toggle-switch-label">
											<span class="toggle-switch-indicator"></span>
										</span>
										<span class="toggle-switch-content">
											<span class="d-block">Berbayar?</span>
										</span>
									</label>
									<!-- End Checkbox Switch -->
								</div>
								<div class="col-3">
									<label class="toggle-switch d-flex align-items-center mb-3" for="online">
										<input type="checkbox" class="toggle-switch-input" name="ONLINE" id="online">
										<span class="toggle-switch-label">
											<span class="toggle-switch-indicator"></span>
										</span>
										<span class="toggle-switch-content">
											<span class="d-block">Online?</span>
										</span>
									</label>
									<!-- End Checkbox Switch -->
								</div>
								<div class="col-2">
									<button type="button" class="btn btn-xs btn-primary btn-block" id="aturSosmed" data-toggle="modal" data-target="#sosmed">Social Media</button>
								</div>
								<div class="col-2">
									<button type="button" class="btn btn-xs btn-primary btn-block" id="aturContact" data-toggle="modal" data-target="#contact">Contact</button>
								</div>
								<div class="col-2">
									<button type="button" class="btn btn-xs btn-primary btn-block d-none" id="aturTiket" data-toggle="modal" data-target="#tiket">Atur Tiket</button>
								</div>
							</div>
							<div class="form-group">
								<label class="input-label font-weight-bold">Deskripsi <small class="text-danger">*</small></label>
								<textarea type="text" id="artikel" class="form-control form-control-sm" name="DESKRIPSI" placeholder="Masukkan Deskripsi"></textarea>
							</div>
						</div>
						<div class="col-3">
							<!-- End Form Group -->
							<button type="submit" class="btn btn-sm btn-primary btn-block">Buat Event</button>
							<hr>
							<div class="form-group">
								<label for="fotoLabel" class="input-label font-weight-bold">Poster</label>
								<label for="Get_posterImage" class="upload-card mx-auto" style="width: 200px; height: auto !important">
									<img id="Display_posterImage" class="upload-img w-100 Display_posterImage cursor" src="<?= base_url().'assets/frontend/img/others/Pickanimage.png';?>" alt="Placeholder">
								</label>
								<input type="file" id="Get_posterImage" class="form-control-file hidden" name="POSTER"  onchange="previewDisplay_posterImage(this);" accept="image/*" required>
								<small class="text-muted">Max 2Mb size.</small>
							</div>
						</div>

					</div>
				</div>
			</div>

		</div>
	</div>

	<div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambahkan Contact Person</h5>
					<button type="button" class="btn btn-xs btn-icon btn-soft-secondary" data-dismiss="modal" aria-label="Close">
						<svg aria-hidden="true" width="10" height="10" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
							<path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z"/>
						</svg>
					</button>
				</div>
				<div class="modal-body pb-0">
					<div class="col-md-12 px-0 mb-0">
						<!-- CONTENT -->

						<!-- Form Group -->
						<div class="js-add-field form-group mb-0"
						data-hs-add-field-options='{
						"template": "#addContactFieldTemplate",
						"container": "#addContactFieldContainer",
						"defaultCreated": 0
					}'>
					<div class="row">
						<div class="col-5">
							<label for="NamaContact" class="input-label font-weight-bold">Nama <small class="text-danger">*</small></label>
							<input type="text" class="form-control" name="NAMA_CONTACT[]" id="NamaContact" placeholder="Masukkan Nama">
						</div>
						<div class="col-7">
							<label for="ContactContact" class="input-label font-weight-bold">Contact <small class="text-danger">*</small></label>
							<div class="input-group align-items-center">
								<input type="text" class="js-masked-input form-control" name="CONTACT[]" id="ContactContact" placeholder="Masukkan Contact">

								<div class="input-group-append">
									<!-- Select -->
									<select class="js-custom-select custom-select dropdown-toggle" name="CONTACT_MEDIA[]"
									data-hs-select2-options='{
									"minimumResultsForSearch": "Infinity",
									"customClass": "custom-select",
									"dropdownAutoWidth": true,
									"width": true
								}'>
								<option value="PHONE" selected>TELEPON</option>
								<option value="WHATSAPP">WA</option>
								<option value="EMAIL">EMAIL</option>
							</select>
							<!-- End Select -->
						</div>
					</div>
				</div>
			</div>

			<!-- Container For Input Field -->
			<div id="addContactFieldContainer"></div>
			<div class="modal-footer mt-3 px-0">
				<a href="javascript:;" class="js-create-field form-link btn btn-sm btn-no-focus btn-ghost-primary">
					<i class="fas fa-plus mr-1"></i> Tambah
				</a>
				<button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Selesai</button>
			</div>
		</div>
		<!-- End Form Group -->

		<!-- Add Phone Input Field -->
		<div id="addContactFieldTemplate" style="display: none;">
			<div class="row">
				<div class="col-5">
					<label for="NamaContact" class="input-label font-weight-bold">Nama <small class="text-danger">*</small></label>
					<input type="text" class="form-control" name="NAMA_CONTACT[]" id="NamaContact" placeholder="Masukkan Nama">
				</div>
				<div class="col-7">
					<label for="ContactContact" class="input-label font-weight-bold">Contact <small class="text-danger">*</small></label>
					<div class="input-group align-items-center">
						<input type="text" class="js-masked-input form-control" name="CONTACT[]" id="ContactContact" placeholder="Masukkan Contact">

						<div class="input-group-append">
							<!-- Select -->
							<select class="js-custom-select custom-select dropdown-toggle" name="CONTACT_MEDIA[]"
							data-hs-select2-options='{
							"minimumResultsForSearch": "Infinity",
							"customClass": "custom-select",
							"dropdownAutoWidth": true,
							"width": true
						}'>
						<option value="PHONE" selected>TELEPON</option>
						<option value="WHATSAPP">WA</option>
						<option value="EMAIL">EMAIL</option>
					</select>
					<!-- End Select -->
				</div>
			</div>
		</div>

		<a class="js-delete-field input-group-add-field-delete" href="javascript:;">
			<i class="tio-delete"></i>
		</a>
	</div>
</div>
</div>
<!-- End Add Phone Input Field -->
<!-- END CONTENT -->
</div>
</div>
</div>
</div>

<div class="modal fade" id="tiket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambahkan Tiket</h5>
				<button type="button" class="btn btn-xs btn-icon btn-soft-secondary" data-dismiss="modal" aria-label="Close">
					<svg aria-hidden="true" width="10" height="10" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
						<path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z"/>
					</svg>
				</button>
			</div>
			<div class="modal-body pb-0">
				<div class="col-md-12 px-0 mb-0">
					<!-- CONTENT -->

					<!-- Form Group -->
					<div class="js-add-field form-group mb-0"
					data-hs-add-field-options='{
					"template": "#addEmailFieldTemplate",
					"container": "#addEmailFieldContainer",
					"defaultCreated": 0
				}'>
				<div class="row">
					<div class="col-5">
						<label for="NamaTiket" class="input-label font-weight-bold">Nama Tiket <small class="text-danger">*</small></label>
						<input type="text" class="form-control" name="NAMA_TIKET[]" id="NamaTiket" placeholder="Masukkan Nama Tiket">
					</div>
					<div class="col-7">
						<label for="HargaTiket" class="input-label font-weight-bold">Harga Tiket <small class="text-danger">*</small></label>
						<input type="number" class="form-control" name="HARGA_TIKET[]" id="HargaTiket" placeholder="Masukkan Harga Tiket">
					</div>
				</div>

				<!-- Container For Input Field -->
				<div id="addEmailFieldContainer"></div>
				<div class="modal-footer mt-3 px-0">
					<a href="javascript:;" class="js-create-field form-link btn btn-sm btn-no-focus btn-ghost-primary">
						<i class="fas fa-plus mr-1"></i> Tambah
					</a>
					<button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Selesai</button>
				</div>
			</div>
			<!-- End Form Group -->

			<!-- Add Phone Input Field -->
			<div id="addEmailFieldTemplate" style="display: none;">
				<div class="row">
					<div class="col-5">
						<label for="NamaTiket" class="input-label font-weight-bold">Nama Tiket <small class="text-danger">*</small></label>
						<input type="text" class="form-control" name="NAMA_TIKET[]" id="NamaTiket" placeholder="Masukkan Nama Tiket">
					</div>
					<div class="col-7">
						<label for="HargaTiket" class="input-label font-weight-bold">Harga Tiket <small class="text-danger">*</small></label>
						<input type="number" class="form-control" name="HARGA_TIKET[]" id="HargaTiket" placeholder="Masukkan Harga Tiket">
					</div>

					<a class="js-delete-field input-group-add-field-delete" href="javascript:;">
						<i class="tio-delete"></i>
					</a>
				</div>
			</div>
		</div>
		<!-- End Add Phone Input Field -->
		<!-- END CONTENT -->
	</div>
</div>
</div>
</div>

<div class="modal fade" id="sosmed" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambahkan link Sosmed</h5>
				<button type="button" class="btn btn-xs btn-icon btn-soft-secondary" data-dismiss="modal" aria-label="Close">
					<svg aria-hidden="true" width="10" height="10" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
						<path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z"/>
					</svg>
				</button>
			</div>
			<div class="modal-body pb-0">
				<div class="col-md-12 px-0 mb-0">
					<!-- CONTENT -->

					<!-- Form Group -->
					<div class="js-add-field form-group mb-0"
					data-hs-add-field-options='{
					"template": "#addSosmedFieldTemplate",
					"container": "#addSosmedFieldContainer",
					"defaultCreated": 0
				}'>
				<div class="row">
					<div class="col-5">
						<label for="SosmedNama" class="input-label font-weight-bold">Nama</label>
						<input type="text" class="form-control" name="NAMA_SOSMED[]" id="SosmedNama" placeholder="Masukkan Nama Sosmed">
						<small class="text-muted">ex: Nestivent</small>
					</div>
					<div class="col-7">
						<label for="SosmedLink" class="input-label font-weight-bold">Link</label>
						<div class="input-group align-items-center">
							<input type="text" class="js-masked-input form-control" name="LINK_SOSMED[]" id="SosmedLink" placeholder="Masukkan link Sosmed">

							<div class="input-group-append">
								<!-- Select -->
								<select class="js-custom-select custom-select dropdown-toggle" name="SOSMED[]"
								data-hs-select2-options='{
								"minimumResultsForSearch": "Infinity",
								"customClass": "custom-select",
								"dropdownAutoWidth": true,
								"width": true
							}'>
							<option value="INSTAGRAM" selected>INSTAGRAM</option>
							<option value="FACEBOOK">FACEBOOK</option>
							<option value="EMAIL">EMAIL</option>
						</select>
						<!-- End Select -->
					</div>
				</div>
				<small class="text-muted">ex: www.instagram.com/nestivent</small>
			</div>
		</div>

		<!-- Container For Input Field -->
		<div id="addSosmedFieldContainer"></div>
		<div class="modal-footer mt-3 px-0">
			<a href="javascript:;" class="js-create-field form-link btn btn-sm btn-no-focus btn-ghost-primary">
				<i class="fas fa-plus mr-1"></i> Tambah
			</a>
			<button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Selesai</button>
		</div>
	</div>
	<!-- End Form Group -->

	<!-- Add Phone Input Field -->
	<div id="addSosmedFieldTemplate" style="display: none;">
		<div class="row">
			<div class="col-5">
				<label for="SosmedNama" class="input-label font-weight-bold">Nama</label>
				<input type="text" class="form-control" name="NAMA_SOSMED[]" id="SosmedNama" placeholder="Masukkan Nama Sosmed">
				<small class="text-muted">ex: Nestivent</small>
			</div>
			<div class="col-7">
				<label for="SosmedLink" class="input-label font-weight-bold">Link</label>
				<div class="input-group align-items-center">
					<input type="text" class="js-masked-input form-control" name="LINK_SOSMED[]" id="SosmedLink" placeholder="Masukkan link Sosmed">

					<div class="input-group-append">
						<!-- Select -->
						<select class="js-custom-select custom-select dropdown-toggle" name="SOSMED[]"
						data-hs-select2-options='{
						"minimumResultsForSearch": "Infinity",
						"customClass": "custom-select",
						"dropdownAutoWidth": true,
						"width": true
					}'>
					<option value="INSTAGRAM" selected>INSTAGRAM</option>
					<option value="FACEBOOK">FACEBOOK</option>
					<option value="EMAIL">EMAIL</option>
				</select>
				<!-- End Select -->
			</div>
		</div>
		<small class="text-muted">ex: www.instagram.com/nestivent</small>
	</div>

	<a class="js-delete-field input-group-add-field-delete" href="javascript:;">
		<i class="tio-delete"></i>
	</a>
</div>
</div>
</div>
<!-- END CONTENT -->
</div>
</div>
</div>
</div>
</form>
<script type="text/javascript">

	function previewDisplay_posterImage(input){
		$(".Display_posterImage").removeClass('hidden');
		var file = $("#Get_posterImage").get(0).files[0];

		if(file){
			var reader = new FileReader();

			reader.onload = function(){
				$("#Display_posterImage").attr("src", reader.result);
			}

			reader.readAsDataURL(file);
		}
	}

	$("#bayar").change(function() {
		if(this.checked) {
			$("#aturTiket").removeClass('d-none');
		}else{
			$("#aturTiket").addClass('d-none');
		}
	});

	tinymce.init({
		selector: "#artikel",
		height: 500,
		menubar: true,
		branding: false,
		plugins : 'searchreplace autolink code fullscreen image link media table hr nonbreaking   insertdatetime  lists textcolor wordcount code imagetools mediaembed   contextmenu colorpicker textpattern ',
		toolbar : 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
		automatic_uploads: true,
		image_advtab: true,
		images_upload_url: "<?php echo base_url()?>k_panel/tinymce_upload",
		file_picker_types: 'image',
		paste_data_images:true,
		relative_urls: false,
		remove_script_host: false,
		file_picker_callback: function(cb, value, meta) {
			var input = document.createElement('input');
			input.setAttribute('type', 'file');
			input.setAttribute('accept', 'image/*');
			input.onchange = function() {
				var file = this.files[0];
				var reader = new FileReader();
				reader.readAsDataURL(file);
				reader.onload = function () {
					var id = 'post-image-' + (new Date()).getTime();
					var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
					var blobInfo = blobCache.create(id, file, reader.result);
					blobCache.add(blobInfo);
					cb(blobInfo.blobUri(), { title: file.name });
				};
			};
			input.click();
		}
	});
</script>
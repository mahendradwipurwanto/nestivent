<!-- Login Form -->
<div class="container space-2 space-lg-3">
  <form class="js-validate w-md-75 w-lg-50 mx-md-auto" action="<?= site_url('authentication/daftar_pengguna') ?>" method="post">
    <!-- Title -->
    <div class="mb-5 mb-md-7">
      <h1 class="h2 mb-0">Gabung sekarang!</h1>
      <p>Daftarkan akun anda untuk dapat bergabung bersama kami.</p>
    </div>
    <!-- End Title -->

    <!-- Form Group -->
    <div class="js-form-message form-group">
      <label class="input-label" for="signinSrNama">Nama lengkap anda <span class="text-danger">*</span></label>
      <input type="text" class="form-control" name="nama" id="signinSrNama" placeholder="Nama lengkap anda" aria-label="Nama lengkap anda" required data-msg="Harap masukkan nama lengkap anda.">
    </div>
    <!-- End Form Group -->

    <!-- Form Group -->
    <div class="js-form-message form-group">
      <label for="listingBathrooms" class="input-label">Jenis Kelamin <span class="text-danger">*</span></label>
      <div class="input-group input-group-down-break">
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

    <!-- Form Group -->
    <div class="js-form-message form-group">
      <label class="input-label" for="signinSrInstansi">Asal Instansi <span class="text-danger">*</span></label>
      <input type="text" class="form-control" name="instansi" id="signinSrInstansi" placeholder="Asal Instansi anda" aria-label="Asal Instansi anda" required data-msg="Harap masukkan asal Instansi.">
    </div>
    <!-- End Form Group -->

    <!-- Form Group -->
    <div class="js-form-message form-group">
      <label for="listingBathrooms" class="input-label">Jabatan <span class="text-danger">*</span></label>
      <div class="input-group input-group-down-break">
        <!-- Custom Radio -->
        <div class="form-control">
          <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" name="jabatan" id="jabatan1" value="1|Pelajar / Mahasiswa" checked>
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
        <input type="text" class="form-control" name="lainnya" id="signinSrLainnya" placeholder="Masukkan jabatan anda" aria-label="Masukkan jabatan anda" required data-msg="Harap masukkan jabatan anda.">
      </div>
      <!-- End Form Group -->
      <small class="text-muted">Masukkan jabatan / peran anda dalam instansi</small>
    </div>
    <!-- End Form Group -->

    <!-- Form Group -->
    <div class="js-form-message form-group">
      <label class="input-label" for="signinSrEmail">Email anda <span class="text-danger">*</span></label>
      <input type="text" class="form-control" name="email" id="signinSrEmail" placeholder="Email anda" aria-label="Email anda" required data-msg="Harap masukkan email anda.">
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
        <input type="tel" class="form-control" name="hp" id="signinSrTelepon" placeholder="Nomor telepon anda" aria-label="Nomor telepon anda" required data-msg="Harap masukkan nomor telepon anda.">
      </div>
      <!-- End Input Group -->
      <small class="text-muted">Ex: 81987123465</small>
    </div>
    <!-- End Form Group -->

    <!-- Form Group -->
    <div class="js-form-message form-group">
      <label class="input-label" for="signinSrAlamat">Alamat anda <span class="text-danger">*</span></label>
      <textarea  type="text" class="form-control" name="alamat" id="signinSrAlamat" placeholder="Alamat lengkap anda" aria-label="Alamat lengkap anda" required rows="3"></textarea>
    </div>
    <!-- End Form Group -->

    <!-- Form Group -->
    <div class="js-form-message form-group">
      <label class="input-label" for="signinSrInstagram">ID Instagram anda <span class="text-danger">*</span></label>
      <!-- Input Group -->
      <div class="input-group input-group-merge">
        <div class="input-group-prepend">
          <span class="input-group-text p-2">
            @
          </span>
        </div>
        <input type="text" class="form-control" name="instagram" id="signinSrInstagram" placeholder="ID Instagram anda" aria-label="ID Instagram anda" required data-msg="Harap masukkan ID Instagram anda.">
      </div>
      <!-- End Input Group -->
    </div>
    <!-- End Form Group -->

    <!-- Form Group -->
    <div class="js-form-message form-group">
      <label class="input-label" for="signinSrPassword">Password <span class="text-danger">*</span></label>
      <input type="password" class="form-control" name="password" minlength="6" id="signinSrPassword" placeholder="********" aria-label="********" required required data-msg="Harap masukkan password, minimal 6 karakter.">
    </div>
    <!-- End Form Group -->

    <!-- Form Group -->
    <div class="js-form-message form-group">
      <label class="input-label" for="signinSrConfirmPassword">Konfirmasi password</label>
      <input type="password" class="form-control" name="confirmPassword" minlength="6" id="signinSrConfirmPassword" placeholder="********" aria-label="********" required required data-msg="Harap masukkan konfirmasi password, minimal 6 karakter">
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
        <button type="submit" class="btn btn-primary btn-sm transition-3d-hover">Daftar Sekarang</button>
      </div>
    </div>
    <!-- End Button -->
  </form>
</div>
<!-- End Login Form -->

<div class="modal fade" id="syaratdanketentuan" role="dialog" tabindex="-1" role="dialog" aria-labelledby="syaratdanketentuan" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close alcs" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h2><strong>Terms and Conditions</strong></h2>

        <p>Welcome to STIVENT!</p>

        <p>These terms and conditions outline the rules and regulations for the use of STIVENT's Website, located at https://nestivent.org/.</p>

        <p>By accessing this website we assume you accept these terms and conditions. Do not continue to use STIVENT if you do not agree to take all of the terms and conditions stated on this page.</p>

        <p>The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: "Client", "You" and "Your" refers to you, the person log on this website and compliant to the Company’s terms and conditions. "The Company", "Ourselves", "We", "Our" and "Us", refers to our Company. "Party", "Parties", or "Us", refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client’s needs in respect of provision of the Company’s stated services, in accordance with and subject to, prevailing law of Netherlands. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p>

        <h3><strong>Cookies</strong></h3>

        <p>We employ the use of cookies. By accessing STIVENT, you agreed to use cookies in agreement with the STIVENT's Privacy Policy.</p>

        <p>Most interactive websites use cookies to let us retrieve the user’s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.</p>

        <h3><strong>License</strong></h3>

        <p>Unless otherwise stated, STIVENT and/or its licensors own the intellectual property rights for all material on STIVENT. All intellectual property rights are reserved. You may access this from STIVENT for your own personal use subjected to restrictions set in these terms and conditions.</p>

        <p>You must not:</p>
        <ul>
          <li>Republish material from STIVENT</li>
          <li>Sell, rent or sub-license material from STIVENT</li>
          <li>Reproduce, duplicate or copy material from STIVENT</li>
          <li>Redistribute content from STIVENT</li>
        </ul>

        <p>This Agreement shall begin on the date hereof.</p>

        <p>Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website. STIVENT does not filter, edit, publish or review Comments prior to their presence on the website. Comments do not reflect the views and opinions of STIVENT,its agents and/or affiliates. Comments reflect the views and opinions of the person who post their views and opinions. To the extent permitted by applicable laws, STIVENT shall not be liable for the Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.</p>

        <p>STIVENT reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions.</p>

        <p>You warrant and represent that:</p>

        <ul>
          <li>You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;</li>
          <li>The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party;</li>
          <li>The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy</li>
          <li>The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity.</li>
        </ul>

        <p>You hereby grant STIVENT a non-exclusive license to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats or media.</p>

        <h3><strong>Hyperlinking to our Content</strong></h3>

        <p>The following organizations may link to our Website without prior written approval:</p>

        <ul>
          <li>Government agencies;</li>
          <li>Search engines;</li>
          <li>News organizations;</li>
          <li>Online directory distributors may link to our Website in the same manner as they hyperlink to the Websites of other listed businesses; and</li>
          <li>System wide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Web site.</li>
        </ul>

        <p>These organizations may link to our home page, to publications or to other Website information so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products and/or services; and (c) fits within the context of the linking party’s site.</p>

        <p>We may consider and approve other link requests from the following types of organizations:</p>

        <ul>
          <li>commonly-known consumer and/or business information sources;</li>
          <li>dot.com community sites;</li>
          <li>associations or other groups representing charities;</li>
          <li>online directory distributors;</li>
          <li>internet portals;</li>
          <li>accounting, law and consulting firms; and</li>
          <li>educational institutions and trade associations.</li>
        </ul>

        <p>We will approve link requests from these organizations if we decide that: (a) the link would not make us look unfavorably to ourselves or to our accredited businesses; (b) the organization does not have any negative records with us; (c) the benefit to us from the visibility of the hyperlink compensates the absence of STIVENT; and (d) the link is in the context of general resource information.</p>

        <p>These organizations may link to our home page so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services; and (c) fits within the context of the linking party’s site.</p>

        <p>If you are one of the organizations listed in paragraph 2 above and are interested in linking to our website, you must inform us by sending an e-mail to STIVENT. Please include your name, your organization name, contact information as well as the URL of your site, a list of any URLs from which you intend to link to our Website, and a list of the URLs on our site to which you would like to link. Wait 2-3 weeks for a response.</p>

        <p>Approved organizations may hyperlink to our Website as follows:</p>

        <ul>
          <li>By use of our corporate name; or</li>
          <li>By use of the uniform resource locator being linked to; or</li>
          <li>By use of any other description of our Website being linked to that makes sense within the context and format of content on the linking party’s site.</li>
        </ul>

        <p>No use of STIVENT's logo or other artwork will be allowed for linking absent a trademark license agreement.</p>

        <h3><strong>iFrames</strong></h3>

        <p>Without prior approval and written permission, you may not create frames around our Webpages that alter in any way the visual presentation or appearance of our Website.</p>

        <h3><strong>Content Liability</strong></h3>

        <p>We shall not be hold responsible for any content that appears on your Website. You agree to protect and defend us against all claims that is rising on your Website. No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights.</p>

        <h3><strong>Reservation of Rights</strong></h3>

        <p>We reserve the right to request that you remove all links or any particular link to our Website. You approve to immediately remove all links to our Website upon request. We also reserve the right to amen these terms and conditions and it’s linking policy at any time. By continuously linking to our Website, you agree to be bound to and follow these linking terms and conditions.</p>

        <h3><strong>Removal of links from our website</strong></h3>

        <p>If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment. We will consider requests to remove links but we are not obligated to or so or to respond to you directly.</p>

        <p>We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.</p>

        <h3><strong>Disclaimer</strong></h3>

        <p>To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will:</p>

        <ul>
          <li>limit or exclude our or your liability for death or personal injury;</li>
          <li>limit or exclude our or your liability for fraud or fraudulent misrepresentation;</li>
          <li>limit any of our or your liabilities in any way that is not permitted under applicable law; or</li>
          <li>exclude any of our or your liabilities that may not be excluded under applicable law.</li>
        </ul>

        <p>The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer: (a) are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty.</p>

        <p>As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal">Mengerti</button>
      </div>
    </div>
  </div>
</div>

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

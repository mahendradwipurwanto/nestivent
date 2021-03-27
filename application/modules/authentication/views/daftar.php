<!-- Login Form -->
   <div class="container space-2 space-lg-3">
     <form class="js-validate w-md-75 w-lg-50 mx-md-auto">
       <!-- Title -->
       <div class="mb-5 mb-md-7">
         <h1 class="h2 mb-0">Daftarkan akun anda</h1>
         <p>Hanya perlu satu akun untuk semua kegiatan.</p>
       </div>
       <!-- End Title -->

       <!-- Form Group -->
       <div class="js-form-message form-group">
         <label class="input-label" for="signinSrEmail">Email address</label>
         <input type="email" class="form-control" name="email" id="signinSrEmail" placeholder="Email address" aria-label="Email address" required
                data-msg="Please enter a valid email address.">
       </div>
       <!-- End Form Group -->

       <!-- Form Group -->
       <div class="js-form-message form-group">
         <label class="input-label" for="signinSrPassword">Password</label>
         <input type="password" class="form-control" name="password" id="signinSrPassword" placeholder="********" aria-label="********" required
                data-msg="Your password is invalid. Please try again.">
       </div>
       <!-- End Form Group -->

       <!-- Form Group -->
       <div class="js-form-message form-group">
         <label class="input-label" for="signinSrConfirmPassword">Confirm password</label>
         <input type="password" class="form-control" name="confirmPassword" id="signinSrConfirmPassword" placeholder="********" aria-label="********" required
                data-msg="Password does not match the confirm password.">
       </div>
       <!-- End Form Group -->

       <!-- Checkbox -->
       <div class="js-form-message mb-5">
         <div class="custom-control custom-checkbox d-flex align-items-center text-muted">
           <input type="checkbox" class="custom-control-input" id="termsCheckbox" name="termsCheckbox" required
                  data-msg="Please accept our Terms and Conditions.">
           <label class="custom-control-label" for="termsCheckbox">
             <small>
               Saya setuju dengan
               <a class="link-underline" href="">Syarat dan kondisi</a>
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

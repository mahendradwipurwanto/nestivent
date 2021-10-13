<!-- Hero Section -->
<div class="position-relative">
  <div class="container space-top-3 space-top-lg-4 space-bottom-md-2 position-relative z-index-2">
    <div class="w-md-80 w-lg-60 text-center mx-md-auto mb-9">
      <?php if($OPEN_CAREER == 1):?>
        <div class="mb-5">
          <h1>Work with us</h1>
          <p>Work hard with highly motivated team of talented people and great teammates to launch perfectly crafted products you'll love.</p>
        </div>
        <a class="btn btn-primary btn-wide transition-3d-hover" href="tel:+62<?= $WEB_WA;?>">Contact us</a>
        <?php else: ?>
          <div class="mb-5">
            <h1>Work with us</h1>
            <p>We will open reqruitment for join to our team soon, stay tune.</p>
          </div>
        <?php endif;?>
      </div>
    </div>

    <div class="position-absolute top-0 right-0 left-0 w-100 h-100 bg-img-hero mt-n11" style="background-image: url(assets/svg/components/abstract-shapes-12.svg);"></div>

    <!-- SVG Shape -->
    <figure class="position-absolute bottom-0 right-0 left-0 mb-11">
      <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1921 273">
        <polygon fill="#fff" points="0,273 1921,273 1921,0 "/>
      </svg>
    </figure>
    <!-- End SVG Shape -->
  </div>
<!-- End Hero Section -->
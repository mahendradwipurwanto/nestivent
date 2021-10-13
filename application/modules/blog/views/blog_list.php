    <!-- Blogs Section -->
    <div class="container space-2 space-lg-4 <?= $CI->agent->is_mobile() ? 'space-3' : '';?>">
      <div class="row justify-content-lg-between">
        <div class="col-lg-8">
          <!-- Blog -->
          <article class="row mb-7">
            <div class="col-md-5">
              <img class="card-img" src="<?= base_url();?>assets/frontend/img/400x500/img16.jpg" alt="poster">
            </div>
            <div class="col-md-7">
              <div class="card-body d-flex flex-column h-100 px-0 pt-0">
                <h3><a class="text-inherit" href="<?= site_url('artikel/123');?>">Front becomes an official Instagram Marketing Partner</a></h3>
                <p>Great news we're eager to share.</p>
                <div class="media align-items-center mt-auto">
                  <a class="avatar avatar-sm avatar-circle mr-3">
                    <img class="avatar-img" src="<?= base_url();?>assets/frontend/img/100x100/img12.jpg" alt="writer">
                  </a>
                  <div class="media-body">
                    <span class="text-dark">
                      <a class="d-inline-block text-inherit font-weight-bold" href="<?= site_url('artikel/123');?>">Aaron Larsson</a>
                    </span>
                    <small class="d-block">Feb 15, 2020</small>
                  </div>
                </div>
              </div>
            </div>
          </article>
          <!-- End Blog -->

          <!-- Sticky Block End Point -->
          <div id="stickyBlockEndPoint"></div>
        </div>

        <div class="col-lg-3">
          <?= $CI->agent->is_mobile() ? '<hr>' : '';?>
          <div class="mb-7">
            <div class="mb-3">
              <h3>Newsletter</h3>
            </div>

            <!-- Form -->
            <form class="js-validate mb-2" action="<?= site_url('blog/newsletter');?>" method="POST">
              <label class="sr-only" for="subscribeSr">Subscribe</label>
              <div class="input-group input-group-flush mb-3">
                <input type="email" class="form-control form-control-sm" name="email" id="subscribeSr" placeholder="Your email" aria-label="Your email" required
                      data-msg="Please enter a valid email address.">
              </div>
              <button type="submit" class="btn btn-sm btn-primary btn-block">Subscribe</button>
            </form>
            <!-- End Form -->

            <p class="small">Get special offers on the latest developments from Front.</p>
          </div>

          <div class="mb-7">
            <div class="mb-3">
              <h3>Artikel Berita</h3>
            </div>

            <!-- Blog -->
            <article class="mb-3">
              <a class="card card-frame p-3" href="<?= site_url('artikel/123');?>">
                <div class="media align-items-center">
                  <div class="media-body mr-2">
                    <h4 class="h6 mb-0">Here's how to dodge distractions</h4>
                    <span class="d-block font-size-1 text-body">Feb 08, 2020</span>
                  </div>
                  <i class="fas fa-angle-right"></i>
                </div>
              </a>
            </article>
            <!-- End Blog -->
          </div>

          <!-- Sticky Block Start Point -->
          <div id="stickyBlockStartPoint"></div>

          <div class="js-sticky-block"
               data-hs-sticky-block-options='{
                 "parentSelector": "#stickyBlockStartPoint",
                 "breakpoint": "lg",
                 "startPoint": "#stickyBlockStartPoint",
                 "endPoint": "#stickyBlockEndPoint",
                 "stickyOffsetTop": 40,
                 "stickyOffsetBottom": 20
               }'>
            <div class="mb-7">
              <div class="mb-3">
                <h3>Artikel  Terpopuler</h3>
              </div>

              <!-- Blog -->
              <article class="mb-5">
                <div class="media align-items-center text-inherit">
                  <div class="avatar avatar-lg mr-3">
                    <img class="avatar-img" src="<?= base_url();?>assets/frontend/img/320x320/img1.jpg" alt="Image Description">
                  </div>
                  <div class="media-body">
                    <h4 class="h6 mb-0"><a class="text-inherit" href="#">Announcing a free plan for small teams</a></h4>
                  </div>
                </div>
              </article>
              <!-- End Blog -->
            </div>

            <div class="mb-7">
              <div class="mb-3">
                <h3>Tags</h3>
              </div>

              <a class="btn btn-xs btn-soft-secondary mb-1" href="#">Business</a>
            </div>
          </div>
        </div>
      </div>




      <!-- Pagination -->
      <nav aria-label="Page navigation">
        <ul class="pagination mb-0">
          <li class="page-item active"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
          <li class="page-item"><a class="page-link" href="#">5</a></li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span class="d-none d-sm-inline-block mr-1">Next</span>
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- End Pagination -->




    </div>
    <!-- End Blogs Section -->
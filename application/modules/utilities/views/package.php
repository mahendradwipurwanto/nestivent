<div class="overflow-hidden">
  <!-- Hero Section -->
  <div class="bg-img-hero" style="background-image: url(<?= base_url();?>assets/frontend/svg/components/abstract-shapes-12.svg);">
    <div class="container space-top-3 space-top-lg-4 space-bottom-2 space-bottom-lg-4">
      <div class="w-md-80 w-lg-60 text-center mx-auto mb-9">
        <h1>Find the right plan for your site</h1>
      </div>

      <!-- Toggle Switch -->
      <div class="d-flex justify-content-center align-items-center mb-9 mb-lg-n10">
        <span class="font-size-1 text-muted">Monthly</span>
        <label class="toggle-switch mx-2" for="customSwitch">
          <input type="checkbox" class="js-toggle-switch toggle-switch-input" id="customSwitch" checked
                 data-hs-toggle-switch-options='{
                   "targetSelector": "#pricingCount1, #pricingCount2, #pricingCount3"
                 }'>
          <span class="toggle-switch-label">
            <span class="toggle-switch-indicator"></span>
          </span>
        </label>
        <div class="position-relative">
          <span class="font-size-1 text-muted">Annual</span>

          <!-- Arrow -->
          <figure class="position-absolute top-0 text-nowrap mt-n5 ml-3 ml-md-5">
            <svg class="d-block position-absolute mt-n2 ml-n4" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 99.3 57" width="48">
              <path fill="none" stroke="#bdc5d1" stroke-width="4" stroke-linecap="round" stroke-miterlimit="10" d="M2,39.5l7.7,14.8c0.4,0.7,1.3,0.9,2,0.4L27.9,42"/>
              <path fill="none" stroke="#bdc5d1" stroke-width="4" stroke-linecap="round" stroke-miterlimit="10" d="M11,54.3c0,0,10.3-65.2,86.3-50"/>
            </svg>
            <span class="badge badge-primary badge-pill py-sm-2 px-sm-3">Save up to 10%</span>
          </figure>
          <!-- End Arrow -->
        </div>
      </div>
      <!-- End Toggle Switch -->
    </div>
  </div>
  <!-- End Hero Section -->

  <!-- Pricing Section -->
  <div class="container mt-n10">
    <div class="w-lg-80 mx-lg-auto position-relative">
      <div class="row position-relative z-index-2 mx-n2 mb-5">
        <div class="col-sm-6 col-md-4 px-2 mb-3">
          <!-- Pricing -->
          <div class="card h-100">
            <!-- Header -->
            <div class="card-header text-center">
              <span class="d-block h3">Starter</span>
              <span class="d-block mb-2">
                <span class="text-dark align-top">$</span>
                <span class="font-size-4 text-dark font-weight-bold mr-n2">
                  <span id="pricingCount1"
                         data-hs-toggle-switch-item-options='{
                           "min": 42,
                           "max": 32
                         }'>32</span>
                </span>
                <span class="font-size-1">/ mon</span>
              </span>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              <div class="media font-size-1 text-body mb-3">
                <i class="fas fa-check-circle text-success mt-1 mr-2"></i>
                <div class="media-body">
                  1 User
                </div>
              </div>
              <div class="media font-size-1 text-body mb-3">
                <i class="fas fa-check-circle text-success mt-1 mr-2"></i>
                <div class="media-body">
                  Front plan features
                </div>
              </div>
              <div class="media font-size-1 text-body mb-3">
                <i class="fas fa-check-circle text-success mt-1 mr-2"></i>
                <div class="media-body">
                  1 app
                </div>
              </div>
              <div class="media font-size-1 text-body">
                <i class="fas fa-check-circle text-success mt-1 mr-2"></i>
                <div class="media-body">
                  Integrations
                </div>
              </div>
            </div>
            <!-- End Body -->

            <div class="card-footer border-0">
              <button type="button" class="btn btn-soft-primary btn-block transition-3d-hover">Get Started</button>
            </div>
          </div>
          <!-- End Pricing -->
        </div>

        <div class="col-sm-6 col-md-4 px-2 mb-3">
          <!-- Pricing -->
          <div class="card bg-primary text-white h-100 shadow-primary-lg">
            <!-- Header -->
            <div class="card-header border-0 bg-primary text-white text-center">
              <span class="d-block h3 text-white">Pro</span>
              <span class="d-block mb-2">
                <span class="text-white align-top">$</span>
                <span class="font-size-4 text-white font-weight-bold mr-n2">
                  <span id="pricingCount2"
                         data-hs-toggle-switch-item-options='{
                           "min": 64,
                           "max": 54
                         }'>54</span>
                </span>
                <span class="font-size-1">/ mon</span>
              </span>
            </div>
            <!-- End Header -->

            <div class="border-top opacity-xs"></div>

            <!-- Body -->
            <div class="card-body">
              <div class="media font-size-1 mb-3">
                <i class="fas fa-check-circle mt-1 mr-2"></i>
                <div class="media-body">
                  3 Users
                </div>
              </div>
              <div class="media font-size-1 mb-3">
                <i class="fas fa-check-circle mt-1 mr-2"></i>
                <div class="media-body">
                  Front plan features
                </div>
              </div>
              <div class="media font-size-1 mb-3">
                <i class="fas fa-check-circle mt-1 mr-2"></i>
                <div class="media-body">
                  3 apps
                </div>
              </div>
              <div class="media font-size-1 mb-3">
                <i class="fas fa-check-circle mt-1 mr-2"></i>
                <div class="media-body">
                  Integrations
                </div>
              </div>
              <div class="media font-size-1">
                <i class="fas fa-check-circle mt-1 mr-2"></i>
                <div class="media-body">
                  Product Support
                </div>
              </div>
            </div>
            <!-- End Body -->

            <div class="card-footer border-0 bg-primary text-white">
              <button type="button" class="btn btn-light text-primary btn-block transition-3d-hover">Get Started</button>
            </div>
          </div>
          <!-- End Pricing -->
        </div>

        <div class="col-sm-6 col-md-4 px-2 mb-3">
          <!-- Pricing -->
          <div class="card h-100">
            <!-- Header -->
            <div class="card-header text-center">
              <span class="d-block h3">Enterprise</span>
              <span class="d-block mb-2">
                <span class="text-dark align-top">$</span>
                <span class="font-size-4 text-dark font-weight-bold mr-n2">
                  <span id="pricingCount3"
                         data-hs-toggle-switch-item-options='{
                           "min": 89,
                           "max": 79
                         }'>79</span>
                </span>
                <span class="font-size-1">/ mon</span>
              </span>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              <div class="media font-size-1 text-body mb-3">
                <i class="fas fa-check-circle text-success mt-1 mr-2"></i>
                <div class="media-body">
                  5 Users
                </div>
              </div>
              <div class="media font-size-1 text-body mb-3">
                <i class="fas fa-check-circle text-success mt-1 mr-2"></i>
                <div class="media-body">
                  Front plan features
                </div>
              </div>
              <div class="media font-size-1 text-body mb-3">
                <i class="fas fa-check-circle text-success mt-1 mr-2"></i>
                <div class="media-body">
                  All apps
                </div>
              </div>
              <div class="media font-size-1 text-body mb-3">
                <i class="fas fa-check-circle text-success mt-1 mr-2"></i>
                <div class="media-body">
                  Integrations
                </div>
              </div>
              <div class="media font-size-1 text-body">
                <i class="fas fa-check-circle text-success mt-1 mr-2"></i>
                <div class="media-body">
                  Product Support
                </div>
              </div>
            </div>
            <!-- End Body -->

            <div class="card-footer border-0">
              <button type="button" class="btn btn-soft-primary btn-block transition-3d-hover">Get Started</button>
            </div>
          </div>
          <!-- End Pricing -->
        </div>
      </div>

      <!-- Info -->
      <div class="position-relative z-index-2 text-center">
        <div class="d-inline-block font-size-1 border bg-white text-center rounded-pill py-3 px-4">
          Prefer to start with the Trial version? <a class="d-block d-sm-inline-block font-weight-bold ml-sm-3" href="#fullPricingSection">Go here <span class="fas fa-angle-right ml-1"></span></a>
        </div>
      </div>
      <!-- End Info -->

      <!-- SVG Elements -->
      <figure class="max-w-11rem w-100 position-absolute top-0 right-0">
        <div class="mt-n11 mr-n11">
          <img class="img-fluid" src="<?= base_url();?>assets/frontend/svg/components/dots-1.svg" alt="Image Description">
        </div>
      </figure>
      <figure class="max-w-13rem w-100 position-absolute bottom-0 left-0">
        <div class="mb-3 ml-n9">
          <img class="img-fluid" src="<?= base_url();?>assets/frontend/svg/components/abstract-shapes-10.svg" alt="Image Description">
        </div>
      </figure>
      <!-- End SVG Elements -->
    </div>
  </div>
  <!-- End Pricing Section -->
</div>

<!-- Clients Section -->
<div class="space-1 space-lg-3">
  <div class="container space-2">
    <!-- Title -->
    <div class="w-md-80 w-lg-60 text-center mx-md-auto mb-6">
      <h2 class="h3">Trusted by Open Source, enterprise, and more than 33,000 of you</h2>
    </div>
    <!-- End Title -->

    <!-- Clients Section -->
    <div class="w-lg-80 mx-lg-auto">
      <div class="row justify-content-center text-center">
        <div class="col-4 col-sm-2 py-3">
          <img class="max-w-11rem max-w-md-13rem mx-auto" src="<?= base_url();?>assets/frontend/svg/clients-logo/slack.svg" alt="Image Description">
        </div>
        <div class="col-4 col-sm-2 py-3">
          <img class="max-w-11rem max-w-md-13rem mx-auto" src="<?= base_url();?>assets/frontend/svg/clients-logo/google.svg" alt="Image Description">
        </div>
        <div class="col-4 col-sm-2 py-3">
          <img class="max-w-11rem max-w-md-13rem mx-auto" src="<?= base_url();?>assets/frontend/svg/clients-logo/airbnb.svg" alt="Image Description">
        </div>
        <div class="col-4 col-sm-2 py-3">
          <img class="max-w-11rem max-w-md-13rem mx-auto" src="<?= base_url();?>assets/frontend/svg/clients-logo/weebly.svg" alt="Image Description">
        </div>
        <div class="col-4 col-sm-2 py-3">
          <img class="max-w-11rem max-w-md-13rem mx-auto" src="<?= base_url();?>assets/frontend/svg/clients-logo/spotify.svg" alt="Image Description">
        </div>
        <div class="col-4 col-sm-2 py-3">
          <img class="max-w-11rem max-w-md-13rem mx-auto" src="<?= base_url();?>assets/frontend/svg/clients-logo/shopify.svg" alt="Image Description">
        </div>
        <div class="col-4 col-sm-2 py-3">
          <img class="max-w-11rem max-w-md-13rem mx-auto" src="<?= base_url();?>assets/frontend/svg/clients-logo/amazon.svg" alt="Image Description">
        </div>
        <div class="col-4 col-sm-2 py-3">
          <img class="max-w-11rem max-w-md-13rem mx-auto" src="<?= base_url();?>assets/frontend/svg/clients-logo/fitbit.svg" alt="Image Description">
        </div>
        <div class="col-4 col-sm-2 py-3">
          <img class="max-w-11rem max-w-md-13rem mx-auto" src="<?= base_url();?>assets/frontend/svg/clients-logo/hubspot.svg" alt="Image Description">
        </div>
        <div class="col-4 col-sm-2 py-3">
          <img class="max-w-11rem max-w-md-13rem mx-auto" src="<?= base_url();?>assets/frontend/svg/clients-logo/kaplan.svg" alt="Image Description">
        </div>
        <div class="col-4 col-sm-2 py-3">
          <img class="max-w-11rem max-w-md-13rem mx-auto" src="<?= base_url();?>assets/frontend/svg/clients-logo/paypal.svg" alt="Image Description">
        </div>
      </div>
    </div>
    <!-- End Clients Section -->
  </div>
</div>
<!-- End Clients Section -->

<!-- Pricing Section -->
<div id="fullPricingSection" class="container space-bottom-2 space-bottom-lg-3">
  <!-- Title -->
  <div class="w-md-80 w-lg-60 text-center mx-md-auto mb-5 mb-md-9">
    <h2>Pick the plan that works best for you</h2>
  </div>
  <!-- End Title -->

  <!-- Table -->
  <div class="table-responsive-lg">
    <table class="table table-striped table-borderless">
      <thead class="text-center">
        <tr>
          <th scope="col" class="w-40"></th>
          <th scope="col" class="w-20">
            <span class="h6">Starter</span>
            <span class="d-block">$32/mon</span>
          </th>
          <th scope="col" class="w-20 border-left border-right">
            <span class="h6">Pro</span>
            <span class="d-block">$54/mon</span>
          </th>
          <th scope="col" class="w-20">
            <span class="h6">Enterprise</span>
            <span class="d-block">$79/mon</span>
          </th>
        </tr>
      </thead>
      <tbody>
        <tr class="border-top border-bottom">
          <th scope="row" class="h4 bg-white text-dark pt-5 pb-3 px-4 mb-0">Native Front features</th>
          <td class="bg-white"></td>
          <td class="bg-white border-left border-right"></td>
          <td class="bg-white"></td>
        </tr>
        <tr>
          <th scope="row" class="font-size-1 py-3 px-4">14-days free trial</th>
          <td class="text-center text-success p-3">
            <i class="fas fa-check-circle text-success mr-2"></i>
          </td>
          <td class="text-center text-success border-left border-right p-3">
            <i class="fas fa-check-circle text-success mr-2"></i>
          </td>
          <td class="text-success text-center p-3">
            <i class="fas fa-check-circle text-success mr-2"></i>
          </td>
        </tr>
        <tr>
          <th scope="row" class="font-size-1 py-3 px-4">No user limit</th>
          <td class="text-center text-body p-3"></td>
          <td class="text-center text-success border-left border-right p-3"></td>
          <td class="text-success text-center p-3">
            <i class="fas fa-check-circle text-success mr-2"></i>
          </td>
        </tr>
        <tr>
          <th scope="row" class="font-size-1 py-3 px-4">Product support</th>
          <td class="text-center text-body py-3 px-4"></td>
          <td class="text-center text-success border-left border-right py-3 px-4">
            <i class="fas fa-check-circle text-success mr-2"></i>
          </td>
          <td class="text-success text-center p-3">
            <i class="fas fa-check-circle text-success mr-2"></i>
          </td>
        </tr>
        <tr>
          <th scope="row" class="font-size-1 py-3 px-4">Email support</th>
          <td class="text-center text-body p-3"></td>
          <td class="text-center text-body border-left border-right py-3 px-4">
            <span class="badge badge-soft-primary badge-pill py-2 px-3">Add-on available</span>
          </td>
          <td class="text-success text-center p-3">
            <i class="fas fa-check-circle text-success mr-2"></i>
          </td>
        </tr>
        <tr>
          <th scope="row" class="font-size-1 py-3 px-4">Integrations</th>
          <td class="text-center text-success p-3">
            <i class="fas fa-check-circle text-success mr-2"></i>
          </td>
          <td class="text-center text-success border-left border-right p-3">
            <i class="fas fa-check-circle text-success mr-2"></i>
          </td>
          <td class="text-success text-center p-3">
            <i class="fas fa-check-circle text-success mr-2"></i>
          </td>
        </tr>
        <tr>
          <th scope="row" class="h4 bg-white text-dark pt-5 pb-3 px-4 mb-0">Developer tools</th>
          <td class="bg-white"></td>
          <td class="bg-white border-left border-right"></td>
          <td class="bg-white"></td>
        </tr>
        <tr>
          <th scope="row" class="font-size-1 py-3 px-4">Removal of Front branding</th>
          <td class="text-center text-body p-3"></td>
          <td class="text-center text-success border-left border-right p-3">
            <i class="fas fa-check-circle text-success mr-2"></i>
          </td>
          <td class="text-success text-center p-3">
            <i class="fas fa-check-circle text-success mr-2"></i>
          </td>
        </tr>
        <tr>
          <th scope="row" class="font-size-1 py-3 px-4">Active maintenance & support</th>
          <td class="text-center text-success p-3">
            <i class="fas fa-check-circle text-success mr-2"></i>
          </td>
          <td class="text-center text-success border-left border-right p-3">
            <i class="fas fa-check-circle text-success mr-2"></i>
          </td>
          <td class="text-success text-center p-3">
            <i class="fas fa-check-circle text-success mr-2"></i>
          </td>
        </tr>
        <tr>
          <th scope="row" class="font-size-1 py-3 px-4">Data storage for 365 days</th>
          <td class="text-center text-body p-3"></td>
          <td class="text-center text-body border-left border-right p-3">
            <span class="badge badge-soft-primary badge-pill py-2 px-3">Add-on available</span>
          </td>
          <td class="text-success text-center p-3">
            <i class="fas fa-check-circle text-success mr-2"></i>
          </td>
        </tr>
        <tr>
          <th scope="row" class="h4 bg-white p-3"></th>
          <td class="bg-white text-center p-3">
            <button type="button" class="btn btn-sm btn-primary transition-3d-hover">Choose Plan</button>
          </td>
          <td class="bg-white text-center border-left border-right p-3">
            <button type="button" class="btn btn-sm btn-primary transition-3d-hover">Choose Plan</button>
          </td>
          <td class="bg-white text-center p-3">
            <button type="button" class="btn btn-sm btn-dark transition-3d-hover">Choose Plan</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <!-- End Table -->
</div>
<!-- End Pricing Section -->

<!-- FAQ Section -->
<div class="container space-bottom-2 space-bottom-lg-3">
  <!-- Title -->
  <div class="w-lg-80 text-center mx-lg-auto mb-5 mb-md-9">
    <h2>Frequently Asked Questions</h2>
  </div>
  <!-- End Title -->

  <div class="row">
    <div class="col-md-6 mb-3 mb-md-5">
      <div class="pr-md-4">
        <h4>Can I cancel at anytime?</h4>
        <p>Yes, you can cancel anytime no questions are asked while you cancel but we would highly appreciate if you will give us some feedback.</p>
      </div>
    </div>

    <div class="col-md-6 mb-3 mb-md-5">
      <div class="pl-md-4">
        <h4>My team has credits. How do we use them?</h4>
        <p>Once your team signs up for a subscription plan. This is where we sit down, grab a cup of coffee and dial in the details.</p>
      </div>
    </div>

    <div class="w-100"></div>

    <div class="col-md-6 mb-3 mb-md-5">
      <div class="pr-md-4">
        <h4>How does Front's pricing work?</h4>
        <p>Our subscriptions are tiered. Understanding the task at hand and ironing out the wrinkles is key.</p>
      </div>
    </div>

    <div class="col-md-6 mb-3 mb-md-5">
      <div class="pl-md-4">
        <h4>How secure is Front?</h4>
        <p>Protecting the data you trust to Front is our first priority. This part is really crucial in keeping the project in line to completion.</p>
      </div>
    </div>

    <div class="w-100"></div>

    <div class="col-md-6 mb-3 mb-md-5 mb-md-0">
      <div class="pr-md-4">
        <h4>Do you offer discounts?</h4>
        <p>We've built in discounts at each tier for teams. The time has come to bring those ideas and plans to life.</p>
      </div>
    </div>

    <div class="col-md-6">
      <div class="pl-md-4">
        <h4>What is your refund policy?</h4>
        <p>We offer refunds. We aim high at being focused on building relationships with our clients and community.</p>
      </div>
    </div>
  </div>
</div>
<!-- End FAQ Section -->

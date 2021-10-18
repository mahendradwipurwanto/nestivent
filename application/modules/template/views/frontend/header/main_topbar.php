<!-- Topbar -->
<div class="container header-hide-content pt-2">
	<div class="d-flex align-items-center">

		<div class="ml-auto">
			<!-- Jump To -->
			<div class="hs-unfold d-sm-none mr-2">
				<a class="js-hs-unfold-invoker dropdown-nav-link dropdown-toggle d-flex align-items-center" href="javascript:;"
					data-hs-unfold-options='{
          "target": "#jumpToDropdown",
          "type": "css-animation",
          "event": "hover",
          "hideOnScroll": "true"
        }'>
					Pergi ke
				</a>

				<div id="jumpToDropdown" class="hs-unfold-content dropdown-menu">
					<a class="dropdown-item" href="<?= site_url('discover') ?>">Discover</a>
					<a class="dropdown-item" href="<?= site_url('pusat-bantuan') ?>">Pusat Bantuan</a>
				</div>
			</div>
			<!-- End Jump To -->

			<!-- Links -->
			<div class="nav nav-sm nav-y-0 d-none d-sm-flex ml-sm-auto">
				<a class="nav-link" href="<?= site_url('discover') ?>">Discover</a>
				<a class="nav-link" href="<?= site_url('pusat-bantuan') ?>">Pusat Bantuan</a>
			</div>
			<!-- End Links -->
		</div>
	</div>
</div>
<!-- End Topbar -->

<?php $this->load->view('header/builder'); ?>

<!-- JS Preview mode only -->

<!-- USED HEADER -->
<div id="headerMain" class="d-none">
  <?php $this->load->view('header/header_main'); ?>
</div>
<!-- END USED HEADER -->

<div id="headerFluid" class="d-none">
  <header id="header" class="navbar navbar-expand-xl navbar-fixed navbar-height navbar-flush navbar-container navbar-bordered  "></header>
</div>
<div id="headerDouble" class="d-none">
  <header id="header" class="navbar navbar-expand-lg navbar-bordered flex-lg-column px-0"></header>
</div>

<!-- USED SIDEBAR MENU -->
<div id="sidebarMain" class="d-none">
  <?php $this->load->view('header/sidebar_main') ?>
</div>
<!-- END USED SIDEBAR MENU -->

<div id="sidebarCompact" class="d-none">
  <aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered  "></aside>
</div>

<script src="<?= base_url();?>assets/backend/js/demo.js"></script>

<!-- END ONLY DEV -->

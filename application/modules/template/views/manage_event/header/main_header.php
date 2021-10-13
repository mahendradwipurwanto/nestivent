<?php $this->load->view('header/builder'); ?>

<!-- JS Preview mode only -->

<!-- USED HEADER -->
<div id="headerMain" class="d-none">
  <?php $this->load->view('header/header_main'); ?>
</div>
<!-- END USED HEADER -->

<div id="headerFluid" class="d-none">
  <?php $this->load->view('header/header_fuild') ?>
</div>
<div id="headerDouble" class="d-none">
  <?php $this->load->view('header/header_double') ?>
</div>

<!-- USED SIDEBAR MENU -->
<div id="sidebarMain" class="d-none">
  <?php $this->load->view('header/sidebar_main') ?>
</div>
<!-- END USED SIDEBAR MENU -->

<div id="sidebarCompact" class="d-none">
  <?php $this->load->view('header/sidebar_compact') ?>
</div>

<script src="<?= base_url();?>assets/backend/js/demo.js"></script>

<!-- END ONLY DEV -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title><?= ($this->uri->segment(1) ? ucwords(str_replace('-', ' ', $this->uri->segment(1)).' - Nestivent') : 'Login - Nestivent');?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="./favicon.ico">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="<?= base_url();?>/assets/frontend/css/theme.css">
  </head>

  <body>
    <?php $this->load->view($module.'/'.$fileview); ?>

    <!-- JS Global Compulsory -->
    <script src="<?= base_url();?>/assets/frontend/vendor/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url();?>/assets/frontend/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
    <script src="<?= base_url();?>/assets/frontend/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JS Front -->
    <script src="<?= base_url();?>/assets/frontend/js/hs.core.js"></script>
  </body>
</html>

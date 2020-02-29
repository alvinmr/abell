<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Abell</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= config_item('base_url'); ?>/assets/img/favicon.png">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= config_item('base_url'); ?>/assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= config_item('base_url'); ?>/assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
	

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= config_item('base_url'); ?>/assets/css/style.css">
  <link rel="stylesheet" href="<?= config_item('base_url'); ?>/assets/css/components.css">
  <script src="<?= config_item('base_url'); ?>/assets/modules/jquery.min.js"></script>
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');

</script>
<!-- /END GA --></head>


<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="page-error">
          <div class="page-inner">
            <img class="w-50" src="<?= config_item('base_url'); ?>/assets/img/illustration/illustration3.png" alt="">
            <h1>404</h1>
            <div class="page-description">
              Halaman nya gaada gan!
            </div>
            
              <div class="mt-3">
                <a href="<?= config_item('base_url'); ?>">Kembali ke Dashboard</a>
              </div>
            </div>
          </div>
        </div>
        <div class="simple-footer mt-5">
          Copyright &copy; Kelompok 1 2020
        </div>
      </div>
    </section>
  </div>



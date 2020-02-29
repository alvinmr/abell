<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo $title; ?> &mdash; A-bell</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= base_url('assets/img/favicon.png') ?>">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">    
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/time-picker/jquery.timepicker.css" />	
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/time-picker/lib/bootstrap-datepicker.css" />		
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/picker-time/picker.min.css" />		
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/fullcalendar/fullcalendar.min.css" />		
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/fullcalendar/locale/id.js" />		
  <!-- <link href="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/> -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/components.css">
  <script src="<?php echo base_url(); ?>assets/modules/jquery.min.js"></script>
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');

  function jam() {
	document.getElementById("jam").innerHTML =
		"Waktu : " +
		moment()
			.locale("en-gb")
			.format("LTS");

	var jamskrng = moment()
		.locale("en-gb")
    .format("LTS");
    
    <?php foreach($jadwal_hari as $j) : ?>
      if (jamskrng == "<?= date('H:i:s', strtotime($j['jam'])) ?>") {
          document.getElementById("hasil").innerHTML =
            "<audio src='<?= base_url('') ?>assets/audio/<?= $j['audio'] ?>' autoplay></audio>";
        }  else{
          "belom hidup"
        }
    <?php endforeach; ?>
}
setInterval(jam, 1000);
</script>
<!-- /END GA --></head>

<?php
if ($this->uri->segment(2) == "layout_transparent") {
  $this->load->view('template/layout-2');
  $this->load->view('template/sidebar-2');
}elseif ($this->uri->segment(2) == "layout_top_navigation") {
  $this->load->view('template/layout-3');
  $this->load->view('template/navbar');
}elseif ($this->uri->segment(2) != "auth_login" && $this->uri->segment(2) != "auth_forgot_password"&& $this->uri->segment(2) != "auth_register" && $this->uri->segment(2) != "auth_reset_password" && $this->uri->segment(2) != "errors_503" && $this->uri->segment(2) != "errors_403" && $this->uri->segment(2) != "errors_404" && $this->uri->segment(2) != "errors_500" && $this->uri->segment(2) != "utilities_contact" && $this->uri->segment(2) != "utilities_subscribe") {
  $this->load->view('template/layout');
  $this->load->view('template/sidebar');
}
?>

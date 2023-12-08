<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="<?= base_url() ?>/assets/vendors/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>/assets/vendors/fontawesome/css/all.min.css">
   <!-- <link rel="stylesheet" href="<?= base_url() ?>/assets/vendors/summernote/dist/summernote-bs4.css"> -->
   <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
   <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
   <title> Kelompok 3 - Toko Game Online - <?= $title ?></title>
</head>
<body>

	<!-- Navbar -->
	<?php $this->load->view('layouts/_navbar') ?>
   <!-- End of Navbar -->

	<!-- Content -->
	<?php $this->load->view($page) ?>
	<!-- End for Content -->

   
   <script src="<?= base_url() ?>/assets/vendors/jquery/jquery.min.js"></script>
	<script src="<?= base_url() ?>/assets/vendors/popper/popper.min.js"></script>
	<script src="<?= base_url() ?>/assets/vendors/bootstrap/js/bootstrap.min.js"></script>
	<!-- <script src="<?= base_url() ?>/assets/vendors/summernote/dist/summernote.min.js"></script> -->
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
	<script>
		$('#summernote').summernote({
			height: 300,
		});
		$('#summernote2').summernote({
			height: 300,
		});
   </script>
	
</body>
</html>

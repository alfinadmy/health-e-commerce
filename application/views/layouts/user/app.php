<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Medika Store</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= base_url('assets/img/dd.png'); ?>" type="image/png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="<?= base_url('assets_2/'); ?>css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="<?= base_url('assets_2/'); ?>bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="<?= base_url('assets_2/'); ?>css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="<?= base_url('assets_2/'); ?>css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="<?= base_url('assets_2/'); ?>css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="<?= base_url('assets_2/'); ?>css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="<?= base_url('assets_2/'); ?>css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="<?= base_url('assets_2/'); ?>css/responsive.css">

</head>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
	<!-- Navbar -->
	<?php $this->load->view('layouts/user/_navbar') ?>
	<!-- End Navbar -->

	<!-- Content -->
    <?php $this->load->view($page) ?>
	<!-- End Content -->

		<!-- footer -->
        <div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title">Tentang Kami</h2>
						<p>Medika Store hadir untuk menyediakan solusi kesehatan yang handal dan inovatif.
							 Kami berkomitmen untuk memberikan pelayanan terbaik dan menyediakan alat kesehatan berkualitas tinggi.</p>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title">Hubungi Kami</h2>
						<ul>
							<li>Medika Store, Surabaya</li>
							<li>medikastoret@gmail.com</li>
							<li>(+62) 1112223333</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end footer -->
	
	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; MEDIKA STORE, <?= date('Y') ?>. ALL RIGHT RESERVED</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->
	
	<!-- jquery -->
	<script src="<?= base_url('assets_2/'); ?>js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="<?= base_url('assets_2/'); ?>bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="<?= base_url('assets_2/'); ?>js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="<?= base_url('assets_2/'); ?>js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="<?= base_url('assets_2/'); ?>js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="<?= base_url('assets_2/'); ?>js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="<?= base_url('assets_2/'); ?>js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="<?= base_url('assets_2/'); ?>js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="<?= base_url('assets_2/'); ?>js/sticker.js"></script>
	<!-- main js -->
	<script src="<?= base_url('assets_2/'); ?>js/main.js"></script>

</body>
</html>
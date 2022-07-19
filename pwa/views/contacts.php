<?php
session_start();
error_reporting(0);

if (!isset($_SESSION['user'])) {
	header('location: account');
}
?>

<?php require_once 'header_index.php'; ?>

<body>
	<div id="page">
		<?php require_once('header_b.php'); ?>
		<!-- /header -->
		<main style="background-color:#F5F5F5;">

			<div class="container margin_60">
				<div class="main_title">
					<h2>Contactos de Trueque</h2>
					<p>Euismod phasellus ac lectus fusce parturient cubilia a nisi blandit sem cras nec tempor adipiscing rcu ullamcorper ligula.</p>
				</div>
				<div class="row justify-content-center">
					<div class="col-lg-4">
						<div class="box_contacts">
							<i class="ti-support"></i>
							<h2>Centro de Ayuda <b>Trueque</b></h2>
							<a href="#0">+94 423-23-221</a> - <a href="#0">help@allaia.com</a>
							<small>MON to FRI 9am-6pm SAT 9am-2pm</small>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="box_contacts">
							<i class="ti-map-alt"></i>
							<h2>Sala de ventas <b>Trueque</b></h2>
							<div>6th Forrest Ray, London - 10001 UK</div>
							<small>MON to FRI 9am-6pm SAT 9am-2pm</small>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="box_contacts">
							<i class="ti-package"></i>
							<h2>Pedidos <b>Trueque</b></h2>
							<a href="#0">+94 423-23-221</a> - <a href="#0">order@allaia.com</a>
							<small>MON to FRI 9am-6pm SAT 9am-2pm</small>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
			<div style="background-color:#F5F5F5;">
				<div class="container margin_60_35">
					<div class="row">
						<div class="col-lg-4 col-md-6 add_bottom_25" style="background-color:#fff;padding:2em;">
							<h4 class="pb-3">Drop Us a Line</h4>
							<form action="">
								<div class="form-group">
									<input class="form-control" type="text" placeholder="Nombre *">
								</div>
								<div class="form-group">
									<input class="form-control" type="email" placeholder="Email *">
								</div>
								<div class="form-group">
									<textarea class="form-control" style="height: 150px;" placeholder="Mensaje *"></textarea>
								</div>
								<div class="form-group">
									<input class="btn_1 full-width" type="submit" value="Enviar">
								</div>
							</form>
						</div>
						<div class="col-lg-8 col-md-6 add_bottom_25">
							<iframe class="map_contact" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39714.47749917409!2d-0.13662037019554393!3d51.52871971170425!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondra%2C+Regno+Unito!5e0!3m2!1sit!2ses!4v1557824540343!5m2!1sit!2ses" style="border: 0" allowfullscreen></iframe>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bg_white -->
		</main>
		<!--/main-->
		<?php require_once('footer.php'); ?>
		<!--/footer-->
	</div>
	<!-- page -->
	<div id="toTop"></div>
	<!-- Back to top button -->
	<!-- COMMON SCRIPTS -->
	<script type="text/javascript" src="js/common_scripts.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
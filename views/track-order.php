<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
if (!isset($_SESSION['user'])) {
	header("Location:home");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Ttrueque | Ordenes y pedidos</title>
  <?php require_once 'includes/header_links.php';?>
  <!-- INCLUIR SWEET ALERT 2 -->
  <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
  <script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>
<body>
	<div id="page" class="content-total-page-ttrk">
		<?php	require_once '../php/process_header.php';?>
		<?php require_once 'includes/inc_header-top.php';?>
		<div class="loader-ttrqstr">
      <span class="loader-ttrqstr--loader"></span>
    </div>
		<main class="bg_gray">
			<div id="track_order">
				<div class="container-track-order_ttrq">
					<div class="content-track-order_ttrq">
						<h1>Ordenes y Pedidos</h1>
						<section>
							<div id="alert-soli"></div>
							<div id="alert-feed"></div>
							<div class="cont-products-order-info-cli_ttrq">
								<div class="cont-wrap-radio-stores">
									<div class="cont-btns-carousel-ttrk-checkstores">
										<button type="button" class="btntrackord btn-sideleft" id="btn-sideleft">&#8249;</button>
										<button type="button" class="btntrackord btn-sideright" id="btn-sideright">&#8250;</button>
									</div>
									<div class="cont-radio-stores" id="cont-radio-stores"></div>
								</div>
								<div class="cont-inf-prod-by-str-trackord"></div>
							</div>
						</section>
					</div>
				</div>
			</div>
		</main>
		<?php require_once 'footer.php';?>
	</div>
	<div id="toTop"></div>
	<!-- COMMON SCRIPTS -->
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/actions_pages/buy_cart.js"></script>
	<script type="text/javascript" src="js/actions_pages/remove.js"></script>
	 
	<script type="text/javascript" src="js/actions_pages/all_pages_index.js"></script>
	<script type="text/javascript" src="js/actions_pages/language_currency.js"></script>
	<script type="text/javascript" src="js/actions_pages/track-order.js"></script>
</body>
</html>
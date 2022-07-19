<?php
session_start();

if (!isset($_SESSION['user'])) {
	header("Location:home");
}

?>
<?php require_once 'header_index.php'; ?>

<body class="body-homepwa" style="padding-bottom: 3rem;">
	<?php require_once './headertop-pwa.php'; ?>
	<div class="loader-cli">
      <img src="../shop/images/gifs/shopping-loader.gif" alt="Loading...">
  </div>
	<div id="page" class="content-total-page-ttrk">
		<?php
		require_once '../php/process_header.php';
		?>
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
									<div class="cont-radio-stores" id="cont-radio-stores">
										<!---------NUEVO LISTADO DE PRODUCTOS DENTRO DE LAS TIENDAS ------->
									
									</div>
								</div>
								<div class="cont-inf-prod-by-str-trackord"></div>
							</div>
						</section>
					</div>
				</div>
			</div>
		</main>
	</div>
	<?php require_once './tabsbottom-pwa.php'; ?>
	<script type="text/javascript" src="js/common_scripts.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/actions_pages/buy_cart.js"></script>
	<script type="text/javascript" src="js/actions_pages/remove.js"></script>
	<script type="text/javascript" src="js/actions_pages/customs.js"></script>
	<script type="text/javascript" src="js/actions_pages/all_pages_index.js"></script>
	<script type="text/javascript" src="./js/actions_pages/language_currency.js"></script>
	<script type="text/javascript" src="./js/actions_pages/track-order.js"></script>
	<!--------- SWEEET ALERT 2  ---------->
	
	<script>
  
</script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  
</body>
</html>
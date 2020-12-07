<?php
session_start();



if (!isset($_SESSION['user'])) {
	header("Location:home");
}

?>
<?php require_once 'header_index.php'; ?>

<body>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/tiny-slider.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>
	<div id="page" class="content-total-page-ttrk">
		<?php
		require_once '../php/process_header.php';
		require_once 'header_b.php';
		?>
		<!-- /header -->
		<main class="bg_gray">
			<div id="track_order">
				<div class="container-track-order_ttrq">
					<div class="content-track-order_ttrq">
						<h1>Ordenes y Pedidos</h1>
						<!---<input type="text" value="<?php //echo $_SESSION['idtiendanow'] = $d[0]['tienda'];?>">-->
						<!--<input type="text" value="<?php //echo $_SESSION['user']; ?>">-->
						<section>
							<div id="alert-soli"></div>
							<div id="alert-feed"></div>
							<div class="cont-products-order-info-cli_ttrq">
								<div class="cont-wrap-radio-stores">
									<!--<button type="button" class="btntrackord btn-sideleft" id="btn-sideleft">&#9668;</button>
									<button type="button" class="btntrackord btn-sideright" id="btn-sideright">&#9658;</button>-->
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
			<!-- /track_order -->
		</main>
		<!--/main-->
		<?php require_once 'footer.php'; ?>
		<!--/footer-->
	</div>
	<!-- page -->
	<div id="toTop"></div><!-- Back to top button -->
	<!-- COMMON SCRIPTS -->
	<script src="js/common_scripts.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/actions_pages/buy_cart.js"></script>
	<script src="js/actions_pages/remove.js"></script>
	<script src="js/actions_pages/customs.js"></script>
	<script src="js/actions_pages/search_products.js"></script>
	<script src="./js/actions_pages/language_currency.js"></script>
	<script src="./js/actions_pages/track-order.js"></script>
	<!--------- SWEEET ALERT 2  ---------->
	
	<script>
  
</script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>
</html>
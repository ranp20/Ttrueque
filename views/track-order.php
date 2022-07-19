<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
if (!isset($_SESSION['user'])) {
	header("Location:home");
}
?>
<?php require_once 'header_index.php'; ?>
<body>
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  
</body>
</html>
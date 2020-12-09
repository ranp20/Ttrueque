<?php
session_start();
require_once "../php/process_index.php";
require_once '../php/class/product.php';
require_once '../php/class/store.php';

$c = new Store();
$dat = $c->select_tienda();

$banners = $data["banners"];
$popular = $data["populars"];
$banner_pub = $data["banner_publicidad"];

$path = "admin/images/banner/";
$path_bp = "admin/images/banner_publicidad/";
$path_cli = "shop/folder/";
$path_store = "shop/images/store/";
$path_flag = "admin/images/banderas/";
//PRODUCTOS DEL ADMIN...
if (!isset($_SESSION['user'])) {
	header("Location:home");
}

?>
<?php require_once './header_index.php'; ?>
<body>
	<?php require_once './api_whatsapp.php'; ?>
	<div id="page">
		<?php
		require_once '../php/process_header.php';
		require_once "./header_b.php";

		$p = new Product();
		$top_sells = $p->top_sell($d[0]['pais']);

		?>
		<!-- /header -->
		<div id="datos_search"></div>
		<main id="contenedor-principal-home_2">
			<div id="carousel-home" style="height: 338px">
				<div class="owl-carousel owl-theme">
					<div class="owl-slide cover" style="height: 338px;background-image: url(<?php echo $path . $banners[0]["link_banner"]; ?>);">
						<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.4)">
							<div class="container">
								<div class="row justify-content-center justify-content-md-end">
									<div class="col-lg-6 static">
										<div class="slide-text text-right white">
											<h2 class="owl-slide-animated owl-slide-title"><?php echo $banners[0]["titulo_banner"]; ?></h2>
											<p class="owl-slide-animated owl-slide-subtitle"><?php echo $banners[0]["descripcion_banner"]; ?></p>
											<div class="owl-slide-animated owl-slide-cta">
												<a class="butt_home lang_ttrq" key="btn-banners-h_ttrq" href="#" role="button">Comprar ahora</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/owl-slide-->
					<div class="owl-slide cover" style="height: 338px;background-image: url(<?php echo $path . $banners[1]["link_banner"]; ?>);">
						<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.4)">
							<div class="container">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-lg-6 static">
										<div class="slide-text white">
											<h2 class="owl-slide-animated owl-slide-title"><?php echo $banners[1]["titulo_banner"]; ?></h2>
											<p class="owl-slide-animated owl-slide-subtitle"><?php echo $banners[1]["descripcion_banner"]; ?></p>
											<div class="owl-slide-animated owl-slide-cta">
												<a class="butt_home lang_ttrq" key="btn-banners-h_ttrq" href="#" role="button">Comprar ahora</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/owl-slide-->
					<div class="owl-slide cover" style="height: 338px;background-image: url(<?php echo $path . $banners[2]["link_banner"]; ?>);">
						<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.4)">
							<div class="container">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-lg-12 static">
										<div class="slide-text text-center white">
											<h2 class="owl-slide-animated owl-slide-title"><?php echo $banners[2]["titulo_banner"]; ?></h2>
											<p class="owl-slide-animated owl-slide-subtitle"><?php echo $banners[2]["descripcion_banner"]; ?></p>
											<div class="owl-slide-animated owl-slide-cta">
												<a class="butt_home lang_ttrq" key="btn-banners-h_ttrq" href="#" role="button">Comprar ahora</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/owl-slide-->
					<div class="owl-slide cover" style="height: 338px;background-image: url(<?php echo $path . $banners[3]["link_banner"]; ?>);">
						<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.4)">
							<div class="container">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-lg-12 static">
										<div class="slide-text text-center white">
											<h2 class="owl-slide-animated owl-slide-title"><?php echo $banners[3]["titulo_banner"]; ?></h2>
											<p class="owl-slide-animated owl-slide-subtitle"><?php echo $banners[3]["descripcion_banner"]; ?></p>
											<div class="owl-slide-animated owl-slide-cta">
												<a class="butt_home lang_ttrq" key="btn-banners-h_ttrq" href="#" role="button">Comprar ahora</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/owl-slide-->
					<div class="owl-slide cover" style="height: 338px;background-image: url(<?php echo $path . $banners[4]["link_banner"]; ?>);">
						<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.4)">
							<div class="container">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-lg-6 static">
										<div class="slide-text white">
											<h2 class="owl-slide-animated owl-slide-title"><?php echo $banners[4]["titulo_banner"]; ?></h2>
											<p class="owl-slide-animated owl-slide-subtitle"><?php echo $banners[4]["descripcion_banner"]; ?></p>
											<div class="owl-slide-animated owl-slide-cta">
												<a class="butt_home lang_ttrq" key="btn-banners-h_ttrq" href="#" role="button">Comprar ahora</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/owl-slide-->
					<div class="owl-slide cover" style="height: 338px;background-image: url(<?php echo $path . $banners[5]["link_banner"]; ?>);">
						<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.4)">
							<div class="container">
								<div class="row justify-content-center justify-content-md-start">
									<div class="col-lg-12 static">
										<div class="slide-text text-center white">
											<h2 class="owl-slide-animated owl-slide-title"><?php echo $banners[5]["titulo_banner"]; ?></h2>
											<p class="owl-slide-animated owl-slide-subtitle"><?php echo $banners[5]["descripcion_banner"]; ?></p>
											<div class="owl-slide-animated owl-slide-cta">
												<a class="butt_home lang_ttrq" key="btn-banners-h_ttrq" href="#" role="button">Comprar ahora</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/owl-slide-->
				</div>
				<div id="icon_drag_mobile"></div>
			</div>
			<!--/carousel-->
	</div>
	<!-- Banners_grid -->
	<div class="p-3">
		<?php require_once './best_seller.php'; ?>
		<!-- //LO MÁS VENDIDO-->
		<?php require_once './banner_publicity.php' ?>
		<!-- //BANNER DE PUBLICIDAD-->
		<?php require_once './official_markets.php'; ?>
		<!-- //TIENDAS OFICIALES-->
	</div>
	</main>
	<!-- /main -->
	<?php require_once './footer.php'; ?>
	<!-- /Footer-->
	</div>
	<!-- page -->
	<div id="toTop"></div>
	<!-- Back to top button -->
	<script src="js/common_scripts.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/carousel-home.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="js/jquery.cookiebar.js"></script>
	<script>
		$(document).ready(function() {
			'use strict';
			$.cookieBar({
				fixed: true
			});
		});
	</script>
	<!--------- SWEEET ALERT 2  ---------->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<!---------CUSTOMS JAVASCRIPT--------->
	<script src="js/actions_pages/buy_cart.js"></script>
	<script src="js/actions_pages/remove.js"></script>
	<script src="js/actions_pages/customs.js"></script>
	<script src="js/actions_pages/search_products.js"></script>
	<script src="js/actions_pages/language_currency.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <!--<script src="js/customs/custom.js"></script>-->
	<script src="js/customs/custom.js"></script>
</body>

</html>
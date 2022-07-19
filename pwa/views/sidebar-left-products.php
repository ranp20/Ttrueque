<?php
session_start();

require_once("php/process_detail_producto.php");
require_once("php/class/product.php");
require_once("php/process_list_grid.php");
$p = new Product();
$data = $p->get_data();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Ansonika">
	<title>Trueque | Detalle del producto</title>
	<!-----//ICON-PAGES------>
  <link rel="icon" href="./img/icon-pages/drawable-xxxhdpi-icon.png" type="image/ico">
	<!-- GOOGLE WEB FONT -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
	<!-- BASE CSS -->
	<link href="css/bootstrap.custom.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<!-- SPECIFIC CSS -->
	<link href="css/product_page.css" rel="stylesheet">
	<!-- LINEICONS -->
	<link rel="stylesheet" href="shop/LineIcons-Package-2.0/WebFont/font-css/LineIcons.css">
	<!-- YOUR CUSTOM CSS -->
	<link href="css/customs/custom.css" rel="stylesheet">
	<!-- Estilos.css -->
	<link href="css/estilos.css" rel="stylesheet">
	<!-- FontAwesome customs -->
	<script src="js/customs.js"></script>
</head>

<body>

	<div id="page">

		<!--============== /header.php =============-->
		<?php require_once 'header_b.php';  ?>

		<!--============== /header-links.php =============-->
		<?php require_once 'header-links.php'; ?>

		<!--============== /header-links.php =============-->
		<div class="container-sidebar-left-products">
			<div class="contenido-sidebar-producto">
				<div class="contenido-body-sidebar-producto">
					<!--============== /contenido izquierdo =============-->
					<div class="container margin_30">
						<div class="row small-gutters">
							<?php
							foreach ($data_products as $val) {

								$p = $path_products . $val["ruta_imagen"];

								echo "<div class='col-6 col-md-4 col-xl-3'>
							<div class='grid_item'>
								<figure>
									<span class='ribbon off'>-30%</span>
									<a href='product-detail-1.html'>
										<img class='img-fluid lazy' src='{$p}' data-src='{$p}' alt=''>
									</a>
									<div data-countdown='2019/05/15' class='countdown'></div>
								</figure>
								<a href='product-detail-1.html'>
									<h3>{$val["nombre_producto"]}</h3>
								</a>
								<div class='price_box'>
									<span class='new_price'>{$val["precio_producto"]}</span>
								</div>
								<ul>
									<li><a href='javascript:void(0);' class='tooltip-1' data-toggle='tooltip' data-placement='left' title='Añadir a favoritos'><i class='ti-heart'></i><span>Añadir a favoritos</span></a></li>
									<li><a href='javascript:void(0);' class='tooltip-1' data-toggle='tooltip' data-placement='left' title='Añadir para comparar'><i class='ti-control-shuffle'></i><span>Añadir para comparar</span></a></li>
									<li><a href='javascript:void(0);' class='tooltip-1' data-toggle='tooltip' data-placement='left' title='Añadir al carrito'><i class='ti-shopping-cart'></i><span>Añadir al carrito</span></a></li>
								</ul>
							</div>
						</div>";
							}
							?>

							<!-- /col -->
						</div>
						<!-- /row -->

						<div class="pagination__wrapper">
							<ul class="pagination">
								<li><a href="#0" class="prev" title="previous page">&#10094;</a></li>
								<li>
									<a href="#0" class="active">1</a>
								</li>
								<li>
									<a href="#0">2</a>
								</li>
								<li>
									<a href="#0">3</a>
								</li>
								<li>
									<a href="#0">4</a>
								</li>
								<li><a href="#0" class="next" title="next page">&#10095;</a></li>
							</ul>
						</div>

					</div>
					<!-- /container -->
					<!--============== /contenido derecho =============-->

				</div>
			</div>
		</div>

		<!--============== /footer.php ========-->
		<?php require_once 'footer.php'; ?>
	</div>
	<!-- page -->

	<!--=== /Back to top button ===-->
	<div id="toTop"></div>

	<!-- JQuery -->
	
	<!-- COMMON SCRIPTS -->
	<script src="js/common_scripts.min.js"></script>
	<script src="js/main.js"></script>

	<!-- SPECIFIC SCRIPTS -->
	<script src="js/carousel_with_thumbs.js"></script>
	<!-- Plugin EffectZoom -->
	<link rel="stylesheet" href="js/jquery.elevateZoom-3.0.8.min.js">
	<script>
		$('.ZoomImagen').elevateZoom();
	</script>
	<script src="js/customs/custom.js"></script>
</body>

</html>
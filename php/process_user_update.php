<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['user'])) {
	header('location:account');
}

require_once('php/class/client.php');
$c = new Client();
if (isset($_SESSION['user']))
	$data = $c->get_data_by_id($_SESSION['user']);

?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Ansonika">
	<title>Trueque | Mi Perfil</title>

	<!-- Favicons-->
	<!-- <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"> -->
	<link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">


	<!--- --- ---- --- CUSTOM FAVICON --- --- --- --->
	<link rel="apple-touch-icon" sizes="57x57" href="img/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="img/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="img/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="img/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="img/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="img/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192" href="img/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="img/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="img/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<!--- --- ---- --- CUSTOM FAVICON --- --- --- --->


	<!-- GOOGLE WEB FONT -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">

	<!-- BASE CSS -->
	<link href="css/bootstrap.custom.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

	<!-- SPECIFIC CSS -->
	<link href="css/product_page.css" rel="stylesheet">

	<!-- YOUR CUSTOM CSS -->
	<link href="css/custom.css" rel="stylesheet">

	<link rel="stylesheet" href="css/estilos.css">
	<!-- estilos.css -->

</head>

<body>

	<div id="page" class="theia-exception">

		<?php require_once('header_b.php'); ?>
		<!-- /header -->

		<main>
			<div class="container margin_30">
				<div class="row">
					<div class="col-lg-4 magnific-gallery">
						<p>
							<a href="img/products/shoes/large/1.jpg" title="Foto de <?php foreach ($data as $val) {
																						echo $val['nombre_cliente'] . " " . $val['apellido_cliente'];
																					} ?>" data-effect="mfp-zoom-in"><img src="img/products/shoes/large/1.jpg" alt="" class="img-fluid"></a>
						</p>
					</div>
					<div class="col-lg-6" id="sidebar_fixed">
						<div class="breadcrumbs">
							<ul>
								<li><a href="/" class="linea-enlace">Inicio</a></li>
								<li><a href="javascript:void(0);" class="linea-enlace">Categoría</a></li>
								<li>Página Activa</li>
							</ul>
						</div>

						<!-- /page_header -->
						<div class="prod_info">
							<h1 style="font-size:2.5em;"><?php echo $val['nombre_cliente'] . " " . $val['apellido_cliente'];
															?><span style="font-size:.5em;float:right;">&nbsp;&nbsp;Puntos: <?php echo $val['puntos']; ?><i class="icon-star" style="color:#FEC348;"></i></span></h1>
							<span class="rating"><em>4 Comentarios</em></span>
							<?php echo "
								<form>
									<div class='form-group row'>
										<label class='col-sm-2 col-form-label lb-editar'><p>Nombres:</p></label>
										<div class='col-sm-4'>
											<input class='form-control editar' value='{$val['nombre_cliente']}'></input>
										</div>
									</div>
									<div class='form-group row'>
										<label class='col-sm-2 col-form-label lb-editar'>Apellidos:</label>
										<div class='col-sm-4'>
											<input class='form-control editar' value='{$val['apellido_cliente']}'></input>
										</div>
									</div>
									<div class='form-group row'>
										<label class='col-sm-2 col-form-label lb-editar'>Teléfono:</label>
										<div class='col-sm-3'>
											<input class='form-control editar' value='{$val['telefono']}'></input>
										</div>
									</div>
									<div class='form-group row'>
										<label class='col-sm-2 col-form-label lb-editar'>Email:</label>
										<div class='col-sm-5'>
											<input class='form-control editar' value='{$val['email_cliente']}'></input>
										</div>
									</div>
									<div class='form-group row'>
										<label class='col-sm-2 col-form-label lb-editar'>Dirección:<a href='javascript:void(0);' data-toggle='modal' data-target='#size-modal'><i class='ti-help-alt'></i></a></label>
										<div class='col-sm-8'>
											<input class='form-control editar' value='{$val['direccion_cliente']}'></input>
										</div>
									</div>
									<input type='submit' class='col-sm-3 offset-sm-9 form-control btn_edit' value='Guardar'></input>
								</form>";
							?>

						</div>
						<!-- /prod_info -->

						<!-- /product_actions -->
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->

		</main>
		<?php require_once('footer.php'); ?>
		<!-- /main -->
	</div>
	<!-- page -->

	<div  id="toTopgobtn"></div><!-- Back to top button -->

	<div class="top_panel">
		<div class="container header_panel">
			<a href="#0" class="btn_close_top_panel"><i class="ti-close"></i></a>
			<label>1 product added to cart</label>
		</div>
		<!-- /header_panel -->
		<div class="item">
			<div class="container">
				<div class="row">
					<div class="col-md-7">
						<div class="item_panel">
							<figure>
								<img src="img/products/product_placeholder_square_small.jpg" data-src="img/products/shoes/1.jpg" class="lazy" alt="">
							</figure>
							<h4>1x Armor Air X Fear</h4>
							<div class="price_panel"><span class="new_price">$148.00</span><span class="percentage">-20%</span> <span class="old_price">$160.00</span></div>
						</div>
					</div>
					<div class="col-md-5 btn_panel">
						<a href="cart.html" class="btn_1 outline">View cart</a> <a href="checkout.html" class="btn_1">Checkout</a>
					</div>
				</div>
			</div>
		</div>
		<!-- /item -->
		<div class="container related">
			<h4>Who bought this product also bought</h4>
			<div class="row">
				<div class="col-md-4">
					<div class="item_panel">
						<a href="#0">
							<figure>
								<img src="img/products/product_placeholder_square_small.jpg" data-src="img/products/shoes/2.jpg" alt="" class="lazy">
							</figure>
						</a>
						<a href="#0">
							<h5>Armor Okwahn II</h5>
						</a>
						<div class="price_panel"><span class="new_price">$90.00</span></div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="item_panel">
						<a href="#0">
							<figure>
								<img src="img/products/product_placeholder_square_small.jpg" data-src="img/products/shoes/3.jpg" alt="" class="lazy">
							</figure>
						</a>
						<a href="#0">
							<h5>Armor Air Wildwood ACG</h5>
						</a>
						<div class="price_panel"><span class="new_price">$75.00</span><span class="percentage">-20%</span> <span class="old_price">$155.00</span></div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="item_panel">
						<a href="#0">
							<figure>
								<img src="img/products/product_placeholder_square_small.jpg" data-src="img/products/shoes/4.jpg" alt="" class="lazy">
							</figure>
						</a>
						<a href="#0">
							<h5>Armor ACG React Terra</h5>
						</a>
						<div class="price_panel"><span class="new_price">$110.00</span></div>
					</div>
				</div>
			</div>
		</div>
		<!-- /related -->
	</div>
	<!-- /add_cart_panel -->

	<!-- Size modal -->
	<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="size-modal" id="size-modal" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Size guide</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i class="ti-close"></i>
					</button>
				</div>
				<div class="modal-body">
					<p>Lorem ipsum dolor sit amet, et velit propriae invenire mea, ad nam alia intellegat. Aperiam mediocrem rationibus nec te. Tation persecuti accommodare pro te. Vis et augue legere, vel labitur habemus ocurreret ex.</p>
					<div class="table-responsive">
						<table class="table table-striped table-sm sizes">
							<tbody>
								<tr>
									<th scope="row">US Sizes</th>
									<td>6</td>
									<td>6,5</td>
									<td>7</td>
									<td>7,5</td>
									<td>8</td>
									<td>8,5</td>
									<td>9</td>
									<td>9,5</td>
									<td>10</td>
									<td>10,5</td>
								</tr>
								<tr>
									<th scope="row">Euro Sizes</th>
									<td>39</td>
									<td>39</td>
									<td>40</td>
									<td>40-41</td>
									<td>41</td>
									<td>41-42</td>
									<td>42</td>
									<td>42-43</td>
									<td>43</td>
									<td>43-44</td>
								</tr>
								<tr>
									<th scope="row">UK Sizes</th>
									<td>5,5</td>
									<td>6</td>
									<td>6,5</td>
									<td>7</td>
									<td>7,5</td>
									<td>8</td>
									<td>8,5</td>
									<td>9</td>
									<td>9,5</td>
									<td>10</td>
								</tr>
								<tr>
									<th scope="row">Inches</th>
									<td>9.25"</td>
									<td>9.5"</td>
									<td>9.625"</td>
									<td>9.75"</td>
									<td>9.9375"</td>
									<td>10.125"</td>
									<td>10.25"</td>
									<td>10.5"</td>
									<td>10.625"</td>
									<td>10.75"</td>
								</tr>
								<tr>
									<th scope="row">CM</th>
									<td>23,5</td>
									<td>24,1</td>
									<td>24,4</td>
									<td>24,8</td>
									<td>25,4</td>
									<td>25,7</td>
									<td>26</td>
									<td>26,7</td>
									<td>27</td>
									<td>27,3</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!-- /table -->
				</div>
			</div>
		</div>
	</div>


	<!--/footer-->

	<!-- COMMON SCRIPTS -->
	  
	<script type="text/javascript" src="js/main.js"></script>

	<!-- SPECIFIC SCRIPTS -->
	<script type="text/javascript" src="js/sticky_sidebar.min.js"></script>
	<script>
		// Sticky sidebar
		$('#sidebar_fixed').theiaStickySidebar({
			minWidth: 991,
			updateSidebarHeight: false,
			additionalMarginTop: 90
		});
	</script>

</body>

</html>
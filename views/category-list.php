<?php
session_start();




if (!isset($_SESSION['user'])) {
	header('location: account');
}
?>
<?php require_once 'header_index.php'; ?>

<body>
	<!-- /APPI WHATSAPP-->
	<?php require_once 'api_whatsapp.php'; ?>
	<!--- --- API WHATSAPP--- ---  --->
	<div class="loader">
		<img src="img/gifs/money-loader.gif" alt="Loading...">
	</div>
	<!-- /LOADER-->
	<div id="page">
		<!-- /header -->
		<?php
		require_once '../php/process_header.php';
		require_once 'header_b.php'; 
		?>
		<?php require_once 'header-links.php'; ?>
		<div class="container" style="min-height:100vh;">
			<div class="row">
				<div class="container margin_60_35" style="padding-top:30px;">
					<div class="contenido-categorias">
						<h3 class="title-categorias">Todas las Categorías</h3>
						<ul class="list-categorias">
							<a href="#" class="item-list-categorias">
								<li>
									<i class="fal fa-loveseat fa-4x"></i>
									<p>Hogar, Muebles y Jardín</p>
								</li>
							</a>
							<a href="#" class="item-list-categorias">
								<li>
									<i class="fal fa-desktop-alt fa-4x"></i>
									<p>Computación</p>
								</li>
							</a>
							<a href="#" class="item-list-categorias">
								<li>
									<i class="fal fa-oven fa-4x"></i>
									<p>Electrodomésticos</p>
								</li>
							</a>
							<a href="#" class="item-list-categorias">
								<li>
									<i class="fal fa-futbol fa-4x"></i>
									<p>Deportes y Fitnees</p>
								</li>
							</a>
							<a href="#" class="item-list-categorias">
								<li>
									<i class="fal fa-puzzle-piece fa-4x"></i>
									<p>Juegos y Juguetes</p>
								</li>
							</a>
							<a href="#" class="item-list-categorias">
								<li>
									<i class="fal fa-lips fa-4x"></i>
									<p>Salud y Belleza</p>
								</li>
							</a>
							<a href="#" class="item-list-categorias">
								<li>
									<i class="fal fa-car-mechanic fa-4x"></i>
									<p>Accesorios para Vehículos</p>
								</li>
							</a>
							<a href="./categories/cellphones_phones.php" class="item-list-categorias">
								<li>
									<i class="fal fa-mobile-android fa-4x"></i>
									<p>Celulares y Teléfonos</p>
								</li>
							</a>
							<a href="#" class="item-list-categorias">
								<li>
									<i class="fal fa-microphone-alt fa-4x"></i>
									<p>Electrónica, Audio y Vídeo</p>
								</li>
							</a>
							<a href="#" class="item-list-categorias">
								<li>
									<i class="fal fa-tshirt fa-4x"></i>
									<p>Ropa y Accesorios</p>
								</li>
							</a>
							<a href="#" class="item-list-categorias">
								<li>
									<i class="fal fa-car-alt fa-4x"></i>
									<p>Autos, Motos y Otros</p>
								</li>
							</a>
							<a href="#" class="item-list-categorias">
								<li>
									<i class="fal fa-watch fa-4x"></i>
									<p>Joyas y Relojes</p>
								</li>
							</a>
							<a href="#" class="item-list-categorias">
								<li>
									<i class="fal fa-gamepad fa-4x"></i>
									<p>Consolas y Videojuegos</p>
								</li>
							</a>
							<a href="#" class="item-list-categorias">
								<li>
									<i class="fal fa-bone fa-4x"></i>
									<p>Animales y Mascotas</p>
								</li>
							</a>
							<a href="#" class="item-list-categorias">
								<li>
									<i class="fal fa-album-collection fa-4x"></i>
									<p>Antiguedades y Colecciones</p>
								</li>
							</a>
							<a href="#" class="item-list-categorias">
								<li>
									<i class="fal fa-camera-retro fa-4x"></i>
									<p>Cámara y Accesorios</p>
								</li>
							</a>
							<a href="#" class="item-list-categorias">
								<li>
									<i class="fal fa-chair-office fa-4x"></i>
									<p>Industrias y Oficinas</p>
								</li>
							</a>
							<a href="#" class="item-list-categorias">
								<li>
									<i class="fal fa-guitar fa-4x"></i>
									<p>Instrumentos Musicales</p>
								</li>
							</a>
							<a href="#" class="item-list-categorias">
								<li>
									<i class="fal fa-music fa-4x"></i>
									<p>Músca y Películas</p>
								</li>
							</a>
							<a href="#" class="item-list-categorias">
								<li>
									<i class="fal fa-tractor fa-4x"></i>
									<p>Apro</p>
								</li>
							</a>
							<a href="#" class="item-list-categorias">
								<li>
									<i class="fal fa-briefcase-medical fa-4x"></i>
									<p>Salud y Equipamiento Médico</p>
								</li>
							</a>
							<a href="#" class="item-list-categorias">
								<li>
									<i class="fal fa-baby fa-4x"></i>
									<p>Bebés</p>
								</li>
							</a>
							<a href="#" class="item-list-categorias">
								<li>
									<i class="fal fa-wrench fa-4x"></i>
									<p>Herramientas y Construcción</p>
								</li>
							</a>
							<a href="#" class="item-list-categorias">
								<li>
									<i class="fal fa-house fa-4x"></i>
									<p>Inmuebles</p>
								</li>
							</a>
							<a href="#" class="item-list-categorias">
								<li>
									<i class="fal fa-book-open fa-4x"></i>
									<p>Libros, Revistas y Comics</p>
								</li>
							</a>
							<a href="#" class="item-list-categorias">
								<li>
									<i class="fal fa-users fa-4x"></i>
									<p>Servicios</p>
								</li>
							</a>
							<a href="#" class="item-list-categorias">
								<li>
									<i class="fal fa-ellipsis-h-alt fa-4x"></i>
									<p>Otras Categorías</p>
								</li>
							</a>
							<a href="#" class="item-list-categorias">
								<li>
									<i class="fal fa-glass-cheers fa-4x"></i>
									<p>Recuerdos, Cotillón y Fiestas</p>
								</li>
							</a>
							<a href="#" class="item-list-categorias">
								<li>
									<i class="fal fa-burger-soda fa-4x"></i>
									<p>Alimentos y Bebidas</p>
								</li>
							</a>
							<a href="#" class="item-list-categorias">
								<li>
									<i class="fal fa-palette fa-4x"></i>
									<p>Arte, Librería y Mercadería</p>
								</li>
							</a>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div style="background-color:#ddd;">
			<div class="container margin_30">
				<div id="brands" class="owl-carousel owl-theme">
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_1.png" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_2.png" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_3.png" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_4.png" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_5.png" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_6.png" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
				</div><!-- /carousel -->
			</div><!-- /container -->
		</div>
		<!-- /bg_gray -->
		<!--/footer-->
	<?php require_once "./footer.php"; ?>
	</div>
	<!-- page -->
	<div id="toTop"></div>
	<!-- Back to top button -->
	<!-- COMMON SCRIPTS -->
	<script src="js/common_scripts.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/carousel-home.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="js/actions_pages/buy_cart.js"></script>
	<script src="js/actions_pages/modal_dialog.js"></script>
	<script src="js/actions_pages/customs.js"></script>
	<script src="js/jquery.cookiebar.js"></script>
	<script>
		$(document).ready(function() {
			'use strict';
			$.cookieBar({
				fixed: true
			});

		});
	</script>
	<script src="js/actions_pages/search_products.js"></script>
	<script src="css/font-awesome/5.13.1/js/fontawesome.min.js"></script>
</body>
</html>
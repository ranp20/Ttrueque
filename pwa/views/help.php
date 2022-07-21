<?php
session_start();



?>
<?php require_once 'header_index.php'; ?>
<body>
	<div id="page">
		<?php
		require_once '../php/process_header.php';
		require_once 'includes/inc_header-top.php'; ?>
		<!-- /header -->
		<main class="bg_gray">
			<div class="container margin_30">
				<div class="page_header">
					<div class="breadcrumbs">
						<ul>
							<li><a href="/">Inicio</a></li>
							<li><a href="javascript:void(0);">Categoría</a></li>
							<li>Página activa</li>
						</ul>
					</div>
					<h1>Ayuda y Soporte</h1>
				</div>
				<!-- /page_header -->
				<div class="search-input">
					<input type="text" placeholder="Buscar pregunta o artículo...">
					<button type="submit"><i class="ti-search"></i></button>
				</div>
				<!-- /search-input -->
				<div class="row">
					<div class="col-lg-4 col-md-6">
						<a class="box_topic" href="#0">
							<i class="ti-wallet"></i>
							<h3>Pagos</h3>
							<p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus.</p>
						</a>
					</div>
					<div class="col-lg-4 col-md-6">
						<a class="box_topic" href="#0">
							<i class="ti-user"></i>
							<h3>Cuenta</h3>
							<p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus.</p>
						</a>
					</div>
					<div class="col-lg-4 col-md-6">
						<a class="box_topic" href="#0">
							<i class="ti-help"></i>
							<h3>Ayuda General</h3>
							<p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus.</p>
						</a>
					</div>
					<div class="col-lg-4 col-md-6">
						<a class="box_topic" href="#0">
							<i class="ti-truck"></i>
							<h3>Shipping</h3>
							<p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus.</p>
						</a>
					</div>
					<div class="col-lg-4 col-md-6">
						<a class="box_topic" href="#0">
							<i class="ti-eraser"></i>
							<h3>Cancelación</h3>
							<p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus.</p>
						</a>
					</div>
					<div class="col-lg-4 col-md-6">
						<a class="box_topic" href="#0">
							<i class="ti-comments"></i>
							<h3>Comentarios</h3>
							<p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus.</p>
						</a>
					</div>
				</div>
				<!--/row-->
			</div>
			<!-- /container -->
			<div class="bg_white">
				<div class="container margin_30">
					<h5>Artículos Populares</h5>
					<div class="list_articles add_bottom_15 clearfix">
						<ul>
							<li><a href="#0"><i class="ti-file"></i><strong>Account</strong> - Et dicit vidisse epicurei pri</a></li>
							<li><a href="#0"><i class="ti-file"></i><strong>Account</strong> - Ad sit virtute rationibus efficiantur</a></li>
							<li><a href="#0"><i class="ti-file"></i><strong>Refund</strong> - Partem vocibus omittam pri ne</a></li>
							<li><a href="#0"><i class="ti-file"></i><strong>Shipping</strong> - Case debet appareat duo cu</a></li>
							<li><a href="#0"><i class="ti-file"></i><strong>Payments</strong> - Impedit torquatos quo in</a></li>
							<li><a href="#0"><i class="ti-file"></i><strong>Warranty</strong> - Nec omnis alienum no</a></li>
							<li><a href="#0"><i class="ti-file"></i><strong>Refund</strong> - Quo eu soleat facilisi menandri</a></li>
							<li><a href="#0"><i class="ti-file"></i><strong>Reviews</strong> - Et dicit vidisse epicurei pri</a></li>
						</ul>
					</div>
					<!-- /list_articles -->
				</div>
			</div>
			<!---
			<div class="content-list-help-you">
				<ul class="list-help-you">
					<a href="javascript:void(0);" class="items-help-you">
						<li>
							<i class="fal fa-shopping-bag fa-2x"></i>
							<p>Comprando</p>
						</li>
					</a>
					<a href="javascript:void(0);" class="items-help-you">
						<li>
							<i class="fal fa-tags fa-2x"></i>
							<p>Vendiendo</p>
						</li>
					</a>
					<a href="javascript:void(0);" class="items-help-you">
						<li>
							<i class="fal fa-user fa-2x"></i>
							<p>Configuración de tu cuenta</p>
						</li>
					</a>
					<a href="javascript:void(0);" class="items-help-you">
						<li>
							<i class="fal fa-key fa-2x"></i>
							<p>Seguridad</p>
						</li>
					</a>
				</ul>
			</div>-->
		</main>
		<!--/main-->
		<?php require_once 'footer.php'; ?>
		<!--/footer-->
	</div>
	<!-- page -->
	<!-- Back to top button -->
	<div id="toTop"></div>
	<!-- COMMON SCRIPTS -->
	  
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/actions_pages/buy_cart.js"></script>
	<script type="text/javascript" src="js/actions_pages/remove.js"></script>
	<script type="text/javascript" src="js/actions_pages/customs.js"></script>
	<script type="text/javascript" src="js/actions_pages/all_pages_index.js"></script>
	<script type="text/javascript" src="./js/actions_pages/language_currency.js"></script>
</body>
</html>
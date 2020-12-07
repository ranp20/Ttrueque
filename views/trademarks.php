<?php
session_start();



require_once 'php/class/store.php';
$c = new Store();
$dat = $c->select_tienda();
?>


<?php require_once 'header_index.php'; ?>

<body>
	<?php require_once './api_whatsapp.php' ?>
	<!--- --- API WHATSAPP--- ---  --->
	<div class="loader">
		<img src="img/gifs/money-loader.gif" alt="Loading...">
	</div>
	<div id="page">
		<?php require_once './header_b.php'; ?>
		<!-- /header -->
		<?php require_once './official_markets.php'; ?>
		<!-- //OFFICIAL MARKETS-->
	</div>
	<!--/footer-->
	<?php require_once("./footer.php") ?>
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
	<script src="js/actions_pages/history-shoping.js"></script>
</body>
</html>
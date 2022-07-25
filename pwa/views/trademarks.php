<?php
session_start();

require_once 'php/class/store.php';
$c = new Store();
$dat = $c->select_tienda();
?>


<?php require_once 'header_index.php'; ?>

<body>
	<?php require_once 'includes/inc_api-whatsapp.php' ?>
	<!--- --- API WHATSAPP--- ---  --->
	<div class="loader">
		<img src="img/gifs/money-loader.gif" alt="Loading...">
	</div>
	<div id="page">
		<?php require_once 'includes/inc_header-top.php'; ?>
		<!-- /header -->
		<?php require_once './official_markets.php'; ?>
		<!-- //OFFICIAL MARKETS-->
	</div>
	<!--/footer-->
	<?php require_once("./footer.php") ?>
	</div>
	<!-- page -->
	<div  id="toTopgobtn"></div>
	<!-- Back to top button -->
	<!-- COMMON SCRIPTS -->
	  
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/carousel-home.min.js"></script>
	
	<script type="text/javascript" src="js/actions_pages/buy_cart.js"></script>
	 
	 
	<script type="text/javascript" src="js/jquery.cookiebar.js"></script>
	<script>
		$(document).ready(function() {
			'use strict';
			$.cookieBar({
				fixed: true
			});
		});
	</script>
	<script type="text/javascript" src="js/actions_pages/all_pages_index.js"></script>
	<script type="text/javascript" src="css/font-awesome/5.13.1/js/fontawesome.min.js"></script>
	 
</body>
</html>
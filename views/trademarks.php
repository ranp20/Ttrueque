<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
require_once 'php/class/store.php';
$c = new Store();
$dat = $c->select_tienda();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Ttrueque | Trademarks</title>
  <?php require_once 'includes/header_links.php';?>
</head>
<body>
	<?php  require_once 'includes/inc_api-whatsapp.php' ?>
	<div id="page">
		<?php require_once './header_b.php'; ?>
		<?php require_once './official_markets.php'; ?>
	</div>
	<?php require_once("./footer.php") ?>
	</div>
	<div id="toTop"></div>
	<!-- COMMON SCRIPTS -->
	<script type="text/javascript" src="js/common_scripts.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/carousel-home.min.js"></script>
	<script type="text/javascript" src="js/actions_pages/buy_cart.js"></script>
	<script type="text/javascript" src="js/actions_pages/modal_dialog.js"></script>
	<script type="text/javascript" src="js/actions_pages/customs.js"></script>
	<script type="text/javascript" src="js/actions_pages/all_pages_index.js"></script>
	<script type="text/javascript" src="css/font-awesome/5.13.1/js/fontawesome.min.js"></script>
	<script type="text/javascript" src="js/actions_pages/history-shoping.js"></script>
</body>
</html>
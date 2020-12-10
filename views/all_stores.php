<?php
session_start();

if (!isset($_SESSION["user"])) {
	header("Location: account");
}
require_once '../php/class/store.php';
$c = new Store();
$dat = $c->select_tienda();
?>

<?php require_once 'header_index.php'; ?>

<body>
	<?php require_once 'api_whatsapp.php' ?>
	<!--- API WHATSAPP---->
	<div id="page">
		<?php
		require_once '../php/process_header.php';
		require_once 'header_b.php';
		?>
		<!-- /header -->
		<?php require_once 'categorias_store.php' ?>
	</div>
	<!--/footer-->
	<?php require_once 'footer.php' ?>
	</div>
	<!-- page -->
	<div id="toTop"></div>
	<!-- Back to top button -->
	<!-- COMMON SCRIPTS -->
	<script src="./js/common_scripts.min.js"></script>
	<script src="./js/main.js"></script>
	<script src="./js/carousel-home.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="./js/actions_pages/buy_cart.js"></script>
	<script src="./js/actions_pages/view_cart.js"></script>
	<script src="./js/actions_pages/modal_dialog.js"></script>
	<script src="./js/actions_pages/customs.js"></script>
	<script src="./js/jquery.cookiebar.js"></script>
	<script src="./js/actions_pages/search_products.js"></script>
	<script src="./js/actions_pages/history-shoping.js"></script>
	<script src="./js/actions_pages/language_currency.js"></script>
	<script src="./js/actions_pages/listAllCategories.js"></script>
	<script src="./js/actions_pages/listCategories_ByStore.js"></script>
	<script src="./js/actions_pages/listProds_Store_Category.js"></script>
	<script src="js/customs/custom.js"></script>
</body>
</html>
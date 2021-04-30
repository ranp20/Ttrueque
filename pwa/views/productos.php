<?php
session_start();

if(count($_GET) == 2){
	if(!isset($_GET['store']) || !isset($_GET['cat'])){
		header("Location: ./");
	}
}else{
	if(!isset($_GET['categoria'])){
		header("Location: ./");
	}
}


if (!isset($_SESSION["user"])) {
	header("Location: account");
}
require_once 'header_index.php';
?>

<body>
    <div id="page">
        <?php
		    require_once '../php/process_header.php';
            require_once "./headertop-pwa.php";   
		?>
        <!----//MOSTRAR PRODUCTOS DE ACUERDO A LA CONDICIÓN--->
        <?php require_once 'products_most-popular.php';	?>
    </div>
    <?php require_once './tabsbottom-pwa.php'; ?>
    </div>
    <script src="./js/common_scripts.min.js"></script>
    <script src="./js/main.js"></script>
    <script src="./js/carousel-home.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="./js/actions_pages/modal_dialog.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="./js/actions_pages/customs.js"></script>
    <script src="./js/actions_pages/buy_cart.js"></script>
    <script src="./js/actions_pages/search_products.js"></script>
    <script src="./js/actions_pages/history-shoping.js"></script>
    <script src="./js/actions_pages/listProds_Search_Category.js"></script>
    <script src="./js/actions_pages/listProds_Store_Category.js"></script>
    <script src="./js/actions_pages/language_currency.js"></script>
    <script src="js/customs/custom.js"></script>
    <script src="./js/actions_pages/track-order.js"></script>
</body>
</html>
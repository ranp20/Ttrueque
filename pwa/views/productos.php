<?php
session_start();

/*if(!isset($_GET['store']) || !isset($_GET['categoria'])){
    header("Location: ./");
}*/


if (!isset($_SESSION["user"])) {
	header("Location: account");
}
require_once 'header_index.php';
?>

<body class="body-homepwa">
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
    
    <script type="text/javascript" src="./js/main.js"></script>
    <script type="text/javascript" src="./js/carousel-home.min.js"></script>
    
    <script type="text/javascript" src="./js/actions_pages/modal_dialog.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript" src="./js/actions_pages/customs.js"></script>
    <script type="text/javascript" src="./js/actions_pages/buy_cart.js"></script>
    <script type="text/javascript" src="./js/actions_pages/all_pages_index.js"></script>
    <script type="text/javascript" src="./js/actions_pages/history-shoping.js"></script>
    <script type="text/javascript" src="./js/actions_pages/listProds_Search_Category.js"></script>
    <script type="text/javascript" src="./js/actions_pages/listProds_Store_Category.js"></script>
    <script type="text/javascript" src="./js/actions_pages/listProds_ByNameStore.js"></script>
    <script type="text/javascript" src="./js/actions_pages/language_currency.js"></script>
    
    <script type="text/javascript" src="./js/actions_pages/track-order.js"></script>
</body>
</html>
<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
if (!isset($_SESSION["user"])) {
	header("Location: account");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Ttrueque | <?= (isset($_GET) && count($_GET) > 0 && $_GET != "") ? $_GET['store'] : "";?></title>
  <?php require_once 'includes/header_links.php';?>
  <!-- INCLUIR SWEET ALERT 2 -->
  <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
  <script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>
<body>
    <?php require_once 'api_whatsapp.php';?>
    <div id="page">
      <?php require_once '../php/process_header.php';?>
      <?php require_once 'header_b.php';?>
      <?php require_once 'products_most-popular.php';	?>
    </div>
    <?php require_once 'footer.php';?>
    <div id="toTop"></div>
    <script type="text/javascript" src="./js/main.js"></script>
    <!---------CUSTOMS JAVASCRIPT--------->
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
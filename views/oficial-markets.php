<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
require_once '././php/class/store.php';
$c = new Store();
$dat = $c->select_tienda();
?>
<?php require_once 'header_index.php';?>
<body>
  <?php require_once 'api_whatsapp.php';?>
  <div class="loader">
    <img src="../img/gifs/money-loader.gif" alt="Loading...">
  </div>
  <div id="page">
    <?php require_once 'header_b.php';?>
    <?php require_once 'official_markets.php';?>
  </div>
  <?php require_once 'footer.php';?>
  </div>
  <div id="toTop"></div>
  <!-- COMMON SCRIPTS -->
  <script src="../js/common_scripts.min.js"></script>
  <script src="../js/main.js"></script>
  <!-- SPECIFIC SCRIPTS -->
  <script src="../js/carousel-home.min.js"></script>
  <script src="../js/actions_pages/buy_cart.js"></script>
  <!-- Agregar la ventana modal a la página -->
  <script src="../js/actions_pages/modal_dialog.js"></script>
  <!-- Agregar loader page a la página -->
  <script src="../js/actions_pages/customs.js"></script>
  <!-- CUSTOM JAVASCRIPT -->
  <script src="../js/actions_pages/search_products.js"></script>
  <!-- FONTAWESOME -->
  <script src="css/font-awesome/5.13.1/js/fontawesome.min.js"></script>
  <!-- FILES .js CUSTOMS OF THIS PAGE -->
  <script src="../js/actions_pages/history-shoping.js"></script>
  <script src="./js/actions_pages/track-order.js"></script>
</body>
</html>
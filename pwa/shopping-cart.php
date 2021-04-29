<?php
session_start();

if(!isset($_SESSION['user'])){
  header("location: index.php");
}

require_once '../php/class/client.php';
$c = new Client();
$d_by_id =  $c->select_points_default($_SESSION['user']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once 'includes/header-index.php'; ?>
  <title>Shopping Cart - App WebView</title>
</head>
<body class="body-shopping-cartpwa">
  <?php require_once 'includes/headertop-pwa.php'; ?>
  <?php require_once 'php/process_headerWebView.php'; ?>
  <main class="main-cart-container margin_30">
    <div class="content-total-points-cart_ttrq">
      <h4>
        <p>Saldo Total:&nbsp; </p>
        <span><?php echo $d_by_id[0]['puntos']; ?>
        </span>
        <p>&nbsp;Bikers</p>
      </h4>
    </div>
    <div class="container" id="cart-content-list">
      <div class="page_header cont-cart-ttrk-c">
        <h3 class="lang_ttrq" key="title-shopping-cart_ttrq">Carrito de Compras</h3>
      </div>
      <div class="cont-options-cart-ttrk">
        <h3 class="remove-cart"></h3>
        <h3 class="total-pagar"></h3>
      </div>
      <input type="hidden" id="userid_cli" value="<?php $_SESSION['user']; ?>">
      <table class="table cart-list" id="tbl_id">
        <thead>
          <tr>
            <th class="lang_ttrq" key="title-row-sc_ttrq_1">Productos</th>
            <th class="lang_ttrq" key="title-row-sc_ttrq_2">Bikers</th>
            <th class="lang_ttrq" key="title-row-sc_ttrq_3">Cantidad</th>
            <th colspan="2" class="lang_ttrq" key="title-row-sc_ttrq_4">Subtotal</th>
          </tr>
        </thead>
        <tbody id="table-list-product" class="Cls-tblistm">

        </tbody>
      </table>
    </div>
  </main>
  <?php require_once 'includes/tabsbottom-pwa.php'; ?>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="../js/common_scripts.min.js"></script>
  <script src="../js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="../js/actions_pages/language_currency.js"></script>
  <script src="js/actions-pages/buy-cart.js"></script>
  <script src="js/actions-pages/view-cart.js"></script>
  <script src="../js/actions_pages/remove.js"></script>
  <script src="../js/actions_pages/customs.js"></script>
  <script src="../js/actions_pages/search_products.js"></script>
  <script src="js/actions_pages/list-categories-by-store.js"></script>
  <script src="../js/customs/custom.js"></script>
  <script src="js/actions-pages/track-order.js"></script>
</body>
</html>
<?php
session_start();




if (!isset($_SESSION["user"])) {
  header("Location: account");
}

require_once '../php/class/client.php';
$c = new Client();
$d_by_id =  $c->select_points_default($_SESSION['user']);
?>

<?php require_once 'header_index.php'; ?>

<body>
  <div id="page">
    <?php
    require_once '../php/process_header.php';
    require_once "header_b.php";
    ?>
    <main class="main-cart-container margin_30">
      <div class="content-total-points-cart_ttrq">
        <h4>
          <p>Saldo Total:&nbsp; </p>
          <span><?php echo $d_by_id[0]['puntos']; ?>
          </span>
          <p>&nbsp;Puntos</p>
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
        <!-- /page_header -->
        <table class="table cart-list" id="tbl_id">
          <thead>
            <tr>
              <th class="lang_ttrq" key="title-row-sc_ttrq_1">Productos</th>
              <th class="lang_ttrq" key="title-row-sc_ttrq_2">Puntos</th>
              <th class="lang_ttrq" key="title-row-sc_ttrq_3">Cantidad</th>
              <th class="lang_ttrq" key="title-row-sc_ttrq_4">Subtotal</th>
              <th></th>
            </tr>
          </thead>
          <tbody id="table-list-product" class="Cls-tblistm">

          </tbody>
        </table>

      </div>

    </main>
    <!--/main-->
    <?php require_once "footer.php"; ?>
    <!-- /footer -->
  </div>
  <!-- page -->
  <div id="toTop"></div>
  <!-- Back to top button -->
  <!-- COMMON SCRIPTS -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="./js/common_scripts.min.js"></script>
  <script src="./js/main.js"></script>
  <!--------- SWEEET ALERT 2 ------------>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <!--------- CUSTOMS JAVASCRIPT--------->
  <script src="./js/actions_pages/language_currency.js"></script>
  <script src="js/actions_pages/buy_cart.js"></script>
  <script src="./js/actions_pages/view_cart.js"></script>
  <script src="./js/actions_pages/remove.js"></script>
  <script src="js/actions_pages/customs.js"></script>
  <script src="js/actions_pages/search_products.js"></script>
  <script src="js/actions_pages/listCategories_ByStore.js"></script>
</body>

</html>
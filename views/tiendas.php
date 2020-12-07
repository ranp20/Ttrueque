<?php
session_start();



require_once '../php/class/store.php';
$c = new Store();
$dat = $c->select_tienda();
require_once 'header_index.php';

//print_r($_GET);
if(!isset($_GET['tipos']) || $_GET['tipos'] == ""){
  header('Location: ./');
}

?>

<body>
  <?php require_once './api_whatsapp.php' ?>
  <div id="page">
    <?php
    require_once '../php/process_header.php';
    require_once './header_b.php';
    ?>
    <?php
    if (!isset($_GET["tipos"]) || empty($_GET["tipos"])) {
      echo '<script> location.replace("./"); </script>';
    } else {
      $var =  str_replace("-", " ", $_GET["tipos"]);
    }
    ?>
    <input type="hidden" readonly name="tipo" id="tipo" value="<?php echo  empty($var) ? "" : $var;  ?>" />
    <div class="content-ttrk-official-markets-c">
      <div class="contenido-tiendas-off-header">
        <div class="content-title-tiendas">
          <h3 id="lista_stores">Categorías <?php echo  empty($var) ? "" : $var;  ?></h3>
          <input type="hidden" id="idtienda_current" value="<?php echo $d[0]['tienda']; ?>">
        </div>
      </div>
      <div class="container-content-off-mrkts">
        <section class='list-all-products-name-categoria'>
          <button type='button' class='btn-l-name-categorias-products'><i class='fas fa-angle-left'></i></button>
          <button type='button' class='btn-r-name-categorias-products'><i class='fas fa-angle-right'></i></button>
          <ul class='items-products-name-categorias' id='list_all-products-name-category'>
          </ul>
        </section>
      </div>
    </div>
    <!--/footer-->
    <?php require_once "./footer.php" ?>
  </div>
  <!-- COMMON SCRIPTS -->
  <script src="./js/common_scripts.min.js"></script>
  <script src="./js/main.js"></script>
  <script src="./js/actions_pages/buy_cart.js"></script>
  <script src="./js/actions_pages/modal_dialog.js"></script>
  <script src="./js/actions_pages/customs.js"></script>
  <script src="./js/jquery.cookiebar.js"></script>
  <script>
    $(document).ready(function() {
      'use strict';
      $.cookieBar({
        fixed: true
      });
    });
  </script>
  <!-- CUSTOM JAVASCRIPT -->
  <script src="./js/actions_pages/search_products.js"></script>
  <script src="./js/actions_pages/history-shoping.js"></script>
  <script src="./js/actions_pages/listProds_ByNameCategory.js"></script>
  <!--------- SWEEET ALERT 2  ---------->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>
</html>
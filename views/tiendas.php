<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
require_once '../php/class/store.php';
$c = new Store();
$dat = $c->select_tienda();
if(!isset($_GET['tipos']) || empty($_GET["tipos"]) || $_GET['tipos'] == ""){
  header('Location: ./');
}else{
  $var =  str_replace("-", " ", $_GET["tipos"]);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Ttrueque | <?= (isset($_GET) && count($_GET) > 0 && $_GET != "") ? $_GET['tipos'] : "";?></title>
  <?php require_once 'includes/header_links.php';?>
  <!-- INCLUIR SWEET ALERT 2 -->
  <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
  <script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>
<body>
    <?php  require_once 'includes/inc_api-whatsapp.php' ?>
    <div id="page">
    <?php require_once '../php/process_header.php';?>
    <?php require_once './header_b.php'; ?>
    <div class="loader-ttrqstr">
      <span class="loader-ttrqstr--loader"></span>
    </div>
    <input type="hidden" readonly name="tipo" id="tipo" value="<?php echo  empty($var) ? "" : $var;  ?>" />
    <div class="content-ttrk-official-markets-c"  id="cont-all-products_namecategories-in-ttrk">
      <div class="contenido-tiendas-off-header">
        <div class="content-title-tiendas">
          <h3 id="lista_stores">Categorías <?php echo  empty($var) ? "" : $var;  ?></h3>
          <input type="hidden" id="idtienda_current" value="<?php echo $d[0]['tienda']; ?>">
        </div>
      </div>
      <div class="container-content-off-mrkts">
        <section class='list-all-products-name-categoria' id="classlist_ProdsByNameCategories">  
          <div class='contain__cont--info--btnsiconsadap'>
            <a href='#ciconfilterprods' class='contain__cont--info--btnsiconsadap--icon'>
              <img src='./img/iconos_index/svg_icon_filter.svg' alt=''>
              <span>Filtrar</span>
            </a>
          </div>
          <div class='c-sidebarLeft__filtericons' id='ciconfilterprods'>
            <div class='contain__cont--info--filter'>
              <p class='contain__cont--info--filter--titleord'>Ordernar por:</p>
              <select class='contain__cont--info--filter--selfilter' name='' id='list_filter_products'>
                <option value='1'>Más vendidos</option>
                <option value='2'>Precio de menor a mayor</option>
                <option value='3'>Precio de mayor a menor</option>
                <option value='4'>Marca</option>
              </select>
            </div>
          </div>
          <div class='contain__cont--products'>
            <div id='loader' class='contain__cont--products--loader'> 
              <img src='./img/Utilities/loader.gif'>
            </div>
            <div class='filter_result' id="filter_byNameCategory"></div>
          </div>
          <a href="allcategories" class="btn-allCategoriesLinkShow" title="Ver todas las categorías">Ver todas las categorías</a>
        </section>
      </div>
    </div>
    <?php require_once "./footer.php" ?>
  </div>
  <script type="text/javascript" src="./js/main.js"></script>
  <script type="text/javascript" src="./js/actions_pages/buy_cart.js"></script>
  <script type="text/javascript" src="./js/actions_pages/modal_dialog.js"></script>
  <script type="text/javascript" src="./js/actions_pages/customs.js"></script>
  <script type="text/javascript" src="./js/actions_pages/all_pages_index.js"></script>
  <script type="text/javascript" src="./js/actions_pages/listProds_ByNameCategory.js"></script>
  <script type="text/javascript" src="./js/actions_pages/track-order.js"></script>
</body>
</html>
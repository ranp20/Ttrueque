<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
if (!isset($_SESSION["user"])) {
  header("Location: account");
}
require_once '../php/class/store.php';
$stores = new Store();
$all_stores = $stores->select_tienda();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Ttrueque | Todas las categorías</title>
  <?php require_once 'includes/header_links.php';?>
  <!-- INCLUIR SWEET ALERT 2 -->
  <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
  <script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>
<body>
  <?php require_once 'includes/inc_api-whatsapp.php';?>
  <div id="page">
    <?php require_once '../php/class/categoria.php';?>
    <?php require_once '../php/class/client.php';?>
    <?php require_once '../php/class/all.php';?>
    <?php
    
    //LISTADO DE CATEGORÍAS DE LA CABECERA DEL HOME...

    $user = !isset($_SESSION["user"])  ? "" : $_SESSION["user"];
    //LISTAR CATEGORIA...
    $c = new Categoria();
    $categoria = $c->get_categoria();
    $cat_limit = $c->get_categoria_limit();
    //LISTAR TIENDA...
    $tienda = $c->get_data_tienda($user);
    $c = new Client();
    $d = $c->get_data_by_id($user);
    //LISTAR TODO...
    $ctr = new All();
    $flags = $ctr->get_countries();
    //LISTAR TODAS LAS CATEGORÍAS...
    $all_categs = $ctr->get_categorias();

    $all_categorias = [];
    $categoria_actual = "";

    unset($categoria_actual);

    //TÍTULO DE LA CABECERA DEL HOME...
    require_once '../php/class/header_titles.php';
    $h = new Header_Titles();
    $header = $h->get_header_titles();

    $titles_header_home = [];
    array_push($titles_header_home, $header);

    ?>
    <?php require_once 'includes/inc_header-top.php';?>
    <div class="loader-ttrqstr">
      <span class="loader-ttrqstr--loader"></span>
    </div>
    <div class="content-ttrk-official-markets-c" id="cont-all-categories_in_ttrk">
      <div class="cMIndx__c__sec__cTtitle contenido-categorias_ttrk-off-header">
        <div class="cMIndx__c__sec__cTtitle__c content-title-categorias_ttrk">
          <h3 class="cMIndx__c__sec__cTtitle__c--title lang_ttrq" key="title-cat-list-s_ttrq">Categorías</h3>
        </div>
      </div>
      <div class="container-content-off-mrkts">
      <section class="list-categories-stores-ttrk-c">
        <ul class="items-categ-stores-ttrk" id="lista_categories">
          <?php 
            foreach ($all_categs as $value) {
              $url = './admin/images/categoria/'.$value['imagen_categoria'];
              $name_category = $value['nombre_categoria'];
              $url_name = str_replace(" ", "-", $name_category);

              echo 
              '<li class="item-categ-stores-into">
                <a href="./tienda?tipos='.$url_name.'" class="item-cont-categ-stores"> 
                  <div class="cont-logo-categories-str-b-ttrk">
                    <img class="img-fluid" src="'.$url.'" alt="'.$url_name.'" width="100" height="100">
                  </div>
                  <div class="cont-info-categ-stores-b-ttrk">
                    <div>
                      <p>'.$name_category.'</p>
                    </div>
                  </div>
                </a>
              </li>';
            }
          ?>
        </ul>
      </section>
    </div>
  </div>
  <?php require_once './footer.php';?>
  </div>
  <div  id="toTopgobtn"></div>
  <script type="text/javascript" src="./js/main.js"></script>
  <script type="text/javascript" src="js/actions_pages/buy_cart.js"></script>
  <script type="text/javascript" src="./js/actions_pages/all_pages_index.js"></script>
  <script type="text/javascript" src="js/actions_pages/language_currency.js"></script>
</body>
</html>
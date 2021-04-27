<?php
session_start();

if(!isset($_SESSION['user'])){
  header("location: index.php");
}

require_once '../php/class/store.php';
$stores = new Store();
$all_stores = $stores->select_tienda();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once 'includes/header-index.php'; ?>
  <title>Categories List - App WebView</title>  
</head>
<body class="body-categories-listpwa">
  <?php require_once 'includes/headertop-pwa.php'; ?>
  <div class="mrgtop-57 container-maxwidth">
    <?php
  		
      //LISTADO DE CATEGORÍAS DE LA CABECERA DEL HOME...
      require_once '../php/class/categoria.php';
      require_once '../php/class/client.php';
      require_once '../php/class/all.php';

      $user = !isset($_SESSION["user"][0]['id_cliente'])  ? "" : $_SESSION["user"][0]['id_cliente'];
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

      $c->close_connection();

      $all_categorias = [];
      $categoria_actual = "";

      unset($categoria_actual);

      //TÍTULO DE LA CABECERA DEL HOME...
      require_once '../php/class/header_titles.php';
      $h = new Header_Titles();
      $header = $h->get_header_titles();
      $c->close_connection();

      $titles_header_home = [];
      array_push($titles_header_home, $header);

  		require_once 'php/process_headerWebView.php';
  		?>
      <input type="hidden" id="store_cli" value="<?php echo $_GET['store']; ?>">

      <?php 
        if(isset($_GET['store'])){
        echo '
            <div class="content-ttrk-official-markets-c" id="container_all_categories_in_store">
                <div class="contenido-categorias_ttrk-off-header">
                    <div class="content-title-categorias_ttrk">
                        <h3>Categorías en '.$_GET['store'].'</h3>
                    </div>
                </div>
                <div class="container-content-off-mrkts">
                <section class="list-categories-stores-ttrk-c">
                    <ul class="items-categ-stores-ttrk pwamodify-listcategories" id="list_cat_cli_store" style="display: grid;grid-template-columns: 1fr 1fr;grid-column-gap: 1rem;">
                    </ul>
                </section>
                <div class="content-btn-more-brands-ttrk">
                    <a href="allcategories" class="btn-brands-alls-ttrk">
                        <button type="button" class="btn-into-alls-ttrk lang_ttrq" key="btn-all-categories-stores_ttrq">Ver todas las Categorías</button>
                    </a>
                </div>
            </div>';
        }else{

          echo '
              <div class="content-ttrk-official-markets-c">
              <div class="contenido-categorias_ttrk-off-header">
                  <div class="content-title-categorias_ttrk">
                      <h3 class="lang_ttrq" key="title-cat-list-s_ttrq">Categorías</h3>
                  </div>
              </div>
              <div class="container-content-off-mrkts">
              <section class="list-categories-stores-ttrk-c">
                  <ul class="items-categ-stores-ttrk" id="lista_categories" style="display: grid;grid-template-columns: 1fr 1fr;grid-column-gap: 1rem;grid-row-gap: 1rem;">';
                  
                  foreach ($all_categs as $value) {
                      $url = '../admin/images/categoria/'.$value['imagen_categoria'];
                      $name_category = $value['nombre_categoria'];
                      $url_name = str_replace(" ", "-", $name_category);


                      echo 
                      '<li class="item-categ-stores-into" style="width: auto;margin: 0;">
                        <a href="./tienda?tipos='.$url_name.'" class="item-cont-categ-stores"> 
                          <div class="cont-logo-categories-str-b-ttrk">
                            <div class="logo-categ-str-c-ttrk" style="background-image: url('.$url.');"></div>
                          </div>
                          <div class="cont-info-categ-stores-b-ttrk">
                            <div>
                              <p style="font-size:.9rem !important;">'.$name_category.'</p>
                            </div>
                          </div>
                        </a>
                      </li>';
                      }

                  echo '</ul>
                  </section>
              </div>
              ';
        }?>
      </div>
    </div>
  </div>
  <?php require_once 'includes/tabsbottom-pwa.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="../js/actions_pages/buy_cart.js"></script>
  <script src="../js/actions_pages/remove.js"></script>
  <script src="../js/actions_pages/customs.js"></script>
  <script src="../js/actions_pages/search_products.js"></script>
  <script src="js/actions-pages/language-currency.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="../js/actions_pages/track-order.js"></script>
  <script src="../js/customs/custom.js"></script>
</body>
</html>
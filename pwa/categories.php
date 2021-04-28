<?php 
	
	session_start();
	if(!isset($_SESSION['user'])){
		header("location: index.php");
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once 'includes/header-index.php'; ?>
	<title>Categories - App WebView</title>
</head>
<body class="body-categoriespwa">
  <?php require_once 'php/process_headerWebView.php'; ?>
  <?php require_once 'includes/headertop-pwa.php'; ?>

	<?php 

		require_once '../php/class/categoria.php';
    require_once '../php/class/client.php';
    require_once '../php/class/all.php';

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

    $c->close_connection();

    $all_categorias = [];
    $categoria_actual = "";

    unset($categoria_actual);

    require_once '../php/class/header_titles.php';
    $h = new Header_Titles();
    $header = $h->get_header_titles();
    $c->close_connection();

    $titles_header_home = [];
    array_push($titles_header_home, $header);

    ?>
  <div class="categories-cont">
    <div class="content-ttrk-official-markets-c mrgtop-57" id="cont-all-categories_in_ttrk">
      <div class="contenido-categorias_ttrk-off-header">
        <div class="content-title-categorias_ttrk">
          <h3 class="lang_ttrq" key="title-cat-list-s_ttrq">Categorías</h3>
        </div>
      </div>
      <div class="container-content-off-mrkts">
        <section class="list-categories-stores-ttrk-c">
          <ul class="items-categ-stores-ttrk" id="lista_categories" style="grid-template-columns: 1fr 1fr;grid-column-gap: 1rem;">
         <?php 
            foreach ($all_categs as $value) {
              $url = '../admin/images/categoria/'.$value['imagen_categoria'];
              $name_category = $value['nombre_categoria'];
              $url_name = str_replace(" ", "-", $name_category);

            echo 
            '<li class="item-categ-stores-into" style="margin:0 !important;width:100%;border-radius:10px;">
              <a href="./tienda?tipos='.$url_name.'" class="item-cont-categ-stores"> 
                <div class="cont-logo-categories-str-b-ttrk">
                  <div class="logo-categ-str-c-ttrk" style="background-image: url('.$url.');"></div>
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
  </div>
  <?php require_once 'includes/tabsbottom-pwa.php'; ?>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="../js/common_scripts.min.js"></script>
  <script src="../js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="js/actions-pages/language-currency.js"></script>
  <script src="js/actions-pages/buy-cart.js"></script>
  <script src="js/actions-pages/view-cart.js"></script>
  <script src="../js/actions_pages/remove.js"></script>
  <script src="../js/actions_pages/customs.js"></script>
  <script src="../js/actions_pages/search_products.js"></script>
  <script src="js/actions-pages/list-categories-by-store.js"></script>
  <script src="../js/customs/custom.js"></script>
  <script src="js/actions-pages/track-order.js"></script>
</body>
</html>
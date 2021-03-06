<?php

session_start();

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
$url =  $actual_link . "/" ."Ttrueque/";
if (!isset($_SESSION["user"])) {
	header("Location: account");
}

require_once '../php/class/store.php';
$stores = new Store();
$all_stores = $stores->select_tienda();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Trueque | Carrito de compras</title>
  <!-- //METAS-->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Ttrueque">
  <!-------RESPONSIVE--------->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- //GOOGLE WEB FONTS -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Oxygen:wght@300;400;700&family=Quicksand:wght@300;400;500;600;700&family=Raleway:wght@100;200;300;400;500;600;700;800;900&family=Sen:wght@400;700;800&family=Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <!-- //JQUERY -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <!-- //BOOTSTRAP-->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha256-L/W5Wfqfa0sdBNIKN9cG6QA5F2qx4qICmU2VgLruv9Y="
    crossorigin="anonymous"
  />
  <!-- //FONTAWESOWE -->
  <link href="<?php echo $url ?>admin/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo $url ?>css/bootstrap.custom.min.css" rel="stylesheet">
  <!-- //YOUR CUSTOM CSS -->
  <link href="<?php echo $url ?>css/style.css" rel="stylesheet">
  <link href="<?php echo $url ?>css/cart.css" rel="stylesheet">
  <link href="<?php echo $url ?>css/account.css" rel="stylesheet">
  <link href="<?php echo $url ?>css/contact.css" rel="stylesheet">
  <link href="<?php echo $url ?>css/error_track.css" rel="stylesheet">
  <link href="<?php echo $url ?>css/faq.css" rel="stylesheet">
  <link href="<?php echo $url ?>css/blog.css" rel="stylesheet">
  <link href="<?php echo $url ?>css/checkout.css" rel="stylesheet">
  <link href="<?php echo $url ?>css/estilos.css" rel="stylesheet">
  <link href="<?php echo $url ?>css/customs/custom.css" rel="stylesheet">
  <!-----//ICON-PAGES------>
  <link rel="icon" href="<?php echo $url ?>img/icon-pages/drawable-xxxhdpi-icon.png" type="image/ico">

  <!-- //WHATSAPP API -->
  <link href="<?php echo $url ?>css/whatsapp.css" rel="stylesheet">
  <!-- //CUSTOMS JS-->
  <script src="<?php echo $url ?>js/customs.js"></script>
  <!----->
  <!-- COMMON SCRIPTS -->
  <script src="<?php echo $url ?>js/common_scripts.min.js"></script>
  <script src="<?php echo $url ?>js/actions_pages/buy_cart.js"></script>
  <script src="<?php echo $url ?>js/actions_pages/view_cart.js"></script>
  <script src="<?php echo $url ?>js/actions_pages/customs.js"></script>
  <script src="<?php echo $url ?>js/actions_pages/search_products.js"></script>
  <script src="<?php echo $url ?>js/actions_pages/language_currency.js"></script>
  <script src="<?php echo $url ?>js/actions_pages/listCategories_ByStore.js"></script>
  <script src="<?php echo $url ?>js/actions_pages/listProds_Store_Category.js"></script>
  <script src="<?php echo $url ?>js/customs/custom.js"></script>
  <script src="<?php echo $url ?>js/actions_pages/track-order.js"></script>
  
</head>

<body>
    <?php require_once './api_whatsapp.php' ?>
    <!--- API WHATSAPP---->
    <div id="page">
        <?php
		
        //LISTADO DE CATEGORÍAS DE LA CABECERA DEL HOME...
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


        //TÍTULO DE LA CABECERA DEL HOME...
        require_once '../php/class/header_titles.php';
        $h = new Header_Titles();
        $header = $h->get_header_titles();
        $c->close_connection();

        $titles_header_home = [];
        array_push($titles_header_home, $header);



		require_once './header_b.php';
		?>
        <!-- /header -->
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
                    <ul class="items-categ-stores-ttrk" id="list_cat_cli_store">
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
                    <ul class="items-categ-stores-ttrk" id="lista_categories">';
                    
                    foreach ($all_categs as $value) {
                        $url = './admin/images/categoria/'.$value['imagen_categoria'];
                        $name_category = $value['nombre_categoria'];
                        $url_name = str_replace(" ", "-", $name_category);


                        echo 
                        '<li class="item-categ-stores-into">
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

                    echo '</ul>
                    </section>
                </div>
                ';
        }?>
    </div>
    <!--/footer-->

    <?php require_once './footer.php' ?>
    </div>
    <!-- page -->
    <div id="toTop"></div>
    <!-- Back to top button -->


</body>

</html>
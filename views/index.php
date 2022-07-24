<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
require_once "../php/process_index.php";
require_once '../php/class/product.php';
require_once '../php/class/store.php';
$c = new Store();
$dat = $c->select_tienda();
$banners = $data["banners"];
$popular = $data["populars"];
$banner_pub = $data["banner_publicidad"];
$path = "admin/images/banner/";
$path_bp = "admin/images/banner_publicidad/";
$path_cli = "shop/folder/";
$path_store = "shop/images/store/";
$path_flag = "admin/images/banderas/";
//PRODUCTOS DEL ADMIN...
if(!isset($_SESSION['user'])){
	header("Location:home");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Ttrueque | Vender y comprar sin dinero convencional</title>
  <?php require_once 'includes/header_links.php';?>
  <!-- INCLUIR SWEET ALERT 2 -->
  <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
  <script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
  <!-- INCLUIR OWL CAROUSEL 2 -->
  <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css"/>
  <script type="text/javascript" src="node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
</head>
<body>
  <div class="contModalGuidettrk"></div>
  <?php  require_once 'includes/inc_api-whatsapp.php';?>
  <?php require_once '../php/process_header.php';?>
  <div class="loader-ttrqstr">
    <span class="loader-ttrqstr--loader"></span>
  </div>
  <?php require_once 'includes/inc_header-top-index.php';?>
  <div class="overlay"></div>
  <div class="containt_total_ttrq-cart">
    <div class="container_cart_lis-ttrq">
      <div class="content-list_cart_hb_ttrq">
        <div class="contain-title-cart-sdleft_ttrq">
          <h4 class='lang_ttrq' key='title-cart-delay_ttrq'>Listado de Compras<i class="fas fa-cart-arrow-down"></i></h4>
          <a href="javascript:void(0);" id="cerrar_carrito"> X </a>
        </div>
        <div class="contain-cart-info_header-ttrq">
          <div id="list-products-sdleft" class="lista-prods-sdleft_header_ttrq">
            <ul id="cart-buy-list"></ul>
          </div>
          <div id="total-points" class="cont-btn-check_ttrq"></div>
        </div>
        <div class="contain-btn-go-to-cart_ttrq">
          <a href="./cart" id="addtempcart">
            <img src="./img/iconos_home/index-sidebar-car-car.svg" alt="">
            <span class='lang_ttrq' key='btn-go-cart-delay_ttrq'>Ir al Carrito</span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <?php
	  $p = new Product();
	  $top_sells = $p->top_sell($d[0]['pais']);
  ?>
  <div id="datos_search"></div>
  <main class="mrg-htop" id="contenedor-principal-home_2">
    <div id="carousel-home" style="height: 338px">
      <div class="owl-carousel owl-theme cont-links-products-banners">
        <div class="owl-slide cover" style="height: 338px;background-image: url(<?php echo $path . $banners[0]["link_banner"];?>);">
          <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.4)">
            <div class="container contain-total-slider-banners">
              <div class="row justify-content-center justify-content-md-start">
                <div class="col-lg-6 static">
                  <div class="slide-text white content-info-banner-top">
                    <h2><?php echo $banners[0]["titulo_banner"];?></h2>
                    <p><?php echo $banners[0]["descripcion_banner"];?></p>
                    <div>
                      <a class="butt_home lang_ttrq" key="btn-banners-h_ttrq" href="#content-index-ttrq" role="button">Comprar ahora</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="owl-slide cover" style="height: 338px;background-image: url(<?php echo $path . $banners[1]["link_banner"];?>);">
          <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.4)">
            <div class="container contain-total-slider-banners">
              <div class="row justify-content-center justify-content-md-end">
                <div class="col-lg-6 static">
                  <div class="slide-text text-right white content-info-banner-top">
                    <h2><?php echo $banners[1]["titulo_banner"];?></h2>
                    <p><?php echo $banners[1]["descripcion_banner"];?></p>
                    <div>
                      <a class="butt_home lang_ttrq" key="btn-banners-h_ttrq" href="#content-index-ttrq" role="button">Comprar ahora</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="owl-slide cover" style="height: 338px;background-image: url(<?php echo $path . $banners[2]["link_banner"];?>);">
          <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.4)">
            <div class="container contain-total-slider-banners">
              <div class="row justify-content-center justify-content-md-start">
                <div class="col-lg-12 static">
                  <div class="slide-text text-center white content-info-banner-top">
                    <h2><?php echo $banners[2]["titulo_banner"];?></h2>
                    <p><?php echo $banners[2]["descripcion_banner"];?></p>
                    <div>
                      <a class="butt_home lang_ttrq" key="btn-banners-h_ttrq" href="#content-index-ttrq" role="button">Comprar ahora</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="owl-slide cover" style="height: 338px;background-image: url(<?php echo $path . $banners[3]["link_banner"];?>);">
          <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.4)">
            <div class="container contain-total-slider-banners">
              <div class="row justify-content-center justify-content-md-start">
                <div class="col-lg-12 static">
                  <div class="slide-text text-center white content-info-banner-top">
                    <h2><?php echo $banners[3]["titulo_banner"];?></h2>
                    <p><?php echo $banners[3]["descripcion_banner"];?></p>
                    <div>
                      <a class="butt_home lang_ttrq" key="btn-banners-h_ttrq" href="#content-index-ttrq" role="button">Comprar ahora</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="owl-slide cover" style="height: 338px;background-image: url(<?php echo $path . $banners[4]["link_banner"];?>);">
          <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.4)">
            <div class="container contain-total-slider-banners">
              <div class="row justify-content-center justify-content-md-start">
                <div class="col-lg-6 static">
                  <div class="slide-text white content-info-banner-top">
                    <h2><?php echo $banners[4]["titulo_banner"];?></h2>
                    <p><?php echo $banners[4]["descripcion_banner"];?></p>
                    <div>
                      <a class="butt_home lang_ttrq" key="btn-banners-h_ttrq" href="#content-index-ttrq" role="button">Comprar ahora</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="owl-slide cover" style="height: 338px;background-image: url(<?php echo $path . $banners[5]["link_banner"];?>);">
          <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.4)">
            <div class="container contain-total-slider-banners">
              <div class="row justify-content-center justify-content-md-start">
                <div class="col-lg-12 static">
                  <div class="slide-text text-center white content-info-banner-top">
                    <h2><?php echo $banners[5]["titulo_banner"];?></h2>
                    <p><?php echo $banners[5]["descripcion_banner"];?></p>
                    <div>
                      <a class="butt_home lang_ttrq" key="btn-banners-h_ttrq" href="#content-index-ttrq" role="button">Comprar ahora</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="icon_drag_mobile"></div>
    </div>
    <?php require_once './best_seller.php';?>
    <?php require_once './banner_publicity.php';?>
    <?php require_once './official_markets.php';?>
  </main>
  <?php require_once './footer.php';?>
  <div  id="toTopgobtn"></div>
  <script type="text/javascript" src="js/main.js"></script>
  <script type="text/javascript" src="js/actions_pages/all_pages_index.js"></script>
  <script type="text/javascript" src="js/actions_pages/index.js"></script>
  <script type="text/javascript" src="js/actions_pages/buy_cart.js"></script>
  <script type="text/javascript" src="js/actions_pages/remove.js"></script>
  <script type="text/javascript" src="js/actions_pages/customs.js"></script>
  <script type="text/javascript" src="js/actions_pages/language_currency.js"></script>
</body>
</html>
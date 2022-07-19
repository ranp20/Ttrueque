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
if (!isset($_SESSION['user'])) {
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
</head>
<body>
  <div class="contModalGuidettrk"></div>
  <?php require_once './api_whatsapp.php';?>
  <div id="page">
    <?php require_once '../php/process_header.php';?>
    <div class="loader-ttrqstr">
      <span class="loader-ttrqstr--loader"></span>
    </div>
    <!-- HEADER -->
    <nav class="navbar navbar-expand-lg navbar-dark justify-content-sm-start fixed-top nav-index-ttrq" id="contain-index-nav-ttrk">
      <div class="container">
        <a href="./home" class="icon-homevisiblenoun" id="icon-homevisiblenoun">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 125" x="0px" y="0px"><path d="M77.81641,44.37891l-24.54-19.1084A5.32516,5.32516,0,0,0,46.72461,25.27l-24.541,19.10937a5.297,5.297,0,0,0-2.05566,4.207V83.19922a5.338,5.338,0,0,0,5.332,5.332H37.87988a5.338,5.338,0,0,0,5.332-5.332V66.48438a1.33369,1.33369,0,0,1,1.332-1.332h10.9121a1.33369,1.33369,0,0,1,1.332,1.332V83.19922a5.338,5.338,0,0,0,5.332,5.332H74.54a5.338,5.338,0,0,0,5.332-5.332V48.58643A5.29866,5.29866,0,0,0,77.81641,44.37891ZM75.87207,83.19922a1.33368,1.33368,0,0,1-1.332,1.332H62.12012a1.33368,1.33368,0,0,1-1.332-1.332V66.48438a5.338,5.338,0,0,0-5.332-5.332H44.544a5.338,5.338,0,0,0-5.332,5.332V83.19922a1.33368,1.33368,0,0,1-1.332,1.332H25.46a1.33368,1.33368,0,0,1-1.332-1.332V48.58643a1.32594,1.32594,0,0,1,.51269-1.05127l24.542-19.10938a1.32843,1.32843,0,0,1,1.63574.00049l24.541,19.1084a1.3276,1.3276,0,0,1,.51269,1.05176Z"/><path d="M85.71777,39.44189l-32.335-24.99707a5.534,5.534,0,0,0-6.76562,0l-32.335,24.99707a2.00041,2.00041,0,0,0,2.44726,3.165l32.335-24.99707a1.52735,1.52735,0,0,1,1.8711,0l32.335,24.99707a2.00041,2.00041,0,0,0,2.44726-3.165Z"/><path d="M69.4043,16.88379h2.707v6.466l4,3.09217V16.71729a3.83778,3.83778,0,0,0-3.833-3.8335h-3.041a3.83777,3.83777,0,0,0-3.833,3.8335V18.165l4,3.09216Z"/></svg>
          </a>
          <a class="navbar-brand order-1 order-lg-0 ml-lg-0 ml-2 mr-auto cont-logo-ttrq-nav" href="./">
            <img src="././img/logo/logotipo-T-white.svg" alt="Logo_Ttrueque" class="img-fluid">
          </a>
          <button class="navbar-toggler align-self-start menu-nav-burger-index" type="button">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse p-3 p-lg-0 mt-5 mt-lg-0 d-flex flex-column flex-lg-row flex-xl-row justify-content-lg-between mobileMenu nav-index-ttrq-collapse" id="navbarSupportedContent">
            <form class="form-inline my-2 my-lg-0 align-self-stretch search-input-customs-header">
                <div class="c-contentSearchTtrq">
                  <input type="text" class="search-input_home form-control mr-sm-2" placeholder="Buscar en Ttrueque" id="caja_busqueda_primary" name="" autocomplete="off">
                  <div class="c-contentSearchTtrq--cont"></div>
                </div>
            </form>
            <ul class="navbar-nav align-self-stretch">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle con-t-profile-opts-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="lang_ttrq" key="name_user">¡Hola,</span><span>&nbsp;<?php echo ucfirst($d[0][3]);?>!</span>
                  <input type="hidden" name="paisclient" id="paisclient" value="<?php echo $_SESSION['idcountries'] = $d[0]['pais'];?>">
                  <input type="hidden" id="userid_cli" value="<?php echo $_SESSION['user'];?>">
                </a>
                <?php
                  $links = [];
                  if(isset($_SESSION["user"])){
                    $links[0] = "./cart";
                    $links[1] = "./cart";
                  }else{
                    $links[0] = "./account";
                    $links[1] = "./account";
                  }
                ?>
                <div class="dropdown-menu cont-list-opts-profile" aria-labelledby="navbarDropdown">
                <?php
                  if(!isset($_SESSION["user"])) {
                    echo "<a href='./account' class='btn_1' title=''>Inicia sesi&oacute;n o reg&iacute;strate</a>";
                  }else{
                    if (!isset($tienda[1][0]["id_menbresia"])){
                      echo "<a class='dropdown-item' href='home' title='Home'><i class='ti-home'></i><span>Ir a inicio</span></a>
                        <a class='dropdown-item' href='cliente/menbresia' title='Mi perfil'><i class='ti-user'></i><span class='lang_ttrq' key='list_user-opt-h-1'>Administrar mi cuenta</span></a>
                        <a class='dropdown-item' href='./track-order' title='Ratrea tu pedido'><i class='ti-truck'></i><span class='lang_ttrq' key='list_user-opt-h-2'>Rastrea tu pedido</span></a>
                        <a class='dropdown-item' href='home' title='Ayuda'><i class='ti-help-alt'></i><span class='lang_ttrq' key='list_user-opt-h-3'>Ayuda y preguntas frecuentes</span></a>
                        <a class='dropdown-item' href='././php/process_account_logout.php' title='Salir'><i class='ti-power-off'></i><span  class='lang_ttrq' key='list_user-opt-h-4'>Cerrar sesi&oacute;n</span></a>
                      ";
                    }else{
                      echo "<a class='dropdown-item' href='home' title='Home'><i class='ti-home'></i><span>Ir a inicio</span></a>
                        <a class='dropdown-item' href='shop' title='Mi perfil'><i class='ti-user'></i><span class='lang_ttrq' key='list_user-opt-h-1'>Administrar mi cuenta</span></a>
                        <a class='dropdown-item' href='./track-order
                        ' title='Ratrea tu pedido'><i class='ti-truck'></i><span class='lang_ttrq' key='list_user-opt-h-2'>Rastrea tu pedido</span><span id='count-trackorder'>0</span></a>
                        <a class='dropdown-item' href='home' title='Ayuda'><i class='ti-help-alt'></i><span class='lang_ttrq' key='list_user-opt-h-3'>Ayuda y preguntas frecuentes</span></a>
                        <a class='dropdown-item' href='././php/process_account_logout.php' title='Salir'><i class='ti-power-off'></i><span  class='lang_ttrq' key='list_user-opt-h-4'>Cerrar sesi&oacute;n</span></a>
                      ";
                    }
                  }
                ?>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle con-t-categories-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span>Categorías</span>
                </a>
                <div class="dropdown-menu content-list-categories-naside" aria-labelledby="navbarDropdown">
                  <?php
                    foreach ($categoria as $key => $val) {
                      $e = $val["nombre_categoria"];
                      $url = str_replace(" ", "-", $e);
                      echo "<a class='dropdown-item' href='tienda?tipos={$url}'>
                            <span>{$val["nombre_categoria"]}</span>
                            </a>";
                    }
                  ?>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle con-t-countries-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span>Idiomas</span>
                </a>
                <div class="dropdown-menu content-all-countries-naside" aria-labelledby="navbarDropdown">
                  <?php
                    foreach ($flags as $key => $value) {
                      echo "<button   
                        data-pref='{$value['prefijo_moneda']}' 
                        data-simbol='{$value['simbolo_moneda']}' 
                        data-moneda='{$value['moneda']}' 
                        class='dropdown-item translate_lang' id='{$value['prefijo']}'>
                        <img src='./admin/images/banderas/{$value['bandera']}'>
                      </button>";
                    }
                  ?>
                </div>
              </li>
            </ul>
          </div>
          <div class="cont-cartandcontact_Icons">
            <a href="javascript:void(0);" class="cart_icon_header_b-ttrq order-1" id="view_cart_ttrq">
              <span id="count-product-cart"></span>
            </a>
            <a href="contacto" class="icon-callvisiblenoun" id="icon-callvisiblenoun">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 64 80" enable-background="new 0 0 64 64" xml:space="preserve"><g><g><path d="M3.267,22.431c0.144-0.502,0.287-1.004,0.433-1.505c0.532-1.823,1.481-3.396,2.772-4.787    c0.863-0.93,1.879-1.664,2.942-2.306c1.546-0.934,3.541-0.604,4.693,0.895c1.261,1.642,2.491,3.309,3.733,4.966    c0.716,0.955,1.424,1.917,2.144,2.869c1.283,1.697,1.077,3.815-0.573,5.184c-1.039,0.862-2.144,1.643-3.227,2.45    c-0.302,0.225-0.629,0.415-0.945,0.621c1.169,3.212,2.482,6.241,4.37,8.99c2.915,4.244,5.909,6.682,9.152,9.05    c0.888-0.675,1.787-1.363,2.69-2.046c0.457-0.345,0.909-0.697,1.38-1.023c1.394-0.963,3.011-0.997,4.359,0.011    c0.523,0.391,0.923,0.963,1.325,1.494c1.779,2.351,3.53,4.723,5.309,7.074c0.506,0.669,0.704,1.43,0.82,2.231    c-0.048,0.338-0.097,0.676-0.145,1.014c-0.241,0.432-0.413,0.927-0.737,1.285c-1.02,1.129-2.256,2.006-3.621,2.663    c-2.512,1.208-5.128,1.524-7.86,0.818c-2.922-0.756-5.602-2.034-8.131-3.648c-1.986-1.267-3.821-2.737-5.543-4.341    c-2.16-2.013-4.138-4.199-5.924-6.55C10.951,45.56,9.3,43.224,7.819,40.77c-1.686-2.794-3.154-5.684-4.055-8.837    c-0.522-1.825-0.836-3.679-0.831-5.582c0.002-0.534,0.001-1.069,0.002-1.603C3.046,23.976,3.157,23.203,3.267,22.431z"/></g><g><g><circle cx="36.812" cy="16.5" r="2.888"/><circle cx="44.643" cy="16.5" r="2.888"/><circle cx="52.475" cy="16.5" r="2.888"/></g><path d="M44.643,1.25c-9.056,0-16.424,6.958-16.424,15.51c0,3.934,1.562,7.68,4.402,10.566l-0.651,1.302    c-0.687,1.372-0.482,3.007,0.523,4.166l0.048,0.055c0.716,0.794,1.74,1.249,2.808,1.249c0.456,0,0.903-0.081,1.328-0.241    l4.937-1.852c0.993,0.175,2.012,0.264,3.029,0.264c9.056,0,16.424-6.958,16.424-15.51C61.067,8.208,53.699,1.25,44.643,1.25z     M34.062,29.674l1.443-2.887l-0.24-0.201c-2.991-2.506-4.706-6.087-4.706-9.827c0-7.262,6.318-13.171,14.085-13.171    c7.766,0,14.085,5.908,14.085,13.171c0,7.262-6.318,13.171-14.085,13.171c-1.051,0-2.099-0.109-3.115-0.324l-0.113-0.024    l-5.559,2.085c-0.163,0.061-0.333,0.092-0.506,0.092c-0.407,0-0.797-0.174-1.071-0.476C33.88,30.839,33.795,30.207,34.062,29.674z"/></g></g></svg>
            </a>
          </div>
      </div>
    </nav>
    <div class="overlay"></div>
    <div class="containt_total_ttrq-cart">
      <div class="container_cart_lis-ttrq">
        <div class="content-list_cart_hb_ttrq">
          <div class="contain-title-cart-sdleft_ttrq">
            <h4 class='lang_ttrq' key='title-cart-delay_ttrq'>Listado de Compras<i class="fas fa-cart-arrow-down"></i></h4>
            <a href="#" id="cerrar_carrito"> X </a>
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
    <!-- MAIN -->
    <main id="contenedor-principal-home_2">
      <div id="carousel-home" style="height: 338px">
        <div class="owl-carousel owl-theme cont-links-products-banners">
            <!--/owl-slide-->
            <div class="owl-slide cover"
                style="height: 338px;background-image: url(<?php echo $path . $banners[0]["link_banner"];?>);">
                <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.4)">
                    <div class="container contain-total-slider-banners">
                        <div class="row justify-content-center justify-content-md-start">
                            <div class="col-lg-6 static">
                                <div class="slide-text white content-info-banner-top">
                                    <h2 class="owl-slide-animated owl-slide-title">
                                        <?php echo $banners[0]["titulo_banner"];?></h2>
                                    <p class="owl-slide-animated owl-slide-subtitle">
                                        <?php echo $banners[0]["descripcion_banner"];?></p>
                                    <div class="owl-slide-animated owl-slide-cta">
                                        <a class="butt_home lang_ttrq" key="btn-banners-h_ttrq"
                                            href="#content-index-ttrq" role="button">Comprar ahora</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/owl-slide-->
            <div class="owl-slide cover"
                style="height: 338px;background-image: url(<?php echo $path . $banners[1]["link_banner"];?>);">
                <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.4)">
                    <div class="container contain-total-slider-banners">
                        <div class="row justify-content-center justify-content-md-end">
                            <div class="col-lg-6 static">
                                <div class="slide-text text-right white content-info-banner-top">
                                    <h2 class="owl-slide-animated owl-slide-title">
                                        <?php echo $banners[1]["titulo_banner"];?></h2>
                                    <p class="owl-slide-animated owl-slide-subtitle">
                                        <?php echo $banners[1]["descripcion_banner"];?></p>
                                    <div class="owl-slide-animated owl-slide-cta">
                                        <a class="butt_home lang_ttrq" key="btn-banners-h_ttrq"
                                            href="#content-index-ttrq" role="button">Comprar ahora</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/owl-slide-->
            <div class="owl-slide cover"
                style="height: 338px;background-image: url(<?php echo $path . $banners[2]["link_banner"];?>);">
                <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.4)">
                    <div class="container contain-total-slider-banners">
                        <div class="row justify-content-center justify-content-md-start">
                            <div class="col-lg-12 static">
                                <div class="slide-text text-center white content-info-banner-top">
                                    <h2 class="owl-slide-animated owl-slide-title">
                                        <?php echo $banners[2]["titulo_banner"];?></h2>
                                    <p class="owl-slide-animated owl-slide-subtitle">
                                        <?php echo $banners[2]["descripcion_banner"];?></p>
                                    <div class="owl-slide-animated owl-slide-cta">
                                        <a class="butt_home lang_ttrq" key="btn-banners-h_ttrq"
                                            href="#content-index-ttrq" role="button">Comprar ahora</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/owl-slide-->
            <div class="owl-slide cover"
                style="height: 338px;background-image: url(<?php echo $path . $banners[3]["link_banner"];?>);">
                <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.4)">
                    <div class="container contain-total-slider-banners">
                        <div class="row justify-content-center justify-content-md-start">
                            <div class="col-lg-12 static">
                                <div class="slide-text text-center white content-info-banner-top">
                                    <h2 class="owl-slide-animated owl-slide-title">
                                        <?php echo $banners[3]["titulo_banner"];?></h2>
                                    <p class="owl-slide-animated owl-slide-subtitle">
                                        <?php echo $banners[3]["descripcion_banner"];?></p>
                                    <div class="owl-slide-animated owl-slide-cta">
                                        <a class="butt_home lang_ttrq" key="btn-banners-h_ttrq"
                                            href="#content-index-ttrq" role="button">Comprar ahora</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/owl-slide-->
            <div class="owl-slide cover"
                style="height: 338px;background-image: url(<?php echo $path . $banners[4]["link_banner"];?>);">
                <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.4)">
                    <div class="container contain-total-slider-banners">
                        <div class="row justify-content-center justify-content-md-start">
                            <div class="col-lg-6 static">
                                <div class="slide-text white content-info-banner-top">
                                    <h2 class="owl-slide-animated owl-slide-title">
                                        <?php echo $banners[4]["titulo_banner"];?></h2>
                                    <p class="owl-slide-animated owl-slide-subtitle">
                                        <?php echo $banners[4]["descripcion_banner"];?></p>
                                    <div class="owl-slide-animated owl-slide-cta">
                                        <a class="butt_home lang_ttrq" key="btn-banners-h_ttrq"
                                            href="#content-index-ttrq" role="button">Comprar ahora</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/owl-slide-->
            <div class="owl-slide cover"
                style="height: 338px;background-image: url(<?php echo $path . $banners[5]["link_banner"];?>);">
                <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.4)">
                    <div class="container contain-total-slider-banners">
                        <div class="row justify-content-center justify-content-md-start">
                            <div class="col-lg-12 static">
                                <div class="slide-text text-center white content-info-banner-top">
                                    <h2 class="owl-slide-animated owl-slide-title">
                                        <?php echo $banners[5]["titulo_banner"];?></h2>
                                    <p class="owl-slide-animated owl-slide-subtitle">
                                        <?php echo $banners[5]["descripcion_banner"];?></p>
                                    <div class="owl-slide-animated owl-slide-cta">
                                        <a class="butt_home lang_ttrq" key="btn-banners-h_ttrq"
                                            href="#content-index-ttrq" role="button">Comprar ahora</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/owl-slide-->
        </div>
        <div id="icon_drag_mobile"></div>
      </div>
      <?php require_once './best_seller.php';?>
      <?php require_once './banner_publicity.php';?>
      <?php require_once './official_markets.php';?>
    </main>
    <?php require_once './footer.php';?>
    </div>
  <div id="toTop"></div>
  <script type="text/javascript" src="js/common_scripts.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
  <script type="text/javascript" src="js/actions_pages/index.js"></script>
  <script type="text/javascript" src="js/actions_pages/all_pages_index.js"></script>
  <script type="text/javascript" src="js/carousel-home.min.js"></script>
  <!---------CUSTOMS JAVASCRIPT--------->
  <script type="text/javascript" src="js/actions_pages/buy_cart.js"></script>
  <script type="text/javascript" src="js/actions_pages/remove.js"></script>
  <script type="text/javascript" src="js/actions_pages/customs.js"></script>
  <script type="text/javascript" src="js/actions_pages/language_currency.js"></script>
</body>
</html>
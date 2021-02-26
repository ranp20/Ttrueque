  <!----------------------------->
  <?php 

/*if (!isset($_SESSION["user"])) {
	header("Location: login");
}*/

?>
  <nav class="navbar navbar-expand-lg navbar-dark justify-content-sm-start fixed-top nav-index-ttrq">
      <div class="container">
          <a class="navbar-brand order-1 order-lg-0 ml-lg-0 ml-2 mr-auto cont-logo-ttrq-nav" href="./">
              <img src="././img/logo/Logo_TTRQ_dark.png" alt="Logo_Ttrueque" class="img-fluid">
          </a>
          <button class="navbar-toggler align-self-start" type="button">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse p-3 p-lg-0 mt-5 mt-lg-0 d-flex flex-column flex-lg-row flex-xl-row justify-content-lg-between mobileMenu nav-index-ttrq-collapse"
              id="navbarSupportedContent">
              <form class="form-inline my-2 my-lg-0 align-self-stretch search-input-customs-header">
                  <input type="text" class="search-input_home form-control mr-sm-2" placeholder="Buscar en Ttrueque"
                      id="caja_busqueda_primary" name="product" autocomplete="off">
                  <div class="container-search"></div>
              </form>
              <ul class="navbar-nav align-self-stretch">
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle con-t-profile-opts-link" href="#" id="navbarDropdown"
                          role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="lang_ttrq"
                              key="name_user">¡Hola,</span><span>&nbsp;<?php echo ucfirst($d[0][3]);?>!</span>
                          <input type="hidden" name="paisclient" id="paisclient"
                              value="<?php echo $_SESSION['idcountries'] = $d[0]['pais']; ?>">
                          <input type="hidden" id="userid_cli" value="<?php echo $_SESSION['user']; ?>">
                      </a>
                      <?php
                $links = [];
                if (isset($_SESSION["user"])) {
                  $links[0] = "./cart";
                  $links[1] = "./cart";
                } else {
                  $links[0] = "./account";
                  $links[1] = "./account";
                }
              ?>
                      <div class="dropdown-menu cont-list-opts-profile" aria-labelledby="navbarDropdown">
                          <?php
                  if (!isset($_SESSION["user"])) {
                    echo "<a href='./account' class='btn_1' title=''>Inicia sesi&oacute;n o reg&iacute;strate</a>";
                   
                  } else {
                    if (!isset($tienda[1][0]["id_menbresia"])) {
                      echo "<a class='dropdown-item' href='home' title='Home'><i class='ti-home'></i><span>Ir a inicio</span></a>
                            <a class='dropdown-item' href='cliente/menbresia' title='Mi perfil'><i class='ti-user'></i><span class='lang_ttrq' key='list_user-opt-h-1'>Administrar mi cuenta</span></a>
                            <a class='dropdown-item' href='./track-order' title='Ratrea tu pedido'><i class='ti-truck'></i><span class='lang_ttrq' key='list_user-opt-h-2'>Rastrea tu pedido</span></a>
                            <a class='dropdown-item' href='home' title='Ayuda'><i class='ti-help-alt'></i><span class='lang_ttrq' key='list_user-opt-h-3'>Ayuda y preguntas frecuentes</span></a>
                            <a class='dropdown-item' href='././php/process_account_logout.php' title='Salir'><i class='ti-power-off'></i><span  class='lang_ttrq' key='list_user-opt-h-4'>Cerrar sesi&oacute;n</span></a>
                          ";
                    } else {
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
                      <a class="nav-link dropdown-toggle con-t-categories-link" href="#" id="navbarDropdown"
                          role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span>Categorías</span>
                      </a>
                      <div class="dropdown-menu content-list-categories-naside" aria-labelledby="navbarDropdown">
                          <?php
                  foreach ($cat_limit as $key => $val) {
                    $e =    $val["nombre_categoria"];
                    $url =    str_replace(" ", "-", $e);

                    echo "
                      <a class='dropdown-item' href='tienda?tipos={$url}'>
                          <span>{$val["nombre_categoria"]}</span>
                          
                      </a>";
                  }
                  ?>
                      </div>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle con-t-countries-link" href="#" id="navbarDropdown"
                          role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                            </button>
                        ";
                    }
                  ?>
                      </div>
                  </li>
              </ul>
          </div>
          <a href="#" class="cart_icon_header_b-ttrq order-1" id="view_cart_ttrq">
              <span id="count-product-cart"></span>
          </a>
      </div>
  </nav>
  <div class="overlay"></div>


  <div class="containt_total_ttrq-cart">
      <div class="container_cart_lis-ttrq">
          <div class="content-list_cart_hb_ttrq">
              <div class="contain-title-cart-sdleft_ttrq">
                  <h4 class='lang_ttrq' key='title-cart-delay_ttrq'>Listado de Compras<i
                          class="fas fa-cart-arrow-down"></i></h4>
                  <a href="#" id="cerrar_carrito"> X </a>
              </div>
              <!-- //CONTENEDOR PRINCIPAL DE LAS TIENDAS-->
              <div class="contain-cart-info_header-ttrq">
                  <div class="contain-link-stor-sdleft_header_ttrq"></div>
                  <div id="list-products-sdleft" class="lista-prods-sdleft_header_ttrq">
                      <ul id="cart-buy-list"></ul>
                  </div>
                  <!-- //TOTAL DE PUNTOS-->
                  <div id="total-points" class="cont-btn-check_ttrq">
                      <!-- //CONTENEDOR DE PUNTOS TOTALES-->

                  </div>
              </div>
              <div class="contain-btn-go-to-cart_ttrq">

                  <a href="./cart" id="addtempcart" class='lang_ttrq' key='btn-go-cart-delay_ttrq'>Ir al Carrito</a>
              </div>
              <!-- //FINAL DEL CONTENEDOR PRINCIPAL-->
          </div>
      </div>
  </div>
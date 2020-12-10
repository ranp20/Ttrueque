  <!----------------------------->

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
            <input type="text" class="search-input_home form-control mr-sm-2" placeholder="Buscar en Ttrueque" id="caja_busqueda_primary" name="product" autocomplete="off">
            <div class="container-search"></div>
          </form>
          <ul class="navbar-nav align-self-stretch">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle con-t-profile-opts-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="lang_ttrq" key="name_user">¡Hola,</span><span>&nbsp;<?php echo ucfirst($d[0][3]); ?>!</span>
                <input type="hidden" name="paisclient" id="paisclient" value="<?php echo $_SESSION['idcountries'] = $d[0]['pais']; ?>">
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
                            <a class='dropdown-item' href='./help' title='Ayuda'><i class='ti-help-alt'></i><span class='lang_ttrq' key='list_user-opt-h-3'>Ayuda y preguntas frecuentes</span></a>
                            <a class='dropdown-item' href='././php/process_account_logout.php' title='Salir'><i class='ti-power-off'></i><span  class='lang_ttrq' key='list_user-opt-h-4'>Cerrar sesi&oacute;n</span></a>
                          ";
                    } else {
                      echo "<a class='dropdown-item' href='home' title='Home'><i class='ti-home'></i><span>Ir a inicio</span></a>
                            <a class='dropdown-item' href='shop' title='Mi perfil'><i class='ti-user'></i><span class='lang_ttrq' key='list_user-opt-h-1'>Administrar mi cuenta</span></a>
                            <a class='dropdown-item' href='./track-order
                            ' title='Ratrea tu pedido'><i class='ti-truck'></i><span class='lang_ttrq' key='list_user-opt-h-2'>Rastrea tu pedido</span></a>
                            <a class='dropdown-item' href='./help' title='Ayuda'><i class='ti-help-alt'></i><span class='lang_ttrq' key='list_user-opt-h-3'>Ayuda y preguntas frecuentes</span></a>
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
  <!------------------------------------------>
<!--<header class="version_1">

  <div class="layer"></div>

  <div class="main_nav inner Sticky header_b_second-div">
    <div class="container header-cont-opts-primary">
      <div class="row" id="principal-home1">
        <div class="list-all-categories-into-ttrq">
          <ul>
            <li>
              <span class="title-btn-categorias">
                <a href="categorias" class="categories-title">
                  <span class="hamburger hamburger--spin">
                    <span class="hamburger-box">
                      <span class="hamburger-inner"></span>
                    </span>
                  </span>
                </a>
              </span>
              <div id="menu">
                <ul class="content-lista-categorias">
                  <?php/*
                  foreach ($cat_limit as $key => $val) {
                    $e =    $val["nombre_categoria"];
                    $url =    str_replace(" ", "-", $e);

                    $list = "<li class='list-item-dropwdown'>
                                <span>
                                    <a class='lista_categorias' href='tienda?tipos={$url}'>
                                        <span>{$val["nombre_categoria"]}</span>
                                        
                                    </a>
                                </span>";
                    $list .= "</li>";

                    echo $list;
                  }
                  ?>
                </ul>
              </div>
            </li>
          </ul>
        </div>
        <div class="d-lg-flex align-items-center">
          <a class="link-logo_official_ttrueque" href="./">
            <span class="ttrq_provider_logo"> T </span>
            <img src="././img/logo/Logo_TTRQ_dark.png" alt="Logo_Ttrueque">
          </a>
        </div>
        <div class="custom-search-input_buscador">
          <div>
            <label>
              <span class="lang_ttrq" key="search-input_home_ttrq">Buscar en Ttrueque</span>
              <input type="text" class="search-input_home" id="caja_busqueda_primary" name="product" autocomplete="off">
              <div class="container-search">
              </div>
            </label>
            <button type="submit" title="Buscar en Trueque">
              <i class="header-icon_search_custom"></i>
            </button>
          </div>
        </div>
        <div class="cont-options-header-index">
          <?php/*
          $links = [];
          if (isset($_SESSION["user"])) {
            $links[0] = "./cart";
            $links[1] = "./cart";
          } else {
            $links[0] = "./account";
            $links[1] = "./account";
          }*/
          ?>
          <ul class="top_tools icons_header_b_right">

            <li>
              <div class="dropdown dropdown-access">
                <a href="javascript:void(0)" class="access_link my-account-user-index" title="Mi cuenta">
                  <p class="lang_ttrq" key="name_user">¡Hola,</p><span> <?php /*echo ucfirst($d[0][3]); ?>!</span>
                  <input type="hidden" name="paisclient" id="paisclient" value="<?php echo $_SESSION['idcountries'] = $d[0]['pais']; ?>">
                  <input type="hidden" id="userid_cli" value="<?php echo $_SESSION['user']; ?>">
                </a>
                <div class="dropdown-menu menu_user_header_b">
                  <?php
                  if (!isset($_SESSION["user"])) {
                    echo "<a href='./account' class='btn_1' title=''>Inicia sesi&oacute;n o reg�strate</a>";
                  } else {
                    if (!isset($tienda[1][0]["id_menbresia"])) {
                      echo "<ul>
                            <li>
                                <a href='home' title='Home'><i class='ti-home'></i><span>Ir a inicio</span></a>
                            </li>
                            <li>
                                <a href='cliente/menbresia' title='Mi perfil'><i class='ti-user'></i><span class='lang_ttrq' key='list_user-opt-h-1'>Administrar mi cuenta</span></a>
                            </li>
                            <li>
                                <a href='./track-order' title='Ratrea tu pedido'><i class='ti-truck'></i><span class='lang_ttrq' key='list_user-opt-h-2'>Rastrea tu pedido</span></a>
                            </li>
                           
                            <!---<li>
                                <a href='./help' title='Ayuda'><i class='ti-help-alt'></i><span class='lang_ttrq' key='list_user-opt-h-3'>Ayuda y preguntas frecuentes</span></a>
                            </li>-->
                            <li>
                                <a href='././php/process_account_logout.php' title='Salir'><i class='ti-power-off'></i><span  class='lang_ttrq' key='list_user-opt-h-4'>Cerrar sesi&oacute;n</span></a>
                            </li>
                        </ul>";
                    } else {
                      echo "<ul>
                        <li>
                          <a href='home' title='Home'><i class='ti-home'></i><span>Ir a inicio</span></a>
                        </li>
                        <li>
                            <a  href='shop' title='Mi perfil'><i class='ti-user'></i><span class='lang_ttrq' key='list_user-opt-h-1'>Administrar mi cuenta</span></a>
                        </li>
                        <li>
                            <a href='./track-order
                            ' title='Ratrea tu pedido'><i class='ti-truck'></i><span class='lang_ttrq' key='list_user-opt-h-2'>Rastrea tu pedido</span></a>
                        </li>
                     
                        <!--<li>
                            <a href='./help' title='Ayuda'><i class='ti-help-alt'></i><span class='lang_ttrq' key='list_user-opt-h-3'>Ayuda y preguntas frecuentes</span></a>
                        </li>-->
                        <li>
                            <a href='././php/process_account_logout.php' title='Salir'><i class='ti-power-off'></i><span  class='lang_ttrq' key='list_user-opt-h-4'>Cerrar sesi&oacute;n</span></a>
                        </li>
                      </ul>";
                    }
                  }*/
                  ?>
                </div>
              </div>
            </li>

            <li>
              <a href="#" class="language_icon_header_b-ttrq">
                <div class="icon-language_ttrq">
                  <ul>

                    <?php
                    /*
                    foreach ($flags as $key => $value) {
                      echo "
                            <li>
                              <button 
                                
                                data-pref='{$value['prefijo_moneda']}' 
                                data-simbol='{$value['simbolo_moneda']}' 
                                data-moneda='{$value['moneda']}' 

                                class='translate_lang' id='{$value['prefijo']}'>
                                <div style='background-image: url(./admin/images/banderas/{$value['bandera']});'></div>
                              </button>
                            </li>
                          ";
                    }*/

                    ?>
                  </ul>
                </div>
              </a>
            </li>

            <li>
              <a href="favorites" class="wishlist menu_whishlist_header_b" title="Ver lista de Deseos"><span>Lista de Deseos</span></a>
            </li>

            <li>
              <a href="#" class="cart_icon_header_b-ttrq" id="view_cart_ttrq">
                <span id="count-product-cart"></span>
              </a>
            </li>
          </ul>
        </div>
      </div>

    </div>

  </div>

  <div class="content-cart-slide-ttrq_header_b">
    <div class="content-into-cart-slide-ttrq_header_b">

    </div>
  </div>
</header>-->

<div class="containt_total_ttrq-cart">
  <div class="container_cart_lis-ttrq">
    <div class="content-list_cart_hb_ttrq">
      <div class="contain-title-cart-sdleft_ttrq">
        <h4 class='lang_ttrq' key='title-cart-delay_ttrq'>Listado de Compras<i class="fas fa-cart-arrow-down"></i></h4>
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
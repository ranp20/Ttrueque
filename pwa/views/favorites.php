<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('location: account');
}
?>

<?php require_once 'header_index.php'; ?>

<body>
  <!-- /APPI WHATSAPP-->
  <?php require_once 'api_whatsapp.php'; ?>
  <div id="page" class="content-total-page-ttrk">
    <!-- /HEADER-->
    <?php
    require_once '../php/process_header.php';
    require_once 'header_b.php'; 
    ?>
    <main class="main-favorites-container">
      <div class="container margin_30" id="favorites-content-list">
        <div class="content-title">
          <h3 class="lang_ttrq" key="title_favorites_ttrq">Favoritos</h3>
        </div>
        <div class="content-lista-favoritos">
          <!-- /BOTÓN DE SELECIONAR TODOS LOS ELEMENTOS EN EL CARRITO-->
          <div class="content-checked-lista-delete">
            <div class="content-checkbox-lista">
              <input type="checkbox" id="selected-all-favorites">
            </div>
            <div class="content-boton-eliminar">
              <input type="button" value="Eliminar" id="delete_all_favorites"></input>
              <p>Favoritos 1- 17 de 17</p>
            </div>
          </div>
          <!-- /LISTA DE PRODUCTOS - FAVORITOS-->
          <ul class="lista-favorites">
              <!------->
              <li>
                <div class="content-checkbox-lista-product">
                  <input type="checkbox" class="product-favorite-case">
                </div>
                <div class="content-dupla-detail">
                  <div class="content-producto-img-detail">
                    <div class="content-producto-image-lista">
                      <a href="javascript:void(0);">
                          <img src="admin/images/products/samsung-galaxy-s20-plus-5g-dual-sim-g9860-12gb-ram-128gb.png" alt="Imagen del producto" width="100" height="100">
                      </a>
                    </div>
                    <div class="content-producto-detalle-lista">
                      <a href="javascript:void(0);">
                          <h5>Polo Avenger</h5>
                      </a>
                      <p><s>$199.99</s></p>
                      <p>1200 Bikers</p>
                      <p><i class="fal fa-credit-card fa-1x"></i>12 x 1kg</p>
                    </div>
                  </div>
                  <div class="content-producto-delete-options">
                    <a href="javascript:void(0);" class="lang_ttrq" key="btn-buy-p_favorites_ttrq">Comprar</a>
                    <div class="content-producto-options">
                      <label class="menu-slide-dropdown-options icon-menu-favorites"></label>
                    </div>
                  </div>
                </div>
              </li>
              <!------->
              <!------->
              <li>
                <div class="content-checkbox-lista-product">
                  <input type="checkbox" class="product-favorite-case">
                </div>
                <div class="content-dupla-detail">
                  <div class="content-producto-img-detail">
                    <div class="content-producto-image-lista">
                      <a href="javascript:void(0);">
                          <img src="admin/images/products/samsung-galaxy-s20-plus-5g-dual-sim-g9860-12gb-ram-128gb.png" alt="Imagen del producto" width="100" height="100">
                      </a>
                    </div>
                    <div class="content-producto-detalle-lista">
                      <a href="javascript:void(0);">
                          <h5>Polo Avenger</h5>
                      </a>
                      <p><s>$199.99</s></p>
                      <p>1200 Bikers</p>
                      <p><i class="fal fa-credit-card fa-1x"></i>12 x 1kg</p>
                    </div>
                  </div>
                  <div class="content-producto-delete-options">
                    <a href="javascript:void(0);" class="lang_ttrq" key="btn-buy-p_favorites_ttrq">Comprar</a>
                    <div class="content-producto-options">
                      <label class="menu-slide-dropdown-options icon-menu-favorites"></label>
                    </div>
                  </div>
                </div>
              </li>
              <!------->
              <!------->
              <li>
                <div class="content-checkbox-lista-product">
                  <input type="checkbox" class="product-favorite-case">
                </div>
                <div class="content-dupla-detail">
                  <div class="content-producto-img-detail">
                    <div class="content-producto-image-lista">
                      <a href="javascript:void(0);">
                          <img src="admin/images/products/samsung-galaxy-s20-plus-5g-dual-sim-g9860-12gb-ram-128gb.png" alt="Imagen del producto" width="100" height="100">
                      </a>
                    </div>
                    <div class="content-producto-detalle-lista">
                      <a href="javascript:void(0);">
                          <h5>Polo Avenger</h5>
                      </a>
                      <p><s>$199.99</s></p>
                      <p>1200 Bikers</p>
                      <p><i class="fal fa-credit-card fa-1x"></i>12 x 1kg</p>
                    </div>
                  </div>
                  <div class="content-producto-delete-options">
                    <a href="javascript:void(0);" class="lang_ttrq" key="btn-buy-p_favorites_ttrq">Comprar</a>
                    <div class="content-producto-options">
                      <label class="menu-slide-dropdown-options icon-menu-favorites"></label>
                    </div>
                  </div>
                </div>
              </li>
              <!------->
              <!------->
              <li>
                <div class="content-checkbox-lista-product">
                  <input type="checkbox" class="product-favorite-case">
                </div>
                <div class="content-dupla-detail">
                  <div class="content-producto-img-detail">
                    <div class="content-producto-image-lista">
                      <a href="javascript:void(0);">
                          <img src="admin/images/products/samsung-galaxy-s20-plus-5g-dual-sim-g9860-12gb-ram-128gb.png" alt="Imagen del producto" width="100" height="100">
                      </a>
                    </div>
                    <div class="content-producto-detalle-lista">
                      <a href="javascript:void(0);">
                          <h5>Polo Avenger</h5>
                      </a>
                      <p><s>$199.99</s></p>
                      <p>1200 Bikers</p>
                      <p><i class="fal fa-credit-card fa-1x"></i>12 x 1kg</p>
                    </div>
                  </div>
                  <div class="content-producto-delete-options">
                    <a href="javascript:void(0);" class="lang_ttrq" key="btn-buy-p_favorites_ttrq">Comprar</a>
                    <div class="content-producto-options">
                      <label class="menu-slide-dropdown-options icon-menu-favorites"></label>
                    </div>
                  </div>
                </div>
              </li>
              <!------->
            </ul>
          </div>
      </div>
    </main>
  <!-- /main -->
  <?php require_once 'footer.php'; ?>
  <!--/footer-->
  </div>
  <!-- page -->
  <div id="toTop"></div><!-- Back to top button -->
  <!-- COMMON SCRIPTS -->
  <script src="js/common_scripts.min.js"></script>
  <script src="js/main.js"></script>
  <!-- SPECIFIC SCRIPTS -->
  <script src="js/sticky_sidebar.min.js"></script>
  <script src="js/specific_listing.js"></script>
  <script src="view_favorites.js"></script>
  <script src="./js/actions_pages/view_cart.js"></script>
  <script src="js/actions_pages/customs.js"></script>
  <!-- CUSTOM JQUERY -->
  <script src="js/actions_pages/favorites.js"></script>
  <script src="./js/actions_pages/language_currency.js"></script>
</body>
</html>
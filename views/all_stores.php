<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
if (!isset($_SESSION["user"])) {
	header("Location: login");
}
require_once '../php/class/store.php';
$c = new Store();
$dat = $c->select_tienda();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Ttrueque | Todas las tiendas</title>
  <?php require_once 'includes/header_links.php';?>
  <!-- INCLUIR SWEET ALERT 2 -->
  <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
  <script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>
<body>
  <?php require_once 'api_whatsapp.php';?>
  <div id="page">
  <?php require_once '../php/process_header.php';?>
  <?php require_once 'header_b.php';?>
    <div class="content-ttrk-official-markets-c" id="cont-all-stores_in_ttrk">
      <div class="contenido-tiendas-off-header">
        <div class="content-title-tiendas">
          <h3 class="lang_ttrq" key="title_all_official_markets">Todas las tiendas</h3>
        </div>
      </div>
      <div class="container-content-off-mrkts">
        <section class="list-stores-officials-ttrk-c">
          <ul class="items-str-off-ttrk">
              <?php
								foreach ($dat as $val) {
									if($val['logo'] == "default-store.png"){
										echo "
										<li class='item-str-off-into'>
											<a href='productos?store={$val['nombre_tienda']}' class='item-cont-str-off btn_get_to_trademarks' >
												<div class='cont-logo-offi-mrkt-b-ttrk' style='background: rgba(255,255,255,.3);'>
													<div  loading='lazy' class='logo-off-mrkt-c-ttrk img-fluid' style='background-image: url(../Ttrueque/shop/images/store/{$val['logo']});'></div>
												</div>
												<div class='cont-info-offi-mrkt-b-ttrk'>
													<p>" . ucwords($val['nombre_tienda']) . "</p>
													<!--<p>Supermercados</p>-->
													<!--<p class='tooltip-off-mrkt'>
														<i class='fal fa-calendar-alt'></i>Hoy, 9pm
													</p>-->
												</div>
											</a>
										</li>
										";
									}else{
										echo "
										<li class='item-str-off-into'>
											<a href='productos?store={$val['nombre_tienda']}' class='item-cont-str-off btn_get_to_trademarks' >
												<div class='cont-logo-offi-mrkt-b-ttrk'>
													<div loading='lazy' class='logo-off-mrkt-c-ttrk img-fluid' style='background-image: url(../Ttrueque/shop/images/store/{$val['logo']});'></div>
												</div>
												<div class='cont-info-offi-mrkt-b-ttrk'>
													<p>" . ucwords($val['nombre_tienda']) . "</p>
													<!--<p>Supermercados</p>-->
													<!--<p class='tooltip-off-mrkt'>
														<i class='fal fa-calendar-alt'></i>Hoy, 9pm
													</p>-->
												</div>
											</a>
										</li>
										";
									}
								}
							?>
          </ul>
        </section>
      </div>
    </div>
    <?php require_once 'footer.php';?>
  </div>
  <div id="toTop"></div>
  <!-- COMMON SCRIPTS -->
  <script src="./js/main.js"></script>
  <script src="./js/carousel-home.min.js"></script>
  <script src="./js/actions_pages/buy_cart.js"></script>
  <script src="./js/actions_pages/view_cart.js"></script>
  <script src="./js/actions_pages/modal_dialog.js"></script>
  <script src="./js/actions_pages/customs.js"></script>
  <script src="./js/actions_pages/search_products.js"></script>
  <script src="./js/actions_pages/history-shoping.js"></script>
  <script src="./js/actions_pages/language_currency.js"></script>
  <script src="./js/actions_pages/listAllCategories.js"></script>
  <script src="./js/actions_pages/listCategories_ByStore.js"></script>
  <script src="./js/actions_pages/listProds_Store_Category.js"></script>
  <script src="js/customs/custom.js"></script>
  <script src="./js/actions_pages/track-order.js"></script>
</body>
</html>
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
  <?php require_once '../php/process_header.php';?>
  <?php require_once 'includes/inc_header-top.php';?>
  <div class="loader-ttrqstr">
    <span class="loader-ttrqstr--loader"></span>
  </div>
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
							foreach ($dat as $val){
								$urlpath = $_SERVER['DOCUMENT_ROOT']."/Ttrueque/shop/images/store/".$val['logo'];
								$urlpath_default = "../Ttrueque/shop/images/store/default-store.png";
								if($val['logo'] == "default-store.png"){
									echo "
									<li class='item-str-off-into'>
										<a href='productos?store={$val['nombre_tienda']}' class='item-cont-str-off btn_get_to_trademarks' >
											<span class='cont-logo-offi-mrkt-b-ttrk' style='box-sizing: border-box;display: inline-block;overflow: hidden;width: initial;height: initial;background: none;opacity: 1;border: thin solid #ebebeb;margin: 0px;padding: 0px;position: relative;max-width: 100%;background-color: #fff;border-radius: 8px;'>
												<span style='box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; max-width: 100%;'>
													<img alt='' aria-hidden='true' src='data:image/svg+xml,%3csvg%20xmlns=%27http://www.w3.org/2000/svg%27%20version=%271.1%27%20width=%27138%27%20height=%27138%27/%3e' style='display: block; max-width: 100%; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px;'>
												</span>
												<img src='../Ttrueque/shop/images/store/default-store.png' alt='{$val['nombre_tienda']}' class='logo-off-mrkt-c-ttrk img-fluid' style='position: absolute;inset: 0px;box-sizing: border-box;padding: 0px;border: none;margin: auto;display: block;width: 0px;height: 0px;min-width: 80%;max-width: 80%;min-height: 80%;max-height: 80%;object-fit:cover;border-radius: 8px;vertical-align: top;' decoding='async'>
											</span>
											<div class='cont-info-offi-mrkt-b-ttrk'>
												<p>" . ucwords($val['nombre_tienda']) . "</p>
											</div>
										</a>
									</li>
									";
								}else{
									if(!file_exists($urlpath)){
										echo "
										<li class='item-str-off-into'>
											<a href='productos?store={$val['nombre_tienda']}' class='item-cont-str-off btn_get_to_trademarks' >
												<span class='cont-logo-offi-mrkt-b-ttrk' style='box-sizing: border-box;display: inline-block;overflow: hidden;width: initial;height: initial;background: none;opacity: 1;border: thin solid #ebebeb;margin: 0px;padding: 0px;position: relative;max-width: 100%;background-color: #fff;border-radius: 8px;'>
													<span style='box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; max-width: 100%;'>
														<img alt='' aria-hidden='true' src='data:image/svg+xml,%3csvg%20xmlns=%27http://www.w3.org/2000/svg%27%20version=%271.1%27%20width=%27138%27%20height=%27138%27/%3e' style='display: block; max-width: 100%; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px;'>
													</span>
													<img src='../Ttrueque/shop/images/store/default-store.png' alt='{$val['nombre_tienda']}' class='logo-off-mrkt-c-ttrk img-fluid' style='position: absolute;inset: 0px;box-sizing: border-box;padding: 0px;border: none;margin: auto;display: block;width: 0px;height: 0px;min-width: 80%;max-width: 80%;min-height: 80%;max-height: 80%;object-fit:cover;border-radius: 8px;vertical-align: top;' decoding='async'>
												</span>
												<div class='cont-info-offi-mrkt-b-ttrk'>
													<p>" . ucwords($val['nombre_tienda']) . "</p>
												</div>
											</a>
										</li>
										";
									}else{
										echo "
										<li class='item-str-off-into'>
											<a href='productos?store={$val['nombre_tienda']}' class='item-cont-str-off btn_get_to_trademarks' >
												<span class='cont-logo-offi-mrkt-b-ttrk' style='box-sizing: border-box;display: inline-block;overflow: hidden;width: initial;height: initial;background: none;opacity: 1;border: thin solid #ebebeb;margin: 0px;padding: 0px;position: relative;max-width: 100%;background-color: #fff;border-radius: 8px;'>
													<span style='box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; max-width: 100%;'>
														<img alt='' aria-hidden='true' src='data:image/svg+xml,%3csvg%20xmlns=%27http://www.w3.org/2000/svg%27%20version=%271.1%27%20width=%27138%27%20height=%27138%27/%3e' style='display: block; max-width: 100%; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px;'>
													</span>
													<img src='../Ttrueque/shop/images/store/{$val['logo']}' alt='{$val['nombre_tienda']}' class='logo-off-mrkt-c-ttrk img-fluid' style='position: absolute;inset: 0px;box-sizing: border-box;padding: 0px;border: none;margin: auto;display: block;width: 0px;height: 0px;min-width: 100%;max-width: 100%;min-height: 100%;max-height: 100%;object-fit:cover;border-radius: 8px;vertical-align: top;' decoding='async'>
												</span>
												<div class='cont-info-offi-mrkt-b-ttrk'>
													<p>" . ucwords($val['nombre_tienda']) . "</p>
												</div>
											</a>
										</li>
										";
									}
								}
							}
						?>
        </ul>
      </section>
    </div>
  </div>
  <?php require_once 'footer.php';?>
  <div id="toTopgobtn"></div>
  <!-- COMMON SCRIPTS -->
  <script type="text/javascript" src="./js/main.js"></script>
  <script type="text/javascript" src="./js/actions_pages/buy_cart.js"></script>
  <script type="text/javascript" src="./js/actions_pages/view_cart.js"></script>
  <script type="text/javascript" src="./js/actions_pages/customs.js"></script>
  <script type="text/javascript" src="./js/actions_pages/all_pages_index.js"></script>
  <script type="text/javascript" src="./js/actions_pages/language_currency.js"></script>
  <script type="text/javascript" src="./js/actions_pages/listAllCategories.js"></script>
  <script type="text/javascript" src="./js/actions_pages/listCategories_ByStore.js"></script>
  <script type="text/javascript" src="./js/actions_pages/listProds_Store_Category.js"></script>
</body>
</html>
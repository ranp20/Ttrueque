<?php
session_start();

if (!isset($_SESSION["user"])) {
	header("Location: account");
}
require_once '../php/class/store.php';
$c = new Store();
$dat = $c->select_tienda();
?>

<?php require_once 'header_index.php'; ?>

<body class="body-homepwa" style="padding-bottom: 3rem;">
    <div class="loader-cli">
        <img src="../shop/images/gifs/shopping-loader.gif" alt="Loading...">
    </div>
    <div id="page">
        <?php 
            require_once '../php/process_header.php';		
            require_once "./headertop-pwa.php";   
		?>
        <!-- /header -->
        <div class="content-ttrk-official-markets-c" id="cont-all-stores_in_ttrk">
            <div class="contenido-tiendas-off-header">
                <div class="content-title-tiendas">
                    <h3 class="lang_ttrq" key="title_all_official_markets">Todas las tiendas</h3>
                </div>
            </div>
            <div class="container-content-off-mrkts">
                <section class="list-stores-officials-ttrk-c">
                    <ul class="items-str-off-ttrk">
                        <!-- //ITEMS - TIENDAS OFICIALES EN TTRUEQUE-->
                        <?php

				foreach ($dat as $val) {
					if($val['logo'] == "default-store.png"){
						echo "
						<li class='item-str-off-into'>
							<a href='productos?store={$val['nombre_tienda']}' class='item-cont-str-off btn_get_to_trademarks' >
								<div class='contlogo-allstores cont-logo-offi-mrkt-b-ttrk' style='background: rgba(255,255,255,.3);'>
									<div  loading='lazy' class='logo-off-mrkt-c-ttrk img-fluid' style='background-image: url(./shop/images/store/{$val['logo']});'></div>
								</div>
								<div class='cont-info-offi-mrkt-b-ttrk'>
									<h2 class='name-store-off-ttrq'>" . ucwords($val['nombre_tienda']) . "</h2>
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
								<div class='contlogo-allstores cont-logo-offi-mrkt-b-ttrk'>
									<div loading='lazy' class='logo-off-mrkt-c-ttrk img-fluid' style='background-image: url(./shop/images/store/{$val['logo']});'></div>
								</div>
								<div class='cont-info-offi-mrkt-b-ttrk'>
									<h2 class='name-store-off-ttrq'>" . ucwords($val['nombre_tienda']) . "</h2>
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
                        <!-- //END TO ITEMS-->
                    </ul>
                </section>
            </div>
        </div>
        <?php require_once './tabsbottom-pwa.php'; ?>
    </div>
    
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
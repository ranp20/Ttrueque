<?php

require_once '../php/class/client.php';
$c = new Client();
$d = $c->get_data_by_id($_SESSION['user']);

if(!isset($d[0]['tienda']) || $d[0]['tienda'] == "" || !is_numeric($d[0]['tienda'])){
    header('Location: ../');
}

//print_r($_SESSION['user']);

?>
<section class="sidebar-nav">
    <div class="user-image">
        <input type="hidden" id="tienda" name="tienda" value="<?php echo $d[0]['tienda']; ?>">
        <input type="hidden" id="cantidad" name="cantidad" value="<?php echo $d[0]['cantidad']; ?>">

        <div class="user-img-content" id="info_cli">
        </div>
    </div>
    <h3 class="lang_ttrq" key="txt-menu-sdlf-ad_cli">MENÚ</h3>
    <div class="user-options" id="options-user-d-cli">

        <?php 

            if($d[0]['estado'] == "ACTIVO") {  

            echo '
                <a href="./" class="active"><i class="icon-bar-left lni lni-dashboard"></i><span class="lang_ttrq" key="txt-list-link-page-sdlf-ad_cli-1">Tablero</span></a>
                <a href="admin-profile.php"><i class="icon-bar-left lni lni-user"></i><span class="lang_ttrq" key="txt-list-link-page-sdlf-ad_cli-3">Administrar Perfil</span></a>
                <a href="history-shippings.php"><i class="icon-bar-left lni lni-files"></i><span class="lang_ttrq" key="txt-list-link-page-sdlf-ad_cli-2">Historial de Compras</span></a>
                <a href="wallet-info.php"><i class="icon-bar-left lni lni-wallet"></i><span class="lang_ttrq" key="txt-list-link-page-sdlf-ad_cli-4">Mi Saldo</span></a>
                <!-- <a href="chat-clients.php"><i class="icon-bar-left lni lni-comments"></i><span class="lang_ttrq" key="txt-list-link-page-sdlf-ad_cli-5">Mensajería con Vendedor</span></a> -->
                <a href="products_v.php"><i class="icon-bar-left lni lni-cart"></i><span class="lang_ttrq" key="txt-list-link-page-sdlf-ad_cli-6">Mis Productos</span></a>
                <a href="marcas.php"><i class="icon-bar-left lni lni-diamond-alt"></i><span class="lang_ttrq" key="txt-list-link-page-sdlf-ad_cli-7">Mis Marcas y Categorías</span></a>
                <a href="sales-report.php"><i class="icon-bar-left lni lni-dollar"></i><span class="lang_ttrq" key="txt-list-link-page-sdlf-ad_cli-8">Informe de Ventas</span></a>
                <a href="request-refund.php"><i class="icon-bar-left lni lni-revenue"></i><span class="lang_ttrq" key="txt-list-link-page-sdlf-ad_cli-9">Solicitud de reembolso</span></a>
                <a href="orders_v.php"><i class="icon-bar-left lni lni-delivery"></i><span class="lang_ttrq" key="txt-list-link-page-sdlf-ad_cli-10">Ordenes ó pedidos</span></a>
                <a href="review-products_v.php"><i class="icon-bar-left lni lni-emoji-smile"></i><span class="lang_ttrq" key="txt-list-link-page-sdlf-ad_cli-11">Comentarios de Productos</span></a>
            ';
            }else{
              echo '
                <a class="active" href="sales-report.php"><i class="icon-bar-left lni lni-dollar"></i><span class="lang_ttrq" key="txt-list-link-page-sdlf-ad_cli-8">Informe de Ventas</span></a>
            ';  
            }
        ?>

    </div>
</section>
<script src="js/store.js"></script>
<!--<script src="js/informe_ventas.js"></script>-->
<script src="js/language_currency.js"></script>
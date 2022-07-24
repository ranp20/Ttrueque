<?php 
session_start(); 
error_reporting(0);
require_once "../php/class/categoria.php";
$c = new Categoria();
$tienda = $c->get_data_tienda($_SESSION['user']);
if (!isset($tienda[1][0]["id_menbresia"])) {
   header('location: ../cliente/menbresia');
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mis Pedidos</title>
    <?php require_once 'includes/head.php'; ?>
    <!-- INCLUIR SWEET ALERT 2 -->
  <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">
  <script type="text/javascript" src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>
<body>
    <div class="container-total active">
        <!-- NAVBAR LEFT -->
        <?php require_once 'includes/sidebar-left.php'; ?>
        <section class="content-dash">
        <div class="content-btn-toggle-dashboard-dc">
            <div class="c-left-btn-tdc">
                <i class="lni lni-menu" id="btn-tdc-toggle"></i>
            </div>
            <div class="c-center-btn-tdc"><a href="wallet-info.php">Saldo: <?php foreach($d as $val){echo $val['puntos'];} ?> Bikers</a></div>
            <div class="c-right-btn-tdc">
                    <a href="../" target="_blank"><i class='lni lni-display'></i>Ir al sitio</a>
                </div>
            </div>
            <div class="content-tracking">
                <ul class="list-track-content">
                    <!-------------->
                    <li class="track-info">
                        <div class="top-track">
                            <div class="state-track">
                                <p class="title-state">En proceso</p>
                                <p class="subtitle-track-date">LLega entre 17 y 21 de Noviembre</p>
                            </div> 
                            <a href="javascript:void(0);" class="track-envío">Seguir Envío</a>
                        </div>
                        <div class="bottom-track">
                            <img src="../admin/images/products/samsung-galaxy-s20-plus-5g-dual-sim-g9860-12gb-ram-128gb.png" alt="" width="70" height="70">
                            <div class="info-product">
                                <a href="javascript:void(0);" class="track-name-product">Polo Avengers para niños</a>
                                <p class="track-price-product">$200.00 x 1 Unidad</p>
                                <p class="track-talla-product">Talla: XL, Color: Blanco/Azul</p>
                            </div>
                            <div class="enterprise-to-the-product">
                                <p class="track-name-enterprise">Platanitos Perú</p>
                                <p class="track-telephone-enterprise">917842522</p>
                                <p class="track-email-enterprise">billy@hotmail.com</p>
                                <a href="javascript:void(0);" class="track-send-message">Enviar Mensaje</a>
                            </div>
                            <a href="javascript:void(0);" class="track-view-detail">Ver detalle</a>
                            <a href="javascript:void(0);" class="track-options">...</a>
                        </div>
                    </li>
                    <!-------------->
                    <!-------------->
                    <li class="track-info">
                        <div class="top-track">
                            <div class="state-track">
                                <p class="title-state">En proceso</p>
                                <p class="subtitle-track-date">LLega entre 17 y 21 de Noviembre</p>
                            </div> 
                            <a href="javascript:void(0);" class="track-envío">Seguir Envío</a>
                        </div>
                        <div class="bottom-track">
                            <img src="../admin/images/products/samsung-galaxy-s20-plus-5g-dual-sim-g9860-12gb-ram-128gb.png" alt="" width="70" height="70">
                            <div class="info-product">
                                <a href="javascript:void(0);" class="track-name-product">Polo Avengers para niños</a>
                                <p class="track-price-product">$200.00 x 1 Unidad</p>
                                <p class="track-talla-product">Talla: XL, Color: Blanco/Azul</p>
                            </div>
                            <div class="enterprise-to-the-product">
                                <p class="track-name-enterprise">Platanitos Perú</p>
                                <p class="track-telephone-enterprise">917842522</p>
                                <p class="track-email-enterprise">billy@hotmail.com</p>
                                <a href="javascript:void(0);" class="track-send-message">Enviar Mensaje</a>
                            </div>
                            <a href="javascript:void(0);" class="track-view-detail">Ver detalle</a>
                            <a href="javascript:void(0);" class="track-options">...</a>
                        </div>
                    </li>
                    <!-------------->
                    <!-------------->
                    <li class="track-info">
                        <div class="top-track">
                            <div class="state-track">
                                <p class="title-state">En proceso</p>
                                <p class="subtitle-track-date">LLega entre 17 y 21 de Noviembre</p>
                            </div> 
                            <a href="javascript:void(0);" class="track-envío">Seguir Envío</a>
                        </div>
                        <div class="bottom-track">
                            <img src="../admin/images/products/samsung-galaxy-s20-plus-5g-dual-sim-g9860-12gb-ram-128gb.png" alt="" width="70" height="70">
                            <div class="info-product">
                                <a href="javascript:void(0);" class="track-name-product">Polo Avengers para niños</a>
                                <p class="track-price-product">$200.00 x 1 Unidad</p>
                                <p class="track-talla-product">Talla: XL, Color: Blanco/Azul</p>
                            </div>
                            <div class="enterprise-to-the-product">
                                <p class="track-name-enterprise">Platanitos Perú</p>
                                <p class="track-telephone-enterprise">917842522</p>
                                <p class="track-email-enterprise">billy@hotmail.com</p>
                                <a href="javascript:void(0);" class="track-send-message">Enviar Mensaje</a>
                            </div>
                            <a href="javascript:void(0);" class="track-view-detail">Ver detalle</a>
                            <a href="javascript:void(0);" class="track-options">...</a>
                        </div>
                    </li>
                    <!-------------->
                    <!-------------->
                    <li class="track-info">
                        <div class="top-track">
                            <div class="state-track">
                                <p class="title-state">En proceso</p>
                                <p class="subtitle-track-date">LLega entre 17 y 21 de Noviembre</p>
                            </div> 
                            <a href="javascript:void(0);" class="track-envío">Seguir Envío</a>
                        </div>
                        <div class="bottom-track">
                            <img src="../admin/images/products/samsung-galaxy-s20-plus-5g-dual-sim-g9860-12gb-ram-128gb.png" alt="" width="70" height="70">
                            <div class="info-product">
                                <a href="javascript:void(0);" class="track-name-product">Polo Avengers para niños</a>
                                <p class="track-price-product">$200.00 x 1 Unidad</p>
                                <p class="track-talla-product">Talla: XL, Color: Blanco/Azul</p>
                            </div>
                            <div class="enterprise-to-the-product">
                                <p class="track-name-enterprise">Platanitos Perú</p>
                                <p class="track-telephone-enterprise">917842522</p>
                                <p class="track-email-enterprise">billy@hotmail.com</p>
                                <a href="javascript:void(0);" class="track-send-message">Enviar Mensaje</a>
                            </div>
                            <a href="javascript:void(0);" class="track-view-detail">Ver detalle</a>
                            <a href="javascript:void(0);" class="track-options">...</a>
                        </div>
                    </li>
                    <!-------------->
                    <!-------------->
                    <li class="track-info">
                        <div class="top-track">
                            <div class="state-track">
                                <p class="title-state">En proceso</p>
                                <p class="subtitle-track-date">LLega entre 17 y 21 de Noviembre</p>
                            </div> 
                            <a href="javascript:void(0);" class="track-envío">Seguir Envío</a>
                        </div>
                        <div class="bottom-track">
                            <img src="../admin/images/products/samsung-galaxy-s20-plus-5g-dual-sim-g9860-12gb-ram-128gb.png" alt="" width="70" height="70">
                            <div class="info-product">
                                <a href="javascript:void(0);" class="track-name-product">Polo Avengers para niños</a>
                                <p class="track-price-product">$200.00 x 1 Unidad</p>
                                <p class="track-talla-product">Talla: XL, Color: Blanco/Azul</p>
                            </div>
                            <div class="enterprise-to-the-product">
                                <p class="track-name-enterprise">Platanitos Perú</p>
                                <p class="track-telephone-enterprise">917842522</p>
                                <p class="track-email-enterprise">billy@hotmail.com</p>
                                <a href="javascript:void(0);" class="track-send-message">Enviar Mensaje</a>
                            </div>
                            <a href="javascript:void(0);" class="track-view-detail">Ver detalle</a>
                            <a href="javascript:void(0);" class="track-options">...</a>
                        </div>
                    </li>
                    <!-------------->
                    <!-------------->
                    <li class="track-info">
                        <div class="top-track">
                            <div class="state-track">
                                <p class="title-state">En proceso</p>
                                <p class="subtitle-track-date">LLega entre 17 y 21 de Noviembre</p>
                            </div> 
                            <a href="javascript:void(0);" class="track-envío">Seguir Envío</a>
                        </div>
                        <div class="bottom-track">
                            <img src="../admin/images/products/samsung-galaxy-s20-plus-5g-dual-sim-g9860-12gb-ram-128gb.png" alt="" width="70" height="70">
                            <div class="info-product">
                                <a href="javascript:void(0);" class="track-name-product">Polo Avengers para niños</a>
                                <p class="track-price-product">$200.00 x 1 Unidad</p>
                                <p class="track-talla-product">Talla: XL, Color: Blanco/Azul</p>
                            </div>
                            <div class="enterprise-to-the-product">
                                <p class="track-name-enterprise">Platanitos Perú</p>
                                <p class="track-telephone-enterprise">917842522</p>
                                <p class="track-email-enterprise">billy@hotmail.com</p>
                                <a href="javascript:void(0);" class="track-send-message">Enviar Mensaje</a>
                            </div>
                            <a href="javascript:void(0);" class="track-view-detail">Ver detalle</a>
                            <a href="javascript:void(0);" class="track-options">...</a>
                        </div>
                    </li>
                    <!-------------->
                    <!-------------->
                    <li class="track-info">
                        <div class="top-track">
                            <div class="state-track">
                                <p class="title-state">En proceso</p>
                                <p class="subtitle-track-date">LLega entre 17 y 21 de Noviembre</p>
                            </div> 
                            <a href="javascript:void(0);" class="track-envío">Seguir Envío</a>
                        </div>
                        <div class="bottom-track">
                            <img src="../admin/images/products/samsung-galaxy-s20-plus-5g-dual-sim-g9860-12gb-ram-128gb.png" alt="" width="70" height="70">
                            <div class="info-product">
                                <a href="javascript:void(0);" class="track-name-product">Polo Avengers para niños</a>
                                <p class="track-price-product">$200.00 x 1 Unidad</p>
                                <p class="track-talla-product">Talla: XL, Color: Blanco/Azul</p>
                            </div>
                            <div class="enterprise-to-the-product">
                                <p class="track-name-enterprise">Platanitos Perú</p>
                                <p class="track-telephone-enterprise">917842522</p>
                                <p class="track-email-enterprise">billy@hotmail.com</p>
                                <a href="javascript:void(0);" class="track-send-message">Enviar Mensaje</a>
                            </div>
                            <a href="javascript:void(0);" class="track-view-detail">Ver detalle</a>
                            <a href="javascript:void(0);" class="track-options">...</a>
                        </div>
                    </li>
                    <!-------------->
                </ul>
            </div>
        </section>
    </div>
    <script type="text/javascript" src="js/dashboard.js"></script>
</body>
</html>
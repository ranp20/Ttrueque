<?php 
session_start(); 

require_once "../php/class/categoria.php";
$c = new Categoria();
$tienda = $c->get_data_tienda($_SESSION['user']);
if (!isset($tienda[1][0]["id_menbresia"])) {
    header('location: ../cliente/menbresia');
}
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Lista de Deseos</title>
    <?php require_once 'includes/head.php'; ?>
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
            <div class="content-top">
                <div class="content-title">
                    <h1 class="title-dashboard">Lista de Deseos</h1>
                </div>
            </div>
            <div class="content-lista">
                <ul class="list-whislist">
                    <li class="lista-whislist">
                        <div class="img-whislist-product">
                            <img src="../admin/images/products/samsung-galaxy-s20-plus-5g-dual-sim-g9860-12gb-ram-128gb.png" alt="" width="70" height="70">
                        </div>
                        <div class="info-whislist-product">
                            <a href="javascript:void(0);" class="whislist-name-product">Polo Avengers Colections para niños</a>
                            <p class="whislist-talla-product">Talla: XL, Color: Blanco/Azul</p>
                            <p class="whislist-price-product">$200.00</p>
                            <a href="javascript:void(0);" class="whislist-contac-vendor"><i class="lni lni-envelope"></i>&nbsp;&nbsp;Contactar con el vendedor</a>
                            <a href="javascript:void(0);" class="whislist-add-cart"><i class="lni lni-cart"></i>&nbsp;&nbsp;Añadir al carrito</a>
                        </div>
                        <div class="right-whislist-value">
                            <p class="whislist-date-add">Añadido el 12 Mayo 2020</p>
                            <a href="javascript:void(0);" class="whislist-delete-product">Eliminar</a>
                        </div>
                    </li>
                </ul>
                <div class="content-whislists">
                    <div class="list-favorites-name-right">
                        <div class="title-whislists">
                            <h4>Lista de Deseos</h4>
                        </div>
                        <a onclick="add_whislist();" href="javascript:void(0);" class="add-whislist-products">+ Crear Lista de Deseos</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script type="text/javascript" src="js/customs.js"></script>
    <script type="text/javascript" src="js/dashboard.js"></script>
</body>
</html>
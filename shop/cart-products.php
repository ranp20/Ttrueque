<?php 
session_start(); 
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Carrito de Compras</title>
    <?php require_once 'includes/head.php'; ?>
</head>
<body>
    <div class="container-total active">
        <!-- NAVBAR LEFT -->
        <?php require_once 'includes/sidebar-left.php'; ?>
        <section class="content-dash">
            <?php require_once 'includes/header-top.php'; ?>
            <div class="content-top">
                <div class="content-title">
                    <h1 class="title-dashboard">Carrito de Compras (3)</h1>
                </div>
            </div>
        <div class="content-cart-list">
            <ul class="content-carrito-lista">
                <!----------------->
                <li class="lista-cart">
                    <div class="content-cart-product-infor_ttrq">
                        <div class="content-img_e_info_cart">
                            <div class="content-img-cart">
                                <div style='background-image:url(../admin/images/products/samsung-galaxy-s20-plus-5g-dual-sim-g9860-12gb-ram-128gb.png);background-repeat:no-repeat;background-size: contain;background-position: center;'></div>
                            </div>
                            <div class="content-info-cart">
                                <a href="#" class="content-name-cart">Polo Avenger Last Collection para niños</a>
                                <div class="content-detail-cart">
                                    <p class="title-info-cart">Color:&nbsp;<span> Blanco/Azul</span></p>
                                    <p class="title-info-cart">Tamaño:&nbsp;<span> XL</span></p>
                                    <p class="title-info-cart">Se envía desde:&nbsp;<span> Bolivia</span></p>
                                </div>
                                <div class="content-quantity-product-cart">
                                    <div class="dec-arrow"><</div>
                                    <p id="quantity-product">0</p>
                                    <div class="inc-arrow">></div>
                                </div>
                            </div>
                        </div>
                        <div class="content-price-cart">
                            <p>200 Bikers</p>
                        </div>
                    </div>
                    <div class="content-delete-cart">
                        <a href="#" class="delete-cart">Eliminar</a>
                    </div>
                </li>
                <!----------------->
                <!----------------->
                <li class="lista-cart">
                    <div class="content-cart-product-infor_ttrq">
                        <div class="content-img_e_info_cart">
                            <div class="content-img-cart">
                                <div style='background-image:url(../admin/images/products/samsung-galaxy-s20-plus-5g-dual-sim-g9860-12gb-ram-128gb.png);background-repeat:no-repeat;background-size: contain;background-position: center;'></div>
                            </div>
                            <div class="content-info-cart">
                                <a href="#" class="content-name-cart">Polo Avenger Last Collection para niños</a>
                                <div class="content-detail-cart">
                                    <p class="title-info-cart">Color:&nbsp;<span> Blanco/Azul</span></p>
                                    <p class="title-info-cart">Tamaño:&nbsp;<span> XL</span></p>
                                    <p class="title-info-cart">Se envía desde:&nbsp;<span> Bolivia</span></p>
                                </div>
                                <div class="content-quantity-product-cart">
                                    <div class="dec-arrow"><</div>
                                    <p id="quantity-product">0</p>
                                    <div class="inc-arrow">></div>
                                </div>
                            </div>
                        </div>
                        <div class="content-price-cart">
                            <p>200 Bikers</p>
                        </div>
                    </div>
                    <div class="content-delete-cart">
                        <a href="#" class="delete-cart">Eliminar</a>
                    </div>
                </li>
                <!----------------->
                <!----------------->
                <li class="lista-cart">
                    <div class="content-cart-product-infor_ttrq">
                        <div class="content-img_e_info_cart">
                            <div class="content-img-cart">
                                <div style='background-image:url(../admin/images/products/samsung-galaxy-s20-plus-5g-dual-sim-g9860-12gb-ram-128gb.png);background-repeat:no-repeat;background-size: contain;background-position: center;'></div>
                            </div>
                            <div class="content-info-cart">
                                <a href="#" class="content-name-cart">Polo Avenger Last Collection para niños</a>
                                <div class="content-detail-cart">
                                    <p class="title-info-cart">Color:&nbsp;<span> Blanco/Azul</span></p>
                                    <p class="title-info-cart">Tamaño:&nbsp;<span> XL</span></p>
                                    <p class="title-info-cart">Se envía desde:&nbsp;<span> Bolivia</span></p>
                                </div>
                                <div class="content-quantity-product-cart">
                                    <div class="dec-arrow"><</div>
                                    <p id="quantity-product">0</p>
                                    <div class="inc-arrow">></div>
                                </div>
                            </div>
                        </div>
                        <div class="content-price-cart">
                            <p>200 Bikers</p>
                        </div>
                    </div>
                    <div class="content-delete-cart">
                        <a href="#" class="delete-cart">Eliminar</a>
                    </div>
                </li>
                <!----------------->
            </ul>
            <div class="content-total-cart">
                <div class="secc-cart-client-total">
                    <p class="title-total-cart">Resumen de Pedido</p>
                    <div class="content-titles-price-cart">
                        <p>Total Parcial</p>
                        <p>$200.00</p>
                    </div>
                    <div class="content-title-send-cart">
                        <p>Envío</p>
                        <p>$200.00</p>
                    </div>
                    <div class="divisor-total-cart"></div>
                    <div class="content-total-price-cart">
                        <p>Total</p>
                        <p>$300.00</p>
                    </div>
                    <a href="#" class="btn-comprar-cart">COMPRAR(3)</a>
                </div>
            </div>
        </div>
        </section>
    </div> 
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="js/cart-products.js"></script>
    <script src="js/dashboard.js"></script>
</body>
</html>
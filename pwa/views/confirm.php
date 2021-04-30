<?php
session_start();

if (!isset($_SESSION['user'])) {
	header("Location:home");
}

?>
<?php require_once 'header_index.php'; ?>

<body class="body-homepwa">
    <?php require_once './headertop-pwa.php'; ?>
    <div class="loader-cli">
        <img src="../shop/images/gifs/shopping-loader.gif" alt="Loading...">
    </div>
    <section id="toppwa-ttrq" class="toppwa-ttrq">
        <div class="toppwa-ttrq__content container-maxwidth" style="display: block;">
            <div class="toppwa-ttrq__content--img" style="padding:0px;">
                <img src="img/logotipo-T-white.svg" alt="logotipo-Ttrueque-white.svg"
                    class="toppwa-ttrq__content--img--logo">
            </div>
            <input type="hidden" id="userid_cli" value="<?php echo $_SESSION['user']; ?>">
        </div>
    </section>
    <div id="page">
    <?php require_once '../php/process_header.php'; ?>
        <main class="bg_gray content-confirm-page_ttrk">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="cont-sms-confirm">
                        <div id="confirm">
                            <div class="icon icon--order-success svg add_bottom_15">
                                <div class="cont-img-icon-confirm">
                                    <img src="img/iconos_home/index-confirm-car-gif.svg" alt="">
                                </div>
                                <div class="cont-svg-icon-confirm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72">
                                        <g fill="none" stroke="#8EC343" stroke-width="2">
                                            <circle cx="36" cy="36" r="35"
                                                style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
                                            <path d="M17.417,37.778l9.93,9.909l25.444-25.393"
                                                style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                            <h2>Pedido Completado!</h2>
                            <!--<p>¡Recibirá un email de confirmación pronto!</p>-->
                            <a href="track-order" class="btn-redirect-orders-track_ttrq">Ver mis ordenes</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <?php require_once './tabsbottom-pwa.php'; ?>
    <script src="./js/common_scripts.min.js"></script>
    <script src="./js/main.js"></script>
    <script src="js/actions_pages/buy_cart.js"></script>
    <script src="js/actions_pages/remove.js"></script>
    <script src="js/actions_pages/customs.js"></script>
    <script src="./js/actions_pages/search_products.js"></script>
    <script src="./js/actions_pages/track-order.js"></script>
</body>
</html>
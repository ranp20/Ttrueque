<?php
session_start();

if (!isset($_SESSION["user"])) {
  header("Location: account");
}

require_once '../php/class/client.php';
$c = new Client();
$d_by_id =  $c->select_points_default($_SESSION['user']);
?>

<?php require_once 'header_index.php'; ?>

<body class="body-homepwa" style="padding-bottom: 3rem;">
    <div class="loader-cli">
        <img src="../shop/images/gifs/shopping-loader.gif" alt="Loading...">
    </div>
    <?php require_once "./headertop-pwa.php"; ?>
    <div id="page">
        <?php require_once '../php/process_header.php'; ?>
        <main class="main-cart-container margin_30">
            <div class="content-total-points-cart_ttrq">
                <h4>
                    <p>Saldo Total:&nbsp; </p>
                    <span><?php echo $d_by_id[0]['puntos']; ?>
                    </span>
                    <p>&nbsp;Bikers</p>
                </h4>
            </div>
            <div class="container" id="cart-content-list">
                <div class="page_header cont-cart-ttrk-c">
                    <h3 class="lang_ttrq" key="title-shopping-cart_ttrq">Carrito de Compras</h3>
                </div>
                <div class="cont-options-cart-ttrk">
                    <h3 class="remove-cart"></h3>
                    <h3 class="total-pagar"></h3>
                </div>
                <!-- /page_header -->
                <table class="table cart-list" id="tbl_id">
                    <thead>
                        <tr>
                            <th class="lang_ttrq" key="title-row-sc_ttrq_1">Productos</th>
                            <th class="lang_ttrq" key="title-row-sc_ttrq_2">Bikers</th>
                            <th class="lang_ttrq" key="title-row-sc_ttrq_3">Cantidad</th>
                            <th colspan="2" class="lang_ttrq" key="title-row-sc_ttrq_4">Subtotal</th>
                            <!--<th></th>-->
                        </tr>
                    </thead>
                    <tbody id="table-list-product" class="Cls-tblistm">

                    </tbody>
                </table>
            </div>
        </main>
    </div>
    <?php require_once './tabsbottom-pwa.php'; ?>
    
    
    <script type="text/javascript" src="./js/main.js"></script>
    <!--------- SWEEET ALERT 2 ------------>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!--------- CUSTOMS JAVASCRIPT--------->
    <script type="text/javascript" src="./js/actions_pages/language_currency.js"></script>
    <script type="text/javascript" src="js/actions_pages/buy_cart.js"></script>
    <script type="text/javascript" src="./js/actions_pages/view_cart.js"></script>
    <script type="text/javascript" src="./js/actions_pages/remove.js"></script>
    <script type="text/javascript" src="js/actions_pages/customs.js"></script>
    <script type="text/javascript" src="js/actions_pages/all_pages_index.js"></script>
    <script type="text/javascript" src="js/actions_pages/listCategories_ByStore.js"></script>
    
    <script type="text/javascript" src="./js/actions_pages/track-order.js"></script>
</body>
</html>
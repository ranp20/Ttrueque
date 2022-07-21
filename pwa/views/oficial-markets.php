<?php
session_start();





require_once '././php/class/store.php';
$c = new Store();
$dat = $c->select_tienda();
?>
<?php require_once 'header_index.php'; ?>

<body>
    <?php require_once 'api_whatsapp.php' ?>
    <!------ API WHATSAPP --->
    <div class="loader">
        <img src="../img/gifs/money-loader.gif" alt="Loading...">
    </div>
    <div id="page">
        <?php require_once 'includes/inc_header-top.php'; ?>
        <!-- /HEADER -->
        <?php require_once 'official_markets.php'; ?>
        <!-- //OFFICIAL MARKETS-->
    </div>
    <!--/footer-->
    <?php require_once 'footer.php' ?>
    </div>
    <!-- page -->
    <div id="toTop"></div>
    <!-- Back to top button -->
    <!-- COMMON SCRIPTS -->
    <script type="text/javascript" src="../js/common_scripts.min.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>
    <!-- SPECIFIC SCRIPTS -->
    <script type="text/javascript" src="../js/carousel-home.min.js"></script>
    
    <script type="text/javascript" src="../js/actions_pages/buy_cart.js"></script>
    <!-- Agregar la ventana modal a la página -->
    <script type="text/javascript" src="../js/actions_pages/modal_dialog.js"></script>
    <!-- Agregar loader page a la página -->
    <script type="text/javascript" src="../js/actions_pages/customs.js"></script>
    
    <script>
    $(document).ready(function() {
        'use strict';
        $.cookieBar({
            fixed: true
        });
    });
    </script>
    <!-- CUSTOM JAVASCRIPT -->
    <script type="text/javascript" src="../js/actions_pages/all_pages_index.js"></script>
    <!-- FONTAWESOME -->
    <script type="text/javascript" src="css/font-awesome/5.13.1/js/fontawesome.min.js"></script>
    <!-- FILES .js CUSTOMS OF THIS PAGE -->
     
     
</body>

</html>
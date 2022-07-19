<?php
session_start();



?>

<?php require_once 'header_index.php'; ?>

<body>
    <?php require_once 'api_whatsapp.php'; ?>
    <div id="page" class="content-total-page-ttrk">
        <!-- /header -->
        <?php
		require_once '../php/process_header.php';
		require_once 'header_b.php'; 
		?>
        <!-- /HISTORY-SHOPPING-->
        <div class="container-history-shopping-ttrk">
            <div class="row">
                <div class="container margin_60_35" id="contenido-historial" style="padding-top:30px;padding-bottom:0;">

                </div>
            </div>
        </div>
        <!--/footer-->
        <?php require_once 'footer-policy.php'; ?>
    </div>
    <!-- /PAGE-->
    <div id="toTop"></div>
    <!-- Back to top button -->
    <!-- COMMON SCRIPTS -->
    <script src="./js/actions_pages/track-order.js"></script>
    
    <script src="./js/main.js"></script>
    <!-- SPECIFIC SCRIPTS -->
    <script src="./js/carousel-home.min.js"></script>
    
    <script src="./js/actions_pages/buy_cart.js"></script>
    <!-- Agregar la ventana modal a la página -->
    <script src="./js/actions_pages/modal_dialog.js"></script>
    <!-- Agregar loader page a la página -->
    <script src="./js/actions_pages/customs.js"></script>
    
    <script>
    $(document).ready(function() {
        'use strict';
        $.cookieBar({
            fixed: true
        });

    });
    </script>
    <!-- CUSTOM JAVASCRIPT -->
    <script src="./js/actions_pages/search_products.js"></script>
    <!-- FONTAWESOME -->
    <script src="css/font-awesome/5.13.1/js/fontawesome.min.js"></script>
    <!-- FILES .js CUSTOMS OF THIS PAGE -->
    <script src="./js/actions_pages/history-shoping.js"></script>
</body>

</html>
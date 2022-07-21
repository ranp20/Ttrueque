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
		require_once 'includes/inc_header-top.php'; 
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
     
    
    <script type="text/javascript" src="./js/main.js"></script>
    <!-- SPECIFIC SCRIPTS -->
    <script type="text/javascript" src="./js/carousel-home.min.js"></script>
    
    <script type="text/javascript" src="./js/actions_pages/buy_cart.js"></script>
    <!-- Agregar la ventana modal a la página -->
     
    <!-- Agregar loader page a la página -->
    <script type="text/javascript" src="./js/actions_pages/customs.js"></script>
    
    <script>
    $(document).ready(function() {
        'use strict';
        $.cookieBar({
            fixed: true
        });

    });
    </script>
    <!-- CUSTOM JAVASCRIPT -->
    <script type="text/javascript" src="./js/actions_pages/all_pages_index.js"></script>
    <!-- FONTAWESOME -->
    <script type="text/javascript" src="css/font-awesome/5.13.1/js/fontawesome.min.js"></script>
    <!-- FILES .js CUSTOMS OF THIS PAGE -->
     
</body>

</html>
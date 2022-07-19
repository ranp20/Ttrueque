<?php
session_start();

?>

<?php require_once 'header_index.php'; ?>

<body>
    <?php require_once 'api_whatsapp.php'; ?>
    <div id="page" class="content-total-page-ttrk">
        <?php
		require_once '../php/process_header.php';
		require_once 'header_b.php'; ?>
        <div class="contenido-ofertas-off-header">
            <section class="banner-oferts" style="background-image: url('img/banners/banner-ofertas-semanales.png')">
            </section>
        </div>
        <div class="container-weekly-deals-ttrk">
            <div class="row">
                <div class="container margin_60_35" style="padding-top:30px;padding-bottom:0;">

                </div>
            </div>
        </div>
        <!--/footer-->
        <?php require_once 'footer.php' ?>
    </div>
    <!-- page -->
    <div id="toTop"></div>
    <!-- Back to top button -->
    <!-- COMMON SCRIPTS -->
    <script type="text/javascript" src="js/common_scripts.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/carousel-home.min.js"></script>
    
    <script type="text/javascript" src="js/actions_pages/buy_cart.js"></script>
    <script type="text/javascript" src="js/actions_pages/modal_dialog.js"></script>
    <script type="text/javascript" src="js/actions_pages/customs.js"></script>
    <script type="text/javascript" src="js/jquery.cookiebar.js"></script>
    <script>
    $(document).ready(function() {
        'use strict';
        $.cookieBar({
            fixed: true
        });
    });
    </script>
    <script type="text/javascript" src="js/actions_pages/all_pages_index.js"></script>
    <script type="text/javascript" src="css/font-awesome/5.13.1/js/fontawesome.min.js"></script>
    <script type="text/javascript" src="js/actions_pages/history-shoping.js"></script>
</body>

</html>
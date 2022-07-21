<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
if(!isset($_SESSION['user'])){
	header("Location:home");
}
?>
<?php require_once 'header_index.php';?>
<body>
  <div id="page">
  <?php	require_once '../php/process_header.php';?>
  <?php require_once 'includes/inc_header-top.php';?>
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
                  <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"><g fill="none" stroke="#8EC343" stroke-width="2"><circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle><path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path></g></svg>
                </div>
              </div>
              <h2>Pedido Completado!</h2>
              <a href="track-order" class="btn-redirect-orders-track_ttrq">Ver mis ordenes</a>
            </div>
          </div>
        </div>
      </div>
    </main>
    <?php require_once('footer.php');?>
  </div>
  <div id="toTop"></div>
  <!-- COMMON SCRIPTS -->
  
  <script type="text/javascript" src="./js/main.js"></script>
  <script type="text/javascript" src="js/actions_pages/buy_cart.js"></script>
  <script type="text/javascript" src="js/actions_pages/remove.js"></script>
  <script type="text/javascript" src="js/actions_pages/customs.js"></script>
  <script type="text/javascript" src="./js/actions_pages/all_pages_index.js"></script>
   
</body>
</html>
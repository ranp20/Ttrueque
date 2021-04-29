<?php
session_start();
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
  <?php require_once 'includes/manager-header-index.php'; ?>
  <title>Historial de compras</title>
  <link rel="stylesheet" href="../shop/css/style.css">
</head>
<body class="body-managerpwa mrgtop-57" style="padding-bottom: 3rem;">
  <?php require_once 'includes/headertop-pwa.php'; ?>
  <div class="loader-cli">
    <img src="../shop/images/gifs/shopping-loader.gif" alt="Loading...">
  </div>
  <div class="container-total active">
    <!-- NAVBAR LEFT -->
    <?php require_once 'includes/manager-sidebar-left.php'; ?>
    <!-- CONTENT FULL HISTORY SHIPPINGS  -->
    <section class="content-dash">
      <?php require_once 'includes/manager-header-top.php'; ?>
      <div class="content-top">
        <div class="content-title-history">
          <h1 class="title-dashboard-history lang_ttrq" key="txt-list-link-page-sdlf-ad_cli-2">Historial de mis compras</h1>
          <input type="hidden" id="cliente" value="<?php echo $d[0]['id_cliente']; ?>">
          <!--<div id="btn-reporte"> </div>-->
        </div>
      </div>
      <div class="cont-tablelist-result">
        <table class="history-table">
          <thead class="history-thead">
            <tr>
              <th class="lang_ttrq" key="txt-th-page-hs-ad_cli-1">Código</th>
              <th class="lang_ttrq" key="txt-th-page-hs-ad_cli-2">Producto</th>
              <th class="lang_ttrq" key="txt-th-page-hs-ad_cli-3">Tienda</th>
              <th class="lang_ttrq" key="txt-th-page-hs-ad_cli-4">Bikers real</th>
              <th class="lang_ttrq" key="txt-th-page-hs-ad_cli-5">Cantidad</th>
              <th class="lang_ttrq" key="txt-th-page-hs-ad_cli-6">Subtotal</th>
              <th class="lang_ttrq" key="txt-th-page-hs-ad_cli-7">Fecha de compra</th>
            </tr>
          </thead>
          <tbody class="history-tbody" id="list_hc_idtienda">
          </tbody>
        </table>
        <h2 id="resultTabla"></h2>
      </div>
    </section>
  </div>
  <?php require_once 'includes/tabsbottom-pwa.php'; ?>
  <script type="text/javascript">
    ((d) => {
      
      d.querySelector('#btn-tdc-toggle').addEventListener('click', function (){
        let sidebarmanager = d.querySelector('.sidebar-nav');
        let closebtnsidebarleft = d.querySelector('.c-left-btn-tdc');
        if(!sidebarmanager.classList.contains('active')){
          sidebarmanager.style.paddingTop = "3.5rem";
          sidebarmanager.style.paddingBottom = "5rem";
          closebtnsidebarleft.style.top = "60px";
        }else{
          closebtnsidebarleft.style.top = "5px";
        }
      })
    })(document);
  </script>
  <script src="../shop/js/sidebar-left.js"></script>
  <script src="../shop/js/customs.js"></script>
  <script src="../shop/js/dashboard.js"></script>
  <script src="js/actions-pages/manager-historial-compra.js"></script>
</body>
</html>
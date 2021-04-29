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
  <title>Órdenes o Pedidos</title>
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
        <div class="content-title">
          <h1 class="title-dashboard lang_ttrq" key="title-top-requestrefund-cli-ad_cli">Solicitud de Reembolso</h1>
          <input type="hidden" id="tienda" value="<?php echo $d[0]['tienda']; ?>">
        </div>
      </div>
      <div class="cont-tablelist-request-refund">
        <table class="request_refund-table">
          <thead class="request_refund-thead">
            <tr>
              <th class="lang_ttrq" key="title-th-requestrefund-ad_cli-1">Código</th>
              <th class="lang_ttrq" key="title-th-requestrefund-ad_cli-3">Cliente</th>
              <th class="lang_ttrq" key="title-th-requestrefund-ad_cli-5">Solicitud</th>
            </tr>
          </thead>
          <tbody class="request_refund-tbody" id="list_request_refund_idtienda">
          </tbody>
        </table>
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
  <script src="../shop/js/solicitud_reembolso.js"></script>
</body>
</html>
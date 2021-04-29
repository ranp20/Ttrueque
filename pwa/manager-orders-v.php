<?php
session_start();
require_once "../php/class/categoria.php";
$c = new Categoria();
$tienda = $c->get_data_tienda($_SESSION['user']);
if (!isset($tienda[1][0]["id_menbresia"])) {
    header('location: ../cliente/menbresia');
}

setlocale(LC_TIME, "spanish");
setlocale(LC_TIME, 'es_ES.UTF-8');
date_default_timezone_set('America/Bogota');
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
          <h1 class="title-dashboard lang_ttrq" key="title-top-orders-cli-ad_cli">Órdenes o Pedidos</h1>
          <?php echo   strftime("%B")  . " " . date("Y")  ?>
          <input type="hidden" id="tienda" value="<?php echo $d[0]['tienda']; ?>">

        </div>
      </div>
      <div class="cont-tablelist-orders-v">
        <table class="orders-table">
          <thead class="orders-thead">
            <tr>
              <!-- <th class="lang_ttrq" key="title-th-orders-ad_cli-1">Código</th> -->
              <th class="lang_ttrq" key="title-th-orders-ad_cli-1">N° Orden</th>
              <th class="lang_ttrq" key="title-th-orders-ad_cli-2">Cliente</th>
              <th class="lang_ttrq" key="title-th-orders-ad_cli-3">Dirección de Entrega</th>
              <th class="lang_ttrq" key="title-th-orders-ad_cli-4">País</th>
              <th class="lang_ttrq" key="title-th-orders-ad_cli-5">Teléfono</th>
              <th class="" key="">Desde</th>
              <th class="lang_ttrq" key="title-th-orders-ad_cli-6">Estado de Entrega</th>
              <th class="" key="">Confirmación</th>
              <th class="lang_ttrq" key="title-th-orders-ad_cli-8">Pedido</th>
            </tr>
          </thead>
          <tbody class="orders-tbody" id="list_orders_idtienda">
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
  <script src="js/actions-pages/manager-ordenes-pedidos.js"></script>
</body>
</html>
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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Órdenes o Pedidos</title>
  <?php require_once 'includes/head.php'; ?>
</head>
<body class="body-homepwa mrgtop-57" style="padding-bottom: 3rem;">
  <?php require_once '../php/process_header.php'; ?>
  <input type="hidden" id="userid_cli" value="<?php echo $_SESSION['user']; ?>">
  <?php require_once "headertop-pwa.php"; ?>
  <div class="loader-cli">
    <img src="images/gifs/shopping-loader.gif" alt="Loading...">
  </div>
  <div class="container-total active">
    <!-- NAVBAR LEFT -->
    <?php require_once 'includes/sidebar-left.php'; ?>
    <!-- CONTENT FULL HISTORY SHIPPINGS  -->
    <section class="content-dash">
      <?php require_once 'includes/header-top.php'; ?>
      <div class="content-top">
        <div class="content-title">
          <h1 class="title-dashboard lang_ttrq" key="title-top-orders-cli-ad_cli">Órdenes o Pedidos</h1>
          <?php echo   strftime("%B")  . " " . date("Y")  ?>
          <input type="hidden" id="tienda" value="<?php echo $d[0]['tienda']; ?>">

        </div>
      </div>
      <div class="bcontent-btns-top" id="contOrders-Btnstop">
        <ul class="bcontent-btns-top--m">
          <a href="#" class="bcontent-btns-top--m--link">
            <li class="bcontent-btns-top--m--item">
              <div class="bcontent-btns-top--m--item--cImg">
                <img src="images/utilities/ordenes_y_pedidos.jpeg" alt="" loading="lazy">
              </div>
            </li>
          </a>
        </ul>
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
  <?php require_once 'tabsbottom-pwa.php'; ?>
  <script src="./js/dashboard.js"></script>
  <script src="./js/ordenes_pedidos.js"></script>
  <script src="js/buy-cart.js"></script>
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
</body>
</html>
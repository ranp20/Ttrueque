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
  <!-- INCLUIR SWEET ALERT 2 -->
  <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">
  <script type="text/javascript" src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>

<body>
  <div class="container-total active">
    <!-- NAVBAR LEFT -->
    <?php require_once 'includes/sidebar-left.php'; ?>
    <!-- CONTENT FULL HISTORY SHIPPINGS  -->
    <section class="content-dash">
      <?php require_once 'includes/header-top.php'; ?>
      <div class="content-top">
        <div class="content-title noimportant-mb">
          <h1 class="title-dashboard lang_ttrq noimportant-mb" key="title-top-orders-cli-ad_cli">Órdenes o Pedidos</h1>
          <?php echo   strftime("%B")  . " " . date("Y")  ?>
          <input type="hidden" id="tienda" value="<?php echo $d[0]['tienda']; ?>">

        </div>
      </div>
      <div class="bcontent-btns-top" id="contOrders-Btnstop">
        <ul class="bcontent-btns-top--m">
          <a href="javascript:void(0);" class="bcontent-btns-top--m--link">
            <li class="bcontent-btns-top--m--item">
              <div class="bcontent-btns-top--m--item--cImg">
                <img src="images/utilities/ordenes_y_pedidos.jpeg" alt="" >
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
  <script type="text/javascript" src="./js/dashboard.js"></script>
  <script type="text/javascript" src="./js/ordenes_pedidos.js"></script>
</body>

</html>
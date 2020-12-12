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
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Órdenes o Pedidos</title>
  <?php require_once 'includes/head.php'; ?>
</head>

<body>
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
      <table class="orders-table">
        <thead class="orders-thead">
          <tr>
            <!-- <th class="lang_ttrq" key="title-th-orders-ad_cli-1">Código</th> -->
            <th class="lang_ttrq" key="title-th-orders-ad_cli-1">N° Orden</th>
            <th class="lang_ttrq" key="title-th-orders-ad_cli-2">Cliente</th>
            <th class="lang_ttrq" key="title-th-orders-ad_cli-3">Dirección de Entrega</th>
            <th class="lang_ttrq" key="title-th-orders-ad_cli-4">País</th>
            <th class="lang_ttrq" key="title-th-orders-ad_cli-5">Teléfono</th>
            <th class="lang_ttrq" key="title-th-orders-ad_cli-6">Estado de Entrega</th>
            <th class="lang_ttrq" key="title-th-orders-ad_cli-7">Confirmación del pedido</th>
            <th class="lang_ttrq" key="title-th-orders-ad_cli-8">Pedido</th>
          </tr>
        </thead>
        <tbody class="orders-tbody" id="list_orders_idtienda">
        </tbody>
      </table>
      <h2 id="resultTabla"></h2>
    </section>
  </div>
  <script src="./js/dashboard.js"></script>
  <script src="./js/ordenes_pedidos.js"></script>
</body>

</html>
<?php
session_start();
require_once "../php/class/categoria.php";
$c = new Categoria();
$tienda = $c->get_data_tienda($_SESSION['user']);
if (!isset($tienda[1][0]["id_menbresia"])) {
   header('location: ../cliente/menbresia');
}

if(!isset($_GET['ord']) || !is_numeric($_GET['ord']) || $_GET['ord'] == ""){
  header('Location: ./');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ver Pedido</title>
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
          <h1 class="title-dashboard_view-orders"><span>Ver pedido</span><span>Order N° : <span><?php echo $_GET['ord']; ?></span></span></h1>
          <input type="hidden" id="cartstore" value="<?php echo $_GET['ord']; ?>">
          <input type="hidden" id="storeid" name="store" value="<?php echo $d[0]["tienda"]; ?>">
        </div>
      </div>
      <div class="content-view-order-str_ttrq">
        <div class="content-list-info-v-cart_ttrq">
          <div class="content-1-item-into-l-if">
            <p><span>Nombre:</span><span id="name_cliorder"></span></p>
            <p><span>Apellido:</span><span id="lastname_cliorder"></span></p>
          </div>
          <div class="content-2-item-into-l-if">
            <p><span>Dirección:</span><span id="direccion_cliorder"></span></p>
            <p><span>Teléfono:</span><span id="telephone_cliorder"></span></p>
          </div>
          <!--<div class="content-3-item-into-l-if">
            <p><span>Ciudad:</span><span>Lima</span></p>
            <p>...</p>
          </div>-->
          <div class="content-4-item-into-l-if">
            <!--<h2><span>Envío:</span><span >S/.24</span></h2>-->
            <h2><span>Total:</span><span id="total_points-ord"></span></h2>
          </div>
        </div>
        <div class="cont-tablelist-vieworders">
          <table class="view-orders-table">
            <thead class="view-orders-thead">
              <tr>
                <th>#</th>
                <th>Producto</th>
                <th>Cliente</th>
                <th>Bikers</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th>F. Creación</th>
              </tr>
            </thead>
            <tbody class="view-orders-tbody" id="list_view_order_idord">
            </tbody>
          </table>
        </div>
      </div>
      <h2 id="resultTabla"></h2>
    </section>
  </div>
  <script type="text/javascript" src="./js/dashboard.js"></script>
  <script type="text/javascript" src="./js/carrito.js"></script>
</body>

</html>
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
<html lang="es">
<head>
  <?php require_once 'includes/manager-header-index.php'; ?>
  <title>Ver Pedido</title>
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
  <script src="../shop/js/carrito.js"></script>
</body>
</html>
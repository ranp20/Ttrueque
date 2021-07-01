<?php
session_start();
require_once "../php/class/categoria.php";
$c = new Categoria();
$tienda = $c->get_data_tienda($_SESSION['user']);
if (!isset($tienda[1][0]["id_menbresia"])) {
    header('location: ../cliente/menbresia');
}

require_once '../php/class/client.php';
$c = new Client();
$d = $c->get_data_by_id($_SESSION['user']);

if ($d[0]['estado'] == "INACTIVO") {
    header('location: sales-report.php');
}

// if(!isset($d[0]['tienda']) || $d[0]['tienda'] == "" || !is_numeric($d[0]['tienda'])){
//     header('location: ../');
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Cliente</title>
  <?php require_once 'includes/head.php'; ?>
</head>
<body>
  <div class="loader-cli">
    <img src="images/gifs/shopping-loader.gif" alt="Loading...">
  </div>
  <div class="container-total active">
    <!-- LEFT SIDEBAR NAV -------->
    <?php require_once 'includes/sidebar-left.php'; ?>
    <!-- CONTENT FULL DASHBOARD -->
    <section class="content-dash">
      <?php require_once 'includes/header-top.php'; ?>
      <div class="content-top">
        <div class="bcontent-btns-top" id="contDetailsTablero-Btnstop">
          <ul class="bcontent-btns-top--m">
            <a href="#" class="bcontent-btns-top--m--link">
              <li class="bcontent-btns-top--m--item">
                <div class="bcontent-btns-top--m--item--cImg">
                  <img src="images/utilities/products_into_pedidos.jpeg" alt="" loading="lazy">
                </div>
                <div class="bcontent-btns-top--m--item--cDesc">
                  <h4 id="cont-orders-numbs" class="bcontent-btns-top--m--item--cDesc--conttotal">0</h4>
                  <span class="lang_ttrq bcontent-btns-top--m--item--cDesc--desc" key="txt-products-btn-top-ad_cli-1">Producto</span>
                  <span class="lang_ttrq bcontent-btns-top--m--item--cDesc--desc" key="txt-down-btn-cart-top-ad_cli-3">en tus pedidos</span>
                </div>
              </li>
            </a>
            <a href="#" class="bcontent-btns-top--m--link">
              <li class="bcontent-btns-top--m--item">
                <div class="bcontent-btns-top--m--item--cImg">
                  <img src="images/utilities/products_into_compras.jpeg" alt="" loading="lazy">
                </div>
                <div class="bcontent-btns-top--m--item--cDesc">
                  <h4 id="cont-salesreport-numbs" class="bcontent-btns-top--m--item--cDesc--conttotal">0</h4>
                  <span class="lang_ttrq bcontent-btns-top--m--item--cDesc--desc" key="txt-products-btn-top-ad_cli-2">Producto</span>
                  <span class="lang_ttrq bcontent-btns-top--m--item--cDesc--desc" key="txt-down-btn-cart-top-ad_cli-4">en tus ventas</span>
                </div>
              </li>
            </a>
          </ul>
        </div>
      </div>
      <div class="content-bottom">
        <div class="subcontent-left">
          <div class="cabecera-content">
            <span class="lang_ttrq" key="txt-form-down-ad_cli-1">Mis Direcciones</span>
            <a href="admin-profile.php" class="update-directions lang_ttrq" key="txt-form-down-link-ad_cli-2">Editar</a>
          </div>
          <div class="contenido-content">
            <table class="table-content-left">
              <thead>
                <tr>
                  <th class="lang_ttrq" key="txt-th-form-1-down-link-ad_cli-1">Dirección:</th>
                  <th class="lang_ttrq" key="txt-th-form-1-down-link-ad_cli-2">País:</th>
                  <th class="lang_ttrq" key="txt-th-form-1-down-link-ad_cli-3">Ciudad:</th>
                  <th class="lang_ttrq" key="txt-th-form-1-down-link-ad_cli-4">Teléfono:</th>
                </tr>
              </thead>
              <tbody>
                <tr class="table-td-b">
                  <?php
                  foreach ($d as $valu) {
                      echo "
                        <td>{$valu['direccion_cliente']}</td>
                        <td>{$valu['nombre_pais']}</td>
                        <td>{$valu['telefono']}</td>
                    ";
                  }
                  ?>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="subcontent-right">
          <div class="cabecera-content">
            <span class="lang_ttrq" key="txt-form-down-link-ad_cli-1">Mis Compras</span>
          </div>
          <div class="contenido-content">
            <table class="table-content-right">
              <thead>
                <tr>
                  <th class="lang_ttrq" key="txt-th-form-2-down-link-ad_cli-1">Código</th>
                  <th class="lang_ttrq" key="txt-th-form-2-down-link-ad_cli-2">Fecha</th>
                  <th class="lang_ttrq" key="txt-th-form-2-down-link-ad_cli-3">Cantidad</th>
                  <th class="lang_ttrq" key="txt-th-form-2-down-link-ad_cli-4">Estado de entrega</th>
                </tr>
              </thead>
              <tbody class="table-tbody">
                <tr>
                  <td>1234</td>
                  <td>24-12-20</td>
                  <td>1000</td>
                  <td><i></i>En proceso</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </div>
  <script src="js/sidebar-left.js"></script>
  <script src="js/customs.js"></script>
  <script src="js/dashboard.js"></script>
  <script src="js/ordenes_pedidos.js"></script>
  <script src="js/informe_ventas.js"></script>
</body>
</html>
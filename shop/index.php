<?php
session_start();
require_once "../php/class/categoria.php";
$c = new Categoria();
$tienda = $c->get_data_tienda($_SESSION['user']);
if(!isset($tienda[1][0]["id_menbresia"])){
  header('location: ../cliente/menbresia');
}else{
  require_once '../php/class/client.php';
  $c = new Client();
  $d = $c->get_data_by_id($_SESSION['user']);
  if($d[0]['estado'] == "INACTIVO"){
    header('location: sales-report.php');
  }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Dashboard - Cliente</title>
  <?php require_once 'includes/head.php';?>
</head>
<body>
  <div class="container-total active">
    <?php require_once 'includes/sidebar-left.php';?>
    <section class="content-dash">
      <?php require_once 'includes/header-top.php';?>
      <main>
        <div class="box">
          <div class="content-top">
            <div class="content-title">
              <h1 class="title-dashboard lang_ttrq" key="txt-list-link-page-sdlf-ad_cli-1">Logística</h1>
            </div>
            <div class="bcontent-btns-top" id="contDetailsTablero-Btnstop">
              <ul class="bcontent-btns-top--m">
                <a href="./orders_v.php" class="bcontent-btns-top--m--link">
                  <li class="bcontent-btns-top--m--item">
                    <div class="bcontent-btns-top--m--item--cImg">
                      <img src="<?=$url_shop;?>images/utilities/products_into_pedidos.jpeg" alt="" >
                    </div>
                    <div class="bcontent-btns-top--m--item--cDesc">
                      <h4 id="cont-orders-numbs" class="bcontent-btns-top--m--item--cDesc--conttotal">0</h4>
                      <span class="lang_ttrq bcontent-btns-top--m--item--cDesc--desc" key="txt-products-btn-top-ad_cli-1">Producto</span>
                      <span class="lang_ttrq bcontent-btns-top--m--item--cDesc--desc" key="txt-down-btn-cart-top-ad_cli-3">en tus pedidos</span>
                    </div>
                  </li>
                </a>
                <a href="./products_v.php" class="bcontent-btns-top--m--link">
                  <li class="bcontent-btns-top--m--item">
                    <div class="bcontent-btns-top--m--item--cImg">
                      <img src="<?=$url_shop;?>images/utilities/products_into_compras.jpeg" alt="" >
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
                          <td>{$valu['telefono']}</td>";
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
        </div>
      </main>
    </section>
  </div>
  <script type="text/javascript" src="<?=$url_shop?>js/sidebar-left.js"></script>
  <script type="text/javascript" src="<?=$url_shop?>js/customs.js"></script>
  <script type="text/javascript" src="<?=$url_shop?>js/dashboard.js"></script>
  <script type="text/javascript" src="<?=$url_shop?>js/ordenes_pedidos.js"></script>
  <script type="text/javascript" src="<?=$url_shop?>js/informe_ventas.js"></script>
</body>
</html>
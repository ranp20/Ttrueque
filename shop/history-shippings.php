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
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Historial de compras</title>
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
  <script src="./js/dashboard.js"></script>
  <script src="./js/historial_compra.js"></script>
</body>

</html>
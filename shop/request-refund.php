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
        <div class="content-title noimportant-mb">
          <h1 class="title-dashboard lang_ttrq noimportant-mb" key="title-top-requestrefund-cli-ad_cli">Solicitud de Reembolso</h1>
          <input type="hidden" id="tienda" value="<?php echo $d[0]['tienda']; ?>">
        </div>
      </div>
      <div class="bcontent-btns-top" id="contRRefund-Btnstop">
        <ul class="bcontent-btns-top--m">
          <a href="javascript:void(0);" class="bcontent-btns-top--m--link">
            <li class="bcontent-btns-top--m--item">
              <div class="bcontent-btns-top--m--item--cImg">
                <img src="images/utilities/solicitud_reembolso.jpeg" alt="" loading="lazy">
              </div>
            </li>
          </a>
        </ul>
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
  <script type="text/javascript" src="./js/dashboard.js"></script>
  <script type="text/javascript" src="./js/solicitud_reembolso.js"></script>
</body>

</html>
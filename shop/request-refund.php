<?php
session_start();

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
          <h1 class="title-dashboard lang_ttrq" key="title-top-requestrefund-cli-ad_cli">Solicitud de Reembolso</h1>
          <input type="hidden" id="tienda" value="<?php echo $d[0]['tienda']; ?>">
        </div>
      </div>
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
    </section>
  </div>
  <script src="./js/dashboard.js"></script>
  <script src="./js/solicitud_reembolso.js"></script>
</body>

</html>
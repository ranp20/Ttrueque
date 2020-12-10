<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mi Billetera</title>
  <?php require_once 'includes/head.php'; ?>
</head>
<body>
  <div class="container-total active">
    <!-- SIDEBAR NAV -->
    <?php require_once 'includes/sidebar-left.php'; ?>
    <!-- CONTENT FULL HISTORY SHIPPINGS  -->
    <section class="content-dash">
      <?php require_once 'includes/header-top.php'; ?>
      <div class="content-top">
        <div class="content-title">
          <h1 class="title-dashboard lang_ttrq" key="txt-list-link-page-sdlf-ad_cli-4">Mi Saldo</h1>
          <input type="hidden" id="idcliente" value="<?php echo $d[0]['id_cliente']; ?>">
        </div>
      </div>
      <div class="btns-top">
        <ul class="btns-options-wallet">
          <a href="#" class="wallet-detail">
            <li>
              <div class="content-icons">
                  <i class="lni lni-coin icon-hov"></i>
              </div>
              <?php foreach ($d as $val){echo $val['puntos'];}?> 
              <span class="lang_ttrq" key="txt-wallet-btn-top-ad_cli-1">Bikers</span>
              <p class="lang_ttrq" key="txt-down-btn-wallet-top-ad_cli-1">Monto de saldo</p>
            </li>
          </a>
          <a href="add-to-wallet.php" class="add-to-wallet">
            <li>
              <div class="content-icons">
                <i class="lni lni-plus icon-hov"></i>
              </div>
              <span class="lang_ttrq" key="txt-down-btn-wallet-top-ad_cli-2">Recargue su saldo</span>
            </li>
          </a>
        </ul>
      </div>
      <div class="content-list-history-wallet-ad_cli-ttrk">
        <div class="content-wallet">
          <div class="content-history-wallet">
            <div class="cabecera-wallet lang_ttrq" key="subtitle-table-wallet-ad_cli">Historial de recarga de Saldo</div>
          </div>
        </div>
        <table class="wallet-table">
          <thead>
            <tr>
              <th class="lang_ttrq" key="title-th-wallet-ad_cli-1">#</th>
              <th class="lang_ttrq" key="title-th-wallet-ad_cli-2">Fecha Transacción</th>
              <th class="lang_ttrq" key="title-th-wallet-ad_cli-3">T.Recarga</th>
              <th class="lang_ttrq" key="title-th-wallet-ad_cli-4">Monto</th>
              <th class="lang_ttrq" key="title-th-wallet-ad_cli-5">Cant.Recarga</th>
              <th class="lang_ttrq" key="title-th-wallet-ad_cli-6">Método de Pago</th>
            </tr>
          </thead>
          <tbody id="list_hw_idcliente">
          </tbody>
        </table>
      </div>
    </section>
  </div>
  <script src="./js/dashboard.js"></script>
  <script src="./js/historial_billetera.js"></script>
</body>
</html>
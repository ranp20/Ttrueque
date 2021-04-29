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
<html lang="es">
<head>
  <?php require_once 'includes/manager-header-index.php'; ?>
  <title>Mi Billetera</title>
  <link rel="stylesheet" href="../shop/css/style.css">
</head>
<body class="body-managerpwa mrgtop-57" style="padding-bottom: 3rem;">
  <?php require_once 'includes/headertop-pwa.php'; ?>
  <div class="loader-cli">
    <img src="../shop/images/gifs/shopping-loader.gif" alt="Loading...">
  </div>
  <div class="container-total active">
    <!-- SIDEBAR NAV -->
    <?php require_once 'includes/manager-sidebar-left.php'; ?>
    <!-- CONTENT FULL HISTORY SHIPPINGS  -->
    <section class="content-dash">
      <?php require_once 'includes/manager-header-top.php'; ?>
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
          <a href="manager-add-to-wallet.php" class="add-to-wallet">
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
        <div class="cont-tablelist-wallet">
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
      </div>
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
  <script src="../shop/js/ordenes_pedidos.js"></script>
  <script src="../shop/js/informe_ventas.js"></script>
  <script src="js/actions-pages/manager-historial-billetera.js"></script>
</body>
</html>
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
      
      <div class="bcontent-btns-top" id="contWallet-Btnstop">
        <ul class="bcontent-btns-top--m">
          <a href="javascript:void(0);" class="bcontent-btns-top--m--link">
            <li class="bcontent-btns-top--m--item">
              <div class="bcontent-btns-top--m--item--cImg">
                <img src="images/utilities/currency_ttrueque.jpeg" alt="" >
              </div>
              <div class="bcontent-btns-top--m--item--cDesc">
                <p class="bcontent-btns-top--m--item--cDesc--text"><?php foreach ($d as $val){echo $val['puntos'];}?> <span class="lang_ttrq" key="txt-wallet-btn-top-ad_cli-1">Bikkers</span></p>
                <span class="lang_ttrq bcontent-btns-top--m--item--cDesc--desc" key="txt-down-btn-wallet-top-ad_cli-1">Monto de saldo</span>
              </div>
            </li>
          </a>
          <div class="bcontent-btns-top--m--linkgroup">
            <li class="bcontent-btns-top--m--itemgroup">
              <div class="bcontent-btns-top--m--itemgroup--cImg">
                <img src="images/utilities/recharger_currency_ttrueque.jpeg" alt="" >
              </div>
              <div class="bcontent-btns-top--m--itemgroup--cDesc">
                <a href="add-to-wallet.php" class="bcontent-btns-top--m--itemgroup--cDesc--addlink">
                  <div class="bcontent-btns-top--m--itemgroup--cDesc--cIcon">
                    <i class="lni lni-plus icon-hov"></i>
                  </div>
                  <p class="bcontent-btns-top--m--itemgroup--cDesc--addlink--desc">
                    <span class="lang_ttrq" key="txt-down-btn-wallet-top-ad_cli-2">Recargue su saldo</span>
                    <span>Comprando Bikkers</span>
                  </p>
                </a>
                <!--<a href="../home?goto=queesunbikker" class="bcontent-btns-top--m--itemgroup--cDesc--redirectlink">Qué es un bikker?</a> -->
                <a href="../home#queesunbikker" class="bcontent-btns-top--m--itemgroup--cDesc--redirectlink">Qué es un bikker?</a>
              </div>
            </li>
          </div>
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
  <script type="text/javascript" src="./js/dashboard.js"></script>
  <script type="text/javascript" src="./js/historial_billetera.js"></script>
  <script type="text/javascript">
    $(".bcontent-btns-top--m--itemgroup--cDesc--addlink").hover(function(){
      $(".bcontent-btns-top--m--linkgroup").css({"border": "thin solid red"});
    }, function(){
      $(".bcontent-btns-top--m--linkgroup").css({"border": "thin solid transparent"});
    });
  </script>
</body>
</html>
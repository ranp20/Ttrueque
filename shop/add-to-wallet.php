<?php
session_start();
//error_reporting(0);
require_once '../php/class/all.php';
require_once 'global/config.php';
$c = new All();
$wall = $c->get_wallet();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Comprar más puntos</title>
  <?php require_once 'includes/head.php'; ?>
</head>

<body>
  <div class="container-total active">
    <!-- NAVBAR LEFT -->
    <?php require_once 'includes/sidebar-left.php'; ?>
    <!-- CONTENT ADD-TO-WALLET -->
    <section class="content-dash">
      <?php require_once 'includes/header-top.php'; ?>
      <div class="title-add lang_ttrq" key="title-top-addwallet-cli-ad_cli">Paquetes Premium para Clientes</div>
      <div class="content-list-add-wallet">
        <ul class="options-wallet">
          <?php
          foreach ($wall as $value) {

            $img = $value['image'];

            $str_wallet = $img;
            $str_wallet = mb_convert_encoding($str_wallet, "UTF-8");
            
            $img_path = "../admin/images/recargas/" . $str_wallet;

            echo "
              <li>
                <h3>Monto real: $ {$value['precio']} USD</h3>
                <h1 class='tipe-wallet_recharge'>{$value['tipo']}</h1>
                <div class='img-cont-list-add-wallet'>
                    <div style='background-image:url($img_path);background-repeat:no-repeat;background-size: contain;background-position: center;'>
                    </div>
                </div>
                Monto aproximado en:
                <h1 class='price-wallet_country'>$ {$value['precio']}</h1>
                <p>Carga de puntos: {$value['cap_carga']}</p>
                <a href='check-payment-wallet.php?idwallet={$value['id']}'
                    class='btn-chck-payment-paypal'>Tomar esto
                </a>
              </li>
              ";
          }
          ?>
        </ul>
      </div>
    </section>
  </div>
  <script src="./js/dashboard.js"></script>
</body>
</html>
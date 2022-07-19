<?php
session_start();
//error_reporting(0);
require_once "../php/class/categoria.php";
$c = new Categoria();
$tienda = $c->get_data_tienda($_SESSION['user']);
if (!isset($tienda[1][0]["id_menbresia"])) {
  header('location: ../cliente/menbresia');
}

require_once '../php/class/all.php';
//require_once 'global/config.php';
$c = new All();
$wall = $c->get_wallet();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Comprar más Bikers</title>
  <?php require_once 'includes/head.php'; ?>
</head>
<body class="body-homepwa mrgtop-57" style="padding-bottom: 3rem;">
  <?php require_once '../php/process_header.php'; ?>
  <input type="hidden" id="userid_cli" value="<?php echo $_SESSION['user']; ?>">
  <?php require_once "headertop-pwa.php"; ?>
  <div class="loader-cli">
    <img src="images/gifs/shopping-loader.gif" alt="Loading...">
  </div>
  <div class="container-total active">
    <!-- NAVBAR LEFT -->
    <?php require_once 'includes/sidebar-left.php'; ?>
    <!-- CONTENT ADD-TO-WALLET -->
    <section class="content-dash">
      <?php require_once 'includes/header-top.php'; ?>
      <div class="title-add lang_ttrq">
        <div class="cont-title-add-to-wallet">
          <h3 class="cont-title-add-to-wallet__title" key="title-top-addwallet-cli-ad_cli">Banco de Bikkers</h3>
          <p class="cont-title-add-to-wallet__description"><span key="title-top-addwallet-cli-ad_cli-txt-1">Comprar con dólares:</span> 
            <?php 
                $totalE = count($wall);  
                foreach ($wall as $key => $value) { 
                  if($value['precio'] != 0.00 || $value['precio'] != 0){
                    echo $value['precio'];
                    if($key < $totalE - 1) echo ", ";
                  }
                }
              ?>.</p>
          <p class="cont-title-add-to-wallet__description" key="title-top-addwallet-cli-ad_cli-txt-2">En tu cuenta en Bikkers el monto se duplica automáticamente.</p>
        </div>
    </div>
      <div class="content-list-add-wallet">
        <ul class="options-wallet">
          <?php

          $template = "";

          foreach ($wall as $value) {

            if($value['id'] != 1){

              $img = $value['image'];

              $str_wallet = $img;
              $str_wallet = mb_convert_encoding($str_wallet, "UTF-8");
              
              $img_path = "../admin/images/recargas/" . $str_wallet;

              $template .= "
                <li>
                  <h3><span>Monto real:</span>&nbsp;<span class='price-wallet_country'>$ {$value['precio']}</span></h3>
                  <!--<h1 class='tipe-wallet_recharge'>{$value['tipo']}</h1>
                  <div class='img-cont-list-add-wallet'>
                      <div style='background-image:url($img_path);background-repeat:no-repeat;background-size: contain;background-position: center;'>
                      </div>
                  </div>-->
                  <h2 class='real-price-wallet-usd'> $ {$value['precio']}</h2>
                  <p>Carga de Bikkers: {$value['cap_carga']}</p>
                  <a href='check-payment-wallet.php?idwallet={$value['id']}'
                      class='btn-chck-payment-paypal'>Tomar esto
                  </a>
                </li>
                ";
            }
          }

          foreach ($wall as $value) {

            if($value['id'] == 1){
              $img = $value['image'];

              $str_wallet = $img;
              $str_wallet = mb_convert_encoding($str_wallet, "UTF-8");
              
              $img_path = "../admin/images/recargas/" . $str_wallet;

              $template .= "
                <li class='c-addNewMountIntoWallet'>
                  <a href='custom-payment.php?idwallet={$value['id']}' class='c-addNewMountIntoWallet--cLink'>
                    <div class='c-addNewMountIntoWallet--cLink--cIcon'>
                      <i class='lni lni-plus icon-hov'></i>
                    </div>
                    <div class='c-addNewMountIntoWallet--cLink--cTitle'>
                      <h3>Otro Monto</h3>
                    </div>
                  </a>
                </li>
                ";
            }
          }

          echo $template;

          ?>
        </ul>
      </div>
    </section>
  </div>
  <?php require_once 'tabsbottom-pwa.php'; ?>
  <script type="text/javascript" src="./js/dashboard.js"></script>
  <script type="text/javascript" src="js/buy-cart.js"></script>
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
</body>
</html>
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
                <p>Carga de Bikers: {$value['cap_carga']}</p>
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
  <?php require_once 'tabsbottom-pwa.php'; ?>
  <script src="./js/dashboard.js"></script>
  <script src="js/buy-cart.js"></script>
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
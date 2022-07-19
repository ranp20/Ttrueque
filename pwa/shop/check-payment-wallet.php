<?php
session_start();

require_once "../php/class/categoria.php";
$c = new Categoria();
$tienda = $c->get_data_tienda($_SESSION['user']);
if (!isset($tienda[1][0]["id_menbresia"])) {
   header('location: ../cliente/menbresia');
}

$title = "Completar compra";

$id_cli = $_SESSION['user'];
require_once '../php/class/purchase_points.php';
//require_once 'global/config.php';

//print_r($_GET);
if(!isset($_GET['idwallet']) || !is_numeric($_GET['idwallet']) || $_GET['idwallet'] == ""){
  header('location: ./');
}


?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Comprar más Bikers</title>
  <?php require_once 'includes/head.php'; ?>
</head>
<style>
  /* Media query for mobile viewport */
  @media screen and (max-width: 400px) {
    #paypal-button-container {
      width: 100%;
    }
  }

  /* Media query for desktop viewport */
  @media screen and (min-width: 400px) {
    #paypal-button-container {
      width: 250px;
    }
  }
</style>
<?php 

require_once '../php/class/credentials.php';
$cred_adm = new Credentials();
$data_cred = $cred_adm->get_credentials();

//Datos para solicitar las credenciales de accesso..
$_ClientID = $data_cred[0]['key_public'];
$_Secret = $data_cred[0]['key_secret'];

//echo "<input id='clientIDwallet_paypal' type='hidden' value='$_ClientID'>";

 ?>
<body class="body-homepwa mrgtop-57" style="padding-bottom: 3rem;">
  <?php require_once '../php/process_header.php'; ?>
  <input type="hidden" id="userid_cli" value="<?php echo $_SESSION['user']; ?>">
  <?php require_once "headertop-pwa.php"; ?>
  <div class="loader-cli">
    <img src="images/gifs/shopping-loader.gif" alt="Loading...">
  </div>
  <div class="container-total active">
    <input id='clientIDwallet_paypal' type='hidden' value='<?php echo $_ClientID; ?>'>
    <!-- NAVBAR LEFT -->
    <?php require_once './includes/sidebar-left.php'; ?>
    <!-- CONTENT ADD-TO-WALLET -->
    <section class="content-dash">
      <?php require_once 'includes/header-top.php'; ?>
      <!--- --- /CONTENT BUTTON PAYMENT WITH PAYPAL --- --->
      <div class="content-about-to-pay">
        <input type="hidden" name="select_wallet" id="select_wallet" value="<?php print_r($_GET['idwallet']); ?>">
        <input type="hidden" name="id_cliente" id="id_cliente" value="<?php echo $id_cli; ?>">
        <input type="hidden" name="ssid_cli" id="ssid_cli" value='<?php echo session_id(); ?>'>
        <h1 class="lang_ttrq" key="title-checkwallet-cli-ad_cli-1">¡ Paso Final !</h1>
        <p class="about-text-parr-one lang_ttrq" key="title-checkwallet-cli-ad_cli-2">Estás a punto de pagar con Paypal la cantidad de:</p>
        <h3 class='price_wallet_USD'></h3>
        <input type="hidden" class="price_wallet">
        <div class="cont-btn-paypal-upd-wallet">
          <!-- /BUTTON FOR PAYPAL-->
        </div>
        <p class="about-text-parr-two"><span class="lang_ttrq" key="title-checkwallet-cli-ad_cli-3">Para la recarga de </span><strong class='cap_carga_wallet'></strong><span class="lang_ttrq" key="title-checkwallet-cli-ad_cli-4"> Bikers.</span></p>
        <p class="about-text-parr-three lang_ttrq" key="title-checkwallet-cli-ad_cli-5">Tu billetera se recargará automáticamente una vez se procese el pago.</p>
        <p class="about-text-parr-four lang_ttrq" key="title-checkwallet-cli-ad_cli-6">(Para más información: megarejo777666@gmail.com)</p>
      </div>
      <!--- --- /END  --- --->
    </section>
  </div>
  <?php require_once 'tabsbottom-pwa.php'; ?>
  <!-- //SCRIPT FOR PAYPAL-->
  <script type="text/javascript" src="https://www.paypalobjects.com/api/checkout.js"></script>
  <script type="text/javascript" src="./js/dashboard.js"></script>
  <script type="text/javascript" src="./js/billetera.js"></script>
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
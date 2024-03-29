<?php
session_start();

require_once "../php/class/categoria.php";
$c = new Categoria();
$tienda = $c->get_data_tienda($_SESSION['user']);
if (!isset($tienda[1][0]["id_menbresia"])) {
   header('location: ../cliente/menbresia');
}

$id_cli = $_SESSION['user'];
require_once '../php/class/purchase_points.php';

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

 ?>
<body>
  <div class="container-total active">
    <input id='clientIDwallet_paypal' type='hidden' value='<?php echo $_ClientID; ?>'>
    <!-- NAVBAR LEFT -->
    <?php require_once './includes/sidebar-left.php'; ?>
    <!-- CONTENT ADD-TO-WALLET -->
    <section class="content-dash">
      <?php require_once 'includes/header-top.php'; ?>
      <!--- --- /CONTENT BUTTON PAYMENT WITH PAYPAL --- --->
      <div class="cCustom-PaymentBikkers">
        <input type="hidden" name="select_wallet" id="select_wallet" value="<?php print_r($_GET['idwallet']); ?>">
        <input type="hidden" name="id_cliente" id="id_cliente" value="<?php echo $id_cli; ?>">
        <input type="hidden" name="ssid_cli" id="ssid_cli" value='<?php echo session_id(); ?>'>
        <div class="cCustom-PaymentBikkers--c">
          <h1 class="cCustom-PaymentBikkers--c--title lang_ttrq" key="title-checkwallet-cli-ad_cli-1">¡ Paso Final !</h1>
          <div class="cCustom-PaymentBikkers--c--frm">
            <!--<p class="cCustom-PaymentBikkers--c--frm--labelIptrecharge">Ingresa la cantidad de Bikkers a recargar</p>-->
            <input type="number" id="val-inputIptrecharge" class="val-inputIptrecharge cCustom-PaymentBikkers--c--frm--valIptrecharge" maxlength="9999999999" minlength="0" placeholder="Ingresa la cantidad de Bikkers">
            <p class="cCustom-PaymentBikkers--c--frm--labelIptrecharge">Estas a punto de pagar con paypal la cantidad de:</p>
            <h1 class="cCustom-PaymentBikkers--c--frm--valreturnRecharge">
              <span class="cCustom-PaymentBikkers--c--frm--valreturnRecharge--prefixSig"></span>
              <span id="val-txtreturnRecharge" class="val-txtreturnRecharge">0.00</span>
              <span class="cCustom-PaymentBikkers--c--frm--valreturnRecharge--prefixLetters"></span>
            </h1>
            <div class="cont-btn-paypal-custom-payment">
              <!-- /BUTTON FOR PAYPAL-->
            </div>
            <p class="cCustom-PaymentBikkers--c--frm--txtbottom1 lang_ttrq" key="title-checkwallet-cli-ad_cli-5">Tu billetera se recargará automáticamente una vez se procese el pago.</p>
          </div>
          <p class="cCustom-PaymentBikkers--c--txtbottom2 lang_ttrq" key="title-checkwallet-cli-ad_cli-6">(Para más información: megarejo777666@gmail.com)</p>
        </div>
      </div>
      <!--- --- /END  --- --->
    </section>
  </div>
  <!-- //SCRIPT FOR PAYPAL-->
  <script type="text/javascript" src="https://www.paypalobjects.com/api/checkout.js"></script>
  <script type="text/javascript" src="./js/dashboard.js"></script>
  <script type="text/javascript" src="./js/custom-payment.js"></script>
</body>
</html>
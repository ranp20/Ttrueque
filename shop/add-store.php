<?php
session_start();
error_reporting(0);

if (!isset($_SESSION['user'])) {
    header('location: ../../../account');
}

require_once '../php/class/client.php';
$c = new Client();
$d = $c->get_data_by_id($_SESSION['user']);

$title = "Agregar tienda";
include "./head/head.php";

$tiendaactual = $d[0]['tienda'];

require_once '../php/class/credentials.php';
$cred_adm = new Credentials();
$data_cred = $cred_adm->get_credentials();

//Datos para solicitar las credenciales de accesso..
$_ClientID = $data_cred[0]['key_public'];
$_Secret = $data_cred[0]['key_secret'];

echo "<input id='clientID_paypal' type='hidden' value='$_ClientID'>";


?>
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
<!--<input id='clientID_paypal' type='hidden' value='<?php //echo $_ClientID;?>'>-->
<div class="contModalGuidettrk-step-two"></div>
<div class="contModalGuidettrk-step-three"></div>
<div class="msg-respMessage">
  <div class="contloaderMessage">
    <div class="contloaderMessage__loader"></div>
  </div>
</div>
<input type="hidden" id="userid_cli" value="<?php echo $_SESSION['user']; ?>">
<div class="container-t-add-store_ttrq">
  <div class="content-principal-add-store_ttrq">
    <div class="content-left-options-buttons">
      <input id="strvalidate_memb" type="hidden" value="<?php echo $tiendaactual; ?>">
      <div style="background-image: url(../../../img/logo/Logo_TTRK.png);"></div>
    </div>
    <!--<input type="text" id="estadomemb">-->
    <div class="content-right-inputs">
      <?php
      if ($_SESSION['idtienda_m']) { ?>
        <form id="form-store" method="POST">
          <input type="hidden" id="menbresia" name="menbresia" value="<?php echo $_GET["prod"]; ?>">
          <input type="hidden" id="client" name="client" value="<?php echo $d[0]["id_cliente"]; ?>">
          <input type="hidden" id="id_memb" name="id_memb" value="<?php echo $_GET['memb']; ?>">
          <input type="hidden" class="precio_memb">
          <input type="hidden" value="<?php echo session_id(); ?>">
        </form>
        <div class="content-buton-paypal-payment">
          <h3>Métodos de Pago</h3>
          <!---<div id="paypal-button-container"></div>-->
          <div class="content-buton-paypal-payment">
            <div class="cnt-payments-method">

            </div>
          </div>
        </div>
      <?php } else { ?>
        <form class="form-store" id="form-store" method="POST">
          <div class="content-controls-radio_add-store" id="rd-types">
            <div>
              <input type="radio" name="tipo_cliente" id="inlineRadio1" value="pers_natural">
              <label for="inlineRadio1">Persona Natural</label>
            </div>
            <div>
              <input type="radio" name="tipo_cliente" id="inlineRadio2" value="pers_natural_negocio">
              <label for="inlineRadio2">Persona Natural con Negocio</label>
            </div>
            <div>
              <input type="radio" name="tipo_cliente" id="inlineRadio3" value="empresa">
              <label for="inlineRadio3">Empresa</label>
            </div>
          </div>
          <input type="hidden" id="menbresia" name="menbresia" value="<?php echo $_GET["prod"]; ?>">
          <input type="hidden" id="client" name="client" value="<?php echo $d[0]["id_cliente"]; ?>">
          <input type="hidden" id="id_memb" name="id_memb" value="<?php echo $_GET['memb']; ?>">
          <input type="hidden" class="precio_memb">
          <input type="hidden" class="sess_id_client" value="<?php echo session_id(); ?>">
          <h3>Registro de Datos</h3>
          <div id="tipos"></div>
           
        </form>
        <div class="content-buton-paypal-payment">
          <div class="cnt-payments-method">

          </div>
        </div>
      <?php } ?>

    </div>
  </div>
</div>
<!-- //SCRIPT FOR PAYPAL-->
<script type="text/javascript" src="https://www.paypalobjects.com/api/checkout.js"></script>
<script type="text/javascript" src="../../../shop/js/store.js"></script>
<script type="text/javascript" src="../../../shop/js/membresia.js"></script>
<script type="text/javascript" src="../../../shop/js/language_currency.js"></script>
<!-- SWEEET ALERT 2-->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript" src="../../../shop/js/paypay.js"></script>
<script type="text/javascript" src="../../../shop/js/customs.js"></script>
</body>

</html>
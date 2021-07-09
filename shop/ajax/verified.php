<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('location: ../../account');
}

require_once '../../php/class/credentials.php';
$cred_adm = new Credentials();
$data_cred = $cred_adm->get_credentials();


//Datos para solicitar las credenciales de accesso..
$_ClientID = $data_cred[0]['key_public'];
$_Secret = $data_cred[0]['key_secret'];

//LOGUEARSE PARA LA SOLICITUD DE DATOS - CURL...
$login = curl_init("https://api.sandbox.paypal.com/v1/oauth2/token");
//Devolver la información solicitada...
curl_setopt($login, CURLOPT_RETURNTRANSFER, TRUE);
//Acceder a la información con el ID y la clave secreta...
curl_setopt($login, CURLOPT_USERPWD, $_ClientID.":".$_Secret);
//Solicitar información vía 'POST' para que nos dé las credenciales... 
curl_setopt($login, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
//Ejecutar la CURL
$response = curl_exec($login);
//cONVERTIR A UN OBJETO RESPUESTA...
$objresponse = json_decode($response);

//print_r($objresponse);
//Obtener el 'AccesToken'...
$AccessToken = $objresponse->access_token;

//Impimir la respuesta
//print_r($AccessToken);
//Consultar la información del pago...
$venta = curl_init("https://api.sandbox.paypal.com/v1/payments/payment/".$_GET['paymentID']);
//Envío de información...
curl_setopt($venta, CURLOPT_HTTPHEADER, array("Content-Type: application/json","Authorization: Bearer ".$AccessToken));
//Almacenar la información en la variable respuesta venta...
curl_setopt($venta, CURLOPT_RETURNTRANSFER, TRUE);
//Respuesta de Venta...
$responsesale=curl_exec($venta);
//Imprimir la respuesta de la venta...
//print_r(json_decode($responsesale));
//Convertir respuesta de venta a un objeto...
$objDatosTransaccion = json_decode($responsesale); 
//Imprimir el objeto...
//print_r($objDatosTransaccion->payments[0]->payer->payment_method);
//Imprimir los datos de la transacción...
$state = $objDatosTransaccion->payments[0]->state;
$email = $objDatosTransaccion->payments[0]->payer->payer_info->email;
$total= $objDatosTransaccion->payments[0]->transactions[0]->amount->total;
$currency = $objDatosTransaccion->payments[0]->transactions[0]->amount->currency;
$custom = $objDatosTransaccion->payments[0]->transactions[0]->custom;
$payment_method = $objDatosTransaccion->payments[0]->payer->payment_method;


$clave = explode("#", $custom);

//DATOS A INSERTAR...
$SID = $clave[0]; //session_id()
$ClaveVenta = $clave[1]; //id_wallet
$id_client = $_SESSION['user']; //id_cliente
//echo $SID." - ".$ClaveVenta;

curl_close($venta);
curl_close($login);

//Validar si el pago es aprobado...
if($state == "approved"){

  $mensajePaypal = "El pago ha sido aprobado";

  require_once '../../php/class/connection.php';
  class Insert_Update_Wallet extends Connection
  {

    function update_insert($SID, $responsesale, $payment_method)
    {
      
      $arr_pay_wallet = [
        "id_wallet" => $_POST['id_wallet'],
        "id_client" => $_POST['idclient'],
        "pass_trans" => $SID,
        "paypal_data" => $responsesale,
        "status" => 'Completado',
        "payment_method" => $payment_method,
        "amount_recharge" => $_POST['amount_recharge'],
        "quantity_recharge" => $_POST['quantity_recharge'],
      ];

      try {
        $sql = "CALL add_purchasepoints(:id_wallet,:id_client,:pass_trans,:paypal_data,:status,:payment_method,:amount_recharge,:quantity_recharge)";
        $stm = $this->con->prepare($sql);
        foreach ($arr_pay_wallet as $key => $val) {
            $stm->bindValue($key, $val);
        }
        $stm->execute();
        $var = $stm->fetchAll(PDO::FETCH_ASSOC);
        $res = json_decode($var);
        echo $res;

      } catch (PDOException $e) {
        return $e->getMessage();
      }
    }
  }
  
  $cualquiera = new Insert_Update_Wallet();
  echo $cualquiera->update_insert($SID, $responsesale, $payment_method);

}else{
  $mensajePaypal = "Hubo un error al procesar el pago";
}
<?php
session_start();

if (!isset($_SESSION['user'])) {
  header('location: ../../account');
}
require_once '../../php/class/client.php';
$c = new Client();
$d = $c->get_data_by_id($_SESSION['user']);

require_once '../../php/class/credentials.php';
$cred_adm = new Credentials();
$data_cred = $cred_adm->get_credentials();

$title = "Agregar tienda";
include "../head/head.php";

//Datos para solicitar las credenciales de accesso..
$_ClientID = $data_cred[0]['key_public'];
$_Secret = $data_cred[0]['key_secret'];

//LOGUEARSE PARA LA SOLICITUD DE DATOS - CURL...
$login = curl_init("https://api.sandbox.paypal.com/v1/oauth2/token");
//Devolver la información solicitada...
curl_setopt($login, CURLOPT_RETURNTRANSFER, TRUE);
//Acceder a la información con el ID y la clave secreta...
curl_setopt($login, CURLOPT_USERPWD, $_ClientID . ":" . $_Secret);
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
$venta = curl_init("https://api.sandbox.paypal.com/v1/payments/payment/" . $_GET['paymentID']);
//Envío de información...
curl_setopt($venta, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Authorization: Bearer " . $AccessToken));
//Almacenar la información en la variable respuesta venta...
curl_setopt($venta, CURLOPT_RETURNTRANSFER, TRUE);
//Respuesta de Venta...
$responsesale = curl_exec($venta);
//Imprimir la respuesta de la venta...
//print_r(json_decode($responsesale));
//Convertir respuesta de venta a un objeto...
$objDatosTransaccion = json_decode($responsesale);
//Imprimir el objeto...
//print_r($objDatosTransaccion->payments[0]->payer->payment_method);
//Imprimir los datos de la transacción...
$state = $objDatosTransaccion->payments[0]->state;
$email = $objDatosTransaccion->payments[0]->payer->payer_info->email;
$total = $objDatosTransaccion->payments[0]->transactions[0]->amount->total;
$currency = $objDatosTransaccion->payments[0]->transactions[0]->amount->currency;
$custom = $objDatosTransaccion->payments[0]->transactions[0]->custom;
$payment_method = $objDatosTransaccion->payments[0]->payer->payment_method;


$clave = explode("#", $custom);

// //DATOS A INSERTAR...
$SID = $clave[0]; //session_id()
$ClaveVenta = $clave[1]; //id_tienda
$id_client = $_SESSION['user']; //id_cliente

//echo $id_client;

curl_close($venta);
curl_close($login);

//Validar si el pago es aprobado...

if ($state == "approved") {

  $mensajePaypal = "Su pago se ha completado correctamente";


  require_once '../../php/class/connection.php';
  //1. PRIMERA NSERCIÓN EN LA TABLA 'tienda'...
  class Insert_Sales_Report extends Connection
  {

    function insertar($SID, $responsesale, $payment_method)

    {

      $tienda = $_POST['store_sr'];
      $month = $_POST['month_sr'];
      $year = $_POST['year_sr'];

      $arr_pay_sr = [
        "month" => $_POST['month_sr'],
        "year" => $_POST['year_sr'],
        "idtienda" => $_POST['store_sr'],
      ];

      try {
        $sql = "CALL update_estado_sr_carrito (:month,:year,:idtienda)";
        $stm = $this->con->prepare($sql);
        foreach ($arr_pay_sr as $key => $value) {
          $stm->bindValue($key, $value);
        }

        $stm->execute();
        $var = $stm->fetchAll(PDO::FETCH_ASSOC);
        //print_r($var[0]);


        $arr_info = [
          "month" => $month,
          "year" => $year,
          "idtienda" => empty($_SESSION['idtienda_m']) ? $tienda : $_SESSION['idtienda_m'],
          "pass_trans" => $SID,
          "paypal_data" => $responsesale,
          "status" => 'Completado',
          "payment_method" => $payment_method
        ];

        //print_r($arr_info);
        //2. SEGUNDA INSERCIÓN EN LA TABLA 'payment_discount'...

        try {
          $sql = "CALL add_payment_discount(:month,:year,:idtienda,:pass_trans,:paypal_data,:status,:payment_method)";
          $stm = $this->con->prepare($sql);
          foreach ($arr_info as $key => $val) {
            $stm->bindValue($key, $val);
          }
          $stm->execute();
          $var = $stm->fetchAll(PDO::FETCH_ASSOC);
          $res = json_encode($var[0]);
          echo $res;
          //print_r($var[0]);

        } catch (PDOException $e) {
          return $e->getMessage();
        }
      } catch (PDOException $e) {
        // return $e->getMessage();
        echo $e->getMessage();
      }
    }
  }
  $cualquiera = new Insert_Sales_Report();
  echo $cualquiera->insertar($SID, $responsesale, $payment_method);
  //header('location: index.php');
} else {
  $mensajePaypal = "Hubo un error al procesar el pago";
}
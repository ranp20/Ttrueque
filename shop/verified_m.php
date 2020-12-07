<?php
session_start();
//error_reporting(0);

if (!isset($_SESSION['user'])) {
    header('location: ../../account');
}
require_once '../php/class/client.php';
$c = new Client();
$d = $c->get_data_by_id($_SESSION['user']);

$title = "Agregar tienda";
include "./head/head.php";

//Datos para solicitar las credenciales de accesso..
$_ClientID = "AQVFe-A48rplP6e_4o3mWdRYthEQK18ZepJD7qWaXZSOGvd85a6_fcYcDjtIkS-YpgL1CFEW4F8yVGfO";
$_Secret = "EM-xMqAxdZGXJoKnv_7cNP__RcQiPIKUN6ISN3sUap2NFmLD-x72ThXJVVhJ0YNVDAh_QxsAKYwLyLri";

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

curl_close($venta);
curl_close($login);

//Validar si el pago es aprobado...

if ($state == "approved") {

    $mensajePaypal = "Su pago se ha completado correctamente";


    require_once '../php/class/connection.php';

    //1. PRIMERA NSERCIÓN EN LA TABLA 'tienda'...
    class Insert_Store extends Connection
    {

        function insertar($SID, $responsesale, $payment_method)

        {
            $arr_store = [
                "tipo_cliente" => empty($_REQUEST["tipo_cliente"]) ? "No definido" : $_REQUEST["tipo_cliente"],
                "name" => empty($_REQUEST["name"]) ? "No definido" : $_REQUEST["name"],
                "tipo_documento" => empty($_REQUEST["tipo_documento"])  ? "No definido" : $_REQUEST["tipo_documento"],
                "num_doc" => empty($_REQUEST["num_doc"])  ? "No definido" : $_REQUEST["num_doc"],
                "razon_social" =>  empty($_REQUEST["razon_social"]) ? "No definido" : $_REQUEST["razon_social"],
                "ruc" => empty($_REQUEST["ruc"])  ? "No definido" : $_REQUEST["ruc"],
                "nombre_contacto" => empty($_REQUEST["nombre_contacto"]) ? "No definido" : $_REQUEST["nombre_contacto"],
                "menbresia" => empty($_REQUEST["menbresia"]) ? "0" : $_REQUEST["menbresia"],
                "client" => empty($_REQUEST["client"]) ? "0" : $_REQUEST["client"],
                "idtienda" => empty($_SESSION['idtienda_m']) ? 0 : $_SESSION['idtienda_m']

            ];
            try {
                $sql = "CALL add_tienda (:tipo_cliente,:name,:tipo_documento,:num_doc,:razon_social,:ruc,:nombre_contacto,:menbresia,:client,:idtienda)";
                $stm = $this->con->prepare($sql);
                foreach ($arr_store as $key => $value) {
                    $stm->bindValue($key, $value);
                }

                $stm->execute();

                // return $stm->fetchAll(PDO::FETCH_ASSOC);
                $var =   $stm->fetchAll(PDO::FETCH_ASSOC);
                $idtienda =   $var[0]["id"];
                $arr_info = [
                    "id_memb" => $_REQUEST["id_memb"],
                    "id_tienda" => empty($_SESSION['idtienda_m']) ? $idtienda : $_SESSION['idtienda_m'],
                    "pass_trans" => $SID,
                    "paypal_data" => $responsesale,
                    "status" => 'Completado',
                    "payment_method" => $payment_method
                ];

                //2. SEGUNDA INSERCIÓN EN LA TABLA 'purchasemembership'...
                ///comentado hoy

                try {
                    $sql = "CALL add_purchasemembership(:id_memb,:id_tienda,:pass_trans,:paypal_data,:status,:payment_method)";
                    $stm = $this->con->prepare($sql);
                    foreach ($arr_info as $key => $val) {
                        $stm->bindValue($key, $val);
                    }
                    $stm->execute();

                    echo  $stm = "inserto";
                } catch (PDOException $e) {
                    return $e->getMessage();
                }

                //return $stm->rowCount() > 0 ? "true" : "false";
            } catch (PDOException $e) {
                // return $e->getMessage();
                echo $e->getMessage();
            }
        }
    }
    $cualquiera = new Insert_Store();
    echo $cualquiera->insertar($SID, $responsesale, $payment_method);
    //header('location: index.php');
} else {
    $mensajePaypal = "Hubo un error al procesar el pago";
}

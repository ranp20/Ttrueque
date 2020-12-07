<?php 

//*SEGUNDO MÉTODO*//
$idclientqr = $_POST['idclientqr'];//Recibo la variable pasada por post
$textqr = $_POST['textqr'];//Recibo la variable pasada por post
$sizeqr = $_POST['sizeqr'];//Recibo la variable pasada por post
$nameqr = $_POST['name'];//Recibo la variable pasada por post
$lastnameqr = $_POST['lastname'];//Recibo la variable pasada por post
$pointsqr = $_POST['puntos'];//Recibo la variable pasada por post

include('../../vendor/autoload.php');//Llamare el autoload de la clase que genera el QR
use Endroid\QrCode\QrCode;
 
$qrCode = new QrCode($idclientqr.'/'.$nameqr.','.$lastnameqr.'/'.$pointsqr);//Creo una nueva instancia de la clase
$qrCode->setSize($sizeqr);//Establece el tamaño del qr
//header('Content-Type: '.$qrCode->getContentType());
$image = $qrCode->writeString();//Salida en formato de texto 
 
$imageData = base64_encode($image);//Codifico la imagen usando base64_encode
 
echo '<div class="cont-qrgeneratecli" id="cont-qrgeneratecli">
				<div class="cont-qrcode-client">
					<img src="data:image/png;base64,'.$imageData.'">
				</div>
				<div class="cont-download-qrcodecli">
					<a class="btn btn-success" href="data:image/png;base64,'.$imageData.'" download="'.$idclientqr.'/'.$nameqr.','.$lastnameqr.'/'.$pointsqr.'">Descargar QR<i class="fa fa-download"></i></a>
				</div>
			</div>';



//*PRIMER MÉTODO*//

// if(isset($_POST) && !empty($_POST)) {

// include('../library/phpqrcode/qrlib.php'); 
 
// $image_location = "../images/qrcodes/";

// $image_name = date('d-m-Y-h-i-s').'.png';

// $dataContent = $_POST['dataContent'];
// $ecc = $_POST['ecc'];
// $size = $_POST['size'];

// // generating the QR code
// QRcode::png($dataContent, $image_location.$image_name, $ecc, $size); 

// // displaying the QR code on the web page
// echo '<img class="img-thumbnail" src="admin/'.$image_location.$image_name.'" />';

// } else {
//     header('location:./');
// }
<?php 
$idclientqr = $_POST['idclientqr'];//Recibo la variable pasada por post
$textqr = $_POST['textqr'];//Recibo la variable pasada por post
$sizeqr = $_POST['sizeqr'];//Recibo la variable pasada por post
$nameqr = $_POST['name'];//Recibo la variable pasada por post
$lastnameqr = $_POST['lastname'];//Recibo la variable pasada por post
$pointsqr = $_POST['puntos'];//Recibo la variable pasada por post

/*
// ------------ USANDO LIBRERÍA: QR-CODE

require '../../vendor/autoload.php';//Llamare el autoload de la clase que genera el QR
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
*/

// ------------ USANDO LIBRERÍA: PHP QR CODE
require_once '../../vendor/autoload.php';

require_once '../../vendor/chillerlan/php-qrcode/src/QRCode.php';
require_once '../../vendor/chillerlan/php-qrcode/src/QROptions.php';
require_once '../../vendor/chillerlan/php-qrcode/src/QRCodeException.php';

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use chillerlan\QRCode\Common\EccLevel;
use chillerlan\QRCode\Data\QRMatrix;
use chillerlan\QRCode\Output\QROutputInterface;
use chillerlan\QRCode\Output\QRGdImage;

$r = "";
if(isset($_POST) && count($_POST) != 0){

	$data = $idclientqr.'/'.$nameqr.','.$lastnameqr.'/'.$pointsqr;

	$options = new QROptions;
	// $options->version          = 9;
	$options->readerUseImagickIfAvailable = false;
	$options->readerGrayscale 						= true;
	$options->readerIncreaseContrast 			= true;
	// $options->outputType       						= QROutputInterface::IMAGICK;
	// $options->outputType       						= QRCode::OUTPUT_MARKUP_SVG;
	// $options->outputType       						= QROutputInterface::GDIMAGE_JPG;
	// $options->outputType       						= QROutputInterface::GDIMAGE_PNG;
	$options->eccLevel         						= QRCode::ECC_H;
	$options->outputInterface  						= QRCodeLogo::class;
	$options->imageBase64      						= true;
	$options->logoSpaceWidth   						= 10;
	$options->logoSpaceHeight  						= 10;
	$options->scale  					 						= 10;

	try{
		$qrBase64 = (new QRCode($options))->render($data);
		
		$tmpQr = '<div class="cont-qrgeneratecli" id="cont-qrgeneratecli">
				<div class="cont-qrcode-client">
					<img src="'.$qrBase64.'" alt="'.$data.'" class="img-fluid">
				</div>
				<div class="cont-download-qrcodecli">
					<a class="btn btn-success" href="'.$qrBase64.'" download="'.$idclientqr.'/'.$nameqr.','.$lastnameqr.'/'.$pointsqr.'" title="DESCARGAR QR" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="DESCARGAR QR" id="btnDownloadQrCode">
						<span>DESCARGAR QR</span>
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" version="1.1" viewBox="0 0 700 700"><g xmlns="http://www.w3.org/2000/svg"><path d="m350 408.24 150.08-189.28v-0.55859h-96.316v-204.4h-107.52v204.4h-96.316v0.55859z"/><path d="m505.12 372.4v101.92h-310.24v-101.92h-71.68v173.6h453.6v-173.6z"/></g></svg>
					</a>
				</div>
			</div>';

		$r = array(
			"type" => "success",
			"res" => $tmpQr
		);
	}catch(Throwable $e){
		echo $e->getMessage();
	}
}else{
	$r = array(
		"type" => "error",
		"res" => ""
	);
}
die(json_encode($r));
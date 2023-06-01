<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Trueque | Page Three</title>
  <?php require_once 'header_links-home.php';?>
</head>
<body>
	<?php require_once './presentacion_header_texto_b.php';?>
	<div class="c-sectMain box-redx">
		<div class="c-sectMain__cgri">
			<h3 class="c-sectMain__cgri__title">MEDIOS DE PAGO</h3>
			<div class="c-sectMain__cgri__cSteps">
				<div class="c-sectMain__cgri__cSteps__itm">
					<p><strong>LECTOR QR</strong>: Para comprar o vender en los establecimientos físicos, el usuario dispondrá de un lector QR, el que podrá descargar de Play Store, aplicativo "Ttrueque - Lector QR".</p>
					<img src="<?= $url;?>assets/img/Utilities/img_txt3_1.jpg" alt="icon_descriptive_page-three" class="img-fluid" width="100" height="100">
				</div>
				<div class="c-sectMain__cgri__cSteps__itm">
					<p><strong>TARGETA TTRUEQUE</strong>: El usuario dispondrá de una targeta para comprar con facilidad en los negocios o tiendas físicas.</p>
					<img src="<?= $url;?>assets/img/Utilities/img_txt3_2.jpg" alt="icon_descriptive_page-three" class="img-fluid" width="100" height="100">
				</div>
				<div class="c-sectMain__cgri__cSteps__itm">
					<p><strong>EN LÍNEA</strong>: En Ttrueque sección Tiendas, el usuario podrá comprar y vender en línea; así como en el aplicativo "Ttrueque - Negocios sin Límites".</p>
					<img src="<?= $url;?>assets/img/Utilities/img_txt3_3.jpg" alt="icon_descriptive_page-three" class="img-fluid" width="100" height="100">
				</div>
			</div>
		</div>
	</div>
	<div id="toTopgobtn"></div>
</body>
</html>
<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Trueque | Page Four</title>
  <?php require_once 'header_links-home.php';?>
</head>
<body>
	<?php require_once './presentacion_header_texto_b.php';?>
	<div class="c-sectMain box-redx">
		<div class="c-sectMain__cgri">
			<h3 class="c-sectMain__cgri__title">ADMINISTRACIÓN DE CUENTA</h3>
			<div class="c-sectMain__cgri__cSteps">
				<div class="c-sectMain__cgri__cSteps__itm">
					<p><strong>Mensualmente</strong> el Usuario tendrá acceso a su estado de cuenta; y pagará por la Administración de Cuenta el 8% del monto vendido en Bikkers.</p>
					<img src="<?= $url;?>assets/img/Utilities/img_txt4_1.jpg" alt="icon_descriptive_page-four" class="img-fluid" width="100" height="100">
				</div>
				<div class="c-sectMain__cgri__cSteps__itm">
					<p><strong>El pago</strong> deberá realizarlo en dólares o su equivalente en moneda nacional a travéz de Paypal, Visa, Mastercart o depósito bancario.</p>
					<img src="<?= $url;?>assets/img/Utilities/img_txt4_2.jpg" alt="icon_descriptive_page-four" class="img-fluid" width="100" height="100">
				</div>
				<div class="c-sectMain__cgri__cSteps__itm">
					<p><strong>La puntualidad</strong> en el pago por Administración de Cuenta evitará el bloqueo automático y asegurará que no se pierdan ventas o compras.</p>
					<img src="<?= $url;?>assets/img/Utilities/img_txt4_3.jpg" alt="icon_descriptive_page-four" class="img-fluid" width="100" height="100">
				</div>
			</div>
		</div>
	</div>
	<div id="toTopgobtn"></div>
</body>
</html>
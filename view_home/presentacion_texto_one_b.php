<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Trueque | Page One</title>
  <?php require_once 'header_links-home.php';?>
</head>
<body>
	<?php require_once './presentacion_header_texto_b.php';?>
	<div class="c-sectMain box-redx">
		<section class="c-sectMain__c">
			<h2 class="c-sectMain__c__title">Es gratuito abrir una cuenta en Ttrueque</h5>
			<div class="c-sectMain__c__cCards">
				<div class="c-sectMain__c__cCards__i">
					<div class="c-sectMain__c__cCards__i__cIcon">
						<img  src="img/banners/enterprise-team-glory.png" alt="icon_banner_page-one" class="img-fluid" width="100" height="100">
					</div>
					<div class="c-sectMain__c__cCards__i__cDesc">
						<h3>Empresa</h3>
						<p>Vende y Compra sin Dinero.</p>
						<a href="account" title="Registrarse">Registrate sin costo</a>
					</div>
				</div>
				<div class="c-sectMain__c__cCards__i">
					<div class="c-sectMain__c__cCards__i__cIcon">
						<img  src="img/banners/women-bussiness-happy.png" alt="icon_banner_page-one" class="img-fluid" width="100" height="100">
					</div>
					<div class="c-sectMain__c__cCards__i__cDesc">
						<h3>Personal</h3>
						<p>Vende y Compra sin Dinero.</p>
						<a href="account" title="Registrarse">Registrate sin costo</a>
					</div>
				</div>
			</div>
		</section>
		<section class="c-sectMain__c">
			<h2 class="c-sectMain__c__title">NOTABLES BENEFICIOS</h2>
			<div class="c-sectMain__c__cflx">
				<div class="c-sectMain__c__cflx__i">
					<h3 class="c-sectMain__c__cflx__i__title">AL VENDER</h3>
					<div class="c-sectMain__c__cflx__i__cDesc">
						<p>Tu ganancia se incrementa automáticamente. El monto de tu venta se registrará en tu cuenta con el 20% adicional.</p>
						<div class="c-sectMain__c__cflx__i__cDesc__cIcon">
							<img  src="img/Utilities/carrito_cdr_ttrq.jpg" alt="backgr_img_ttrq_01" class="img-fluid" width="100" height="100">
						</div>
					</div>
				</div>
				<div class="c-sectMain__c__cflx__i">
					<h3 class="c-sectMain__c__cflx__i__title">AL COMPRAR</h3>
					<div class="c-sectMain__c__cflx__i__cDesc">
						<p>Cuando compres en los establecimientos	fisicos podrás usar el aplicativo QR (en tu celular) o la targeta Ttrueque, y en las tiendas virtuales, tu cuenta Ttrueque en línea.</p>
						<div class="c-sectMain__c__cflx__i__cDesc__cIcon">
							<img  src="img/Utilities/boleto_cdr_ttrq.jpg" alt="backgr_img_ttrq_02" class="img-fluid" width="100" height="100">
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<div id="toTopgobtn"></div>
</body>
</html>
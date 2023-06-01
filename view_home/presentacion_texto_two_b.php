<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Trueque | Page Two</title>
  <?php require_once 'header_links-home.php';?>
</head>
<body>
	<div>
		<?php require_once 'presentacion_header_texto_b.php';?>
		<div class="c-sectMain box-redx">
			<section class="c-sectMain__cMobDesk">
				<div class="c-sectMain__cMobDesk__cMob">
					<h3 class="c-sectMain__cMobDesk__cMob__title">ADQUIERE E INTERCAMBIA CON BIKKERS</h3>
					<h3 class="c-sectMain__cMobDesk__cMob__subtitle">Tres pasos para que adquieras Bikkers y compres o vendas en establecimientos físicos o en línea:</h3>
					<div class="c-sectMain__cMobDesk__cMob__cSteps">
						<div class="c-sectMain__cMobDesk__cMob__cSteps__i">
							<p><strong>1.- </strong> Regístrate gratuitamente en Ttrueque, en la Web www.ttrueque.com o en el aplicativo Ttrueque que puedes descargar de Play Store.</p>
							<img src="<?= $url;?>assets/img/Utilities/img_txt2_1.jpg" alt="icon_descriptive_page-two-mobile" class="img-fluid" width="100" height="100">
						</div>
						<div class="c-sectMain__cMobDesk__cMob__cSteps__i">
							<p><strong>2.- </strong> Coloca los productos en la sección TIENDAS de la plataforma para que los usuarios conozcan lo que ofreces. Dispondrás de una tienda gratuita.</p>
							<img src="<?= $url;?>assets/img/Utilities/img_txt2_2.jpg" alt="icon_descriptive_page-two-mobile" class="img-fluid" width="100" height="100">
						</div>
						<div class="c-sectMain__cMobDesk__cMob__cSteps__i">
							<p><strong>3.- </strong> Los usuarios adquirirán tus productos usando Bikkers, y al mismo tiempo en tu cuenta se registrará tu saldo acrededor en Bikkers.</p>
							<img src="<?= $url;?>assets/img/Utilities/img_txt2_3.jpg" alt="icon_descriptive_page-two-mobile" class="img-fluid" width="100" height="100">
						</div>
					</div>
				</div>
				<div class="c-sectMain__cMobDesk__cDesk">
					<div class="c-sectMain__cMobDesk__cDesk__i">
						<h3 class="c-sectMain__cMobDesk__cDesk__i__title">ADQUIERE E INTERCAMBIA CON BIKKERS</h3>
					</div>
					<div class="c-sectMain__cMobDesk__cDesk__i">
						<h3 class="c-sectMain__cMobDesk__cDesk__i__title">Tres pasos para que adquieras Bikkers y compres o vendas en establecimientos físicos o en línea:</h3>
						<ul>
							<li>
								<p><strong>1.- </strong> Regístrate gratuitamente en Ttrueque, en la Web www.ttrueque.com o en el aplicativo Ttrueque que puedes descargar de Play Store.</p>
							</li>
							<li>
								<p><strong>2.- </strong> Coloca los productos en la sección TIENDAS de la plataforma para que los usuarios conozcan lo que ofreces. Dispondrás de una tienda gratuita.</p>
							</li>
							<li>
								<p><strong>3.- </strong> Los usuarios adquirirán tus productos usando Bikkers, y al mismo tiempo en tu cuenta se registrará tu saldo acrededor en Bikkers.</p>
							</li>
						</ul>
					</div>
					<div class="c-sectMain__cMobDesk__cDesk__i">
						<ul>
							<li>
								<img src="<?= $url;?>assets/img/Utilities/img_txt2_1.jpg" alt="icon_descriptive_page-two-desktop" class="img-fluid" width="100" height="100">
							</li>
							<li>
								<img src="<?= $url;?>assets/img/Utilities/img_txt2_2.jpg" alt="icon_descriptive_page-two-desktop" class="img-fluid" width="100" height="100">
							</li>
							<li>
								<img src="<?= $url;?>assets/img/Utilities/img_txt2_3.jpg" alt="icon_descriptive_page-two-desktop" class="img-fluid" width="100" height="100">
							</li>
						</ul>
					</div>
				</div>
			</section>
		</div>
		<a href="javascript:void(0);" class="c-blck-linkSlideUp" id="btn-slide-info" title="Mayores detalles sobre membresías">Mayores detalles sobre Membresía</a>
		<div class="c-tblpriceSlideUp" id="main-membership-info">
			<div class="c-tblpriceSlideUp__c box-redx">
				<h3 class="c-tblpriceSlideUp__c__title">MEJORA TUS BENEFICIOS</h3>
				<ul class="c-tblpriceSlideUp__c__m" id="targets-info-menbershi"></ul>
			</div>
		</div>
	</div>
	<div id="toTopgobtn"></div>
	<script type="text/javascript" src="<?= $url;?>assets/js/actions_pages/listmenbership.js"></script>
</body>
</html>
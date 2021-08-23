<!DOCTYPE html>
<html lang="es">
<head>
  <title>Trueque | Page Two</title>
  <?php require_once 'header_home.php'; ?>
</head>
<body class="body-p-txt-twob-ttrueque">
	<div id="page" class="page-two_b">
		<!--  /HEADER DEL BANNER DE PRESENTACIÓN -->
		<?php require_once 'presentacion_header_texto_b.php'; ?>
		<!-- /BODY DE BANNER DE PRESENTACIÓN - TEXTO 1-->
		<div class="container-body-txt-b-two">
			<div class="content-info-txt-b-two">
				<section>
					<div class="content-cb-txt-b-two">
						<h3>VENDE Y COMPRA SIN USAR DINERO</h3>
						<div class="content-list-steps-txt-b-two">
							<div class="content-img-info-page">
								<p>Una vez que abres tu cuenta Ttrueque, accedes a una forma FÁCIL Y SEGURA de vender y comprar, sn utilizar dinero convencional</p>
								<img loading="lazy" class="img-fluid" src="img/Utilities/double_ganance_2.png">
							</div>
							<div class="content-img-info-page">
								<p>En tu cuenta o targeta Ttrueque, tu saldo se considera en Bikkers. Por cada dólar que vendes, en tu cuenta se registran 2 Bikkers</p>
								<img loading="lazy" class="img-fluid" src="img/Utilities/card_ttrueque.png">
							</div>
							<div class="content-img-info-page">
								<p>Al abrir tu cuenta Ttrueque <span>Básica</span> (gratuita) te regalamos 50 Bikkers para que empieces a conocery disfrutar de las bondades de Trueque</p>
								<img loading="lazy" class="img-fluid" src="img/Utilities/double_welcome.png">
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
		<a href="#" id="btn-slide-info" class="btn-slide-info">Mayores detalles sobre Membresía</a>
		<div class="container-table-membership-txt-b-two" id="main-membership-info">
			<div class="content-info-table-membership-b-two">
				<section>
					<h3>MEJORA TUS BENEFICIOS</h3>
				</section>
				<section>
					<ul class="" id="targets-info-menbershi"></ul>
				</section>
			</div>
		</div>
	</div>
	<div id="toTopgobtn"></div>
	<script src="js/main.js"></script>
	<script src="./js/actions_pages/listmenbership.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			var estado = false;
			$('#b-two-t-m-xd').css({
				"overflow": "auto"
			});
			$('#btn-slide-info').on('mouseover', function() {
				$('.container-body-txt-b-two').slideToggle();
				if (estado == true) {
					$(this).text("Mayores Detalles sobre Membresía");
					$('#b-two-t-m-xd').css({
						"overflow": "auto"
					});
					$('#main-membership-info').css({
						"display": "none"
					});
					estado = false;
				} else {
					$(this).text('');
					$('#b-two-t-m-xd').css({
						"overflow": "auto"
					});
					$('#main-membership-info').css({
						"display": "block",
						"margin-top": "-27px"
					});
					estado = true;
				}
			});
		});
	</script>
</body>
</html>
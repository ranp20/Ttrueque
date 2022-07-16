<!DOCTYPE html>
<html lang="es">
<head>
  <title>Trueque | Page Two</title>
  <?php require_once 'header_links-home.php';?>
</head>
<body class="body-p-txt-twob-ttrueque">
	<div id="page" class="page-two_b">
		<?php require_once 'presentacion_header_texto_b.php'; ?>
		<div class="cont__txttwo">
			<section class="cont__txttwo--cont">
				<div class="cont__txttwo--cont--mobileresp">
					<h3 class="cont__txttwo--cont--mobileresp--title">ADQUIERE E INTERCAMBIA CON BIKKERS</h3>
					<h3 class="cont__txttwo--cont--mobileresp--subtitle">Tres pasos para que adquieras Bikkers y compres o vendas en establecimientos físicos o en línea:</h3>
					<div class="cont__txttwo--cont--mobileresp--cSteps">
						<div class="cont__txttwo--cont--mobileresp--cSteps--step">
							<p class="cont__txttwo--cont--mobileresp--cSteps--step--text"><b>1.- </b> Regístrate gratuitamente en Ttrueque, en la Web www.ttrueque.com o en el aplicativo Ttrueque que puedes descargar de Play Store.</p>
							<img loading="lazy" class="cont__txttwo--cont--mobileresp--cSteps--step--img img-fluid" src="img/Utilities/img_txt2_1.jpg">
						</div>
						<div class="cont__txttwo--cont--mobileresp--cSteps--step">
							<p class="cont__txttwo--cont--mobileresp--cSteps--step--text"><b>2.- </b> Coloca los productos en la sección TIENDAS de la plataforma para que los usuarios conozcan lo que ofreces. Dispondrás de una tienda gratuita.</p>
							<img loading="lazy" class="cont__txttwo--cont--mobileresp--cSteps--step--img img-fluid" src="img/Utilities/img_txt2_2.jpg">
						</div>
						<div class="cont__txttwo--cont--mobileresp--cSteps--step">
							<p class="cont__txttwo--cont--mobileresp--cSteps--step--text"><b>3.- </b> Los usuarios adquirirán tus productos usando Bikkers, y al mismo tiempo en tu cuenta se registrará tu saldo acrededor en Bikkers.</p>
							<img loading="lazy" class="cont__txttwo--cont--mobileresp--cSteps--step--img img-fluid" src="img/Utilities/img_txt2_3.jpg">
						</div>
					</div>
				</div>
				<div class="cont__txttwo--cont--desktopresp">
					<div class="cont__txttwo--cont--desktopresp--one">
						<h3 class="cont__txttwo--cont--desktopresp--one--title">ADQUIERE E INTERCAMBIA CON BIKKERS</h3>
					</div>
					<div class="cont__txttwo--cont--desktopresp--two">
						<h3 class="cont__txttwo--cont--desktopresp--two--title">Tres pasos para que adquieras Bikkers y compres o vendas en establecimientos físicos o en línea:</h3>
						<ul class="cont__txttwo--cont--desktopresp--two--msteps">
							<li class="cont__txttwo--cont--desktopresp--two--msteps--item">
								<p class="cont__txttwo--cont--desktopresp--two--msteps--item--text"><b>1.- </b> Regístrate gratuitamente en Ttrueque, en la Web www.ttrueque.com o en el aplicativo Ttrueque que puedes descargar de Play Store.</p>
							</li>
							<li class="cont__txttwo--cont--desktopresp--two--msteps--item">
								<p class="cont__txttwo--cont--desktopresp--two--msteps--item--text"><b>2.- </b> Coloca los productos en la sección TIENDAS de la plataforma para que los usuarios conozcan lo que ofreces. Dispondrás de una tienda gratuita.</p>
							</li>
							<li class="cont__txttwo--cont--desktopresp--two--msteps--item">
								<p class="cont__txttwo--cont--desktopresp--two--msteps--item--text"><b>3.- </b> Los usuarios adquirirán tus productos usando Bikkers, y al mismo tiempo en tu cuenta se registrará tu saldo acrededor en Bikkers.</p>
							</li>
						</ul>
					</div>
					<div class="cont__txttwo--cont--desktopresp--three">
						<ul class="cont__txttwo--cont--desktopresp--three--msteps">
							<li class="cont__txttwo--cont--desktopresp--three--msteps--item">
								<img loading="lazy" class="cont__txttwo--cont--desktopresp--three--msteps--item--img img-fluid" src="img/Utilities/img_txt2_1.jpg">
							</li>
							<li class="cont__txttwo--cont--desktopresp--three--msteps--item">
								<img loading="lazy" class="cont__txttwo--cont--desktopresp--three--msteps--item--img img-fluid" src="img/Utilities/img_txt2_2.jpg">
							</li>
							<li class="cont__txttwo--cont--desktopresp--three--msteps--item">
								<img loading="lazy" class="cont__txttwo--cont--desktopresp--three--msteps--item--img img-fluid" src="img/Utilities/img_txt2_3.jpg">
							</li>
						</ul>
					</div>
				</div>
			</section>
		</div>
		<a href="javascript:void(0);" id="btn-slide-info" class="btn-slideinfo__txttwo">Mayores detalles sobre Membresía</a>
		<div class="cont__tblpricetxttwo" id="main-membership-info">
			<div class="cont__tblpricetxttwo--info">
				<h3 class="cont__tblpricetxttwo--info--title">MEJORA TUS BENEFICIOS</h3>
				<ul class="cont__tblpricetxttwo--info--mtable" id="targets-info-menbershi"></ul>
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
				$('.cont__txttwo').slideToggle();
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
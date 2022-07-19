<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();

if (!isset($_SESSION['user'])) {
	header("Location:home");
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Ttrueque | Contáctanos</title>
  <?php require_once 'includes/header_links.php';?>
  <!-- INCLUIR SWEET ALERT 2 -->
  <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
  <script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>
<body>
	<div id="page">
		<?php require_once '../php/process_header.php';?>
		<?php require_once "header_b.php"; ?>
		<div class="loader-ttrqstr">
      <span class="loader-ttrqstr--loader"></span>
    </div>
		<main class="cContactsMain">
			<div class="cContactsMain--c">
				<div class="cContactsMain--c--cTop">
					<div class="cContactsMain--c--cTop--cBanner">
						<img src="./img/banners/call-center-bg-1.jpeg" alt="">
						<div class="cContactsMain--c--cTop--cBanner--cTitle">
							<h3 class="cContactsMain--c--cTop--cBanner--cTitle--title">CONTÁCTANOS</h3>
						</div>
					</div>
					<div class="cContactsMain--c--cTop--cW">
						<div class="cContactsMain--c--cTop--cW--cMenuinfo">
							<div class="cContactsMain--c--cTop--cW--cMenuinfo--item">
								<div class="cContactsMain--c--cTop--cW--cMenuinfo--item--cont">
									<div class="cContactsMain--c--cTop--cW--cMenuinfo--item--cont--cIcon">
										<img src="./img/svg/icon-smarthphone.svg" alt="">
									</div>
									<h3 class="cContactsMain--c--cTop--cW--cMenuinfo--item--cont--cIcon--title">Teléfono</h3>
									<span class="cContactsMain--c--cTop--cW--cMenuinfo--item--cont--cIcon--info">+51 <?= $alldataAdm[0]['telefono_admin'];?></span>
								</div>
							</div>
							<div class="cContactsMain--c--cTop--cW--cMenuinfo--item">
								<div class="cContactsMain--c--cTop--cW--cMenuinfo--item--cont">
									<div class="cContactsMain--c--cTop--cW--cMenuinfo--item--cont--cIcon">
										<img src="./img/svg/icon-paper-airplane.svg" alt="">
									</div>
									<h3 class="cContactsMain--c--cTop--cW--cMenuinfo--item--cont--cIcon--title">Email</h3>
									<span class="cContactsMain--c--cTop--cW--cMenuinfo--item--cont--cIcon--info">melgarejo777666@gmail.com</span>
								</div>
							</div>
							<div class="cContactsMain--c--cTop--cW--cMenuinfo--item">
								<div class="cContactsMain--c--cTop--cW--cMenuinfo--item--cont">
									<div class="cContactsMain--c--cTop--cW--cMenuinfo--item--cont--cIcon">
										<img src="./img/svg/icon-map-marker.svg" alt="">
									</div>
									<h3 class="cContactsMain--c--cTop--cW--cMenuinfo--item--cont--cIcon--title">Dirección</h3>
									<span class="cContactsMain--c--cTop--cW--cMenuinfo--item--cont--cIcon--info"><?= $alldataAdm[0]['direccion_admin'];?></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="cContactsMain--c--cF">
					<div class="cContactsMain--c--cF--cTitle">
						<h3 class="cContactsMain--c--cF--cTitle--title">Envíanos un mensaje</h3>
					</div>
					<form method="POST" class="cContactsMain--c--cF--form" id="form-ContactTtrueque">
						<div class="cContactsMain--c--cF--form--control">
							<img class="cContactsMain--c--cF--form--control--icon" src="./img/svg/icon-user.svg" alt="">
							<input type="text" name="name_sendcontact" id="name_sendcontact" placeholder="Nombres" class="cContactsMain--c--cF--form--control--input" required maxlength="60">
						</div>
						<div class="cContactsMain--c--cF--form--doublecontrol">
							<div class="cContactsMain--c--cF--form--doublecontrol--cC">
								<img class="cContactsMain--c--cF--form--doublecontrol--cC--icon" src="./img/svg/icon-smarthphone-bluelemon.svg" alt="">
								<input type="text" name="telephone_sendcontact" id="telephone_sendcontact" placeholder="Teléfono" class="cContactsMain--c--cF--form--doublecontrol--cC--input" required maxlength="11">
							</div>
							<div class="cContactsMain--c--cF--form--doublecontrol--cC">
								<img class="cContactsMain--c--cF--form--doublecontrol--cC--icon" src="./img/svg/icon-email.svg" alt="">
								<input type="email" name="email_sendcontact" id="email_sendcontact" placeholder="Email" class="cContactsMain--c--cF--form--doublecontrol--cC--input" required maxlength="75">
							</div>
						</div>
						<div class="cContactsMain--c--cF--form--controltextarea">
							<img class="cContactsMain--c--cF--form--controltextarea--icon" src="./img/svg/icon-comment.svg" alt="">
							<textarea placeholder="Escriba su mensaje" name="message_sendcontact" id="message_sendcontact" class="cContactsMain--c--cF--form--control--textarea" required maxlength="510"></textarea>
						</div>
						<button type="submit" class="cContactsMain--c--cF--form--btnsendMessage">Enviar</button>
					</form>
				</div>
			</div>
		</main>
		<?php require_once 'footer.php'; ?>
	</div>
  <div id="toTop"></div>
  
  
  <script type="text/javascript" src="./js/main.js"></script>
  <!--------- SWEEET ALERT 2 ------------>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <!--------- CUSTOMS JAVASCRIPT--------->
  <script type="text/javascript" src="./js/actions_pages/language_currency.js"></script>
  <script type="text/javascript" src="./js/actions_pages/contact.js"></script>
  <script type="text/javascript" src="js/actions_pages/buy_cart.js"></script>
  <script type="text/javascript" src="./js/actions_pages/view_cart.js"></script>
  <script type="text/javascript" src="./js/actions_pages/remove.js"></script>
  <script type="text/javascript" src="js/actions_pages/customs.js"></script>
  <script type="text/javascript" src="js/actions_pages/all_pages_index.js"></script>
  <script type="text/javascript" src="js/actions_pages/listCategories_ByStore.js"></script>
  
  <script type="text/javascript" src="./js/actions_pages/track-order.js"></script>
</body>
</html>
<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
if (isset($_SESSION["user"])){
	header("Location: ./");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Ttrueque | Recuperar contraseña</title>
  <?php require_once 'includes/header_links.php'; ?>
</head>
<body>
	<?php require_once 'includes/inc_header-top.php';?>
	<div class="cont-recover-password">
		<div class="cont-form-rec">
			<form class="cont-form-rec--form" method="POST" id="recover-pass">
			  <h3 class="cont-form-rec--form--title">RECUPERAR CONTRASEÑA</h3>
				<p class="cont-form-rec--form--description">Introduce tu correo electrónico de usuario para recibir instrucciones de como reestablecer tu contraseña.</p>
				<div class="cont-form-rec--form--alertmsg" id="msgrecover-pass"></div>
				<p id="msgrecover-pass2"></p>
				<div class="cont-form-rec--form--control">
					<div class="cont-form-rec--form--control--conticon">
            <img src="img/iconos_home/home-login-mail.svg" alt="">
          </div>
					<input type="text" name="mail-recover" class="cont-form-rec--form--control--input" required maxlength="200" placeholder="Correo electrónico o número de celular">
				</div>
				<button type="submit" class="cont-form-rec--form--btnsendemail">ENVIAR</button>
			</form>
		</div>
	</div>
	<script src="./js/actions_pages/recover_pass.js"></script>
</body>
</html>
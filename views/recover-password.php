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
	<?php // require_once '../view_home/presentacion_header_texto_b.php';?>
	<div class="cont-recover-password">
		<div class="cont-form-rec">
			<div class="c-sectMain__cAcco__cAcct--cLogo">
				<a href="./" class="c-sectMain__cAcco__cAcct--cLogo--link">
          <img src="img/logo/Login_Web-T-blue.svg" alt="logo_Ttrueque" class="img-fluid" width="100" height="100">
        </a>
			</div>
			<form class="cont-form-rec--form" method="POST" id="recover-pass">
			  <h3 class="cont-form-rec--form--title">RECUPERAR CONTRASEÑA</h3>
				<p class="cont-form-rec--form--description">Introduce tu correo electrónico de usuario para recibir instrucciones de como reestablecer tu contraseña.</p>
				<div class="cont-form-rec--form--alertmsg" id="msgrecover-pass"></div>
				<p id="msgrecover-pass2"></p>
				<div class="cont-form-rec--form--control">
					<div class="cont-form-rec--form--control--conticon">
            <img src="img/iconos_home/home-login-mail.svg" class="img-fluid" alt="email_svg" width="100" height="100">
          </div>
					<input type="text" name="mail-recover" class="cont-form-rec--form--control--input" required maxlength="200" placeholder="Correo electrónico o número de celular">
				</div>
				<button type="submit" class="cont-form-rec--form--btnsendemail">SOLICITAR</button>
				<div class="cont-form-rec--form--cBckLgg">
					<a href="login" class="cont-form-rec--form--cBckLgg--link">
						<svg xmlns="http://www.w3.org/2000/svg" width="45px" height="45px" version="1.1" viewBox="0 0 700 700"><path d="m455.41 268.47h-179.53l77.41-77.41c4.9414-4.9414 4.9414-13.176 0-18.117-4.9414-4.9414-11.531-4.9414-16.469 0l-98.824 98.824c-4.9414 4.9414-4.9414 13.176 0 18.117l98.824 98.824c4.9414 4.9414 13.176 4.9414 18.117 0 4.9414-4.9414 4.9414-11.531 0-16.469l-77.41-79.059h179.53c6.5898 0 13.176-4.9414 13.176-13.176-3.2969-6.5938-8.2383-13.18-14.828-11.535z"/></svg>
						<span>Regresar para iniciar sesión</span>
					</a>
				</div>
			</form>
		</div>
	</div>
	<script type="text/javascript" src="./js/actions_pages/recover_pass.js"></script>
</body>
</html>
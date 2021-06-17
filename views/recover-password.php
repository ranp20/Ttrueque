<?php 
session_start();

if (isset($_SESSION["user"])){
	header("Location: ./");
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Ttrueque | Recuperar contraseña</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Ttrueque">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- AGREGAR EL NO GUARDADO DE CACHE EN EL NAVEGADOR -->
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />
  <!-- //GOOGLE WEB FONTS -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Oxygen:wght@300;400;700&family=Quicksand:wght@300;400;500;600;700&family=Raleway:wght@100;200;300;400;500;600;700;800;900&family=Sen:wght@400;700;800&family=Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <!-- //BOOTSTRAP-->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha256-L/W5Wfqfa0sdBNIKN9cG6QA5F2qx4qICmU2VgLruv9Y="
    crossorigin="anonymous"
  />
  <!-- //FONTAWESOWE -->
  <link href="./admin/css/font-awesome.min.css" rel="stylesheet">
  <link href="./css/bootstrap.custom.min.css" rel="stylesheet">
  <!-- //YOUR CUSTOM CSS -->
  <link href="./css/style.css" rel="stylesheet">
  <link href="./css/cart.css" rel="stylesheet">
  <link href="./css/account.css" rel="stylesheet">
  <link href="./css/contact.css" rel="stylesheet">
  <link href="./css/error_track.css" rel="stylesheet">
  <link href="./css/faq.css" rel="stylesheet">
  <link href="./css/blog.css" rel="stylesheet">
  <link href="./css/checkout.css" rel="stylesheet">
  <link href="./css/estilos.css" rel="stylesheet">
  <link href="./css/customs/custom.css" rel="stylesheet">
  <!-----//ICON-PAGES------>
  <link rel="icon" href="./img/icon-pages/drawable-xxxhdpi-icon.png" type="image/ico">
</head>
<body>
	<div class="cont-recover-password">
		<div class="cont-headertop-login">
	    <div class="container-texto-alls-b">
	      <header>
	        <div class="content-h-txt-b">
	          <section>
	            <div class="content-h-logo-txt-b">
	              <a href="home" class="h-logo-txt-b-link-trk">
	                <img src="./img/logo/logotipo-T-white.svg" alt="logo_Ttrueque" class="img-fluid">
	              </a>
	            </div>
	            <div class="content-h-buttons-txt-b">
	              <a href="home" class="btn-reg-text-b">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Inicio&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
	            </div>
	          </section>
	        </div>
	      </header>
	    </div>
	  </div>
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
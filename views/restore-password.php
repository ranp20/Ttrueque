<?php 
session_start();

if (isset($_SESSION["user"])){
	header("Location: ./");
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Ttrueque | Reestablecer contraseña</title>
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
		<div class="cont-form-restore">
      <input type="hidden" id="tokenbygetclient" value="<?php echo $_GET['token'];?>">
			<form class="cont-form-restore--form" method="POST" id="restore-pass">
			  <h3 class="cont-form-restore--form--title">REESTABLEZCA SU CONTRASEÑA</h3>
				<p class="cont-form-restore--form--description">A continuación introduzca la nueva contraseña que usará para ingresar a su cuenta de Ttrueque.</p>
				<div class="cont-form-restore--form--alertmsg" id="msgrestore-pass"></div>
			  <div id="cont-msg-inputpass" class="disabled">
          <p id="msgrestore-pass2"></p>
          <div class="cont-form-restore--form--control--icon-check">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve"><g><path d="M50,3.75C24.498,3.75,3.75,24.498,3.75,50S24.498,96.25,50,96.25S96.25,75.502,96.25,50S75.502,3.75,50,3.75z    M75.636,40.577L46.098,70.115c-0.899,0.899-2.145,1.415-3.416,1.415v2l-0.043-2c-1.288-0.011-2.539-0.549-3.433-1.476   L24.304,54.608c-1.85-1.917-1.795-4.98,0.122-6.83c0.905-0.874,2.096-1.354,3.353-1.354c1.323,0,2.558,0.524,3.477,1.476   l11.488,11.907l26.062-26.061c0.912-0.912,2.125-1.415,3.416-1.415c1.29,0,2.503,0.502,3.415,1.414   C77.519,35.629,77.519,38.694,75.636,40.577z"/></g></svg>
          </div>
        </div>
				<div class="cont-form-restore--form--control">
					<div class="cont-form-restore--form--control--conticon">
            <img src="img/iconos_home/home-login-lock.svg" alt="">
          </div>
					<input type="password" name="mail-recover" class="cont-form-restore--form--control--input" required maxlength="200" placeholder="Nueva contraseña" id="password-one">
				</div>
        <div class="cont-form-restore--form--control">
          <div class="cont-form-restore--form--control--conticon">
            <img src="img/iconos_home/home-login-lock.svg" alt="">
          </div>
          <input type="password" name="mail-recover" class="cont-form-restore--form--control--input" required maxlength="200" placeholder="Confirmar nueva contraseña" id="password-two">
        </div>
				<button type="submit" class="cont-form-restore--form--btnsendemail" id="btnupdatepass" disabled="true">Actualizar contraseña</button>
			</form>
		</div>
	</div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="./js/actions_pages/restore_pass.js"></script>
</body>
</html>
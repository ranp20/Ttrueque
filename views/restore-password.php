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
  <title>Ttrueque | Reestablecer contraseña</title>
  <?php require_once 'includes/header_links.php'; ?>
</head>
<body>
	<?php require_once 'includes/inc_header-top.php';?>
	<div class="cont-recover-password">
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
<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
require_once '../php/class/all.php';
$all = new ALl();
$mante = $all->get_mantenience();
$mantenience =  $mante[0]['state_mantenience'];
if($mantenience == 'YES' || $mantenience == 'yes'){
  header('Location: mantenience');
}else{
	if(isset($_SESSION["user"])){
		header("Location: ./");
	}
}
require_once("../php/class/all.php");
$all = new All();
$paises = $all->get_name_country();
$rubros = $all->get_name_rubros();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Ttrueque | Crear tu cuenta</title>
  <?php require_once 'includes/header_links.php';?>
  <!-- INCLUIR SWEET ALERT 2 -->
  <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
  <script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>
<body id="bd_sign-up">
	<?php // require_once 'includes/inc_header-top-home.php';?>
	<div class="c-sectMain box-redx">
		<div class="c-sectMain__cAcco box_account">
			<?php
				if(isset($_SESSION["error"])){
					echo $_SESSION["error"];
					unset($_SESSION["error"]);
				}else if(isset($_SESSION["success"])){
					echo $_SESSION["success"];
					unset($_SESSION["success"]);
				}
			?>
			<section class="c-sectMain__cAcco__cAcct">
				<div class="c-sectMain__cAcco__cAcct--cLogo">
					<a href="./" class="c-sectMain__cAcco__cAcct--cLogo--link">
	          <img src="img/logo/Login_Web-T-blue.svg" alt="logo_Ttrueque" class="img-fluid" width="100" height="100">
	        </a>
				</div>
				<form class="c-sectMain__cAcco__cAcct__cFrm form_container" method="POST" action="php/process_account.php?register" id="form-register">
					<div class="c-sectMain__cAcco__cAcct__cTitle">
						<h3>Crear tu cuenta</h3>
					</div>
					<div class="c-sectMain__cAcco__cAcct__cFrm__cCtrls">
						<input type="email" class="c-sectMain__cAcco__cAcct__cFrm__cCtrls__ipt" name="mail" id="email_2" placeholder="Correo electrónico" required>
					</div>
					<div class="c-sectMain__cAcco__cAcct__cFrm__cCtrls">
						<input type="password" autocomplete="false" class="c-sectMain__cAcco__cAcct__cFrm__cCtrls__ipt" name="pass" id="password_in_2" placeholder="Contraseña" required>
						<div class="c-sectMain__cAcco__cAcct__cFrm__cCtrls__cIconSecond" id="ic-passCtrlAcct">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="cAccount__cont--fAccount--form--controls--cIcon--pass">
             <path d="M12.015 7c4.751 0 8.063 3.012 9.504 4.636-1.401 1.837-4.713 5.364-9.504 5.364-4.42 0-7.93-3.536-9.478-5.407 1.493-1.647 4.817-4.593 9.478-4.593zm0-2c-7.569 0-12.015 6.551-12.015 6.551s4.835 7.449 12.015 7.449c7.733 0 11.985-7.449 11.985-7.449s-4.291-6.551-11.985-6.551zm-.015 3c-2.209 0-4 1.792-4 4 0 2.209 1.791 4 4 4s4-1.791 4-4c0-2.208-1.791-4-4-4z"></path></svg>
          </div>
					</div>
					<div class="c-sectMain__cAcco__cAcct__cFrm__cGrpCtrls">
						<div class="c-sectMain__cAcco__cAcct__cFrm__cGrpCtrls__cCtrl w-5">
							<input type="text" name="name" class="c-sectMain__cAcco__cAcct__cFrm__cGrpCtrls__cCtrl__ipt" id="nombre" placeholder="Nombres" required>
						</div>
						<div class="c-sectMain__cAcco__cAcct__cFrm__cGrpCtrls__cCtrl w-5">
							<input type="text" name="lastname" class="c-sectMain__cAcco__cAcct__cFrm__cGrpCtrls__cCtrl__ipt" id="apellido" placeholder="Apellidos" required>
						</div>
					</div>
					<div class="c-sectMain__cAcco__cAcct__cFrm__cCtrls">
						<input type="text" name="direction" class="c-sectMain__cAcco__cAcct__cFrm__cCtrls__ipt" placeholder="Dirección" required>
					</div>
					<div class="c-sectMain__cAcco__cAcct__cFrm__cGrpCtrls">
						<div class="c-sectMain__cAcco__cAcct__cFrm__cGrpCtrls__cCtrl w-5">
							<select required class="one-hidd" name="country" id="country">
								<option value="0">País</option>
								<?php
									foreach($paises as $val){
										echo "<option value='{$val["id_pais"]}'>{$val["nombre_pais"]}</option>";
									}
								?>
							</select>
						</div>
						<div class="c-sectMain__cAcco__cAcct__cFrm__cGrpCtrls__cCtrl w-5">
							<input type="number" name="phone" class="c-sectMain__cAcco__cAcct__cFrm__cGrpCtrls__cCtrl__ipt" placeholder="Teléfono" required>
						</div>
					</div>
					<div class="c-sectMain__cAcco__cAcct__cFrm__cCtrls">
						<select required class="one-hidd" name="rubro" id="rubro">
							<option value="0">Rubro*</option>
							<?php
							foreach ($rubros as $val) {
								echo "<option value='{$val["id"]}'>{$val["name"]}</option>";
							}
							?>
						</select>
					</div>
					<div class="c-sectMain__cAcco__cAcct__cFrm__cChckCtrl">
						<label class="c-sectMain__cAcco__cAcct__cFrm__cChckCtrl__c">
							<input type="checkbox" id="check-terms" class="c-sectMain__cAcco__cAcct__cFrm__cChckCtrl__c__ipt" value="" required>Acepto los términos y condiciones
							<span class="c-sectMain__cAcco__cAcct__cFrm__cChckCtrl__c__chck"></span>
						</label>
					</div>
					<div class="c-sectMain__cAcco__cAcct__cFrm__cBtns">
						<button type="submit" title="Registrarme">Registrarme</button>
						<div class="c-sectMain__cAcco__cAcct__cFrm__cBtns__cLinks">
							<p>¿Ya tienes una cuenta?<a href="login" title="Iniciar sesión">Iniciar sesión</a></p>
						</div>
					</div>
				</form>
			</section>
		</div>
	</div>
	<script type="text/javascript" src="./js/actions_pages/account.js"></script>
</body>
</html>
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
  <title>Ttrueque | Registrarse</title>
  <?php require_once 'includes/header_links.php';?>
  <!-- INCLUIR SWEET ALERT 2 -->
  <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
  <script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>
<body>
	<?php require_once 'includes/inc_header-top-home.php';?>
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
			<div class="c-sectMain__cAcco__cTitle">
				<h3>Regístrate</h3> 
				<small>* Campos requeridos</small>
			</div>
			<form class="c-sectMain__cAcco__cFrm form_container" method="POST" action="php/process_account.php?register" id="form-register">
				<div class="c-sectMain__cAcco__cFrm__cCtrls">
					<input type="email" class="c-sectMain__cAcco__cFrm__cCtrls__ipt" name="mail" id="email_2" placeholder="Email" required>
				</div>
				<div class="c-sectMain__cAcco__cFrm__cCtrls">
					<input type="password" class="c-sectMain__cAcco__cFrm__cCtrls__ipt" name="pass" id="password_in_2" placeholder="Password" required>
				</div>
				<hr>
				<div class="c-sectMain__cAcco__cFrm__cGrpCtrls">
					<div class="c-sectMain__cAcco__cFrm__cGrpCtrls__cCtrl w-5">
						<input type="text" name="name" class="c-sectMain__cAcco__cFrm__cGrpCtrls__cCtrl__ipt" id="nombre" placeholder="Nombres" required>
					</div>
					<div class="c-sectMain__cAcco__cFrm__cGrpCtrls__cCtrl w-5">
						<input type="text" name="lastname" class="c-sectMain__cAcco__cFrm__cGrpCtrls__cCtrl__ipt" id="apellido" placeholder="Apellidos" required>
					</div>
				</div>
				<div class="c-sectMain__cAcco__cFrm__cCtrls">
					<input type="text" name="direction" class="c-sectMain__cAcco__cFrm__cCtrls__ipt" placeholder="Dirección" required>
				</div>
				<div class="c-sectMain__cAcco__cFrm__cGrpCtrls">
					<div class="c-sectMain__cAcco__cFrm__cGrpCtrls__cCtrl w-5">
						<select required class="one-hidd" name="country" id="country">
							<option value="0">País</option>
							<?php
								foreach($paises as $val){
									echo "<option value='{$val["id_pais"]}'>{$val["nombre_pais"]}</option>";
								}
							?>
						</select>
					</div>
					<div class="c-sectMain__cAcco__cFrm__cGrpCtrls__cCtrl w-5">
						<input type="number" name="phone" class="c-sectMain__cAcco__cFrm__cGrpCtrls__cCtrl__ipt" placeholder="Teléfono" required>
					</div>
				</div>
				<div class="c-sectMain__cAcco__cFrm__cCtrls">
					<select required class="one-hidd" name="rubro" id="rubro">
						<option value="0">Rubro*</option>
						<?php
						foreach ($rubros as $val) {
							echo "<option value='{$val["id"]}'>{$val["name"]}</option>";
						}
						?>
					</select>
				</div>
				<div class="c-sectMain__cAcco__cFrm__cChckCtrl">
					<label class="c-sectMain__cAcco__cFrm__cChckCtrl__c">
						<input type="checkbox" id="check-terms" class="c-sectMain__cAcco__cFrm__cChckCtrl__c__ipt" value="" required> Términos y Condiciones
						<span class="c-sectMain__cAcco__cFrm__cChckCtrl__c__chck"></span>
					</label>
				</div>
				<div class="c-sectMain__cAcco__cFrm__cBtns">
					<button type="submit" title="Registrarme">Registrarme</button>
					<div class="c-sectMain__cAcco__cFrm__cBtns__cLinks">
						<p>¿Ya tienes una cuenta?<a href="login" title="Iniciar sesión">Iniciar sesión</a></p>
					</div>
				</div>
			</form>
		</div>
	</div>
	<script type="text/javascript" src="./js/actions_pages/account.js"></script>
</body>
</html>
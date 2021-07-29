<?php
// 	error_reporting(0);
require_once '../php/class/all.php';
$all = new ALl();
$mante = $all->get_mantenience();
$mantenience =  $mante[0]['state_mantenience'];

//print_r($mante[0]['state_mantenience']);
if($mantenience == 'YES' || $mantenience == 'yes'){
    header('Location: mantenience');
}


session_start();
require_once("../php/class/all.php");
$all = new All();
$paises = $all->get_name_country();
$rubros = $all->get_name_rubros();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php require_once 'includes/header_links.php'; ?>
  <title>Ttrueque | Regístrate</title>
</head>
<body class="body-homepwa body-account-pwa">
	<div class="cont-loaderInitialPWA" id="cont-loaderInitialPWA">
    <img src="<?= $url ?>img/logo/logotipo-T-white.svg" alt="">
  </div>
  <div class="cont-headertop-login" id="c-headerTop-login-pwa">
    <div class="container-texto-alls-b">
      <header>
        <div class="content-h-txt-b">
          <section>
            <div class="content-h-logo-txt-b">
              <a href="home" class="h-logo-txt-b-link-trk">
                <img src="<?= $url ?>img/logo/logotipo-T-white.svg" alt="logo_Ttrueque" class="img-fluid">
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
	<div id="page" class="paddingt-5">
		<!-- /header -->
		<main id="total-content-account">
			<div class="container" style="display: flex;justify-content: center;flex-direction: column;align-items:center;">
				<?php
				if (isset($_SESSION["error"])) {
				?>
					<?php echo $_SESSION["error"]; ?>
				<?php
					unset($_SESSION["error"]);
				} else if (isset($_SESSION["success"])) {
				?>
					<?php
					echo $_SESSION["success"]; ?>
				<?php
					unset($_SESSION["success"]);
				}
				if (isset($_SESSION["user"])) {
					header("Location: ./");
				}
				?>
				<div class="col-xl-6 col-lg-6 col-md-8" id="form-register-info-personal">
					<!--NUEVO-->
					<div class="box_account">
						<div class="cont-infoicons-account">
							<div class="cont-imgh3-accounttop">
								<img src="./img/iconos_home/home-account-user.svg" alt="">
								<h3 class="new_client">Nuevo Usuario</h3> 
							</div>
							<small class="float-right pt-2">* Campos requeridos</small>
						</div>
						<form class="form_container" method="POST" action="php/process_account.php?register" id="form-register">
							<div class="form-group">
								<input type="email" maxlength="200" required class="form-control form-register-input" name="mail" id="email_2" placeholder="Email*">
							</div>
							<div class="form-group">
								<input type="password" maxlength="40" required class="form-control form-register-input" name="pass" id="password_in_2" value="" placeholder="Password*">
							</div>
							<hr>
							<!--inputs private / company-->
							<div class="private box">
								<div class="row no-gutters">
									<div class="col-12 row no-gutters" id="input-change-register">
										<div class="col-6 pr-1">
											<div class="form-group">
												<input type="text" required name="name" class="form-control" id="nombre" placeholder="Nombres*">
											</div>
										</div>
										<div class="col-6 pl-1">
											<div class="form-group">
												<input type="text" required name="lastname" class="form-control" id="apellido" placeholder="Apellidos*">
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<input type="text" required name="direction" class="form-control" placeholder="Dirección*">
										</div>
									</div>
								</div>
								<!-- /row -->
								<div class="row no-gutters">
									<div class="col-6 pr-1">
										<div class="form-group">
											<select required class="form-control select-onehidden" name="country" id="country">
												<option value="0">País*</option>
												<?php
												foreach ($paises as $val) {
													echo "<option value='{$val["id_pais"]}'>{$val["nombre_pais"]}</option>";
												}
												?>
											</select>
											<!--<div class="arrow-down-select">
												<i></i>
											</div>-->
										</div>
									</div>
									<div class="col-6 pl-1">
										<div class="form-group">
											<input type="number" minlength="9" maxlength="11" required name="phone" class="form-control" placeholder="Teléfono *">
										</div>
									</div>
								</div>
								<div class="row no-gutters">
									<div class="col-12 pr-1">
										<div class="form-group">
											<select required class="form-control select-onehidden" name="rubro" id="rubro">
												<option value="0">Rubro*</option>
												<?php
												foreach ($rubros as $val) {
													echo "<option value='{$val["id"]}'>{$val["name"]}</option>";
												}
												?>
											</select>
											<div class="arrow-down-select">
												<i></i>
											</div>
										</div>
									</div>
								</div>
								<!-- /row -->
								<hr>
								<div class="form-group" style="left:20px !important;">
									<label class="form-check-label">
										<input type="checkbox" required id="check-terms" class="form-check-input" value=""> Términos y Condiciones
										<span class="checkmark"></span>
									</label>
								</div>
							</div>
							<div class="text-center">
								<input type="submit" value="Registrarme" class="btn_1 full-width banner_btn btn-register-user-new">
								<div class="cont-session-exist-login">
									<p>¿Ya tienes una cuenta?&nbsp;&nbsp;<a href="login">Iniciar sesión</a></p>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
	</div>
	</main>
	</div>
	<script src="js/common_scripts.min.js"></script>
	<script src="js/main.js"></script>
	<script src="./js/actions_pages/account.js"></script>
	<script src="./js/actions_pages/customs.js"></script>
</body>
</html>
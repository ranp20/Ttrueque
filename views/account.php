<?php
// 	error_reporting(0);
	session_start();
require_once("../php/class/all.php");
$all = new All();
$paises = $all->get_name_country();
$rubros = $all->get_name_rubros();
?>

<?php


require_once 'header_index.php'; ?>

<body>

	<div id="page">
		<div class="page_texto_b1" style="z-index:99999;">
			<!-- /COTENIDO - TEXTO UNO DEL BANNER DE PRESENTACIÓN -->
			<div class="container-texto-alls-b">
				<header>
					<div class="content-h-txt-b">
						<section>
							<div class="content-h-logo-txt-b">
								<a href="home" class="h-logo-txt-b-link-trk">
									<img src="./img/logo/Logo_TTRK.png" alt="logo_Ttrueque">
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
		<!-- /header -->
		<main class="bg_gray" id="total-content-account">
			<div class="container margin_30" style="display: flex;justify-content: center;flex-direction: column;align-items:center;">
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
						<h3 class="new_client">Nuevo Usuario</h3> <small class="float-right pt-2">* Campos requeridos</small>
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
										</div>
									</div>
									<div class="col-6 pl-1">
										<div class="form-group">
											<input type="text" required name="phone" class="form-control" placeholder="Teléfono *">
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
										</div>
									</div>
								</div>
								<!-- /row -->
								<hr>
								<div class="form-group" style="left:20px !important;">
									<label class="form-check-label">
										<input type="checkbox" required id="check-terms" class="form-check-input" value=""> Términos y Condiciones
									</label>
								</div>
							</div>
							<div class="text-center">
								<input type="submit" value="Registrarme" class="btn_1 full-width banner_btn">
								<div class="cont-session-exist-login">
									<p>¿Ya tienes una cuenta?&nbsp;&nbsp;<a href="login">Iniciar sesión</a></p>
								</div>
							</div>
						</form>
						<!-- /form_container -->
					</div>
					<!-- /box_account -->
				</div>
			</div>
	</div>
	</main>
	</div>
	<!-- page -->
	<div id="toTop"></div><!-- Back to top button -->
	<!-- COMMON SCRIPTS -->
	<script src="js/common_scripts.min.js"></script>
	<script src="js/main.js"></script>
	<script src="./js/actions_pages/account.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<!-- //BOOTSTRAP-->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<!-- SWEEET ALERT 2-->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>

</html>
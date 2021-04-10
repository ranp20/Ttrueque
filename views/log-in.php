<?php
session_start();

require_once '../php/class/all.php';
$all = new ALl();
$mante = $all->get_mantenience();
$mantenience =  $mante[0]['state_mantenience'];

//print_r($mante[0]['state_mantenience']);
if($mantenience == 'YES' || $mantenience == 'yes'){
    header('Location: mantenience');
}


if (isset($_SESSION["user"])) {

	// header('location: views/');
	header('location: ./');
}
require_once '../php/class/all.php';
$all = new All();
$paises = $all->get_name_country();

?>
<?php require_once 'header_index.php'; ?>

<body class="body-log-in-ttrueque">
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
                            <a href="home"
                                class="btn-reg-text-b">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Inicio&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                        </div>
                    </section>
                </div>
            </header>
        </div>
    </div>

    <?php
	if (isset($_SESSION["error"])) {
		echo "<script>alert('{$_SESSION["error"]}')</script>";
		unset($_SESSION["error"]);
	} else if (isset($_SESSION["success"])) {
		echo "<script>alert('{$_SESSION["success"]}')</script>";
		unset($_SESSION["success"]);
	}
	if (isset($_SESSION["user"])) {
		header("Location: ./");
	}
	$estado_cadena = explode("-", empty($_GET["link"]) ? "" : $_GET["link"]);
	$id = end($estado_cadena);
	$estado =	strstr(empty($_GET["link"]) ? "" : $_GET["link"], '-' . $id, true);
	?>
    <div class="container-log-in-u">
        <div class="content-log-in-u">
            <section class="sec-log-in-u">
                <header class="head-log-in-u">
                    <div class="logo-head-log-in-u">
                        <img src="img/logo/Login_Web-T-blue.svg" alt="logo_Ttrueque">
                    </div>
                </header>
                <div id="alert"></div>
                <form action="./php/process_account.php?login=true" method="POST">
                    <input type="hidden" name="id" id="id" value="<?php echo empty($id) ? "" : $id ?>">
                    <input type="hidden" name="estado" id="estado" value="<?php echo empty($estado) ? "" : $estado  ?>">
                    <div class="cont-controls-login">
                      <div class="cont-icon-login">
                        <img src="img/iconos_home/home-login-mail.svg" alt="">
                      </div>
                      <input type="email" required maxlength="200" name="email" id="email"
                          placeholder="Correo electrónico o número de celular">
                    </div>
                    <div class="cont-controls-login">
                      <div class="cont-icon-login">
                        <img src="img/iconos_home/home-login-lock.svg" alt="">
                      </div>
                      <input type="password" required maxlength="40" name="pass" id="password_in"
                          placeholder="Ingrese su contraseña">
                    </div>
                    <button type="submit">Iniciar Sesión</button>
                </form>
                <div class="content-register-log-in-u">
                    <div class="content-divisor-log-in-u">
                        <span>o</span>
                    </div>
                    <a role="button" href="account" class="btn-reg-log-in-u">Registrarse</a>
                </div>
            </section>
        </div>
    </div>
    <!-----/FOOTER---->
    <!--<footer class="footer-log-in-u">
		<div class="content-f-log-in-u">
			<ul class="group-f-log-in-u">
				<li><a href="#">Contáctenos</a></li>
				<li><a href="#">Privacidad</a></li>
				<li><a href="#">Acuerdos legales</a></li>
				<li><a href="#">En todo el mundo</a></li>
			</ul>
		</div>
	</footer>-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="./js/actions_pages/account.js"></script>
    <!-- //BOOTSTRAP-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
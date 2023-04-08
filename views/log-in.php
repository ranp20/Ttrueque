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
  	header('location: ./');
  }
}
require_once '../php/class/all.php';
$all = new All();
$paises = $all->get_name_country();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Ttrueque | Login</title>
  <?php require_once 'includes/header_links.php';?>
  <!-- INCLUIR SWEET ALERT 2 -->
  <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
  <script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>
<body id="bd_sign-in">
  <?php //require_once 'includes/inc_header-top-home.php';?>
  <?php
	if(isset($_SESSION["error"])){
		echo "<script>alert('{$_SESSION["error"]}')</script>";
		unset($_SESSION["error"]);
	}else if(isset($_SESSION["success"])){
		echo "<script>alert('{$_SESSION["success"]}')</script>";
		unset($_SESSION["success"]);
	}
	$estado_cadena = explode("-", empty($_GET["link"]) ? "" : $_GET["link"]);
	$id = end($estado_cadena);
	$estado =	strstr(empty($_GET["link"]) ? "" : $_GET["link"], '-' . $id, true);
	?>
  <div class="c-sectMain box-redx">
    <section class="c-sectMain__cLogg">
      <div class="c-sectMain__cLogg__cLogo">
        <a href="./" class="c-sectMain__cLogg__cLogo--link">
          <img src="img/logo/Login_Web-T-blue.svg" alt="logo_Ttrueque" class="img-fluid" width="100" height="100">
        </a>
      </div>
      <div id="alert"></div>
      <form class="c-sectMain__cLogg__cFrm" method="POST" id="frm-loginUserTtrq">
        <input type="hidden" name="id" id="id" value="<?php echo empty($id) ? "" : $id;?>">
        <input type="hidden" name="estado" id="estado" value="<?php echo empty($estado) ? "" : $estado;?>">
        <div class="c-sectMain__cLogg__cFrm__cCtrls">
          <div class="c-sectMain__cLogg__cFrm__cCtrls__cIcon">
            <img src="img/iconos_home/home-login-mail.svg" class="img-fluid" alt="email_svg" width="100" height="100">
          </div>
          <input type="email" class="c-sectMain__cLogg__cFrm__cCtrls__ipt" required maxlength="200" name="email" id="email" placeholder="Ingrese su correo electrónico">
        </div>
        <div class="c-sectMain__cLogg__cFrm__cCtrls">
          <div class="c-sectMain__cLogg__cFrm__cCtrls__cIcon">
            <img src="img/iconos_home/home-login-lock.svg" class="img-fluid" alt="password_svg" width="100" height="100">
          </div>
          <input type="password" autocomplete="true" class="c-sectMain__cLogg__cFrm__cCtrls__ipt" required maxlength="40" name="pass" id="password_in" placeholder="Ingrese su contraseña">
          <div class="c-sectMain__cLogg__cFrm__cCtrls__cIconSecond" id="ic-passCtrlLogg">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="cAccount__cont--fAccount--form--controls--cIcon--pass">
             <path d="M12.015 7c4.751 0 8.063 3.012 9.504 4.636-1.401 1.837-4.713 5.364-9.504 5.364-4.42 0-7.93-3.536-9.478-5.407 1.493-1.647 4.817-4.593 9.478-4.593zm0-2c-7.569 0-12.015 6.551-12.015 6.551s4.835 7.449 12.015 7.449c7.733 0 11.985-7.449 11.985-7.449s-4.291-6.551-11.985-6.551zm-.015 3c-2.209 0-4 1.792-4 4 0 2.209 1.791 4 4 4s4-1.791 4-4c0-2.208-1.791-4-4-4z"></path></svg>
          </div>
        </div>
        <a href="recuperar-contrasena" class="c-sectMain__cLogg__cFrm__linkrecovery">¿Ha olvidado su contraseña?</a>
        <button type="submit">
          <span>Iniciar Sesión</span>
          <span></span>
        </button>
      </form>
      <div class="c-sectMain__cLogg__cReg">
        <div class="c-sectMain__cLogg__cReg__hr">
          <span>o</span>
        </div>
        <a role="button" href="account" class="c-sectMain__cLogg__cReg__link">Registrarse</a>
      </div>
    </section>
  </div>
  <div id="cont-AlertMssgTtrqUsr"></div>
  <script async src="<?= $url;?>js/actions_pages/login.js"></script>
  <script async src="<?= $url;?>js/actions_pages/account.js"></script>
</body>
</html>
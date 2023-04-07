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
<body id="bd_logg-in">
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
          <input type="email" class="c-sectMain__cLogg__cFrm__cCtrls__ipt" required maxlength="200" name="email" id="email" placeholder="Correo electrónico o número de celular">
        </div>
        <div class="c-sectMain__cLogg__cFrm__cCtrls">
          <div class="c-sectMain__cLogg__cFrm__cCtrls__cIcon">
            <img src="img/iconos_home/home-login-lock.svg" class="img-fluid" alt="password_svg" width="100" height="100">
          </div>
          <input type="password" autocomplete="true" class="c-sectMain__cLogg__cFrm__cCtrls__ipt" required maxlength="40" name="pass" id="password_in" placeholder="Ingrese su contraseña">
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
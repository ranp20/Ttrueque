<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
require_once 'php/class/all.php';
$all = new ALl();
$mante = $all->get_mantenience();
$mantenience =  $mante[0]['state_mantenience'];
if($mantenience == 'YES' || $mantenience == 'yes'){
  header('Location: mantenience');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Trueque | Home</title>
<?php require_once 'view_home/header_links-home.php';?>
</head>
<body>
<?php	require_once "view_home/presentacion_b.php";?>
<?php require_once 'view_home/presentacion_texto_b.php';?>
<div id="toTopgobtn"></div>
<script type="text/javascript" src="js/home.js"></script>
</body>
</html>
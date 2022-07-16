<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
require_once "./php/process_header_home.php";
require_once 'php/class/all.php';
$all = new ALl();
$mante = $all->get_mantenience();
$mantenience =  $mante[0]['state_mantenience'];
if($mantenience == 'YES' || $mantenience == 'yes'){
  header('Location: mantenience');
}
$banner_p = $data["banner_principal"];
$path_b_p = "admin/images/banner_principal/";
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Trueque | Home</title>
  <?php require_once 'view_home/header_home.php'; ?>
</head>
<body>
  <div id="page" class="page_index-1">
    <?php	require_once "./view_home/presentacion_b.php";?>
    <main id="contenedor-principal-home">
      <img class="img-fluid" src="<?php echo $path_b_p . $banner_p[0]["link_banner_p"]; ?>" alt="banner_p_ttrq" width="100" height="100">
    </main>
    <div class="cont-totalinfo-in-landingpage-tabs">
      <?php require_once './view_home/presentacion_texto_b.php'; ?>
    </div>
  </div>
  <div id="toTopgobtn"></div>
  <script type="text/javascript" src="js/home.js"></script>
</body>
</html>
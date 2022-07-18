<?php 
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
$url =  $actual_link . "/" ."Ttrueque/";
require_once 'php/class/all.php';
$all = new ALl();
$mante = $all->get_mantenience();
$mantenience =  $mante[0]['state_mantenience'];
if($mantenience == 'NO' || $mantenience == 'no'){
  header('Location: home');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sitio en mantenimiento</title>
  <link rel="icon" href="<?= $url;?>img/icon-pages/drawable-xxxhdpi-icon.png" type="image/ico">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link rel="stylesheet" href="<?= $url;?>views/mantenience/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= $url;?>views/mantenience/css/jquery.countdown.css">
  <link rel="stylesheet" href="<?= $url;?>views/mantenience/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= $url;?>views/mantenience/style.css">
</head>
<body>
  <div class="wrapper">
   <div class="opacity"></div>
    <div class="cont-under-const-site">
      <div class="cont-info-unser-const">
        <img class="logo" src="<?= $url;?>views/mantenience/img/Logo_TTRK.png" alt="logo_ttq_und-const" width="200px">
        <h1>SITIO WEB EN MANTENIMIENTO</h1>
        <p>Nuestro sitio web estará disponible pronto</p>
      </div>
      <input type="hidden" id='count-remove-mant' value="<?= $mante[0]['day'];?>">
    </div>
  </div>
  <script src="<?= $url;?>views/mantenience/js/jquery-3.1.1.min.js"></script>
  <script src="<?= $url;?>views/mantenience/js/bootstrap.min.js"></script>
  <script src="<?= $url;?>views/mantenience/js/jquery.countdown.js"></script>
</body>
</html>
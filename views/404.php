<?php
// session_start();
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
$url =  $actual_link . "/" ."Ttrueque/";
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Ansonika">
  <title>Error 404 | Ttrueque</title>
  <!-- ICON-PAGES -->
  <link rel="icon" href="<?= $url;?>/img/icon-pages/drawable-xxxhdpi-icon.png" type="image/ico">
  <!-- SPECIFIC CSS -->
  <link href="<?= $url;?>css/customs/custom.css" rel="stylesheet">
</head>
<body>
  <div class="err-c_404">
    <div class="cont-info-404">
      <div class="cont-img-info-404">
        <img src="<?= $url;?>img/svg/404_002.svg" alt="404_ttrq_error" width="100" height="100">
      </div>
      <div class="cont-txt-info-404">
        <h1>ERROR!</h1>
        <h3>Lo sentimos, la página que esta buscando no hay sido encontrada.</h3>
        <p>Puede haber caducado o podría haber un error tipográfico. Tal vez pueda encontrar lo que necesita en nuestra página de inicio.</p>
        <div class="cont-btn-before">
          <a href="home">Volver al inicio</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
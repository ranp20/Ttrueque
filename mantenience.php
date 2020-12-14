<?php 
  $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
  $url =  $actual_link . "/" ."Ttrueque/";

  require_once 'php/class/all.php';
  $all = new ALl();
  $mante = $all->get_mantenience();

  //print_r($mante[0]['state_mantenience']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mantenimiento</title>
    <link rel="icon" href="<?php echo $url ?>img/icon-pages/drawable-xxxhdpi-icon.png" type="image/ico">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $url ?>views/mantenience/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $url ?>views/mantenience/css/jquery.countdown.css">
    <link rel="stylesheet" href="<?php echo $url ?>views/mantenience/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $url ?>views/mantenience/style.css">
</head>

<body>
    <div class="wrapper">
        <div class="opacity"></div>
        <div class="cont-under-const-site">
            <div class="cont-info-unser-const">
                <img class="logo" src="<?php echo $url ?>views/mantenience/img/Logo_TTRK.png" alt="logo_ttq_und-const"
                    width="200px">
                <h1>SITIO WEB EN MANTENIMIENTO</h1>
                <p>Nuestro sitio web estará disponible pronto</p>
            </div>

            <input type="hidden" id='idtime' value="<?php echo $mante[0]['id']; ?>">
            <input type="hidden" id='count-remove-desde'
                value="<?php echo   date("d/m/Y", strtotime($mante[0]['desde'])); ?>">
            <input type="hidden" id='count-remove-hasta'
                value="<?php echo   date("d/m/Y", strtotime($mante[0]['hasta']));  ?>">
            <div id="countdown" class="cont-crono-under-const"></div>
        </div>
    </div>
    <script src="<?php echo $url ?>views/mantenience/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo $url ?>views/mantenience/js/bootstrap.min.js"></script>
    <script src="<?php echo $url ?>views/mantenience/js/jquery.countdown.js"></script>
    <script src="<?php echo $url ?>views/mantenience/js/active.js"></script>
</body>

</html>
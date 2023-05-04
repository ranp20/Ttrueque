<?php 
  $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
  $url =  $actual_link . "/" ."Ttrueque/";
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> <?php echo $title ?></title>
  <link rel="icon" href="<?php echo $url ?>img/icon-pages/drawable-xxxhdpi-icon.png" type="image/ico">
  <link rel="preload" href="<?= $url;?>js/plugins/jquery/jquery-3.6.0.min.js" as="script"/>
  <!-- STYLES -->
  <link rel="stylesheet" href="<?php echo $url ?>shop/assets/css/styles.min.css">
  <!-- JQUERY COMPRESSED -->
  <script type="text/javascript" src="<?= $url;?>js/plugins/jquery/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="<?= $url;?>js/actions_pages/language_currency.js"></script>
</head>
<body>
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
  <link rel="preload" href="<?= $url;?>js/plugins/jquery/jquery-3.6.0.min.js" as="script"/>
  <!-- JQUERY COMPRESSED -->
  <script type="text/javascript" src="<?= $url;?>js/plugins/jquery/jquery-3.6.0.min.js"></script>
  <!-- BOOTSTRAP UNCOMPRESSED -->
  <link rel="stylesheet" href="<?= $url;?>js/plugins/bootstrap/css/bootstrap.min.css">
  <script type="text/javascript" src="<?= $url;?>js/plugins/bootstrap/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="<?= $url;?>css/customs/custom.css">
  <link rel="stylesheet" href="<?= $url;?>shop/LineIcons-Package-2.0/WebFont/font-css/LineIcons.css">
  <link rel="stylesheet" href="<?= $url;?>shop/css/style.css" type="text/css">
  <!--//LINEICONS CDN-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.css">
  <script type="text/javascript" src="<?= $url;?>js/actions_pages/language_currency.js"></script>
  <link rel="stylesheet" href="<?php echo $url ?>shop/css/style.css">
  <!-----//ICON-PAGES------>
  <link rel="icon" href="<?php echo $url ?>img/icon-pages/drawable-xxxhdpi-icon.png" type="image/ico">
</head>
<body>
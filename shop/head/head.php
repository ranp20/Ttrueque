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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../../css/customs/custom.css">
  <link rel="stylesheet" href="../../shop/LineIcons-Package-2.0/WebFont/font-css/LineIcons.css">
  <link rel="stylesheet" href="../shop/css/style.css" type="text/css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <!--//LINEICONS CDN-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.css">
  <script type="text/javascript" src="../js/actions_pages/language_currency.js"></script>
  <link rel="stylesheet" href="<?php echo $url ?>shop/css/style.css">
  <!-----//ICON-PAGES------>
  <link rel="icon" href="<?php echo $url ?>img/icon-pages/drawable-xxxhdpi-icon.png" type="image/ico">
</head>
<body>
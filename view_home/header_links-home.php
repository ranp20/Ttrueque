<?php 
  $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
  $url =  $actual_link . "/" ."Ttrueque/";
?>
<!-- //METAS-->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta name="description" content="">
<meta name="author" content="Ttrueque">
<!-- JQUERY - DOWNLOADED PRODUCTION --->
<script src="<?= $url ?>js/jquery-3.6.0.min.js"></script>
<!-- BOOTSTRAP - DONWLOADED PRODUCTION -->
<link rel="stylesheet" href="<?= $url ?>js/bootstrap-4.5.3/css/bootstrap.min.css">
<script src="<?= $url ?>js/bootstrap-4.5.3/js/bootstrap.min.js"></script>
<!-- //FONTAWESOWE -->
<link href="./admin/css/font-awesome.min.css" rel="stylesheet">
<!-- //YOUR CUSTOM CSS -->
<link href="./css/style.css" rel="stylesheet">
<link href="./css/estilos.css" rel="stylesheet">
<link href="./css/customs/custom.css" rel="stylesheet">
<!-- //ICON-PAGES -->
<link rel="icon" href="./img/icon-pages/drawable-xxxhdpi-icon.png" type="image/ico">
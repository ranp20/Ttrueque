<?php 
  $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
  $url =  $actual_link . "/" ."Ttrueque/pwa/";
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="Ttrueque">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- AGREGAR EL NO GUARDADO DE CACHE EN EL NAVEGADOR -->
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
<!-- JQUERY - DOWNLOADED PRODUCTION --->
<script src="<?= $url ?>js/jquery-3.6.0.min.js"></script>
<!-- BOOTSTRAP - DONWLOADED PRODUCTION -->
<link rel="stylesheet" href="<?= $url ?>js/bootstrap-4.5.3/css/bootstrap.min.css">
<script src="<?= $url ?>js/bootstrap-4.5.3/js/bootstrap.min.js"></script>
<!-- //GOOGLE WEB FONTS -->
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Oxygen:wght@300;400;700&family=Quicksand:wght@300;400;500;600;700&family=Raleway:wght@100;200;300;400;500;600;700;800;900&family=Sen:wght@400;700;800&family=Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="<?= $url ?>admin/css/font-awesome.min.css" rel="stylesheet">
<!-- //YOUR CUSTOM CSS -->
<link href="<?= $url ?>css/style.css" rel="stylesheet">
<link href="<?= $url ?>css/cart.css" rel="stylesheet">
<link href="<?= $url ?>css/account.css" rel="stylesheet">
<link href="<?= $url ?>css/contact.css" rel="stylesheet">
<link href="<?= $url ?>css/error_track.css" rel="stylesheet">
<link href="<?= $url ?>css/faq.css" rel="stylesheet">
<link href="<?= $url ?>css/blog.css" rel="stylesheet">
<link href="<?= $url ?>css/checkout.css" rel="stylesheet">
<link href="<?= $url ?>css/estilos.css" rel="stylesheet">
<link href="<?= $url ?>css/customs/custom.css" rel="stylesheet">
<link rel="icon" href="<?= $url ?>img/icon-pages/drawable-xxxhdpi-icon.png" type="image/ico">
<link href="<?= $url ?>css/whatsapp.css" rel="stylesheet">
<script src="<?= $url ?>js/customs.js"></script>
<script src="<?= $url ?>js/customs/custom.js"></script>
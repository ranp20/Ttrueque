<?php 
  $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
  $url =  $actual_link . "/" ."Ttrueque/";
?>
<meta charset="UTF-8"/>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
<meta http-equiv="Pragma" content="no-cache"/>
<meta http-equiv="Expires" content="0"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no, viewport-fit=cover"/>
<meta name="keywords" content="ttrueque, comprar y vender, dinero convencional, comprar y vender en forma segura"/>
<meta name="description" content="Ttrueque te facilita para comprar y vender en forma SEGURA, y sin usar ni arriesgar tu DINERO CONVENCIONAL."/>
<meta name="theme-color" content="#003857"/>
<meta name="author" content="R@np-2021"/>
<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1"/>
<meta name="twitter.card" content="summary"/>
<meta property="og:locale" content="es_ES"/>
<meta property="og:type" content="website"/>
<meta property="og:site_name" content="Ttrueque"/>
<meta property="og:url" name="twitter.url" content="https://localhost/Ttrueque"/>
<meta property="og:title" name="twitter.title" content="Ttrueque"/>
<meta property="og:description" name="twitter.description" content="Ttrueque te facilita para comprar y vender en forma SEGURA, sin usar ni arriesgar tu DINERO CONVENCIONAL."/>
<meta property="og:image" name="twitter.image" content="./img/icon-pages/drawable-xxxhdpi-icon.png"/>
<link rel="icon" type="image/x-icon" href="./img/icon-pages/drawable-xxxhdpi-icon.png"/>
<link rel="apple-touch-icon" href="./img/icon-pages/drawable-xxxhdpi-icon.png"/>
<link rel="canonical" href="https://localhost/Ttrueque"/>
<link rel="icon" href="./img/icon-pages/drawable-xxxhdpi-icon.png" type="image/ico"/>
<!-- PRELOADER FILES -->
<link rel="preload" href="<?= $url;?>assets/css/styles.min.css" as="style"/>
<link rel="preload" href="<?= $url;?>js/plugins/jquery/jquery-3.6.0.min.js" as="script"/>
<!-- JQUERY COMPRESSED -->
<script type="text/javascript" src="<?= $url;?>js/plugins/jquery/jquery-3.6.0.min.js"></script>
<!-- BOOTSTRAP UNCOMPRESSED -->
<link rel="stylesheet" href="<?= $url;?>js/plugins/bootstrap/css/bootstrap.min.css">
<script type="text/javascript" src="<?= $url;?>js/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- STYLESSHEET -->
<link rel="stylesheet" href="<?= $url;?>assets/css/styles.min.css"/>
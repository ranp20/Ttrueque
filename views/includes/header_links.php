<?php 
  $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
  $url =  $actual_link . "/" ."Ttrueque/";
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
<link href="./admin/css/font-awesome.min.css" rel="stylesheet">
<link href="./css/bootstrap.custom.min.css" rel="stylesheet">
<!-- PRELOADER FILES -->
<link rel="preload" href="<?= $url;?>assets/css/styles.min.css" as="style"/>
<link rel="preload" href="<?= $url;?>js/plugins/jquery/jquery-3.6.0.min.js" as="script"/>
<!-- JQUERY COMPRESSED -->
<script type="text/javascript" src="<?= $url;?>js/plugins/jquery/jquery-3.6.0.min.js"></script>
<!-- BOOTSTRAP UNCOMPRESSED -->
<link rel="stylesheet" href="<?php echo $url;?>js/plugins/bootstrap/css/bootstrap.min.css">
<script type="text/javascript" src="<?php echo $url;?>js/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- GOOGLE FONTS -->
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Oxygen:wght@300;400;700&family=Quicksand:wght@300;400;500;600;700&family=Raleway:wght@100;200;300;400;500;600;700;800;900&family=Sen:wght@400;700;800&family=Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<!-- FONTAWESOME -->
<link href="./admin/css/font-awesome.min.css" rel="stylesheet">
<!-- YOUR CUSTOM CSS -->
<link href="./css/style.css" rel="stylesheet">
<link href="./css/cart.css" rel="stylesheet">
<link href="./css/account.css" rel="stylesheet">
<link href="./css/contact.css" rel="stylesheet">
<link href="./css/error_track.css" rel="stylesheet">
<link href="./css/faq.css" rel="stylesheet">
<link href="./css/blog.css" rel="stylesheet">
<link href="./css/checkout.css" rel="stylesheet">
<link href="./css/estilos.css" rel="stylesheet">
<link href="./css/customs/custom.css" rel="stylesheet">
<link rel="icon" href="./img/icon-pages/drawable-xxxhdpi-icon.png" type="image/ico">

<script type="text/javascript" src="./js/customs.js"></script>
<!-- STYLESSHEET -->
<link rel="stylesheet" href="<?= $url;?>assets/css/styles.min.css"/>
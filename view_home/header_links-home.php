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
<link href="./css/style.css" rel="stylesheet">
<link href="./css/estilos.css" rel="stylesheet">
<link href="./css/customs/custom.css" rel="stylesheet">
<link rel="icon" href="./img/icon-pages/drawable-xxxhdpi-icon.png" type="image/ico">
<!-- PRELOADER FILES -->
<link rel="preload" href="<?= $url;?>assets/css/styles.min.css" as="style"/>
<link rel="preload" href="<?= $url;?>js/plugins/jquery/jquery-3.6.0.min.js" as="script"/>
<!-- JQUERY COMPRESSED -->
<script type="text/javascript" src="<?= $url; ?>js/plugins/jquery/jquery-3.6.0.min.js"></script>
<!-- BOOTSTRAP UNCOMPRESSED -->
<link rel="stylesheet" href="<?php echo $url; ?>js/plugins/bootstrap/css/bootstrap.min.css">
<script type="text/javascript" src="<?php echo $url; ?>js/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- STYLESSHEET -->
<link rel="stylesheet" href="<?= $url; ?>assets/css/styles.min.css"/>
<!-- FONTAWESOWE -->
<link href="./admin/css/font-awesome.min.css" rel="stylesheet">
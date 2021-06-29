<?php 
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
$url =  $actual_link . "/" ."Ttrueque/";
?>

<!-- ADD CSS -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/add-to-product.css">
<link rel="stylesheet" href="css/products_v.css">
<link rel="stylesheet" href="css/add-store.css">
<!-- ADD LINEICONS CDN-->
<link rel="stylesheet" href="https://cdn.lineicons.com/2.0/LineIcons.css">
<!-- ADD JQUERY COMPRESSED -->
<script src="js/jquery-3.6.0.min.js"></script>
<!-- SWEEET ALERT 2-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<!-----//ICON-PAGES------>
<link rel="icon" href="<?php echo $url ?>img/icon-pages/drawable-xxxhdpi-icon.png" type="image/ico">
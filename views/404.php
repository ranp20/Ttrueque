<?php
// session_start();
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
$url =  $actual_link . "/" ."Ttrueque/";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>Trueque | Error 404</title>
    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
    <!-----//ICON-PAGES------>
    <link rel="icon" href="<?php echo $url ?>/img/icon-pages/drawable-xxxhdpi-icon.png" type="image/ico">
    <!-- BASE CSS -->
    <link href="<?php echo $url ?>css/bootstrap.custom.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- SPECIFIC CSS -->
    <link href="<?php echo $url ?>css/customs/custom.css" rel="stylesheet">
</head>

<body>
    <div id="page">
        <?php
// 		require_once '../php/process_header.php';
// 		require_once('header_b.php'); 
		?>
        <!-- --- /HEADER PAGE --- --->
        <main class="bg_gray">
            <div id="error_page">
                <div class="cont-404-error">
                    <div class="cont-info-404">
                        <div class="cont-img-info-404">
                            <img src="<?php echo $url ?>img/svg/404_002.svg" alt="404_ttrq_error" class="img-fluid">
                        </div>
                        <div class="cont-txt-info-404">
                            <h1>ERROR 404!</h1>
                            <h3>Lo sentimos, la página que esta buscando no hay sido encontrada.</h3>
                            <p>Puede haber caducado o podría haber un error tipográfico. Tal vez pueda encontrar lo que
                                necesita en nuestra página de inicio.</p>
                            <div class="cont-btn-before">
                                <a href="home">IR AL INICIO</a>
                            </div>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
        </main>
        <?php 
// 	require_once('footer.php');
	?>
        <!--/footer-->
    </div>
    <!-- page -->
    <!-- Back to top button -->
    <div id="toTop"></div>
    <!-- COMMON SCRIPTS -->
    <script type="text/javascript" src="<?php echo $url ?>js/common_scripts.min.js"></script>
    <script type="text/javascript" src="<?php echo $url ?>js/main.js"></script>
</body>

</html>
<?php 
	
	session_start();
	if(!isset($_SESSION['user'])){
		header("location: index.php");
	}

	$nameuser = $_SESSION['user'][0]['nombre_cliente'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home - App WebView</title>
</head>
<body>
	<h1>Hola, <?= $nameuser;?></h1>
	<a href="categories.php">Ir a categorías</a>
	<a href="php/process_logoutWebView.php">Cerrar Sesión</a>
</body>
</html>
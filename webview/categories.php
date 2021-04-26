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
	<title>Categories - App WebView</title>
</head>
<body>
	<h1>Categorías</h1>
	<a href="home.php">Ir a inicio</a>
	<a href="php/process_logoutWebView.php">Cerrar Sesión</a>
</body>
</html>
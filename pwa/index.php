<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login - App WebView</title>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body class="body-loginpwa" style="background-image: url(img/montana-con-el-pico-nevado.jpg);">
	<div id="res-login"></div>
	<div class="content-login">
		<div class="container">
			<div class="cont-form">
				<div class="cont-form--logo">
					<img src="img/logotipo-T-white.svg" alt="" class="cont-form--logo__img">
				</div>
				<form action="" method="POST" class="cont-form__form" id="formLoginWebView">
					<!--<h2 class="cont-form__form--title">INICIAR SESIÓN</h2>-->
					<div class="cont-form__form--controls">
						<label for="email" class="cont-form__form--controls--label">EMAIL</label>
						<input type="email" name="email" class="cont-form__form--controls--input" required>
					</div>
					<div class="cont-form__form--controls">
						<label for="password" class="cont-form__form--controls--label">CONSTRASEÑA</label>
						<input type="password" name="pass" class="cont-form__form--controls--input" required>
					</div>
					<button type="submit" class="cont-form__form--btn-login">INICIAR SESIÓN</button>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/verify-user-login.js"></script>
</body>
</html>
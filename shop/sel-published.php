<?php
session_start();
require_once "../php/class/categoria.php";
$c = new Categoria();
$tienda = $c->get_data_tienda($_SESSION['user']);

if (!isset($tienda[1][0]["id_menbresia"])) {
    header('location: ../cliente/menbresia');
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productos</title>
  <?php require_once 'includes/head.php'; ?>
  <!-- INCLUIR SWEET ALERT 2 -->
  <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">
  <script type="text/javascript" src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>
<body>
  <div class="container-total active">
    <?php require_once 'includes/sidebar-left.php'; ?>
    <section class="content-dash">
      <?php require_once 'includes/header-top.php'; ?>
      <div class="content-dash__cSelPublised">
        <div class="content-dash__cSelPublised--cT">
          <h3 class="content-dash__cSelPublised--cT--title">¿Qué vas a publicar hoy?</h3>
          <ul class="content-dash__cSelPublised--cT--m">
            <li class="content-dash__cSelPublised--cT--m--item">
              <a href="add-product_v.php" class="content-dash__cSelPublised--cT--m--link">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 80" x="0px" y="0px"><g><path d="M23,22a7.968,7.968,0,0,0-2.257-5.556,5.985,5.985,0,0,1,6.455,1.27l1.4-1.428a7.971,7.971,0,0,0-9.6-1.2A7.985,7.985,0,0,0,7,22v4H3a1,1,0,0,0-1,1V61a1,1,0,0,0,1,1H24V60H12V28h3v4h2V28h7V26H23ZM7.832,54.445a1.039,1.039,0,0,0-1.664,0L4,57.7V30.3l2.168,3.252a1,1,0,0,0,1.664,0L10,30.3V57.7ZM9.132,60H4.868L7,56.8ZM7,31.2,4.868,28H9.132ZM9,26V22a5.993,5.993,0,0,1,8.257-5.556A7.968,7.968,0,0,0,15,22v4Zm8-4a5.979,5.979,0,0,1,2-4.459A5.979,5.979,0,0,1,21,22v4H17Z"/><path d="M33.9,15.447A1,1,0,0,0,34,15V8h4v7a1,1,0,0,0,.1.447l6,12,1.79-.894L40,14.764V3a1,1,0,0,0-1-1H33a1,1,0,0,0-1,1V14.764L26.105,26.553A1,1,0,0,0,26,27V61a1,1,0,0,0,1,1h7V60H28V27.236ZM38,4V6H34V4Z"/><path d="M61.859,40.488,58,33.735V30a1,1,0,0,0-1-1H41a1,1,0,0,0-1,1v3.735L36.132,40.5A.993.993,0,0,0,36,41V61a1,1,0,0,0,1,1H61a1,1,0,0,0,1-1V41A.994.994,0,0,0,61.859,40.488ZM59.277,40H54.723L57,36.016ZM42,31H56v2H42Zm-.42,4h13.7L52.42,40h-13.7ZM52,60H38V42H52Zm8,0H54V42h6Z"/></g></svg>
                <span>Producto</span>
              </a>
            </li>
            <li class="content-dash__cSelPublised--cT--m--item">
              <a href="add-service_v.php" class="content-dash__cSelPublised--cT--m--link">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 48 60" enable-background="new 0 0 48 48" xml:space="preserve"><g><path d="M45.4,32.5c-2.3-2.3-5.6-3.2-8.7-2.4L35.5,29c0,0,0,0,0,0c0-0.6-0.2-1.2-0.5-1.8c-0.7-1.1-1.9-1.8-3.1-1.7c0,0,0,0,0-0.1   c0-1-0.4-1.8-1-2.5c-0.7-0.7-1.6-1-2.5-1c0,0,0,0-0.1,0c0-0.9-0.3-1.9-1-2.6c-0.6-0.6-1.3-0.9-2.2-1c0.1-0.8,0-1.7-0.4-2.4   c-0.7-1.1-1.8-1.7-3.1-1.7c-0.3,0-0.6,0-0.8,0.1l-2.9-2.9c0.8-3.1-0.1-6.4-2.4-8.7C13.2,0.4,10-0.5,6.9,0.3C6.5,0.3,6.3,0.6,6.2,1   c-0.1,0.3,0,0.7,0.3,1l4.5,4.5l-4.5,4.5L1.9,6.4C1.7,6.1,1.3,6,1,6.1C0.6,6.2,0.4,6.5,0.3,6.9c-0.8,3.1,0.1,6.3,2.4,8.6   c2.3,2.3,5.6,3.2,8.7,2.4l0.8,0.8C11.5,19.2,11,20,10.8,21c-0.3,1.4-0.7,2.5-1,3.1c-1.1,1.8-1.7,3.6-1.9,5.4l-7.6,6.2   C0.1,35.8,0,36.1,0,36.3c0,0.3,0.1,0.6,0.3,0.8l10.6,10.6c0.2,0.2,0.5,0.3,0.7,0.3c0.2,0,0.4-0.1,0.6-0.2c3.6-2.7,9.8-7.2,11.2-7.6   c2.4-0.9,4.5-2.2,6.3-4l0.4,0.4c-0.8,3.1,0.1,6.4,2.4,8.7c1.7,1.7,4,2.7,6.4,2.7c0.7,0,1.5-0.1,2.2-0.3c0.3-0.1,0.6-0.4,0.7-0.7   c0.1-0.3,0-0.7-0.3-1l-4.5-4.5l4.5-4.5l4.5,4.5c0.3,0.3,0.6,0.4,1,0.3c0.3-0.1,0.6-0.4,0.7-0.7C48.5,38,47.6,34.8,45.4,32.5z    M12.3,16c-0.3-0.3-0.7-0.4-1-0.2C8.7,16.6,6,15.9,4.1,14c-1.3-1.3-2-3-2.1-4.8L5.7,13c0.4,0.4,1,0.4,1.4,0L13,7.1   c0.4-0.4,0.4-1,0-1.4L9.3,2C11.1,2,12.8,2.8,14.1,4c1.9,1.9,2.6,4.7,1.7,7.3c-0.1,0.4,0,0.8,0.2,1l2.9,2.9l-1.1,1.1   c-0.2,0.1-0.9,0.4-3.6,1.1c-0.1,0-0.1,0.1-0.2,0.1L12.3,16z M11.7,45.7l-9.2-9.2l6.4-5.2l9.6,9.6C15.9,42.6,13.1,44.7,11.7,45.7z    M22.7,38.3c-0.5,0.2-1.4,0.7-2.6,1.4L9.9,29.5c0.1-1.5,0.6-3,1.6-4.5c0.5-0.8,0.9-2,1.3-3.7c0.2-1,0.9-1.7,1.9-2   c4-1.1,4.2-1.3,4.5-1.6l1.3-1.3c0.7-0.7,1.9-0.5,2.5,0.3c0.4,0.6,0.2,1.4-0.3,2l-0.4,0.4c-0.4,0.4-0.4,1,0,1.4c0.4,0.4,1,0.4,1.4,0   l0,0c0.6-0.6,1.6-0.6,2.2,0c0.6,0.6,0.6,1.6,0,2.2c-0.2,0.2-0.3,0.5-0.3,0.7c0,0.3,0.1,0.5,0.3,0.7c0.4,0.4,1,0.4,1.4,0   c0.6-0.6,1.6-0.6,2.2,0c0.3,0.3,0.5,0.7,0.5,1.1s-0.2,0.8-0.5,1.1v0c-0.4,0.4-0.4,1,0,1.4s1,0.4,1.4,0c0.7-0.7,1.9-0.5,2.5,0.3   c0.4,0.6,0.2,1.4-0.3,2l-4.4,4.4C26.9,36.2,24.9,37.5,22.7,38.3z M42.3,35c-0.4-0.4-1-0.4-1.4,0L35,40.9c-0.4,0.4-0.4,1,0,1.4   l3.7,3.7c-1.8-0.1-3.5-0.8-4.8-2.1c-1.9-1.9-2.6-4.7-1.7-7.3c0.1-0.4,0-0.8-0.2-1l-0.8-0.8l3.2-3.2c0.2-0.2,0.3-0.3,0.4-0.5   l0.9,0.9c0.3,0.3,0.7,0.4,1,0.2c2.6-0.9,5.3-0.2,7.3,1.7c1.3,1.3,2,3,2.1,4.8L42.3,35z"/></g></svg>
                <span>Servicio</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </section>
  </div>
  <script type="text/javascript" src="js/dashboard.js"></script>
</body>
</html>
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Comentario de productos</title>
  <?php require_once 'includes/head.php'; ?>
</head>

<body>
  <div class="container-total active">
    <!-- LEFT SIDEBAR NAV -->
    <?php require_once 'includes/sidebar-left.php'; ?>
    <!-- CONTENT FULL DASHBOARD -->
    <section class="content-dash">
      <?php require_once 'includes/header-top.php'; ?>
      <div class="content-top">
        <div class="content-title">
          <h1 class="title-dashboard lang_ttrq" key="title-top-reviewproducts-cli-ad_cli">Comentarios de productos</h1>
        </div>
      </div>
      <input type="hidden" name="id_tienda" id="store" value="<?php echo $d[0]["tienda"]; ?>">
      <table class="list-comments">
        <thead class="thead-comments">
          <tr>
            <th class="lang_ttrq" key="title-th-reviewproducts-ad_cli-1">#</th>
            <th class="lang_ttrq" key="title-th-reviewproducts-ad_cli-3">Cliente</th>
            <th class="lang_ttrq" key="title-th-reviewproducts-ad_cli-5">Comentario</th>
            <th class="lang_ttrq" key="title-th-reviewproducts-ad_cli-6">Publicado</th>
          </tr>
        </thead>
        <tbody class="tbody-comments" id="list">
          <!------ TEXTO PROVICIONAL ------>
        </tbody>
      </table>
    </section>
  </div>
  <script src="js/dashboard.js"></script>
  <script src="./js/feedback.js"></script>
</body>

</html>
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
  <title>Comentario de productos</title>
  <?php require_once 'includes/head.php';?>
  <!-- INCLUIR SWEET ALERT 2 -->
  <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">
  <script type="text/javascript" src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>
<body>
  <div class="container-total active">
    <?php require_once 'includes/sidebar-left.php';?>
    <section class="content-dash">
      <?php require_once 'includes/header-top.php';?>
      <main>
        <div class="box">
          <div class="content-top">
            <div class="content-title noimportant-mb">
              <h1 class="title-dashboard lang_ttrq noimportant-mb" key="title-top-reviewproducts-cli-ad_cli">Comentarios de productos</h1>
              <input type="hidden" name="id_tienda" id="store" value="<?php echo $d[0]["tienda"];?>">
            </div>
          </div>
          <div class="bcontent-btns-top" id="contComments-Btnstop">
            <ul class="bcontent-btns-top--m">
              <a href="javascript:void(0);" class="bcontent-btns-top--m--link">
                <li class="bcontent-btns-top--m--item">
                  <div class="bcontent-btns-top--m--item--cImg">
                    <img src="images/utilities/comentarios_products.jpeg" alt="" >
                  </div>
                </li>
              </a>
            </ul>
          </div>
          <div class="cont-tablelist-list-comment">
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
              </tbody>
            </table>
          </div>
        </div>
      </main>
    </section>
  </div>
  <script type="text/javascript" src="js/dashboard.js"></script>
  <script type="text/javascript" src="./js/feedback.js"></script>
</body>
</html>
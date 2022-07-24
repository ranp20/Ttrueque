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
      <div class="content-top">
        <div class="content-title">
          <h1 class="title-dashboard lang_ttrq" key="title-top-products-cli-ad_cli">Productos</h1>
        </div>
      </div>
      <div class="bcontent-btns-top" id="contProducts-Btnstop">
        <ul class="bcontent-btns-top--m">
          <a href="javascript:void(0);" class="bcontent-btns-top--m--link">
            <li class="bcontent-btns-top--m--item">
              <div class="bcontent-btns-top--m--item--cImg">
                <img src="images/utilities/products_total_ttrueque.jpeg" alt="" >
              </div>
              <div class="bcontent-btns-top--m--item--cDesc">
                <h4 id="totalList" class="bcontent-btns-top--m--item--cDesc--conttotal">
                </h4>
                <span class="lang_ttrq bcontent-btns-top--m--item--cDesc--desc" key="txt-down-btn-products-top-ad_cli-1">Productos en mi tienda</span>
              </div>
            </li>
          </a>
          <a href="sel-published.php" class="bcontent-btns-top--m--link">
            <li class="bcontent-btns-top--m--item">
              <div class="bcontent-btns-top--m--item--cImg">
                <img src="images/utilities/add_product_ttrueque.jpeg" alt="" >
              </div>
              <div class="bcontent-btns-top--m--item--cDesc">
                <div class="bcontent-btns-top--m--item--cDesc--cIcon">
                  <i class="lni lni-plus icon-hov"></i>
                </div>
                <span class="lang_ttrq bcontent-btns-top--m--item--cDesc--desc" key="txt-down-btn-products-top-ad_cli-2">Agregar nuevo producto</span>
              </div>
            </li>
          </a>
        </ul>
        <input type="hidden" name="tienda" id="tienda" value="<?php echo $d[0]["tienda"]; ?>">
        <input type="hidden" name="email" id="email" value="<?php echo $d[0]["email_cliente"]; ?>">
      </div>
      <div class="content-list-products-ad_cli-ttrk" id="content-list-products-ad_cli-ttrk">
        <table class="list-products">
          <thead class="thead-products">
            <tr>
              <th class="lang_ttrq" key="title-th-products-ad_cli-1">#</th>
              <th class="lang_ttrq" key="title-th-products-ad_cli-2">Categoría</th>
              <th class="lang_ttrq" key="title-th-products-ad_cli-3">Marca</th>
              <th class="lang_ttrq" key="title-th-products-ad_cli-4">Nombre producto</th>
              <th class="lang_ttrq" key="title-th-products-ad_cli-5">Descripción</th>
              <th class="lang_ttrq" key="title-th-products-ad_cli-6">Precio</th>
              <th class="lang_ttrq" key="title-th-products-ad_cli-7">Stock</th>
              <th class="lang_ttrq" key="title-th-products-ad_cli-8">Imagen</th>
              <th class="lang_ttrq" key="title-th-products-ad_cli-9" colspan="2">Opciones</th>
            </tr>
          </thead>
          <tbody class="tbody-products" id="list">
          </tbody>
        </table>
      </div>
    </section>
  </div>
  <script type="text/javascript" src="./js/product.js"></script>
  <script type="text/javascript" src="js/dashboard.js"></script>
</body>
</html>
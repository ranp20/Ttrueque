<?php
session_start();
require_once "../php/class/categoria.php";
$c = new Categoria();
$tienda = $c->get_data_tienda($_SESSION['user']);
if (!isset($tienda[1][0]["id_menbresia"])) {
     header('location: ../cliente/menbresia');
}

require_once '../php/class/all.php';
$c = new All;
$categories = $c->get_categorias();

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
      <div class="content-top cont-titles-t-c-dinamic">
        <div class="content-title t-c-titles-dinamic">
          <h1 class="title-dashboard lang_ttrq" key='title-categories' id="titles-dinamic-t-c">Categorías</h1>
        </div>
      </div>
      <div class="btns-top">
        <ul class="btns-options-trademarks-categories">
          <!--<a href="#trademarks" class="trademarks-categories-detail">
            <li>
              <div class="content-icons">
                <i class="lni lni-dropbox icon-hov"></i>
              </div>
              <div>
                <h4 id="totalList">0</h4>
              </div>
              <p class='lang_ttrq' key='title-trademarks'>Marcas</p>
            </li>
          </a>-->
          <a href="#categories" class="trademarks-categories-detail">
            <li>
              <div class="content-icons">
                <i class="lni lni-control-panel"></i>
              </div>
              <div>
                <h4 id="totalList_categories">0</h4>
              </div>
              <p class='lang_ttrq' key='title-categories'>Categorías</p>
            </li>
          </a>
        </ul>
      </div>
      <input type="hidden" name="tienda" id="tienda" value="<?php echo $_SESSION['idtienda_m']; ?>">
      <!-- //CONTENT TRADEMARKS & CATEGORIES -->
      <div class="content-change-dinamic-view-t-c">
        <!--<div class="contents_items_t-c-dinamic" id="trademarks">
          <div class="trademarks_categories-controls">
            <label for="" class="label-trademarks_categories lang_ttrq" key='title-name-of-trademarks'>Nombre de la Marca</label>
            <input type="text" name="name" id="name">
            <button class="btn-add-product lang_ttrq" id="btn-add-marca" key='title-name-of-save'>Guardar</button>
          </div> 
          <div class="cont-tablelist-trademarks">
            <table class="list-trademarks_categories">
              <thead class="thead-trademarks_categories">
                <tr>
                  <th>ID</th>
                  <th class='lang_ttrq' key='title-name-of-trademark'>Nombre Marca</th>
                  <th colspan='2' class='lang_ttrq' key='title-options-of-trademark'>Opciones</th>
                </tr>
              </thead>
              <tbody class="tbody-trademarks_categories" id="list">
              </tbody>
            </table>
          </div>  
        </div>-->
        <div class="contents_items_t-c-dinamic" id="categories">
          <div class="trademarks_categories-controls">
            <label for="" class="label-trademarks_categories lang_ttrq" key='title-name-of-categories'>Nombre de la Categoría</label>
            <select name="categories_list_admin" id="categories_list_admin" class="select-onehidden">
              <option value="0">Selecciona una Categoría</option>
              <?php
              foreach ($categories as $val) {
                echo "
                      <option value='{$val['id_categoria']}'>{$val['nombre_categoria']}</option>
                  ";
              }
              ?>
            </select>
            <button class="btn-add-product lang_ttrq" id="btn-add-categoria_tienda" key='title-name-of-save'>Guardar</button>
          </div> <!-- CATEGORÍA DEL PRODUCTO -->
          <div class="cont-tablelist-trademarks">
            <table class="list-trademarks_categories">
              <thead class="thead-trademarks_categories">
                <tr>
                  <th class='lang_ttrq' key='title-id-categories'>ID</th>
                  <th class='lang_ttrq' key='title-name-of-categoria'>Nombre Categoría</th>
                  <th class='lang_ttrq' colspan='2' key='title-opts-of-categories'>Opciones</th>
                </tr>
              </thead>
              <tbody class="tbody-trademarks_categories" id="list_categories_tienda">
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!--<script type="text/javascript" src="./js/marca.js"></script>-->
  <script type="text/javascript" src="./js/categorias.js"></script>
  <script type="text/javascript" src="./js/dashboard.js"></script>
</body>
</html>
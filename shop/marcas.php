<?php
session_start();
require_once '../php/class/all.php';
$c = new All;
$categories = $c->get_categorias();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productos</title>
  <?php require_once 'includes/head.php'; ?>
</head>

<body>
  <div class="container-total active">
    <?php require_once 'includes/sidebar-left.php'; ?>
    <section class="content-dash">
      <?php require_once 'includes/header-top.php'; ?>
      <div class="content-top cont-titles-t-c-dinamic">
        <div class="content-title t-c-titles-dinamic">
          <h1 class="title-dashboard" id="titles-dinamic-t-c">Marcas</h1>
        </div>
      </div>
      <div class="btns-top">
        <ul class="btns-options-trademarks-categories">
          <a href="#trademarks" class="trademarks-categories-detail">
            <li>
              <div class="content-icons">
                <i class="lni lni-dropbox icon-hov"></i>
              </div>
              <div>
                <h4 id="totalList">0</h4>
              </div>
              <p>Marcas</p>
            </li>
          </a>
          <a href="#categories" class="trademarks-categories-detail">
            <li>
              <div class="content-icons">
                <i class="lni lni-control-panel"></i>
              </div>
              <div>
                <h4 id="totalList_categories">0</h4>
              </div>
              <p>Categorías</p>
            </li>
          </a>
        </ul>
      </div>
      <input type="hidden" name="tienda" id="tienda" value="<?php echo $_SESSION['idtienda_m']; ?>">
      <!-- //CONTENT TRADEMARKS & CATEGORIES -->
      <div class="content-change-dinamic-view-t-c">
        <div class="contents_items_t-c-dinamic" id="trademarks">
          <div class="trademarks_categories-controls">
            <label for="" class="label-trademarks_categories">Nombre de la Marca</label>
            <input type="text" name="name" id="name">
            <button class="btn-add-product" id="btn-add-marca">Guardar</button>
          </div> <!-- CATEGORÍA DEL PRODUCTO -->
          <table class="list-trademarks_categories">
            <thead class="thead-trademarks_categories">
              <tr>
                <th>ID</th>
                <th>Nombre Marca</th>
                <th colspan='2'>Opciones</th>
              </tr>
            </thead>
            <tbody class="tbody-trademarks_categories" id="list">
            </tbody>
          </table>
        </div>
        <div class="contents_items_t-c-dinamic" id="categories">
          <div class="trademarks_categories-controls">
            <label for="" class="label-trademarks_categories">Nombre de la Categoría</label>
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
            <button class="btn-add-product" id="btn-add-categoria_tienda">Guardar</button>
          </div> <!-- CATEGORÍA DEL PRODUCTO -->
          <table class="list-trademarks_categories">
            <thead class="thead-trademarks_categories">
              <tr>
                <th>ID</th>
                <th>Nombre Categoría</th>
                <th colspan='2'>Opciones</th>
              </tr>
            </thead>
            <tbody class="tbody-trademarks_categories" id="list_categories_tienda">
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>
  <script src="./js/marca.js"></script>
  <script src="./js/categorias.js"></script>
  <script src="./js/dashboard.js"></script>
</body>
</html>
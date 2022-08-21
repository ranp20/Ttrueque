<?php
session_start();

if (!isset($_SESSION['user_admin'])) {
  header('location:index.php');
}

if (isset($_SESSION['msg'])) {
  echo "<script>alert('{$_SESSION["msg"]}')</script>";
  unset($_SESSION["msg"]);
}

require_once "../php/class/all.php";
$a = new All();
$cat = $a->get_categorias();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php require_once 'includes/header_links.php'?>
  <title>Trueque | Agregar Productos</title>
</head>
<body>
  <?php include('includes/header.php'); ?>
  <div class="ts-main-content">
    <?php require_once 'includes/adm_sidebar-left.php';?>
    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="row fila-contenedor-add-items_all">
          <div class="col-12 my-4 col-md-6 content-add-items_all">
            <!-- TÍTULO DEL ITEM Y BOTON DE LISTADO DE ITEMS -->
            <div id="content-title-add">
              <h2 class="page-title">Agregar Subcategoria&nbsp;<i class="fa fa-plus"></i>
              </h2>
              <a href="manage-subcategory.php" id="button-list-left-header"><i class="fa fa-list" id="icon-btn-list"></i>Listar Subcategorías</a>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <p class="h6">Campos del formulario</p>
                  </div>
                  <div class="panel-body">
                    <div class="row m-0">
                      <div class="col-md-12">
                        <form action="../php/process_admin_add_subcategory.php" method="POST" id="form-add-product">
                          <!-- SECCIÓN -  NOMBRES DE LAS CATEGORÍAS -->
                          <div class="form-group">
                            <label for="categoria">Nombre de la Categoría</label>
                            <select id="categorias" name="categorias" required class="form-control select-onehidden">
                              <option value="0" selected>Selecciona la categoria</option>
                              <?php
                              foreach ($cat as $value) {
                                echo "<option value='{$value["id_categoria"]}'>{$value["nombre_categoria"]}</option>";
                              }
                              ?>
                            </select>
                          </div>
                          <!-- SECCIÓN -  NOMBRE DE LA SUBCATEGORÍA -->
                          <div class="form-group">
                            <label for="subcategoria">Nombre Subcategoría</label>
                            <input type="text" maxlength="100" required name="subcategoria" id="subcategoria" class="form-control">
                          </div>
                          <div class="form-group mt-4">
                            <input type="submit" name="submit_2" id="submit" value="Guardar" class="form-control btn-primary">
                          </div>
                        </form>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Loading Scripts -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap-select.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript" src="js/Chart.min.js"></script>
  <script type="text/javascript" src="js/fileinput.js"></script>
  <script type="text/javascript" src="js/chartData.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
  <script type="text/javascript" src="js/customs.js"></script>
</body>
</html>
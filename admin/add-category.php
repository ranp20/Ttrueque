<?php
session_start();

if (!isset($_SESSION['user_admin'])) {
  header('location:index.php');
}

if (isset($_SESSION['msg'])) {
  echo "<script>alert('{$_SESSION["msg"]}')</script>";
  unset($_SESSION["msg"]);
}

?>
<!doctype html>
<html lang="en" class="no-js">
<head>
  <?php require_once 'includes/header_links.php'?>
  <title>Trueque | Agregar Productos</title>
</head>
<body>
  <?php include('includes/header.php'); ?>
  <div class="ts-main-content">
    <?php include('includes/leftbar.php'); ?>
    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="row fila-contenedor-add-items_all">
          <div class="col-12 my-4 col-md-6 content-add-items_all">
            <!-- TÍTULO DEL ITEM Y BOTON DE LISTADO DE ITEMS -->
            <div id="content-title-add">
              <h2 class="page-title">Agregar Categoria&nbsp;<i class="fa fa-plus"></i>
              </h2>
              <a href="manage-category.php" id="button-list-left-header"><i class="fa fa-list" id="icon-btn-list"></i>Listar Categorías</a>
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
                        <form action="../php/process_admin_add_category.php" method="POST" enctype="multipart/form-data" id="form-add-product">
                          <!-- SECCIÓN -  NOMBRE DE LA CATEGORÍA -->
                          <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" maxlength="100" required name="name" id="name" class="form-control">
                          </div>
                          <!-- SECCIÓN -  IMAGEN DE LA CATEGORÍA -->
                          <div class="form-group">
                            <label for="customfile">Imagen de la Categoría</label>
                            <div class="custom-file">
                              <input type="file" required name="image" class="custom-file-input" multiple id="imagenes" accept="image/*">
                              <label class="custom-file-label" for="imagenes">Choose file</label>
                            </div>
                          </div>
                          <div class="form-group mt-4">
                            <input type="submit" name="submit" id="submit" value="Guardar" class="form-control btn-primary">
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
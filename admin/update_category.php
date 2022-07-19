<?php
session_start();

if (!isset($_SESSION["user_admin"])) {
  header("Location: index.php");
}

if (isset($_GET['id'])) {
  require_once '../php/class/categoria.php';
  $c = new Categoria();
  $cat = $c->get_category_by_id($_GET['id']);
  if (count($cat) == 0) {
    header('Location: manage-category.php');
  }
}
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
  <?php require_once 'includes/header_links.php'?>
  <title>Trueque | Editar Productos</title>
</head>
<body>
  <?php include('includes/header.php'); ?>
  <div class="ts-main-content">
    <?php include('includes/leftbar.php'); ?>
    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="row  fila-contenedor-add-items_all">
          <div class="col-12 my-4 col-md-7 content-add-items_all">
            <!-- TÍTULO DEL ITEM Y BOTON DE LISTADO DE ITEMS -->
            <div id="content-title-add">
              <h2 class="page-title">Actualizar Categoría&nbsp;<i class="fa fa-pencil"></i></h2>
                <a href="manage-category.php" id="button-list-left-header"><i class="fa fa-list" id="icon-btn-list"></i>Lista de Categorías</a>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-default">
                  <div class="panel-heading"><p class="h6">Campos del formulario</p></div>
                  <div class="panel-body" style="padding: 2rem 2rem 0 2rem !important;">
                    <div class="row m-0">
                      <div class="col-md-12">
                        <form action="../php/process_admin_update_category.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                          <input type="hidden" name="id" value="<?php echo $cat[0]['id_categoria'] ?>"></input>
                          <!-- SECCIÓN CATEGORÍA -->
                          <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" maxlength="100" value="<?php echo $cat[0]['nombre_categoria'] ?>" required name="name" id="name" class="form-control">
                          </div>
                          <!-- SECCIÓN -  IMAGEN DE LA CATEGORÍA  -->
                          <div class="form-group">
                            <label for="customfile">Imagen de la Categoría</label>
                            <div class="custom-file img-prod-div">
                              <input type="file" value="<?php echo $cat[0]['imagen_categoria'] ?>" name="image" class="custom-file-input" multiple id="imagenes" accept="image/*">
                              <input type="hidden" value="<?php echo $cat[0]['imagen_categoria'] ?>" name="image">
                              <label class="custom-file-label" for="imagenes" maxlength="300"><?php echo $cat[0]['imagen_categoria'] ?></label>
                              <?php
                              echo "
                                <div class='content-img-prod-updt'>
                                  <img src='images/categoria/{$cat[0]['imagen_categoria']}' alt='foto_de_la_categoría' height='250'></img>
                                </div>";
                              ?>
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
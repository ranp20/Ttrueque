<?php
session_start();

if (!isset($_SESSION["adm-logg_ttrueque"])) {
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
          <div class="d-flex flex-column my-4 col-md-6">
            <div id="content-title-add">
              <a href="manage-subcategory.php" class="btn btn-success py-2 px-3">Volver</a>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card panel panel-default">
                  <div class="card-header panel-heading">
                    <h3 class="mb-0">Agregar subcategoría</h3>
                  </div>
                  <div class="card-body panel-body">
                    <div class="row m-0">
                      <div class="col-md-12">
                        <form action="../php/process_admin_add_subcategory.php" method="POST" id="form-add-product">
                          <div class="form-group mb-2">
                            <label for="categoria">Nombre de la Categoría</label>
                            <select id="categorias" name="categorias" required class="form-control select-onehidden">
                              <option value="0" selected>Selecciona la categoria</option>
                              <?php
                                foreach($cat as $value){
                                  echo "<option value='{$value["id_categoria"]}'>{$value["nombre_categoria"]}</option>";
                                }
                              ?>
                            </select>
                          </div>
                          <div class="form-group mb-2">
                            <label for="subcategoria">Nombre Subcategoría</label>
                            <input type="text" maxlength="100" required name="subcategoria" id="subcategoria" class="form-control">
                          </div>
                          <div class="form-group mt-4">
                            <input type="submit" name="submit_2" id="submit" value="Guardar" class="form-control btn btn-primary">
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
  <script type="text/javascript" src="js/bootstrap-select.min.js"></script>
  <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
  <script type="text/javascript" src="js/customs.js"></script>
</body>
</html>
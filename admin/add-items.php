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
require_once "../php/class/admin.php";
$a = new All();
$categorias = $a->get_categorias();
$pais = $a->get_name_country();
$all = new Admin();
$admin = $all->get_admin();

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
              <h2 class="page-title">Agregar Producto&nbsp;<i class="fa fa-plus"></i>
              </h2>
              <a href="manage-items.php" id="button-list-left-header"><i class="fa fa-list" id="icon-btn-list"></i>Lista de Productos</a>
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
                        <!---------------------->
                        <form action="../php/process_admin_add_product.php" method="POST" enctype="multipart/form-data" id="form-add-product">
                          <input type="hidden" name="user" required id="user" class="form-control" value="<?php echo $admin[0]['id_admin']; ?>">
                          <!------------------>
                          <div class="primer-content-form">
                            <div class="form-group">
                              <label for="categoria">Categoria</label>
                              <select id="list_categories" name="categoria" required class="form-control select-onehidden">
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="stock">Stock</label>
                              <input type="number" required name="stock" id="stock" class="form-control">
                            </div>
                          </div>
                          <!------------------>
                          <div class="segundo-content-form">
                            <div class="form-group">
                              <label for="marca">Marca</label>
                              <input type="text" required name="marca" id="marca" class="form-control">
                            </div>
                            <div class="form-group">
                              <label for="precio">Precio</label>
                              <input type="number" required name="precio" id="precio" class="form-control">
                            </div>
                          </div>
                          <!------------------>
                          <div class="tercer-content-form">
                            <div class="form-group">
                              <label for="name">Nombre del producto</label>
                              <input type="text" maxlength="100" required name="name" id="name" class="form-control">
                            </div>
                          </div>
                          <!------------------>
                          <div class="cuarto-content-form">
                            <div class="form-group ">
                              <label for="pais">País</label>
                              <select id="pais" name="pais" required class="form-control select-onehidden" name="pais">
                                <option value="0" selected>Selecciona el País</option>
                                <?php
                                  foreach ($pais as $value) {
                                    echo "<option value='{$value["id_pais"]}'>{$value["nombre_pais"]}</option>";
                                  }
                                ?>
                              </select>
                            </div>
                          </div>
                          <!------------------>
                          <div class="quinto-content-form">
                            <div class="form-group">
                              <div class="form-group">
                                <label for="desc">Descripcion</label>
                                <textarea required name="desc" id="desc" cols="30" rows="5" class="form-control"></textarea>
                              </div>
                            </div>
                          </div>
                          <!------------------>
                          <div class="sexto-content-form">
                            <div class="form-group">
                              <label for="customfile">Imagen del Producto</label>
                              <div class="custom-file">
                                <input type="file" required name="image[]" class="custom-file-input" multiple id="imagenes" accept="image/*">
                                <label class="custom-file-label" for="imagenes">Choose file</label>
                              </div>
                            </div>
                          </div>
                          <div class="form-group mt-4">
                            <input type="submit" name="submit" id="submit" value="Guardar" class="form-control btn-primary">
                          </div>
                        </form>
                        <!---------------------->
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
  <script type="text/javascript" src="../js/actions_pages/listCategryandSub.js"></script>
</body>
</html>
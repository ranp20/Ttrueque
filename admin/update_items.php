<?php
session_start();

if (!isset($_SESSION['user_admin'])) {
  header('location:index.php');
}

if (isset($_SESSION['msg'])) {
  echo "<script>alert('{$_SESSION["msg"]}')</script>";
  unset($_SESSION["msg"]);
}

require_once '../php/class/all.php';
$a = new ALl();
$admin = $a->get_admin();
$cat = $a->get_categorias();
$pais = $a->get_name_country();

if (isset($_GET['id'])) {
  require_once "../php/class/product.php";
  $p = new Product();
  $data = $p->get_data_admin_by_id($_GET['id']);

  if (count($data) == 0) {
    header('location:manage-items.php');
  }
} else {
  header('location:manage-items.php');
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php require_once 'includes/header_links.php'?>
  <title>Trueque | Editar Productos</title>
</head>
<body>
  <?php include('includes/header.php'); ?>
  <div class="ts-main-content">
    <?php require_once 'includes/adm_sidebar-left.php';?>
    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="row fila-contenedor-add-items_all">
          <div class="col-12 my-4 col-md-7 content-add-items_all">
            <!-- TÍTULO DEL ITEM Y BOTON DE LISTADO DE ITEMS -->
            <div id="content-title-add">
              <h2 class="page-title">Actualizar Producto&nbsp;<i class="fa fa-pencil"></i></h2>
              <a href="manage-items.php" id="button-list-left-header"><i class="fa fa-list" id="icon-btn-list"></i>Lista de Productos</a>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-default">
                  <div class="panel-heading"><p class="h6">Campos del formulario</p></div>
                  <div class="panel-body">
                    <div class="row m-0">
                      <div class="col-md-12">
                        <!----------------------------->
                        <form action="../php/process_admin_update_items.php" method="POST" enctype="multipart/form-data" id="form-add-product">
                          <input type="hidden" name="id" value="<?php echo $data[0]['id']; ?>">
                          <!--------------------->
                          <div class="cero-content-form">
                            <div class="form-group">
                              <label for="user">Nombre de Tienda/Vendedor</label>
                              <select name="user" required id="user" class="form-control select-onehidden">
                                <option value="<?php echo $data[0]["id_admin"]; ?>" selected><?php echo $data[0]["nombre_admin"]; ?></option>
                                <?php
                                  foreach ($admin as $val) {
                                    echo "<option value='{$val["id_admin"]}'>{$val["nombre_admin"]}</option>";
                                  }
                                ?>
                              </select>
                            </div>
                          </div>
                          <!--------------------->
                          <div class="primer-content-form">
                            <div class="form-group">
                              <label for="categoria">Categoria</label>
                              <select name="categoria" required class="form-control select-onehidden">
                                <option value="<?php echo $data[0]['id_categoria']; ?>" selected><?php echo $data[0]['nombre_categoria']; ?></option>
                                <?php
                                  foreach ($cat as $v) {
                                    echo "<option value='{$v["id_categoria"]}'>{$v["nombre_categoria"]}</option>";
                                  }
                                ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="stock">Stock</label>
                              <input type="number" required name="stock" id="stock" class="form-control" value="<?php echo $data[0]['stock']; ?>">
                            </div>
                          </div>
                          <!--------------------->
                          <div class="segundo-content-form">
                            <div class="form-group">
                              <label for="marca">Marca</label>
                              <input type="text" required name="marca" id="marca" class="form-control" value="<?php echo $data[0]['marca']; ?>">
                            </div>
                            <div class="form-group">
                              <label for="precio">Precio</label>
                              <input type="number" required name="precio" id="precio" class="form-control" value="<?php echo $data[0]['precio']; ?>">
                            </div>
                          </div>
                          <!--------------------->
                          <div class="tercer-content-form">
                            <div class="form-group">
                              <div class="form-group" id="form-group_desc">
                                <label for="name">Nombre</label>
                                <input type="text" maxlength="100" required name="name" id="name" class="form-control" value="<?php echo $data[0]['nombre']; ?>">
                              </div>
                            </div>
                          </div>
                          <!--------------------->
                          <div class="cuarto-content-form">
                            <div class="form-group">
                              <label for="pais">País</label>
                              <select id="pais" name="pais" required class="form-control select-onehidden">
                                <?php
                                  foreach ($pais as $value) {
                                    echo "<option value='{$value["id_pais"]}'>{$value["nombre_pais"]}</option>";
                                  }
                                ?>
                              </select>
                            </div>
                          </div>
                          <!--------------------->
                          <div class="quinto-content-form">
                            <div class="form-group">
                              <div class="form-group">
                                <label for="desc">Descripcion</label>
                                <textarea required name="desc" id="desc" cols="30" rows="5" class="form-control"><?php echo $data[0]['descripcion']; ?></textarea>
                              </div>
                            </div>
                          </div>
                          <!--------------------->
                          <div class="sexto-content-form">
                            <div class="form-group">
                              <label for="customfile">Imagen del Producto </label>
                              <div class="custom-file img-prod-div">
                                <input type="text" value="<?php echo $data[0]['imagen'] ?>" name="image">
                                <input type="file" name="image" class="custom-file-input" id="imagenes" accept="image/*">
                                <label class="custom-file-label" for="imagenes" maxlength="300"><?php echo $data[0]['imagen'] ?></label>
                                <?php
                                echo "
                                <div class='content-img-prod-updt'>
                                  <img src='images/products/{$data[0]['imagen']}' alt='foto_del_producto' height='250'></img>
                                </div>";
                                ?>
                              </div>
                            </div>
                          </div>
                          <!--------------------->
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
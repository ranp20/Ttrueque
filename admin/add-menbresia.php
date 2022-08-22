<?php
session_start();
if(isset($_SESSION["adm-logg_ttrueque"])){
  if(isset($_SESSION['msg'])){
    echo "<script>alert('{$_SESSION["msg"]}')</script>";
    unset($_SESSION["msg"]);
  }
}else{
  header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php require_once 'includes/header_links.php';?>
  <title>Trueque | Agregar Productos</title>
</head>
<body>
  <div id="dash-contT">
    <?php require_once 'includes/adm_sidebar-left.php';?>
    <main id="main-dashCamel">
      <?php require_once 'includes/adm_header-top.php';?>

      <div class="content-wrapper">
          <div class="container-fluid">
              <div class="row fila-contenedor-add-items_all">
                  <div class="col-12 my-4 col-md-6 content-add-items_all">
                      <!-- TÍTULO DEL ITEM Y BOTON DE LISTADO DE ITEMS -->
                      <div id="content-title-add">
                          <h2 class="page-title">Agregar Menbresía&nbsp;<i class="fa fa-plus"></i>
                          </h2>
                          <a href="manage-menbresia.php" id="button-list-left-header"><i class="fa fa-list" id="icon-btn-list"></i>Listar Menbresía</a>
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
                                              <form action="../php/process_admin_add_menbresia.php" method="POST" enctype="multipart/form-data" id="form-add-product">
                                                  <!-- SECCIÓN -  IMAGEN DE LA MENBRESÍA -->
                                                  <div class="form-group">
                                                      <label for="customfile">Imagen de la Menbresía</label>
                                                      <div class="custom-file">
                                                          <input type="file" required name="image" class="custom-file-input" id="imagenes" accept="image/*">
                                                          <label class="custom-file-label" for="imagenes">Choose file</label>
                                                      </div>
                                                  </div>
                                                  <!-- SECCIÓN -  NOMBRE DE LA CATEGORÍA -->
                                                  <div class="form-group">
                                                      <div class="form-group">
                                                          <label for="name">Tipo de Menbresia</label>
                                                          <input type="text" maxlength="100" required name="tipo" id="tipo" class="form-control">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <div class="form-group">
                                                          <label for="name">Cantidad de productos a subir</label>
                                                          <input type="number" maxlength="10" required name="cantidad" id="tipo" class="form-control">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <div class="form-group">
                                                          <label for="name">Precio</label>
                                                          <input type="text" maxlength="100" required name="precio-eeuu" id="price-eeuu" class="form-control">
                                                      </div>
                                                  </div>
                                                  <div class="product-content">
                                                      <div class="form-content">
                                                          <div class="product-controls-desc">
                                                              <label for="" class="label-product-desc">Descripción</label>
                                                              <textarea id="ckeditor" name="desc" class="ckeditor" cols="30" rows="10"></textarea>
                                                          </div>
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

    </main>
  </div>
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
  <script type="text/javascript" src="js/currency.js"></script>
</body>
</html>
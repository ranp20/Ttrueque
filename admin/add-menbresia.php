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
            <div class="d-flex flex-column my-4 col-md-6">
              <div class="ms-auto mb-2" id="content-title-add">
                <a href="manage-menbresia.php" class="btn btn-success py-2 px-3">Volver</a>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card panel panel-default">
                    <div class="card-header panel-heading">
                      <h3 class="mb-0">Agregar menbresía</h3>
                    </div>
                    <div class="card-body panel-body">
                      <div class="row m-0">
                        <div class="col-md-12">
                          <form action="../php/process_admin_add_menbresia.php" method="POST" enctype="multipart/form-data" id="form-add-product">
                            <div class="form-group mb-2">
                              <label for="customfile">Imagen de la Menbresía</label>
                              <div class="custom-file">
                                <input type="file" required name="image" class="form-control custom-file-input" id="imagenes" accept="image/*">
                                <label class="custom-file-label" for="imagenes">Choose file</label>
                              </div>
                            </div>
                            <div class="form-group mb-2">
                              <label for="name">Tipo de Menbresia</label>
                              <input type="text" maxlength="100" required name="tipo" id="tipo" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                              <label for="name">Cantidad de productos a subir</label>
                              <input type="number" maxlength="10" required name="cantidad" id="tipo" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                              <label for="name">Precio</label>
                              <input type="text" maxlength="100" required name="precio-eeuu" id="price-eeuu" class="form-control">
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
                              <input type="submit" name="submit" id="submit" value="Guardar" class="form-control btn btn-primary">
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
  <script type="text/javascript" src="js/bootstrap-select.min.js"></script>
  <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
  <script type="text/javascript" src="js/customs.js"></script>
  <script type="text/javascript" src="js/currency.js"></script>
</body>
</html>
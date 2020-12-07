<?php
session_start();

if (!isset($_SESSION["user_admin"])) {
    header("Location: index.php");
}

if (isset($_GET['id'])) {
  require_once '../php/class/menbresia.php';
  $c = new Menbresia();
  $cat = $c->get_menbresia_by_id($_GET['id']);
  if (count($cat) == 0) {
      header('Location: manage-menbresia.php');
  }
}
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
  <?php require_once 'includes/header_links.php' ?>
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
            <?php //print_r($cat); 
            ?>
            <div id="content-title-add">
                <h2 class="page-title">Actualizar Menbresía&nbsp;<i class="fa fa-pencil"></i></h2>
                <a href="manage-menbresia.php" id="button-list-left-header"><i class="fa fa-list" id="icon-btn-list"></i>Lista de Menbresía</a>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-default">
                <div class="panel-heading"><p class="h6">Campos del formulario</p></div>
                <div class="panel-body">
                  <div class="row m-0">
                      <div class="col-md-12">
                        <form action="../php/process_admin_update_menbresia.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                          <input type="hidden" name="id" value="<?php echo $cat[0]['id'] ?>"></input>
                          <!-- SECCIÓN -  IMAGEN DE LA MENBwRESÍA  -->
                          <div class="form-group">
                            <label for="customfile">Imagen de la Menbresía</label>
                            <div class="custom-file img-prod-div">
                                <input type="file" value="<?php echo $cat[0]['image'] ?>" name="image" class="custom-file-input" id="imagenes" accept="image/*">
                                <input type="hidden" value="<?php echo $cat[0]['image'] ?>" name="image">
                                <label class="custom-file-label" for="imagenes" maxlength="300"><?php echo $cat[0]['image'] ?></label>
                                <?php
                                echo "<div class='content-img-prod-updt'>
                                    <img src='images/menbresia/{$cat[0]['image']}' alt='foto_de_la_categoría' height='250'></img>
                                   </div>"
                                ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="tipo">Tipo</label>
                            <input type="text" maxlength="100" value="<?php echo $cat[0]['tipo'] ?>" required name="tipo" id="tipo" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="cantidad">Cantidad</label>
                            <input type="number" maxlength="100" value="<?php echo $cat[0]['cantidad'] ?>" required name="cantidad" id="cantidad" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="name">Precio </label>
                            <input type="text" maxlength="100" value="<?php echo $cat[0]['precio_eeuu'] ?>" required name="precio-eeuu" id="price-eeuu" class="form-control">
                          </div>
                          <div class="product-content">
                            <div class="form-content">
                              <div class="product-controls-desc">
                                <label for="" class="label-product-desc">Descripción</label>
                                <textarea id="ckeditor" name="desc" class="ckeditor" cols="30" rows="10"><?php echo $cat[0]['descripcion'] ?></textarea>
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
  </div>
  <!-- Loading Scripts -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap-select.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.bootstrap.min.js"></script>
  <script src="js/Chart.min.js"></script>
  <script src="js/fileinput.js"></script>
  <script src="js/chartData.js"></script>
  <script src="js/main.js"></script>
  <script src="js/customs.js"></script>
  <script src="js/currency.js"></script>
</body>
</html>
<?php
session_start();
if(isset($_SESSION["adm-logg_ttrueque"])){
  if(isset($_GET['id'])){
    require_once '../php/class/menbresia.php';
    $c = new Menbresia();
    $cat = $c->get_menbresia_by_id($_GET['id']);
    if(count($cat) == 0){
      header('Location: manage-menbresia.php');
    }
  }
}else{
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php require_once 'includes/header_links.php';?>
  <title>Trueque | Editar Menbresía</title>
</head>
<body>
  <div id="dash-contT">
    <?php require_once 'includes/adm_sidebar-left.php';?>
    <main id="main-dashCamel">
      <?php require_once 'includes/adm_header-top.php';?>
      <div class="content-wrapper">
        <div class="container-fluid">
          <div class="row  fila-contenedor-add-items_all">
            <div class="col-12 my-4 col-md-7 content-add-items_all">
              <div class="ms-auto mb-2" id="content-title-add">
                <a href="manage-menbresia.php" class="btn btn-success py-2 px-3">Volver</a>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card panel panel-default">
                    <div class="card-header panel-heading">
                      <h3 class="mb-0">Actualizar menbresía</h3>
                    </div>
                    <div class="card-body panel-body">
                      <div class="row m-0">
                        <div class="col-md-12">
                          <form action="../php/process_admin_update_menbresia.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $cat[0]['id'] ?>"></input>
                            <div class="form-group mb-2">
                              <label for="customfile">Imagen de la Menbresía</label>
                              <div class="custom-file img-prod-div">
                                <input type="file" value="<?php echo $cat[0]['image'] ?>" name="image" class="form-control custom-file-input" id="imagenes" accept="image/*">
                                <input type="hidden" value="<?php echo $cat[0]['image'] ?>" name="image">
                                <label class="custom-file-label" for="imagenes" maxlength="300"><?php echo $cat[0]['image'] ?></label>
                                <?php
                                  echo "<div class='content-img-prod-updt'>
                                    <img src='images/menbresia/{$cat[0]['image']}' alt='foto_de_la_categoría' height='250'></img>
                                   </div>"
                                ?>
                              </div>
                            </div>
                            <div class="form-group mb-2">
                              <label for="tipo">Tipo</label>
                              <input type="text" maxlength="100" value="<?php echo $cat[0]['tipo'] ?>" required name="tipo" id="tipo" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                              <label for="cantidad">Cantidad</label>
                              <input type="number" maxlength="100" value="<?php echo $cat[0]['cantidad'] ?>" required name="cantidad" id="cantidad" class="form-control">
                            </div>
                            <div class="form-group mb-2">
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
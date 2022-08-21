<?php
session_start();
if(isset($_SESSION["user_admin"])) {
  if(isset($_GET['id'])){
    require_once '../php/class/wallet_client.php';
    $wc = new Wallet_client();
    $dat = $wc->get_wallet_client_by_id($_GET['id']);
    
    if(count($dat) == 0){
      header('Location: manage_recargas.php');
    }
  }
}else{
  header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php require_once 'includes/header_links.php'?>
  <title>Trueque | Editar Recargas</title>
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
              <!-- TÍTULO DEL ITEM Y BOTON DE LISTADO DE ITEMS -->
              <?php //print_r($cat); ?>
              <div id="content-title-add">
                <h2 class="page-title">Actualizar Recarga&nbsp;<i class="fa fa-pencil"></i></h2>
                <a href="manage_recargas.php" id="button-list-left-header"><i class="fa fa-list" id="icon-btn-list"></i>Lista de Recargas</a>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="panel panel-default">
                    <div class="panel-heading"><p class="h6">Campos del formulario</p></div>
                    <div class="panel-body">
                      <div class="row m-0">
                        <div class="col-md-12">
                          <form action="../php/process_admin_update_wallet_client.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $dat[0]['id'] ?>"></input>
                            <div class="form-group">
                              <label for="customfile">Imagen de la Recarga</label>
                              <div class="custom-file img-prod-div">
                                <input type="file" value="<?php echo $cat[0]['image'] ?>" name="image" class="custom-file-input" id="imagenes" accept="image/*">
                                <input type="hidden" value="<?php echo $dat[0]['image'] ?>" name="image">
                                <label class="custom-file-label" for="imagenes" maxlength="300"><?php echo $dat[0]['image'] ?></label>
                                <?php
                                echo "
                                <div class='content-img-prod-updt'>
                                  <img src='images/recargas/{$dat[0]['image']}' alt='foto_de_la_recarga' height='250'></img>
                                </div>";
                                ?>
                              </div>
                            </div>
                            <div class="form-group">
                                <label for="tipo">Tipo</label>
                                <input type="text" maxlength="100" value="<?php echo $dat[0]['tipo'] ?>" required name="tipo" id="tipo" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="cantidad">Cantidad</label>
                                <input type="number" maxlength="100" value="<?php echo $dat[0]['cap_carga'] ?>" required name="cap_carga" id="cap_carga" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="precio">Precio</label>
                                <input type="text" maxlength="100" value="<?php echo $dat[0]['precio'] ?>" required name="precio" id="precio" class="form-control">
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
</body>
</html>
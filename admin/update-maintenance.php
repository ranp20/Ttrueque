<?php
session_start();
if(!isset($_SESSION["adm-logg_ttrueque"])){
  header("Location: index.php");
}

if(isset($_GET['id'])){
  require_once '../php/class/all.php';
  $c = new ALl();
  $cat = $c->get_mantenimiento_by_id($_GET['id']);
  if(count($cat) == 0){
    header('Location: maintenance.php');
  }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php require_once 'includes/header_links.php';?>
  <title>Trueque | Editar Publicación</title>
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
                        <?php //print_r($cat); 
            ?>
                        <div id="content-title-add">
                            <h2 class="page-title">Actualizar Publicación&nbsp;<i class="fa fa-pencil"></i></h2>
                            <a href="maintenance.php" id="button-list-left-header"><i class="fa fa-list"
                                    id="icon-btn-list"></i>Lista de Publicación</a>
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
                                                <form action="../php/process_admin_update_mantenimiento.php"
                                                    method="POST" class="form-horizontal" enctype="multipart/form-data">
                                                    <input type="hidden" name="id" value="<?php echo $cat[0]['id'] ?>"></input>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="state_mantenience" id="state_mantenience" value="<?php echo $cat[0]['state_mantenience'] ?>"></input>
                                                    </div>
                                                    <!--<div class="form-group">
                                                        <label for="name">Desde </label>
                                                        <input type="date" maxlength="100"
                                                            value="<?php //echo $cat[0]['desde'] ?>" required
                                                            min=<?php ///$hoy=date("Y-m-d"); echo $hoy;?>
                                                            name="precio-eeuu" id="price-eeuu" class="form-control">

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name">Hasta </label>
                                                        <input type="date" maxlength="100"
                                                            value="<?php //echo $cat[0]['hasta'] ?>" required
                                                            min=<?php //$hoy=date("Y-m-d"); echo $hoy;?>>
                                                    </div>-->
                                                    <div class="form-group">
                                                        <input type="submit" name="submit" id="submit"
                                                            value="Actualizar" class="form-control btn-primary">
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
<?php
  session_start();

  if(!isset($_SESSION["user_admin"])){
    header("Location: index.php");
  }

  if(isset($_SESSION['message'])){
    echo "<script>alert('{$_SESSION["message"]}')</script>";
    unset($_SESSION["message"]);
  }


  if(isset($_GET['id'])){
    require_once '../php/class/header_titles.php';
    $h = new Header_Titles();
    $title_for_id = $h->get_header_title_by_id($_GET['id']);

  }else{
    header('Location: update-header-titles.php');
  }
  
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php require_once 'includes/header_links.php'?>
  <title>Trueque | Actualizar Cabecera</title>
</head>
<body>
<?php require_once 'includes/adm_header-top.php';?>
<div class="ts-main-content">
  <?php require_once 'includes/adm_sidebar-left.php';?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- TÍTULO DEL ITEM Y BOTON DE AGREGADO -->
          <div id="content-title-updates">
            <h2 class="page-title">Editar Títulos <i class="fa fa-pencil"></i>
            </h2>
            <div>
              <a href="manage-header-titles.php" id="button-back-left-list-titles"><i class="fa fa-list" id="icon-btn-list"></i>Listas de Títulos</a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="panel panel-default">
                <div class="panel-heading">Campos de formulario 
                </div>
                <div class="panel-body">
                  <form action="../php/process_admin_update_header.php" method="POST" class="form-horizontal">
                      <div type="hidden" name="id_title" value="<?php echo $title_for_id[0]['id_header_title'];?>"></div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Título
                        </label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="name_title" value="<?php echo $title_for_id[0]['texto_header_title'];?>">
                        </div>
                      </div>
                      <div class="hr-dashed"></div>
                      <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-4" id="save_header-title">
                          <button class="btn btn-primary col-sm-4" name="submit" id="submit" type="submit">Guardar</button>
                        </div>
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
</body>
</html>

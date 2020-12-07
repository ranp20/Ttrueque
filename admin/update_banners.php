<?php
  session_start();
  if(!isset($_SESSION['user_admin'])){	
    header('location:index.php');
  }

  if(isset($_SESSION['msg'])){
    echo "<script>alert('{$_SESSION["msg"]}')</script>";
    unset($_SESSION["msg"]);
  }

  if(isset($_GET["id"])){
    require_once("../php/class/banner.php");
    $b = new Banner();
    $baner_for_id = $b->get_banner_id($_GET["id"]);  
    if(count($baner_for_id) == 0){
      header("Location: banners.php");
    }
  }else{
    header("Location: banners.php");
  }

  $path_banners = "images/banner/";
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
  <?php require_once 'includes/header_links.php'?>
  <title>Trueque | Actualizar Banners</title>
</head>
<body>
  <?php include('includes/header.php');?>
  <div class="ts-main-content">
    <?php include('includes/leftbar.php');?>
    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="row" style="display:flex; justify-content:center;">
          <div class="col-12 my-4 col-md-7">
            <!-- TÍTULO DEL ITEM Y BOTON DE LISTADO DE ITEMS -->
            <div id="content-title-add">
              <h2 class="page-title">Actualizar Banner&nbsp;<i class="fa fa-pencil"></i></h2>
                <a href="banners.php" id="button-list-left-header"><i class="fa fa-list" id="icon-btn-list"></i>Lista de Banners</a>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-default">
                  <div class="panel-heading"><p class="h6">Campos del formulario</p></div>
                  <div class="panel-body">
                    <div class="row m-0">
                      <div class="col-md-12">
                        <form action="../php/process_admin_update_banner.php" method="POST" class="py-4" enctype="multipart/form-data">
                          <input type="hidden" name="id" value="<?php echo $baner_for_id[0]["id_banner"]; ?>">
                          <div class="form-group">
                            <label for="title">Título</label>
                            <input type="text" maxlength="50" name="title" id="name" value="<?php echo $baner_for_id[0]["titulo_banner"]; ?>" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="desc">Descripción</label>
                            <input type="text" maxlength="30" name="desc" id="desc" value="<?php echo $baner_for_id[0]["descripcion_banner"]; ?>" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="imagen">Imagen</label>
                            <a href="<?php echo $path_banners . $baner_for_id[0]["link_banner"]; ?>" target=_blank>(Ver imagen)</a>
                            <div class="custom-file">
                              <input type="file" name="imagen" class="custom-file-input" id="imagenes">
                              <label class="custom-file-label" for="imagen">Choose file</label>
                            </div>
                          </div>
                          <div class="form-group mt-5">
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
</body>
</html>
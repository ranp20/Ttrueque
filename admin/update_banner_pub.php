<?php
  session_start();
  if(isset($_SESSION["adm-logg_ttrueque"])){	
    if(isset($_SESSION['msg'])){
      echo "<script>alert('{$_SESSION["msg"]}')</script>";
      unset($_SESSION["msg"]);
    }

    if(isset($_GET["id"])){
      require_once("../php/class/banner.php");
      $b = new Banner();
      $banner_pub = $b->get_banner_pub_by_id($_GET["id"]);  
      if(count($banner_pub) == 0){
        header("Location: banner-publicidad.php");
      }
    }else{
      header("Location: banner-publicidad.php");
    }
  }else{
    header('location:index.php');
  }

  $path_b_p = "images/banner_publicidad/";
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php require_once 'includes/header_links.php'?>
  <title>Trueque | Actualizar banner de publicidad</title>
</head>
<body>
  <div id="dash-contT">
    <?php require_once 'includes/adm_sidebar-left.php';?>
    <main id="main-dashCamel">
      <?php require_once 'includes/adm_header-top.php';?>
      <div class="content-wrapper">
        <div class="container-fluid">
          <div class="row" style="display:flex; justify-content:center;">
            <div class="d-flex flex-column my-4 col-md-6">
              <div class="ms-auto mb-2" id="content-title-add">
                <a href="banner-publicidad.php" class="btn btn-success py-2 px-3">Volver</a>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card panel panel-default">
                    <div class="card-header panel-heading">
                      <h3 class="mb-0">Actualizar banner de publicidad</h3>
                    </div>
                    <div class="card-body panel-body">
                      <div class="row m-0">
                        <div class="col-md-12">
                          <form action="../php/process_admin_update_banner_pub.php" method="POST" class="py-4" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $banner_pub[0]["id"]; ?>">
                            <div class="form-group mb-2">
                              <label for="">Titulo</label>
                              <input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo $banner_pub[0]['titulo_banner'];?>">
                            </div>
                            <div class="form-group mb-2">
                              <label for="">Descripción</label>
                              <input type="text" name="descripcion" id="descripcion" class="form-control" value="<?php echo $banner_pub[0]['descripcion_banner'];?>">
                            </div>
                            <div class="form-group mb-2">
                              <label for="imagen_p">Imagen</label>
                              <a href="<?php echo $path_b_p . $banner_pub[0]["link_banner_pub"]; ?>" target=_blank>(Ver imagen)</a>
                              <div class="custom-file">
                                <input type="file" name="imagen" class="form-control custom-file-input" id="imagenes">
                                <label class="custom-file-label" for="imagen_p">Choose file</label>
                              </div>
                            </div>
                            <div class="form-group">
                              <input type="submit" name="submit" id="submit_p" value="Guardar" class="form-control btn btn-primary">
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
</body>
</html>
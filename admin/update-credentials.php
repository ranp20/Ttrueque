<?php
  session_start();
  if(isset($_SESSION["adm-logg_ttrueque"])){	  
    if(isset($_SESSION['msg'])){
      echo "<script>alert('{$_SESSION["msg"]}')</script>";
      unset($_SESSION["msg"]);
    }

    if(isset($_GET["id"])){
    	require_once "../php/class/credentials.php";
      $cred = new Credentials();
      $idcred = $cred->get_credentials_by_id($_GET["id"]);
    }else{
      header("Location: manage-credentials.php");
    }
  }else{
    header('location:index.php');
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php require_once 'includes/header_links.php'?>
  <title>Trueque | Actualizar Credenciales</title>
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
                <a href="manage-credentials.php" class="btn btn-success py-2 px-3">Volver</a>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card panel panel-default">
                    <div class="card-header panel-heading">
                      <h3 class="mb-0">Actualizar credenciales</h3>
                    </div>
                    <div class="card-body panel-body">
                      <div class="row m-0">
                        <div class="col-md-12">
                          <form action="../php/process_admin_update_credentials.php" method="POST" class="py-4">
                            <input type="hidden" name="id" value="<?php echo $idcred[0]["id"]; ?>">
                            <div class="form-group mb-2">
                              <label for="key_public">Key_public</label>
                              <input type="text" name="key_public" id="key_public" value="<?php echo $idcred[0]["key_public"]; ?>" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                              <label for="key_secret">Key_secret</label>
                              <input type="text" name="key_secret" id="key_secret" value="<?php echo $idcred[0]["key_secret"]; ?>" class="form-control">
                            </div>
                            <div class="form-group">
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
  <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
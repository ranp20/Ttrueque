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
  	require_once "../php/class/credentials.php";
    $cred = new Credentials();
    $idcred = $cred->get_credentials_by_id($_GET["id"]);
  }else{
    header("Location: manage-credentials.php");
  }
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
  <?php require_once 'includes/header_links.php'?>
  <title>Trueque | Actualizar Credenciales</title>
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
              <h2 class="page-title">Actualizar Credenciales&nbsp;<i class="fa fa-pencil"></i></h2>
                <a href="manage-credentials.php" id="button-list-left-header"><i class="fa fa-list" id="icon-btn-list"></i>Lista de Credenciales</a>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-default">
                  <div class="panel-heading"><p class="h6">Campos del formulario</p></div>
                  <div class="panel-body">
                    <div class="row m-0">
                      <div class="col-md-12">
                        <form action="../php/process_admin_update_credentials.php" method="POST" class="py-4">
                          <input type="hidden" name="id" value="<?php echo $idcred[0]["id"]; ?>">
                          <div class="form-group">
                            <label for="key_public">Key_public</label>
                            <input type="text" name="key_public" id="key_public" value="<?php echo $idcred[0]["key_public"]; ?>" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="key_secret">Key_secret</label>
                            <input type="text" name="key_secret" id="key_secret" value="<?php echo $idcred[0]["key_secret"]; ?>" class="form-control">
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
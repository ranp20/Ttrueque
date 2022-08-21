<?php
  session_start();
  if(isset($_SESSION['user_admin'])){
    require_once '../php/class/admin.php';
    $a = new Admin();
    $ad = $a->get_admin();
      
    if(isset($_SESSION["error"])){
      echo "<script>alert('{$_SESSION["error"]}')</script>";
      unset($_SESSION["error"]);
    }
  }else{
    header('location:index.php');
  }
?>
<!doctype html>
<html lang="es">
<head>
  <?php require_once 'includes/header_links.php'?>
  <title>Trueque | Perfil Administrador</title>
</head>
<body>
  <div id="dash-contT">
    <?php require_once 'includes/adm_sidebar-left.php';?>
    <main id="main-dashCamel">
      <?php require_once 'includes/adm_header-top.php';?>

      <div class="content-wrapper">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-8">
                      <!-- TÍTULO DEL ITEM Y BOTON DE AGREGADO -->
                      <div id="content-title-manage-admin">
                          <h2 class="page-title">Administrar Perfil <i class="fa fa-user"></i></h2>
                          <div id="content-btn-back-dash">
                              <a href="dashboard.php" id="button-back-dash-left-header">Volver a Dashboard<i
                                      class="fa fa-arrow-right" id="icon-btn-back-dash"></i></a>
                          </div>
                      </div>
                      <!-- FORMULARIO DE ACTUALIZAR DATOS DE PERFIL -->
                      <div class="row">
                          <div class="col-md-10">
                              <div class="panel panel-default">
                                  <div class="panel-heading" id="titulo-form-config">Datos del Perfil
                                  </div>
                                  <div class="panel-body">
                                      <form method="post" id="form-perfil" class="form-horizontal">
                                          <?php foreach($ad as $value) {?>
                                          <input type="hidden" name="id" value="<?php echo $value['id_admin']?>">
                                          <div class="form-group">
                                              <label class="col-sm-4 control-label">Nombre
                                              </label>
                                              <div class="col-sm-8">
                                                  <input type="text" class="form-control" name="name" required
                                                      placeholder="Escribe tu nombre"
                                                      value="<?php echo $value['nombre_admin']?>">
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label class="col-sm-4 control-label">Email
                                              </label>
                                              <div class="col-sm-8">
                                                  <input type="email" class="form-control" name="email" required
                                                      placeholder="Escribe tu email"
                                                      value="<?php echo $value['email_admin']?>">
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label class="col-sm-4 control-label">Teléfono
                                              </label>
                                              <div class="col-sm-8">
                                                  <input maxlength="11" minlength="9" type="number"
                                                      class="form-control" name="telefono" required
                                                      placeholder="Escribe tu teléfono"
                                                      value="<?php echo $value['telefono_admin']?>">
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label class="col-sm-4 control-label">Dirección
                                              </label>
                                              <div style="display:none">
                                                  <p id="ID"><?php echo $value['id_admin']?></p>
                                                  <p id="passcla"><?php echo $value['password_admin']?></p>
                                              </div>

                                              <div class=" col-sm-8">
                                                  <input type="text" class="form-control" name="direccion" required
                                                      placeholder="Escribe tu dirección"
                                                      value="<?php echo $value['direccion_admin']?>">
                                              </div>
                                          </div>
                                          <?php } ?>
                                          <div class="hr-dashed">
                                          </div>
                                          <div class="form-group">
                                              <div class="col-sm-8 col-sm-offset-4" id="boton-guardado-perfil-1">
                                                  <button class="btn btn-primary" id="btn-update-perfil">Guardar
                                                      cambios
                                                  </button>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- FORMULARIO DE CAMBIO DE CONTRASEÑA -->
              <div class=" row">
                  <div class="col-md-8">
                      <div class="row">
                          <div class="col-md-10">
                              <div class="panel panel-default">
                                  <div class="panel-heading" id="titulo-form-config">Cambiar Contraseña
                                  </div>
                                  <div class="panel-body">
                                      <form method="post" class="form-horizontal">
                                          <div class="form-group">
                                              <label class="col-sm-4 control-label">Contraseña
                                                  actual
                                              </label>
                                              <div class="col-sm-8">
                                                  <input type="password" class="form-control" name="password"
                                                      id="password" placeholder="Escribe tu contraseña actual">
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label class="col-sm-4 control-label">Nueva
                                                  Contraseña
                                              </label>
                                              <div class="col-sm-8">
                                                  <input type="password" class="form-control" name="newpassword"
                                                      id="newpassword" placeholder="Nueva contraseña">
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label class="col-sm-4 control-label">Confirmar
                                                  Contraseña
                                              </label>
                                              <div class="col-sm-8">
                                                  <input type="password" class="form-control" name="confirmpassword"
                                                      id="confirmpassword" placeholder="Nueva contraseña">
                                              </div>
                                          </div>
                                          <div class="hr-dashed">
                                          </div>
                                          <div class="form-group">
                                              <div class="col-sm-8 col-sm-offset-4" id="boton-guardado-perfil-2">
                                                  <button class="btn btn-primary" id="btn-guardarclave" name="
                                                      login">Guardar
                                                      cambios
                                                  </button>
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

    </main>
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
  <script type="text/javascript" src="js/updateclave.js"></script>
  <script type="text/javascript" src="js/updateperfil.js"></script>
</body>
</html>
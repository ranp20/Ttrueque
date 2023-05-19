<?php
  session_start();
  if(isset($_SESSION["adm-logg_ttrueque"])){
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
<!DOCTYPE html>
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
          <div class="mb-4 row">
            <div class="col-md-8">
              <div id="content-title-manage-admin">
                <h2 class="page-title">Administrar Perfil <i class="fa fa-user"></i></h2>
                <div id="content-btn-back-dash">
                  <a href="dashboard.php" id="button-back-dash-left-header">Volver a Dashboard<i class="fa fa-arrow-right" id="icon-btn-back-dash"></i></a>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8">
                  <div class="card panel panel-default">
                    <div class="card-header panel-heading" id="titulo-form-config">Datos del Perfil
                    </div>
                    <div class="card-body panel-body">
                      <form method="post" id="form-perfil" class="form-horizontal">
                        <?php foreach($ad as $value) {?>
                        <input type="hidden" name="id" value="<?php echo $value['id_admin']?>">
                        <div class="form-group mb-2">
                          <label class="control-label">Nombre</label>
                          <div class="">
                            <input type="text" class="form-control" name="name" required placeholder="Escribe tu nombre" value="<?php echo $value['nombre_admin']?>">
                          </div>
                        </div>
                        <div class="form-group mb-2">
                          <label class="col-sm-4 control-label">Email</label>
                          <div class="">
                            <input type="email" class="form-control" name="email" required placeholder="Escribe tu email" value="<?php echo $value['email_admin']?>">
                          </div>
                        </div>
                        <div class="form-group mb-2">
                          <label class="col-sm-4 control-label">Teléfono</label>
                          <div class="">
                            <input maxlength="11" minlength="9" type="number" class="form-control" name="telefono" required placeholder="Escribe tu teléfono" value="<?php echo $value['telefono_admin']?>">
                          </div>
                        </div>
                        <div class="form-group mb-2">
                          <label class="control-label">Dirección</label>
                          <div style="display:none">
                            <p id="ID"><?php echo $value['id_admin']?></p>
                            <p id="passcla"><?php echo $value['password_admin']?></p>
                          </div>
                          <div class="">
                            <input type="text" class="form-control" name="direccion" required placeholder="Escribe tu dirección" value="<?php echo $value['direccion_admin']?>">
                          </div>
                        </div>
                        <?php } ?>
                        <div class="form-group">
                          <div class="ms-auto col-sm-8 col-sm-offset-4" id="boton-guardado-perfil-1">
                            <button class="btn btn-primary" id="btn-update-perfil">Guardar cambios</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="mb-4 row">
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-8">
                  <div class="card panel panel-default">
                    <div class="card-header panel-heading" id="titulo-form-config">Cambiar Contraseña</div>
                    <div class="card-body panel-body">
                      <form method="post" class="form-horizontal">
                        <div class="form-group mb-2">
                          <label class="control-label">Contraseña actual</label>
                          <div class="">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Escribe tu contraseña actual" autocomplete="off">
                          </div>
                        </div>
                        <div class="form-group mb-2">
                          <label class="control-label">Nueva Contraseña</label>
                          <div class="">
                            <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="Nueva contraseña" autocomplete="off">
                          </div>
                        </div>
                        <div class="form-group mb-2">
                          <label class="control-label">Confirmar Contraseña</label>
                          <div class="">
                            <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Nueva contraseña" autocomplete="off">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="ms-auto col-sm-8 col-sm-offset-4" id="boton-guardado-perfil-2">
                            <button class="btn btn-primary" id="btn-guardarclave" name="login">Guardar cambios</button>
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
  <script type="text/javascript" src="js/bootstrap-select.min.js"></script>
  <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
  <script type="text/javascript" src="js/updateclave.js"></script>
  <script type="text/javascript" src="js/updateperfil.js"></script>
</body>
</html>
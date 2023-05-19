<?php
session_start();
if(!isset($_SESSION["adm-logg_ttrueque"])){
  header('location:index.php');
}

require_once("../php/class/client.php");
$c = new Client();
$data = $c->get_client();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php require_once 'includes/header_links.php';?>
  <title>Trueque | Administrar Usuarios</title>
</head>
<body>
  <div id="dash-contT">
    <?php require_once 'includes/adm_sidebar-left.php';?>
    <main id="main-dashCamel">
      <?php require_once 'includes/adm_header-top.php';?>
      <div class="content-wrapper">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 col-6">
              <div class="generador-codigoqr"></div>
            </div>
            <div class="col-md-12">
              <div id="content-title-list-user">
                <h2 class="page-title">Administrar Usuarios<i class="fa fa-users"></i></h2>
                <div id="content-btn-back-dash">
                  <a href="dashboard.php" id="button-back-dash-left-header">Volver a Dashboard<i class="fa fa-arrow-right" id="icon-btn-back-dash"></i></a>
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-body tbl-mng-all-pages">
                <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%" id="table_cliente">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>E-mail</th>
                      <th>Nombres</th>
                      <th>Apellidos</th>
                      <th>Dirección</th>
                      <th>Pais</th>
                      <th>Telefono</th>
                      <th>Puntos<i class="fa fa-star" style="color:#FEC348;"></i></th>
                      <th>QR</th>
                    </tr>
                  </thead>
                  <tbody class="tb-list-user-anystore">
                    <?php
                    //$id_enum = 0;

                    foreach ($data as $val) {
                      //$id_enum++;
                      echo "<tr>
                        <td>{$val['id_cliente']}</td>
                        <td>{$val["email_cliente"]}</td>
                        <td>{$val["nombre_cliente"]}</td>
                        <td>{$val["apellido_cliente"]}</td>
                        <td>{$val["direccion_cliente"]}</td>
                        <td>{$val["nombre_pais"]}</td>
                        <td>{$val["telefono"]}</td>
                        <td style='text-align:center;'>{$val["puntos"]}</td>
                        <td>
                          <button type='button' class='btn btn-info linkgenerate_code' id='btnGenQrCode' data-toggle='modal' data-target='#exampleModalCenter' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                            <span>Generar</span>
                            <svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='20px' height='20px' version='1.1' viewBox='0 0 700 700'><g xmlns='http://www.w3.org/2000/svg'><path d='m249.76 179.76c34.719-34.719 84-47.602 128.8-38.641l-27.441 27.441 39.762 39.762 96.879-96.879-96.883-97.445-39.762 39.762 30.801 30.801c-61.039-10.082-125.44 8.3984-171.92 55.438-66.641 66.641-75.602 168.56-28 245.28l41.441-41.441c-27.441-53.199-18.48-119.84 26.32-164.08z'/><path d='m518 174.72-41.441 41.441c26.879 53.199 17.922 119.84-26.32 164.64-34.719 34.719-84 47.602-128.8 38.641l27.441-27.441-39.762-39.762-96.879 96.883 96.879 96.879 39.762-39.762-30.801-30.801c61.043 10.082 125.44-8.3984 171.92-55.438 66.641-66.641 76.16-168.56 28-245.28z'/></g></svg>
                          </button>
                        </td>
                      </tr>";
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header cont-title-genqrcode">
              <h5 class="modal-title" id="exampleModalLongTitle">Descargar código QR</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="show_srcodeclient">
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
  <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
  <script type="text/javascript" src="js/generate-qrcode.js"></script>
</body>
</html>
<?php
session_start();
if (!isset($_SESSION['user_admin'])) {
  header('location:index.php');
}

require_once("../php/class/client.php");
$c = new Client();
$data = $c->get_client();
?>

<!doctype html>
<html lang="en" class="no-js">
<head>
  <?php require_once 'includes/header_links.php' ?>
  <title>Trueque | Administrar Usuarios</title>
</head>
<body>
  <?php include('includes/header.php'); ?>
  <div class="ts-main-content">
    <?php include('includes/leftbar.php'); ?>
    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 col-6">
            <div class="generador-codigoqr"></div>
          </div>
          <div class="col-md-12">
            <!-- TÍTULO DEL ITEM Y BOTON DE AGREGADO -->
            <div id="content-title-list-user">
              <h2 class="page-title">Administrar Usuarios<i class="fa fa-users"></i></h2>
              <div id="content-btn-back-dash">
                <a href="dashboard.php" id="button-back-dash-left-header">Volver a Dashboard<i class="fa fa-arrow-right" id="icon-btn-back-dash"></i></a>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">Lista de Usuarios</div>
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
                      <td><button type='button' class='btn btn-info linkgenerate_code' data-toggle='modal' data-target='#exampleModalCenter'>Generar <i class='fa fa-refresh'></i></a></td>
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
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header cont-title-genqrcode">
            <h5 class="modal-title" id="exampleModalLongTitle">Descargar código QR</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="show_srcodeclient">
            
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
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="js/Chart.min.js"></script>
  <script type="text/javascript" src="js/fileinput.js"></script>
  <script type="text/javascript" src="js/chartData.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
  <script type="text/javascript" src="js/generate-qrcode.js"></script>
  <script type="text/javascript">  
    $(document).ready(function() {
      setTimeout(function() {
        $('.succWrap').slideUp("slow");
      }, 3000);
    });
  </script>
</body>
</html>
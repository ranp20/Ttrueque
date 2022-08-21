<?php
session_start();

if (!isset($_SESSION['user_admin'])) {
  header('location:index.php');
}

require_once "../php/class/admin.php";
$adm = new Admin();
$idadm = $adm->get_admin();


require_once("../php/class/client.php");
$c = new Client();
$data = $c->get_client_store();
?>

<!doctype html>
<html lang="es">
<head>
  <?php require_once 'includes/header_links.php' ?>
  <title>Trueque | Administrar Usuarios</title>
</head>
<body>
  <?php include('includes/header.php'); ?>
  <div class="ts-main-content">
    <?php require_once 'includes/adm_sidebar-left.php';?>
    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- TÍTULO DEL ITEM Y BOTON DE AGREGADO -->
            <div id="content-title-list-user">
              <h2 class="page-title">Usuarios con ventas mensuales<i class="fa fa-users"></i></h2>
              <div id="content-btn-back-dash">
                <a href="dashboard.php" id="button-back-dash-left-header">Volver a Dashboard<i class="fa fa-arrow-right" id="icon-btn-back-dash"></i></a>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">Lista de Usuarios</div>
            <div class="panel-body tbl-mng-all-pages">
              <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%" id="table_cliente">
                <thead class="list_user_change_th">
                  <tr>
                    <th>ID</th>
                    <th>Mes</th>
                    <th>E-mail</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Dirección</th>
                    <th>Pais</th>
                    <th>Telefono</th>
                    <th>Estado</th>
                    <th>Puntos<i class="fa fa-star" style="color:#FEC348;"></i></th>
                  </tr>
                </thead>
                <tbody id="list_user_change"></tbody>
              </table>
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
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="js/Chart.min.js"></script>
  <script type="text/javascript" src="js/fileinput.js"></script>
  <script type="text/javascript" src="js/chartData.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
  <script type="text/javascript" src="js/sales-report-admin.js"></script>
</body>
</html>
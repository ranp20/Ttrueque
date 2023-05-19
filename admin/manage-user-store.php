<?php
session_start();
if (!isset($_SESSION["adm-logg_ttrueque"])) {
  header('location:index.php');
}

require_once "../php/class/admin.php";
require_once("../php/class/client.php");
$adm = new Admin();
$c = new Client();
$idadm = $adm->get_admin();
$data = $c->get_client_store();
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
            <div class="col-md-12">
              <div id="content-title-list-user">
                <h2 class="page-title">Usuarios con ventas mensuales<i class="fa fa-users"></i></h2>
                <div id="content-btn-back-dash">
                  <a href="dashboard.php" id="button-back-dash-left-header">Volver a Dashboard<i class="fa fa-arrow-right" id="icon-btn-back-dash"></i></a>
                </div>
              </div>
            </div>
            <div class="panel panel-default">
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
    </main>
  </div>
  <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
  <script type="text/javascript" src="js/sales-report-admin.js"></script>
</body>
</html>
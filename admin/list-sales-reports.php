<?php
session_start();

if (!isset($_SESSION['user_admin'])) {
  header('location:index.php');
}
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
          <div class="col-md-12">
            <!-- TÍTULO DEL ITEM Y BOTON DE AGREGADO -->
            <div id="content-title-list-user">
              <h2 class="page-title">Ventas Mensuales Clientes&nbsp;&nbsp;<i class="fa fa-users"></i></h2>
              <input type="hidden" id="idcliente" value="<?php echo $_GET['cli']; ?>">
              <div id="content-btn-back-dash">
                <a href="dashboard.php" id="button-back-dash-left-header">Volver a Dashboard<i class="fa fa-arrow-right" id="icon-btn-back-dash"></i></a>
              </div>
            </div>
          </div>
          <div class="panel panel-default tbl-mng-all-pages">
            <div class="panel-heading">Lista de Usuarios</div>
            <div class="panel-body tadm-table-list-years">
              <div class="seladm-opts-user-client">
              <select class="input-product select-onehidden" id="select-year_adm"></select>
              </div>
              <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%" id="table_cliente">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Mes</th>
                    <th>Total</th>
                    <th>Año</th>
                    <th>Estado</th>
                    <th>PDF<th>
                  </tr>
                </thead>
                <tbody id="list_reports_monthly"></tbody>
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
  <script type="text/javascript" src="js/list_reports_monthly.js"></script>
</body>
</html>
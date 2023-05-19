<?php
session_start();

if(!isset($_SESSION["adm-logg_ttrueque"]))
{	
header('location:index.php');
}

require_once "../php/class/all.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php require_once 'includes/header_links.php'?>
  <title>Trueque | Administrar Pedidos</title>
</head>
<body>
  <?php require_once 'includes/adm_header-top.php';?>
  <div class="ts-main-content">
    <?php require_once 'includes/adm_sidebar-left.php';?>
    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div id="content-title-list-user">
              <h2 class="page-title">Gestionar pedidos <i class="fa fa-truck"></i>
              </h2>
              <div id="content-btn-back-dash">
                <a href="dashboard.php" id="button-back-dash-left-header">Volver a Dashboard<i class="fa fa-arrow-right" id="icon-btn-back-dash"></i></a>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading">Lista de Pedidos</div>
              <div class="panel-body tbl-mng-all-pages">
                <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Código</th>
                      <th>Tiempo de la orden</th>
                      <th>Nombre</th>
                      <th>Número de teléfono móvil</th>
                      <th>Dirección</th>
                      <th>Estado</th>
                      <th>--</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="js/bootstrap-select.min.js"></script>
  <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>  
</body>
</html>
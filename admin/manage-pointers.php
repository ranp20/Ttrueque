<?php
session_start();

if(!isset($_SESSION['user_admin']))
{	
header('location: index.php');
}

require_once("../php/class/all.php");

$a = new All();
$pointers = $a->get_pointers();

?>
<!doctype html>
<html lang="es">
<head>
  <?php require_once 'includes/header_links.php'?>
  <title>Trueque | Puntuaciones</title>
</head>
<script>
  function confirmdelete() {
    res = confirm("¿Seguro que desea eliminar este registro?");
    if(res == true){
      return true;
    }else{
      return false;
    }
  }
</script>
<!-- --- Delete category script  --- -->
<body>
  <?php require_once 'includes/adm_header-top.php';?>
  <div class="ts-main-content">
    <?php require_once 'includes/adm_sidebar-left.php';?>
    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div id="content-title-list-user">
              <h2 class="page-title"> Puntuación de Productos <i class="fa fa-star" style="color:#FEC348;"></i></h2>
              <div id="content-btn-back-dash">
                <a href="dashboard.php" id="button-back-dash-left-header">Volver a Dashboard<i class="fa fa-arrow-right" id="icon-btn-back-dash"></i></a>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading">Lista de Puntuaciones</div>
              <div class="panel-body tbl-mng-all-pages">
                <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Cliente</th>
                      <th>Producto</th>
                      <th>Estrellas</th>  
                      <th>Título</th>
                      <th width="40%">Descripción</th>
                      <th>Fecha</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    foreach($pointers as $value){
                      echo "<tr>
                          <th>{$value['id_puntuacion']}</th>    
                          <th>{$value['nombre_cliente']}</th>
                          <th>{$value['nombre_producto']}</th>
                          <th style='text-align:center;'>{$value['estrellas']}</th>
                          <th>{$value['titulo_puntuacion']}</th>
                          <th>{$value['descripcion_puntuacion']}</th>
                          <th>{$value['fecha_creacion']}</th>
                          <!--<th><a onclick='return confirmdelete()' href='../php/process_admin_delete_pointers.php?id={$value['id_puntuacion']}' class='btn btn-danger btn-sm'>Eliminar<a/></th>-->
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
  
</body>
</html>
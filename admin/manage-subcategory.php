<?php
session_start();
error_reporting(0);

if(!isset($_SESSION['user_admin']))
{	
header('location:index.php');
}

require_once("../php/class/all.php");

$a = new All();
$sub = $a->get_subcategorias();

?>
<!doctype html>
<html lang="es">
<head>
  <?php require_once 'includes/header_links.php'?>
  <title>Trueque | Administrar Subcategorías</title>
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
            <!-- TÍTULO DEL ITEM Y BOTON DE AGREGADO -->
            <div id="content-title-manage">
              <h2 class="page-title">Administrar Subcategorías <i class="fa fa-flag"></i></h2>
              <div id="content-btn-add">
                <a href="add-subcategory.php" id="button-add-left-header"><i class="fa fa-plus-circle" id="icon-btn-add"></i>Agregar Subcategoría</a>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading">Lista de Subcategorías</div>
              <div class="panel-body">
                <table id="zctb" class="display table table-striped table-bordered table-hover datatable no-footer" cellspacing="0" width="100%" role="grid">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Subcategoría</th>
                      <th>Categoría</th>
                      <th>--</th>
                      <th>--</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    foreach($sub as $value){
                      echo "<tr>
                        <th>{$value['id_subcategoria']}</th>    
                        <th>{$value['nombre_subcategoria']}</th>
                        <th>{$value['nombre_categoria']}</th>
                        <th><a href='update_subcategory.php?id={$value['id_subcategoria']}' class='btn btn-primary btn-sm'>&nbsp;&nbsp;&nbsp;&nbsp;Editar&nbsp;&nbsp;&nbsp;&nbsp;<a/></th>
                        <th><a onclick='return confirmdelete()' href='../php/process_admin_delete_subcategory.php?id={$value['id_subcategoria']}' class='btn btn-danger btn-sm'>&nbsp;Eliminar&nbsp;<a/></th>
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
  <script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript" src="js/Chart.min.js"></script>
  <script type="text/javascript" src="js/fileinput.js"></script>
  <script type="text/javascript" src="js/chartData.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
  <script type="text/javascript">  
    $(document).ready(function () {
      setTimeout(function() {
        $('.succWrap').slideUp("slow");
      }
                 , 3000);
    }
                     );
  </script>
</body>
</html>
<?php
session_start();
if (!isset($_SESSION['user_admin'])) {
    header('location:index.php');
}

require_once("../php/class/menbresia.php");
$c = new Menbresia();
$cat = $c->get_data();
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
    <?php require_once 'includes/header_links.php' ?>
    <title>Trueque | Administrar Menbresías</title>
</head>
<script>
  function confirmdelete() {
    res = confirm("¿Seguro que desea eliminar este registro?");
    if (res == true) {
        return true;
    } else {
        return false;
    }
  }
</script>
<!-- --- Delete category script  --- -->
<body>
  <?php include('includes/header.php'); ?>
  <div class="ts-main-content">
    <?php include('includes/leftbar.php'); ?>
    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- TÍTULO DEL ITEM Y BOTON DE AGREGADO -->
            <div id="content-title-manage">
                <h2 class="page-title">Administrar Menbresías <i class="fa fa-flag"></i>
                </h2>
                <div>
                    <a href="add-menbresia.php" id="button-add-left-header"><i class="fa fa-plus-circle" id="icon-btn-add"></i>Agregar Menbresía</a>
                </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading">Lista de Menbresías</div>
              <div class="panel-body">
                <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Imagen</th>
                      <th>Tipo</th>
                      <th>Cantidad</th>
                      <th>Precio</th>
                      <th>Descripcion</th>
                      <th width="15%">--</th>
                      <th width="15%">--</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($cat as $value) {
                      $img = $value["image"];
                      $img_path = "images/menbresia/" . $img;
                      echo "
                        <tr>
                          <th style='text-align: center;margin: 0;padding: 0 !important;box-sizing: border-box;width: 10%;vertical-align: middle;'><a target=_blank href='{$img_path}'><img src='{$img_path}'  style='width:100%;'></a></th>
                          <th>{$value["tipo"]}</th>
                          <th>{$value["cantidad"]}</th>
                          <th>{$value["precio_eeuu"]}</th>
                          <th>{$value["descripcion"]}</th>
                          <th style='text-align:center;vertical-align: middle;'>
                            <a href='update_menbresia.php?id={$value['id']}' class='btn btn-primary btn-sm'>
                              <i class='fa fa-pencil-square-o' style='font-size: 1.7rem;padding: .6rem .3rem .5rem .5rem;'></i>
                            <a/>
                          </th>
                          <th style='text-align:center;vertical-align: middle;'>
                            <a onclick='return confirmdelete()' href='../php/process_admin_delete_menbresia.php?id={$value['id']}' class='btn btn-danger btn-sm'>
                              <i class='fa fa-close' style='font-size: 1.7rem;padding: .6rem .3rem .5rem .5rem;'></i>
                            <a/>
                          </th>
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
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap-select.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.bootstrap.min.js"></script>
  <script src="js/Chart.min.js"></script>
  <script src="js/fileinput.js"></script>
  <script src="js/chartData.js"></script>
  <script src="js/main.js"></script>
  <script type="text/javascript">    
      $(document).ready(function() {
          setTimeout(function() {
              $('.succWrap').slideUp("slow");
          }, 3000);
      });
  </script>
  <!-- --- SWEETALERT --- -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>
</html>
<?php
session_start();

if (!isset($_SESSION['user_admin'])) {
  header('location:index.php');
}

require_once "../php/class/product.php";
$p = new Product();
$data = $p->get_data_admin();
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
  <?php require_once 'includes/header_links.php'?>
  <title>Trueque | Administrar Productos</title>
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
<body>
  <?php include('includes/header.php'); ?>
  <div class="ts-main-content">
    <?php include('includes/leftbar.php'); ?>
    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div id="content-title-manage">
              <!-- BOTÓN DE AGREGAO DE ITEMS  -->
              <h2 class="page-title">Administrar Productos <i class="fa fa-flag"></i>
              </h2>
              <div id="content-btn-add">
                <a href="add-items.php" id="button-add-left-header"><i class="fa fa-plus-circle" id="icon-btn-add"></i>Agregar Producto</a>
              </div>
            </div>
            <!-- Zero Configuration Table -->
            <div class="panel panel-default">
              <div class="panel-heading">Lista de Productos
              </div>
              <div class="panel-body tbl-mng-all-pages">
                <div class="table-responsive py-3">
                  <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="font-size: .9em;">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Subida</th>
                        <th>País</th>
                        <th>Ventas</th>
                        <th>Stock</th>
                        <th>Categoría</th>
                        <th>Imagen</th>
                        <th>--</th>
                        <th>--</th>
                      </tr>
                    </thead>
                    <tbody class="tbody-products-admin-table">
                      <?php
                      foreach ($data as $key) {
                        $desc = substr($key["descripcion"], 0, 8);
                        $img = $key["ruta_imagen"];
                        $img_path = "images/products/" . $key["ruta_imagen"];
                        $fecha = substr($key["fecha_creacion"], 0, 10);
                        echo "<tr>
                              <td>{$key["id"]}</td>
                              <td>{$key["nombre"]}</td>
                              <td style='text-align:center;'>{$key["precio"]}</td>
                              <td>{$fecha}</td>
                              <td style='text-align:center;'>{$key["nombre_pais"]}</td>
                              <td style='text-align:center;'>{$key["ventas"]}</td>
                              <td style='text-align:center;'>{$key["stock"]}</td>
                              <td>{$key["nombre_categoria"]}</td>
                              <td>
                                <a target=_blank href='{$img_path}'>
                                  <img src='{$img_path}'>
                                </a>
                              </td>
                              <td>
                                <a href='update_items.php?id={$key["id"]}' class='btn btn-primary btn-sm'>
                                  <i class='fa fa-pencil-square-o'></i>
                                </a>
                              </td>
                              <td>
                                <a onclick='return confirmdelete()' href='../php/process_admin_delete_items.php?id={$key["id"]}' class='btn btn-danger btn-sm'>
                                  <i class='fa fa-close'></i>
                                </a>
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
      </div>
    </div>
  </div>
  <!-- Loading Scripts -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap-select.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
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
</body>
</html>
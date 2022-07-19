<?php
session_start();

if (!isset($_SESSION['user_admin'])) {
  header('location:index.php');
}

require_once("../php/class/categoria.php");
$c = new Categoria();
$cat = $c->get_categoria();
?>

<!doctype html>
<html lang="en" class="no-js">
<head>
  <?php require_once 'includes/header_links.php' ?>
  <title>Trueque | Administrar Categorías</title>
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
              <h2 class="page-title">Administrar Categorías <i class="fa fa-flag"></i>
              </h2>
              <div id="content-btn-add_strech">
                <a href="add-category.php" id="button-add-left-header"><i class="fa fa-plus-circle" id="icon-btn-add"></i>Agregar Categoría</a>
              </div>
            </div>
            <!-- Zero Configuration Table -->
            <div class="panel panel-default">
              <div class="panel-heading">Lista de Categorías</div>
                <div class="panel-body tbl-mng-all-pages">
                  <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th width="5%">ID
                        </th>
                        <th>Categoría
                        </th>
                        <th>Imagen
                        </th>
                        <th width="10%">--
                        </th>	
                        <th width="10%">--
                        </th>
                      </tr>
                    </thead>
                    <tbody class="tbody-categories-admin-table">
                      <?php 

                        foreach ($cat as $value) {

                        $imagen = $value['imagen_categoria'];
                        //$reemplazo = str_replace(['%C3%A9','%C3%AD'], ['é', 'í'], $imagen);

                        $string = $imagen;
                        //print(mb_detect_encoding ($string));

                        $string = mb_convert_encoding($string, "UTF-8");

                          echo "
                          <tr>
                            <td>{$value["id_categoria"]}</td>    
                            <td>{$value["nombre_categoria"]}</td>
                            <td>
                              <a target=_blank href='images/categoria/{$string}'>
                                <img src='images/categoria/{$string}' data-src='images/categoria/{$string}'>
                              </a>
                            </td>
                            <td>
                              <a href='update_category.php?id={$value['id_categoria']}' class='btn btn-primary btn-sm'>
                                <i class='fa fa-pencil-square-o'></i>
                              <a/>
                            </td>
                            <td>
                              <a onclick='return confirmdelete()' href='../php/process_admin_delete_category.php?id={$value['id_categoria']}' class='btn btn-danger btn-sm'>
                                <i class='fa fa-close'></i>
                              <a/>
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
  <script type="text/javascript">  
    $(document).ready(function() {
      setTimeout(function() {
        $('.succWrap').slideUp("slow");
      }, 3000);
    });
  </script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>
</html>
<?php
session_start();
if (!isset($_SESSION["adm-logg_ttrueque"])) {
  header('location:index.php');
}
require_once("../php/class/categoria.php");
$c = new Categoria();
$cat = $c->get_categoria();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php require_once 'includes/header_links.php';?>
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
<body>
  <div id="dash-contT">
    <?php require_once 'includes/adm_sidebar-left.php';?>
    <main id="main-dashCamel">
      <?php require_once 'includes/adm_header-top.php';?>
      <div class="content-wrapper">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div id="content-title-manage">
                <h2 class="page-title">Administrar Categorías <i class="fa fa-flag"></i>
                </h2>
                <div id="content-btn-add_strech">
                  <a href="add-category.php" id="button-add-left-header"><i class="fa fa-plus-circle" id="icon-btn-add"></i>Agregar Categoría</a>
                </div>
              </div>
              <div class="panel panel-default">
                  <div class="panel-body tbl-mng-all-pages">
                    <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th width="5%">ID</th>
                          <th>Categoría</th>
                          <th>Imagen</th>
                          <th width="10%">--</th>
                          <th width="10%">--</th>
                        </tr>
                      </thead>
                      <tbody class="tbody-categories-admin-table">
                        <?php 
                          foreach($cat as $value){
                            $imagen = $value['imagen_categoria'];
                            $string = $imagen;
                            $string = mb_convert_encoding($string, "UTF-8");

                            echo "
                              <tr>
                                <td>{$value["id_categoria"]}</td>    
                                <td>{$value["nombre_categoria"]}</td>
                                <td>
                                  <a target=_blank href='images/categoria/{$string}' style='max-width: 80px;display: table;margin: 0 auto;'>
                                    <img src='images/categoria/{$string}' data-src='images/categoria/{$string}'>
                                  </a>
                                </td>
                                <td>
                                  <a href='update_category.php?id={$value['id_categoria']}' class='btn btn-primary btn-sm btn-editItem'>
                                    <svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='29px' height='29px' version='1.1' viewBox='0 0 700 700'><g xmlns='http://www.w3.org/2000/svg'><path d='m424.66 337.31v129.36h-261.32v-261.32h130.66l36.004-37.336h-166.67c-20.547 0-37.336 16.805-37.336 37.336v261.32c0 20.523 16.789 37.336 37.336 37.336h261.32c20.531 0 37.336-16.812 37.336-37.336v-166.68z'></path><path d='m568.56 114.25-52.793-52.809c-7.2539-7.2539-19.141-7.2539-26.395 0l-194.38 194.37-19.672 98.855 98.855-19.656 194.37-194.37c7.2617-7.25 7.2617-19.137 0.007813-26.391zm-212.77 186.35-32.938 6.5625 6.5469-32.957 173.18-173.16 26.395 26.395z'></path></g></svg>
                                  <a/>
                                </td>
                                <td>
                                  <a onclick='return confirmdelete()' href='../php/process_admin_delete_category.php?id={$value['id_categoria']}' class='btn btn-danger btn-sm btn-deleteItem'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='23px' height='23px' version='1.1' viewBox='0 0 700 700'><path d='m525 506.2c0 10.359-7.9453 18.793-17.711 18.793h-314.58c-9.7656 0-17.711-8.4336-17.711-18.793v-401.21h350zm-286.68-471.21h223.37l17.5 35h-258.37zm374.18 35c9.6602 0 17.5 7.8398 17.5 17.5s-7.8398 17.5-17.5 17.5h-52.5v401.21c0 29.68-23.66 53.793-52.711 53.793h-314.58c-29.086 0-52.711-24.113-52.711-53.793v-401.21h-52.5c-9.6602 0-17.5-7.8398-17.5-17.5s7.8398-17.5 17.5-17.5h94.184l30.172-60.34 0.14062 0.10547c2.9023-5.7383 8.6797-9.7656 15.504-9.7656h245c6.8242 0 12.602 4.0273 15.504 9.7656l0.14062-0.10547 30.172 60.34zm-262.5 105c-9.6602 0-17.5 7.8398-17.5 17.5v245c0 9.6602 7.8398 17.5 17.5 17.5s17.5-7.8398 17.5-17.5v-245c0-9.6602-7.8398-17.5-17.5-17.5zm-87.5 0c-9.6602 0-17.5 7.8398-17.5 17.5v245c0 9.6602 7.8398 17.5 17.5 17.5s17.5-7.8398 17.5-17.5v-245c0-9.6602-7.8398-17.5-17.5-17.5zm175 0c-9.6602 0-17.5 7.8398-17.5 17.5v245c0 9.6602 7.8398 17.5 17.5 17.5s17.5-7.8398 17.5-17.5v-245c0-9.6602-7.8398-17.5-17.5-17.5z' fill-rule='evenodd'></path></svg>
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
    </main>
  </div>
  <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
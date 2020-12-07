<?php
session_start();

if (!isset($_SESSION['user_admin'])) {
  header('location:index.php');
}

require_once("../php/class/header_titles.php");

$h = new Header_Titles();
$h_titles = $h->get_header_titles();

?>
<!doctype html>
<html lang="en" class="no-js">

<head>
  <?php require_once 'includes/header_links.php' ?>
  <title>Trueque | Administrar Cabecera</title>
</head>
<script>
  window.onload = function() {
    //Asignamos el evento al hacer click para cada boton...
    var elementos = document.getElementsByClassName('vista');
    for (let i = 0; i < elementos.length; i++) {
      elementos[i].addEventListener('click', obtenerValor);
    }
  }

  function obtenerValor(e) {
    var valores = "";

    var filas = e.srcElement.parentElement.parentElement.getElementsByTagName('td');

    for (let i = 0; i < filas.length; i++) {
      valores += filas[i].innerHTML + "\n";
    }
    alert(valores);
  }
</script>

<body>
  <?php include 'includes/header.php'; ?>
  <div class="ts-main-content">
    <?php include 'includes/leftbar.php'; ?>
    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- TÍTULO DEL ITEM Y BOTON DE AGREGADO -->
            <div id="content-title-manage">
              <h2 class="page-title">Administrar Cabecera <i class="fa fa-arrows-h"></i></h2>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading">Lista de Cabeceras</div>
              <div class="panel-body">
                <table id="zctb" class="display table table-striped table-bordered table-hover form-inline" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th width="50px">ID</th>
                      <th>Títulos</th>
                      <th>--</th>
                      <th>--</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      
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
</body>

</html>
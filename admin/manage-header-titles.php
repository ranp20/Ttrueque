<?php
session_start();

if (!isset($_SESSION["adm-logg_ttrueque"])) {
  header('location:index.php');
}

require_once("../php/class/header_titles.php");

$h = new Header_Titles();
$h_titles = $h->get_header_titles();

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <?php require_once 'includes/header_links.php';?>
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
  <script type="text/javascript" src="js/bootstrap-select.min.js"></script>
  <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>  
</body>
</html>
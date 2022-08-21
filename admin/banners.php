<?php
  session_start();
  if(!isset($_SESSION['user_admin'])){	
    header('location:index.php');
  }

  if(isset($_SESSION['msg'])){
    echo "<script>alert('{$_SESSION["msg"]}')</script>";
    unset($_SESSION["msg"]);
  }

  require_once("../php/class/banner.php");
  $b = new Banner();
  $data = $b->get_banners();
?>
<!doctype html>
<html lang="es">
<head>
  <?php require_once 'includes/header_links.php'?>
  <title>Trueque | Banners del Carousel</title>
</head>
<body>
  <?php require_once 'includes/adm_header-top.php';?>
  <div class="ts-main-content">
    <?php require_once 'includes/adm_sidebar-left.php';?>
    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-7">
            <!-- TÍTULO DEL ITEM Y BOTON DE AGREGADO -->
            <div id="content-title-list-user">
              <h2 class="page-title">Banners del Carousel&nbsp;&nbsp;<i class="fa fa-image"></i>
              </h2>
              <div id="content-btn-back-dash">
                <a href="dashboard.php" id="button-back-dash-left-header">Volver a Dashboard<i class="fa fa-arrow-right" id="icon-btn-back-dash"></i></a>
              </div>
            </div>
            <!-- Zero Configuration Table -->
            <div class="panel panel-default">
              <div class="panel-heading">Lista de Banners
              </div>
              <div class="panel-body">
                <div class="table-responsive py-3">
                  <table class="table border-top m-0 table-bordered table-responsive table-hover" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th style="text-align: center;">--</th>
                      </tr>
                    </thead>
                    <tbody class="tbody-second-banners-table">
                      <?php
                        foreach($data as $key){
                          $title = $key["titulo_banner"];
                          $desc = $key["descripcion_banner"];
                          $img = explode(".",$key["link_banner"])[0];
                          $im_path = "images/banner/" . $key["link_banner"];

                          echo "
                          <tr>
                            <td>{$key["id_banner"]}</td>
                            <td>
                              <a target=_blank href='{$im_path}'>
                                <img src='{$im_path}'>
                              </a>
                            </td>
                            <td>{$title}</td>
                            <td>{$desc}</td>
                            <td>
                              <a href='update_banners.php?id={$key["id_banner"]}' class='btn btn-primary btn-sm'>
                                <i class='fa fa-pencil-square-o'></i>
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
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap-select.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript" src="js/Chart.min.js"></script>
  <script type="text/javascript" src="js/fileinput.js"></script>
  <script type="text/javascript" src="js/chartData.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
</body>
</html>

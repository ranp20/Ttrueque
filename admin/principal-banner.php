<?php
session_start();
if(isset($_SESSION["adm-logg_ttrueque"])) {
  if(isset($_SESSION['msg'])){
    echo "<script>alert('{$_SESSION["msg"]}')</script>";
    unset($_SESSION["msg"]);
  }
}else{
  header('location:index.php');
}

require_once("../php/class/banner.php");
$b = new Banner();
$data = $b->get_banner_p();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php require_once 'includes/header_links.php'?>
  <title>Trueque | Banner Principal</title>
</head>
<body>
  <div id="dash-contT">
    <?php require_once 'includes/adm_sidebar-left.php';?>
    <main id="main-dashCamel">
      <?php require_once 'includes/adm_header-top.php';?>

      <div class="content-wrapper">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <!-- TÍTULO DEL ITEM Y BOTON DE AGREGADO -->
              <div id="content-title-list-user">
                <h2 class="page-title">Banner Principal&nbsp;&nbsp;<i class="fa fa-image"></i></h2>
                <div id="content-btn-back-dash">
                  <a href="dashboard.php" id="button-back-dash-left-header">Volver a Dashboard<i class="fa fa-arrow-right" id="icon-btn-back-dash"></i></a>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">Banner Principal</div>
                <div class="panel-body">
                  <div class="table-responsive py-3">
                    <table class="table border-top m-0 table-bordered table-responsive table-hover" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Imagen</th>
                          <th style="text-align: center;">--</th>
                        </tr>
                      </thead>
                      <tbody class="tbody-pri-banner-table">
                        <?php
                        foreach ($data as $val) {
                          $image = explode(".", $val["link_banner_p"])[0];
                          $img_path_p = "images/banner_principal/" . $val['link_banner_p'];
                          echo "
                            <tr>
                              <td>
                                <a target=_blank href='{$img_path_p}'>
                                  <img src='{$img_path_p}' alt='banner_principal' style='width:100%;'>
                                </a>
                              </td>
                              <td>
                                <a href='update_banner_p.php?id={$val["id"]}' class='btn btn-primary'>
                                  <i class='fa fa-pencil-square-o'></i>
                                </a>
                              </td>  
                            </tr>
                          ";
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

    </main>
  </div>
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
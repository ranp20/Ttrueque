<?php
  session_start();
  if(!isset($_SESSION["user_admin"])){
    header("Location: index.php");
  }
?>

<!doctype html>
<html lang="es">
<head>
  <?php require_once 'includes/header_links.php'?>
  <title>Trueque | Dashboard</title>
</head>
<body>
  <div id="dash-contT">
    <?php require_once 'includes/adm_sidebar-left.php';?>
    <main id="main-dashCamel">
      <?php require_once 'includes/adm_header-top.php';?>

      <div class="content-wrapper">
        <div class="container">
          <div class="row" id="fila-contenedor-principal-dashboard">
            <div class="col-md-12" id="contenedor-principal-dashboard">
              <h2 class="page-title">Administrar los Banners <i class="fa fa-image"></i>
              </h2>
              <div class="row">
                <div class="col-md-12">
                  <div class="row">
                  <!----------------------------->
                    <div class="col-md-4">
                      <div class="panel panel-default">
                        <div class="panel-body bk-info text-light">
                          <div class="stat-panel py-3 text-center">
                            <div class="stat-panel-number h1 ">
                            </div>
                            <div class="stat-panel-title text-uppercase">
                              <h4>Banner Principal</h4>
                            </div>
                          </div>
                        </div>
                        <a title="Banner Principal" href="principal-banner.php" class="block-anchor panel-footer text-center btn_dashboard">Detalle completo &nbsp; 
                          <i class="fa fa-arrow-right">
                          </i>
                        </a>
                      </div>
                    </div>
                  <!----------------------------->
                    <div class="col-md-4">
                      <div class="panel panel-default">
                        <div class="panel-body bk-success text-light">
                          <div class="stat-panel py-3 text-center">
                            <div class="stat-panel-number h1 ">
                            </div>
                            <div class="stat-panel-title text-uppercase">
                              <h4>Banners Carousel</h4>
                            </div>
                          </div>
                        </div>
                        <a title="Banners del Carousel" href="banners.php" class="block-anchor panel-footer text-center btn_dashboard">Detalle completo &nbsp; 
                          <i class="fa fa-arrow-right">
                          </i>
                        </a>
                      </div>
                    </div>
                    <!----------------------------->
                    <div class="col-md-4">
                      <div class="panel panel-default">
                        <div class="panel-body bk-warning text-light">
                          <div class="stat-panel py-3 text-center">
                            <div class="stat-panel-number h1 ">
                            </div>
                            <div class="stat-panel-title text-uppercase">
                              <h4>Banner de Publicidad</h4>
                            </div>
                          </div>
                        </div>
                        <a title="Banner de publicidad" href="banner-publicidad.php" class="block-anchor panel-footer text-center btn_dashboard">Detalle completo &nbsp; 
                          <i class="fa fa-arrow-right">
                          </i>
                        </a>
                      </div>
                    </div>
                    <!----------------------------->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </main>
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
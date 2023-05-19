<?php
session_start();
if(!isset($_SESSION["adm-logg_ttrueque"])){
  header("Location: index.php");
}
?>
<!DOCTYPE html>
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
                    <div class="col-md-4">
                      <div class="card panel panel-default text-center">
                        <div class="card-header bg-info text-light border-b-0">
                          <div class="stat-panel py-3 text-center">
                            <div class="stat-panel-number h1 ">
                            </div>
                            <div class="stat-panel-title text-uppercase">
                              <h4>Banner Principal</h4>
                            </div>
                          </div>
                        </div>
                        <div class="card-body panel-body">
                          <a title="Banner Principal" href="principal-banner.php" class="btn btn-primary block-anchor d-block">
                            <span>Detalle completo</span>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card panel panel-default text-center">
                        <div class="card-header bg-success text-light border-b-0">
                          <div class="stat-panel py-3 text-center">
                            <div class="stat-panel-number h1 ">
                            </div>
                            <div class="stat-panel-title text-uppercase">
                              <h4>Banner Principal</h4>
                            </div>
                          </div>
                        </div>
                        <div class="card-body panel-body">
                          <a title="Banners del Carousel" href="banners.php" class="btn btn-primary block-anchor d-block">
                            <span>Detalle completo</span>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card panel panel-default text-center">
                        <div class="card-header bg-warning text-light border-b-0">
                          <div class="stat-panel py-3 text-center">
                            <div class="stat-panel-number h1 ">
                            </div>
                            <div class="stat-panel-title text-uppercase">
                              <h4>Banner Principal</h4>
                            </div>
                          </div>
                        </div>
                        <div class="card-body panel-body">
                          <a title="Banner de publicidad" href="banner-publicidad.php" class="btn btn-primary block-anchor d-block">
                            <span>Detalle completo</span>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
  <script type="text/javascript" src="js/bootstrap-select.min.js"></script>
  <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
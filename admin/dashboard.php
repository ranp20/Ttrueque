<?php
  session_start();
  if(!isset($_SESSION["user_admin"])){
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
              <h2 class="page-title">Panel de Administración&nbsp;&nbsp;<i class="fa fa-home"></i>
              </h2>
              <div class="row">
                <div class="col-md-12">
                  <div class="row">
                  <!------ BOTON CATEGORÍAS ------>
                    <div class="col-md-4">
                      <div class="panel panel-default">
                        <div class="panel-body bk-danger text-light">
                          <div class="stat-panel py-3 text-center">
                            <div class="stat-panel-number h1 ">
                            </div>
                            <div class="stat-panel-title text-uppercase">
                              <h4>Categorías</h4>
                            </div>
                          </div>
                        </div>
                        <a title="Categorías" href="manage-category.php" class="block-anchor panel-footer text-center btn_dashboard">Detalle completo &nbsp; 
                          <i class="fa fa-arrow-right">
                          </i>
                        </a>
                      </div>
                    </div>
                  <!------ BOTON PRODUCTOS ------>
                    <!-- <div class="col-md-4">
                      <div class="panel panel-default">
                        <div class="panel-body bk-danger text-light">
                          <div class="stat-panel py-3 text-center">
                            <div class="stat-panel-number h1 ">
                            </div>
                            <div class="stat-panel-title text-uppercase">
                              <h4>Productos</h4>
                            </div>
                          </div>
                        </div>
                        <a title="Productos" href="manage-items.php" class="block-anchor panel-footer text-center btn_dashboard">Detalle completo &nbsp; 
                          <i class="fa fa-arrow-right">
                          </i>
                        </a>
                      </div>
                    </div> -->
                    <!------ BOTON PUNTUACIONES ------>
                    <div class="col-md-4">
                      <div class="panel panel-default">
                        <div class="panel-body text-light" style="background:#FFF852;">
                          <div class="stat-panel py-3 text-center">
                            <div class="stat-panel-number h1 ">
                            </div>
                            <div class="stat-panel-title text-uppercase">
                              <h4>Recargas</h4>
                            </div>
                          </div>
                        </div>
                        <a title="Puntuaciones" href="manage_recargas.php" class="block-anchor panel-footer text-center btn_dashboard">Detalle completo &nbsp; 
                          <i class="fa fa-arrow-right">
                          </i>
                        </a>
                      </div>
                    </div>
                  <!------ BOTON BANNERS ------>
                    <div class="col-md-4">
                      <div class="panel panel-default">
                        <div class="panel-body text-light"  style="background: #00A65A;">
                          <div class="stat-panel py-3 text-center">
                            <div class="stat-panel-number h1 ">
                            </div>
                            <div class="stat-panel-title text-uppercase">
                              <h4>Banners</h4>
                            </div>
                          </div>
                        </div>
                        <a title="Banners" href="banners-setup.php" class="block-anchor panel-footer text-center btn_dashboard">Detalle completo &nbsp; 
                          <i class="fa fa-arrow-right">
                          </i>
                        </a>
                      </div>
                    </div>
                  <!------ BOTON PEDIDOS ------>
                    <div class="col-md-4">
                      <div class="panel panel-default">
                        <div class="panel-body bk-info text-light">
                          <div class="stat-panel py-3 text-center">
                            <div class="stat-panel-number h1 ">
                            </div>
                            <div class="stat-panel-title text-uppercase">
                              <h4>Membresías</h4>
                            </div>
                          </div>
                        </div>
                        <a title="Pedidos" href="manage-menbresia.php" class="block-anchor panel-footer text-center btn_dashboard">Detalle completo &nbsp; 
                          <i class="fa fa-arrow-right">
                          </i>
                        </a>
                      </div>
                    </div>
                    <!------ BOTON USUARIOS ------>
                    <div class="col-md-4">
                      <div class="panel panel-default">
                        <div class="panel-body bk-primary text-light">
                          <div class="stat-panel py-3 text-center">
                            <div class="stat-panel-number h1 "></div>
                            <div class="stat-panel-title text-uppercase">
                              <h4>Usuarios</h4>
                            </div>
                          </div>
                        </div>
                        <a title="Usuarios" href="user-setup.php" class="block-anchor panel-footer text-center btn_dashboard">Detalle completo
                          <i class="fa fa-arrow-right">
                          </i>
                        </a>
                      </div>
                    </div>
                  <!------ BOTON FEEDBACK ------>
                    <div class="col-md-4">
                      <div class="panel panel-default">
                        <div class="panel-body text-light" style="background:#800000;">
                          <div class="stat-panel py-3 text-center">
                            <div class="stat-panel-number h1 ">
                            </div>
                            <div class="stat-panel-title text-uppercase">
                              <h4>Credenciales</h4>
                            </div>
                          </div>
                        </div>
                        <a title="credenciales" href="manage-credentials.php" class="block-anchor panel-footer text-center btn_dashboard">Detalle completo &nbsp; 
                          <i class="fa fa-arrow-right">
                          </i>
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
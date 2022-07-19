<?php
  session_start();

  require_once '../php/class/all.php';
  $all = new ALl();
  $mante = $all->get_mantenience();


?>
<!doctype html>
<html lang="en" class="no-js">

<head>
    <?php require_once 'includes/header_links.php'?>
    <title>Trueque | Mantenimiento</title>
</head>

<body>
    <?php include('includes/header.php');?>
    <div class="ts-main-content">
        <?php include('includes/leftbar.php');?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <!-- TÍTULO DEL ITEM Y BOTON DE AGREGADO -->
                        <div id="content-title-list-user">
                            <h2 class="page-title">Mantemiento&nbsp;&nbsp;<i class="fa fa-cogs"></i>
                            </h2>
                            <div id="content-btn-back-dash">
                                <a href="dashboard.php" id="button-back-dash-left-header">Volver a Dashboard<i
                                        class="fa fa-arrow-right" id="icon-btn-back-dash"></i></a>
                            </div>
                        </div>
                        <!-- Zero Configuration Table -->
                        <div class="panel panel-default">
                            <div class="panel-heading">Mostrar Mantenimiento
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive py-3">
                                    <table class="table border-top m-0 table-bordered table-responsive table-hover"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Publicación</th>
                                                <!--<th>Desde</th>
                                                <th>Hasta</th>-->
                                                <th>Opción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach($mante as $man){
                                                echo "
                                                <tr>
                                                    <td>{$man["id"]}</td>
                                                    <td>{$man["state_mantenience"]}</td>
                                                    <!--<td>{$man["desde"]}</td>
                                                    <td>{$man["hasta"]}</td>-->
                                                    <td> <a  href='update-maintenance.php?id={$man["id"]}'  class='btn btn-primary'>Editar</a></td>                                                                                              
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
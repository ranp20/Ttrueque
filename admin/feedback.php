<?php
session_start();

if(!isset($_SESSION["adm-logg_ttrueque"]))
{	
header('location:index.php');
}

require_once("../php/class/all.php");

$a = new All();
$feedback = $a->get_feedback();

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php require_once 'includes/header_links.php';?>
  <title>Trueque | Feedback</title>
</head>
<body>
  <?php require_once 'includes/adm_header-top.php';?>
  <div class="ts-main-content">
    <?php require_once 'includes/adm_sidebar-left.php';?>
    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div id="content-title-list-user">
              <h2 class="page-title">Comentarios <i class="fa fa-commenting"></i></h2>
              <div id="content-btn-back-dash">
                <a href="dashboard.php" id="button-back-dash-left-header">Volver a Dashboard<i class="fa fa-arrow-right" id="icon-btn-back-dash"></i></a>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading">Lista de Comentarios</div>
              <div class="panel-body">
                <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Cliente</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      foreach($feedback as $val){
                        echo "<tr>
                          <td>{$val['id']}</td>
                          <td>{$val['fmsg']}</td>
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
  <script type="text/javascript" src="js/bootstrap-select.min.js"></script>
  <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
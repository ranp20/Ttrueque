<?php
session_start();

if(!isset($_SESSION['user_admin']))
{	
header('location:index.php');
}

require_once("../php/class/all.php");

$a = new All();
$feedback = $a->get_feedback();

?>
<!doctype html>
<html lang="en" class="no-js">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=gb18030">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="theme-color" content="#3e454c">
  <title>Trueque | Feedback</title>
  <!-- Font awesome -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-social.css">
  <link rel="stylesheet" href="css/bootstrap-select.css">
  <link rel="stylesheet" href="css/fileinput.min.css">
  <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/estilos.css">
  <link rel="stylesheet" href="css/customs/customs.css">
</head>
<body>
  <?php include('includes/header.php');?>
  <div class="ts-main-content">
    <?php include('includes/leftbar.php');?>
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
    $(document).ready(function () {
      setTimeout(function() {
        $('.succWrap').slideUp("slow");
      }
                 , 3000);
    }
                     );
  </script>
</body>
</html>
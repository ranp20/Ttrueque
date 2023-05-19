<?php
  session_start();
  if(isset($_SESSION["adm-logg_ttrueque"])){  
    if(isset($_SESSION['msg'])){
      echo "<script>alert('{$_SESSION["msg"]}')</script>";
      unset($_SESSION["msg"]);
    }
  }else{
    header('location:index.php');
  }

  require_once("../php/class/banner.php");
  $b = new Banner();
  $data = $b->get_banners();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php require_once 'includes/header_links.php'?>
  <title>Trueque | Banners del Carousel</title>
</head>
<body>
  <div id="dash-contT">
    <?php require_once 'includes/adm_sidebar-left.php';?>
    <main id="main-dashCamel">
      <?php require_once 'includes/adm_header-top.php';?>
      <div class="content-wrapper">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-7">
              <div id="content-title-list-user">
                <h2 class="page-title">Banners del Carousel&nbsp;&nbsp;<i class="fa fa-image"></i>
                </h2>
                <div id="content-btn-back-dash">
                  <a href="dashboard.php" id="button-back-dash-left-header">Volver a Dashboard<i class="fa fa-arrow-right" id="icon-btn-back-dash"></i></a>
                </div>
              </div>
              <div class="panel panel-default">
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
                                <a href='update_banners.php?id={$key["id_banner"]}' class='btn btn-primary btn-sm btn-editItem'>
                                  <svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='29px' height='29px' version='1.1' viewBox='0 0 700 700'><g xmlns='http://www.w3.org/2000/svg'><path d='m424.66 337.31v129.36h-261.32v-261.32h130.66l36.004-37.336h-166.67c-20.547 0-37.336 16.805-37.336 37.336v261.32c0 20.523 16.789 37.336 37.336 37.336h261.32c20.531 0 37.336-16.812 37.336-37.336v-166.68z'></path><path d='m568.56 114.25-52.793-52.809c-7.2539-7.2539-19.141-7.2539-26.395 0l-194.38 194.37-19.672 98.855 98.855-19.656 194.37-194.37c7.2617-7.25 7.2617-19.137 0.007813-26.391zm-212.77 186.35-32.938 6.5625 6.5469-32.957 173.18-173.16 26.395 26.395z'></path></g></svg>
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
    </main>
  </div>
  <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
</body>
</html>

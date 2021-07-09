<?php
session_start();
if (!isset($_SESSION['user_admin'])) {
    header('location:index.php');
}

require_once("../php/class/wallet_client.php");
$wc = new Wallet_client();
$dat = $wc->get_data();

?>
<!doctype html>
<html lang="en" class="no-js">
<head>
  <?php require_once 'includes/header_links.php' ?>
  <title>Trueque | Administrar Recargas</title>
</head>
<script>
  function confirmdelete() {
    res = confirm("¿Seguro que desea eliminar este registro?");
    if (res == true) {
      return true;
    } else {
      return false;
    }
  }
</script>
<body>
  <?php include('includes/header.php'); ?>
  <div class="ts-main-content">
    <?php include('includes/leftbar.php'); ?>
    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <!-- TÍTULO DEL ITEM Y BOTON DE AGREGADO -->
            <div id="content-title-manage">
              <h2 class="page-title">Administrar Recargas <i class="fa fa-flag"></i></h2>
              <div>
                <a href="add-recarga.php" id="button-add-left-header"><i class="fa fa-plus-circle" id="icon-btn-add"></i>Agregar Recarga</a>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading">Lista de Recargas</div>
              <div class="panel-body">
                <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Imagen</th>
                      <th>Tipo</th>
                      <th>Cantidad</th>
                      <th>Precio</th>
                      <th width="15%">--</th>
                      <th width="15%">--</th>
                    </tr>
                  </thead>
                  <tbody class="tbody-recharges-admin-table">
                    <?php
                      foreach ($dat as $value) {
                        if($value['id'] != 1){
                          $img = $value["image"];
                          $img_path = "images/recargas/" . $img;
                          echo "
                          <tr>
                            <td>
                              <a target=_blank href='{$img_path}'>
                                <img src='{$img_path}'>
                              </a>
                            </td>
                            <td>{$value['tipo']}</td>
                            <td>{$value['cap_carga']}</td>
                            <td>{$value['precio']}</td>
                            <td>
                              <a href='update_wallet_client.php?id={$value['id']}' class='btn btn-primary btn-sm'>
                                <i class='fa fa-pencil-square-o'></i>
                              <a/>
                            </td>
                            <td>
                              <a onclick='return confirmdelete()' href='../php/process_admin_delete_wallet_client.php?id={$value['id']}' class='btn btn-danger btn-sm'>
                                <i class='fa fa-close'></i>
                              <a/>
                            </td>
                          </tr>";
                      }
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
      $(document).ready(function() {
          setTimeout(function() {
              $('.succWrap').slideUp("slow");
          }, 3000);
      });
  </script>
  <!-- --- SWEETALERT --- -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>
</html>
<?php
session_start();

if (isset($_SESSION["user_admin"])) {
  header("Location: dashboard.php");
}

?>

<!doctype html>
<html lang="en" class="no-js">
<head>
  <?php require_once 'includes/header_links.php' ?>
  <title>Trueque | Login Admin</title>
</head>
<body id="body-login">
    <?php 
      if (isset($_SESSION["error"])) {
     ?>
     <?php 
      echo $_SESSION["error"]; 
      unset($_SESSION["error"]);
     ?>
     <?php } ?>
  <div id="container-login">
    <div id="content-login">
      <div id="content-header-login">
        <img class="logo-admin-ttrk-login" src="../img/logo/Logo_TTRK.png" alt="logo_Ttrueque">
      </div>
      <div id="divisor-login"></div>
      <div id="content-body-login">
        <form method="POST" action="../php/process_admin_login.php">
          <div class="form-group-login">
            <h1 for="">Iniciar sesión en tu cuenta</h1>
          </div>
          <div class="form-group-login">
            <div class="content-user-icon-caja">
              <i class="fa fa-user"></i>
              <input type="text" maxlength="100" name="username" placeholder="Username">
            </div>
          </div>
          <div class="form-group-login">
            <div class="content-key-icon-caja">
              <i class="fa fa-key"></i>
              <input type="password" maxlength="100" name="password" placeholder="Password">
            </div>
          </div>
          <div class="form-group-login">
            <button type="submit" name="login"><i class="fa fa-unlock"></i>Iniciar sesión</button>
          </div>
        </form>
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
  <!-- SWEEET ALERT 2-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>
</html>
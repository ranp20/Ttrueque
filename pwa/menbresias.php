<?php
session_start();

if(!isset($_SESSION['user'])){
  header("location: index.php");
}

require_once "../php/class/menbresia.php";
$c = new Menbresia();
$cat = $c->get_data();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once 'includes/header-index.php'; ?>
  <title>Menbresías - App WebView</title>
  <link rel="stylesheet" href="../shop/css/style.css">
</head>
<body class="body-menbresiaspwa" style="padding-bottom: 7rem;">
  <?php require_once 'includes/headertop-pwa.php'; ?>
  <div class="mrgtop-57 container-membership-ttrk">
    <div class="container-ttlp-memb">
      <div class="content-memb-ttrk">
        <input type="hidden" class="get_selidtienda" value="<?php echo $_SESSION['idtienda_m'] ?>">
        <input type="hidden" class="get_selcantidadtienda" value="<?php echo $_GET['cantst']; ?>">
        <main style="background-color: transparent;">
          <div class="content-memb-titles">
            <h3 class="lang_ttrq" key="title-top-addmembership-cli-ad_cli" style="color: #fff;">MEMBRESÍA DE VENDEDORES</h3>
          </div>
          <div class="content-memb-targets"></div>
        </main>
      </div>
    </div>
  </div>
  <?php require_once 'includes/tabsbottom-pwa.php'; ?>
  <script src="js/actions-pages/menbresia.js"></script>
</body>
</html>
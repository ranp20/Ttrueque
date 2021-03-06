<?php
session_start();
require_once("../php/class/menbresia.php");
$c = new Menbresia();
$cat = $c->get_data();

if (!isset($_SESSION['user'])) {
  header("Location: ../home");
}

$title = "Menbresías";
include "./head/head.php";
?>
<div class="container-membership-ttrk">
  <div class="container-ttlp-memb">
    <div class="content-memb-ttrk">
      <header>
        <div class="content-top-memb">
          <div class="cont-memb-logo-ttrk">
            <a href="../">
              <img src="../img/logo/Logo_TTRK.png" alt="logo-ttrueque">
            </a>
          </div>
        </div>
      <input type="hidden" class="get_selidtienda" value="<?php echo $_SESSION['idtienda_m'] ?>">
      <input type="hidden" class="get_selcantidadtienda" value="<?php echo $_GET['cantst']; ?>">
      </header>
      <main>
        <div class="content-memb-titles">
          <h3 class="lang_ttrq" key="title-top-addmembership-cli-ad_cli">MEMBRESÍA DE VENDEDORES</h3>
        </div>
        <div class="content-memb-targets"></div>
      </main>
    </div>
  </div>
</div>
<script src="../../Trueque/shop/js/membresia.js"></script>
</body>
</html>
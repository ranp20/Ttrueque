<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('location: ../login');
}

require_once("../php/class/menbresia.php");
$c = new Menbresia();
$cat = $c->get_data();

$title = "Menbresías";
include "./head/head.php";
?>
<div class="container-membership-ttrk">
  <div class="container-ttlp-memb">
    <div class="content-memb-ttrk">
      <header class="cont-cheaderMembership">
        <div class="cont-cheaderMembership--c">
          <ul class="cont-cheaderMembership--c--m">
            <li class="cont-cheaderMembership--c--m--item">
              <a href="../home">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 125" x="0px" y="0px"><path d="M77.81641,44.37891l-24.54-19.1084A5.32516,5.32516,0,0,0,46.72461,25.27l-24.541,19.10937a5.297,5.297,0,0,0-2.05566,4.207V83.19922a5.338,5.338,0,0,0,5.332,5.332H37.87988a5.338,5.338,0,0,0,5.332-5.332V66.48438a1.33369,1.33369,0,0,1,1.332-1.332h10.9121a1.33369,1.33369,0,0,1,1.332,1.332V83.19922a5.338,5.338,0,0,0,5.332,5.332H74.54a5.338,5.338,0,0,0,5.332-5.332V48.58643A5.29866,5.29866,0,0,0,77.81641,44.37891ZM75.87207,83.19922a1.33368,1.33368,0,0,1-1.332,1.332H62.12012a1.33368,1.33368,0,0,1-1.332-1.332V66.48438a5.338,5.338,0,0,0-5.332-5.332H44.544a5.338,5.338,0,0,0-5.332,5.332V83.19922a1.33368,1.33368,0,0,1-1.332,1.332H25.46a1.33368,1.33368,0,0,1-1.332-1.332V48.58643a1.32594,1.32594,0,0,1,.51269-1.05127l24.542-19.10938a1.32843,1.32843,0,0,1,1.63574.00049l24.541,19.1084a1.3276,1.3276,0,0,1,.51269,1.05176Z"/><path d="M85.71777,39.44189l-32.335-24.99707a5.534,5.534,0,0,0-6.76562,0l-32.335,24.99707a2.00041,2.00041,0,0,0,2.44726,3.165l32.335-24.99707a1.52735,1.52735,0,0,1,1.8711,0l32.335,24.99707a2.00041,2.00041,0,0,0,2.44726-3.165Z"/><path d="M69.4043,16.88379h2.707v6.466l4,3.09217V16.71729a3.83778,3.83778,0,0,0-3.833-3.8335h-3.041a3.83777,3.83777,0,0,0-3.833,3.8335V18.165l4,3.09216Z"/></svg>
              </a>
            </li>
            <li class="cont-cheaderMembership--c--m--item">
              <a href="../">
                <img src="../img/logo/Logo_TTRQ_dark.png" alt="logo-ttrueque">
              </a>
            </li>
          </ul>
        </div>
        <input type="hidden" class="get_selidtienda" value="<?php echo $_SESSION['idtienda_m'] ?>">
        <input type="hidden" class="get_selcantidadtienda" value="<?php echo $_GET['cantst']; ?>">
      </header>
      <main>
        <div class="content-memb-titles">
          <h3 class="lang_ttrq" key="title-top-addmembership-cli-ad_cli">MENBRESÍA</h3>
        </div>
        <div class="content-memb-targets"></div>
      </main>
    </div>
  </div>
</div>
<script src="../shop/js/membresia.js"></script>
</body>
</html>
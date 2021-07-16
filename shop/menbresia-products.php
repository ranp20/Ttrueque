<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('location: ../login');
}

require_once "../php/class/menbresia.php";
$c = new Menbresia();
$cat = $c->get_data();
require_once '../php/class/client.php';
$c = new Client();
$d = $c->get_data_by_id($_SESSION['user']);

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
            <li class="cont-cheaderMembership--c--m--item">
              <a href="./">
                <div>
                  <svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" clip-rule="evenodd" fill-rule="evenodd" fill="#fff">
                   <g>
                    <path stroke="null" id="svg_1" d="m19.94909,-0.00021c11.01035,0 19.9493,8.93895 19.9493,19.9493s-8.93895,19.9493 -19.9493,19.9493s-19.9493,-8.93895 -19.9493,-19.9493s8.93895,-19.9493 19.9493,-19.9493zm13.51066,32.26799c-0.46881,-0.66664 -1.2834,-1.08724 -2.69981,-1.41308c-6.39708,-1.50617 -6.81102,-2.49532 -7.23495,-3.42297c-0.43057,-0.93928 -0.31586,-2.0448 0.3408,-3.28665c2.86937,-5.41457 3.4745,-10.01455 1.70733,-12.95042c-1.12049,-1.86027 -3.11708,-2.88267 -5.62404,-2.88267c-2.52857,0 -4.54179,1.04069 -5.66726,2.93088c-1.77216,2.97411 -1.15207,7.55413 1.7439,12.89556c0.6683,1.23353 0.79132,2.33739 0.36574,3.28166c-0.44055,0.97419 -1.01575,1.97831 -7.25656,3.4346c-1.4164,0.32584 -2.231,0.74644 -2.69814,1.40975c3.34483,3.66901 8.16259,5.97149 13.51233,5.97149s10.16583,-2.30248 13.51066,-5.96817zm1.08059,-1.30003c2.31911,-3.06554 3.69561,-6.88251 3.69561,-11.01866c0,-10.09268 -8.19417,-18.28686 -18.28686,-18.28686s-18.28686,8.19417 -18.28686,18.28686c0,4.13449 1.37484,7.95146 3.69395,11.01534c0.67994,-0.75142 1.7439,-1.34658 3.40634,-1.7306c3.36644,-0.76805 5.6124,-1.3898 6.11446,-2.49699c0.20282,-0.45218 0.10141,-1.04401 -0.31254,-1.80707c-3.1869,-5.87673 -3.79369,-11.04027 -1.71231,-14.53805c1.41806,-2.37895 4.00316,-3.74216 7.09696,-3.74216c3.0672,0 5.63734,1.34325 7.04875,3.6873c2.07971,3.45622 1.48955,8.63638 -1.66244,14.58626c-0.4073,0.76971 -0.50538,1.36486 -0.29758,1.81871c0.50704,1.11051 2.73305,1.72561 6.09617,2.492c1.66244,0.38236 2.7264,0.98084 3.40634,1.73393z"/>
                   </g>
                  </svg>
                </div>
                <span><?= $d[0]['nombre_cliente'];?></span>
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
<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('location: ../account');
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
            <header>
                <div class="content-top-memb">
                    <div class="cont-memb-logo-ttrk">
                        <a href="../">
                            <img src="../img/logo/Logo_TTRQ_dark.png" alt="logo-ttrueque">
                        </a>
                    </div>
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
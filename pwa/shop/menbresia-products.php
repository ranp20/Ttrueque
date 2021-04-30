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

<?php require_once '../php/process_header.php'; ?>
<input type="hidden" id="userid_cli" value="<?php echo $_SESSION['user']; ?>">
<?php require_once "headertop-pwa.php"; ?>

<div class="container-membership-ttrk mrgtop-57" style="padding-bottom: 3rem;">
    <div class="container-ttlp-memb">
        <div class="content-memb-ttrk">
            <input type="hidden" class="get_selidtienda" value="<?php echo $_SESSION['idtienda_m'] ?>">
            <input type="hidden" class="get_selcantidadtienda" value="<?php echo $_GET['cantst']; ?>">
            <main>
                <div class="content-memb-titles">
                    <h3 class="lang_ttrq" key="title-top-addmembership-cli-ad_cli">MEMBRESÍA DE VENDEDORES</h3>
                </div>
                <div class="content-memb-targets"></div>
            </main>
        </div>
    </div>
</div>
<?php require_once 'tabsbottom-pwa.php'; ?>
<script src="../shop/js/membresia.js"></script>
<script src="js/buy-cart.js"></script>
  <script type="text/javascript">
      ((d) => {
      
          d.querySelector('#btn-tdc-toggle').addEventListener('click', function (){
            let sidebarmanager = d.querySelector('.sidebar-nav');
            let closebtnsidebarleft = d.querySelector('.c-left-btn-tdc');
            if(!sidebarmanager.classList.contains('active')){
              sidebarmanager.style.paddingTop = "3.5rem";
              sidebarmanager.style.paddingBottom = "5rem";
              closebtnsidebarleft.style.top = "60px";
            }else{
              closebtnsidebarleft.style.top = "5px";
            }
          })
      })(document);
  </script>
</body>
</html>
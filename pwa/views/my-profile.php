<?php 
	
session_start();

if(!isset($_SESSION['user'])){
  header("location: index.php");
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once 'header_index.php'; ?>
    <title>My profile - App WebView</title>
</head>
<body class="body-my-profilepwa body-homepwa">
    <div class="loader-cli">
        <img src="../shop/images/gifs/shopping-loader.gif" alt="Loading...">
    </div>
    <?php 
      require_once './headertop-pwa.php'; 
      require_once '../php/process_header.php';
    ?>
    <div class="mrgtop-57 maxwidth-container">
    <div class="myprofile-cont">
      <div class="myprofile-cont--title">
        <h2>MI PERFIL</h2>
      </div>
      <div class="myprofile-cont--dropdown-menu">
        <div class="myprofile-cont--dropdown-menu--nameuser">
          <div class="myprofile-cont--dropdown-menu--nameuser--text">
            <span class="lang_ttrq" key="name_user">¡Hola,</span>
            <span>&nbsp;<?php echo ucfirst($d[0][3]);?>!</span>
          </div>
          <div class="myprofile-cont--dropdown-menu--nameuser--icon">
            <img src="img/icons/icon-arrow-down.svg" alt="">
          </div>
        </div>
        <div class="myprofile-cont--dropdown-menu--slide">
          <?php
            if (!isset($_SESSION["user"])) {
              echo "<a href='./account' class='btn_1' title=''>Inicia sesi&oacute;n o reg&iacute;strate</a>";
             
            } else {
              if (!isset($tienda[1][0]["id_menbresia"])) {
                echo "<a class='dropdown-item' href='login' title='Home'><i class='ti-home'></i><span>Ir a inicio</span></a>
                      <a class='dropdown-item' href='cliente/menbresia' title='Mi perfil'><i class='ti-user'></i><span class='lang_ttrq' key='list_user-opt-h-1'>Administrar mi cuenta</span></a>
                      <a class='dropdown-item' href='./track-order' title='Ratrea tu pedido'><i class='ti-truck'></i><span class='lang_ttrq' key='list_user-opt-h-2'>Rastrea tu pedido</span></a>
                      <a class='dropdown-item' href='././php/process_account_logout.php' title='Salir'><i class='ti-power-off'></i><span  class='lang_ttrq' key='list_user-opt-h-4'>Cerrar sesi&oacute;n</span></a>
                    ";
              } else {
                echo "<a class='dropdown-item' href='login' title='Home'><i class='ti-home'></i><span>Ir a inicio</span></a>
                      <a class='dropdown-item' href='shop' title='Mi perfil'><i class='ti-user'></i><span class='lang_ttrq' key='list_user-opt-h-1'>Administrar mi cuenta</span></a>
                      <a class='dropdown-item' href='./track-order
                      ' title='Ratrea tu pedido'><i class='ti-truck'></i><span class='lang_ttrq' key='list_user-opt-h-2'>Rastrea tu pedido</span><span id='count-trackorder'>0</span></a>
                      <a class='dropdown-item' href='././php/process_account_logout.php' title='Salir'><i class='ti-power-off'></i><span  class='lang_ttrq' key='list_user-opt-h-4'>Cerrar sesi&oacute;n</span></a>
                    ";
              }
            }
          ?>
        </div>
      </div>
      <div class="myprofile-cont--dropdown-menu">
        <div class="myprofile-cont--dropdown-menu--nameuser">
          <div class="myprofile-cont--dropdown-menu--nameuser--text">
            <span>Idiomas</span>
          </div>
          <div class="myprofile-cont--dropdown-menu--nameuser--icon">
            <img src="img/icons/icon-arrow-down.svg" alt="">
          </div>
        </div>
        <div class="myprofile-cont--dropdown-menu--slide">
          <?php
            foreach ($flags as $key => $value) {
              echo "<a href='login'
                        
                        data-pref='{$value['prefijo_moneda']}' 
                        data-simbol='{$value['simbolo_moneda']}' 
                        data-moneda='{$value['moneda']}' 

                        class='dropdown-item translate_lang change-tolanguage' id='{$value['prefijo']}'>
                        <img src='./admin/images/banderas/{$value['bandera']}'>
                    </a>
                  ";
              }
          ?>
        </div>
      </div>
    </div>
  </div>
    <?php require_once './tabsbottom-pwa.php'; ?>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript" src="js/actions_pages/buy_cart.js"></script>
    <script type="text/javascript" src="js/actions_pages/remove.js"></script>
    <script type="text/javascript" src="js/actions_pages/customs.js"></script>
    <script type="text/javascript" src="js/actions_pages/all_pages_index.js"></script>
    <script type="text/javascript" src="js/actions_pages/language_currency.js"></script>
     
    
    <script type="text/javascript">
      $(document).ready(function(){
        $('.myprofile-cont--dropdown-menu--nameuser').on('click', function() {
          $(this).children('.myprofile-cont--dropdown-menu--nameuser--icon').toggleClass('slide');
          $(this).next().slideToggle();
        });
      });
    </script>
</body>
</html>
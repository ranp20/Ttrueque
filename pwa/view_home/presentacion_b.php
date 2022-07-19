<?php require_once "./php/process_header_home.php"; ?>


<div class="content-total-banner" id="cont-b-init-home-ttrq">
    <!-------------------------->
    <nav class="navbar navbar-expand-lg navbar-dark justify-content-sm-start fixed-top" id="cont-total-tabs">
      <div class="container">
        <a class="navbar-brand order-1 order-lg-0 ml-lg-0 ml-2 mr-auto cont-logo-ttrq-nav-tabs" href="./">
          <img src="././img/logo/logotipo-T-white.svg" alt="Logo_Ttrueque" class="img-fluid">
        </a>
        <button class="navbar-toggler align-self-start menu-nav-burger" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse p-3 p-lg-0 mt-5 mt-lg-0 d-flex flex-column flex-lg-row flex-xl-row justify-content-lg-between mobileMenu tabs-header nav-home-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav align-self-stretch d-flex justify-content-between cont-tabs-principal-home cont-links-pgs-info">
            <a href="#textoinicioshome">
                <li class="nav-item dropdown">
                    <span>INICIO</span>
                </li>
            </a>
            <a href="#que-es-ttrueque">
                <li class="nav-item dropdown">
                    <span>¿QUÉ ES?</span>
                </li>
            </a>
            <a href="#guia-al-comprador-ttrueque">
                <li class="nav-item dropdown">
                    <span>GUÍA AL COMPRADOR</span>
                </li>
            </a>
            <a href="#guia-al-vendedor-ttrueque">
                <li class="nav-item dropdown">
                    <span>GUÍA AL VENDEDOR</span>
                </li>
            </a>
            <a href="#preguntas-frecuentes-ttrueque">
                <li class="nav-item dropdown">
                    <span>PREGUNTAS FRECUENTES</span>
                </li>
            </a>
          </ul>
        </div>
        
            <?php 
              
                if (isset($_SESSION["user"])) {
                  echo '  <div class="content-options-trk-tabs valid-user order-1">
                              <a href="./" class="ico-user-valid">Volver al CLUB &nbsp;&nbsp;<i class="fal fa-user fa-2x"></i></a>
                          </div>';
                }else{
                  echo '  <div class="content-options-trk-tabs order-1">
                              <a href="login">Iniciar Sesión</a>
                              <!--<a href="account">Abrir Cuenta</a>-->
                          </div>';
                }
                  ?>
        
      </div>
    </nav>
<div class="overlay"></div>
    <div class="content-banner-p-trk">
        <div class="content-b-banner-trk">
            <section>
                <div class="container-texto">
                    <div class="content-slogan-trk">
                        <h2>La forma FÁCIL y segura de vender y comprar, sin arriesgar tu DINERO CONVENCIONAL</h2>
                    </div>
                    <div class="content-options-sus-trk">
                        <div class="content-left-o">
                            <h2>Vende en tu propio negocio</h2>
                            <p>Usando tu cuenta o tarjeta Trueke Al vender, tu ganancia se DUPLICA Ejemplo: Vendes un
                                producto a 50 dólares. (o su equivalente en moneda nacional) Automáticamente tu cuenta
                                en Trueke lo duplica: Obtienes 100 Bikers. <a href="javascript:void(0);">Mayores detalles</a></p>
                            <a href="account" class="btn-register">Regístrate sin costo</a>
                        </div>
                        <div class="content-right-o">
                            <h2>Compras de forma segura</h2>
                            <p>Tu saldo estará fijado en Bikers Ejemplo: Vas a comprar un producto que cuesta 30 dólares
                                (o su equivalente en moneda nacional)Con tu cuenta Trueke, pagarás con 30 Bikers. Porque
                                cada Biker, es equivalente a un dólar. <a href="javascript:void(0);">Mayores detalles</a></p>
                            <a href="account" class="btn-register">Regístrate sin costo</a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
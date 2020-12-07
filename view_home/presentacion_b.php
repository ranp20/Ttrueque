<?php require_once "./php/process_header_home.php"; ?>

<div class="content-total-banner">
    <div class="content-header-trk">
        <header class="header-trk">
            <section>
                <div class="content-logo-trueque">
                    <div id="cont-logo--trk">
                        <a href="home.php">
                            <img src="./img/logo/Logo_TTRK.png" alt="logo_Ttrueque">
                        </a>
                    </div>
                </div>

                <?php 
              
                if (isset($_SESSION["user"])) {
                  echo '  <div class="content-options-trk valid-user">
                              <a href="./" class="ico-user-valid">Volver al CLUB &nbsp;&nbsp;<i class="fal fa-user fa-2x"></i></a>
                          </div>';
                }else{
                  echo '  <div class="content-options-trk">
                              <a href="login">Iniciar Sesión</a>
                              <a href="account">Abrir Cuenta</a>
                          </div>';
                }
                  ?>




            </section>
        </header>
    </div>
    <!-- ///BARRA DE NAVEGACIÓN EN EL HEADER-->
    <div class="content-b-bar-options-h">
        <div class="cont-opts-h">
            <ul class="cont-links-pgs-info">
                <a href="#textoinicioshome">
                    <li> INICIO </li>
                </a>
                <a href="#que-es-ttrueque">
                    <li>¿ QUÉ ES ?</li>
                </a>
                <a href="#guia-al-comprador-ttrueque">
                    <li>GUÍA AL COMPRADOR</li>
                </a>
                <a href="#guia-al-vendedor-ttrueque">
                    <li>GUÍA AL VENDEDOR</li>
                </a>
                <a href="#preguntas-frecuentes-ttrueque">
                    <li> PREGUNTAS FRECUENTES </li>
                </a>
            </ul>
        </div>
    </div>
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
                                en Trueke lo duplica: Obtienes 100 Bikers. <a href="#">Mayores detalles</a></p>
                            <a href="account" class="btn-register">Regístrate sin costo</a>
                        </div>
                        <div class="content-right-o">
                            <h2>Compras de forma segura</h2>
                            <p>Tu saldo estará fijado en Bikers Ejemplo: Vas a comprar un producto que cuesta 30 dólares
                                (o su equivalente en moneda nacional)Con tu cuenta Trueke, pagarás con 30 Bikers. Porque
                                cada Biker, es equivalente a un dólar. <a href="#">Mayores detalles</a></p>
                            <a href="account" class="btn-register">Regístrate sin costo</a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
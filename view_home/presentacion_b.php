<?php require_once "./php/process_header_home.php"; ?>


<div class="content-total-banner" id="cont-b-init-home-ttrq">
    <!-------------------------->
    <nav class="navbar navbar-expand-lg navbar-dark justify-content-sm-start fixed-top" id="cont-total-tabs">
      <div class="container" id="c--navbarcontainerHome">
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
            <a href="allstores">
                <li class="nav-item dropdown">
                    <span>TIENDAS TTRUEQUE</span>
                </li>
            </a>
          </ul>
        </div>
        
            <?php 
              
                if (isset($_SESSION["user"])) {
                  echo '  <div class="content-options-trk-tabs valid-user order-1">
                            <a href="./" class="ico-user-valid">
                                <span>Volver</span>
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 1024 1280" style="enable-background:new 0 0 1024 1024;" xml:space="preserve"><g><g><g><path d="M896,512.4c0,19.1-1.3,38.1-3.8,57c0.5-3.5,1-7.1,1.4-10.6c-5,37.1-14.9,73.3-29.4,107.8     c1.3-3.2,2.7-6.4,4-9.6c-14.3,33.6-32.8,65.3-55.1,94.3c2.1-2.7,4.2-5.4,6.3-8.1c-22.2,28.7-48,54.5-76.7,76.7     c2.7-2.1,5.4-4.2,8.1-6.3c-28.9,22.3-60.6,40.8-94.3,55.1c3.2-1.3,6.4-2.7,9.6-4c-34.5,14.5-70.7,24.4-107.8,29.4     c3.5-0.5,7.1-1,10.6-1.4c-37.8,5-76.1,5-113.9,0c3.5,0.5,7.1,1,10.6,1.4c-37.1-5-73.3-14.9-107.8-29.4c3.2,1.3,6.4,2.7,9.6,4     c-33.6-14.3-65.3-32.8-94.3-55.1c2.7,2.1,5.4,4.2,8.1,6.3c-28.7-22.2-54.5-48-76.7-76.7c2.1,2.7,4.2,5.4,6.3,8.1     c-22.3-28.9-40.8-60.6-55.1-94.3c1.3,3.2,2.7,6.4,4,9.6c-14.5-34.5-24.4-70.7-29.4-107.8c0.5,3.5,1,7.1,1.4,10.6     c-5-37.8-5-76.1,0-113.9c-0.5,3.5-1,7.1-1.4,10.6c5-37.1,14.9-73.3,29.4-107.8c-1.3,3.2-2.7,6.4-4,9.6     c14.3-33.6,32.8-65.3,55.1-94.3c-2.1,2.7-4.2,5.4-6.3,8.1c22.2-28.7,48-54.5,76.7-76.7c-2.7,2.1-5.4,4.2-8.1,6.3     c28.9-22.3,60.6-40.8,94.3-55.1c-3.2,1.3-6.4,2.7-9.6,4c34.5-14.5,70.7-24.4,107.8-29.4c-3.5,0.5-7.1,1-10.6,1.4     c37.8-5,76.1-5,113.9,0c-3.5-0.5-7.1-1-10.6-1.4c37.1,5,73.3,14.9,107.8,29.4c-3.2-1.3-6.4-2.7-9.6-4     c33.6,14.3,65.3,32.8,94.3,55.1c-2.7-2.1-5.4-4.2-8.1-6.3c28.7,22.2,54.5,48,76.7,76.7c-2.1-2.7-4.2-5.4-6.3-8.1     c22.3,28.9,40.8,60.6,55.1,94.3c-1.3-3.2-2.7-6.4-4-9.6c14.5,34.5,24.4,70.7,29.4,107.8c-0.5-3.5-1-7.1-1.4-10.6     C894.7,474.4,896,493.4,896,512.4c0,20.9,18.4,41,40,40c21.6-1,40-17.6,40-40c-0.2-94.5-29.2-189.5-84.3-266.6     c-14.2-19.8-29.6-38.9-46.5-56.4c-17-17.6-35.6-33.2-55-48.1c-36.8-28.2-77.9-49.7-121.4-65.7c-90.1-33.1-192-35.9-284.2-9.6     c-88.4,25.3-169.9,77.7-228.4,148.7c-15.5,18.9-30,38.6-42.6,59.6c-12.7,21.2-23.1,43.4-32.5,66.3C63,384.7,53,431.5,49.3,478.8     c-7.4,94.9,16.2,192.5,65.6,273.8c47.6,78.2,118.8,143.1,202.4,180.9c22.6,10.2,45.8,19.2,69.8,25.9     c24.5,6.8,49.5,11.1,74.7,14.1c48.6,5.7,98.1,2.7,146.1-7.1c90.4-18.5,175.4-66.2,239-132.9c64-67,108.5-153.6,122.6-245.3     c3.9-25.1,6.4-50.3,6.4-75.8c0-20.9-18.4-41-40-40C914.3,473.4,896,490,896,512.4z"/></g></g><g><g><g><path d="M345.4,552.4c37.5,0,75,0,112.5,0c59.8,0,119.6,0,179.4,0c13.8,0,27.5,0,41.3,0c20.9,0,41-18.4,40-40      c-1-21.7-17.6-40-40-40c-37.5,0-75,0-112.5,0c-59.8,0-119.6,0-179.4,0c-13.8,0-27.5,0-41.3,0c-20.9,0-41,18.4-40,40      C306.3,534.1,322.9,552.4,345.4,552.4L345.4,552.4z"/></g></g><g><g><path d="M515.3,407c15.2,15,30.4,30.1,45.6,45.1c24.2,24,48.5,48,72.7,72c5.6,5.5,11.2,11.1,16.8,16.6      c14.9,14.7,41.9,16,56.6,0c14.6-15.9,15.9-40.8,0-56.6c-15.2-15-30.4-30.1-45.6-45.1c-24.2-24-48.5-48-72.7-72      c-5.6-5.5-11.2-11.1-16.8-16.6c-14.9-14.7-41.9-16-56.6,0C500.7,366.4,499.4,391.3,515.3,407L515.3,407z"/></g></g><g><g><path d="M571.9,674.4c15.2-15,30.4-30.1,45.6-45.1c24.2-24,48.5-48,72.7-72c5.6-5.5,11.2-11.1,16.8-16.6      c14.9-14.7,15.9-42,0-56.6c-16-14.7-40.7-15.7-56.6,0c-15.2,15-30.4,30.1-45.6,45.1c-24.2,24-48.5,48-72.7,72      c-5.6,5.5-11.2,11.1-16.8,16.6c-14.9,14.7-15.9,42,0,56.6C531.4,689.1,556,690.2,571.9,674.4L571.9,674.4z"/></g></g></g></g></svg>
                            </a>
                          </div>';
                }else{
                  echo '  <div class="content-options-trk-tabs order-1">
                              <a href="login">Iniciar Sesión</a>
                              <a href="account">Regístrate</a>
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
                            <p>Usando tu cuenta o tarjeta Ttrueque Al vender, tu ganancia se DUPLICA Ejemplo: Vendes un
                                producto a 50 dólares. (o su equivalente en moneda nacional) Automáticamente tu cuenta
                                en Ttrueque lo duplica: Obtienes 100 Bikkers. <a href="#">Mayores detalles</a></p>
                            <a href="account" class="btn-register">Regístrate sin costo</a>
                        </div>
                        <div class="content-right-o">
                            <h2>Compras de forma segura</h2>
                            <p>Tu saldo estará fijado en Bikkers Ejemplo: Vas a comprar un producto que cuesta 30 dólares
                                (o su equivalente en moneda nacional)Con tu cuenta Ttrueque, pagarás con 30 Bikkers. Porque
                                cada Bikker, es equivalente a un dólar. <a href="#">Mayores detalles</a></p>
                            <a href="account" class="btn-register">Regístrate sin costo</a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
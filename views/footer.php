<footer class="footer_primary_page-ttrk" id="contain-foot-index">
  <div class="max-footer-w_ttrq">
    <div class="row container-list-opts-footer_ttrq">
      <!--------//ENLACES RÁPIDOS--------->
      <div class="container-list-opts-footer_ttrq--item">
        <h3 data-target="#collapse_1"  class="lang_ttrq" key="t_list-footer-one">Enlaces rápidos</h3>
        <div class="collapse dont-collapse-sm links" id="collapse_1">
          <ul class="list-items-footer-opts">
            <li><a href="shop" class="lang_ttrq" key="opt-l-f_one-4">Mi cuenta</a></li>
            <li><a href="home" class="lang_ttrq" key="opt-l-f_one-2">Preguntas más frecuentes</a></li>
            <li><a href="contacto" class="lang_ttrq" key="opt-l-f_one-6">Contacto</a></li>
          </ul>
        </div>
      </div>
      <!--------//CATEGORÍAS----------->
      <div class="container-list-opts-footer_ttrq--item">
        <h3 data-target="#collapse_2" class="lang_ttrq" key="t_list-footer-two">Categorías</h3>
        <div class="collapse dont-collapse-sm links" id="collapse_2">
          <ul class="list-items-footer-opts">
            <?php
              $only_six = array_slice($cat_limit, 0, 6);
              foreach($only_six as $key => $val){
                $e =    $val["nombre_categoria"];
                $url =    str_replace(" ", "-", $e);
                echo "<li>
                  <a class='' href='tienda?tipos={$url}'>
                    <span>{$val["nombre_categoria"]}</span>          
                  </a>
                </li>";
              }
            ?>            
          </ul>
        </div>
      </div>
      <!--------//PAGOS----------->
      <div class="container-list-opts-footer_ttrq--item">
        <h3 data-target="#collapse_3" class="lang_ttrq" key="">Pagos</h3>
        <div class="collapse dont-collapse-sm payments" id="collapse_3">
          <ul class="list-items-footer-opts">
            <li>
              <div class="cont-img-payment">
                <img src="img/svg/credit-cards_paypal.svg" data-src="img/svg/credit-cards_paypal.svg" alt="credit_card_paypal" class="lazy">
              </div>
            </li>
          </ul>
        </div>
      </div>
      <!--------//CONTACTO----------->
      <div class="container-list-opts-footer_ttrq--item">
        <h3 data-target="#collapse_4" class="lang_ttrq" key="t_list-footer-three">Contactos</h3>
        <div class="collapse dont-collapse-sm contacts" id="collapse_4">
          <ul class="list-items-footer-opts">
            <li>
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="26px" height="26px" version="1.1" viewBox="0 0 700 700"><g xmlns="http://www.w3.org/2000/svg"><path d="m335.65 133.67c0-37.441-30.457-67.898-67.898-67.898-37.43 0-67.883 30.457-67.883 67.898 0 37.43 30.457 67.883 67.883 67.883 37.441 0 67.898-30.461 67.898-67.883zm-111.13 0c0-23.852 19.395-43.242 43.23-43.242 23.852 0 43.242 19.395 43.242 43.242 0 23.832-19.395 43.23-43.242 43.23-23.836 0-43.23-19.398-43.23-43.23z"/><path d="m604.4 192.52c-3.0898-2.3359-7.0898-3.0703-10.773-2.043l-161.24 45.387-60.664-17.113c16.57-32.133 28.43-62.859 28.43-85.098 0-72.953-59.387-132.3-132.39-132.3-73-0.003906-132.38 59.348-132.38 132.3 0 22.238 11.871 52.977 28.461 85.137l-64.129 18.031c-5.3203 1.4961-8.9922 6.3438-8.9922 11.871v297.59c0 3.8633 1.8047 7.5 4.8906 9.8242 2.1641 1.6484 4.7734 2.5039 7.4336 2.5039 1.1211 0 2.2383-0.15625 3.332-0.46094l161.36-45.422 161.36 45.422c0.99609 0.27344 2.0156 0.39062 3.0312 0.41406 0.085938 0 0.14453 0.078126 0.23047 0.078126 1.1211 0 2.2383-0.15625 3.332-0.46094l164.6-46.336c5.3086-1.5078 8.9805-6.3438 8.9805-11.871v-297.64c0.011718-3.8594-1.793-7.4922-4.875-9.8164zm-336.63-166.52c59.398 0 107.73 48.289 107.73 107.65 0 32.688-37.234 104.27-99.617 191.49-3.8008 5.2969-12.426 5.3086-16.23-0.011719-62.383-87.242-99.617-158.83-99.617-191.48-0.003906-59.367 48.328-107.65 107.73-107.65zm-152.39 232.03 60.531-17.023c20.613 36.359 45.137 72.492 63.695 98.453 3.9805 5.5703 9.582 9.543 15.82 11.949v139.17l-140.04 39.426zm164.7 93.398c6.2617-2.4023 11.871-6.3789 15.863-11.961 18.574-25.973 43.109-62.121 63.727-98.5l60.375 17.023v271.99l-139.97-39.406 0.003906-139.14zm304.56 139.21-139.87 39.379v-272.02l139.87-39.379z"/></g></svg>
              </span>
              <span>Av. Arenales Nro. 1031 Int. B - <br>Santa Beatriz, Lima.</span>
            </li>
            <li>
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="26px" height="26px" version="1.1" viewBox="0 0 700 700"><g xmlns="http://www.w3.org/2000/svg"><path d="m578.18 259.19c0 5.8945-4.7734 10.668-10.668 10.668s-10.668-4.7734-10.668-10.668c0-101.92-82.879-184.8-184.8-184.8-5.8945 0-10.668-4.7734-10.668-10.668 0-5.8945 4.7734-10.668 10.668-10.668 113.65-0.0625 206.14 92.426 206.14 206.14zm-206.2-136.11c75.039 0 136.11 61.07 136.11 136.11 0 5.8945 4.7734 10.668 10.668 10.668s10.668-4.7734 10.668-10.668c0-86.828-70.68-157.51-157.51-157.51-5.8945 0-10.668 4.7734-10.668 10.668 0 5.8984 4.8359 10.73 10.73 10.73zm0 48.75c48.16 0 87.359 39.199 87.359 87.359 0 5.8945 4.7734 10.668 10.668 10.668s10.668-4.7734 10.668-10.668c0-59.949-48.809-108.76-108.76-108.76-5.8945 0-10.668 4.7734-10.668 10.668 0 5.8945 4.8359 10.73 10.73 10.73zm0 48.691c21.34 0 38.668 17.332 38.668 38.668 0 5.8945 4.7734 10.668 10.668 10.668s10.668-4.7734 10.668-10.668c0-33.129-26.938-60.066-60.066-60.066-5.8945 0-10.668 4.7734-10.668 10.668s4.8359 10.73 10.73 10.73zm199.06 178.25c1.6523 11.672-2.2383 24.344-10.551 33.953l-47.219 54.586c-8.3086 9.5508-23.164 19.633-48.629 19.633-6.7188 0-14.148-0.70703-22.398-2.3008-105.52-20.277-278.64-170.36-313.95-272.16-13.203-38.078-3.5352-60.422 6.8984-72.504l47.219-54.586c8.1328-9.4297 20.453-15.328 32.125-15.328 9.1953 0 17.391 3.5977 22.988 10.078l65.551 75.746c13.676 15.855 13.852 37.727 0.41406 53.289l-23.637 27.293c-1.2969 1.5312-3.0664 4.1836-2.6523 9.668 1.1797 15.68 18.746 40.555 43.68 61.836 31.477 26.879 64.902 39.672 74.57 28.531l23.637-27.293c13.5-15.621 35.25-18.57 52.816-7.25l85.887 55.352c7.2422 4.7773 11.898 12.32 13.254 21.457zm-21.219 3.0664c-0.41406-2.9492-1.6523-5.1289-3.6562-6.4258l-85.887-55.352c-7.1328-4.5977-17.625-5.3633-25.051 3.2422l-23.637 27.293c-23.168 26.82-70.855 2.5938-104.63-26.289-11.375-9.7266-48.633-43.914-51.105-76.516-0.70703-9.7852 1.9453-18.57 7.7812-25.289l23.637-27.293c7.4258-8.6055 5.1289-18.863-0.41406-25.289l-65.551-75.688c-1.5312-1.7695-3.832-2.6523-6.7773-2.6523-5.543 0-11.789 3.125-15.977 7.8984l-47.219 54.586c-9.7852 11.316-10.789 28.648-2.8281 51.461 32.773 94.551 199.77 239.33 297.8 258.13 23.816 4.5977 40.91 1.0625 50.812-10.375l47.219-54.586c4.1289-4.7695 6.3086-11.434 5.4844-16.855z"/></g></svg>
              </span>
              <a href="tel://51 951 488 317" title="Necesitas Ayuda?">+51 951 488 317</a>
            </li>
            <li>
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="26px" height="26px" version="1.1" viewBox="0 0 700 700"><g xmlns="http://www.w3.org/2000/svg"><path d="m551.6 84h-403.2c-12.965 0.015625-25.398 5.168-34.57 14.332-9.1758 9.1641-14.344 21.59-14.371 34.555v294.5c0.015625 12.973 5.1758 25.406 14.355 34.574 9.1758 9.168 21.617 14.316 34.586 14.316h403.2c12.961-0.015625 25.387-5.1719 34.551-14.336 9.1641-9.1641 14.32-21.594 14.336-34.555v-294.73c-0.074219-12.922-5.2539-25.293-14.414-34.406-9.1602-9.1172-21.551-14.242-34.473-14.258zm-17.863 33.602-180.32 136.53c-2.0117 1.5508-4.8164 1.5508-6.8281 0l-180.32-136.53zm17.863 325.08h-403.2c-4.0586 0-7.9531-1.6094-10.828-4.4727-2.875-2.8672-4.5-6.7539-4.5156-10.816v-292.99l193.2 146.5h0.003906c6.8203 5.1836 15.148 7.9883 23.715 7.9883s16.895-2.8047 23.715-7.9883l193.2-146.5v292.99c0 4.0547-1.6094 7.9453-4.4766 10.812-2.8672 2.8672-6.7539 4.4766-10.809 4.4766z"/></g></svg>
              </span>
              <span>melgarejo777666@gmail.com</span>
            </li>
          </ul>
        </div>
      </div>
      <!--------//NUESTRAS APLICACIONES----------->
      <div class="container-list-opts-footer_ttrq--item">
        <h3 data-target="#collapse_5" class="lang_ttrq" key="">Nuestras aplicaciones</h3>
        <div class="collapse dont-collapse-sm our-apps" id="collapse_5">
          <ul class="list-items-footer-opts">
            <li>
              <a href="https://play.google.com/store/apps/details?id=app.ttruequeqr.com" target="_blank">
                <div class="cont-img-our-apps">
                  <img src="img/Utilities/ttrueque_negocios_sin_limites.png" alt="">
                </div>
                <span>Ttrueque - Negocio sin límites</span>
              </a>
            </li>
            <li>
              <a href="https://play.google.com/store/apps/details?id=app.ttruequetienda.com" target="_blank">
                <div class="cont-img-our-apps">
                  <img src="img/Utilities/ttrueque_lector_qr.png" alt="">
                </div>
                <span>Ttrueque - Lector QR</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <!--------//MANTENERSE EN CONTACTO----------->
      <div class="container-list-opts-footer_ttrq--item">
        <h3 data-target="#collapse_7" class="lang_ttrq" key="">Síguenos</h3>
        <div class="collapse dont-collapse-sm" id="collapse_7">
          <div class="follow_us">
            <ul class="list-items-footer-opts container-list-opts-footer_ttrq--item--cont--m">
              <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/facebook_icon.svg" alt="" class="lazy"></a></li>
              <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/instagram_icon.svg" alt="" class="lazy"></a></li>
              <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/twitter_icon.svg" alt="" class="lazy"></a></li>
              <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/youtube_icon.svg" alt="" class="lazy"></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="c-infTbs__c__item__foot">
    <div class="c-infTbs__c__item__foot__c box-f">
      <div class="c-infTbs__c__item__foot__c__cB">
        <div class="c-infTbs__c__item__foot__c__cB__cL">
          <div class="c-infTbs__c__item__foot__c__cB__cL__cT">
            <!--<a href="javascript:void(0);" class="lang_ttrq" key="opt_f-policy-1">Trabaja con nosotros</a>-->
            <!--<a href="javascript:void(0);" class="lang_ttrq" key="opt_f-policy-2">Términos y condiciones</a>-->
            <!--<a href="javascript:void(0);" class="lang_ttrq" key="opt_f-policy-3">Políticas de privacidad</a>-->
            <a href="home" class="lang_ttrq" key="opt_f-policy-4">Ayuda</a>
          </div>
          <div class="c-infTbs__c__item__foot__c__cB__cL__cB">
            <p>Copyright &copy; 2020 Ttrueque Perú S.R.L.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
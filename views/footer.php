<footer class="footer_primary_page-ttrk" id="contain-foot-index">
  <div class="max-footer-w_ttrq">
    <div class="row container-list-opts-footer_ttrq">
      <!--------//ENLACES RÁPIDOS--------->
      <div class="col-lg-3 col-md-4 container-list-opts-footer_ttrq--item">
        <h3 data-target="#collapse_1"  class="lang_ttrq" key="t_list-footer-one">Enlaces rápidos</h3>
        <div class="collapse dont-collapse-sm links" id="collapse_1">
          <ul class="list-items-footer-opts">
            <!--<li><a href="about.php" class="lang_ttrq" key="opt-l-f_one-1">Acerca de</a></li>-->
            <li><a href="shop" class="lang_ttrq" key="opt-l-f_one-4">Mi cuenta</a></li>
            <li><a href="home" class="lang_ttrq" key="opt-l-f_one-2">Preguntas más frecuentes</a></li>
            <!--<li><a href="help-2.php" class="lang_ttrq" key="opt-l-f_one-3">Ayuda</a></li>-->
            <!--<li><a href="blog.php" class="lang_ttrq" key="opt-l-f_one-5">Blog</a></li>-->
            <li><a href="contacto" class="lang_ttrq" key="opt-l-f_one-6">Contacto</a></li>
          </ul>
        </div>
      </div>
      <!--------//CATEGORÍAS----------->
      <div class="col-lg-3 col-md-4 container-list-opts-footer_ttrq--item">
        <h3 data-target="#collapse_2" class="lang_ttrq" key="t_list-footer-two">Categorías</h3>
        <div class="collapse dont-collapse-sm links" id="collapse_2">
          <ul class="list-items-footer-opts">
            <?php
              $only_six = array_slice($cat_limit, 0, 6);

              foreach ($only_six as $key => $val) {
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
      <div class="col-lg-3 col-md-4 container-list-opts-footer_ttrq--item">
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
      <div class="col-lg-3 col-md-4 container-list-opts-footer_ttrq--item">
        <h3 data-target="#collapse_4" class="lang_ttrq" key="t_list-footer-three">Contactos</h3>
        <div class="collapse dont-collapse-sm contacts" id="collapse_4">
          <ul class="list-items-footer-opts">
            <li><i class="ti-home"></i>Av. Arenales Nro. 1031 Int. B - <br>Santa Beatriz, Lima.</li>
            <li><i class="ti-headphone-alt"></i><a href="tel://51 951 488 317" title="Necesitas Ayuda?">+51 951 488 317</a></li>
            <li><i class="ti-email"></i>melgarejo777666@gmail.com</li>
          </ul>
        </div>
      </div>
      <!--------//NUESTRAS APLICACIONES----------->
      <div class="col-lg-3 col-md-4 container-list-opts-footer_ttrq--item">
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
      <div class="col-lg-3 col-md-4 container-list-opts-footer_ttrq--item">
        <h3 data-target="#collapse_7" class="lang_ttrq" key="">Síguenos</h3>
        <div class="collapse dont-collapse-sm" id="collapse_7">
          <!--<div id="newsletter">
            <div class="form-group">
              <input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Tu correo electrónico">
              <button type="submit" id="submit-newsletter"><i class="ti-angle-double-right"></i></button>
            </div>
          </div>-->
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
    <!-- /row-->
    <!--<div class="row add_bottom_25">
      <div class="col-lg-12 d-flex justify-content-center">
        <ul class="footer-selector clearfix">
          <div>
            <li>
              <div class="styled-select lang-selector">
                <select>
                  <option value="English" selected>Español</option>
                  <option value="French">Frances</option>
                  <option value="Spanish">Ingles</option>
                  <option value="Russian">Ruso</option>
                </select>
              </div>
            </li>
            <li>
              <div class="styled-select currency-selector">
                <select>
                  <option value="US Dollars" selected>Dólares Estadounidenses</option>
                  <option value="Euro">Euro</option>
                </select>
              </div>
            </li>
          </div>
          <li style="margin: 0;padding: 0;">
            <img src="img/svg/credit-cards_paypal.svg" data-src="img/svg/credit-cards_paypal.svg" alt="credit_card_paypal" width="250" height="70" class="lazy">
          </li>
        </ul>
      </div>
    </div>-->
  </div>
  <div class="cont-foot-two-p-ttrq footer-pg-index">
    <div class="content-footer-policy-ttrk">
      <div class="content-footer-bottom">
        <div class="content-left-footer">
          <div class="content-top-footer-left">
            <!--<a href="#" class="lang_ttrq" key="opt_f-policy-1">Trabaja con nosotros</a>-->
            <!--<a href="#" class="lang_ttrq" key="opt_f-policy-2">Términos y condiciones</a>-->
            <!--<a href="#" class="lang_ttrq" key="opt_f-policy-3">Políticas de privacidad</a>-->
            <a href="home" class="lang_ttrq" key="opt_f-policy-4">Ayuda</a>
          </div>
          <div class="content-bottom-footer-right">
            <p>Copyright &copy; 2020 Ttrueque Perú S.R.L.</p>
          </div>
        </div>
        <!--<div class="content-right-footer">
          <div class="cont-title-right-footer">
            <p>Descarga nuestras aplicaciones</p>
          </div>
          <div class="cont-btns-download-apks">
            <a class="btn-download-apk" href="https://play.google.com/store/apps/details?id=app.ttruequeqr.com" target="_blank" >
              <span class="content-icon-btn-download-apk">
                <i class="far fa-qrcode"></i>
              </span>
              <span>Ttrueque - Lector QR!</span>
            </a>
            <a class="btn-download-apk" href="https://play.google.com/store/apps/details?id=app.ttruequetienda.com" target="_blank" >
              <span class="content-icon-btn-download-apk">
                <i class="fal fa-bags-shopping"></i>
              </span>
              <span>Ttrueque - Negocios sin límites</span>
            </a>
          </div>
        </div>-->
      </div>
    </div>
  </div>
</footer>
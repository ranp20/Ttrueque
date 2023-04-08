<footer class="footer_primary_page-ttrk" id="contain-foot-index">
  <div class="max-footer-w_ttrq">
    <div class="row container-list-opts-footer_ttrq">
      <!--------//ENLACES RÁPIDOS--------->
      <div class="container-list-opts-footer_ttrq--item">
        <h3 data-target="#collapse_1"  class="lang_ttrq" key="t_list-footer-one">Enlaces rápidos</h3>
        <div class="collapse dont-collapse-sm links" id="collapse_1">
          <ul class="list-items-footer-opts">
            <li><a href="shop" class="lang_ttrq" key="opt-l-f_one-4">Mi cuenta</a></li>
            <li><a href="home#preguntas-frecuentes-ttrueque" class="lang_ttrq" key="opt-l-f_one-2">Preguntas más frecuentes</a></li>
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
                $categ_name_foot =    str_replace(" ", "-", $e);
                echo "<li>
                  <a class='' href='tienda?tipos={$categ_name_foot}'>
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
              <li>
                <a href="javascript:void(0);">
                  <span>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40px" height="40px" id="Layer_1" data-name="Layer 1" viewBox="0 0 124.8 123.36"><defs><style>.cls-1,.cls-2{fill:none;}.cls-1{clip-rule:evenodd;}.cls-3{clip-path:url(#clip-path);}.cls-4{clip-path:url(#clip-path-2);}.cls-5{fill:#fff;}</style><clipPath id="clip-path" transform="translate(0.69 0.51)"><path class="cls-1" d="M27.75,0H95.13a27.83,27.83,0,0,1,27.75,27.75V94.57a27.83,27.83,0,0,1-27.75,27.74H27.75A27.83,27.83,0,0,1,0,94.57V27.75A27.83,27.83,0,0,1,27.75,0Z"/></clipPath><clipPath id="clip-path-2" transform="translate(0.69 0.51)"><rect class="cls-2" width="122.88" height="122.31"/></clipPath></defs><g class="cls-3"><g class="cls-4"><image width="260" height="257" transform="matrix(0.48, 0, 0, -0.48, 0, 123.36)" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQQAAAEBCAYAAACexdu5AAAACXBIWXMAABcRAAAXEQHKJvM/AAAEFUlEQVR4Xu3dwXEdIRBFUb4kZ+HwHJbDcxrSeAG+hctVJgDO2cyG9aumoYfX8zzP68evAdzr+fl9jDHG22EdcJGPMcZ4vV6ndcAFPubn+f8q4Aq2DEBmhWDLAAxbBmCzAkGFAKgQgM3qIRxWAVdwygBkVQhyAdBUBDZKAyCaikBmIDxfh2XADda0o50DUFNRhQBoKgIbgQBEIABx7AhEhQBEIACZW4a398My4AYqBCACAYhZBiCrh6BQAFQIwGZOO55WAVewVwDin4pAVlNRIACaisDG689ANBWBeLkJyOoheP0Z8Bw8sNFUBKJCAKKbCEQgAHHsCGQ99npaBtxAaQDEsSMQ045ANBWBqBCAKA2AeA4eiAoBiEAAIhCA6CEAUSEAWcNNcgEwywBs3FQEYpYBiAoByHr9WYUAqBCAzXqXwSkD4KEWYOPqMhDHjkBsGYCYZQCyjh1VCEAXk3QVAT0EYCMQgDh2BLIqBLMMQBXC+2EZcAPTjkD0EICsm4qnZcANlAZAjD8D0VQEoqkIxNVlIEoDIJqKQOY9hNMq4AoqBCB6CEDWL9RMOwIqBGDjbUcgq6noYhJglgHYaCoCWRXC52EZcIP1xyRNRaAK4bAKuIKry0D8IAWIl5uAqBCA+IUakFUh6CoCph2BzbqHYMsAuIcAbGwZgPhBChAVApA17XhaBtxAhQBEIAARCEAEAhCzDEBMOwKxZQAiEIAYbgJilgGILQOQOctwWgVcQQ8BiC0DkPUcvFwA+smql5sALzcBG8NNQGwZgKx/KtoyAO4hABulARBNRSCaikDcQwCiqQjElgHIqhDeD8uAG6xfqKkQADcVgY2mIhBNRSCaikBWhfB5WAbcwCwDEMcLQNax42kZcAMVAhCBAMTFJCDr5Sb3EAA3FYHNPGVQIQBDUxHYuLoMRFMRiKYiEBUCEBeTgDhlADLvIZxWAVfwgxQgtgxANBWBzED4clMR7vZtjOEeArBxUxGIHgIQ/0MAYvwZGLUTD6uAi8xY0EQAhqYisHEPAYimIjDGmEWB8Wcgxp+BOHYEoqkIRFMRGH82C7YMQAw3AfkYY4zH/xDgcnOzoEIAYpYBiKYiEIEAxJYBiAoBiGlHILYMQPxTEYiXm4Dx103F8aa3CDhlADa2DMCwZQD+oUIAxt/jz/9dCNzCb9iBaB4AEQhAzDIAUSEAEQhAnDIAUSEAcTEJiFMGIAIByBpuOqwCrqBCACIQgNgyAFEhAHExCYhAADJvKtoyAEOFAGwEAhCBAEQgAHEPAYgKAYhAACIQgAgEIAIBiEAAIhCACAQgAgGIQAAiEIAIBCACAYhAACIQgAgEIAIBiEAAIhCACAQgAgGIQAAiEIAIBCACAYhAACIQgAgEIAIBiEAAIhCA/AafC2PbZ0osjAAAAABJRU5ErkJggg=="/></g></g><path class="cls-5" d="M85.36,78.92l2.72-17.76H71V49.63c0-4.86,2.38-9.59,10-9.59H88.8V24.92a94.45,94.45,0,0,0-13.75-1.2c-14,0-23.21,8.5-23.21,23.9V61.16H36.24V78.92h15.6v43.57H71V78.92Z" transform="translate(0.69 0.51)"/></svg>
                  </span>
                </a>
              </li>
              <li>
                <a href="javascript:void(0);">
                  <span>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40px" height="40px" viewBox="0 0 132.004 132"><defs><linearGradient id="b"><stop offset="0" stop-color="#3771c8"/><stop stop-color="#3771c8" offset=".128"/><stop offset="1" stop-color="#60f" stop-opacity="0"/></linearGradient><linearGradient id="a"><stop offset="0" stop-color="#fd5"/><stop offset=".1" stop-color="#fd5"/><stop offset=".5" stop-color="#ff543e"/><stop offset="1" stop-color="#c837ab"/></linearGradient><radialGradient id="c" cx="158.429" cy="578.088" r="65" xlink:href="#a" gradientUnits="userSpaceOnUse" gradientTransform="matrix(0 -1.98198 1.8439 0 -1031.402 454.004)" fx="158.429" fy="578.088"/><radialGradient id="d" cx="147.694" cy="473.455" r="65" xlink:href="#b" gradientUnits="userSpaceOnUse" gradientTransform="matrix(.17394 .86872 -3.5818 .71718 1648.348 -458.493)" fx="147.694" fy="473.455"/></defs><path fill="url(#c)" d="M65.03 0C37.888 0 29.95.028 28.407.156c-5.57.463-9.036 1.34-12.812 3.22-2.91 1.445-5.205 3.12-7.47 5.468C4 13.126 1.5 18.394.595 24.656c-.44 3.04-.568 3.66-.594 19.188-.01 5.176 0 11.988 0 21.125 0 27.12.03 35.05.16 36.59.45 5.42 1.3 8.83 3.1 12.56 3.44 7.14 10.01 12.5 17.75 14.5 2.68.69 5.64 1.07 9.44 1.25 1.61.07 18.02.12 34.44.12 16.42 0 32.84-.02 34.41-.1 4.4-.207 6.955-.55 9.78-1.28 7.79-2.01 14.24-7.29 17.75-14.53 1.765-3.64 2.66-7.18 3.065-12.317.088-1.12.125-18.977.125-36.81 0-17.836-.04-35.66-.128-36.78-.41-5.22-1.305-8.73-3.127-12.44-1.495-3.037-3.155-5.305-5.565-7.624C116.9 4 111.64 1.5 105.372.596 102.335.157 101.73.027 86.19 0H65.03z" transform="translate(1.004 1)"/><path fill="url(#d)" d="M65.03 0C37.888 0 29.95.028 28.407.156c-5.57.463-9.036 1.34-12.812 3.22-2.91 1.445-5.205 3.12-7.47 5.468C4 13.126 1.5 18.394.595 24.656c-.44 3.04-.568 3.66-.594 19.188-.01 5.176 0 11.988 0 21.125 0 27.12.03 35.05.16 36.59.45 5.42 1.3 8.83 3.1 12.56 3.44 7.14 10.01 12.5 17.75 14.5 2.68.69 5.64 1.07 9.44 1.25 1.61.07 18.02.12 34.44.12 16.42 0 32.84-.02 34.41-.1 4.4-.207 6.955-.55 9.78-1.28 7.79-2.01 14.24-7.29 17.75-14.53 1.765-3.64 2.66-7.18 3.065-12.317.088-1.12.125-18.977.125-36.81 0-17.836-.04-35.66-.128-36.78-.41-5.22-1.305-8.73-3.127-12.44-1.495-3.037-3.155-5.305-5.565-7.624C116.9 4 111.64 1.5 105.372.596 102.335.157 101.73.027 86.19 0H65.03z" transform="translate(1.004 1)"/><path fill="#fff" d="M66.004 18c-13.036 0-14.672.057-19.792.29-5.11.234-8.598 1.043-11.65 2.23-3.157 1.226-5.835 2.866-8.503 5.535-2.67 2.668-4.31 5.346-5.54 8.502-1.19 3.053-2 6.542-2.23 11.65C18.06 51.327 18 52.964 18 66s.058 14.667.29 19.787c.235 5.11 1.044 8.598 2.23 11.65 1.227 3.157 2.867 5.835 5.536 8.503 2.667 2.67 5.345 4.314 8.5 5.54 3.054 1.187 6.543 1.996 11.652 2.23 5.12.233 6.755.29 19.79.29 13.037 0 14.668-.057 19.788-.29 5.11-.234 8.602-1.043 11.656-2.23 3.156-1.226 5.83-2.87 8.497-5.54 2.67-2.668 4.31-5.346 5.54-8.502 1.18-3.053 1.99-6.542 2.23-11.65.23-5.12.29-6.752.29-19.788 0-13.036-.06-14.672-.29-19.792-.24-5.11-1.05-8.598-2.23-11.65-1.23-3.157-2.87-5.835-5.54-8.503-2.67-2.67-5.34-4.31-8.5-5.535-3.06-1.187-6.55-1.996-11.66-2.23-5.12-.233-6.75-.29-19.79-.29zm-4.306 8.65c1.278-.002 2.704 0 4.306 0 12.816 0 14.335.046 19.396.276 4.68.214 7.22.996 8.912 1.653 2.24.87 3.837 1.91 5.516 3.59 1.68 1.68 2.72 3.28 3.592 5.52.657 1.69 1.44 4.23 1.653 8.91.23 5.06.28 6.58.28 19.39s-.05 14.33-.28 19.39c-.214 4.68-.996 7.22-1.653 8.91-.87 2.24-1.912 3.835-3.592 5.514-1.68 1.68-3.275 2.72-5.516 3.59-1.69.66-4.232 1.44-8.912 1.654-5.06.23-6.58.28-19.396.28-12.817 0-14.336-.05-19.396-.28-4.68-.216-7.22-.998-8.913-1.655-2.24-.87-3.84-1.91-5.52-3.59-1.68-1.68-2.72-3.276-3.592-5.517-.657-1.69-1.44-4.23-1.653-8.91-.23-5.06-.276-6.58-.276-19.398s.046-14.33.276-19.39c.214-4.68.996-7.22 1.653-8.912.87-2.24 1.912-3.84 3.592-5.52 1.68-1.68 3.28-2.72 5.52-3.592 1.692-.66 4.233-1.44 8.913-1.655 4.428-.2 6.144-.26 15.09-.27zm29.928 7.97c-3.18 0-5.76 2.577-5.76 5.758 0 3.18 2.58 5.76 5.76 5.76 3.18 0 5.76-2.58 5.76-5.76 0-3.18-2.58-5.76-5.76-5.76zm-25.622 6.73c-13.613 0-24.65 11.037-24.65 24.65 0 13.613 11.037 24.645 24.65 24.645C79.617 90.645 90.65 79.613 90.65 66S79.616 41.35 66.003 41.35zm0 8.65c8.836 0 16 7.163 16 16 0 8.836-7.164 16-16 16-8.837 0-16-7.164-16-16 0-8.837 7.163-16 16-16z"/></svg>
                  </span>
                </a>
              </li>
              <li>
                <a href="javascript:void(0);">
                  <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" id="Layer_2" data-name="Layer 1" viewBox="0 0 122.88 122.31"><defs><style>.cls-1{fill:#1ca1f1;}.cls-1,.cls-2{fill-rule:evenodd;}.cls-2{fill:#fff;}</style></defs><path class="cls-1" d="M27.75,0H95.13a27.83,27.83,0,0,1,27.75,27.75V94.57a27.83,27.83,0,0,1-27.75,27.74H27.75A27.83,27.83,0,0,1,0,94.57V27.75A27.83,27.83,0,0,1,27.75,0Z"/><path class="cls-2" d="M102.55,35.66a33.3,33.3,0,0,1-9.68,2.65A17,17,0,0,0,100.29,29a34.05,34.05,0,0,1-10.71,4.1A16.87,16.87,0,0,0,60.41,44.62a17.45,17.45,0,0,0,.43,3.84A47.86,47.86,0,0,1,26.09,30.83a16.83,16.83,0,0,0-2.29,8.48h0a16.84,16.84,0,0,0,7.5,14,17,17,0,0,1-7.64-2.11v.22A16.86,16.86,0,0,0,37.19,68a17.19,17.19,0,0,1-4.45.6,17.58,17.58,0,0,1-3.18-.31A16.9,16.9,0,0,0,45.31,80a34,34,0,0,1-25,7,47.69,47.69,0,0,0,25.86,7.58c31,0,48-25.7,48-48,0-.74,0-1.46-.05-2.19a33.82,33.82,0,0,0,8.41-8.71Z"/></svg>
                  </span>
                </a>
              </li>
              <li>
                <a href="javascript:void(0);">
                  <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" id="Layer_3" data-name="Layer 1" viewBox="0 0 122.88 122.88"><defs><style>.cls-youtube{fill:red;}.cls-youtube,.cls-2{fill-rule:evenodd;}.cls-2{fill:#fff;}</style></defs><path class="cls-youtube" d="M25.2,0H97.68a25.27,25.27,0,0,1,25.2,25.2V97.68a25.27,25.27,0,0,1-25.2,25.2H25.2A25.27,25.27,0,0,1,0,97.68V25.2A25.27,25.27,0,0,1,25.2,0Z"/><path class="cls-2" d="M96.74,46.63s-.7-5-2.87-7.15a10.28,10.28,0,0,0-7.22-3c-10.08-.74-25.21-.74-25.21-.74h0s-15.13,0-25.21.74a10.31,10.31,0,0,0-7.22,3c-2.17,2.18-2.86,7.15-2.86,7.15A109.09,109.09,0,0,0,25.4,58.3v5.46a109.65,109.65,0,0,0,.72,11.68s.71,5,2.86,7.15c2.74,2.87,6.34,2.77,8,3.08,5.77.55,24.51.72,24.51.72s15.15,0,25.23-.75a10.32,10.32,0,0,0,7.22-3c2.17-2.19,2.87-7.16,2.87-7.16a110.6,110.6,0,0,0,.71-11.67V58.3a110.89,110.89,0,0,0-.73-11.67Z"/><polygon class="cls-youtube" points="53.97 70.39 53.97 50.14 73.44 60.3 53.97 70.39 53.97 70.39"/></svg>
                  </span>
                </a>
              </li>
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
<div class="dark-backdrop hide" id="backdrop"></div>
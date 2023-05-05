window.addEventListener('load', function(){document.querySelector('.loader-cli').className += ' hidden';});

$(document).ready(function(){
  
  var idcliente = $('#userid_cli').val();
  console.log(idcliente);

  $.ajax({
    url: "../../../php/process_list_idstore.php",
    dataType: "JSON",
    method: 'POST',
    data: {cliente : idcliente},
  }).done((e) => {
    
    if(e.length == 0){
      $('.contModalGuidettrk-step-two').append(
        `
          <div class="contmodal-guide">
            <div class="contmodal-guide__content">
              <input type="checkbox" id="close-modal-guide">
              <label for="close-modal-guide" id="close-icon-modal-guide">X</label>
              <div class="contmodal-guide__content--tabtitles">
                <h2>Estas a la mitad de completar tu registro</h2>
                <div class="contmodal-guide__content--tabtitles__cont">
                  <div class="contmodal-guide__content--tabtitles__cont--item" id="step-one">
                    <span>PASO 1</span>
                  </div>
                  <div class="contmodal-guide__content--tabtitles__cont--item" id="step-two">
                    <span>PASO 2</span>
                  </div>
                  <div class="contmodal-guide__content--tabtitles__cont--item" id="step-three">
                    <span>PASO 3</span>
                  </div>
                </div>
              </div>
              <div class="contmodal-guide__content--tablinks">
                <a class="contmodal-guide__content--tablinks__link"><span>1</span></a>
                <a class="contmodal-guide__content--tablinks__link"><span>2</span></a>
                <a class="contmodal-guide__content--tablinks__link"><span>3</span></a>
              </div>
              <div class="contmodal-guide__content--tabcontent">
                <div class="contmodal-guide__content--tabcontent__cont" id="step-one">
                  <p>A continuación econtrarás los tipos de menbresía, puedes elegir la <strong>GRATUITA</strong> o la <strong>PAGADA.</strong></p>
                  <p>Todas la menbresías te brindarán una tienda gratuita y una cantidad de Bikkers para que empieces a comprar en los establecimientos o tiendas físicas o virtuales de los usuarios de Ttrueque.</p>
                  <a class="contmodal-guide__content--tabcontent__cont--continue next-step-button">CONTINUAR</a>
                </div>
                <div class="contmodal-guide__content--tabcontent__cont" id="step-two">
                  <p>Para que puedas ofrecer tus productos o servicios al amplio mercado de usuarios de Ttrueque, con absoluta seguridad y confianza, debes registrarte como <strong>Persona natural, Persona natural con negocio</strong> o <strong>Empresa.</strong></p>
                  <a id="close-step-two" class="contmodal-guide__content--tabcontent__cont--continue next-step-button">CONTINUAR</a>
                </div>
                <div class="contmodal-guide__content--tabcontent__cont" id="step-three">
                  <p>A continuación podrás añadir tus productos o servicios a la tienda que <strong>Ttrueque</strong> te brinda gratuitamente (o puedes hacerlo después).</p>
                  <p>De modo que los usuarios de <strong>Ttrueque</strong> podrán acceder a lo que ofreces y podrán COMPRAR en tu tienda física o virtual.</p>
                  <a class="contmodal-guide__content--tabcontent__cont--continue">CONTINUAR</a>
                </div>
              </div>
            </div>
          </div>
        `
      );
    }else{
      
    }

    /************************** SYSTEM TABS INTO GUIDE FOR PWA **************************/
    let parentGuideLinks = $('.contmodal-guide__content--tablinks');
    let linksGuide = parentGuideLinks.find('a');
    let itemsGuide = $('.contmodal-guide__content--tabcontent__cont');
    let itemsTitles = $('.contmodal-guide__content--tabtitles__cont--item');
    let closeGuideModal = $('#close-icon-modal-guide');
    let closeAfterComplete = $('#btn-aftercomplete');
    let nextStepButton = $('.next-step-button');
    let closeStepTwo = $('#close-step-two');

    linksGuide.eq(0).addClass('active');
    linksGuide.eq(1).add(itemsGuide.eq(1)).add(itemsTitles.eq(1)).addClass('active');
    closeGuideModal.on('click', e => {$('.contmodal-guide').css({"display": "none"});});
    closeAfterComplete.on('click', e => {$('.contmodal-guide').css({"display": "none"});});
    closeStepTwo.on('click', e => {$('.contmodal-guide').css({"display": "none"});});
  });
});
/************************** ITEM SELECCIONADO DEL MENÚ EN CADA PÁGINA **************************/
var url = window.location.pathname;
var filename = url.substring(url.lastIndexOf('/')+1);
if(filename.length == 0 || filename.length == ""){
  $("#options-user-d-cli a").eq(0).addClass("active");
}else if(filename == "sel-published.php" || filename == "add-service_v.php" || filename == "add-product_v.php"){
  $("#options-user-d-cli a").eq(0).removeClass("active");
  $("#options-user-d-cli a").eq(4).removeClass("active");
  $("#options-user-d-cli a").eq(5).addClass("active");
}else if(filename == "check-payment-wallet.php"){
  $("#options-user-d-cli a").eq(0).removeClass("active");
  $("#options-user-d-cli a").eq(5).removeClass("active");
  $("#options-user-d-cli a").eq(4).addClass("active");
}else{
  $("#options-user-d-cli a").removeClass("active");
  $('#options-user-d-cli a[href="' + filename + '"]').addClass("active");
}
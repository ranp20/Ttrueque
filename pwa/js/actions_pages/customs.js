$(function(){
  changesFilterandTnfoProds();
});


// AGREGAR PRELOADER...
window.addEventListener('load', function(){
    const loadcli = document.querySelector('.loader-cli');
    
    loadcli.className += ' hidden';
})

$(document).ready(function(){
  //MOSTRAR Y OCULTAR CARRITO...
  var carContent = $("#view_cart_ttrq"),
    cartOC = $(".containt_total_ttrq-cart"),
    closeCart = $("#cerrar_carrito");

  carContent.removeClass("dropdown-cart");
  carContent.click(function () {
    cartOC.toggleClass("active");
  });

  closeCart.click(function () {
    cartOC.removeClass("active");
  });
});

$(document).ready(function(){
  
  var idcliente = $('#userid_cli').val();
  console.log(idcliente);

  $.ajax({
    url: "./php/process_list_idstore.php",
    dataType: "JSON",
    method: 'POST',
    data: {cliente : idcliente},
  }).done(function(res){
    
    if(res.length == 0){
      $('.contModalGuidettrk').append(
        `
          <div class="contmodal-guide">
            <div class="contmodal-guide__content">
                <input type="checkbox" id="close-modal-guide">
                <label for="close-modal-guide" id="close-icon-modal-guide">X</label>
                <div class="contmodal-guide__content--tabtitles">
                    <h2>Completa tu registro</h2>
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
                        <a href="./shop" class="contmodal-guide__content--tabcontent__cont--continue next-step-button">CONTINUAR</a>
                    </div>
                    <div class="contmodal-guide__content--tabcontent__cont" id="step-two">
                        <p>Para que puedas ofrecer tus productos o servicios al amplio mercado de usuarios de Ttrueque, con absoluta seguridad y confianza, debes registrarte como <strong>Persona natural, Persona natural con negocio</strong> o <strong>Empresa.</strong></p>
                        <a href="#" class="contmodal-guide__content--tabcontent__cont--continue next-step-button">CONTINUAR</a>
                    </div>
                    <div class="contmodal-guide__content--tabcontent__cont" id="step-three">
                        <p>A continuación podrás añadir tus productos o servicios a la tienda que <strong>Ttrueque</strong> te brinda gratuitamente(o puedes hacerlo después).</p>
                        <p>De modo que los usuarios de <strong>Ttrueque</strong> podrán acceder a lo que ofreces y podrán COMPRAR en tu tienda física o virtual.</p>
                        <a href="#" class="contmodal-guide__content--tabcontent__cont--continue">CONTINUAR</a>
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


    linksGuide.eq(0).add(itemsGuide.eq(0)).add(itemsTitles.eq(0)).addClass('active');
    closeGuideModal.on('click', e => {$('.contmodal-guide').css({"display": "none"});});
    closeAfterComplete.on('click', e => {$('.contmodal-guide').css({"display": "none"});});

  });
});


function changesFilterandTnfoProds(){
  let parentLinkFilter = $(".contain__cont--info--btnsiconsadap");
  let LinksFilter = parentLinkFilter.find("a");
  let itemsFilter = $(".c-sidebarLeft__filtericons");

  parentLinkFilter.on("click", "a", function(){
    var t = $(this);
    var ind = t.index();

    t.add(itemsFilter.eq(ind)).addClass("active").siblings().removeClass("active");
  });
}

let filterprodbtn = document.querySelector("#ciconfilterprods");
let infostorebtn = document.querySelector("#ciconinfostoreprods");

filterprodbtn.addEventListener("click", e => {
  if(e.target === filterprodbtn) filterprodbtn.classList.remove("active");
});
infostorebtn.addEventListener("click", e => {
  if(e.target === infostorebtn) infostorebtn.classList.remove("active");
});
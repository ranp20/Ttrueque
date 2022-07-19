var tiendactual = $('#strvalidate_memb').val();

var clientID_paypal = $('#clientID_paypal').val();

paypal.Button.render(
  {
    env: "sandbox", // sandbox | production
    style: {
      label: "checkout", // checkout | credit | pay | buynow | generic
      size: "responsive", // small | medium | large | responsive
      shape: "pill", // pill | rect
      color: "gold", // gold | blue | silver | black
    },

    // PayPal Client IDs - replace with your own
    // Create a PayPal app: https://developer.paypal.com/developer/applications/create
    client: {
      sandbox: clientID_paypal,
      production: clientID_paypal,
    },

    // Wait for the PayPal button to be clicked

    payment: function (data, actions) {
      return actions.payment.create({
        payment: {
          transactions: [
            {
              amount: {
                total: $(".precio_memb").val(),
                currency: "USD",
              },
              description:
                "Compra de membresía a Ttrueque&copy;: $" +
                $(".precio_memb").val(),
              custom:
                $('.sess_id_client').val()+"#"+$('#id_memb').val(),
            },
          ],
        },
      });
    },

    // Wait for the payment to be authorized by the customer

    onAuthorize: function (data, actions) {
      return actions.payment.execute().then(function () {
        var form = $("#form-store").serializeArray();

        form.push(
          { name: "paymentToken", value: data.paymentToken },
          { name: "paymentID", value: data.paymentID }
        );

        $.ajax({
          url: "../../../shop/verified_m.php",
          method: "POST",
          dataType: "JSON",
          data: $.param(form),
        }).done(function (e) {
          console.log(e);
        });



        if(tiendactual == "" || tiendactual == 0){
          
          $('.contModalGuidettrk-step-three').append(
          `
          <div class="contmodal-guide">
            <div class="contmodal-guide__content">
                <input type="checkbox" id="close-modal-guide-stepthre">
                <label for="close-modal-guide" id="close-icon-modal-guide-stepthree">X</label>
                <div class="contmodal-guide__content--tabtitles">
                    <h2>Estás en último paso</h2>
                    <div class="contmodal-guide__content--tabtitles__cont">
                        <div class="contmodal-guide__content--tabtitles__cont--item" id="ultimate-step-one">
                            <span>PASO 1</span>
                        </div>
                        <div class="contmodal-guide__content--tabtitles__cont--item" id="ultimate-step-two">
                            <span>PASO 2</span>
                        </div>
                        <div class="contmodal-guide__content--tabtitles__cont--item active" id="ultimate-step-three">
                            <span>PASO 3</span>
                        </div>
                    </div>
                </div>
                <div class="contmodal-guide__content--tablinks">
                    <a href="#ultimate-step-one" class="contmodal-guide__content--tablinks__link active"><span>1</span></a>
                    <a href="#ultimate-step-two" class="contmodal-guide__content--tablinks__link active"><span>2</span></a>
                    <a href="#ultimate-step-three" class="contmodal-guide__content--tablinks__link active"><span>3</span></a>
                </div>
                <div class="contmodal-guide__content--tabcontent">
                    <div class="contmodal-guide__content--tabcontent__cont" id="ultimate-step-one">
                        <p>A continuación econtrarás los tipos de menbresía, puedes elegir la <strong>GRATUITA</strong> o la <strong>PAGADA.</strong></p>
                        <p>Todas la menbresías te brindarán una tienda gratuita y una cantidad de Bikkers para que empieces a comprar en los establecimientos o tiendas físicas o virtuales de los usuarios de Ttrueque.</p>
                        <a href="javascript:void(0);" class="contmodal-guide__content--tabcontent__cont--continue next-step-button">CONTINUAR</a>
                    </div>
                    <div class="contmodal-guide__content--tabcontent__cont" id="ultimate-step-two">
                        <p>Para que puedas ofrecer tus productos o servicios al amplio mercado de usuarios de Ttrueque, con absoluta seguridad y confianza, debes registrarte como <strong>Persona natural, Persona natural con negocio</strong> o <strong>Empresa.</strong></p>
                        <a href="javascript:void(0);" class="contmodal-guide__content--tabcontent__cont--continue next-step-button">CONTINUAR</a>
                    </div>
                    <div class="contmodal-guide__content--tabcontent__cont active" id="ultimate-step-three">
                        <p>A continuación podrás añadir tus productos o servicios a la tienda que <strong>Ttrueque</strong> te brinda gratuitamente (o puedes hacerlo después).</p>
                        <p>Acude a tu cuenta, y en la opción <strong>MIS PRODUCTOS</strong>, empieza a organizar tu tienda.</p>
                        <p>De este modo, los usuarios de <strong>Ttrueque</strong> podrán COMPRAR en tu tienda FÍSICA o VIRTUAL.</p>
                        <a href="../../../shop" id="close-step-three" class="contmodal-guide__content--tabcontent__cont--continue">CONTINUAR</a>
                    </div>
                </div>
            </div>
          </div>
        `
          );
          
          /************************** SYSTEM TABS INTO GUIDE FOR PWA **************************/
          let parentGuideLinks = $('.contmodal-guide__content--tablinks');
          let linksGuide = parentGuideLinks.find('a');
          let itemsGuide = $('.contmodal-guide__content--tabcontent__cont');
          let itemsTitles = $('.contmodal-guide__content--tabtitles__cont--item');
          let closeGuideModal = $('#close-icon-modal-guide-stepthree');
          let nextStepButton = $('.next-step-button');
          let closeStepThree = $('#close-step-three');

          closeStepThree.on('click', function(){
            $('.contmodal-guide').css({"display": "none"});
            setTimeout(function () {
              Swal.fire({
                title: 'Tienda Creada',
                text: 'FELICIDADES! En un momento se te redirigirá a tu panel de control...',
                imageUrl: '../../../shop/images/gifs/store_delay.gif',
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: 'Custom image',
              });
              location.replace("../../../shop");
            }, 1000);
          });
          
          closeGuideModal.on('click', e => {
            $('.contmodal-guide').css({"display": "none"});
            setTimeout(function () {
              Swal.fire({
                title: 'Tienda Creada',
                text: 'FELICIDADES! En un momento se te redirigirá a tu panel de control...',
                imageUrl: '../../../shop/images/gifs/store_delay.gif',
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: 'Custom image',
              });
              location.replace("../../../shop");
            }, 1000);
          });

        }else{
          setTimeout(function() {
            Swal.fire({
              icon: "success",
              title: "Éxito!",
              text: "El pago se realizó correctamente",
              showConfirmButton: false,
              timer: 2500,
            });

            location.replace('../../../shop');
          }, 1900);
          
        }
      });
    },
  },
  "#paypal-button-container"
);

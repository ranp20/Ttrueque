$(function(){
	renderbtnPaypal();
});
$(document).on("keyup keypress blur change", "#val-inputIptrecharge", function(e){

  if (e.which != 8 && e.which != 0 && (e.which < 45 || e.which > 57)) {
     return false;
  }else{
      //limit length but allow backspace so that you can still delete the numbers.
      if( $(this).val().length >= parseInt($(this).attr('maxlength')) && (e.which != 8 && e.which != 0)){
          return false;
      }
  }

	var convertDollar = new Intl.NumberFormat('en-US').format($(this).val());
	$("#val-txtreturnRecharge").text(convertDollar);
	(($("#val-txtreturnRecharge").text() == "0")) ? $("#val-txtreturnRecharge").text("0.00") : "0";

});
/*=====================================================
=            RENDERIZAR EL BOTÓN DE PAYPAL            =
=====================================================*/
function renderbtnPaypal(){
  $(".cCustom-PaymentBikkers--c--frm--valreturnRecharge--prefixSig").text("$");
  $(".cCustom-PaymentBikkers--c--frm--valreturnRecharge--prefixLetters").text("USD");
  var clientIDwallet_paypal = $('#clientIDwallet_paypal').val();
  var id_wallet = $('#select_wallet').val();

  $('.cont-btn-paypal-custom-payment').html(`
    <div id="paypal-button-container"></div>
  `);

  var sess_wallet = $('#ssid_cli').val();
  var idclient = $('#id_cliente').val();
  var clientpar = parseInt(idclient);

  paypal.Button.render({
      env: 'sandbox', // sandbox | production
      style: {
          label: 'checkout',  // checkout | credit | pay | buynow | generic
          size:  'responsive', // small | medium | large | responsive
          shape: 'pill',   // pill | rect
          color: 'gold'   // gold | blue | silver | black
      },

      // PayPal Client IDs - replace with your own
      // Create a PayPal app: https://developer.paypal.com/developer/applications/create
      client: {
          sandbox:    clientIDwallet_paypal,
          production: clientIDwallet_paypal,
      },

      // Wait for the PayPal button to be clicked
      payment: function(data, actions) {
          return actions.payment.create({
              payment: {
                  transactions: [
                      {
                          amount: { 
                            total: $('.val-txtreturnRecharge').text(), 
                            currency: "USD",
                          }, 
                          description:"Compra de Bikkers a Ttrueque: $"+$('.val-inputIptrecharge').text(),
                          custom: sess_wallet+"#"+id_wallet,
                      }
                  ]
              }
          });
      },

      // Wait for the payment to be authorized by the customer
      onAuthorize: function(data, actions) {
          return actions.payment.execute().then(function() {
              console.log(data);

              PayWallet = {
                paymentToken : data.paymentToken,
                paymentID: data.paymentID,
                id_wallet: id_wallet,
                idclient: clientpar,
                sess_wallet: sess_wallet,
                amount_recharge: $(".val-txtreturnRecharge").text().replace(/,/g, ''),
                quantity_recharge: $(".val-txtreturnRecharge").text().replace(/,/g, '')
              };

              $.ajax({
                url: '../shop/ajax/verified.php',
                method: 'POST',
                dataType: 'JSON',
                data: PayWallet,
              }).done((e) => {
                var result = JSON.parse(e);
                console.log(result);
              });

              setTimeout(function() {
                Swal.fire({
                  icon: "success",
                  title: "Éxito!",
                  text: "El pago se realizó correctamente",
                  showConfirmButton: false,
                  timer: 2500,
                });

                location.replace('../shop/wallet-info.php');
              }, 1900);

          });
      }
  
  }, '#paypal-button-container');
}
$(function () {
	list_info_by_wallet();
  renderbtnPaypal();
});	

var id_wallet = $('#select_wallet').val();


//LISTAR LA INFORMACIÓN DE LA RECARGA SEGÚN LO ELGIDO...
function list_info_by_wallet() {
  var capcarg_wallet = $('.cap_carga_wallet');
  $.ajax({
    url: "../shop/ajax/list_info_by_wallet.php",
    dataType: "JSON",
    method: "POST",
    contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
    data: { id_wallet : id_wallet },
  }).done(function (res) {
    $.each(res, function (i, v) {
      totalp = parseFloat(v.precio);
      //VALOR A ENVIAR POR PAYPAL...
      var priceTotal = $('.price_wallet').text(totalp);
      //MPRIMIR EL TORAL EN LA ETIQUETA...
      var priceUSD = $('.price_wallet_USD').text(`$ `+parseFloat(totalp).toFixed(2)+` USD`);
      capcarg_wallet.html(`${v.cap_carga}`);
      
    });
  });
}

function renderbtnPaypal(){
  var clientIDwallet_paypal = $('#clientIDwallet_paypal').val();


  $('.cont-btn-paypal-upd-wallet').html(`
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
          production: clientIDwallet_paypal
      },

      // Wait for the PayPal button to be clicked
      payment: function(data, actions) {
          return actions.payment.create({
              payment: {
                  transactions: [
                      {
                          amount: { 
                            total: $('.price_wallet').text(), 
                            currency: "USD",
                          }, 
                          description:"Compra de Bikers a Ttrueque: $"+$('.price_wallet').text(),
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
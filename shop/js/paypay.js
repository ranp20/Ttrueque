var tiendactual = $('#strvalidate_memb').val();

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
      sandbox:
        "AWjONb1OLJvDpvTuAq04TJLz1a1Z3T9jo8QQQQaeJ6bzz_b37Uw0kbjHRSNiCnEWJXpMYVL4U-4rYJWj",
      production:
        "ASwgeBVhPxsHWjswNXVXzj-yRoJe8X9eyDExf1UC8rCYMk-MzIwKpoTHgT3_JNLzD0N-cP9ffcHdT4QJ",
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
          setTimeout(function() {
            Swal.fire({
              title: 'Tienda Creada',
              text: 'FELICIDADES! En un momento se te redirigirá a tu panel de control...',
              imageUrl: '../../../shop/images/gifs/store_delay.gif',
              imageWidth: 400,
              imageHeight: 200,
              imageAlt: 'Custom image',
            });

            location.replace('../../../shop');
          }, 1200);
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

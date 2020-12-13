var store = $("#tienda").val();
//var clientIDsales_paypal = $('#clientIDsales_paypal').val();



$("#select-mes").on("change", function () {
  var nombyear = $(this).val();

  $("#list_cartstore_idtienda").html("");
  list_sr_by_year(nombyear);
});

$(document).ready(function () {
  
  $.ajax({
    url: "../shop/ajax/list_year_idtienda.php",
    method: "POST",
    dataType: "JSON",
    data: { tienda : store },
  }).done((e) =>{
    console.log(e);
    
    $.each(e, function(i,v){
      $('#select-mes').append(`
        <option value="${v.id_tienda}}">${v.año}</option>
      `);
    })
  });

  var today = new Date();
  var year = today.getFullYear();
  list_sr_by_year(year);
});



function list_sr_by_year(i) {
  // console.log(i);
  var date = new Date(),
    y = date.getFullYear(),
    m = date.getMonth();
  var lastDay = new Date(y, m + 1, 0);
  var options = { day: "numeric" };
  //me obtiene el ultimo dia del mes
  var date_ultimate = lastDay.toLocaleDateString("en-US", options);

  $.ajax({
    url: "../shop/ajax/list_cartstore_idtienda.php",
    method: "POST",
    dataType: "JSON",
    data: { tienda: store, year: i },
  }).done((e) => {
    console.log(e);


    var cont_sales = 0;

    if(e == "" || 
      e[0]['total_mes'] == null 
      && e[0]['mes'] == null 
      && e[0]['año'] == null 
      && e[0]['estado'] == null 
      && e[0]['ultimate_day_month'] == null)
    {
      $("#list_cartstore_idtienda").append(`
        <tr>
          <td colspan="7">
            <div class="content-any-data-sales-report">
              <i class="lni lni-emoji-happy"></i>
              <h1>No se encontraron registros de deudas.</h1>
            </div>
          </td>
        </tr>
      `);
    }else{
      $.each(e, function (i, val) {
        
        var meses = [
          "Enero",
          "Febrero",
          "Marzo",
          "Abril",
          "Mayo",
          "Junio",
          "Julio",
          "Agosto",
          "Septiembre",
          "Octubre",
          "Noviembre",
          "Diciembre",
        ];

        var nombmes = val.mes;

        if (!isNaN(nombmes) && nombmes >= 1 && nombmes <= 12) {
          var filaMes = 0;
          filaMes = meses[nombmes - 1];
        }


        if (val.estado == "PENDIENTE") {
          ///fecha de la bd
          var d = new Date(val.ultimate_day_month);
          ///fecha de la bd + 1 para tener la fecha exacta
          d.setDate(d.getDate() + 1);
          ///fecha de la bd - 3 dias
          d.setDate(d.getDate() - 3); ///28
          //
          fechabd = d.toLocaleDateString();
          var resDate = fechabd.substr(0, 2);
          // if (resDate == date_ultimate) {

          var hoy = new Date();
          var current = hoy.getDate();
          //console.log(resDate);
          //console.log(current);

          if (resDate <= date_ultimate && resDate <= current) {
            if (date_ultimate - current == 0) {
              $("#calculo").html("ATENCIÓN!, Su cuenta ha sido inhabilitada");
              $("#calculo").css({
                "color": "red",
                "margin": "20px 0 10px 0",
                "padding": ".6rem .6rem .6rem .6rem",
                "border": "1px solid red",
                "background": "#FFC4C4",
              });

              $.ajax({
                url: '../shop/ajax/update_estate_account.php',
                method: 'POST',
                dataType: 'JSON',
                data : { tienda : store}, 
              }).done(function(res){
                console.log(res);
                            
              });

            } else {
              $("#calculo").html(
                "Usted tiene " +
                  (date_ultimate - current) +
                  " dias para pagar o sino se inabilitara su cuenta*"
              );
              $("#calculo").css({
                "color": "#FBE017",
                "margin": "20px 0 10px 0",
                "padding": ".6rem .6rem .6rem .6rem",
                "border": "1px solid #FBE017",
                "background": "#FEF5B4",
              });
            }
          } else {
            $("#calculo").html("Aun no se ha cancelado el mes de "+ filaMes+"*");
            $("#calculo").css({
              "color": "orange",
              "margin": "20px 0 10px 0",
              "padding": ".6rem .6rem .6rem .6rem",
              "border": "1px solid orange",
              "background": "#FFE6B7",
            });
          }
        } else {
          $("#calculo").html("Usted esta al dia en sus pago mensuales de "+ filaMes+"*");
          $("#calculo").css({
            "color": "green",
            "margin": "20px 0 10px 0",
            "padding": ".6rem .6rem .6rem .6rem",
            "border": "1px solid green",
            "background": "#C1E0C1",
          });
        }

        var descuento = (val.total_mes * 8) / 100;
        var nummes = val.mes;
        var idmes = $('#id_mes').val(nummes);

        


        $("#list_cartstore_idtienda").append(`
          <tr>
            <td>${filaMes}</td>
            <td>${val.total_mes}</td>
            <td>
              <div class="quantity_payer_sr">${descuento}</div>
            </td>
            <td class="select-list-year">${val.año}</td>
            <td>
              <div class="info-state-${i}">${val.estado}</div>
            </td>
            <td>
              <div class="view-report">
                <a href="./pdf/reporte.php?store=${store}&month=${val.mes}&year=${val.año}" target='_blank'>
                  <span>Ver Reporte</span>
                  <i class="lni lni-eye"></i>
                </a>
              </div>
            </td>
            <td>
              <div class="btn-payer-bolet-${i}">
                <button type="button" class="btn btn-primary btn-paypal-sales-report" data-toggle="modal" data-target="#exampleModalCenter"
                  attr_ind='${i}'
                  attr_mes='${val.mes}'
                  attr_año='${val.año}'
                  attr_tienda='${store}'
                  attr_total_init='${descuento}'
                >
                  <span>PAGAR</span>
                  <i class="lni lni-paypal-original"></i>
                </button>
              </div>
            </td>
          </tr>
        `);

        if(val.estado == "PAGADO"){
          //console.log("Hola disd");
          $(`.btn-payer-bolet-${i}`).html(`
            <h5 style='color:green;'>CANCELADO</h5>
          `);
        }else{
          cont_sales++;
          $('#cont-salesreport-numbs').text(cont_sales);
         // console.log('Adios');
        }
        //var info_state = $(`.info-state-${i}`).text();
      });

    }
  });
}

$(document).on('click', '.btn-paypal-sales-report', function(e){
  e.preventDefault();

  var año_sr = $(this).attr("attr_año");
  var mes_sr = $(this).attr("attr_mes");
  var total_init = $(this).attr("attr_total_init");
  var tienda_sr = $(this).attr("attr_tienda");
  var indice = $(this).attr("attr_ind");

  var año_store = parseInt(año_sr,0);
  var tienda_store = parseInt( tienda_sr,0);
  var session_store = $('.sess_id_sr_client').val();


  var clientIDsales_paypal = $('#clientIDsales_paypal').val();  

  $('.modal-body').html(`<div id="paypal-button-container"></div>`);

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
      sandbox: clientIDsales_paypal,
      production: clientIDsales_paypal,
    },

    
    // Wait for the PayPal button to be clicked

    payment: function (data, actions) {
      return actions.payment.create({
        payment: {
          transactions: [
            {
              amount: {
                total: total_init,
                currency: "USD",
              },
              description: "Pago de impuesto a Ttrueque&copy;: $" + total_init,
              custom: session_store+"#"+tienda_store,
            },
          ],
        },
      });
    },

    // Wait for the payment to be authorized by the customer

    onAuthorize: function (data, actions) {
      return actions.payment.execute().then(function () {
          console.log(data);

          PaySales = {
            paymentToken: data.paymentToken,
            paymentID: data.paymentID,
            year_sr: año_sr,
            month_sr: mes_sr,
            store_sr: tienda_sr,
            session_store: session_store,
          };
          //console.log(PaySales);

          $.ajax({
            url: '../shop/ajax/verified_sr.php',
            method: 'POST',
            dataType: 'JSON',
            data: PaySales,
          }).done((e) => {
            var result = JSON.parse(e);
            console.log(result);
          });

          $(`.btn-payer-bolet-${indice}`).html(`<h5 style='color:green;'>CANCELADO</h5>`);
          $(`.info-state-${indice}`).html(`PAGADO`);
          $("#exampleModalCenter").modal("hide");
          $("#calculo").html("Usted esta al dia en sus pago mensuales");
          $("#calculo").css({
            "color": "green",
            "margin": "20px 0 10px 0",
            "padding": ".6rem .6rem .6rem .6rem",
            "border": "1px solid green",
            "background": "#C1E0C1",
          });
          Swal.fire({
            icon: "success",
            title: "Éxito",
            text: "El pago se realizó correctamente",
            showConfirmButton: false,
            timer: 2500,
          });
      });
    },
  },
  "#paypal-button-container"
);
})
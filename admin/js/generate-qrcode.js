$(document).on('click' , '.linkgenerate_code', function(e){
  e.preventDefault();

  var btn = $(this).parent().parent();
  var idcliente = btn.find("td").eq(0).text();
  var email = btn.find("td").eq(1).text();
  var nombre = btn.find("td").eq(2).text();
  var apellidos = btn.find("td").eq(3).text();
  var puntos = btn.find("td").eq(7).text();
  var sizeqr = 200;
  params = { "idclientqr" : idcliente, "name" : nombre, "lastname" : apellidos, "textqr" : email, "puntos" : puntos , "sizeqr" : sizeqr };
  /*
  // ------------ USANDO LIBRERÍA: QR-CODE
  $.ajax({
    url: "includes/generate-qr-code.php",
    type: "POST",
    data: params,
    success: function(datos){
      $("#show_srcodeclient").html(datos);
    }
  });
  */

  // ------------ USANDO LIBRERÍA: PHP QR CODE
  $.ajax({
    url: "includes/generate-qr-code.php",
    type: 'POST',
    data: params,
    success: function(qr){
      if(qr != ""){
        var qrTmp = JSON.parse(qr);
        if(qrTmp.type == "success"){
          $("#show_srcodeclient").html(qrTmp.res);
        }else{
          console.log('Lo sentimos, ocurrió un error al generar el QR');
        }
      }else{
        console.log('Lo sentimos, ocurrió un error al generar el QR');
      }
    }
  });
});
$(document).on('click' , '.linkgenerate_code', function(e) {
  e.preventDefault();

  var btn = $(this).parent().parent();
  var idcliente = btn.find("td").eq(0).text();
  var email = btn.find("td").eq(1).text();
  var nombre = btn.find("td").eq(2).text();
  var apellidos = btn.find("td").eq(3).text();
  var puntos = btn.find("td").eq(7).text();

  //*SEGUNDO MÉTODO*//
  var sizeqr = 200;
  parametros = { "idclientqr" : idcliente, "name" : nombre, "lastname" : apellidos, "textqr" : email, "puntos" : puntos , "sizeqr" : sizeqr };
   
  

  $.ajax({
    url: "includes/generate-qr-code.php",
    type: "POST",
    data: parametros,
    success: function(datos){
      $("#show_srcodeclient").html(datos);
    }
  });

  //*PRIMER MÉTODO*//
  // var fuerza = "H";
  // var tamano = 5;

  // $.ajax({
  //   url:'includes/generate-qr-code.php',
  //   type:'POST',
  //   data: { dataContent : email, ecc : fuerza, size : tamano },
  //   success: function(resp) {
  //     $(".generador-codigoqr").html(resp);  
  //   }
  // });
});
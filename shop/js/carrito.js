$(function () {
  list_orders_cart_idtienda();
});

var cartstore = $("#cartstore").val();
var storeid = $("#storeid").val();

//LISTAR HISTORIAL DE COMPRAS POR IDCLIENTE...
function list_orders_cart_idtienda() {
  $.ajax({
    url: "../shop/ajax/list_orders_cart_idtienda.php",
    dataType: "JSON",
    method: "POST",
    data: { cartstore: cartstore, store: storeid },
  }).done(function (res) {
    console.log(res);
    
    var suma = 0;
    var total = $("#total_points-ord");
    var name_client = $('#name_cliorder').text(res[0]['nombre']);
    var lastname_client = $('#lastname_cliorder').text(res[0]['apellido']);
    var telephone_client = $('#direccion_cliorder').text(res[0]['direccion']);
    var telephone_client = $('#telephone_cliorder').text(res[0]['telefono']);

    contadorord = 0;
    $.each(res, function (i, v) {

      console.log(v);

      suma += parseInt(v.subtotal);
      contadorord++;
      $("#list_view_order_idord").append(`
          <tr>
            <td>${contadorord}</td>
            <td>${v.producto}</td>
            <td>${v.nombre}`+` `+`${v.apellido}</td>
            <td>${v.precio}</td>
            <td>${v.cantidad}</td>
            <td>${v.subtotal}</td>
            <td>${v.fecha_c}</td>
          </tr>
        `);
    });
    total.html(suma + ` ` + `Bikers`);
  });
}

$(function () {
  list_request_refund_idtienda();
});

var tienda = $("#tienda").val();

//LISTAR HISTORIAL DE COMPRAS POR IDCLIENTE...
function list_request_refund_idtienda() {
  $.ajax({
    url: "../shop/ajax/list_request_refund_idtienda.php",
    dataType: "JSON",
    method: "POST",
    data: { tienda: tienda },
  }).done(function (res) {
    console.log(res);
    if (res != "") {
      $.each(res, function (i, v) {
        console.log(res)
        $("#list_request_refund_idtienda").append(`
            <tr>
                <td>${v.id}</td>            
                <td>${v.nombre} ${v.apellido}</td>              
                <td>${v.solicitud}</td>
            </tr>
          `);
      });
    } else {
      $("#list_request_refund_idtienda").append(`
        <tr>
          <td colspan="5">
            <div class="content-any-data-rrfund">
              <i class="lni lni-emoji-speechless"></i>
              <h1>Sin solicitudes de reembolso</h1>
            </div>
          </td>
        </tr>
      `);
    }
  });
}

$(function () {
  list_history_idcliente();
});

var idcliente = $("#idcliente").val();

//LISTAR HISTORIAL DE COMPRAS POR IDCLIENTE...
function list_history_idcliente() {
  $.ajax({
    url: "../shop/ajax/list_hw_idcliente.php",
    dataType: "JSON",
    method: "POST",
    data: { cliente: idcliente },
  }).done(function (res) {

    if(res != ""){
      $.each(res, function (i, v) {

      if(v.tipo == "custom"){
        $("#list_hw_idcliente").append(`
          <tr>
            <td>${v.id}</td>
            <td>${v.fecha}</td>
            <td>Personalizado</td>
            <td>$ ${v.monto}</td>
            <td>${v.cantidad} Bikkers</td>
            <td>${v.metodo}</td>
          </tr>
        `);
      }else{
        $("#list_hw_idcliente").append(`
          <tr>
            <td>${v.id}</td>
            <td>${v.fecha}</td>
            <td>${v.tipo}</td>
            <td>$ ${v.monto}</td>
            <td>${v.cantidad} Bikkers</td>
            <td>${v.metodo}</td>
          </tr>
        `);
      }

      });
    }else{
      $("#list_hw_idcliente").append(`
        <tr>
          <td colspan="6">
            <div class="content-any-data-wallet">
              <i class="lni lni-emoji-speechless"></i>
              <h1>Aún no hay registros de recargas</h1>
            </div>
          </td>
        </tr>
      `);
    }
  });
}
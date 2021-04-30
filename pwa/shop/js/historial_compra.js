$(function () {
  list_history_idtienda();
  AplicarColor();
});

var idcliente = $("#cliente").val();

//LISTAR HISTORIAL DE COMPRAS POR IDCLIENTE...
function list_history_idtienda() {
  $.ajax({
    url: "../shop/ajax/list_hc_idtienda.php",
    dataType: "JSON",
    method: "POST",
    data: { cliente: idcliente },
  }).done(function (res) {
    console.log(res);
    if(res != ""){
      $.each(res, function (i, v) {  
        $("#list_hc_idtienda").append(`
            <tr>
                <td>${v.id_producto}</td>
                <td>${v.nombre_producto}</td>
                <td>${v.nombre_tienda}</td>
                <td>${v.precio_real}</td>
                <td>${v.cantidad}</td>
                <td>${v.subtotal}</td>
                <td>${v.fecha_creacion}</td>
              </tr>
          `);
        // $("#btn-reporte").html(`   
        //     <a href="reporte.php?rep=${v.id_cliente}" target="_blank"  class="btn-view-report-history-ship"  >
        //       <span>Ver reporte</span>
        //       <i class="lni lni-eye"></i>
        //     </a>
        // `);
      });
    }else{
      $("#list_hc_idtienda").append(`
        <tr>
          <td colspan="7">
            <div class="content-any-data-hs">
              <i class="lni lni-emoji-speechless"></i>
              <h1>Aún no hay registros de compras</h1>
            </div>
          </td>
        </tr>
      `);
    }
  });
}

//RECORRER LAS CELDAS Y COLOREAR SEGÚN SU CAMPO Y VALOR...
function AplicarColor() {
  var hijo = $("#list_hc_idtienda tr td").eq(2);
  console.log(hijo);
}

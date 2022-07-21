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
              <span class="content-any-data-hs__cIcon">
                <svg width="30" height="30" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" fill="#3F3F3F"><path d="M12 0c6.623 0 12 5.377 12 12s-5.377 12-12 12-12-5.377-12-12 5.377-12 12-12zm0 1c6.071 0 11 4.929 11 11s-4.929 11-11 11-11-4.929-11-11 4.929-11 11-11zm-.019 14c1.842.005 3.613.791 5.117 2.224l-.663.748c-1.323-1.27-2.866-1.968-4.456-1.972h-.013c-1.568 0-3.092.677-4.4 1.914l-.664-.748c1.491-1.4 3.243-2.166 5.064-2.166h.015zm-3.494-6.5c.552 0 1 .448 1 1s-.448 1-1 1-1-.448-1-1 .448-1 1-1zm7.013 0c.552 0 1 .448 1 1s-.448 1-1 1-1-.448-1-1 .448-1 1-1z"/></svg>
              </span>
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

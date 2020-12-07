$(document).ready(function () {
  var store = $("#store").val();

  $.ajax({
    url: "../shop/ajax/list_feedback.php",
    dataType: "JSON",
    method: "POST",
    data: { id_tienda: store },
  }).done(function (res) {
    console.log(res);
    if (res.length == []) {
      $("#list").append(
        `<tr><td >    
        <td colspan="7">
          <div class="content-any-data-reviewprods">
            <i class="lni lni-emoji-speechless"></i>
            <h1>No se encontraron comentarios</h1>
          </div>
         </td>  
      </tr>`
      );
    } else {
      var contador = 0;
      $.each(res, function (i, v) {
        contador++;  
        $("#list").append(
          `<tr>
              <td>${contador}</td>        
              <td>${v.nombre_cliente} ${v.apellido_cliente}</td>        
              <td>${v.comentarios}</td>
              <td>${v.fecha_creacion}</td>
            </tr>`
        );
      });
    }
  });
});

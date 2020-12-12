$(document).ready(function () {

  var idtienda = $("#tienda").val();
  console.log(idtienda);
  $.ajax({
    url: "../shop/ajax/list_orders_idtienda.php",
    dataType: "JSON",
    method: "POST",
    data: { tienda: idtienda },
  }).done(function (res) {
    console.log(res);

    var cont_orders = 0;
    if (res != "") {
      $.each(res, function (i, v) {
        
        if(v.estado != "Vendido"){
          cont_orders++;
          $('#cont-orders-numbs').text(cont_orders);
        }

        $("#list_orders_idtienda").append(`
            <tr>
                <td>${v.orderid}</td>
                <td>${v.nombre} ${v.apellido}</td>
                <td>${v.direccion}</td>
                <td>${v.pais}</td>
                <td>${v.celular}</td> 
                <td>${v.desde}</td>
                <td class="select-list-${i}"></td>
                <td>${v.confirmacion}</td>
                <td>
                  <div>
                    <a class="btn-update-product" href="orders.php?ord=${v.orderid}">Ver pedido</a>
                  </div>
                </td>
            </tr>
          `);
        if (v.estado == "Vendido") {
          $(`.select-list-${i}`).append(
            "<h1>Vendido</h1>"
          );
        } else {
          $(`.select-list-${i}`).append(`
                
          <select  class="input-product select-onehidden" id="select-pedido-${i}"   >
              <option value="${v.estado}">${v.estado}</option>
              <option value="Preparando">Preparando</option>
              <option value="En camino">En camino</option>
              <option value="Vendido">Vendido</option>
          </select>   
          `);
        }

        $(`#select-pedido-${i}`).change(function () {
          // console.log("hoas");
          console.log($(this).val());
          console.log(v.id);
          // if ($(this).val() == "Vendido") {
          Swal.fire({
            title: "¿Desea modificar el estado?",
            text: "Si es VENDIDO no hay vuelta atras",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Modificar",
          }).then((result) => {

            //console.log(result);

            if (result.isConfirmed) {
              $.ajax({
                url: "../shop/ajax/update-state.order.php",
                dataType: "JSON",
                method: "POST",
                data: { estado: $(this).val(), id: v.id },
              }).done(function (res) {
                console.log(res);
              });

              if ($(this).val() == "Vendido") {
                $(`#select-pedido-${i}`).remove();
                $(`.select-list-${i}`).html(
                  "<h1>Vendido</h1>"
                );
              }
              Swal.fire("Bien!", "Se actualizo correctamente", "success");
            } else {
              console.log("operqacion cancelads");
              // Swal.fire("Deleted!", "Your file has been deleted.", "success");
            }
          });
          // }
        });
      });
    } else {
      $("#list_orders_idtienda").append(`
        <tr>
          <td colspan="9">
            <div class="content-any-data-orders">
              <i class="lni lni-emoji-speechless"></i>
              <h1>Todavía no tienes ordenes y/o pedidos</h1>
            </div>
          </td>
        </tr>
      `);
    }
  });
});

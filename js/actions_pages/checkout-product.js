$(() => {
  process_checkout();
  list_infoclient();
});
var cli = $(".cliente").val();
// ------------ PROCESS CHECKOUT
function process_checkout(){
  $.ajax({
    url: "./php/process_checkout.php",
    method: "POST",
    dataType: "JSON",
  }).done((e) => {
    $.each(e, function(i, v) {
      //VALORES A INSERTAR...
      $("#name-store").html(v.name_store);
      $("#total").html(v.total);
      if (typeof v.total != "undefined") {
        $("#form-client").append(`
        <input type="hidden" class="total" name="total" value="${v.total}" />
        <input type="hidden" class="store" name="store" value="${v.idStore}" />
        `);
      }
      if(typeof v.idProd != "undefined" && typeof v.cantidad != "undefined" && typeof v.name != "undefined" && typeof v.puntos != "undefined" && typeof v.precio_real != "undefined"){
        // console.log(v.total);
        $(".form").append(`
          <div class="todo">
            <input type="hidden" class="idprods" name="prod" value="${v.idProd}" />
            <input type="hidden" class="clsprecio_real" name="precio_real" value="${v.precio_real}" />
            <input type="hidden" class="cantprods" name="cantidad" value="${v.cantidad}" />
            <input type="hidden" class="pointscli" name="subtotal" value="${v.puntos}" />
          </div>
          `);
          $(".list_checkout_products").append(`
            <li>
              <div class="cont-name-product">
                <span>${v.cantidad} x</span>
                <span>${v.name}</span>
              </div>
              <div class="cont-subtotal-product">
                <span>${v.puntos}</span><span> Bikers</span>
              </div>
            </li>
        `);
      }
    });
  });
}
// ------------ LISTAR LA INFORMACIÓN DEL CLIENTE
function list_infoclient(){
  $.ajax({
    url: "./php/process-checkout-list-cliente.php",
    method: "POST",
    dataType: "JSON",
    data: { cliente: cli },
  }).done((e) => {
    if(e != "" && e != "[]"){
      $.each(e, function(i, v) {
        $("#nombre").val(v.nombre_cliente);
        $("#apellido").val(v.apellido_cliente);
        $("#direccion").val(v.direccion_cliente);
        $("#pais").val(v.id_pais);
        $("#celular").val(v.telefono);
      });
    }else{
      console.log('Lo sentimos, hubo un error al consultar la información');
    }
  });
}
$(document).on("click", ".btn-checkout", function (e) {
  e.preventDefault();

  var form = $("#form-client").serialize();
  var btncheckout = $(this);
  var tot = parseInt($(".total").val());
  var points = parseInt($(".puntos").val());

  if($("#nombre").val() == "" || $("#apellido").val() == "" || $("#direccion").val() == "" || $("#pais").val() == "" || $("#celular").val() == ""){
    Swal.fire({
      icon: "error",
      title: "Atención",
      text: "Uno o varios campos vacíos",
      showConfirmButton: false,
      timer: 2400,
    });
  }else if(points >= tot){
    $.ajax({
      url: "./php/class/process_add-client-checkout.php",
      method: "POST",
      data: form,
    }).done((e) => {
      $("#form-client").addClass("fr-disabled");
      btncheckout.attr("disabled", true);

      if(e == "mal"){
        $("#form-client").removeClass("fr-disabled");
        btncheckout.attr("disabled", false);
        alert("error amigo");
      }else{
        
        var totalall = $('.total').val();
        var storeall = $('.store').val();

        sumyres(cli, storeall, totalall);

        $(".todo").each(function (i, v) {
          var pro = $(this).find("input.idprods").val();
          var cli = $(".cliente").val();
          var pre_re = $(this).find("input.clsprecio_real").val();
          var cant = $(this).find("input.cantprods").val();
          var sub = $(this).find("input.pointscli").val();
          var idcart = e;
          var sto = $(".store").val();
          datos = {
            prod: pro,
            cliente: cli,
            precio_real: pre_re,
            cantidad: cant,
            subtotal: sub,
            id: idcart,
            store: sto,
          };

          $.post("./php/class/process_checkout_add.php", datos, function (res) {
            console.log(res);
          }).done(function () {
            $.post("./php/process_delete_store.php", function (resul) {
              setTimeout(function () {
                $("#successpayment").html(`     
                <div class="content-msg-success-pay">
                  <div class="cont-confirm-img-check">
                    <div class="cont-img-msg-success-p">
                      <img src="./img/gifs/animate_gif_ttrueque_confirm.gif" alt="confirm-checkout-check" width="100px">
                    </div>
                    <p>Se realizó con éxito el pago</p>
                  </div>
                </div>`);
                $("#successpayment").fadeOut(2800);
                location.replace("./confirm");
              }, 2000);
            });
          });
        });
      }
    });
  }else{
    Swal.fire({
      icon: "error",
      title: "Error",
      text: "No tienes suficientes Bikkers en tu cuenta.",
      showConfirmButton: false,
      timer: 2400,
    });
  }
});
// ------------ RESTAR PUNTOS/ SUMAR EN TIENDA
function sumyres(cliente, tienda, subtotal) {
  $.ajax({
    url: './php/process_sum_res_cart.php',
    method: 'POST',
    dataType: 'JSON',
    data: { cliente: cliente, tienda: tienda, subtotal: subtotal},
  }).done((e) => {
    console.log(e);
  })
}
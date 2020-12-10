$(document).ready(function () {
  $.ajax({
    url: "./php/process_checkout.php",
    method: "POST",
    dataType: "JSON",
  }).done((res) => {
    console.log(res);
    $.each(res, function (i, v) {
      //VALORES A INSERTAR...
      $("#name-store").html(v.name_store);
      $("#total").html(v.total);
      if (typeof v.total != "undefined") {
        $("#form-client").append(`
     <input type="hidden" class="total" name="total"  value="${v.total}"/> 
     <input type="hidden" class="store" name="store" value="${v.idStore}" />
     `);
      }
      if (
        typeof v.idProd != "undefined" &&
        typeof v.cantidad != "undefined" &&
        typeof v.name != "undefined" &&
        typeof v.puntos != "undefined" &&
        typeof v.precio_real != "undefined"
      ) {
        // console.log(v.total);
        $(".form").append(`
      <div class="todo">
      
     <input type="hidden" class="idprods" name="prod" value="${v.idProd}"    />
     <input type="hidden" class="clsprecio_real" name="precio_real"  value="${v.precio_real}"    />
     <input type="hidden" class="cantprods" name="cantidad"  value="${v.cantidad}"    />
     <input type="hidden" class="pointscli"  name="subtotal"    value="${v.puntos}"    />
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
});

var cli = $(".cliente").val();

$(document).ready(function () {

  $.ajax({
    url: "./php/process-checkout-list-cliente.php",
    method: "POST",
    dataType: "JSON",
    data: {
      cliente: cli,
    },
  }).done((res) => {
    $.each(res, function (i, v) {
      console.log(v);
      $("#nombre").val(v.nombre_cliente);
      $("#apellido").val(v.apellido_cliente);
      $("#direccion").val(v.direccion_cliente);
      $("#pais").val(v.id_pais);
      $("#celular").val(v.telefono);
    });
  });
});
$(document).on("click", ".btn-checkout", function (e) {
  e.preventDefault();
  var form = $("#form-client").serialize();
  
  var btncheckout = $(this);

  // console.log(form);
  var tot = parseInt($(".total").val());
  var points = parseInt($(".puntos").val());
  if (points >= tot) {
    $.ajax({
      url: "./php/class/process_add-client-checkout.php",
      method: "POST",
      data: form,
    }).done((res) => {

      console.log(res);
      btncheckout.css({
        "background" : "#ccc"
      });
      btncheckout.attr("disabled", true);

      if (res == "mal") {
        alert("error amigo");
      } else {
        
        var totalall = $('.total').val();
        var storeall = $('.store').val();

        sumyres(cli, storeall, totalall);


        $(".todo").each(function (i, v) {
          var pro = $(this).find("input.idprods").val();
          var cli = $(".cliente").val();
          var pre_re = $(this).find("input.clsprecio_real").val();
          var cant = $(this).find("input.cantprods").val();
          var sub = $(this).find("input.pointscli").val();
          var idcart = res;
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
            // alert("second success");
            $.post("./php/process_delete_store.php", function (resul) {
              // console.log(resul);
              setTimeout(function () {
                $("#successpayment").html(`     
                <div class="content-msg-success-pay">
                  <h1>Se realizó con éxito el pago</h1>
                  <div class="cont-img-msg-success-p">
                    <div style="background-image: url(./shop/images/icon_check_write.png);"></div>
                  </div>
                </div>`);
                $("#successpayment").fadeOut(2500);
                location.replace("./confirm");
              }, 2000);
            });
          });
        });
      }
    });
  } else {
    alert("No tienes suficientes Bikers");
  }
});

function sumyres(cliente, tienda, subtotal){
  $.ajax({
    url: './php/process_sum_res_cart.php',
    method: 'POST',
    dataType: 'JSON',
    data: { cliente : cliente, tienda : tienda, subtotal : subtotal},
  }).done(function(res){
    console.log(res);
  })
}
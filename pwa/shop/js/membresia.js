$(function () {
  list_info_by_memb();
  list_cant_m_idtienda();
});

var id_memb = $("#id_memb").val();
var tipo_memb = $(".tipo_memb");
var cant_memb = $(".cant_memb");

function list_info_by_memb() {
  $.ajax({
    url: "../../../shop/ajax/list_info_by_memb.php",
    dataType: "JSON",
    method: "POST",
    contentType: "application/x-www-form-urlencoded;charset=UTF-8",
    data: { id_memb: id_memb },
  }).done(function (res) {
    $.each(res, function (i, v) {
      tipo_memb.val(v.tipo);
      cant_memb.val(v.cantidad);
      prememb = parseFloat(v.precio_eeuu);
      var precio_memb = $(".precio_memb").val(prememb);

      if (v.estado == "HIDE") {
        // $(".cnt-payments-method").html(`
        //   <button class="btn-memb-store-register">Registrar mi tienda</button>
        // `);
        $(".cnt-payments-method").html("");
      } else {
        $(".content-buton-paypal-payment").html(`
          <h3>Métodos de Pago</h3>
          <div id="paypal-button-container"></div>
        `);
      }
    });
  });
}

function list_cant_m_idtienda() {
  var tienda = $(".get_selidtienda").val();
  //console.log(tienda);
  $.ajax({
    url: "../shop/ajax/list_memb_by_idtienda.php",
    dataType: "JSON",
    method: "POST",
    contentType: "application/x-www-form-urlencoded;charset=UTF-8",
    data: { tienda: tienda },
  }).done(function (res) {
    // console.log(res);
    $(".content-memb-targets").html("");

    $.each(res, function (i, v) {
      var img_path = "../admin/images/menbresia/" + v.image;
      var a = $("<div />").html(v.descripcion).text();

      $(".content-memb-targets").append(`
          <div class='card-memb-item'>
            <h4>${v.tipo}</h4>
            <div class='cont-img-memb'>
                <div class='img-memb-itm' style='background-image: url(${img_path});background-repeat:no-repeat;background-size: contain;background-position: center;'></div>
            </div>
            <h1 class='price-country'>$ ${v.precio_eeuu}</h1>
            <div class='cont-list-benefits'>
              ${a}
            </div>
            <a href='../cliente/store/${v.cantidad}/${v.id}' >SELECCIONAR PLAN</a>
        </div>
        `);
    });
  });
}

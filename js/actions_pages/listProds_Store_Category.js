function msg_alert(i) {
  Swal.fire({
    position: "top-end",
    icon: "success",
    title: i,
    timer: 1100,
    showConfirmButton: false,
    grow: "row",
    toast: true,
  });
}

$(document).on("click", ".button_add_cart_store_cat", function (e) {
  e.preventDefault();
  $("#cart-buy-list").html("");

  var data = {
    id_p: $(this).attr("attr_id"),
    cant_p: $(this).attr("attr_count"),
    puntos_p: $(this).attr("attr_price"),
    id_store: $(this).attr("attr_store_id"),
    id_client: $(this).attr("attr_idclient"),
  };

  $.post("./php/process_temp_cart.php", data, function (result) {

      if (result["res"] == "agregado") {
        var text = "Producto Agregado al Carrito";
        msg_alert(text);
      } else if (result["res"] == "update") {
        var text = "Producto Actualizado";
        msg_alert(text);
      } else {
        Swal.fire({
          position: "top-end",
          icon: "error",
          title: "No hay suficiente stock para este producto",
          timer: 1500,
          showConfirmButton: false,
          grow: "row",
          toast: true,
        });
      }
      listProductsIntoCart();
    },
    "json"
  );
});

function listProductsIntoCart() {
  var client = $("#userid_cli").val();
  //console.log(client);
  $.ajax({
    url: "./php/class/list_temp_cart.php",
    method: "POST",
    dataType: "JSON",
    contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
    data: { client: client },
  }).done(function (res) {
    $("#count-product-cart").html(res.length);
    $("#cart-buy-list").html("");
    $.each(res, function (i, v) {
      var path = "./shop/folder/" + v.image;

      $("#cart-buy-list").append(`
        <li>
          <div class="content-info-p-prods">
            <div>
              <div class="cont-img-p-prod">
                <div    class='img-fluid' style="background-image: url(${path});"></div>
              </div>
            </div>
            <a href="javascript:void(0);">
              <span>${v.cantidad} x </span><span>${v.producto}</span>
            </a>
          </div>
          <div class="content-price-s-prods">
            <span>${v.sub_total}</span><span>Bikers</span>
          </div>
        </li>
      `);
    });
  });
}

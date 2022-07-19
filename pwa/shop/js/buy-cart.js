function msg_alert(i) {
  Swal.fire({
    position: "top-end",
    icon: "success",
    title: i,
    timer: 1100,
    showConfirmButton: false,
    grow: "row",
    toast: true,
    customClass: {
      container: "container-swalertcustomclass",
      popup: "content-swalertcustomclass",
      title: "title-swalertcustomclass",
    },
  });
}
$(document).on("click", ".button_add_cart_shop", function (e) {
  e.preventDefault();
  $("#cart-buy-list").html("");
  var data = {
    id_p: $(this).attr("attr_id"),
    cant_p: $(this).attr("attr_count"),
    puntos_p: $(this).attr("attr_price"),
    id_store: $(this).attr("attr_store_id"),
    id_client: $(this).attr("attr_idclient"),
  };
  // console.log(data);
  $.post( "../php/process_temp_cart.php", data, function (result) {
      //console.log(result["res"]);
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
          customClass: {
            container: "container-swalertcustomclass",
            popup: "content-swalertcustomclass",
            title: "title-swalertcustomclass",
          },
        });
      }
      listProductsIntoCart();
    },
    "json"
  );
});
function listProductsIntoCart() {
  var client = $("#userid_cli").val();
 // console.log(client);
  $.ajax({
    url: "../php/class/list_temp_cart.php",
    method: "POST",
    dataType: "JSON",
    data: { client: client },
  }).done(function (res) {
    $("#count-product-cart").html(res.length);
    $("#cart-buy-list").html("");
    
    if(res == ""){
      $("#cart-buy-list").append(`
        <div class='cont-msg-any-products-cart'>
          <img src='./img/iconos_home/index-sidebar-car-sad-face.svg' alt=''>
          <h5>No hay productos en el carrito</h5>  
        </div>
      `);
    }else{
      $.each(res, function (i, v) {
        console.log(res);
        var path = "./shop/folder/" + v.image;
        $("#cart-buy-list").append(`
          <li>
            <div class="content-info-p-prods">
              <div>
                <div class="cont-img-p-prod">
                  <div style="background-image: url(${path});"></div>
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
    }

  });
}
$(document).ready(function () {
  listProductsIntoCart();
});
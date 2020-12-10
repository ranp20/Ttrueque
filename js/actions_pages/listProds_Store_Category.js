$(document).ready(function () {
  //var tienda = $("#store_cli").val();
  var tienda = $("#tienda-cli_prod").val();
  var categoria = $("#categoria-cli_prod").val();
  var idcliente = $("#userid_cli").val();

  $.ajax({
    url: "./php/class/list_product_store.php",
    dataType: "JSON",
    method: "POST",
    contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
    data: { tienda: tienda, categoria: categoria },
  }).done(function (res) {

    if (res == "") {
      $(".btn-l-cart-product-str_ttrq").hide();
      $(".btn-r-cart-product-str_ttrq").hide();

      $("#list_products_by_store").append(`
        <div class="content-msg-any-prods_by_store">
         <div>
           <i class="far fa-store-slash fa-4x"></i>
           <h1>Aún no hay productos disponibles para esta categoría</h1>
           <a href="categorias">Ver todas las categorías</a>
         </div>
       </div>
      `);
    } else {
      $.each(res, function (i, v) {
        //console.log(res);
        var path = "./shop/folder/" + v.imagen;
        var path_store = "./shop/images/store/" + v.logo;
        var path_flag = "./admin/images/banderas/" + v.bandera;

        var nomb_prod = v.nombre_producto.substring(0, 60);
        var name_prod = nomb_prod.replace(/_/g, "-");

        $("#list_products_by_store").append(
          `
        <li class="item-product-stores-into">
          <div class="item-cont-products-store">
            <a href="product-detail?id=${v.id_producto}" class="cont-image-products-str-b-ttrk">
              <div  loading='lazy' class="image-product-str-c-ttrk img-fluid" style="background-image: url(${path});">
              </div>
            </a>
            <div class="cont-info-product-stores-b-ttrk">
              <p>${name_prod}</p>
              <p>${v.precio_producto} Bikers</p>
              <ul>
                <li>
                  <a href="javascript://;" class="button_add_cart_store_cat"
                    attr_name='${v.nombre_producto}'
                    attr_price='${v.precio_producto} '
                    attr_store_id='${v.id_tienda}'
                    attr_store_name='${v.nombre_tienda}'
                    attr_store_logo='${path_store}'
                    attr_count=1 
                    attr_id='${v.id_producto}'
                    attr_idclient='${idcliente}'
                  </a>
                  <i class="fal fa-shopping-cart"></i>
                </li>
                <li>
                  <a href="#0" class="heart-icon-p-by-str">
                    <i class="fal fa-heart"></i>
                  </a>
                </li>
                <li>
                  <div class="flag-icon-p-by-str">
                    <div style="background-image: url(${path_flag});"></div>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </li>
       `
        );
      });
    }
  });

  //CAROUSEL DE PRODUCTOS...
  var contenedor = document.querySelector(".items-products-stores-ttrk");
  var arrowleft = document.querySelector(".btn-l-cart-product-str_ttrq");
  var arrowright = document.querySelector(".btn-r-cart-product-str_ttrq");

  arrowright.addEventListener("click", function () {
    contenedor.scrollLeft += contenedor.offsetWidth;
  });
  arrowleft.addEventListener("click", function () {
    contenedor.scrollLeft -= contenedor.offsetWidth;
  });
});

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
                <div  loading='lazy' class='img-fluid' style="background-image: url(${path});"></div>
              </div>
            </div>
            <a href="#">
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

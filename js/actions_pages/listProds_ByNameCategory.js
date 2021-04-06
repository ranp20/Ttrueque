$(document).ready(function () {
  var tipo = $("#tipo").val();
  var idcliente = $("#userid_cli").val();
  var idtienda_curr = $("#idtienda_current").val();
  //console.log(tipo);
  $.ajax({
    url: "./php/class/store_cart.php",
    dataType: "JSON",
    method: "POST",
    contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
    data: { tipo: tipo },
  }).done(function (res) {

    if (res.length == 0) {
      $(".btn-l-name-categorias-products").hide();
      $(".btn-r-name-categorias-products").hide();

      $("#list_all-products-name-category").append(`
        <div class="content-msg-any-prods_cat">
         <div>
           <img src='./img/iconos_home/index-any-products.svg' alt=''>
           <h1>Aún no hay productos disponibles para esta categoría</h1>
           <a href="allcategories">Ver todas las categorías</a>
         </div>
       </div>
      `);

    } else {
      $.each(res, function (i, v) {
        
        var path = "./shop/folder/" + v.imagen;
        var path_store = "./shop/images/store/" + v.logo;
        var nomb_prod = v.nombre_producto.substring(0, 60);
        var name_prod = nomb_prod.replace(/_/g, "-");
        var idtienda_DB = v.id_tienda;

        if(idtienda_curr == idtienda_DB){
          if(v.stock_producto == 0){
            console.log('Uno o más productos de este filtro no tienen stock');
          }else{
            $("#list_all-products-name-category").append(`
            <li class="item-product-name_categ">
            <div class="item-cont-products-name-categ">
              <a href="product-detail?id=${v.id_producto}" class="cont-image-products-name-categ">
                <img src='${path}' loading='lazy' class='img-fluid'>
                <!--<div  loading='lazy' class="image-product-name-categ img-fluid" style="background-image: url(${path});">
                </div>-->
              </a>
              <div>
                <div class="sms-currstore-prod_categ">
                  <h1>Tu producto</h1>
                </div>
                <div class="cont-info-product-name_categ-ttrk">
                  <p>${name_prod}</p>
                  <p>${v.precio_producto} Bikers</p>
                </div>
              </div>
            </div>
          </li>
          `);
          }
        }else{
          if(v.stock_producto == 0){
            console.log('Uno o más productos de este filtro no tienen stock');
          }else{
            $("#list_all-products-name-category").append(`
            <li class="item-product-name_categ">
            <div class="item-cont-products-name-categ">
              <a href="product-detail?id=${v.id_producto}" class="cont-image-products-name-categ">
                <img src='${path}' loading='lazy' class='img-fluid'>
                <!--<div  loading='lazy' class="image-product-name-categ img-fluid" style="background-image: url(${path});">
                </div>-->
              </a>
              <div>
                <div class="cont-info-product-name_categ-ttrk">
                  <p>${name_prod}</p>
                  <p>${v.precio_producto} Bikers</p>
                  <ul>
                    <li>
                      <a href="#0" class="button_add_cart_name_cat"
                        attr_name='${v.nombre_producto}'
                        attr_price='${v.precio_producto} '
                        attr_store_id='${v.id_tienda}'
                        attr_store_name='${v.nombre_tienda}'
                        attr_image='${path}'
                        attr_store_logo='${path_store}'
                        attr_count=1 
                        attr_id='${v.id_producto}'
                        attr_idclient='${idcliente}'
                      >
                        <i class="fal fa-shopping-cart"></i>
                      </a>
                    </li>
                    <!--<li>
                      <a href="#0" class="heart-icon-p-by-str">
                        <i class="fal fa-heart"></i>
                      </a>
                    </li>-->
                  </ul>
                </div>
              </div>
            </div>
          </li>
          `);
          }
        }        
      });

      //CAROUSEL PRODUCTOS...
      var contenedor = document.querySelector(
        ".items-products-name-categorias"
      );
      var arrowleft = document.querySelector(".btn-l-name-categorias-products");
      var arrowright = document.querySelector(
        ".btn-r-name-categorias-products"
      );

      arrowright.addEventListener("click", function () {
        contenedor.scrollLeft += contenedor.offsetWidth;
      });
      arrowleft.addEventListener("click", function () {
        contenedor.scrollLeft -= contenedor.offsetWidth;
      });
    }
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

$(document).on("click", ".button_add_cart_name_cat", function (e) {
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

  $.post(
    "./php/process_temp_cart.php",
    data,
    function (result) {
      // console.log(result);

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
            <span>${v.sub_total}</span><span> Bikers</span>
          </div>
        </li>
      `);
    });
  });
}
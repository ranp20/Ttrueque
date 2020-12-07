$(document).ready(function () {
  listProductsIntoCart();
  var idcliente = $("#userid_cli").val();
  // console.log(idcliente);
  $.ajax({
    url: "./php/process_product_cart_list.php",
    method: "POST",
    dataType: "JSON",
    data: { client: idcliente },
  }).done((res) => {
    // console.log(res);
    total_price = 0;
    if (res == "") {
      $("#table-list-product").html(`
        <tr class="content-msg-cart-empty_ttrq">
         <td colspan="5">
           <div>
             <i class="fal fa-frown-open"></i>
             <h5>Upps!, No tienes productos en el carrito.</h5>
           </div>
         </td>
       </tr>
      `);
    } else {
      $.each(res, function (i, val) {
        //var idprodanidado = val[0].id_p;
        var path_store = "./shop/images/store/" + val[0].logo;
        $("#table-list-product").append(`
      <tr class="ctn-store-${i}" id="cart-store"  >
         <td colspan="5" class="cont-img-info-store">
           <div class="contain-img-total-list_c-ttrq">
             <div class="container-img-store_list_c-ttrq">
               <div class="content-img-s-list_c-ttrq">
                 <div class='img-fluid' style='background-image: url(${path_store});background-repeat:no-repeat;background-size: contain;background-position: center;'></div>
               </div>
               <h3 id="name_store">${val[0].tienda}</h3>
             </div> 
             <div class="container-total-store_list_c-ttrq">
                 <form action="./checkout" class="total-cant-pay-store-cart_ttrq"  method="POST"  > 
                    <input type="hidden" name="check-arr" class="cls-check-arr" value=""  >   
                    <button class="checkout">
                    <p>Total a Pagar: </p>
                    <span class="points-${i}"></span>
                    </button>
                  </form>
              </div>
           </div>
         </td>
       </tr>
       `);
        $.each(val, function (j, v) {
          var total_price = v.cantidad * v.puntos;
          var path = "./shop/folder/" + v.image;
          var stockrestado = v.stock_producto - v.cantidad;
          var productID = v.id_p;
          $("#table-list-product").append(`
          <tr class="products-${i}">
            <td class="cont-img-info-prod">
                <div class="thumb_cart">
                    <img src="${path}" data-src="${path}" class="lazy img-fluid"  loading='lazy' alt="Image">
                </div>
                <span class="item_cart">${v.producto}</span>
                <input type="hidden" id="stck-prodreal-${i}" class="stock-prod" value="${v.stock_producto}">
                <input type="hidden" id="stck-prod-${i}" class="stock-prod" value="${stockrestado}">
            </td>
            <td><strong class="precioStrong">${v.puntos}</strong></td>
            <td>
            <input type="hidden" value="${v.id_p}" class="id_prod" >
                <div class="content-btns_inc-y-dec-l-ttrq">                 
                  <button id="btn-dec-${i}" class="dec button_inc-${i}"
                    data-proid='${v.id_p}'
                    data-procant='${v.cantidad}'
                    data-prostrid='${v.store_id}'
                    data-procliid='${idcliente}'
                    data-prostock='${v.stock_producto}'
                    data-proprice='${v.puntos}'
                  >-</button>
                    <input type="text" value="${v.cantidad}" data-prcantidad='${v.cantidad}' readonly id="inpt-cantprod-${i}" class="quantity_1" name="quantity_1">
                  <button id="btn-inc-${i}" class="inc button_inc-${i}"
                    data-proid='${v.id_p}'
                    data-procant='${v.cantidad}'
                    data-prostrid='${v.store_id}'
                    data-procliid='${idcliente}'
                    data-prostock='${v.stock_producto}'
                    data-proprice='${v.puntos}'
                  >+</button>
                </div>
            </td>
            <td>
                <strong class="price-${i}">${total_price} Puntos </strong>
                </td>
                <td class="options">
                <button class="btn btn-danger icon-trash-product" data-tienda="${v.store_id}" data-producto="${v.id_p}"><i class="fas fa-trash-alt"></i></button>
            </td>
         </tr>`);
        });
        $("#table-list-product").append(`
          <tr class="row-delete-store_ttrq">
            <td colspan="5" class="cont-delete-info-store">
              <div>
                <button class="delete-store" id="store-delete-${i}"   data="${i}" >Eliminar tienda</button>
              </div>
            </td>
          </tr>
        `);
        $(".quantity_1").attr("readonly", "readonly");
        ///resultado del total
        result = 0;
        var priceClass = $(`.price-${i}`);
        $.each(priceClass, function () {
          result += parseInt($(this).text().replace("Puntos", ""));
        });
        $(`.points-${i}`).html(`${result}`);
        /////////////////////////////////////////////////
        $(document).on("click", `.button_inc-${i}`, function () {
          var $button = $(this);
          var inputcantidad = $button.parent().find("input");
          var oldValue = $button.parent().find("input").val();
          var arr_validate = {
            idprod: $button.data("proid"),
            points: $button.data("proprice"),
            cant_p: inputcantidad.data("prcantidad"),
            stock_p: $button.data("prostock"),
            idstore: $button.data("prostrid"),
            idclient: $button.data("procliid"),
            button: $button.text(),
          };
          //console.log(arr_validate);
          if ($button.text() == "+") {
            var btnincrement = $(this);
            var newVal = parseFloat(oldValue) + 1;
            $.ajax({
              url: "./php/process_validate_temp_cart.php",
              method: "POST",
              dataType: "JSON",
              data: arr_validate,
            }).done((e) => {
              var result = e[0]["res"];
              // console.log(result);
              if (result == "máximo") {
                //DESHABILITAR EL BOTÓN...
                //btnincrement.attr("disabled", true);
                //MOSTRAR MENSAJE,,,
                Swal.fire({
                  icon: "warning",
                  title: "Oops...",
                  text: "No hay suficiente stock para este producto!",
                  confirmButtonText: "ACEPTAR",
                  allowOutsideClick: false,
                });
                //VALIDAR LA CANTIDAD...
                var newVal = parseFloat(oldValue) + 1 - 1;
                var nuevovalor = $button.parent().find("input").val(newVal);
                ///VALIDAR EL SUBTOTAL...
                var cantidad = newVal;
                var tr = $button.parent().parent().parent();
                var precio_unitario = tr
                  .find("td")
                  .eq(1)
                  .text()
                  .replace("Puntos", "");
                var sub_total = parseFloat(precio_unitario) * cantidad;
                tr.find("td")
                  .eq(3)
                  .html("<strong>" + sub_total + " Puntos</strong");
                var Puntostotal1 = 0;
                $(`#tbl_id tbody .products-${i}`).each(function () {
                  var precio_unitario1 = parseFloat(
                    $(this).find("td").eq(3).text().replace("Puntos", "")
                  );
                  Puntostotal1 =
                    parseFloat(Puntostotal1) + parseFloat(precio_unitario1);
                });
                $(`.points-${i}`).html(`${Puntostotal1}`);
              } else {
                //HABILITAR EL BOTÓN...
                // console.log("Deshabilitado");
                btnincrement.removeAttr("disabled");
              }
            });
          } else {
            /***    Don't allow decrementing below zero    ***/
            if (oldValue > 1) {
              var newVal = parseFloat(oldValue) - 1;
              $.ajax({
                url: "./php/process_validate_temp_cart.php",
                method: "POST",
                dataType: "JSON",
                data: arr_validate,
              }).done((e) => {
                var result = e[0]["res"];
                console.log(result);
              });
            } else {
              newVal = 1;
            }
          }
          //cantidad
          var cantidad = newVal;
          //encuentra el tr del input selecionado
          var tr = $button.parent().parent().parent();
          //precio unitario hallarlo
          var precio_unitario = tr
            .find("td")
            .eq(1)
            .text()
            .replace("Puntos", "");
          ///multiplicar el precio unitario * cantidad
          var sub_total = parseFloat(precio_unitario) * cantidad;
          //obtener el resultado y pintarlo
          tr.find("td")
            .eq(3)
            .html("<strong>" + sub_total + " Puntos</strong");
          $button.parent().find("input").val(newVal);
          ///////////////////////////////////////////////////////
          var Puntostotal = 0;
          $(`#tbl_id tbody .products-${i}`).each(function () {
            var precio_unitario = parseFloat(
              $(this).find("td").eq(3).text().replace("Puntos", "")
            );
            // console.log(precio_unitario);
            // si precio_unitario comple con alguna de estas condiciones su valor es 0
            precio_unitario =
              precio_unitario == null ||
              precio_unitario == undefined ||
              precio_unitario == "" ||
              precio_unitario < 1
                ? 0
                : precio_unitario;
            Puntostotal = parseFloat(Puntostotal) + parseFloat(precio_unitario);
          });
          $(`.points-${i}`).html(`${Puntostotal}`);
        });
      });
    }
  });
});
$(document).on("click", ".checkout", function (e) {
  // e.preventDefault();
  var puntos_client = parseInt(
    $(".content-total-points-cart_ttrq").find("h4").find("span").text()
  );
  var puntostotal = parseInt($(this).find("span").text());
  if (puntos_client < puntostotal) {
    e.preventDefault();
    Swal.fire({
      icon: "warning",
      title: "Oops...",
      text: "Usted no cuenta con puntos suficientes.",
    });
  } else {
    var idStore = $(this).find("span").attr("class").replace("points-", "");
    var name_store = $(this).parent().parent().parent().find("h3").text();
    var total = parseInt($(this).find("span").text());
    store = [];
    store.push({
      idStore,
      name_store,
      total,
    });
    $(".Cls-tblistm tr").each(function (i, v) {
      if ($(this).attr("class") == `products-${idStore}`) {
        var precio_real = $(this).find("td").eq(1).find("strong").text();
        var idProd = $(this).find("td").eq(2).find("input").val();
        var name = $(this).find("td").eq(0).find("span").text();
        var cantidad = $(this).find("td").eq(2).find("div").find("input").val();
        var puntos = parseInt(
          $(this).find("td").eq(3).text().replace("Puntos", "")
        );
        // console.log(precio_real);
        store.push({
          idStore,
          name,
          cantidad,
          precio_real,
          puntos,
          idProd,
        });
      }
    });
    // console.log(idStore);
    $(".cls-check-arr").val(JSON.stringify(store));
    // console.log(store);
  }
});
$(document).on("click", ".delete-store", function () {
  var store_id = $(this).attr("data");
  var storecart = $(`#table-list-product #cart-store`).length;

  $.ajax({
    url: "./php/process_delete_store.php",
    method: "POST",
    data: { tienda: store_id },
  }).done((e) => {
    // console.log(e);
    listProductsIntoCart();

    if (storecart - 1 == 0) {
      $("#table-list-product").html(`
      <tr class="content-msg-cart-empty_ttrq">
       <td colspan="5">
         <div>
           <i class="fal fa-frown-open"></i>
           <h5>Upps!, No tienes productos en el carrito.</h5>
         </div>
       </td>
     </tr>
    `);
    } else {
      $(`.ctn-store-${store_id}`).remove();
      $(`.products-${store_id}`).remove();
      $(`#store-delete-${store_id}`).remove();
    }
  });
});

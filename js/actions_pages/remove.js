$(document).on("click", ".icon-trash-product", function (e) {
  var tienda = $(this).data("tienda");
  var producto = $(this).data("producto");
  console.log(producto);
  listProductsIntoCart();
  $.ajax({
    url: "./php/process_prduct_cart_delete.php",
    method: "POST",
    dataType: "JSON",
    data: { producto: producto },
  }).done((e) => {
    console.log(e);
    var count = $(`#tbl_id tbody .products-${tienda}`).length;
    listProductsIntoCart();
    var storecart = $(`#table-list-product #cart-store`).length;
    if (storecart == 0) {
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
    }else if (count - 1 == 0) {
      $(`.ctn-store-${tienda}`).remove();
      $(`.products-${tienda}`).remove();
      $(`#store-delete-${tienda}`).remove();
    } else {
      
      $(this).parent().parent().remove();
    }
    var quitar = parseInt(
      $(this).parent().parent().find("td").eq(3).text().replace("Bikers", "")
    );
    var res = parseInt($(`.points-${tienda}`).text());
    var total = res - quitar;
    $(`.points-${tienda}`).html(`${total}`);
    var vacio = parseInt($(`.points-${tienda}`).text());
    if (vacio == 0) {
      $(`.ctn-store`).remove();
      // $(".delete-store").attr(`${tienda}`).remove();
      $(`#store-delete`).remove();
    }
  });
});
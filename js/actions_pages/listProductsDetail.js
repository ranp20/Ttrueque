$(document).ready(function () {
	var idprodu = $("#idproductdet").val();
	var idcliente = $('#userid_cli').val();
  var idstore = $('#tiendaid_cli').val();

  $.ajax({
    url: "./php/class/list_product_detail.php",
    method: "POST",
    dataType: "JSON",
    data: { idprod: idprodu },
  }).done(function (res) {

    $.each(res, function (i, v) {
      var path = "../../Ttrueque/shop/folder/" + v.imagen;
      var path_store = "../../Ttrueque/shop/images/store/" + v.logo;
      var idtienda_cli = v.id_tienda;

      if(idtienda_cli == idstore){

        $("#detailprod_ttrq").html(`
          <div class="content-c-primary_d-p_ttrq">
            <div class="contain-l-to-prod-detail">
              <figure class="content-img-prod-detail">
                <img loading='lazy' class='img-fluid' src='${path}' alt=''>
              </figure>
            </div>
            <div class="contain-r-to-prod-detail">
              <h1>${v.nombre_producto}</h1>
              <div class="contain-lr-in-detail-prod">
                <div class="content-l-info-product-det">
                  <p><span>${v.precio_producto}</span><span> Bikers </span></p> 
                  <!--<h2><span>Color: </span><span> Negro </span></h2>-->
                  <!--<div class="content-r-quant-prod-detail">
                    <h2>Cantidad: </h2>
                    <div class="cont-r-qua-p-detail">
                      <button class="btn_inc">-</button>
                        <input class="input-valu" type="text" value="0">
                      <button class="btn_inc">+</button>
                    </div>
                  </div>-->
                  <div class="cont-list-images-product">
                    <ul>
                      <li>
                        <a href="javascript:void(0);">
                          <div>
                            <div style="background-image: url(${path});"></div>
                          </div>
                        </a>
                      </li>
                    </ul>
                  </div>  
                </div>

              </div>
            </div>
          </div>
          <div class="content-c-secondary_d-p_ttrq">
            <div class="cont-title">
              <h1>Descripción General</h1>
            </div>
            <div class="cont-desc-product">${v.descripcion_producto}</div>
          </div>
        `);
      }else{
        $("#detailprod_ttrq").html(`
  				<div class="content-c-primary_d-p_ttrq">
  					<div class="contain-l-to-prod-detail">
              <figure class="content-img-prod-detail">
                <img loading='lazy' class='img-fluid' src='${path}' alt=''>
              </figure>
            </div>
  					<div class="contain-r-to-prod-detail">
  						<h1>${v.nombre_producto}</h1>
  						<div class="contain-lr-in-detail-prod">
  							<div class="content-l-info-product-det">
  								<p><span>${v.precio_producto}</span><span> Bikers </span></p>	
  								<!--<h2><span>Color: </span><span> Negro </span></h2>-->
  								<!--<div class="content-r-quant-prod-detail">
  									<h2>Cantidad: </h2>
  									<div class="cont-r-qua-p-detail">
  										<button class="btn_inc">-</button>
  										  <input class="input-valu" type="text" value="0">
  										<button class="btn_inc">+</button>
  									</div>
  								</div>-->
  								<div class="cont-list-images-product">
  									<ul>
  										<li>
  											<a href="javascript:void(0);">
  												<div>
  													<div style="background-image: url(${path});"></div>
  												</div>
  											</a>
  										</li>
  									</ul>
  								</div>	
  							</div>
  							<div class="content-r-buy-product-det">
  								<a href="#0"  class="button_add_cart_detail-prod"
  									attr_name='${v.nombre_producto}'
                    attr_price='${v.precio_producto} '
                    attr_store_id='${v.id_tienda}'
                    attr_store_name='${v.nombre_tienda}'
                    attr_image='${path}'
                    attr_store_logo='${path_store}'
                    attr_count=1 
                    attr_id='${v.id_producto}'
                    attr_idclient='${idcliente}'		
  								
  								>AÑADIR AL CARRITO
                  <img src='./img/iconos_home/index-sidebar-car-car.svg' alt=''>
                  </a>
  							</div>
  						</div>
  					</div>
  				</div>
  				<div class="content-c-secondary_d-p_ttrq">
  					<div class="cont-title">
  						<h1>Descripción General</h1>
  					</div>
  					<div class="cont-desc-product">${v.descripcion_producto}</div>
  				</div>
  			`);

      }

    });
  });
});

// $(document).on("click", `.btn_inc`, function () {
//   var button = $(this);
//   var beforeval = button.parent().find("input").val();
//   var suma = parseInt(beforeval);

//   if (button.text() == "+") {
//     var newVal =  suma + 1;
  
//     button.parent().find("input").val(newVal);
//   } else {
//     if(suma > 1){
//       newVal = suma - 1;
//       button.parent().find("input").val(newVal);
//     } else {
//       newVal = 0;
//     }
//   }
// });

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

$(document).on("click", ".button_add_cart_detail-prod", function (e) {
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
        //console.log(result);
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
    data: { client: client },
  }).done(function (res) {
    $("#count-product-cart").html(res.length);
    $.each(res, function (i, v) {
      var path = "./shop/folder/" + v.image;

      $("#cart-buy-list").append(`
        <li>
          <div class="content-info-p-prods">
            <div>
              <div class="cont-img-p-prod">
                <div class='img-fluid' style="background-image: url(${path});"></div>
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
};
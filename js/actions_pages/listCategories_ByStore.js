// function characterReplace(nombre){
//   return nombre.replace(/"%C3%A9"/g, "é").replace(/"%C3%AD"/g, "í");
//   return document.write("<?php mb_convert_encoding("+nombre+", 'utf-8', 'ISO-8859-1'); ?>")
// }

$(document).ready(function () {
  var tienda = $("#store_cli").val();

  if (tienda != "") {
    $.ajax({
      url: "./php/class/list_cat_nom_tienda.php",
      dataType: "JSON",
      method: "POST",
      contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
      data: { tienda: tienda },
    }).done(function (res) {
      if (res.length == 0) {
        $("#list_cat_cli_store").html(`
           <div class="content-msg-any-categs-into-store">
            <div>
              <i class="fal fa-sad-tear fa-4x"></i>
              <h1>Aún no hay categorías disponibles para esta tienda</h1>
              <a href="categorias">Ver todas las categorías</a>
            </div>
          </div>
         `);
      } else {
        $("#cart-buy-list").html("");
        $.each(res, function (i, v) {

          $("#list_cat_cli_store").append(
            `
          <li class="item-categ-stores-into">
            <a href="productos?store=${v.tienda}&cat=${v.nombre_categoria}" class="item-cont-categ-stores"> 
              <div class="cont-logo-categories-str-b-ttrk">
                <div   class="logo-categ-str-c-ttrk img-fluid" style="background-image: url(../../Ttrueque/admin/images/categoria/${v.imagen}"></div>
              </div>
              <div class="cont-info-categ-stores-b-ttrk">
                <div>
                  <p>${v.nombre_categoria}</p>
                  <p>${v.tienda}</p>
                  <!--<p class="tooltip-categ-stores">
                    <i class="fal fa-calendar-alt"></i>Hoy, 9pm
                  </p>-->
                </div>
              </div>
            </a>
          </li>
          `
          );
        });
      }
    });
  } else {
    location.replace("./");
  }
});

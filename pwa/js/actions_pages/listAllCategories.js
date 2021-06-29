$(document).ready(function () {
  $.ajax({
    dataType: "JSON",
    contentType: "application/x-www-form-urlencoded;charset=UTF-8",
    url: "./php/class/list_categories.php",
  }).done(function (res) {
    $.each(res, function (i, v) {
      var cadena = v.nombre_categoria;
      url = cadena.replace(/" "/g, "-");
      //console.log(url);
      var path = "../admin/images/categoria/" + v.imagen_categoria;
      $("#lista_categories").append(
        `
    <li class="item-categ-stores-into">
      <a href="./tienda?tipos=${url}" class="item-cont-categ-stores"> 
        <div class="cont-logo-categories-str-b-ttrk">
          <div class="logo-categ-str-c-ttrk" style="background-image: url(${path});"></div>
        </div>
        <div class="cont-info-categ-stores-b-ttrk">
          <div>
            <p>${v.nombre_categoria}</p>
          </div>
        </div>
      </a>
    </li>
    `
      );
    });
  });
});

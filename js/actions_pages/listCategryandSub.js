$(document).ready(function () {
  listarCat();
  listarSubcat();
});

function listarCat() {
  $.ajax({
    dataType: "JSON",
    url: "../php/class/cargar_categorias.php",
  }).done(function (res) {
    $("#list_categories").append(`
                  <option value="0">Selecciona la Categoría</option>
                    `);
    //Listar las categorías...
    $.each(res, function (i, v) {
      $("#list_categories").append(
        `<option value="${v.id_categoria}">${v.nombre_categoria}</option>`
      );
    });
  });
}

function listarSubcat() {
  $("#list_categories").change(function () {
    var cboCat = $(this).val();
    $.ajax({
      method: "POST",
      dataType: "JSON",
      url: "../php/class/cargar_subcategorias.php",
      data: {
        subcategoria: cboCat,
      },
    }).done(function (res) {
      $("#list_subcategories").html("");
      //Listar las subcategorías...
      $.each(res, function (i, v) {
        $("#list_subcategories").append(
          `<option value="${v.id_subcategoria}">${v.nombre_subcategoria}</option>`
        );
      });
    });
  });
}

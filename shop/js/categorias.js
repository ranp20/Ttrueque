$(function () {
  list_category_idtienda();
  add_category_idtienda();
  delete_category_idtienda();
  list_Categories();
});

var tienda = $("#tienda").val();

//LISTAR CATEGORÍAS POR ID...
function list_category_idtienda() {
  $.ajax({
    url: "../shop/ajax/list_categoria_idtienda.php",
    dataType: "JSON",
    method: "POST",
    data: { tienda: tienda },
  }).done(function (res) {
    // console.log(res);
    if (res != "") {
      $.each(res, function (i, v) {
        $("#totalList_categories").html(res.length);
        $("#list_categories_tienda").append(`
          <tr  id='tr-${v.id}'>
  		      <td>${v.id}</td>
  		      <td>${v.nombre_categoria}</td>
  		      <td><button class="btn-delete-product" id="btn-delete-categoria" data-eliminar='${v.id}'>Eliminar</button></td>
  		    </tr>
          `);
      });
    } else {
      $("#list_categories_tienda").append(`
        <tr class="cont-mgs-any-registers_cat">
          <td colspan="4">
            <div class="content-any-data-categorias">
              <i class="lni lni-emoji-speechless"></i>
              <h1>Aún no tienes categorías agregadas</h1>
            </div>
          </td>
        </tr>
      `);
    }
  });
}
//AGREGAR CATEGORíAS...
function add_category_idtienda() {
  $(document).on("click", "#btn-add-categoria_tienda", function (e) {
    e.preventDefault();
    var categoria = $("#categories_list_admin").val();
    if (categoria > 0 && tienda > 0) {
      $.ajax({
        url: "../shop/ajax/add-categorias.php",
        method: "POST",
        data: { id_categoria: categoria, id_tienda: tienda },
      }).done((e) => {
      
      Swal.fire({
        icon: "success",
        title: "Agregado",
        text: "Se agregó correctamente",
        showConfirmButton: false,
        timer: 1800,
      });

        var result = JSON.parse(e);      
        if (result[0]["res"] == "existe") {
          alert("Esta categoría ya existe");
          $("#list_categories_tienda").html("");
          list_category_idtienda();
        } else {
          $(".cont-mgs-any-registers_cat").remove();
          var a = $("#totalList_categories").text();
          var count = parseInt(a) + 1;
          $("#totalList_categories").text(count);
          var res = JSON.parse(e);
          $.each(res, function (i, v) {
            $("#list_categories_tienda").append(
              `<tr id='tr-${v.id}'>
  		        <td>${v.id}</td>
  		        <td>${v.nombre_categoria}</td>
  		        <td><button class="btn-delete-product" id="btn-delete-categoria" data-eliminar='${v.id}'>Eliminar</button></td>
  		      </tr>`
            );
          });
        }
      });
    } else {
      Swal.fire({
        icon: "warning",
        title: "Agregar Categorías",
        text: "Ningúna categoría agregada",
        showConfirmButton: false,
        timer: 2000,
      });
    }
  });
}

//ELIMINAR CATEGORÍAS...
function delete_category_idtienda() {
  $(document).on("click", "#btn-delete-categoria", function () {
    var a = $("#totalList_categories").text();
    var count = parseInt(a) - 1;
    $("#totalList_categories").text(count);
    var eliminar = $(this).data("eliminar");
    $.ajax({
      url: "../shop/ajax/delete_categorias.php",
      type: "POST",
      data: { id: eliminar },
    }).done(function (res) {
      $("#list_categories_tienda").html("");
      list_category_idtienda();
      $("#tr-" + eliminar).html(
        "<td style='text-align:center;background:#F7D8DB;color:#6F1E26;font-weight:bold;' colspan='100%'>Eliminando...</td>"
      );
      function listo() {
        $("#tr-" + eliminar).remove();
      }
      setTimeout(listo, 2000);
    });
  });
}
//LISTAR CATEGORÍAS PARA AGREGAR PRODUCTOS...
function list_Categories() {
  $.ajax({
    url: "../shop/ajax/list_categoria_idtienda.php",
    type: "POST",
    dataType: "JSON",
    data: { tienda: tienda },
  }).done(function (res) {
    $("#list_categories").append(`
                  <option value="0">Selecciona la Categoría</option>
                    `);
    //Listar las categorías...
    $.each(res, function (i, v) {
      $("#list_categories").append(
        `<option value="${v.id}">${v.nombre_categoria}</option>`
      );
    });
  });
}

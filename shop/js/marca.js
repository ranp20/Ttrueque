$(function () {
  ChangesViewsCyM();
  list_marcas_idtienda();
  add_marcas_idtienda();
  delete_marcas_idtienda();
  list_Trademarks();
});
var tiendas = $("#tienda").val();

  //CAMBIO DE VISTA - MARCAS & CATEGORÍAS...
function ChangesViewsCyM() {
  var linksParent = $(".btns-options-trademarks-categories");
  var links = linksParent.find("a");
  var items = $(".contents_items_t-c-dinamic");
  var titles = $("#titles-dinamic-t-c");

  links.eq(0).add(items.eq(0)).addClass("active");
  var estadoTitle = false;

  linksParent.on("click", "a", function () {
    var t = $(this);
    var ind = t.index();
    t.add(items.eq(ind)).addClass("active").siblings().removeClass("active");
    if (t.index() == 0) {
      titles.text("Marcas");
    } else {
      titles.text("Categorías");
    }
  });
}
//LISTAR MARCAS POR ID...
function list_marcas_idtienda() {
  $.ajax({
    url: "../shop/ajax/list_marca_idtienda.php",
    dataType: "JSON",
    method: "POST",
    contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
    data: { tienda: tiendas },
  }).done(function (res) {
    if(res != ""){
      $.each(res, function (i, v) {
      $("#totalList").html(res.length);
      $("#list").append(`
        <tr id='tr-${v.id}'>
          <td>${v.id}</td>
          <td>${v.nombre_marca}</td>
          <td><button class="btn-delete-product" id="btn-delete-marca" data-eliminar='${v.id}'  >Eliminar</button></td>
        </tr>
        `);
      });
    }else{
      $("#list").append(`
        <tr class="cont-mgs-any-registers-m">
          <td colspan="4">
            <div class="content-any-data-marcas">
              <i class="lni lni-emoji-speechless"></i>
              <h1>Aún no tienes marcas agregadas</h1>
            </div>
          </td>
        </tr>
      `);
    }
  });
}

//AGREGAR MARCAS...
function add_marcas_idtienda() {
  $(document).on("click", "#btn-add-marca", function (e) {
    e.preventDefault();
    var nombre = $("#name").val();
    if (nombre != "" && tiendas != "") {
      $.ajax({
        url: "../shop/ajax/add-marca.php",
        method: "POST",
        data: { name: nombre, tienda: tiendas },
      }).done((e) => {

      Swal.fire({
        icon: "success",
        title: "Agregado",
        text: "Se agregó correctamente",
        showConfirmButton: false,
        timer: 1800,
      });

        $('.cont-mgs-any-registers-m').remove();
        var a = $("#totalList").text();
        var count = parseInt(a) + 1;
        $("#totalList").text(count);
        var res = JSON.parse(e);
        $("#name").val("");
        $.each(res, function (i, v) {
          $("#list").append(
            `<tr  id='tr-${v.id}'>
              <td>${v.id}</td>
              <td>${v.nombre_marca}</td>
              <td><button class="btn-delete-product" id="btn-delete-marca" data-eliminar='${v.id}'  >Eliminar</button></td>
            </tr>`
          );
        });
      });
    } else {
      Swal.fire({
        icon: "warning",
        title: "Agregar Marcas",
        text: "Ningúna marca agregada",
        showConfirmButton: false,
        timer: 2000,
      });
    }
  });
}
//ELIMINAR MARCAS...
function delete_marcas_idtienda() {
  $(document).on("click", "#btn-delete-marca", function () {
    var a = $("#totalList").text();
    var count = parseInt(a) - 1;
    $("#totalList").text(count);

    var eliminar = $(this).data("eliminar");

    $.ajax({
      url: "../shop/ajax/delete_marca.php",
      type: "POST",
      data: { id: eliminar },
    }).done(function (res) {

      $('#list').html('');
      list_marcas_idtienda();
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
function list_Trademarks() {
  $.ajax({
    url: "../shop/ajax/list_marca_idtienda.php",
    type: "POST",
    dataType: "JSON",
    contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
    data: { tienda: tiendas },
  }).done(function (res) {
    $("#marca").append(`
                  <option value="0">Selecciona la Marca</option>
                    `);
    //Listar las categorías...
    $.each(res, function (i, v) {
      $("#marca").append(`<option value="${v.id}">${v.nombre_marca}</option>`);
    });
  });
}

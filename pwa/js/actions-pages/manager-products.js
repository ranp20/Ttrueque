$(document).ready(function(){
  $('#imgs-select').change(function(){
    if($(this).val() == 1){
      $('#moreimgs').html(`
        <div class="content-add-more-imgs">
          <input type="file" class="imgs-prod" name="images[]" multiple accept="img/*">
        </div>  
      `);
    }else{
      $('#moreimgs').html("");
    }
  });
});

$(document).on("click", "#btn-product", function (e) {
  e.preventDefault();

  $('#form-product').each(function(){
    $(this).find('input').each(function(){
      var inputs = $(this);
      
      if(inputs.val().length <= 0){
        Swal.fire({
          icon: "error",
          title: "Atención",
          text: "Uno o varios campos vacíos",
          showConfirmButton: false,
          timer: 2400,
        });
        return false;
      }else{
        console.log('Campos Llenados:'+' '+inputs.val().length);
        return true;
      }
    });
  });

  var formData = new FormData();
  var filesLength = $(".imgs")[0].files.length;
  for (var i = 0; i < filesLength; i++) {
    formData.append("imagen", $(".imgs")[0].files[i]);
  }

  var desc = CKEDITOR.instances["ckeditor"].getData();

  formData.append("tienda", $("#tienda").val());
  formData.append("name", $("#name").val());
  formData.append("categoria", $("#list_categories").val());
  formData.append("marca", $("#marca").val());
  formData.append("pais", $("#pais").val());
  formData.append("stock", $("#stock").val());
  formData.append("precio", $("#precio").val());
  formData.append("desc", desc);
  
  //console.log(formData);
  $.ajax({
    url: "../shop/ajax/register-product.php",
    method: "POST",
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
  }).done((e) => {
     console.log(e);
    var resul = JSON.parse(e);
    // console.log(resul);
    if (resul["res"] == "inserto") {
      $("#form-product")[0].reset();
      //console.log(resul[0]);
      Swal.fire({
        icon: "success",
        title: "Éxito",
        text: "Agregado Correctamente",
        showConfirmButton: false,
        timer: 1400,
      });
      CKEDITOR.instances["ckeditor"].setData('');
      window.location.replace("manager-products.php");
    } else if (resul["res"] == "agotado") {
      Swal.fire({
        title: "Error",
        text: "Membresía acabada, vuelva a recargar",
        icon: "error",
        confirmButtonText: "Cerrar",
      });
    } else {
      //console.log(formData);
      alert("No insertó");
    }
  });
});

$(document).ready(function () {
  var tienda = $("#tienda").val();

  $.ajax({
    url: "../shop/ajax/listar-product.php",
    dataType: "JSON",
    method: "POST",
    data: { tienda: tienda },
  }).done(function (res) {
    if (res.length == []) {
      $("#totalList").html(0);
      $("#list").append(`
        <tr>
          <td colspan="9">
            <div class="content-any-data-products">
              <i class="lni lni-emoji-speechless"></i>
              <h1>No se encontraron Productos</h1>
            </div>
          </td>
        </tr>
      `);
    } else {
      $.each(res, function (i, v) {
        $("#totalList").html(res.length);
        
        var descript = v.descripcion_producto;
        
        var limite = (descript.length >= 50) ? descript.substring(50, 0) + "..." : descript;

        $("#list").append(
          `<tr  id='tr-${v.id_producto}'>
            <td></td>
            <td>${v.nombre_categoria}</td>
            <td>${v.nombre_marca}</td>
            <td>${v.nombre_producto}</td>
            <td>${limite}</td>
            <td>${v.precio_producto}</td>
            <td>${v.stock_producto}</td>
            <td><a href='../shop/folder/${v.imagen}' target=_blank><img src="../shop/folder/${v.imagen}" class='img-list_adcli'></a></td>
            <td><a class="btn-update-product " href="manager-update-products.php?id=${v.id_producto}">Editar</a></td>
            <td><button class="btn-delete-product" id="btn-delete-product" data-eliminar='${v.id_producto}'  >Eliminar</button></td>
          </tr>`
        );
      });
    }
  });
});

$(document).on("click", "#btn-delete-product", function () {
  var a = $("#totalList").text();
  var count = parseInt(a) - 1;
  $("#totalList").text(count);

  var eliminar = $(this).data("eliminar");

  $.ajax({
    url: "../shop/ajax/delete_product.php",
    type: "POST",
    data: { id: eliminar },
  }).done(function (res) {
    $("#tr-" + eliminar).html(
      "<td style='text-align:center;background:#F7D8DB;color:#6F1E26;font-weight:bold;' colspan='100%'>Eliminando...</td>"
    );
    function listo() {
      $("#tr-" + eliminar).remove();
    }
    setTimeout(listo, 2000);
  });
});

$(document).ready(function(){
  $.ajax({
    url: "../shop/ajax/sel_default_description.php",
    dataType: "JSON",
    type: "POST",
  }).done(function (res){
    //console.log(res);
    $.each(res, function(i, v){
      CKEDITOR.instances["ckeditor"].setData(v.descripcion_default);
    });
  });
});

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
$(document).on("submit", "#form-product", function (e){
  e.preventDefault();

  $(this).attr("disabled", "disabled");
  $(this).addClass("disabled");
  var namevaluesinputs = {};
  $('#form-product').each(function(){
    $(this).find('input').each(function(){
      
    namevaluesinputs[this.name] = this.value;
      //Recorrer los inputs y obtener el name
      /*for(var i = 0;i < inputs.length; i++){
        var namesinputs = inputs[i].name;
        console.log(namesinputs);
      }
      
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
        //console.log('Campos Llenados:'+' '+inputs.val().length);
        return true;
      }*/

    });
    console.log(namevaluesinputs);
  });


  var formData = new FormData();
  var filesLength = $(".imgs")[0].files.length;
  for (var i = 0; i < filesLength; i++) {
    formData.append("imagen", $(".imgs")[0].files[i]);
  }

  //var desc = CKEDITOR.instances["ckeditor"].getData();

  formData.append("tienda", $("#tienda").val());
  formData.append("name", $("#name").val());
  formData.append("categoria", $("#list_categories").val());
  formData.append("marca", $("#marca").val());
  formData.append("pais", $("#pais").val());
  formData.append("stock", $("#stock").val());
  formData.append("precio", $("#precio").val());
  formData.append("desc", $("#desc").val());
  
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
    /*
    var resul = JSON.parse(e);
    if(resul["res"] == "inserto"){
      $("#form-product")[0].reset();
      //console.log(resul[0]);
      Swal.fire({
        icon: "success",
        title: "Éxito",
        text: "Agregado Correctamente",
        showConfirmButton: false,
        timer: 1400,
      });
      //CKEDITOR.instances["ckeditor"].setData('');
      window.location.replace("../shop/products_v.php");
      $(this).removeAttr("disabled");
      $(this).removeClass("disabled");
    }else if(resul["res"] == "agotado"){
      Swal.fire({
        title: "Error",
        text: "Membresía acabada, vuelva a recargar",
        icon: "error",
        confirmButtonText: "Cerrar",
      });
      $(this).removeAttr("disabled");
      $(this).removeClass("disabled");
    }else{
      //console.log(formData);
      alert("No insertó");
      $(this).removeAttr("disabled");
      $(this).removeClass("disabled");
    }
    */
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
            <td>${v.marca_producto}</td>
            <td>${v.nombre_producto}</td>
            <td>${limite}</td>
            <td>${v.precio_producto}</td>
            <td>${v.stock_producto}</td>
            <td>
              <a href='./folder/${v.imagen}' target=_blank>
                <img src="./folder/${v.imagen}" class='img-list_adcli'>
              </a>
            </td>
            <td>
              <a class="btn-update-product " href="./update_product.php?id=${v.id_producto}">
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="29px" height="29px" version="1.1" viewBox="0 0 700 700"><g xmlns="http://www.w3.org/2000/svg"><path d="m424.66 337.31v129.36h-261.32v-261.32h130.66l36.004-37.336h-166.67c-20.547 0-37.336 16.805-37.336 37.336v261.32c0 20.523 16.789 37.336 37.336 37.336h261.32c20.531 0 37.336-16.812 37.336-37.336v-166.68z"/><path d="m568.56 114.25-52.793-52.809c-7.2539-7.2539-19.141-7.2539-26.395 0l-194.38 194.37-19.672 98.855 98.855-19.656 194.37-194.37c7.2617-7.25 7.2617-19.137 0.007813-26.391zm-212.77 186.35-32.938 6.5625 6.5469-32.957 173.18-173.16 26.395 26.395z"/></g></svg>
                </span>
              </a>
            </td>
            <td>
              <button class="btn-delete-product" id="btn-delete-product" data-eliminar='${v.id_producto}'>
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="23px" version="1.1" viewBox="0 0 700 700"><path d="m525 506.2c0 10.359-7.9453 18.793-17.711 18.793h-314.58c-9.7656 0-17.711-8.4336-17.711-18.793v-401.21h350zm-286.68-471.21h223.37l17.5 35h-258.37zm374.18 35c9.6602 0 17.5 7.8398 17.5 17.5s-7.8398 17.5-17.5 17.5h-52.5v401.21c0 29.68-23.66 53.793-52.711 53.793h-314.58c-29.086 0-52.711-24.113-52.711-53.793v-401.21h-52.5c-9.6602 0-17.5-7.8398-17.5-17.5s7.8398-17.5 17.5-17.5h94.184l30.172-60.34 0.14062 0.10547c2.9023-5.7383 8.6797-9.7656 15.504-9.7656h245c6.8242 0 12.602 4.0273 15.504 9.7656l0.14062-0.10547 30.172 60.34zm-262.5 105c-9.6602 0-17.5 7.8398-17.5 17.5v245c0 9.6602 7.8398 17.5 17.5 17.5s17.5-7.8398 17.5-17.5v-245c0-9.6602-7.8398-17.5-17.5-17.5zm-87.5 0c-9.6602 0-17.5 7.8398-17.5 17.5v245c0 9.6602 7.8398 17.5 17.5 17.5s17.5-7.8398 17.5-17.5v-245c0-9.6602-7.8398-17.5-17.5-17.5zm175 0c-9.6602 0-17.5 7.8398-17.5 17.5v245c0 9.6602 7.8398 17.5 17.5 17.5s17.5-7.8398 17.5-17.5v-245c0-9.6602-7.8398-17.5-17.5-17.5z" fill-rule="evenodd"/></svg>
                </span>
              </button>
            </td>
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

// $(document).ready(function(){
//   $.ajax({
//     url: "../shop/ajax/sel_default_description.php",
//     dataType: "JSON",
//     type: "POST",
//   }).done(function (res){
//     //console.log(res);
//     $.each(res, function(i, v){
//       CKEDITOR.instances["ckeditor"].setData(v.descripcion_default);
//     });
//   });
// });

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
$(document).ready(function () {
  var prod = $("#prod").val();
  $.ajax({
    url: "../shop/ajax/select_product_id.php",
    dataType: "JSON",
    method: "POST",
    contentType: "application/x-www-form-urlencoded;charset=utf-8",
    data: { prod: prod },
  }).done(function (res) {
    console.log(res);
    $.each(res, function (i, v) {
      $("#name").val(v.nombre_producto);
      $("#list_categories").val(v.id_categoria);
      $("#marca").val(v.marca_producto);
      $("#pais").val(v.id_pais);
      $("#stock").val(v.stock_producto);
      $("#precio").val(v.precio_producto);
      $(
        "#imgSrc"
      ).html(` 
        <img src="./folder/${v.imagen}" />     
      `);
      $("#imgitp").val(v.imagen);
      CKEDITOR.instances["ckeditor"].setData(v.descripcion_producto);
    });
  });
});

$(document).on("click", "#btn-product-update", function (e) {
  e.preventDefault();
let a=$("#form-product").serialize();

  var formData = new FormData();
  var filesLength = $(".imgs")[0].files.length;

  for (var i = 0; i < filesLength; i++) {
    formData.append("imagen", $(".imgs")[0].files[i]);
  }

  var desc = CKEDITOR.instances["ckeditor"].getData();
  formData.append("prod", $("#prod").val());
  formData.append("name", $("#name").val());
  formData.append("categoria", $("#list_categories").val());
  formData.append("subcategoria", $("#list_subcategories").val());
  formData.append("marca", $("#marca").val());
  formData.append("pais", $("#pais").val());
  formData.append("stock", $("#stock").val());
  formData.append("precio", $("#precio").val());
  formData.append("desc", desc);
  formData.append("imagen", $("#imgitp").val());
  $.ajax({
    url: "../shop/ajax/update_product.php",
    method: "POST",
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
  }).done((e) => {
    if (e == "updated") {
      Swal.fire({
        icon: "success",
        title: "Actualizado",
        text: "Producto Actualizado",
        showConfirmButton: false,
        timer: 1500,
      });
      window.location.replace("../shop/products_v.php");
    } else {
      alert("error al actualizar");
    }
  });
});
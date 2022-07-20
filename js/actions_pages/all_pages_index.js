(() => {
  list_allNumberOrders();
});
// ABRIR/CERRAR SIDEBAR LEFT
$(document).on("click",".menu-nav-burger-index",function(){$("#navbarSupportedContent").toggleClass("open");});
// ------------ BUSCAR POR CATEGORÍAS
function search_ByNameCategory(search){
  var prod = $("#caja_busqueda_primary").val();
  $.ajax({
    url: "./php/process_user_search.php",
    method: "POST",
    dataType: "JSON",
    data: { product: prod },
  }).done((e) => {
    $(".c-contentSearchTtrq--cont").html("");
    if(e == "[]" || e == ""){
      $(".c-contentSearchTtrq--cont").removeClass("searching");
    }else{
      $(".c-contentSearchTtrq--cont").addClass("searching");
      $.each(e, function (i, v) {
        $(".c-contentSearchTtrq--cont").append(`
          <ul>
            <li>
              <a href="./tienda?tipos=${v.nombre_categoria}">${v.nombre_categoria}</a>
            </li>
          </ul>`);
      });
    }
  });
}
// ------------ BUSCADOR EN TIEMPO REAL
$(document).on("keyup keypress","#caja_busqueda_primary", (e) => {
  let val = e.target.value;
  if(e.which == '13'){
    e.preventDefault();
  }else{
    if(val != ""){
      search_ByNameCategory(val);
    }else{
      search_ByNameCategory(val);
    }
  }
});
// ------------ HACER FOCO EN EL BUSCADOR
$(document).on("focus","#caja_busqueda_primary",function(){search_ByNameCategory();});
// ------------ LISTAR EL NÚMERO DE ORDENES
function list_allNumberOrders(){
  let idclient = $("#userid_cli").val();
  $.ajax({
    url: "./php/list-track-order.php",
    method: "POST",
    dataType: "JSON",
    data: { idcliente : idclient},
  }).done((e) => {
    console.log(e.length);
    if(e == "" || e == "[]"){
      console.log('No hay pedidos');
    }else{
      console.log(e);
    }
    $("#count-trackorder").text(e.length);
  });
}
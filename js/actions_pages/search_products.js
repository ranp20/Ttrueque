$("#caja_busqueda_primary").keyup(function (e) {
  clearTimeout($.data(this, "timer"));
  if ($(this).val() == "") {
    $(".c-contentSearchTtrq--cont").hide();
  } else {
    if (e.keyCode == 13) search(true);
    else $(this).data("timer", setTimeout(search, 100));
  }
});
function search(force) {
  var prod = $("#caja_busqueda_primary").val();
  if (!force && prod.length < 2) return;
  $.ajax({
    url: "./php/process_user_search.php",
    method: "POST",
    dataType: "JSON",
    data: { product: prod },
  }).done((res) => {
    $(".c-contentSearchTtrq--cont").show();
    $(".c-contentSearchTtrq--cont").html("");

    if(res == [] || res == ""){
      $(".c-contentSearchTtrq--cont").css({"paddingTop" : "0","paddingBottom" : "0"});      
    }else{
      $.each(res, function (i, v) {
        $(".c-contentSearchTtrq--cont").css({"paddingTop" : ".5rem","paddingBottom" : ".5rem"});
        $(".c-contentSearchTtrq--cont").append(`
          <ul>
            <li>
              <a href="productos?categoria=${v.nombre_categoria}">${v.nombre_categoria}</a>
            </li>
          </ul>`);
      });
    }
  });
}

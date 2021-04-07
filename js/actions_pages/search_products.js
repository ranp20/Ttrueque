$("#caja_busqueda_primary").keyup(function (e) {
  clearTimeout($.data(this, "timer"));
  if ($(this).val() == "") {
    $(".container-search").hide();
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
    $(".container-search").show();
    $(".container-search").html("");

    if(res == [] || res == ""){
      $(".container-search").css({
        "paddingTop" : "0",
        "paddingBottom" : "0"
      });      
    }else{
      $.each(res, function (i, v) {
        $(".container-search").css({
          "paddingTop" : ".5rem",
          "paddingBottom" : "1rem"
        });
        $(".container-search").append(`
          <ul>
            <li>
              <a href="productos?categoria=${v.nombre_categoria}">${v.nombre_categoria}</a>
            </li>
          </ul>`);
      });
    }
  });
}

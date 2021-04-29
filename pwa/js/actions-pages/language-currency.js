$(document).ready(function () {
  //   console.log("hola");
  if (!localStorage.getItem("lang")) {
    localStorage.setItem("lang", "es");
  }
  $.getJSON(
    "js/actions-pages/lang/" + localStorage.getItem("lang") + ".json",
    function (json) {
      //   console.log(json);
      let get = localStorage.getItem("lang");
      $(".lang_ttrq").each(function (i, value) {
        $(this).text(json[get][$(this).attr("key")]);
      });
    }
  );
  $(".translate_lang").click(function () {
    let lang = $(this).attr("id");
    // console.log(lang);
    localStorage.setItem("lang", lang);
    $.getJSON(
      "js/actions-pages/lang/" + localStorage.getItem("lang") + ".json",
      function (json) {
        //RECORRER EL JSON Y REEMPLAZAR EL IDIOMA...
        $(".lang_ttrq").each(function (i, value) {
          $(this).text(json[lang][$(this).attr("key")]);
        });
      }
    );
  });
});

//CONVRESIÓN DE MONEDA...
$(".translate_lang").click(function () {
    let valor = $(this).data("moneda");
    let valor_simbol = $(this).data("simbol");
    let valor_pref = $(this).data("pref");

    localStorage.setItem("valor", valor);
    localStorage.setItem("pref", valor_pref)
    localStorage.setItem("simbol", valor_simbol);  
    //console.log(valor);
});

$(document).ready(function(){
  let price_country = $('.price-country');

  if(!localStorage.getItem("valor")){
    localStorage.setItem("valor", '1.00');
  }
  if(!localStorage.getItem("simbol")){
    localStorage.setItem("simbol", '$');
  }
  if(!localStorage.getItem("pref")){
    localStorage.setItem("pref", 'USD');
  }  
  
  simbolLS = localStorage.getItem("simbol");
  prefLS = localStorage.getItem("pref");
  valorLS = localStorage.getItem("valor");

  total = 0;

  $.each(price_country, function(i, v){
    
  total = simbolLS+" "+(parseFloat($(this).text().replace('$', ' ')) * valorLS).toFixed(2)+" "+prefLS;
    $(this).html(total);
  });
});
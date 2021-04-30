$(document).ready(function () {
  //   console.log("hola");
  if (!localStorage.getItem("lang")) {
    localStorage.setItem("lang", "es");
  }
  $.getJSON(
    "../js/actions_pages/lang/" + localStorage.getItem("lang") + ".json",
    function (json) {
      //   console.log(json);
      let get = localStorage.getItem("lang");
      $(".lang_ttrq").each(function (i, value) {
        $(this).text(json[get][$(this).attr("key")]);
      });
    }
  );
  // $(".translate_lang").click(function () {
  //   let lang = $(this).attr("id");
  // console.log(lang);
  let lang = localStorage.getItem("lang");
  $.getJSON(
    "../js/actions_pages/lang/" + localStorage.getItem("lang") + ".json",
    function (json) {
      //RECORRER EL JSON Y REEMPLAZAR EL IDIOMA...
      $(".lang_ttrq").each(function (i, value) {
        $(this).text(json[lang][$(this).attr("key")]);
      });
    }
  );
});


$(document).ready(function(){
  //VALORES A REEMPLAZAR POR PRECIO DE LA MEMBRESÍA...
  let price_country = $('.price-country'); //...
  
  if(!localStorage.getItem("valor")){
    localStorage.setItem("valor", '1.00');
  }
  if(!localStorage.getItem("simbol")){
    localStorage.setItem("simbol", '$');
  }
  if(!localStorage.getItem("pref")){
    localStorage.setItem("pref", 'USD');
  }  
  
  //VARIABLES:  SIMBOLO, PREFIJO Y VALOR DEL PRECIO - MEMEBRESÍA...
  simbolLS = localStorage.getItem("simbol");
  prefLS = localStorage.getItem("pref");
  valorLS = localStorage.getItem("valor");

  total = 0;

  //REEMPLAZAR EL PRECIO: MEMBRESIAS...
  $.each(price_country, function(i, v){
    total = simbolLS+" "+(parseFloat($(this).text().replace('$', ' ')) * valorLS).toFixed(2)+" "+prefLS;
    $(this).html(total);
  });


});

$(document).ready(function(){
  //VALORES A REEMPLAZAR POR PRECIO DE LA RECARGA DE BILLETERA...
  let price_country_wall = $('.price-wallet_country');

  if(!localStorage.getItem("valor") && !localStorage.getItem("simbol") && !localStorage.getItem("pref")){
    localStorage.setItem("valor", '1.00');
    localStorage.setItem("simbol", '$');
    localStorage.setItem("pref", 'USD');
  }

  //VARIABLES:  SIMBOLO, PREFIJO Y VALOR DEL PRECIO -  BILLETERA...
  simbolLS = localStorage.getItem("simbol");
  prefLS = localStorage.getItem("pref");
  valorLS = localStorage.getItem("valor");  


  total_wallet = 0;
  //REEMPLAZAR EL PRECIO: RECARGA DE BILLETERA...
  $.each(price_country_wall, function(i, v){
    //console.log($(this));
    total_wallet = simbolLS+" "+(parseFloat($(this).text().replace('$', ' ')) * valorLS).toFixed(2)+" "+prefLS;
    $(this).html(total_wallet);
  });
});
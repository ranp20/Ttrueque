$(() => {
  listMemberships();
});
$(document).ready(function() {
  var estado = false;
  $('#b-two-t-m-xd').css({
    "overflow": "auto"
  });
  $('#btn-slide-info').on('mouseover', function() {
    $('.c-sectMain').slideToggle();
    if(estado == true){
      $(this).text("Mayores Detalles sobre Membresía");
      $('#b-two-t-m-xd').css({
        "overflow": "auto"
      });
      $('#main-membership-info').css({
        "display": "none"
      });
      estado = false;
    }else{
      $(this).text('');
      $('#b-two-t-m-xd').css({
        "overflow": "auto"
      });
      $('#main-membership-info').css({
        "display": "block",
        "margin-top": "-27px"
      });
      estado = true;
    }
  });
});
function listMemberships(){
  $.ajax({
    url: "./php/list_menbership.php",
    dataType: "JSON",
    method: "POST",
    contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
  }).done((e) => {
    if(e != "" && e != "[]"){
      $.each(e, function(i, v){
        let img_path = "./admin/images/menbresia/" + v.image;
        let a = $("<div />").html((v.descripcion).replace(/</g, '&lt;').replace(/>/g, '&gt;')).text();
        $("#targets-info-menbershi").append(`
          <li class="c-tblpriceSlideUp__c__m__i">
            <div class="c-tblpriceSlideUp__c__m__i__cIcon">
              <img  class="img-fluid" src="${img_path}" alt="membresia_de_${v.image}" width="100" height="100">
              </div>
            </div>
            <div class="c-tblpriceSlideUp__c__m__i__cDesc">
              <h4>${v.tipo}</h4>
              <div class="c-tblpriceSlideUp__c__m__i__cDesc__cont">
                ${a}
              </div>
            </div>
            <a href="cliente/menbresia" class="c-tblpriceSlideUp__c__m__i__cDesc__link" title="Conoce más">Conoce más</a>
          </li>
        `);
      });
    }else{
      console.log('Lo sentimos, hubo un error al procesar la información.');
    }
  });
}
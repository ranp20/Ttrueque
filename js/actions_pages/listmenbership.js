$(function(){
  $.ajax({
    url: "./php/list_menbership.php",
    dataType: "JSON",
    method: "POST",
    contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
  }).done(function (res) {

    $.each(res, function (i, v) {
      var img_path = "./admin/images/menbresia/" + v.image;
      var a = $("<div />").html((v.descripcion).replace(/</g, '&lt;').replace(/>/g, '&gt;')).text();

      $("#targets-info-menbershi").append(`
          <li class="cont__tblpricetxttwo--info--mtable--item">
            <div class="cont__tblpricetxttwo--info--mtable--item--cImg">
              <img loading="lazy" class="cont__tblpricetxttwo--info--mtable--item--cImg--img img-fluid" src="${img_path}">
              </div>
            </div>
            <div class="cont__tblpricetxttwo--info--mtable--item--cBenefits">
              <h4>${v.tipo}</h4>
              <div class="cont__tblpricetxttwo--info--mtable--item--cBenefits--cont">
                ${a}
              </div>
            </div>
            <a href="cliente/menbresia" class="cont__tblpricetxttwo--info--mtable--item--cBenefits--link">Conoce más</a>
          </li>
        `);
    });
  });
});
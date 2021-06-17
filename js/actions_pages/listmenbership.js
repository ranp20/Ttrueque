$(function(){
  $.ajax({
    url: "./php/list_menbership.php",
    dataType: "JSON",
    method: "POST",
    contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
  }).done(function (res) {

    $.each(res, function (i, v) {
      var img_path = "./admin/images/menbresia/" + v.image;
      var a = $("<div />").html(v.descripcion).text();

      $("#targets-info-menbershi").append(`
          <li>
            <div class="t-m-img-b-trk">
              <div loading="lazy" class="tm-image-b-trk img-fluid" style="background-image: url(${img_path});">
              </div>
            </div>
            <div class="t-m-list-info-params">
              <h4>${v.tipo}</h4>
              <div class="list-membership-t-p">
                ${a}
              </div>
            </div>
            <a href="cliente/menbresia" class="btn-info-m-t">Conoce más</a>
          </li>
        `);
    });
  });
});
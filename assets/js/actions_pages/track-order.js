$(document).ready(function () {
  var idclient = $("#userid_cli").val();
  //console.log(client);
  $.ajax({
    url: "./php/list-track-order.php",
    method: "POST",
    dataType: "JSON",
    data: { idcliente : idclient},
  }).done(function (res) {
    $("#count-trackorder").text(res.length)

    if (res == 0) {
      $(".cont-products-order-info-cli_ttrq").append(`
        <div class="content-msg-any-track-orders">
         <div>
           <img src='./assets/img/iconos_home/index-sidebar-car-sad-face.svg' alt=''>
           <h1>Aún no hay productos para rastrear</h1>
         </div>
       </div>
      `);
      $('.cont-inf-prod-by-str-trackord').remove();
      $('.cont-wrap-radio-stores').remove();
    } else {
      $.each(res, function (i, value) {
        //console.log(value);
        $(".cont-radio-stores").append(`
        <div class="slide-item" id="buttons-${value.id_tienda}">
            <div class="cnt-chk-btns-stores">           
              <input type="radio" name="store_name" id="check-store-${value.id_tienda}" value="${value.id_tienda}">
              <label for="check-store-${value.id_tienda}">${value.tienda}</label>
            </div>
        </div>
        `);

      });
      // //CAROUSEL DE TIENDAS...
      // var slider = tns({
      //   "container": ".cont-radio-stores",
      //   items: 3,
      //   slideBy: "page",
      //   mouseDrag: true,
      //   swipeAngle: false,
      //   speed: 200,
      //   center: true,
      //   edgePadding: 50,
      //   controlsText: ['&#9668;', '&#9658;'],
      // });


      $(`.cnt-chk-btns-stores input`).on("change", function () {
        var checkbtn = $(
          `input[name=store_name]:checked`,
          `.cnt-chk-btns-stores`
        ).val();
        $.ajax({
          url: "./php/controlller-track-order.php",
          method: "POST",
          dataType: "JSON",
          data: { tiendas: checkbtn , idcliente : idclient},
        }).done(function (res) {
          // console.log(res);
          $.each(res, function (i, val) {
            // console.log(val.id_tienda);
            // console.log("");

            $(".cont-inf-prod-by-str-trackord").html(`         
              <div class="c-left-cont-inf-str-prod-trackord"  id="cls-trackord-ttqr-${val.id_tienda}"   >
                <div class="cont-inf-store-trackord-ttrq">
                  <h1>${val.nombre_tienda}</h1>
                 </div>
                   <ul class="ul-${val.id_tienda}">
                   </ul>
                 </div>
                  <div class="cont-btns-actions-into-track" id="cls-into-track">
                    <form action="" method="POST" class="form-track-${val.id_tienda}" id="form-track-${val.id_tienda}">
                      <div class="cont-btns-radio-track">
                        <div>
                          <input type="radio" id="track_radio1-${val.id_tienda}" name="tipe_btn_track-${val.id_tienda}" value="dejar_comentario-${val.id_tienda}">
                          <label for="track_radio1-${val.id_tienda}">Dejar Comentarios</label>
                        </div>
                        <div>
                          <input type="radio" id="track_radio2-${val.id_tienda}" name="tipe_btn_track-${val.id_tienda}" value="pedir_reembolso-${val.id_tienda}">
                          <label for="track_radio2-${val.id_tienda}">Pedir Reembolso</label>
                        </div>
                      </div>
                      <div id="contmsgtrack" class="show-input-${val.id_tienda}">
                      </div>
                      <div class="btn-confi-order-actions-track" id="coment-${val.id_tienda}">
                        <button type="submit" name="enviartrack" class="btn-confirmar-comen-${val.id_tienda}" data-store="${val.id_tienda}" data-client="${val.id_cliente}">
                          <span>Confirmar pedido con comentario</span>
                        </button>
                      </div>
                      <div class="btn-confi-order-actions-track" id="solitu-${val.id_tienda}">
                      <button type="submit" name="enviartrack" class="btn-confirmar-soli-${val.id_tienda}" data-store="${val.id_tienda}" data-client="${val.id_cliente}">
                        <span>Confirmar pedido con reembolso</span>
                      </button>
                    </div>
                    </form>
                  </div>
            `);
            $(`#coment-${val.id_tienda}`).hide();
            $(`#solitu-${val.id_tienda}`).hide();
            $(`.form-track-${val.id_tienda} input`).on("change", function () {
              var track = $(
                `input[name=tipe_btn_track-${val.id_tienda}]:checked`,
                `.form-track-${val.id_tienda}`
              ).val();
              // console.log(track);
              if (track == `dejar_comentario-${val.id_tienda}`) {
                $(`.show-input-${val.id_tienda}`).html(`
                <div class="cls-input-${val.id_tienda}"  >
                  <textarea name="" id="clstexareafeed-${val.id_tienda}" cols="30" rows="6" placeholder="Escriba aquí su comentario"></textarea>
                </div>
              `);
                $("#alert-soli").html("");
                $(`#coment-${val.id_tienda}`).show();
                $(`#solitu-${val.id_tienda}`).hide();
                $(document).on("click", `.btn-confirmar-comen-${val.id_tienda}`, function (e) {
                    e.preventDefault();
                    var tienda = val.id_tienda;
                    var cliente = $(this).data("client");
                    var orderid = val.Orden;
                    comentuser(tienda, cliente, orderid);
                  }
                );
              } else if (track == `pedir_reembolso-${val.id_tienda}`) {
                $(`.show-input-${val.id_tienda}`).html(`
                <div class="cls-input-${val.id_tienda}">
                  <textarea name="" id="clstexareasoli-${val.id_tienda}"  cols="30" rows="6" placeholder="Escriba aquí su queja y el nombre del producto"></textarea>
                </div>      
              `);
                $("#alert-feed").html("");
                $(`#coment-${val.id_tienda}`).hide();
                $(`#solitu-${val.id_tienda}`).show();
                $(document).on("click", `.btn-confirmar-soli-${val.id_tienda}`, function (e) {
                    e.preventDefault();
                    console.log("sd");
                    var tienda = val.id_tienda;
                    var cliente = $(this).data("client");
                    var orderid = val.Orden;
                    reembolsouser(tienda, cliente, orderid);
                  }
                );
              }
            });
            $.each(res, function (j, v) {
              // console.log(v);
              var totaltrack = v.cantidad * v.puntos_real;

              $(`.ul-${val.id_tienda}`).append(`
              <li id="li-${val.id_tienda}" >
                <div class="cont-left-inf-prod-into-trackord">
                  <div class="cont-img-prod-trackord">
                    <div style="background-image: url('./shop/folder/${v.imagen}');"></div>
                  </div>
                  <div class="cont-inf-prod-trackord">
                    <span>${v.producto}</span>
                    <span>${v.cantidad} x ${v.puntos_real}  Bikers</span>
                    <span>Total ${totaltrack} Bikers</span>
                    <span>F.C: ${v.creacion}</span>
                  </div>
                </div>
              </li>
             `);
            });
          });
        });
      });
    }
  });
});
function comentuser(tienda, cliente, orderid) {
  var getText = $(`#clstexareafeed-${tienda}`).val();
  console.log("D");
  if (getText == "") {
    //$("#alert-feed").html("No puede estar vacio el campo de comentario");
    Swal.fire({
      icon: "warning",
      title: "Atención!",
      text: "No puede estar vacio el campo de comentario",
      showConfirmButton: false,
      timer: 2000,
    });
    $("#alert-soli").html("");
  } else {
    $.ajax({
      url: "./php/update-estado-cart.php",
      method: "POST",
      data: {
        tienda: tienda,
        cliente: cliente,
        text: "comentario",
        com_sol: getText,
        orden: orderid,
      },
    }).done((e) => {
      console.log(e);
      if (e == "updated") {
        //alert("Confirmado correctamente");
        Swal.fire({
          icon: "success",
          title: "Gracias!",
          text: "Comentario enviado",
          showConfirmButton: false,
          timer: 1900,
        });

        $(`#cls-trackord-ttqr-${tienda}`).remove();
        $(`.form-track-${tienda}`).remove();
        $(`#buttons-${tienda}`).remove();
      } else {
        alert("Error");
      }
    });
  }
}
function reembolsouser(tienda, cliente, orderid) {
  var getText1 = $(`#clstexareasoli-${tienda}`).val();
  console.log(getText1);
  if (getText1 === "") {
    //$("#alert-soli").html("No puede estar vacio el campo de solitud");
    Swal.fire({
      icon: "warning",
      title: "Atención!",
      text: "No puede estar vacio el campo de solitud",
      showConfirmButton: false,
      timer: 2000,
    });
    $("#alert-feed").html("");
  } else {
    $.ajax({
      url: "./php/update-estado-cart.php",
      method: "POST",
      data: {
        tienda: tienda,
        cliente: cliente,
        text: "solicitud",
        com_sol: getText1,
        orden: orderid,
      },
    }).done((e) => {
      
      console.log(e);
      
      if (e == "updated") {
        console.log("Confirmado correctamente");
        Swal.fire({
          icon: "success",
          title: "Gracias!",
          text: "Tu solicitud ha sido enviada",
          showConfirmButton: false,
          timer: 1900,
        });

        $(`#cls-trackord-ttqr-${tienda}`).remove();
        $(`.form-track-${tienda}`).remove();
        $(`#buttons-${tienda}`).remove();
      } else {
        alert("Error");
      }
    });
  }
}
$(function () {
  // add_to_store();
  list_store_idtienda();
});



$("input[name=tipo_cliente]").click(function () {
  var tipo = $(this).val();
  // console.log(tipo);
  if (tipo == "pers_natural") {
    $("#tipos").html(`
        <div class="perso_nat">
        <div>
          <label>TIPO DE DOCUMENTO</label>
          <select class="sel_tipe_doc" type="text" name="tipo_documento" id="tipo_docu">
            <option value="0">Seleccione</option>
            <option>Dni</option>
            <option>Pasaporte</option>
            <option>Otros</option>
          </select>
          </div>
          <div>
            <label>NÚMERO DE DOCUMENTO</label>
            <input class="text_num_doc" type="text" required name="num_doc" id="numero_doc" placeholder="Nro. de Documento*">
          </div>
          <div>
            <label>NOMBRE DE LA TIENDA</label>
            <input class="text_nomstore_prsn" type="text" id="name" name="name" placeholder="Nombre empresa/tienda">
        </div>
        </div>

        `);
    $(".cnt-payments-method").html(`
      <button class="btn-memb-store-register" id="btn-type" >Registrar mi tienda</button>
    `);
  } else if (tipo == "pers_natural_negocio") {
    $("#tipos").html(`
        <div class="perso_nat_neg"  >
        <div>
          <label>RUC</label>
          <input class="text_ruc" type="text" required  name="ruc" id="ruc" placeholder="Ruc*">
        </div>
        <div>
          <label>NOMBRE DE LA EMPRESA/TIENDA</label>
          <input class="text_nomstore_prsnccn" type="text" id="name" name="name" placeholder="Nombre empresa/tienda" >
        </div>
        </div>
       
  
        
        `);

    $(".cnt-payments-method").html(`
        <button class="btn-memb-store-register" id="btn-type1" >Registrar mi tienda</button>
      `);
  } else if (tipo == "empresa") {
    $("#tipos").html(`
        <div class="empres">
          <div>
            <label>RAZÓN SOCIAL</label>
            <input class="text_razon-socal" type="text" required name="razon_social" id="razon_social" placeholder="Razón Social*">
          </div>
          <div>         
            <label>RUC</label>
            <input class="text_ruc_enterprise" type="text" required  name="ruc" id="ruc" placeholder="Ruc*">                    
          </div>
          <div>
            <label>NOMBRE DE CONTACTO</label>
              <input class="text_nomb-contact" type="text" required  name="nombre_contacto" id="nombre_contacto" placeholder="Nombre de persona para Contacto*">
          </div>
          <div>
            <label>NOMBRE DE LA EMPRESA/TIENDA</label>
            <input class="text_nomstore_enterprise" type="text" id="name" name="name"  placeholder="Nombre empresa/tienda" >
          </div>
          </div>
        
         `);
    $(".cnt-payments-method").html(`
         <button class="btn-memb-store-register" id="btn-type2" >Registrar mi tienda</button>
       `);
  }
});



function convertMayus(cadena) {
  return cadena.charAt(0).toUpperCase() + cadena.slice(1);
}

// function characterReplace(nombre){
//   return nombre.replace(/"%C3%AD"/g, "í").replace(/"%C3%A9"/g, "é");
// }

function list_store_idtienda() {
  var tienda = $("#tienda").val();
  $.ajax({
    url: "../shop/ajax/list_tienda_idtienda.php",
    dataType: "JSON",
    method: "POST",
    contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
    data: { tienda: tienda },
  }).done(function (res) {
    $.each(res, function (i, v) {
      $(".selidtienda").val(v.id);
      $(".tipo_m-store").val(v.cantidad);

      if (v.logo == "") {
        $("#info_cli").append(
          `

          <div class="img-photo-content-user-v">
            <div id="logo_store" style='background-image: url(./images/icons/default-store.png);background-repeat:no-repeat;background-size: contain;background-position: center;'></div>
          </div>
          <div class="name-content-user-v">
            <p>` +
            convertMayus(v.nombre) +
            " " +
            convertMayus(v.apellido) +
            `</p>
            <p>${v.tienda}
              <span>(${v.cantidad})</span>
            </p>
          </div>
        `
        );
        $(".content-upd-logo-store_ttrq").html(`
          <div style="background-image: url(./images/icons/default-store.png);background-repeat:no-repeat;background-size: contain;background-position: center;"></div>
        `);
      } else {
        $("#info_cli").append(
          `
          <div class="img-photo-content-user-v">
              <div id="logo_store" style='background-image: url(./images/store/${v.logo});background-repeat:no-repeat;background-size: contain;background-position: center;'></div>
          </div>
          <div class="name-content-user-v">
            <p>` +
            convertMayus(v.nombre) +
            " " +
            convertMayus(v.apellido) +
            `</p>
            <p>${v.tienda}
              <span>(${v.cantidad})</span>
            </p>
          </div>
        `
        );
      }
    });
  });
}

$(document).on("click", "#datamemb", function (e) {
  e.preventDefault();
  var tienda = $("#tiendamemb").val();
  var cantidad = $("#cantidadmemb").val();

  console.log(tienda);
  console.log(cantidad);

  $.ajax({
    url: "../shop/ajax/list_memb_by_idtienda.php",
    method: "POST",
    contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
    data: { tienda: tienda, cantidad: cantidad },
  }).done(function (res) {
    //console.log(res);
    if (res) {
      window.location = "../shop/menbresia-products.php";
    }
  });
});
$(document).on("click", "#btn-type2", function (e) {
  e.preventDefault();
  var razon_social = $(".text_razon-socal").val();
  var ruc_enterprise = $(".text_ruc_enterprise").val();
  var nomb_contact = $(".text_nomb-contact").val();
  var nomstore_enterprise = $(".text_nomstore_enterprise").val();

  if (
    razon_social == "" ||
    ruc_enterprise == 0 ||
    nomb_contact == "" ||
    nomstore_enterprise == ""
  ) {
    Swal.fire({
      icon: "warning",
      title: "Aviso!",
      text: "Por favor, rellene los campos",
      showConfirmButton: false,
      timer: 1500,
    });
  } else {
    insertMenb();
  }
});
$(document).on("click", "#btn-type1", function (e) {
  e.preventDefault();
  var num_ruc = $(".text_ruc").val();
  var nomstore_prsnccn = $(".text_nomstore_prsnccn").val();

  if (num_ruc == 0 || nomstore_prsnccn == "") {
    Swal.fire({
      icon: "warning",
      title: "Aviso!",
      text: "Por favor, rellene los campos",
      showConfirmButton: false,
      timer: 1500,
    });
  } else {
    insertMenb();
  }
});

$(document).on("click", "#btn-type", function (e) {
  e.preventDefault();
  var tipe_doc = $(".sel_tipe_doc").val();
  var num_doc = $(".text_num_doc").val();
  var nomstore_prsn = $(".text_nomstore_prsn").val();
  if (tipe_doc == 0 || num_doc == "" || nomstore_prsn == "") {
    Swal.fire({
      icon: "warning",
      title: "Aviso!",
      text: "Por favor, rellene los campos",
      showConfirmButton: false,
      timer: 1500,
    });
  } else {
    insertMenb();
  }
});

function insertMenb() {
  var formData = $("#form-store").serialize();
  console.log(formData);
  $.ajax({
    url: "../../../../Trueque/shop/ajax/register-store-basic.php",
    method: "POST",
    data: formData,
  }).done((e) => {
    console.log(e);

    var result = JSON.parse(e);

    if (result["res"] == "inserto") {
      console.log("Se registró correctamente");
      setTimeout(function () {
        Swal.fire({
          title: "Tienda Creada",
          text:
            "FELICIDADES! En un breve se te redirigirá a tu panel de control...",
          imageUrl: "../../../shop/images/gifs/store_delay.gif",
          imageWidth: 400,
          imageHeight: 200,
          imageAlt: "Custom image",
        });
        location.replace("../../../shop");
      }, 1400);
    } else {
      Swal.fire({
        icon: "error",
        title: "Error!",
        text: "No se registró niguna tienda",
        showConfirmButton: false,
        timer: 1500,
      });
    }
  });
}

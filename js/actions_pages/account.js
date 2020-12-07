$(document).ready(function () {
  var estado = $("#estado").val();
  var id = $("#id").val();

  if (id != "" && estado != "") {
    $.ajax({
      //  url: "../../php/class/update_estado.php",
      url: "../../trueque/php/class/update_estado.php",
      method: "POST",
      data: { estado: estado, id: id },
    }).done(function (res) {
      if (res == "updated") {
        $("#alert").html(
          `<div class='alert alert-success alert-dismissible fade show' role='alert' style='width:566px !important;'>
            Su cuenta ha sido activada exitosamente, por favor inicie sesión.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button> 
          </div>`
        );
      } else {
        $("#alert").html("Se produjo un error vuelva activar su cuenta");
      }
    });
  }
});

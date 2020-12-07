
$(document).on("click","#btn-update-perfil",function(e){
    e.preventDefault();
let form=$("#form-perfil").serialize();

$.ajax({
    url: ".././php/process_update_perfil.php",
    method: "POST",
    data: form
}).done(function(e) {
  
    if (e == "true") {
        Swal.fire({
            icon: "success",
            title: "Bien!!!",
            text: "Datos Actualizado correctamente",
            showConfirmButton: false,
            timer: 2500,
        });
    }else{
        Swal.fire({
            icon: "error",
            title: "Lo siento!!!",
            text: "Error al actualizar perfil",
            showConfirmButton: false,
            timer: 2500,
        }); 
    }
})

})


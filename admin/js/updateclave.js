$(document).on("click", "#btn-guardarclave", function(e) {
    e.preventDefault();
    let idadmin = $("#ID").text();
    let passactual = $("#passcla").text();
    let passactualvalidado = $("#password").val();
    let newpass = $("#newpassword").val();
    let confirmpass = $("#confirmpassword").val();
    if (passactual === passactualvalidado) {
        if (newpass == "") {

            Swal.fire({
                icon: "warning",
                title: "Hey!!!",
                text: "Las nueva clave no debe estar vacía",
                showConfirmButton: false,
                timer: 2500,
            });
        } else {
            if (newpass != confirmpass) {
                Swal.fire({
                    icon: "warning",
                    title: "Hey!!!",
                    text: "Las contraseñas no coinciden",
                    showConfirmButton: false,
                    timer: 2500,
                });
            } else {
                $.ajax({
                    url: ".././php/process_update_clave.php",
                    method: "POST",
                    data: {
                        id: idadmin,
                        pass: confirmpass
                    }
                }).done(function(e) {
                    if (e == "true") {
                        Swal.fire({
                            icon: "success",
                            title: "Bien!!!",
                            text: "Contraseña Actualizada correctamente",
                            showConfirmButton: false,
                            timer: 2500,
                        });
                    }else{
                        Swal.fire({
                            icon: "error",
                            title: "Lo siento!!!",
                            text: "Error al actualizar contraseña",
                            showConfirmButton: false,
                            timer: 2500,
                        }); 
                    }
                })

            }
        }
    } else {

        Swal.fire({
            icon: "warning",
            title: "Hey!!!",
            text: "Contraseña Actual incorrecta",
            showConfirmButton: false,
            timer: 2500,
        });
    }

})
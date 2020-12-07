$(document).on("click","#btn-update-perfilcliente",function(e){
e.preventDefault();
let form=$("#form-perfilcliente").serialize();
console.log(form);

$.ajax({
    url : '../shop/ajax/update-profile.php',
    method : 'POST',
    data : form,

}).done((e) =>{
if(e=="true"){
    Swal.fire({
        icon: "success",
        title: "Éxito!",
        text: "Datos Actualizados correctamente",
        showConfirmButton: false,
        timer: 2500,
      });
}else{
    Swal.fire({
        icon: "error",
        title: "Error!",
        text: "No se pudo actualizar sus datos",
        showConfirmButton: false,
        timer: 2500,
      });
}
});

})
$(document).ready(function(){
    $.ajax({
        type: 'POST',
        url: '../php/class/cargar_categorias.php',
        data: {'peticion' : 'cargar_listas'}
    })
    .done(function(respuesta){
        $('#lista_categorias').html(respuesta);
    })
    .fail(function(){
        alert("Hubo un error al cargar lista de categorías");
    })
})

////// AGREGAR DATATABLES AL LISTADO DE CLIENTES...
$(document).ready(function(){
    $('#table_cliente').DataTable();
});
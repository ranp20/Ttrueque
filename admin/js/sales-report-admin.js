$(function(){
	var today = new Date();

  var year = today.getFullYear();
  listadoreporte(year);
});

// $('#select-year').on('change', function() {
// 	var nom_year = $(this).val();
// 	console.log(nom_year); 
// 	listadoreporte(nom_year);
// 	$('#list_user_change').html('');

// });

function listadoreporte(i){
	$.ajax({
    url: "../php/class/list_sales_report_adm.php",
    method: "POST",
    dataType: "JSON",
    data: { year: i },
  }).done((e) => {
  	console.log(e);

  	if(e == ""){
    	$('#list_user_change').append(`
    		<tr>
    			<td colspan="11">
    				<div class="sms-any-data-registers">
    					<i class="fa fa-frown-o"></i>
    					<h1>No hay registro de ventas de clientes.</h1>
    				</div>
    			<td>
    		</tr>
    	`);
  	}else{
  		contador = 0;
	    $.each(e, function(i, v){
	    	contador++;

	    	var meses = [
          "Enero",
          "Febrero",
          "Marzo",
          "Abril",
          "Mayo",
          "Junio",
          "Julio",
          "Agosto",
          "Septiembre",
          "Octubre",
          "Noviembre",
          "Diciembre",
        ];

        var nombmes = v.mes;

        if (!isNaN(nombmes) && nombmes >= 1 && nombmes <= 12) {
          var filaMes = 0;
          filaMes = meses[nombmes - 1];
        }

	    	$('#list_user_change').append(`
	    		<tr>
	    			<td>${contador}<td>
	    			<td>${filaMes}<td>
	    			<td>${v.email_cliente}<td>
	    			<td>${v.nombre_cliente}<td>
	    			<td>${v.apellido_cliente}<td>
	    			<td>${v.direccion_cliente}<td>
	    			<td>${v.nombre_pais}<td>
	    			<td>${v.telefono}<td>
	    			<td>
	    				<a href='./list-sales-reports.php?cli=${v.id_cliente}&year=${v.año}' class='btn btn-danger id_cliente'>Ver Ventas<i class="fa fa-reorder"></i></a>
	    			</td>
	    			<td></td>
	    			<td>${v.puntos}<td>
	    		</tr>
	    	`);
	    });
  	}
  });	
}
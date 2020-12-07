var cliente = $('#idcliente').val();

$(function(){
	
  $.ajax({
    url: "../php/class/list_years_group_adm.php",
    method: "POST",
    dataType: "JSON",
    data: { idcliente : cliente },
  }).done((e) =>{
    //console.log(e);
    
    $.each(e, function(i,v){
      $('#select-year_adm').append(`
        <option value="2020">${v.año}</option>
      `);
    })
  })


	var today = new Date();
  var year = today.getFullYear();

  //console.log(cliente);
  //console.log(year);
  listadoreporte(cliente, year);
});

$('#select-year_adm').on('change', function() {
	var nom_year = $(this).val();
	
  //console.log(nom_year);
	listadoreporte(cliente, nom_year);
	$('#list_reports_monthly').html('');

});


function listadoreporte(cliente, i){
	$.ajax({
    url: "../php/class/list_reportcli_in_admin.php",
    method: "POST",
    dataType: "JSON",
    data: { idcliente : cliente, year: i },
  }).done((e) => {
  	console.log(e);

  if(e == ""){
    	$('#list_reports_monthly').append(`
    		<tr>
    			<td colspan="10">
    				<div class="sms-any-data-registers">
    					<i class="fa fa-frown-o"></i>
    					<h1>No hay registro de ventas de este cliente.</h1>
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

	    	$('#list_reports_monthly').append(`
	    		<tr>
	    			<td>${contador}<td>
	    			<td>${filaMes}<td>
	    			<td>${v.total}<td>
	    			<td>${v.año}<td>
	    			<td>${v.estado}<td>
	    			<td>
	    				<a href='./pdf/reporte.php?cli=${v.id_cliente}&month=${v.mes}&year=${v.año}' target='_blank' class='btn btn-success id_cliente'>Reporte Mensual<i class="fa fa-eye"></i></a>
	    			</td>
	    			<td></td>
	    		</tr>
	    	`);
	    });
  	}
  });	
}
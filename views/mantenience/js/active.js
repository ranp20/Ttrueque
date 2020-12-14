$(function(){
	var countdays = $('#count-remove-mant').val();
	//console.log(countdays);
	function fechaCorrecta(fecha1, fecha2){

    //Split de las fechas recibidas para separarlas
    var x = fecha1.split("-");
    var z = fecha2.split("-");

    //Cambiamos el orden al formato americano, de esto dd/mm/yyyy a esto mm/dd/yyyy
    fecha1 = x[0] + "-" + x[1] + "-" + x[2];
    fecha2 = z[0] + "-" + z[1] + "-" + z[2];

    console.log(fecha1);
    console.log(Date.parse(fecha1));
    //Comparamos las fechas
    if (Date.parse(fecha1) > Date.parse(fecha2)){
        return false;
    }else{
        return true;
    }
	}

  
	console.log(fechaCorrecta('2020-12-16','2020-12-19'));

	$.ajax({
		url: '../../../php/class/all.php',
		method: 'POST',
		dataType: 'JSON',
		data: { time : countdays},
	}).done( (e) => {
		//console.log(e);
	});	

	/*restaFechas = function(f1,f2)
	{
	var aFecha1 = f1.split('/');
	var aFecha2 = f2.split('/');
	var fFecha1 = Date.UTC(aFecha1[2],aFecha1[1]-1,aFecha1[0]);
	var fFecha2 = Date.UTC(aFecha2[2],aFecha2[1]-1,aFecha2[0]);
	var dif = fFecha2 - fFecha1;
	var dias = Math.floor(dif / (1000 * 60 * 60 * 24));

	return dias;

	}
	
	var f1 = fechaactual;
	var f2=desde;*/

	

	var daystimeout = 2; 
	var d = new Date();
	var getcurrent_date = d.getDate();
	//var strDate = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate() + " " + d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();

	//console.log(getcurrent_date + parseInt(countdays));

	var note = $('#note'),
		ts = new Date(2017, 0, 1),
		newYear = true;
	
		//console.log(restaFechas(f1,f2));
	if((new Date()) > ts){
		// The new year is here! Count towards something else.
		// Notice the *1000 at the end - time must be in milliseconds
		ts = (new Date()).getTime() + daystimeout*24*60*60*1000;
		newYear = false;
	}
		
	$('#countdown').countdown({
		timestamp	: ts,
		callback	: function(days, hours, minutes, seconds){
			
			var message = "";
			
			message += days + " day" + ( days==1 ? '':'s' ) + ", ";
			message += hours + " hour" + ( hours==1 ? '':'s' ) + ", ";
			message += minutes + " minute" + ( minutes==1 ? '':'s' ) + " and ";
			message += seconds + " second" + ( seconds==1 ? '':'s' ) + " <br />";
			
			if(newYear){
				message += "left until the new year!";
			}
			else {
				message += "left to 10 days from now!";
			}
			
			note.html(message);
		}
	});
	
});
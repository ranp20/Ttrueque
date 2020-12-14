$(function(){
	var id = $('#idtime').val();
	var desde = $('#count-remove-desde').val();
	var hasta = $('#count-remove-hasta').val();
	// console.log(id);
	// console.log(desde);
	// console.log(hasta);
	var d = new Date(); var month = d.getMonth()+1; var day = d.getDate();
	 var fechaactual = (day<10 ? '0' : '') + day + '/' + (month<10 ? '0' : '') + month + '/' + d.getFullYear() 

	
	$.ajax({
		url: '../../../php/class/all.php',
		method: 'POST',
		dataType: 'JSON',
		data: { time : desde},
	}).done( (e) => {
		//console.log(e);
	});	

	restaFechas = function(f1,f2)
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
	var f2=desde;
   
	

	var daystimeout = 2; 
	var d = new Date();
	var getcurrent_date = d.getDate();
	//var strDate = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate() + " " + d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();

	

	var note = $('#note'),
		ts = new Date(2017, 0, 1),
		newYear = true;
	
if(restaFechas(f1,f2)==0){
			
	
	if((new Date()) > ts){
		// The new year is here! Count towards something else.
		// Notice the *1000 at the end - time must be in milliseconds
		ts = (new Date()).getTime() +  restaFechas(f1,f2)*24*60*60*1000;
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
}
});
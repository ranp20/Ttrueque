$(function(){
	var id = $('#idtime').val();
	var desde = $('#count-remove-desde').val();
	var hasta = $('#count-remove-hasta').val();
	console.log(id);
	console.log(desde);
	console.log(hasta);
	$.ajax({
		url: '../../../php/class/all.php',
		method: 'POST',
		dataType: 'JSON',
		data: { time : desde},
	}).done( (e) => {
		//console.log(e);
	});	

	var daystimeout = 2; 
	var d = new Date();
	var getcurrent_date = d.getDate();
	//var strDate = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate() + " " + d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();

	

	var note = $('#note'),
		ts = new Date(2017, 0, 1),
		newYear = true;
	
	if((new Date()) > ts){
		// The new year is here! Count towards something else.
		// Notice the *1000 at the end - time must be in milliseconds
		ts = (new Date()).getTime() + 1*24*60*60*1000;
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
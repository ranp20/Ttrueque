$(document).on("submit", "#frm-loginUserTtrq", function(e){
	e.preventDefault();

	var frm = new FormData();

	frm.append("estado", $("#estado").val());
	frm.append("email", $("#email").val());
	frm.append("pass", $("#password_in").val());

	$.ajax({
		url: './php/process_login.php',
		method: 'POST',
		data: frm,
		contentType: false,
    cache: false,
    processData: false
	}).done( (e) => {
		var result = JSON.parse(e);
		if(result.response == "true"){
			$('body').append(`
				<div class="c-contMssgResultUser" id="c-contMssgResultUser-login">
			    <div class="c-contMssgResultUser--loader"></div>
			  </div>
			`);
			setTimeout(function(){
				window.location.replace("./");
			}, 500)
		}else{
			$("#cont-AlertMssgTtrqUsr").html(`
				<div id="msgAlertLoginErr">
		      <div class="msgAlertLoginErr--c">
		        <span class="msgAlertLoginErr--c--close" id="btnCloseErr"></span>
		        <h3 class="msgAlertLoginErr--c--title">¡Error!</h3>
		        <p class="msgAlertLoginErr--c--desc">Lo sentimos, los datos no son correctos o no existen</p>
		      </div>
		    </div>
			`);
		
			setTimeout(function(){
				$('#msgAlertLoginErr').remove();
			}, 4500);

			let contModalAlertLogin = document.querySelector('#msgAlertLoginErr');
			contModalAlertLogin.addEventListener('click', e => {
				if(e.target === contModalAlertLogin)	contModalAlertLogin.remove();
			});

			document.querySelector("#btnCloseErr").addEventListener("click", function(){
				document.querySelector("#msgAlertLoginErr").remove();
			});
		}
	});
});
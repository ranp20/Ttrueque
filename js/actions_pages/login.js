$(document).on("submit", "#frm-loginUserTtrq", function(e){
	e.preventDefault();
	$(this).find("button[type=submit]").addClass("active");
	$(this).find("button[type=submit]").attr("disabled", true);
	$(this).find("button[type=submit]").find("span:last-child").html("<span></span>");
	$(this).find("a").addClass("disabledlogin");
	$(".btn-reg-log-in-u").addClass("disabledlogin");

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
			$('#cont-AlertMssgTtrqUsr').html(`
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

			$(this).find("button[type=submit]").attr("disabled", false);
			$(this).find("button[type=submit]").removeClass("active");
			$(this).find("button[type=submit]").find("span:last-child").html("");
			$(this).find("a").removeClass("disabledlogin");
			$(".btn-reg-log-in-u").removeClass("disabledlogin");
		
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
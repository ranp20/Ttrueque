$(document).on("submit", "#frm-loginUserTtrq", function(e){
	e.preventDefault();
	$(this).find("button[type=submit]").addClass("active");
	$(this).find("button[type=submit]").attr("disabled", true);
	$(this).find("button[type=submit]").find("span:last-child").html("<span></span>");
	$(this).parent().addClass("disabled");
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
	}).done((e) => {
		if(e != "" && e != "[]"){
			let r = JSON.parse(e);
			if(r.res == "true"){
				$(this).find("button[type=submit]").attr("disabled", true);
				$('#cont-AlertMssgTtrqUsr').html(`
				<div class="c-contMssgResultUser" id="c-contMssgResultUser-login">
			    <div class="c-contMssgResultUser--loader"></div>
			  </div>`);
				setTimeout(function(){window.location.replace("./");}, 500);
			}else{
				$(this).find("button[type=submit]").attr("disabled", false);
				$(this).find("button[type=submit]").removeClass("active");
				$(this).find("button[type=submit]").find("span:last-child").html("");
				$(this).parent().addClass("disabled");
				Swal.fire({
			    title: '',
			    html: `<div class="alertSwal">
			            <div class="alertSwal__cTitle">
			              <h3>¡Error!</h3>
			            </div>
			            <div class="alertSwal__cText">
			              <p>Los datos del usuario no coinciden o no existen.</p>
			            </div>
			            <button type="button" role="button" tabindex="0" class="SwalBtn1 customSwalBtn">Aceptar</button>
			          </div>`,
			    icon: 'error',
			    showCancelButton: false,
			    showConfirmButton: false,
			    confirmButtonColor: '#3085d6',
			    confirmButtonText: 'Aceptar',
			    allowOutsideClick: false,
			    allowEscapeKey:false,
			    allowEnterKey:true
			  });
			  $(document).on('click', '.SwalBtn1', function(){
			    swal.clickConfirm();
			    $("#frm-loginUserTtrq").parent().removeClass("disabled");
			  });
			}
		}else{
			Swal.fire({
		    title: '',
		    html: `<div class="alertSwal">
		            <div class="alertSwal__cTitle">
		              <h3>¡Error!</h3>
		            </div>
		            <div class="alertSwal__cText">
		              <p>Lo sentimos, hubo un error al procesar la información.</p>
		            </div>
		            <button type="button" role="button" tabindex="0" class="SwalBtn1 customSwalBtn">Aceptar</button>
		          </div>`,
		    icon: 'error',
		    showCancelButton: false,
		    showConfirmButton: false,
		    confirmButtonColor: '#3085d6',
		    confirmButtonText: 'Aceptar',
		    allowOutsideClick: false,
		    allowEscapeKey:false,
		    allowEnterKey:true
		  });
		  $(document).on('click', '.SwalBtn1', function(){
		    swal.clickConfirm();
		    $("#frm-loginUserTtrq").parent().removeClass("disabled");
		  });
		}
	});
});
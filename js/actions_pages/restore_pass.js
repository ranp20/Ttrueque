$(function(){

	$("#btnupdatepass").css({"background-color": "#ccc"});

	$(document).on('keyup', '#password-two', function() {
	  if($(this).val().length <= 0 || $(this).val() == ""){
	    $("#btnupdatepass").attr('disabled', 'disabled');
			$("#btnupdatepass").css({"background-color": "#ccc"});
	    $("#cont-msg-inputpass").removeClass('disabled');
	    $("#msgrestore-pass2").removeClass("success");
	    $(".cont-form-restore--form--control--icon-check").addClass('disabled');
	    $("#msgrestore-pass2").text('Los campos no deben quedar vacíos');
	    $("#msgrestore-pass2").addClass("danger");
	  }else if($(this).val() != $("#password-one").val()){
	  	$("#btnupdatepass").attr('disabled', 'disabled');
			$("#btnupdatepass").css({"background-color": "#ccc"});
	  	$("#cont-msg-inputpass").removeClass('disabled');
	    $("#msgrestore-pass2").removeClass("success");
	    $(".cont-form-restore--form--control--icon-check").addClass('disabled');
	    $("#msgrestore-pass2").text('Las contraseñas no coinciden');
	    $("#msgrestore-pass2").addClass("danger");
	  }else{
	  	$("#btnupdatepass").removeAttr('disabled');
			$("#btnupdatepass").css({"background-color": "#b80f0f"});
	  	$("#cont-msg-inputpass").removeClass('disabled');
	    $("#msgrestore-pass2").removeClass("danger");
	    $(".cont-form-restore--form--control--icon-check").removeClass('disabled');
	    $("#msgrestore-pass2").text('Las contraseñas son correctas');
	    $("#msgrestore-pass2").addClass("success");
	  }
	});
	/************************** ACTUALIZAR EL TOKEN DEL USUARIO **************************/
	let tokengetcliente = $("#tokenbygetclient").val();
	$.ajax({
		url: "./php/process_add_token.php",
		method: "POST",
		dataType: "JSON",
		contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
		data: { token: tokengetcliente },
	}).done(function(res){
		if(res != "" || res.length > 0){
			console.log(res.response);	
		}else{
			console.log('No se encontraron registros');
		}
	});
	/************************** ACTUALIZAR LA CONTRASEÑA **************************/
	$("#restore-pass").submit(function(e){
		e.preventDefault();
		let password_update = $("#password-one").val();
		$.ajax({
			url: "./php/process_restore_password.php",
			method: "POST",
			dataType: "JSON",
			contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
			data: { password : password_update, tokenreturn: tokengetcliente },
		}).done(function(res){
			if(res.response == "true"){
				$("#btnupdatepass").attr('disabled', 'disabled');
				$("#btnupdatepass").css({"background-color": "#ccc"});
				location.replace('login');
			}else{
				console.log('No se ha actualizado la contraseña');
			}
		});
	});
});

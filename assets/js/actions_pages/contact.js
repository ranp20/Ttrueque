((d) => {
	let formrecover = d.querySelector("#form-ContactTtrueque");
	
	formrecover.addEventListener("submit", function(e){
		e.preventDefault();
		
		let ajax = new XMLHttpRequest();
		let url = "./php/process_send_email_contact.php";
		let data = new FormData(formrecover);

		ajax.open("POST", url, true);

		ajax.onreadystatechange = function(){
			if(ajax.readyState == 4 && ajax.status == 200){
				let res = JSON.parse(ajax.responseText);

				console.log(res);
				
				// if(res.response == 'true'){
					

				// 	d.querySelector("#msgrecover-pass").innerHTML = `<div class="cont-form-rec--form--alertmsg__success">
				// 																											<div class="cont-form-rec--form--alertmsg__success__contmsg"></div>
				// 																										</div>`;

				// 	d.querySelector("#msgrecover-pass2").innerHTML = "Éxito! Se reestableció la contraseña. Por favor, revise su correo electrónico";

				// 	setTimeout(function(){
				// 		d.querySelector("#msgrecover-pass").classList.add('active');
				// 		d.querySelector("#msgrecover-pass2").classList.add('active');
				// 	}, 3000);


				// }else{
				// 	alert("Hubo un error al validar la información");
				// }
			}
		}

		ajax.send(data);
	});

})(document);
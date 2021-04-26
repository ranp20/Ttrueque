((d) => {

	const formLogin = d.querySelector('#formLoginWebView');
	formLogin.addEventListener('submit', function(e){
		e.preventDefault();

		let ajax = new XMLHttpRequest();
		let url = "php/process_loginWebView.php";
		let data = new FormData(formLogin);

		ajax.open('POST', url, true);
		ajax.onreadystatechange = function(){
			if(ajax.readyState == 4 && ajax.status == 200){
				let res = JSON.parse(ajax.responseText);

				if(res.response == 'true'){
					d.querySelector('#res-login').innerHTML = `<div class="message-success">
																											<div class="loader-custom"></div>
																										</div>`;					
					setTimeout(function(){
						window.location.replace("home.php");
					}, 1500);
				}else{
					d.querySelector('#res-login').innerHTML = `<div class="message-error">
																											<div class="message-error--cont">
																												<div class="message-error--cont--closebtn" id="btnclosedMessage">X</div>
																												<h3 class="message-error--cont--title">¡Error!</h3>
																												<p class="message-error--cont--description">Los datos no existen y/o son incorrectos...</p>
																											</div>
																										</div>`;
					setTimeout(function(){
						d.querySelector('.message-error').classList.add('disabled');
					}, 3500);
					
					d.querySelector('#btnclosedMessage').addEventListener('click', function(){
						d.querySelector('.message-error').classList.add('disabled');
					});
				}
			}
		}

		ajax.send(data);
	});

})(document);
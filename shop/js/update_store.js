$(document).on('click', "#btn_update-store" , function (e){
	e.preventDefault();

	var formData = new FormData();
	var filelong = $('.logo-store')[0].files.length;

	for(var i = 0; i < filelong; i++){
		formData.append("logo", $('.logo-store')[0].files[i]);
	} 

	formData.append("tienda", $("#tienda").val());
	formData.append("logo", $("#logostr").val());

	$.ajax({
		url : '../shop/ajax/update_store.php',
		method : 'POST',
		data : formData,
		contentType: false,
		cache : false,
		processData : false,
	}).done((e) =>{
		var res = JSON.parse(e);
		var pathlogostr = "./images/store/"+res['logo'];

		if (res != "") {
  		$('.img-photo-content-user-v').html(`
  			<div>
  				<img id="logo_store" src="${pathlogostr}" alt="">
  			</div>
  		`);

  		$('.content-upd-logo-store_ttrq').html(`
  			<div>
  				<img src="${pathlogostr}" alt="">
  			</div>
  		`);

    } else {
      alert("error al actualizar");
    }
	});
})
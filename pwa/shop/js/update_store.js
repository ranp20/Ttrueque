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
		//console.log(res);
		if (res != "") {
    		$('.img-photo-content-user-v').html(`
    			<div id="logo_store" style='background-image: url(./images/store/${res['logo']});background-repeat:no-repeat;background-size: contain;background-position: center;'></div>
    		`);

    		$('.content-upd-logo-store_ttrq').html(`
    			<div style="background-image: url(./images/store/${res['logo']});background-repeat:no-repeat;background-size: contain;background-position: center;"></div>
    		`);

	    } else {
	      alert("error al actualizar");
	    }
	});
})
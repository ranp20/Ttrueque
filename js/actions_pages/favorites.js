//FUNCIÓN SELECCIONAR TODOS LOS CHECKBOX DEL LISTADO
$('#selected-all-favorites').on('click',function(){
	$('.product-favorite-case').prop('checked',this.checked);
	$('#delete_all_favorites').attr('readonly', false);
		$('#delete_all_favorites').css({
			"background" : "#3483fa",
			"color" : "#fff"
		});
});

$('.product-favorite-case').on('click', function(){
	if($('.product-favorite-case:checked').length == 0){
		$('#delete_all_favorites').attr('readonly', true);
	}else{
		$('#delete_all_favorites').attr('readonly', false);
		$('#delete_all_favorites').css({
			"background" : "#3483fa",
			"color" : "#fff"
		});
	}

	if($('.product-favorite-case').length == $('.product-favorite-case:checked').length){
		$('#selected-all-favorites').prop('checked', true);	
		$('#delete_all_favorites').attr('readonly', false);
		$('#delete_all_favorites').css({
			"background" : "#3483fa",
			"color" : "#fff"
		});
	}else{
		$('#selected-all-favorites').prop('checked', false);
	}
});
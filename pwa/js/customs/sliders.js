$(document).ready(function(){
	$('.slider-carousel-custom li').hide();
	$('.slider-carousel-custom li:first-child').show();


	//CANTIDAD DE IMÁGENES...
	var cantimg = $('.slider-carousel-custom li').length;
	

	//COLOR EN LOS INDICADORES...
	$('.botones-slider li:first-child').css({'color':'#07437c'});	

	
	//AUMENTANDO INDICADORES SEGÚN CANTIDAD DE BANNERS...
	for (var i = 1; i <= cantimg; i++) {
		$('.botones-slider').append('<li><span class="far fa-dot-circle"></span></li>');
	}


	//EJECUTANDO FUNCIONES DEL SLIDER....
	$('.botones-slider').click(paginacion);
	$('.content-left span').click(prevSlider);
	$('.content-right span').click(nextSlider);


	//FUNCONES DEL SLIDER...
	function paginacion(){
		$('.slider-carousel-custom li:nth-child(2)').fadeIn();		
	}

	function prevSlider(){
		
	}

	function nextSlider(){

	}
})
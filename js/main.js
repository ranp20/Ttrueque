// ------------ PRELOADER - ALL PAGES TTRUEQUE
window.addEventListener("load", function(){
  document.querySelector(".loader-ttrqstr").className += " hidden";
});
$(() => {
	// ------------ MOSTRAR Y OCULTAR CARRITO...
	let btnOpenCart = $("#view_cart_ttrq"), contCart = $(".containt_total_ttrq-cart"), closeCart = $("#cerrar_carrito");
  btnOpenCart.removeClass("dropdown-cart");
  btnOpenCart.click(function (){contCart.addClass("active");});
  closeCart.click(function (){contCart.removeClass("active");});
  let containCartAll = document.querySelector(".containt_total_ttrq-cart");
	containCartAll.addEventListener('click', e => {if(e.target === containCartAll){containCartAll.classList.remove('active')};});
	// ------------ BOTÓN IR HACIA ARRIBA
  $("#toTopgobtn").on("click", function(){$('html, body').animate({ scrollTop: '0'}, 500);});
  // ------------ OCULTAR BOTÓN "IR HACIA ARRIBA"
  $(window).scroll(function(){
    if($(this).scrollTop() > 0){
      $("#toTopgobtn").addClass("show");
      $("#toTopgobtn").slideDown(500);
    }else{
      $("#toTopgobtn").removeClass("show");
      $("#toTopgobtn").slideDown(500);
    }
  });
	////CAROUSEL DE PRODUCTOS MÁS VENDIDOS - BEST SELLER...
	$('#products-more-sells').owlCarousel({
		autoplay:true,
		autoplayTimeout: 6000,
		center: false,
		items: 5,
		loop: true,
		margin: 10,
		dots:true,
		nav: true,
		lazyLoad: true,
		navText: ["<i class='ti-angle-left'></i>","<i class='ti-angle-right'></i>"],
		responsive: {
			0: {
				nav: false,
				dots:true,
				items: 2
			},
			244: {
				nav: false,
				dots:true,
				items: 1
			},
			300: {
				nav: false,
				dots:true,
				items: 1
			},
			360: {
				nav: false,
				dots:true,
				items: 1
			},
			488: {
				nav: false,
				dots:true,
				items: 2
			},
			600: {
				nav: false,
				dots:true,
				items: 3
			},
			768: {
				nav: false,
				dots:true,
				items: 3
			},
			850: {
				nav: false,
				dots:true,
				items: 4
			},
			1024: {
				items: 4
			},
			1025: {
				items: 4
			},
			1200: {
				items: 5
			},
			1400: {
				items: 5
			}
		}
	});
	// CAROUSEL DE LOS PRODUCTOS MÁS DESTACADOS...
	$('.products_carousel').owlCarousel({
		autoplay:true,
		center: false,
		items: 1,
		loop: true,
		margin: 10,
		dots:false,
		nav: true,
		lazyLoad: true,
		autoplayTimeout: 6000,
		navText: ["<i class='ti-angle-left'></i>","<i class='ti-angle-right'></i>"],
		responsive: {
			0: {
				nav: false,
				dots:true,
				items: 2
			},
			560: {
				nav: false,
				dots:true,
				items: 3
			},
			768: {
				nav: false,
				dots:true,
				items: 4
			},
			1024: {
				items: 5
			},
			1200: {
				items: 5
			}
		}
	});
});
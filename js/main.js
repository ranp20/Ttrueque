// ------------ PRELOADER - ALL PAGES TTRUEQUE
window.addEventListener("load", function(){
  document.querySelector(".loader-ttrqstr").className += " hidden";
});
$(() => {
	// ------------ MOSTRAR Y OCULTAR LISTADO DE PRODUCTOS EN EL CARRITO...
	let btnOpenCart = $("#view_cart_ttrq"), contCart = $(".containt_total_ttrq-cart"), closeCart = $("#cerrar_carrito");
  btnOpenCart.removeClass("dropdown-cart");
  btnOpenCart.click(function (){contCart.addClass("active");});
  closeCart.click(function (){
    console.log('GAAAAA');
    contCart.removeClass("active");
  });
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
});
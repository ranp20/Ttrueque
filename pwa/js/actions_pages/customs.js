// AGREGAR PRELOADER...
window.addEventListener('load', function(){
    const loadcli = document.querySelector('.loader-cli');
    
    loadcli.className += ' hidden';
})

$(document).ready(function(){
  //MOSTRAR Y OCULTAR CARRITO...
  var carContent = $("#view_cart_ttrq"),
    cartOC = $(".containt_total_ttrq-cart"),
    closeCart = $("#cerrar_carrito");

  carContent.removeClass("dropdown-cart");
  carContent.click(function () {
    cartOC.toggleClass("active");
  });

  closeCart.click(function () {
    cartOC.removeClass("active");
  });
});
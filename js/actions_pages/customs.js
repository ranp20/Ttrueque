//INPUT DEL BUSCADOR EN EL HOME...
window.onload = function () {
  var input = document.querySelector(".search-input_home");
  input.onfocus = () => {
    input.previousElementSibling.classList.add("foco");
  };

  input.onblur = () => {
    if (input.value.trim().length == 0)
      input.previousElementSibling.classList.remove("foco");
  };
};

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
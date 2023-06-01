// ------------ PRELOADER - ALL PAGES TTRUEQUE
window.addEventListener("load", function(){
  document.querySelector(".loader-ttrqstr").className += " hidden";
});
$(() => {
	// ------------ MOSTRAR Y OCULTAR LISTADO DE PRODUCTOS EN EL CARRITO...
	let btnOpenCart = $("#view_cart_ttrq"), contCart = $(".containt_total_ttrq-cart"), closeCart = $("#cerrar_carrito");
  btnOpenCart.removeClass("dropdown-cart");
  btnOpenCart.click(() => {contCart.addClass("active");});
  closeCart.click(() => {contCart.removeClass("active");});
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

  // ----------- HACER HOVER EN UN ELEMENTO CON DROPDOWN
  var namehoverAll = document.querySelectorAll("*[data-dropdown-custommenu]");
  var backdropHome = document.querySelector("#backdrop");
  namehoverAll.forEach(function(i,e){
    var namehover = i;
    namehover.addEventListener("mouseenter",function(e){
      var attrnamehov = this.getAttribute("data-dropdown-custommenu");

      if(attrnamehov == "lst_AllOptsProfile-menu"){
        $("#backdrop").removeClass('hide');
        $(this).addClass('active');
        $(this).next().addClass('active');
        $(this).parent().siblings().find("*[data-dropdown-custommenu]").removeClass('active');
        $(this).parent().siblings().find("*[data-dropdown-custommenu]").next().removeClass('active');
      }else if(attrnamehov == "lst_AllCateg-menu"){
        $("#backdrop").removeClass('hide');
        $(this).addClass('active');
        $(this).next().addClass('active');
        $(this).parent().siblings().find("*[data-dropdown-custommenu]").removeClass('active');
        $(this).parent().siblings().find("*[data-dropdown-custommenu]").next().removeClass('active');
      }else if(attrnamehov == "lst_AllCountries-menu"){
        $("#backdrop").removeClass('hide');
        $(this).addClass('active');
        $(this).next().addClass('active');
        $(this).parent().siblings().find("*[data-dropdown-custommenu]").removeClass('active');
        $(this).parent().siblings().find("*[data-dropdown-custommenu]").next().removeClass('active');
      }else{
        console.log('No es un menu hover');
      }
    });
  });
  // ----------- REMOVER ELEMENTO DROPDOWN AL HACER HOVER EN EL BACKDROP
  backdropHome.addEventListener("mouseenter", function(){
    namehoverAll.forEach(function(i,e){
      var namehover = i;

      if(namehover.classList.contains("active")){
        backdropHome.classList.add("hide");
        namehover.classList.remove('active');
        namehover.nextElementSibling.classList.remove('active');
      }
    });
  });
  
});
(() => {
  list_allNumberOrders();
});
// ABRIR/CERRAR SIDEBAR LEFT
$(document).on("click",".menu-nav-burger-index",() => {$("#navbarSupportedContent").toggleClass("open");});
// ABRIR EL MENÚ DE CATEGORÍAS
$(document).ready(function(){
  $(".dropdown-toggle").dropdown();
});
var linksParent = $(".cont-links-products-banners");
var links = linksParent.find("a");
var items = $(".content-more-sells");

linksParent.on("click", "a", function(e){
  let target = $(this.getAttribute("href"));
  let t = $(this);
  let ind = t.index();
  if (target.length){
    e.preventDefault();
    $("html, body").stop().animate({ scrollTop: target.offset().top, }, 1000 );
  }
});
// ------------ CAROUSEL DE BANNERS PRINCIPALES
$(document).ready(() => {
  const $owlCarousel = $("#carousel-home > .owl-carousel").owlCarousel({
    autoplay: true,
    items: 1,
    loop: true,
    nav: false,
    dots: true,
    autoplayTimeout: 6000,
    smartSpeed: 900,
    responsive: {
      0: {
        dots: false
      },
      767: {
        dots: false
      },
      768: {
        dots: true
      }
    }
  });
})
// ------------ CAROUSEL DE PRODUCTOS MÁS VENDIDOS - BEST SELLER
$('#products-more-sells').owlCarousel({
	autoplay:true,
	autoplayTimeout: 6000,
	center: false,
	items: 5,
	loop: true,
	margin: 18,
	dots:true,
	nav: true,
	lazyLoad: true,
	navText: ["",""],
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
// ------------ CAROUSEL DE LOS PRODUCTOS MÁS DESTACADOS
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
// ------------ BUSCAR POR CATEGORÍAS
function search_ByNameCategory(search){
  var prod = $("#caja_busqueda_primary").val();
  $.ajax({
    url: "./php/process_user_search.php",
    method: "POST",
    dataType: "JSON",
    data: { product: prod },
  }).done((e) => {
    $(".c-contentSearchTtrq--cont").html("");
    if(e == "[]" || e == ""){
      $(".c-contentSearchTtrq--cont").removeClass("searching");
    }else{
      $(".c-contentSearchTtrq--cont").addClass("searching");
      $.each(e, function (i, v) {
        $(".c-contentSearchTtrq--cont").append(`
          <ul>
            <li>
              <a href="./tienda?tipos=${v.nombre_categoria}">${v.nombre_categoria}</a>
            </li>
          </ul>`);
      });
    }
  });
}
// ------------ BUSCADOR EN TIEMPO REAL
$(document).on("keyup keypress","#caja_busqueda_primary", (e) => {
  let val = e.target.value;
  if(e.which == '13'){
    e.preventDefault();
  }else{
    if(val != ""){
      search_ByNameCategory(val);
    }else{
      search_ByNameCategory(val);
    }
  }
});
// ------------ HACER FOCO EN EL BUSCADOR
$(document).on("focus","#caja_busqueda_primary",function(){search_ByNameCategory();});
// ------------ LISTAR EL NÚMERO DE ORDENES
function list_allNumberOrders(){
  let idclient = $("#userid_cli").val();
  $.ajax({
    url: "./php/list-track-order.php",
    method: "POST",
    dataType: "JSON",
    data: { idcliente : idclient},
  }).done((e) => {
    console.log(e.length);
    if(e == "" || e == "[]"){
      console.log('No hay pedidos');
    }else{
      console.log(e);
    }
    $("#count-trackorder").text(e.length);
  });
}
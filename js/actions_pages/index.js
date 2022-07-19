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
// ------------ CAROUSEL DE PRODUCTOS MÁS VENDIDOS - BEST SELLER
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
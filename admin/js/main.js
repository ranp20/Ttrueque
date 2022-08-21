$(() => {
	let btnOpen_m = document.querySelector("#icon-togglemenuMobile"),	btnClose_m = document.querySelector("#closebtnToggSideNav_icon"),	mSideBarLBackdop_m = document.querySelector(".cSideBarLeft"), btn_sessuser = document.querySelector("#btn-sessuserAdm"),	c_sessuser_m = document.querySelector("#list-opts-sessuser"), mContainRight = document.querySelector("#main-dashCamel");
	// ------------ TOGGLE MENU - DESKTOP
	btnOpen_m.addEventListener("click", function(){mSideBarLBackdop_m.classList.toggle("active");mContainRight.classList.toggle("active");});
	btnClose_m.addEventListener("click", function(){mSideBarLBackdop_m.classList.remove("active");mContainRight.classList.remove("active");});
	mSideBarLBackdop_m.addEventListener("click", function(e){if(e.target === mSideBarLBackdop_m){mSideBarLBackdop_m.classList.remove("active");}});
	// ------------ TOGGLE MENU - USUARIO
	btn_sessuser.addEventListener("click", function(){c_sessuser_m.classList.toggle("show");});
});
// ------------ ITEM SELECCIONADO DEL MENÚ EN CADA PÁGINA - SIDEBARLEFT
var url = window.location.pathname;
var filename = url.substring(url.lastIndexOf('/')+1);
if(filename == "ajustes" || filename == "banner-principal"){
	$(".cSideBarLeft--sidenav--c--cList--m--item a").removeClass("active");
	$(".cSideBarLeft--sidenav--c--cList--mOthers--item a").eq(0).addClass('active');
}else{
	$(".cSideBarLeft--sidenav--c--cList--m--item a").removeClass("active");
	$('.cSideBarLeft--sidenav--c--cList--m--item a[href="' + filename + '"]').addClass("active");
}







$(document).ready(function () {
 	$(".ts-sidebar-menu li a").each(function () {
 		if ($(this).next().length > 0) {
 			$(this).addClass("parent");
 		};
 	})

 	var menux = $('.ts-sidebar-menu li a.parent');

 	$('<div class="more"><i class="fa fa-angle-down"></i></div>').insertBefore(menux);

 	$('.more').click(function () {
 		$(this).parent('li').toggleClass('open');
 	});

	$('.parent').click(function (e) {
		e.preventDefault();
 		$(this).parent('li').toggleClass('open');
 	});

 	$('.menu-btn').click(function () {
 		$('nav.ts-sidebar').toggleClass('menu-open');
 	});

	$('#zctb').DataTable();

	$("#input-43").fileinput({

		showPreview: false,

		allowedFileExtensions: ["zip", "rar", "gz", "tgz"],

		elErrorContainer: "#errorBlock43"

	});
});
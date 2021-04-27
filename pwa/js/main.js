$(document).ready(function(){
	$('.myprofile-cont--dropdown-menu--nameuser').on('click', function() {
		$(this).children('.myprofile-cont--dropdown-menu--nameuser--icon').toggleClass('slide');
		$(this).next().slideToggle();
	});
});
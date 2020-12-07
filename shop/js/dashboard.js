//MOSTRAR OCULTAR SIDEBAR - LEFT
window.onload = function(){
	var container = document.querySelector('.container-total');
	document.querySelector('#btn-tdc-toggle').addEventListener('click', function(){
		container.classList.toggle('active');
	});
}
//SIDEBAR - LEFT
var linksParentCli = $('#options-user-d-cli');
var links = linksParentCli.find('a');


linksParentCli.on('click', 'a', function(){
	var t = $(this);

	t.addClass('active').siblings().removeClass('active');
});
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

((d) => {

	/************************** SIDEBARLEFT MOVEMENT **************************/
	let btnsidebarLeft = d.querySelector('.c-left-btn-tdc');
	let sidebarLeft = d.querySelector('.sidebar-nav');
	btnsidebarLeft.addEventListener('click', e => {
		btnsidebarLeft.classList.toggle('active');
		sidebarLeft.classList.toggle('active');
	});


	/************************** HIDE SIDEBAR WHEN CLICKIN ON A LINK **************************/
	d.addEventListener("click", e => {
		if(!e.target.matches('#options-user-d-cli a')) return false;
		btnsidebarLeft.classList.remove('active');
		sidebarLeft.classList.remove('active');
	});

	/************************** HIDE AND SHOW WHEN CLICKIN ON A MENU OF POINTS **************************/
	let btnpointsRight = d.querySelector('#btn-show-rigth-actions');
	let contentRightbtns = d.querySelector('.c-right-btn-tdc');
	btnpointsRight.addEventListener('click', e => {
		btnpointsRight.classList.toggle('active');
		contentRightbtns.classList.toggle('active');
	});


})(document);
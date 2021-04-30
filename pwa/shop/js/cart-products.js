window.onload = function(){
    var q = document.getElementById('#quantity-product'); 
    var cant = parseFloat(q.textContent());
    const inc = document.querySelector('.inc-arrow');

    inc.addEventListener('click', function(){
        cant + 1;
    });
}
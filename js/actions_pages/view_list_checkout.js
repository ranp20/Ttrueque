$(function(){
    get_checkout();
})

function get_checkout(){
    let list = $('#list_checkout_products'),
        subtotal = $('#subtotal_checkout'),
        total = $('#total_checkout');

    get_data(function(res){
        list.html('');
        let cart = JSON.parse(res),
            template = "",
            total_price = 0,
            
        for(let c of cart){
            if(c.length != 0){
                template += `<ul class="clearfix">
                    <li><em>${c.name}<em><span>${c.price}<span></li>
                </ul>`;

            }
            total_price += parseInt(c.price);
        }
        list.html(template);
        subtotal.html(`<li><em><strong>Subtotal</strong></em><span>${subtotal} Puntos</span></li>`);
        total.html(`<div class="total clearfix">TOTAL <span>${total_price} Puntos</span></div>`);
    })
}
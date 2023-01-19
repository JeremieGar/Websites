$(document).ready(function() {
/* This section is for the cart */
            let total = '';
            let roundedTotal = 0.0;
           
    $('.filterBtn').click(function(){
        var sum = 0.0;
        var price = 0.0;
        var quantity = 0.0;
        var addRow = '';
        var itemName = '';
        $('.itemTable tr').each(function(){
            $(this).find('.price').each(function(){
                price = parseFloat($(this).html());
              
            });
            $(this).find('#quantity').each(function(){
                quantity = parseFloat($(this).val());
                sum += quantity*price;
            }); 
            roundedTotal = sum.toFixed(2);  
            total = $("<b> <b>").text(`${roundedTotal}`); 

            $(this).find('.item-name').each(function(){
                itemName = $(this).html();
                console.log($(itemName));
            });

        }); 
        
        $('.cart-total').text('');
        $('.cart-total').text(roundedTotal+'$');

    });

    $('.submitBtn').click(()=>{
        if ( roundedTotal >= 5000){
            alert('Order is pending');
        }
    });
});


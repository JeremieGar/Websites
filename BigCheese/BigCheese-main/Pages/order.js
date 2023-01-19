
$(document).ready(()=>{
    $(".add-row").click(()=>{
        var itemName = $("#itemName").val();
        var productId = $("#productId").val();
        var quantity = $('#quantity').val();
        var price = $('#price').val();
        if((itemName !== '') && productId !== '' && quantity !== '' && price !== ''){
            var addRow = $("<tr class='client-order'><td id = 'item-name'>" + itemName + "</td> <td id = 'item-id' >" + productId + "</td><td id='item-id'>" + price+"</td></td><td id = 'item-quantity'>"+quantity+"</td><td><input  type = 'checkbox' name='record'></td></tr>");
        $('.itemTable tbody').append(addRow);
        }else{
            alert('Please fill in all boxes. ');
        }
       
    });

    $('.delete-row').click(function(){
        $(".itemTable tbody").find('input[name="record"]').each(function(){
            if($(this).is(':checked')){
                $(this).parents("tr").remove();
            }
        });
    });
    
    $('.submit-order').click(()=>{
        alert('Submitting Order!');
    });
});






$(document).ready(function() {

    priceForm($('#product-multiprice'));
    diversityForm($('#product-diversity'));

    $(document.body).on('click', '.image_remove', function () {
        removeImage($(this));
        return false;
    });

    $(document.body).on('click', '.add-item-link', function () {
        $('.add-item-link').addClass('hide');
        $('.add-item-form').removeClass('hide');
    });

    $(document.body).on('click', '.update_qty' ,function(){
        var qty = $(this).parent().children('input.cartitem_qty_value').val();
        var id = $(this).parent().children('input.cartitem_id').val();
        if(!$(this).hasClass('disable') && qty > 0){
            $(this).addClass('disable').prop('readonly', true);
            window.location.replace('/order/update_order_item?id=' + id + '&field=quantity&value=' + qty);
        }
    });

    $(document.body).on('click', '.update_price' ,function(){
        var price = $(this).parent().children('input.cartitem_price_value').val();
        var id = $(this).parents('tr').find('.cartitem_id').val();
        if(!$(this).hasClass('disable') && price >= 0){
            $(this).addClass('disable').prop('readonly', true);
            window.location.replace('/order/update_order_item?id=' + id + '&field=price&value=' + price);
        }
    });

    $(document.body).on('change', '#order-shipping_method' ,function(){
        shipping = $(this).children("option:selected").val();
        $('.shipping_method_field').each(function(){
            $(this).hide();
        });
        if(shipping == 'rcr'){
            $('.method_rcr').show();
        } else if(shipping == 'rp'){
            $('.method_rp').show();
            $('.method_rp_address').show();
        } else if(shipping == 'courier' || shipping == 'shipping'){
            $('.method_courier').show();
        } else if(shipping == 'tk'){
            $('.method_tk').show();
            $('.city_field').show();
        }
    });

    $(document.body).on('click', '#product-multiprice' ,function(){
        priceForm($(this));
    });

    $(document.body).on('click', '#product-diversity' ,function(){
        diversityForm($(this));
    });
});

function removeImage(e) {
    $.ajax({
        method: 'get',
        url: e.attr('href'),
        dataType: 'json',
    }).done(function( data ) {
        if(data) {
            e.parent('.product-image').remove();
        }
    });
}

function priceForm(e) {
    if(e.is(':checked')){
        $('.price-and-count').show();
        $('.price-without-count').hide();
    } else {
        $('.price-and-count').hide();
        $('.price-without-count').show();
    }
}

function diversityForm(e) {
    if(e.is(':checked')){
        $('.diversity').show();
    } else {
        $('.diversity').hide();
    }
}
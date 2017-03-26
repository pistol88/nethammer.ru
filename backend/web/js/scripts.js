renderPriceLines();

$('.addActionPrice').on('click', function() {
    var blockHtml = $('.price-line:last').html();
    $('.prices-lines').append('<div class="price-line">' + blockHtml + '</div>');
    $('.price-line').last().find('input').val('');
    $('.price-line').last().find('.textInfo > span').html('0');
    
    renderPriceLines();
    
    return false;
});

$(document).on('blur', '.prices-lines input', function() {
    renderPriceLines();
});

$('.price-line-delete').on('click', function() {
    $(this).parents('.price-line').hide('slow');
    setTimeout("$(this).parents('.price-line').remove();", 300);
    
    return false;
});

function renderPriceLines() {
    $('.price-line').each(function() {
        line = this;
        var productPrice = parseInt($(line).find('.product_price_input').val());
        var discountPrice = parseInt($(line).find('.discount_price_input').val());
        
        $(line).find('.discount_price').html(discountPrice);
        $(line).find('.product_price').html(productPrice);
        $(line).find('.new_price').html(Math.round(productPrice-(productPrice*(discountPrice/100))));
    });
}
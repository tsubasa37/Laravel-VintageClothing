$(document).on('click', '.favorite-button', function() {
    var productId = $(this).data('product-id');
    var $icon = $(this).children('svg');

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/favorite',
        type: 'POST',
        dataType: 'json',
        data: {
            product_id: productId
        },
        success: function(data) {
            // Toggle the favorite button state
            if (data) {
                $icon.toggleClass('liked');

                // Update the icon color immediately
                if ($icon.hasClass('liked')) {
                    $icon.removeClass('far fa-heart').addClass('fas fa-heart');
                } else {
                    $icon.removeClass('fas fa-heart').addClass('far fa-heart');
                }
            } else {
                console.log('ユーザーが認証されていません');
            }
        },
        error: function(xhr) {
            console.log('Error:', xhr);
        }
    });
});

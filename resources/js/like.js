$(document).on('click', '.favorite-button', function() {
    var productId = $(this).data('product-id');

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/favorite',
        type: 'POST',
        data: {
            product_id: productId
        },
        success: function(response) {
            // Toggle the favorite button state
            if (response.success) {
                $icon.toggleClass('liked');

                // Update the icon color immediately
                if ($icon.hasClass('liked')) {
                    $icon.removeClass('far fa-heart').addClass('fas fa-heart');
                } else {
                    $icon.removeClass('fas fa-heart').addClass('far fa-heart');
                }
            } else {
                console.log('User not authenticated');
            }
        },
        error: function(xhr) {
            console.log('Error:', xhr);
        }
    });
});

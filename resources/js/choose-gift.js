(function () {
    let $giftTypeIdInput = $('.js-gift-type-id-input');

    $(document).on('click', '.js-category-item', function () {
        console.log($(this).data('modal-id'));
        let modalId = $(this).data('modal-id');
        $('#' + modalId).modal();
    });

    $(document).on('click', '.js-gift-choice', function () {
        let $item = $(this);
        if ($item.data('is-active') === 0) {
            $('.js-modal-out-of-gifts').modal();

            return;
        }

        $('.selected').removeClass('selected');
        $item.addClass('selected');

        $giftTypeIdInput.val($item.data('gift-type-id'));
        console.log($giftTypeIdInput.val());
    });

    $(document).on('submit', '.js-gift-choosing-form', function (e) {
        if (!$giftTypeIdInput.val()) {
            e.preventDefault();
            $('.js-modal-gift-not-chosen').modal();
        }
    });
}());

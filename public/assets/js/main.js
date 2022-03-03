$(function(){
    $(".modal-trigget").click(function(){
        var idModal = $(this).data('modal');
        $('.modal').removeClass('active');
        $('.item-modal-'+idModal).addClass('active');
    });

    $(".close").click(function(){
        $('.modal').removeClass('active');
    });
})
$(document).ready(function() {
	var width = $(window).width();

	$(".modal-close").click(function(e){
        e.preventDefault();
        $(".modal").hide();
    })
    
    $("#gift-link1").click(function(e){
        e.preventDefault();
        $(".modal").hide();
        $("#modal1").show();
    })

    $("#gift-link2").click(function(e){
        e.preventDefault();
        $(".modal").hide();
        $("#modal2").show();
    })
    
});


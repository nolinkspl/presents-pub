$(document).ready(function() {
	var width = $(window).width();

  

  setTimeout(() => {$(".santa").addClass("sactive")}, 2000);
  setTimeout(() => {$(".santa").removeClass("sactive")}, 30000);
  

	$(".line-sock").click(function(e) {
    e.preventDefault();
    $(this).addClass("sock-anim")
    
    setTimeout(() => {$(this).removeClass("sock-anim")}, 3000);
  })

  $(".sform-close").click(function(e) {
    e.preventDefault();
    $(".sform").hide();
  })

  $(".line-sock").click(function(e) {
    $(".santa").removeClass("sactive")
  })

  $(".line-sock-1").click(function(e) {
    $(".sform").hide();
    $(".sform-1").show();
  })
  $(".line-sock-2").click(function(e) {
    $(".sform").hide();
    $(".sform-2").show();
  })
  $(".line-sock-3").click(function(e) {
    $(".sform").hide();
    $(".sform-3").show();
  })
  $(".line-sock-4").click(function(e) {
    $(".sform").hide();
    $(".sform-4").show();
  })
  $(".line-sock-5").click(function(e) {
    $(".sform").hide();
    $(".sform-5").show();
  })
  $(".line-sock-6").click(function(e) {
    $(".sform").hide();
    $(".sform-6").show();
  })

});


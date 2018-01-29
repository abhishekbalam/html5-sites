$(document).ready(){
  $(".show-item").hide();
  $(".item").click(function(){
	$('.back-end').removeClass("active-show");
	$('.back-end', this).addClass("active-show");
	$(".show-item .single").addClass("show-single");
	$(".show-item .single").html($(".active-show").html());
    $(".show-item").fadeIn(600);
    $(".show-item-close").addClass("show-close");
    $("html,body").addClass("overflow");
  });
  $(".show-item-close").click(function(){
    $(".show-item").fadeOut(600);
    $(".show-item-close").removeClass("show-close");
	$(".show-item .single").removeClass("show-single");
    $("html,body").removeClass("overflow");
  });
  $(".show-item-back-top").click(function(){
		$(".show-item").animate({
			scrollTop: 0
		}, 1000)
	});
}
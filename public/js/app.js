$(document).ready( function(){
	$(".has-error").click(function() {
		$(this).removeClass("has-error");
		$(this).find(".help-block").css("display", "none");
	});

	// $('.reply').on('click', function (e) {
	// 	e.preventDefault()
	//  	$(this).parents('.media-body').find(".all-reply").toggleClass("magictime slideUpReturn").toggle();
	// });
});

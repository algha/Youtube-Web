$(document).ready(function(){
	$(".updown").click(function () {
		var contentDiv = $(this).parent().siblings(".sidebar-content");
		if($(this).hasClass("up")){
			contentDiv.hide();
			$(this).removeClass("up");
			$(this).find("i").removeClass("fa-angle-up");
			$(this).find("i").addClass("fa-angle-down");
		}else{
			contentDiv.show();
			$(this).addClass("up");
			$(this).find("i").removeClass("fa-angle-down");
			$(this).find("i").addClass("fa-angle-up");
		}
	});
});
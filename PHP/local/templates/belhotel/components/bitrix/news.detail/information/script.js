//left menu
function windowSize(){
	if ($(window).width() < '1240'){
		if($(".active-link").length==0){
			$(".minittl").after('<div class="active-link"><ul class="left-menu"></ul></div>');
			$(".left-sidebar .left-menu__link.active").parent().clone().appendTo(".active-link .left-menu");
		}
		if($(".noactive-link").length==0){
			$(".info-slider").after('<div class="noactive-link"><ul class="left-menu"></ul></div>');
			$(".left-sidebar .left-menu__link:not(.active)").parent().clone().appendTo(".noactive-link .left-menu");
		}
	} else {
		$(".active-link").remove();
		$(".noactive-link").remove();
	}
}
$(window).on('load resize',windowSize);
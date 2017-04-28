$(document).ready(function () {
	//submit
	$(".js-callback-submit").click(function () {
		var error = false;
		$(this).parent().parent().find('.input, .textarea').each(function () {
			if (($(this).children().val() == '') && ($(this).children().data("req") == 'y')) {
				if(!$(this).hasClass("error")){
					$(this).addClass("error")
						.append('<div class="error-message">Это обязательное поле</div>');
				}
				error = true;
			}
			else{
				$(this).removeClass("error")
					.children(".error-message").remove();
			}
		});
		if(grecaptcha.getResponse()=="") {
			if(!$(this).parent().parent().find(".captcha").hasClass("error")){
				$(this).parent().parent().find(".captcha").addClass("error")
					.append('<div class="error-message">Вы не прошли проверку reCAPTCHA.</div>');
			}
			error = true;
		}
		else{
			$(this).parent().parent().find(".captcha").removeClass("error")
				.children(".error-message").remove();
		}
		if (error) return false;
	});
});
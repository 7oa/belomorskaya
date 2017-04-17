$(document).ready(function(){
	var pattern = /^[a-z0-9_-]+@[a-z0-9-]+\.[a-z]{2,6}$/i;
	var mail = $('input[type="email"]');

	mail.blur(function(){
		if((mail.val().search(pattern) == 0) || (mail.val() == "")){
			$(this).next().remove(".error-message")
				.parent().removeClass('error');
		}else{
			$(this).val("")
				.parent().addClass('error')
				.append('<div class="error-message">Не корректно введен e-mail</div>');
		}
	});
});
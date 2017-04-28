// js jquery
$(document).ready(function() {
    <!-- Initialize Swiper -->
    var swiper = new Swiper('.special-offers-swiper-container', {
        pagination: '.special-offers-swiper-pagination',
        paginationClickable: true,
        nextButton: '.special-offers-swiper-button-next',
        prevButton: '.special-offers-swiper-button-prev',
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true
    });

	var swiper2 = new Swiper('.room-slider-container', {
		pagination: '.room-slider-pagination',
		paginationClickable: true,
		nextButton: '.room-slider-button-next',
		prevButton: '.room-slider-button-prev',
		slidesPerView: 1,
		spaceBetween: 30,
		loop: true
	});

	var swiper3 = new Swiper('.info-slider-container', {
		pagination: '.info-slider-pagination',
		paginationClickable: true,
		slidesPerView: 1,
		spaceBetween: 30,
		loop: true
	});

    //popup
    $('.js-open-callback').click( function(event){
        event.preventDefault();
        $('#callback__overlay').fadeIn(400,
            function(){
                $('#callback')
                    .css('display', 'block')
                    .animate({opacity: 1}, 200);
            });
        $("body").css('overflow-y','hidden');
    });
    $('#callback__close, #callback__overlay').click( function(){
        $('#callback')
            .animate({opacity: 0, top: '0'}, 200,
                function(){
                    $(this).css('display', 'none');
                    $('#callback__overlay').fadeOut(400);
                }
            );
		$("body").css('overflow-y','auto');
    });

    //forms
    function focusForm($param) {
        $('.'+$param).on('focusin', function () {
            var input = $(this).children($param);
            if($(this).hasClass("error")){
				$(this).removeClass("error")
            }
            if($(this).children(".after").length==0){
                var placeholder = input.attr("placeholder");
                input.attr("plc", placeholder);
                input.attr("placeholder","");
                $(this).append('<div class="after" style="display: none;">'+placeholder+'</div>');
                $(this).children(".after").fadeIn("slow");
            }
        });
        $('.'+$param).on('focusout', function () {
            var input = $(this).children($param);
            if(input.val().length==0){
                var placeholder = input.attr("plc");
                input.attr("placeholder", placeholder);
                $(this).children(".after").remove();
            }
        });
    }

    focusForm("input");
    focusForm("textarea");

    //menu-open
    $(".js-menu").click(function () {
        $(this).toggleClass("drop");
        $(".content").toggleClass("menu-overlay");
        $(".header-menu-wrapper").slideToggle();
    });


});
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

	var swiper = new Swiper('.room-slider-container', {
		pagination: '.room-slider-pagination',
		paginationClickable: true,
		nextButton: '.room-slider-button-next',
		prevButton: '.room-slider-button-prev',
		slidesPerView: 1,
		spaceBetween: 30,
		loop: true
	});

	var swiper = new Swiper('.info-slider-container', {
		pagination: '.info-slider-pagination',
		paginationClickable: true,
		slidesPerView: 1,
		spaceBetween: 30,
		loop: true
	});

    // выбор дат
    $(".select-date-input").datepicker({
        dateFormat: "d MM",
        autoClose: true,
        language: {
            months: ['Января','Февраля','Марта','Апреля','Мая','Июня','Июля','Августа','Сентября','Октября','Ноября','Декабря']
        },
        onSelect: function (fd, d, picker) {
            var dt = fd.split(" ");
            var label = picker.$el.prev(".label-date-first");
            label.children(".dd").text(dt[0]);
            label.children(".mm").text(dt[1]);
        }
    });

    $(".js-reserv").click(function () {
        console.log("js-reserv");
    });

    //кол-во гостей
    $(".js-plus").click(function () {
        var count_el = $(this).parent().children(".js-count");
        var count_input = $(this).parent().children(".js-count-input");
        var count_num = parseInt(count_el.text());
        count_el.html(count_num+1);
        count_input.val(count_num+1);
    });
    $(".js-minus").click(function () {
        var count_el = $(this).parent().children(".js-count");
        var count_input = $(this).parent().children(".js-count-input");
        var count_num = parseInt(count_el.text());
        if(count_num>1) {
            count_el.html(count_num-1);
            count_input.val(count_num-1);
        }
    });

    //popup
    $('.js-open-callback').click( function(event){
        event.preventDefault();
        $('#callback__overlay').fadeIn(400,
            function(){
                $('#callback')
                    .css('display', 'block')
                    .animate({opacity: 1, top: '10px'}, 200);
            });
    });
    $('#callback__close, #callback__overlay').click( function(){
        $('#callback')
            .animate({opacity: 0, top: '0'}, 200,
                function(){
                    $(this).css('display', 'none');
                    $('#callback__overlay').fadeOut(400);
                }
            );
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

    //submit
    $(".js-callback-submit").click(function () {
        $("#callback").addClass("flip");
        return false;
    })
    
    //menu-open
    $(".js-menu").click(function () {
        $(this).toggleClass("drop");
        $(".content").toggleClass("menu-overlay");
        $(".header-menu-wrapper").slideToggle();
    })

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
});
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

    // выбор дат
    $('.select-date-input').datepicker({
        dateFormat: "d MM",
        autoClose: true,
        language: {
            months: ['Января','Февраля','Марта','Апреля','Мая','Июня','Июля','Августа','Сентября','Октября','Ноября','Декабря']
        }
    });

    // masonry
    // $('.rooms').masonry({
    //     itemSelector: '.room',
    //     gutter: 5,
    //     columnWidth: 390,
    // });

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
})
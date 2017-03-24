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
        altField: ".label-date-first",
        altFormat: "DD MM"
    });

    // masonry
    // $('.rooms').masonry({
    //     itemSelector: '.room',
    //     gutter: 5,
    //     columnWidth: 390,
    // });
});
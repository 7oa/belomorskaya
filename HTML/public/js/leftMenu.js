function windowSize(){$(window).width()<"1240"?(0==$(".active-link").length&&($(".minittl").after('<div class="active-link"><ul class="left-menu"></ul></div>'),$(".left-sidebar .left-menu__link.active").parent().clone().appendTo(".active-link .left-menu")),0==$(".noactive-link").length&&($(".info-slider").after('<div class="noactive-link"><ul class="left-menu"></ul></div>'),$(".left-sidebar .left-menu__link:not(.active)").parent().clone().appendTo(".noactive-link .left-menu"))):($(".active-link").remove(),$(".noactive-link").remove())}$(window).on("load resize",windowSize);
$(document).ready(function() {
	function roomSum(){
		var dateFrom = new Date($("#r-from").val());
		var dateTo = new Date($("#r-to").val());

		var milliseconds = dateTo - dateFrom;

		var seconds = milliseconds / 1000;
		var minutes = seconds / 60;
		var hours = minutes / 60;
		var days = hours / 24;
		if(days<0) days = 1;

		var rCount = $("#r-count").val();
		var rPep = $("#r-pep").val(); //кол-во взрослых
		var rPepCost1 = $("#r-pep").data("cost1"); //цена за 1
		var rPepCost2 = $("#r-pep").data("cost2"); //цена за 2
		var rKids = $("#r-kids").val(); //кол-во детей
		var rKidsCost = $("#r-kids").data("cost"); //цена за ребенка
		var sum;
		if (rPepCost2) {
			var two = Math.floor(rPep/2); //кол-во пар
			var one = rPep%2; // кол-во одиночек
			sum = days*rCount*((one*rPepCost1)+(two*rPepCost2)+(rKids*rKidsCost));
		}
		else sum = days*rCount*((rPep*rPepCost1)+(rKids*rKidsCost));
		var sumF = number_format(sum, 0, '', ' ');
		$("#r-sum").val(sum)
			.prev().text(sumF);
	}

	//даты для резервирования
	var Data1 = new Date();
	var Data2 = new Date();
	Data2.setDate(Data1.getDate()+1);

	function fMonth(Month) {
		var fMonth;
		switch (Month)
		{
			case 0: fMonth="января"; break;
			case 1: fMonth="февраля"; break;
			case 2: fMonth="марта"; break;
			case 3: fMonth="апреля"; break;
			case 4: fMonth="мае"; break;
			case 5: fMonth="июня"; break;
			case 6: fMonth="июля"; break;
			case 7: fMonth="августа"; break;
			case 8: fMonth="сентября"; break;
			case 9: fMonth="октября"; break;
			case 10: fMonth="ноября"; break;
			case 11: fMonth="декабря"; break;
		}
		return fMonth;
	}
	var d1 = Data1.getDate();
	var d2 = Data2.getDate();
	var m1 = fMonth(Data1.getMonth());
	var m2 = fMonth(Data2.getMonth());
	var today = d1+' '+m1+' '+Data1.getFullYear();
	var tomorrow = d2+' '+m2+' '+Data2.getFullYear();
	var todayHidden = (Data1.getMonth()+1)+'/'+d1+'/'+Data1.getFullYear();
	var tomorrowHidden = (Data2.getMonth()+1)+'/'+d2+'/'+Data2.getFullYear();

	$("#js-firstDate").val(today)
		.prev(".label-date-first").children(".dd").text(d1)
		.next(".mm").text(m1);
	$("#js-secondDate").val(tomorrow)
		.prev(".label-date-first").children(".dd").text(d2)
		.next(".mm").text(m2);
	$("#r-from").val(todayHidden);
	$("#r-to").val(tomorrowHidden);

	roomSum();

	// выбор дат
	$(".select-date-input").datepicker({
		dateFormat: "d MM yyyy",
		autoClose: true,
		minDate: new Date(),
		language: {
			months: ['января','февраля','марта','апреля','мая','июня','июля','августа','сентября','октября','ноября','декабря']
		},
		onSelect: function (fd, d, picker) {
			var dtH = new Date(d);
			picker.$el.next().val((dtH.getMonth()+1)+'/'+dtH.getDate()+'/'+dtH.getFullYear());
			var dt = fd.split(" ");
			var label = picker.$el.prev(".label-date-first");
			label.children(".dd").text(dt[0]);
			label.children(".mm").text(dt[1]);
			roomSum();
		}
	});

	//кол-во гостей
	$(".js-plus").click(function () {
		var count_el = $(this).parent().children(".js-count");
		var count_input = $(this).parent().children(".js-count-input");
		var count_num = parseInt(count_el.text());
		count_el.html(count_num+1);
		count_input.val(count_num+1);
		roomSum();
	});
	$(".js-minus").click(function () {
		var count_el = $(this).parent().children(".js-count");
		var count_input = $(this).parent().children(".js-count-input");
		var count_num = parseInt(count_el.text());
		var min;
		if(count_input.attr("id") == "r-kids") min = 0;
		else min = 1;
		if(count_num > min) {
			count_el.html(count_num-1);
			count_input.val(count_num-1);
		}
		roomSum();
	});

	//бронирование
	$("input:radio").change(function () {
		var radioName = $(this).attr("name");
		var radioVal = $(this).val();
		$("input[data-name='"+radioName+"']").val(radioVal);

	});

	$("#checkbox").change(function () {
		if($(this).is(':checked')){
			$(this).parent().removeClass("error")
				.remove('.error-message');
		}
	});

	$(".js-reserv-subm").click(function () {
		var error = false;
		var check = $("#checkbox").is(':checked');
		$(".reserv-guest-wrapper").find('.input').each(function () {
			if (($(this).children().val() == '') && ($(this).children().data("req") == "y")) {
				if(!$(this).hasClass("error")){
					$(this).addClass("error")
						.append('<div class="error-message">Это обязательное поле</div>');
				}
				error = true;
			}
		});
		if(!check) {
			if(!$("#checkbox").parent().hasClass("error")){
				$("#checkbox").parent().addClass("error")
					.append('<div class="error-message">Необходимо отметить согласие</div>');
			}
			error = true;
		}
		if (error) return false;
	});
});
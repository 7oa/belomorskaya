<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Бронирование номера");
?><?$APPLICATION->IncludeComponent("f5:iblock.form", "reserv", Array(
	"ACTIVE_FROM_ALT" => "",	// дата начала
	"ACTIVE_TO_ALT" => "",	// дата завершения
	"CALENDAR_TEMPLATE" => "",	// Имя шаблона для main.calendar
	"CODE_ALT" => "",	// символьный код
	"DETAIL_PICTURE_ALT" => "",	// подробная картинка
	"DETAIL_TEXT_ALT" => "",	// подробный текст
	"ERROR_CSS_CLASS" => "",	// CSS-класс input`а с ошибкой
	"EVENT_TYPE" => "RESERV_FORM",	// Тип почтового события
	"FETCH_OPTIONS" => "Y",	// Получать значения списковых свойств
	"FIELDS" => array(	// Поля элемента
		0 => "NAME",
		1 => "PREVIEW_TEXT",
		2 => "",
	),
	"FORM_NAME" => "",	// Имя формы (name)
	"IBLOCK_ID" => "9",	// Код информационного блока
	"IBLOCK_SECTION_ALT" => "",	// раздел инфоблока
	"IBLOCK_TYPE" => "index",	// Тип информационного блока (используется только для проверки)
	"NAME_ALT" => "",	// наименование
	"PREVIEW_PICTURE_ALT" => "",	// картинка анонса
	"PREVIEW_TEXT_ALT" => "",	// текст анонса
	"PROPS" => array(	// Свойства элемента
		0 => "ROOM",
		1 => "DATE_FROM",
		2 => "DATE_TO",
		3 => "ROOM_COUNT",
		4 => "PEOPLE_COUNT",
		5 => "KIDS_COUNT",
		6 => "COST",
		7 => "TEL",
		8 => "EMAIL",
		9 => "PURPOSE",
		10 => "CALC_TYPE",
		11 => "",
	),
	"REQUEST_PREFIX" => "",	// Префикс переменных в $_REQUEST
	"SORT_ALT" => "",	// сортировка
	"SUCCESS_URL" => "",	// Страница успешной отправки заявки
	"TAGS_ALT" => "",	// теги
	"USE_CAPTCHA" => "N",	// Использовать CAPTCHA
	"XML_ID_ALT" => "",	// внешний код
),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
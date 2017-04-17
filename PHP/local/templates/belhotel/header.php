<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
<!DOCTYPE html>
<html>
<head>
	<?$APPLICATION->ShowHead();?>
    <title><?$APPLICATION->ShowTitle();?></title>
    <?/*<meta charset="<?=LANG_CHARSET?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">*/?>
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/scripts.js");?>
    <link rel="shortcut icon" href="<?=SITE_TEMPLATE_PATH?>/images/favicon.ico" type="image/x-icon">
</head>
<body>
<?$APPLICATION->ShowPanel();?>
<!--wrapper-->
<div class="wrapper">
    <!--content-->
    <div class="content">
        <!--header-->
        <header class="header">
            <div class="container">
                <!--header-wrapper-->
                <div class="header-wrapper">
                    <div class="header-logo-wrapper">
                        <div class="menu-sm js-menu"></div><a href="/" class="top-logo"></a>
                    </div>
                    <div class="header-right-wrapper">
                        <div class="header-contacts">
                            <div class="header-contact-wrapper">
                                <div class="header-contact-item header-contact-item_point">
									<?$APPLICATION->IncludeComponent(
										"bitrix:main.include",
										"",
										Array(
											"AREA_FILE_RECURSIVE" => "Y",
											"AREA_FILE_SHOW" => "file",
											"AREA_FILE_SUFFIX" => "include/top_addr",
											"EDIT_TEMPLATE" => "",
											"PATH" => "/include/top_addr"
										)
									);?></div>
                                <div class="header-contact-item header-contact-item_phone">
									<?$APPLICATION->IncludeComponent(
										"bitrix:main.include",
										"",
										Array(
											"AREA_FILE_RECURSIVE" => "Y",
											"AREA_FILE_SHOW" => "file",
											"AREA_FILE_SUFFIX" => "include/top_tel",
											"EDIT_TEMPLATE" => "",
											"PATH" => "/include/top_tel"
										)
									);?>
                                </div>
                            </div>
                            <div class="header-button-wrapper"><a href="#callback" class="button-call-request js-open-callback">Заказать звонок</a></div>
                        </div>
						<?$APPLICATION->IncludeComponent("bitrix:menu", "top-menu", Array(
                            "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                                "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
                                "DELAY" => "N",	// Откладывать выполнение шаблона меню
                                "MAX_LEVEL" => "1",	// Уровень вложенности меню
                                "MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
                                "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                                "MENU_CACHE_TYPE" => "A",	// Тип кеширования
                                "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
                                "ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
                                "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                                "COMPONENT_TEMPLATE" => ".default"
                            ),
                            false
                        );?>

                    </div>
                </div>
                <!--end header-wrapper-->
            </div>
        </header>
        <!--end header-->
        <!--workarea-->
        <div class="workarea">
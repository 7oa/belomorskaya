<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
//prnt($arResult);
?>
<!--container-->
<div class="container">
    <!--withsidebar-wrapper-->
    <div class="withsidebar-wrapper">
        <!--left-sidebar-->
        <?$APPLICATION->IncludeComponent("bitrix:news.line", "information-menu", Array(
            "ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
            "CACHE_GROUPS" => "Y",	// Учитывать права доступа
            "CACHE_TIME" => "300",	// Время кеширования (сек.)
            "CACHE_TYPE" => "N",	// Тип кеширования
            "DETAIL_URL" => "",	// URL, ведущий на страницу с содержимым элемента раздела
            "FIELD_CODE" => array(	// Поля
                0 => "NAME",
                1 => "",
            ),
            "IBLOCKS" => array(	// Код информационного блока
                0 => "5",
            ),
            "IBLOCK_TYPE" => "index",	// Тип информационного блока
            "NEWS_COUNT" => "20",	// Количество новостей на странице
            "SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
            "SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
            "SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
            "SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
        ),
            $component
        );?>
        <!--end left-sidebar-->
        <!--right-content-->
        <div class="right-content">
            <div class="minittl"><?=$arResult["PREVIEW_TEXT"]?></div>
            <h1><?=$arResult["NAME"]?></h1>
            <!--info-wrapper-->
            <div class="info-wrapper">
                <?=$arResult["DETAIL_TEXT"]?>
            </div>
            <!--end info-wrapper-->

            <!--info-slider-->
            <div class="info-slider">
				<?if($arResult["PROPERTIES"]["IMG"]["LINKS"]):?>
                    <div class="info-slider-container">
                        <div class="swiper-wrapper">
                            <?foreach ($arResult["PROPERTIES"]["IMG"]["LINKS"] as $arSlide):?>
                            <div class="swiper-slide">
                                <div class="info-slider__img"><img src="<?=$arSlide?>"></div>
                            </div>
                            <?endforeach;?>
                        </div>
                    </div>
                    <?if(count($arResult["PROPERTIES"]["IMG"]["LINKS"])>1):?>
                    <div class="info-slider-pagination"></div>
                    <?endif;?>
				<?endif;?>
            </div>
            <!--end info-slider-->

        </div>
        <!--end right-content-->
    </div>
    <!--end withsidebar-wrapper-->
</div>
<!--end container-->
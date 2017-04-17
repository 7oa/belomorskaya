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
//_print_r($arResult);
$slide = count($arResult["PROPERTIES"]["IMG"]["LINKS"]);
?>
<!--slider-->
<div class="room-slider">
    <div class="room-slider-container">
        <div class="swiper-wrapper">
            <?foreach ($arResult["PROPERTIES"]["IMG"]["LINKS"] as $arSlide):?>
            <div class="swiper-slide">
                <div style="background:url(<?=$arSlide?>) no-repeat top center; background-size:cover;" class="room-slider__img"></div>
            </div>
            <?endforeach;?>
        </div>
        <?if($slide > 1):?>
        <div class="room-slider-pagination"></div>
        <?endif;?>
    </div>
    <?if($slide > 1):?>
    <div class="next room-slider-button-next"></div>
    <div class="prev room-slider-button-prev"></div>
    <?endif;?>
</div>
<!--slider-->
<!--content-->
<div class="room-content">
    <div class="content-prev">
        <div class="room-content-prev__ttl">
            <h1><?=$arResult["NAME"]?></h1>
        </div>
    </div>
    <div class="room-content-prev__desc">
        <?=$arResult["DETAIL_TEXT"]?>
    </div>
</div>

<!--end content-->
